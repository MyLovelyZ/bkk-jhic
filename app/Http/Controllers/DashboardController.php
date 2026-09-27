<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard utama admin BKK (hanya dapat diakses role yang diizinkan).
     */
    public function index(Request $request): View|JsonResponse
    {
        // Mengambil metadata user yang telah dimerge oleh VerifyAuthToken middleware
        $authUser = $request->auth_user ?? $request->input('auth_user');

        $stats = [
            'total_berita' => Berita::count(),
            'total_published' => Berita::where('status', 'PUBLISHED')->count(),
            'total_draft' => Berita::where('status', 'DRAFT')->count(),
            'total_views' => Berita::sum('views_count'),
            'total_kategori' => KategoriBerita::count(),
        ];

        $recentBeritas = Berita::with('kategori')
            ->latest('created_at')
            ->take(5)
            ->get();

        $kategoriList = KategoriBerita::withCount('beritas')->get();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $authUser,
                    'stats' => $stats,
                    'kategori' => $kategoriList,
                ],
            ]);
        }

        return view('admin.pages.dashboard', compact('authUser', 'stats', 'recentBeritas', 'kategoriList'));
    }

    /**
     * Profil pengguna terautentikasi di dashboard bkk.
     */
    public function profile(Request $request): View|JsonResponse
    {
        $authUser = $request->auth_user ?? $request->input('auth_user');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $authUser,
            ]);
        }

        return view('bkk.dashboard', compact('authUser'));
    }
}
