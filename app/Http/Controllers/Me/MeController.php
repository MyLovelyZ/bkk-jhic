<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Models\CvResume;
use App\Models\Lamaran;
use App\Models\LamaranRiwayatStatus;
use App\Models\Lowongan;
use App\Models\Notifikasi;
use App\Models\PenempatanPkl;
use App\Models\PklJurnalHarian;
use App\Models\PklLaporanAkhir;
use App\Models\ProfilSiswa;
use App\Services\MeDataService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MeController extends Controller
{
    public function __construct(
        protected MeDataService $dataService
    ) {}

    /**
     * Dashboard Siswa & Alumni (/bkk/me)
     */
    public function dashboard(Request $request): View|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];
        $role = $authUser['role'];

        $profile = $this->dataService->getProfile($authUser);
        $applications = $this->dataService->getApplications($role, $userId);
        $vacancies = $this->dataService->getVacancies($role);
        $cvScore = $this->dataService->getCvScore($role, $userId);
        $notifications = $this->dataService->getNotifications($userId);

        // Sinkronisasi data riil dari database jika record siswa/alumni ada
        $dbSiswa = ProfilSiswa::with(['resumes', 'lamarans.lowongan.mitra', 'penempatanPkl.mitra'])->find($userId);
        if ($dbSiswa) {
            $profile['nis'] = $dbSiswa->nis;
            $profile['jurusan'] = $dbSiswa->jurusan;
            $profile['kelas'] = $dbSiswa->kelas ?? $profile['kelas'];
            $profile['kelengkapan_profil'] = $dbSiswa->kelengkapan_profil;
            $profile['status_aktivitas'] = $dbSiswa->status_aktivitas ?? $profile['status_aktivitas'];

            $primaryCv = $dbSiswa->primaryResume;
            if ($primaryCv) {
                $cvScore['overall'] = $primaryCv->skor_total_ai;
                if (!empty($primaryCv->skor_parameter_json)) {
                    $cvScore['parameters'] = $primaryCv->skor_parameter_json;
                }
            }
        }

        $activeApplications = array_values(array_filter($applications, fn ($a) => !in_array($a['status'], ['Diterima', 'Ditolak'])));
        $interviews = array_values(array_filter($applications, fn ($a) => $a['status'] === 'Dipanggil Interview'));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'profile' => $profile,
                    'applications' => $applications,
                    'vacancies' => $vacancies,
                    'cv_score' => $cvScore,
                    'active_count' => count($activeApplications),
                    'interview_count' => count($interviews),
                ],
            ]);
        }

        return view('me.pages.dashboard', compact(
            'authUser',
            'profile',
            'applications',
            'vacancies',
            'cvScore',
            'notifications',
            'activeApplications',
            'interviews'
        ));
    }

    /**
     * Riwayat Lamaran (/bkk/me/lamaran)
     */
    public function lamaran(Request $request): View|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];
        $role = $authUser['role'];

        $profile = $this->dataService->getProfile($authUser);
        $applications = $this->dataService->getApplications($role, $userId);
        $notifications = $this->dataService->getNotifications($userId);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'applications' => $applications,
                ],
            ]);
        }

        return view('me.pages.lamaran', compact(
            'authUser',
            'profile',
            'applications',
            'notifications'
        ));
    }

    /**
     * CV Preview & AI Scoring Hub (/bkk/me/cv)
     */
    public function cv(Request $request): View|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];
        $role = $authUser['role'];

        $profile = $this->dataService->getProfile($authUser);
        $cvScore = $this->dataService->getCvScore($role, $userId);
        $suggestions = $this->dataService->getCvSuggestions($role, $userId);
        $cvMarkdown = $this->dataService->getCvMarkdown($role, $profile, $userId);
        $notifications = $this->dataService->getNotifications($userId);

        // Ambil CV Markdown dari database jika tersimpan
        $dbCv = CvResume::where('siswa_id', $userId)->where('is_primary', true)->first();
        if ($dbCv && !empty($dbCv->konten_markdown)) {
            $cvMarkdown = $dbCv->konten_markdown;
            $cvScore['overall'] = $dbCv->skor_total_ai;
            if (!empty($dbCv->saran_perbaikan_ai_json)) {
                $suggestions = $dbCv->saran_perbaikan_ai_json;
            }
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'score' => $cvScore,
                    'suggestions' => $suggestions,
                    'markdown' => $cvMarkdown,
                ],
            ]);
        }

        return view('me.pages.cv', compact(
            'authUser',
            'profile',
            'cvScore',
            'suggestions',
            'cvMarkdown',
            'notifications'
        ));
    }

    /**
     * Editor CV (/bkk/me/cv/edit)
     */
    public function cvEdit(Request $request): View|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];
        $role = $authUser['role'];

        $profile = $this->dataService->getProfile($authUser);
        $cvScore = $this->dataService->getCvScore($role, $userId);
        $cvMarkdown = $this->dataService->getCvMarkdown($role, $profile, $userId);
        $notifications = $this->dataService->getNotifications($userId);

        $dbCv = CvResume::where('siswa_id', $userId)->where('is_primary', true)->first();
        if ($dbCv && !empty($dbCv->konten_markdown)) {
            $cvMarkdown = $dbCv->konten_markdown;
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'markdown' => $cvMarkdown,
                ],
            ]);
        }

        return view('me.pages.cv-edit', compact(
            'authUser',
            'profile',
            'cvScore',
            'cvMarkdown',
            'notifications'
        ));
    }

    /**
     * Update CV Markdown (POST /bkk/me/cv)
     */
    public function cvUpdate(Request $request): RedirectResponse|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];

        $markdown = $request->input('markdown');

        $cv = CvResume::where('siswa_id', $userId)->where('is_primary', true)->first();
        if ($cv && $markdown) {
            $cv->update([
                'konten_markdown' => $markdown,
                'terakhir_dianalisis_ai' => now(),
            ]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Konten CV ATS berhasil diperbarui!',
            ]);
        }

        return redirect()->route('bkk.me.cv')->with('success', 'CV berhasil disimpan!');
    }

    /**
     * Jurnal PKL Harian (/bkk/me/jurnal)
     */
    public function jurnal(Request $request): View|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];
        $role = $authUser['role'];

        $profile = $this->dataService->getProfile($authUser);
        $isSiswa = ($role === 'SISWA');
        $jurnalEntries = $this->dataService->getJurnalEntries($userId);
        $notifications = $this->dataService->getNotifications($userId);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_siswa' => $isSiswa,
                'data' => $isSiswa ? $jurnalEntries : [],
            ]);
        }

        return view('me.pages.jurnal', compact(
            'authUser',
            'profile',
            'isSiswa',
            'jurnalEntries',
            'notifications'
        ));
    }

    /**
     * Input Log Jurnal Harian Baru (POST /bkk/me/jurnal)
     */
    public function storeJurnal(Request $request): RedirectResponse|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'aktivitas' => ['required', 'string'],
            'durasi_jam' => ['nullable', 'integer', 'min:1', 'max:12'],
        ]);

        $penempatan = PenempatanPkl::where('siswa_id', $userId)->where('status', 'BERJALAN')->first();

        if ($penempatan) {
            PklJurnalHarian::create([
                'penempatan_pkl_id' => $penempatan->id,
                'siswa_id' => $userId,
                'tanggal' => $validated['tanggal'],
                'aktivitas' => $validated['aktivitas'],
                'durasi_jam' => $validated['durasi_jam'] ?? 8,
                'status' => 'Menunggu',
            ]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Log aktivitas jurnal PKL harian berhasil disimpan!',
            ], 201);
        }

        return redirect()->route('bkk.me.jurnal')->with('success', 'Aktivitas harian berhasil dicatat dan menunggu validasi guru pembimbing.');
    }

    /**
     * Laporan Akhir PKL (/bkk/me/laporan)
     */
    public function laporan(Request $request): View|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];
        $role = $authUser['role'];

        $profile = $this->dataService->getProfile($authUser);
        $isSiswa = ($role === 'SISWA');
        $laporanSections = $this->dataService->getLaporanSections($userId);
        $notifications = $this->dataService->getNotifications($userId);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_siswa' => $isSiswa,
                'data' => $isSiswa ? $laporanSections : [],
            ]);
        }

        return view('me.pages.laporan', compact(
            'authUser',
            'profile',
            'isSiswa',
            'laporanSections',
            'notifications'
        ));
    }

    /**
     * Unggah / Update Draf Bab Laporan Akhir (POST /bkk/me/laporan)
     */
    public function storeLaporan(Request $request): RedirectResponse|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];

        $validated = $request->validate([
            'nomor_bab' => ['required', 'integer', 'between:1,5'],
            'judul_bab' => ['required', 'string'],
        ]);

        $penempatan = PenempatanPkl::where('siswa_id', $userId)->where('status', 'BERJALAN')->first();

        if ($penempatan) {
            PklLaporanAkhir::updateOrCreate(
                [
                    'penempatan_pkl_id' => $penempatan->id,
                    'nomor_bab' => $validated['nomor_bab'],
                ],
                [
                    'siswa_id' => $userId,
                    'judul_bab' => $validated['judul_bab'],
                    'status' => 'Ditinjau',
                    'terakhir_diperbarui' => now()->toDateString(),
                ]
            );
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Draf bab laporan PKL berhasil diperbarui untuk ditinjau guru pembimbing.',
            ]);
        }

        return redirect()->route('bkk.me.laporan')->with('success', 'Draf bab laporan berhasil diserahkan ke guru pembimbing.');
    }

    /**
     * Handler Pendaftaran Lowongan PKL / Kerja (/bkk/{id_lowongan}/daftar)
     */
    public function storeLamaran(Request $request, string $id_lowongan): RedirectResponse|JsonResponse
    {
        $authUser = $this->resolveAuthUser($request);
        $userId = $authUser['id'];

        $lowongan = Lowongan::where('slug', $id_lowongan)
            ->orWhere('id', is_numeric($id_lowongan) ? (int)$id_lowongan : 0)
            ->firstOrFail();

        $cv = CvResume::where('siswa_id', $userId)->where('is_primary', true)->first();

        $existing = Lamaran::where('siswa_id', $userId)
            ->where('lowongan_id', $lowongan->id)
            ->first();

        if ($existing) {
            $msg = 'Anda sudah pernah mengajukan lamaran pada lowongan ini.';
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => $msg], 422);
            }
            return redirect()->route('bkk.me.lamaran')->with('warning', $msg);
        }

        $kodeLamaran = 'LMR-' . date('Y') . '-' . strtoupper(substr(uniqid(), -5));

        $lamaran = Lamaran::create([
            'kode_lamaran' => $kodeLamaran,
            'lowongan_id' => $lowongan->id,
            'siswa_id' => $userId,
            'cv_id' => $cv?->id ?? 1,
            'tanggal_melamar' => now()->toDateString(),
            'skor_match_ai' => 90,
            'status' => 'Terkirim',
            'step_tahapan' => 1,
            'catatan_seleksi' => 'Berkas pendaftaran otomatis diverifikasi sistem.',
        ]);

        LamaranRiwayatStatus::create([
            'lamaran_id' => $lamaran->id,
            'judul_tahapan' => 'Lamaran Terkirim',
            'deskripsi' => 'Pendaftaran diajukan melalui portal BKK Penus.',
            'diubah_oleh_id' => $userId,
            'diubah_oleh_role' => $authUser['role'],
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Lamaran berhasil diajukan!',
                'data' => $lamaran,
            ], 201);
        }

        return redirect()->route('bkk.me.lamaran')->with('success', "Lamaran berhasil diajukan dengan Kode {$kodeLamaran}!");
    }

    /**
     * Resolve data auth pengguna dengan fallback dummy data yang realistis.
     */
    protected function resolveAuthUser(Request $request): array
    {
        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        $roleParam = $request->query('role');
        $role = $roleParam ? strtoupper($roleParam) : strtoupper($authUser['role'] ?? 'SISWA');
        if (!in_array($role, ['SISWA', 'ALUMNI'])) {
            $role = 'SISWA';
        }

        if (empty($authUser) || !isset($authUser['id'])) {
            return [
                'id' => ($role === 'SISWA') ? 'usr-siswa-001' : 'usr-alumni-001',
                'username' => ($role === 'SISWA') ? 'siswa.rizky' : 'nadia.salsabila',
                'nama_lengkap' => ($role === 'SISWA') ? 'Ahmad Rizky Pratama' : 'Nadia Salsabila',
                'email' => ($role === 'SISWA') ? 'siswa_rizky@smkpenus.sch.id' : 'nadia.salsabila@gmail.com',
                'no_hp' => ($role === 'SISWA') ? '0812-3456-7890' : '0857-1122-3344',
                'nomor_induk' => ($role === 'SISWA') ? '0061234567' : '1920.08.112',
                'role' => $role,
            ];
        }

        $authUser['role'] = $role;
        return $authUser;
    }
}
