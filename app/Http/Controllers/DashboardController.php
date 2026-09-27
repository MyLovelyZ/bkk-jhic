<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\PenempatanPkl;
use App\Models\TracerRespon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard utama admin BKK.
     */
    public function index(Request $request): View|JsonResponse
    {
        $authUser = $request->auth_user ?? $request->input('auth_user');

        $stats = [
            'total_berita' => Berita::count(),
            'total_published' => Berita::where('status', 'PUBLISHED')->count(),
            'total_draft' => Berita::where('status', 'DRAFT')->count(),
            'total_views' => Berita::sum('views_count'),
            'total_kategori' => KategoriBerita::count(),
            'total_lowongan' => Lowongan::count(),
            'total_lowongan_aktif' => Lowongan::where('status', 'Aktif')->count(),
            'total_mitra' => Mitra::count(),
            'total_mitra_verified' => Mitra::where('is_verified', true)->count(),
            'total_siswa_pkl' => PenempatanPkl::where('status', 'BERJALAN')->count(),
            'total_pelamar' => Lamaran::count(),
            'total_tracer_respon' => TracerRespon::count(),
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
