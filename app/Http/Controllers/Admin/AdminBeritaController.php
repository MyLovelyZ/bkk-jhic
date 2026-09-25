<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminBeritaController extends Controller
{
    /**
     * Tampilkan daftar seluruh berita di panel admin.
     */
    public function index(Request $request): View
    {
        $authUser = $request->auth_user ?? $request->input('auth_user');

        $query = Berita::with('kategori');

        // Filter pencarian
        if ($search = $request->input('q')) {
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $like) {
                $q->where('judul', $like, "%{$search}%")
                  ->orWhere('penulis_nama', $like, "%{$search}%")
                  ->orWhere('ringkasan', $like, "%{$search}%");
            });
        }

        // Filter kategori
        if ($kategoriId = $request->input('kategori_id')) {
            $query->where('kategori_id', $kategoriId);
        }

        // Filter status
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $beritas = $query->latest('published_at')->latest('created_at')->paginate(10)->withQueryString();
        $categories = KategoriBerita::orderBy('nama')->get();

        return view('admin.pages.berita.index', compact('beritas', 'categories', 'authUser'));
    }

    /**
     * Form pembuatan berita baru.
     */
    public function create(Request $request): View
    {
        $authUser = $request->auth_user ?? $request->input('auth_user');
        $categories = KategoriBerita::orderBy('nama')->get();

        return view('admin.pages.berita.create', compact('categories', 'authUser'));
    }

    /**
     * Simpan berita baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:berita,slug',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'ringkasan' => 'required|string|max:1000',
            'konten' => 'required|string',
            'gambar_sampul' => 'nullable|string|max:1000',
            'gambar_sampul_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'caption_gambar' => 'nullable|string|max:255',
            'penulis_nama' => 'required|string|max:150',
            'penulis_jabatan' => 'nullable|string|max:150',
            'penulis_avatar' => 'nullable|string|max:1000',
            'penulis_bio' => 'nullable|string',
            'estimasi_baca' => 'nullable|string|max:50',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:PUBLISHED,DRAFT',
            'published_at' => 'nullable|date',
        ]);

        // Upload file gambar sampul jika ada
        if ($request->hasFile('gambar_sampul_file')) {
            $path = $request->file('gambar_sampul_file')->store('berita', 'public');
            $validated['gambar_sampul'] = Storage::url($path);
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        // Jika slug kosong, di-generate oleh model boot
        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['judul']);
            $slug = $baseSlug;
            $counter = 1;
            while (Berita::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            $validated['slug'] = $slug;
        }

        // Hitung estimasi baca jika tidak diisi
        if (empty($validated['estimasi_baca'])) {
            $wordCount = str_word_count(strip_tags($validated['konten']));
            $minutes = max(1, (int) ceil($wordCount / 200));
            $validated['estimasi_baca'] = "{$minutes} Menit Baca";
        }

        // Waktu publikasi
        if ($validated['status'] === 'PUBLISHED' && empty($validated['published_at'])) {
            $validated['published_at'] = Carbon::now();
        }

        Berita::create($validated);

        return redirect()->route('bkk.admin.berita.index')->with('success', 'Berita berhasil dibuat dan diterbitkan!');
    }

    /**
     * Form edit berita.
     */
    public function edit(Request $request, string $id_berita): View
    {
        $authUser = $request->auth_user ?? $request->input('auth_user');

        $berita = is_numeric($id_berita)
            ? Berita::findOrFail($id_berita)
            : Berita::where('slug', $id_berita)->firstOrFail();

        $categories = KategoriBerita::orderBy('nama')->get();

        return view('admin.pages.berita.edit', compact('berita', 'categories', 'authUser'));
    }

    /**
     * Update berita yang ada.
     */
    public function update(Request $request, string $id_berita): RedirectResponse
    {
        $berita = is_numeric($id_berita)
            ? Berita::findOrFail($id_berita)
            : Berita::where('slug', $id_berita)->firstOrFail();

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:berita,slug,' . $berita->id,
            'kategori_id' => 'required|exists:kategori_berita,id',
            'ringkasan' => 'required|string|max:1000',
            'konten' => 'required|string',
            'gambar_sampul' => 'nullable|string|max:1000',
            'gambar_sampul_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'caption_gambar' => 'nullable|string|max:255',
            'penulis_nama' => 'required|string|max:150',
            'penulis_jabatan' => 'nullable|string|max:150',
            'penulis_avatar' => 'nullable|string|max:1000',
            'penulis_bio' => 'nullable|string',
            'estimasi_baca' => 'nullable|string|max:50',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:PUBLISHED,DRAFT',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar_sampul_file')) {
            $path = $request->file('gambar_sampul_file')->store('berita', 'public');
            $validated['gambar_sampul'] = Storage::url($path);
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        if ($validated['status'] === 'PUBLISHED' && empty($berita->published_at) && empty($validated['published_at'])) {
            $validated['published_at'] = Carbon::now();
        }

        $berita->update($validated);

        return redirect()->route('bkk.admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita dari database.
     */
    public function destroy(Request $request, string $id_berita): RedirectResponse
    {
        $berita = is_numeric($id_berita)
            ? Berita::findOrFail($id_berita)
            : Berita::where('slug', $id_berita)->firstOrFail();

        $berita->delete();

        return redirect()->route('bkk.admin.berita.index')->with('success', 'Berita telah berhasil dihapus!');
    }
}
