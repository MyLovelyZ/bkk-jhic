<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenempatanPkl;
use App\Models\PklJurnalHarian;
use App\Models\PklLaporanAkhir;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPklController extends Controller
{
    /**
     * Monitoring Siswa PKL Aktif di Industri (/bkk/admin/pkl/monitoring)
     */
    public function monitoring(Request $request): View|JsonResponse
    {
        $query = PenempatanPkl::with(['siswa', 'mitra', 'lowongan']);

        $status = $request->input('status');
        if (!empty($status) && $status !== 'Semua') {
            $query->where('status', $status);
        }

        $penempatan = $query->latest('created_at')->paginate(10)->withQueryString();

        $stats = [
            'total_penempatan' => PenempatanPkl::count(),
            'berjalan' => PenempatanPkl::where('status', 'BERJALAN')->count(),
            'selesai' => PenempatanPkl::where('status', 'SELESAI')->count(),
            'jurnal_menunggu' => PklJurnalHarian::where('status', 'Menunggu')->count(),
            'laporan_ditinjau' => PklLaporanAkhir::where('status', 'Ditinjau')->count(),
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'stats' => $stats,
                'data' => $penempatan,
            ]);
        }

        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        return view('admin.pages.dashboard', compact('authUser', 'penempatan', 'stats'));
    }

    /**
     * Validasi Log Jurnal Harian PKL
     */
    public function validateJurnal(Request $request, string $id): RedirectResponse|JsonResponse
    {
        $jurnal = PklJurnalHarian::findOrFail($id);
        $status = $request->input('status', 'Disetujui');
        $catatan = $request->input('catatan_revisi');

        $jurnal->update([
            'status' => $status,
            'catatan_revisi' => $catatan,
            'divalidasi_oleh' => $request->auth_user['id'] ?? 'adm-bkk-001',
            'divalidasi_pada' => now(),
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Jurnal harian berhasil divalidasi ({$status}).",
                'data' => $jurnal,
            ]);
        }

        return back()->with('success', "Jurnal berhasil divalidasi.");
    }

    /**
     * Validasi Bab Naskah Laporan Akhir PKL
     */
    public function validateLaporan(Request $request, string $id): RedirectResponse|JsonResponse
    {
        $laporan = PklLaporanAkhir::findOrFail($id);
        $status = $request->input('status', 'Disetujui');
        $catatan = $request->input('catatan_pembimbing');

        $laporan->update([
            'status' => $status,
            'catatan_pembimbing' => $catatan,
            'divalidasi_oleh' => $request->auth_user['id'] ?? 'adm-bkk-001',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Bab laporan PKL berhasil diperbarui statusnya ({$status}).",
                'data' => $laporan,
            ]);
        }

        return back()->with('success', "Laporan berhasil diperbarui.");
    }
}
