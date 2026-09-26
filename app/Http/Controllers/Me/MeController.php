<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Services\MeDataService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MeController extends Controller
{
    public function __construct(
        protected MeDataService $dataService
    ) {}

    /**
     * Dashboard Siswa & Alumni (/bkk/me) - 100% Data Dummy Tanpa Fetching Database
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
     * Riwayat Lamaran (/bkk/me/lamaran) - 100% Data Dummy Tanpa Fetching Database
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
     * CV Preview & AI Scoring Hub (/bkk/me/cv) - 100% Data Dummy Tanpa Fetching Database
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
     * Editor CV (/bkk/me/cv/edit) - 100% Data Dummy Tanpa Fetching Database
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
     * Jurnal PKL Harian (/bkk/me/jurnal) - 100% Data Dummy Tanpa Fetching Database
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
     * Laporan Akhir PKL (/bkk/me/laporan) - 100% Data Dummy Tanpa Fetching Database
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
     * Resolve data auth pengguna dengan fallback dummy data yang realistis.
     * Tidak melakukan query apapun ke database.
     */
    protected function resolveAuthUser(Request $request): array
    {
        $authUser = $request->auth_user ?? $request->input('auth_user') ?? [];

        // Dukungan pengujian role via parameter query (?role=alumni / ?role=siswa)
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
