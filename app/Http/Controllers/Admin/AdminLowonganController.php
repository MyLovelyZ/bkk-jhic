<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLowonganController extends Controller
{
    /**
     * Moderasi dan Katalog Seluruh Lowongan Industri (/bkk/admin/lowongan)
     */
    public function index(Request $request): View|JsonResponse
    {
        $query = Lowongan::with('mitra');

        $search = $request->input('q');
        if (!empty($search)) {
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $like) {
                $q->where('judul', $like, "%{$search}%")
                  ->orWhere('target_jurusan', $like, "%{$search}%")
                  ->orWhereHas('mitra', fn ($m) => $m->where('nama_perusahaan', $like, "%{$search}%"));
            });
        }

        $tipe = $request->input('tipe');
        if (!empty($tipe) && $tipe !== 'Semua') {
            $query->where('tipe', $tipe);
        }

        $status = $request->input('status');
        if (!empty($status) && $status !== 'Semua') {
            $query->where('status', $status);
        }

        $lowongans = $query->latest('created_at')->paginate(10)->withQueryString();

        $stats = [
            'total' => Lowongan::count(),
            'aktif' => Lowongan::where('status', 'Aktif')->count(),
            'ditutup' => Lowongan::where('status', 'Ditutup')->count(),
            'draft' => Lowongan::where('status', 'Draft')->count(),
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'stats' => $stats,
                'data' => $lowongans,
            ]);
        }

        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        return view('admin.pages.dashboard', compact('authUser', 'lowongans', 'stats'));
    }

    /**
     * Update status publikasi lowongan oleh Admin BKK.
     */
    public function updateStatus(Request $request, string $id): RedirectResponse|JsonResponse
    {
        $lowongan = Lowongan::findOrFail($id);
        $newStatus = $request->input('status', 'Aktif');

        $lowongan->update(['status' => $newStatus]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Status lowongan berhasil diperbarui menjadi {$newStatus}.",
                'data' => $lowongan,
            ]);
        }

        return back()->with('success', "Status lowongan berhasil diubah menjadi {$newStatus}.");
    }
}
