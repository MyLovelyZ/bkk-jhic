<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TracerKuesioner;
use App\Models\TracerRespon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminTracerController extends Controller
{
    /**
     * Dashboard dan Rekapitulasi Tracer Study Alumni (/bkk/admin/tracer-study)
     */
    public function index(Request $request): View|JsonResponse
    {
        $kuesioners = TracerKuesioner::withCount(['pertanyaans', 'respons'])->latest()->get();

        $totalRespon = TracerRespon::count();

        $bmwStats = [
            'bekerja' => TracerRespon::where('status_keterserapan', 'Bekerja')->count(),
            'melanjutkan' => TracerRespon::where('status_keterserapan', 'Melanjutkan Pendidikan')->count(),
            'wirausaha' => TracerRespon::where('status_keterserapan', 'Wirausaha')->count(),
            'mencari_kerja' => TracerRespon::where('status_keterserapan', 'Mencari Kerja')->count(),
        ];

        $relevansi = [
            'sangat_selaras' => TracerRespon::where('keselarasan_jurusan', 'Sangat Selaras')->count(),
            'selaras' => TracerRespon::where('keselarasan_jurusan', 'Selaras')->count(),
            'kurang_selaras' => TracerRespon::where('keselarasan_jurusan', 'Kurang Selaras')->count(),
            'tidak_selaras' => TracerRespon::where('keselarasan_jurusan', 'Tidak Selaras')->count(),
        ];

        $avgWaktuTunggu = TracerRespon::whereNotNull('waktu_tunggu_bulan')->avg('waktu_tunggu_bulan') ?? 0;

        $stats = [
            'total_respon' => $totalRespon,
            'bmw' => $bmwStats,
            'keselarasan' => $relevansi,
            'rata_rata_waktu_tunggu_bulan' => round($avgWaktuTunggu, 1),
        ];

        $recentResponses = TracerRespon::with(['profilSiswa', 'kuesioner'])
            ->latest('tanggal_pengisian')
            ->paginate(10);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'kuesioner' => $kuesioners,
                'stats' => $stats,
                'recent_responses' => $recentResponses,
            ]);
        }

        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        return view('admin.pages.tracer.index', compact('authUser', 'kuesioners', 'stats', 'recentResponses'));
    }

    /**
     * Buat Kuesioner Tracer Study Baru
     */
    public function kuesionerStore(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'tahun_sasaran_lulusan' => ['required', 'string', 'max:10'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $kuesioner = TracerKuesioner::create([
            'judul' => $validated['judul'],
            'slug' => Str::slug($validated['judul']) . '-' . Str::random(5),
            'tahun_sasaran_lulusan' => $validated['tahun_sasaran_lulusan'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'is_aktif' => true,
            'created_by' => $request->auth_user['id'] ?? 'adm-bkk-001',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Instrumen kuesioner tracer study berhasil dibuat!',
                'data' => $kuesioner,
            ], 201);
        }

        return back()->with('success', "Instrumen kuesioner tracer study '{$kuesioner->judul}' berhasil diterbitkan.");
    }
}
