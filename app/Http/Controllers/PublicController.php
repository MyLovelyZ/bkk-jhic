<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\PermohonanKerjasama;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * Endpoint publik utama BKK (Landpage).
     */
    public function index(Request $request): View|JsonResponse
    {
        $latestBerita = Berita::published()
            ->with('kategori')
            ->latest('published_at')
            ->take(3)
            ->get();

        $featuredLowongan = Lowongan::with('mitra')
            ->where('status', 'Aktif')
            ->latest('created_at')
            ->take(4)
            ->get();

        $mitraCount = Mitra::verified()->count();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'prefix' => '/bkk',
                    'berita' => $latestBerita,
                    'lowongan' => $featuredLowongan,
                    'total_mitra' => $mitraCount,
                ],
            ]);
        }

        return view('index.pages.index', compact('latestBerita', 'featuredLowongan', 'mitraCount'));
    }

    /**
     * Endpoint informasi BKK.
     */
    public function info(Request $request): View|JsonResponse
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'bkk Info',
            ]);
        }

        return view('index.pages.index');
    }

    /**
     * Daftar Berita & Agenda BKK.
     */
    public function berita(Request $request): View
    {
        $kategoriSlug = $request->input('kategori');
        $searchQuery = $request->input('q');

        $categories = KategoriBerita::withCount(['beritas' => fn ($q) => $q->where('status', 'PUBLISHED')])->get();
        $totalPublished = Berita::published()->count();

        $heroBerita = null;
        if (empty($kategoriSlug) && empty($searchQuery) && ($request->input('page', 1) == 1)) {
            $heroBerita = Berita::published()
                ->where('is_featured', true)
                ->latest('published_at')
                ->first() ?? Berita::published()->latest('published_at')->first();
        }

        $query = Berita::published()->with('kategori');

        if ($heroBerita) {
            $query->where('id', '!=', $heroBerita->id);
        }

        if (!empty($searchQuery)) {
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($searchQuery, $like) {
                $q->where('judul', $like, "%{$searchQuery}%")
                  ->orWhere('ringkasan', $like, "%{$searchQuery}%")
                  ->orWhere('penulis_nama', $like, "%{$searchQuery}%");
            });
        }

        if (!empty($kategoriSlug)) {
            $query->whereHas('kategori', fn ($k) => $k->where('slug', $kategoriSlug));
        }

        $beritas = $query->latest('published_at')->paginate(6)->withQueryString();

        return view('index.pages.berita', compact(
            'categories',
            'totalPublished',
            'heroBerita',
            'beritas',
            'kategoriSlug',
            'searchQuery'
        ));
    }

    /**
     * Detail Berita BKK.
     */
    public function beritaDetail(string $id_berita): View
    {
        $berita = Berita::published()
            ->with('kategori')
            ->where(function ($query) use ($id_berita) {
                $query->where('slug', $id_berita);
                if (is_numeric($id_berita)) {
                    $query->orWhere('id', (int) $id_berita);
                }
            })
            ->firstOrFail();

        $berita->increment('views_count');

        $relatedBerita = Berita::published()
            ->where('id', '!=', $berita->id)
            ->where('kategori_id', $berita->kategori_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedBerita->count() < 3) {
            $fallback = Berita::published()
                ->where('id', '!=', $berita->id)
                ->whereNotIn('id', $relatedBerita->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedBerita->count())
                ->get();
            $relatedBerita = $relatedBerita->merge($fallback);
        }

        return view('index.pages.berita-detail', compact('berita', 'relatedBerita'));
    }

    /**
     * Daftar Lowongan PKL & Kerja BKK.
     */
    public function lowongan(Request $request): View|JsonResponse
    {
        $query = Lowongan::with('mitra')->where('status', 'Aktif');

        $searchQuery = $request->input('q');
        if (!empty($searchQuery)) {
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($searchQuery, $like) {
                $q->where('judul', $like, "%{$searchQuery}%")
                  ->orWhere('target_jurusan', $like, "%{$searchQuery}%")
                  ->orWhere('lokasi', $like, "%{$searchQuery}%")
                  ->orWhereHas('mitra', fn ($m) => $m->where('nama_perusahaan', $like, "%{$searchQuery}%"));
            });
        }

        $tipe = $request->input('tipe');
        if (!empty($tipe) && in_array(strtolower($tipe), ['pkl', 'kerja'])) {
            $query->where('tipe', ucfirst(strtolower($tipe)));
        }

        $jurusan = $request->input('jurusan');
        if (!empty($jurusan) && $jurusan !== 'all') {
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where('target_jurusan', $like, "%{$jurusan}%");
        }

        $lowongans = $query->latest('created_at')->paginate(9)->withQueryString();
        $totalLowongan = Lowongan::where('status', 'Aktif')->count();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'total' => $totalLowongan,
                    'lowongan' => $lowongans,
                ],
            ]);
        }

        return view('index.pages.lowongan', compact('lowongans', 'totalLowongan', 'searchQuery', 'tipe', 'jurusan'));
    }

    /**
     * Detail Lowongan PKL & Kerja BKK.
     */
    public function lowonganDetail(Request $request, string $id_lowongan): View|JsonResponse
    {
        $lowongan = Lowongan::with('mitra')
            ->where(function ($q) use ($id_lowongan) {
                $q->where('slug', $id_lowongan);
                if (is_numeric($id_lowongan)) {
                    $q->orWhere('id', (int) $id_lowongan);
                }
            })
            ->first();

        if ($lowongan) {
            $lowongan->increment('views_count');
        }

        $relatedLowongan = Lowongan::with('mitra')
            ->where('status', 'Aktif')
            ->when($lowongan, fn ($q) => $q->where('id', '!=', $lowongan->id))
            ->latest('created_at')
            ->take(3)
            ->get();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'lowongan' => $lowongan,
                    'related' => $relatedLowongan,
                ],
            ]);
        }

        return view('index.pages.lowongan-detail', compact('id_lowongan', 'lowongan', 'relatedLowongan'));
    }

    /**
     * Halaman Profil & Struktur Tentang BKK.
     */
    public function tentang(): View
    {
        return view('index.pages.tentang');
    }

    /**
     * Halaman Informasi Kemitraan & Kerja Sama IDUKA.
     */
    public function kerjasama(): View
    {
        $mitraList = Mitra::verified()->latest()->take(12)->get();
        return view('index.pages.kerjasama', compact('mitraList'));
    }

    /**
     * Handler submit formulir permohonan kerja sama dari laman publik.
     */
    public function storeKerjasama(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'nama_perusahaan' => ['required', 'string', 'max:200'],
            'bidang_usaha' => ['required', 'string', 'max:150'],
            'alamat_perusahaan' => ['required', 'string'],
            'email_resmi' => ['required', 'email', 'max:150'],
            'no_telepon' => ['required', 'string', 'max:50'],
            'nama_pic' => ['required', 'string', 'max:150'],
            'jabatan_pic' => ['required', 'string', 'max:150'],
            'jenis_kerjasama' => ['nullable', 'array'],
            'pesan_tambahan' => ['nullable', 'string'],
        ]);

        $jenisKerjasama = $validated['jenis_kerjasama'] ?? ['PKL / Magang Siswa'];

        $permohonan = PermohonanKerjasama::create([
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'bidang_usaha' => $validated['bidang_usaha'],
            'alamat_perusahaan' => $validated['alamat_perusahaan'],
            'email_resmi' => $validated['email_resmi'],
            'no_telepon' => $validated['no_telepon'],
            'nama_pic' => $validated['nama_pic'],
            'jabatan_pic' => $validated['jabatan_pic'],
            'jenis_kerjasama' => $jenisKerjasama,
            'pesan_tambahan' => $validated['pesan_tambahan'] ?? null,
            'status' => 'MENUNGGU_REVIEW',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Permohonan kerja sama berhasil dikirimkan ke tim BKK SMK Pelita Nusantara.',
                'data' => $permohonan,
            ], 201);
        }

        return redirect()
            ->route('bkk.kerjasama')
            ->with('success', 'Terima kasih! Permohonan kerja sama industri Anda telah berhasil dikirimkan ke tim BKK SMK Plus Pelita Nusantara. Tim kami akan segera menghubungi PIC yang bersangkutan.');
    }
}
