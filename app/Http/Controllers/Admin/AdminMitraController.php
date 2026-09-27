<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\PermohonanKerjasama;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminMitraController extends Controller
{
    /**
     * Daftar Mitra IDUKA dan Verifikasi MoU (/bkk/admin/mitra)
     */
    public function index(Request $request): View|JsonResponse
    {
        $query = Mitra::withCount(['lowongans', 'penempatanPkl']);

        $search = $request->input('q');
        if (!empty($search)) {
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $like) {
                $q->where('nama_perusahaan', $like, "%{$search}%")
                  ->orWhere('kota', $like, "%{$search}%")
                  ->orWhere('npwp', $like, "%{$search}%")
                  ->orWhere('sektor_industri', $like, "%{$search}%");
            });
        }

        $mitras = $query->latest('created_at')->paginate(10)->withQueryString();

        $stats = [
            'total_mitra' => Mitra::count(),
            'verified' => Mitra::where('is_verified', true)->count(),
            'pending_verifikasi' => Mitra::where('is_verified', false)->count(),
            'permohonan_masuk' => PermohonanKerjasama::where('status', 'MENUNGGU_REVIEW')->count(),
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'stats' => $stats,
                'data' => $mitras,
            ]);
        }

        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        return view('admin.pages.dashboard', compact('authUser', 'mitras', 'stats'));
    }

    /**
     * Verifikasi atau Nonaktifkan Akun Mitra IDUKA.
     */
    public function toggleVerify(Request $request, string $id): RedirectResponse|JsonResponse
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->update([
            'is_verified' => !$mitra->is_verified,
        ]);

        $statusText = $mitra->is_verified ? 'Terverifikasi' : 'Dinonaktifkan';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Mitra {$mitra->nama_perusahaan} status diperbarui: {$statusText}.",
                'is_verified' => $mitra->is_verified,
            ]);
        }

        return back()->with('success', "Status kemitraan {$mitra->nama_perusahaan} berhasil diubah.");
    }

    /**
     * Daftar Permohonan Kerja Sama Baru dari Publik (/bkk/admin/mitra/permohonan)
     */
    public function permohonanIndex(Request $request): View|JsonResponse
    {
        $permohonan = PermohonanKerjasama::latest('created_at')->paginate(10);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $permohonan,
            ]);
        }

        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        return view('admin.pages.dashboard', compact('authUser', 'permohonan'));
    }

    /**
     * Approve / Tolak Permohonan Kerja Sama.
     */
    public function permohonanUpdateStatus(Request $request, string $id): RedirectResponse|JsonResponse
    {
        $permohonan = PermohonanKerjasama::findOrFail($id);
        $newStatus = $request->input('status', 'DISETUJUI');
        $catatan = $request->input('catatan_admin');

        $permohonan->update([
            'status' => $newStatus,
            'catatan_admin' => $catatan,
            'diproses_oleh' => $request->auth_user['id'] ?? 'adm-bkk-001',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Permohonan kerja sama berhasil diupdate menjadi {$newStatus}.",
                'data' => $permohonan,
            ]);
        }

        return back()->with('success', "Permohonan berhasil diupdate.");
    }
}
