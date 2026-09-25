<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\JsonResponse;
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

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'prefix' => '/bkk',
                    'berita' => $latestBerita,
                ],
            ]);
        }

        return view('index.pages.index', compact('latestBerita'));
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

        // Hero article (hanya ditampilkan di halaman 1 ketika tidak sedang mencari/memfilter kategori spesifik)
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

        // Increment hit counter
        $berita->increment('views_count');

        // Rekomendasi bacaan terkait (kategori yang sama atau artikel terkini lainnya)
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
    public function lowongan(): View
    {
        return view('index.pages.lowongan');
    }

    /**
     * Detail Lowongan PKL & Kerja BKK.
     */
    public function lowonganDetail(string $id_lowongan): View
    {
        return view('index.pages.lowongan-detail', compact('id_lowongan'));
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
        return view('index.pages.kerjasama');
    }
}
