<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Services\MitraDataService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MitraController extends Controller
{
    public function __construct(
        protected MitraDataService $dataService
    ) {}

    /**
     * Dashboard Overview Mitra (/bkk/dashboard)
     */
    public function dashboard(Request $request): View
    {
        $profile = $this->dataService->getProfile();
        $metrics = $this->dataService->getDashboardMetrics();
        $vacancies = $this->dataService->getVacancies();
        $allApplicants = $this->dataService->getAllApplicants();

        // Ambil 4 pelamar terbaru
        $recentApplicants = array_slice($allApplicants, 0, 4);

        return view('mitra.pages.dashboard', compact(
            'profile',
            'metrics',
            'vacancies',
            'recentApplicants'
        ));
    }

    /**
     * Daftar Seluruh Lowongan (/bkk/dashboard/lowongan)
     */
    public function lowonganIndex(Request $request): View
    {
        $profile = $this->dataService->getProfile();
        $vacancies = $this->dataService->getVacancies();

        $search = strtolower(trim((string) $request->query('q', '')));
        $statusFilter = $request->query('status');
        $tipeFilter = $request->query('tipe');

        if (!empty($search)) {
            $vacancies = array_values(array_filter($vacancies, function ($v) use ($search) {
                return str_contains(strtolower($v['title']), $search)
                    || str_contains(strtolower($v['jurusan']), $search)
                    || str_contains(strtolower($v['lokasi']), $search);
            }));
        }

        if (!empty($statusFilter) && $statusFilter !== 'Semua') {
            $vacancies = array_values(array_filter($vacancies, fn ($v) => $v['status'] === $statusFilter));
        }

        if (!empty($tipeFilter) && $tipeFilter !== 'Semua') {
            $vacancies = array_values(array_filter($vacancies, fn ($v) => $v['tipe'] === $tipeFilter));
        }

        return view('mitra.pages.lowongan.index', compact(
            'profile',
            'vacancies',
            'search',
            'statusFilter',
            'tipeFilter'
        ));
    }

    /**
     * Form Tambah Lowongan Baru (/bkk/dashboard/lowongan/new)
     */
    public function lowonganCreate(Request $request): View
    {
        $profile = $this->dataService->getProfile();
        return view('mitra.pages.lowongan.create', compact('profile'));
    }

    /**
     * Handler Simpan Lowongan Baru (POST /bkk/dashboard/lowongan)
     */
    public function lowonganStore(Request $request): RedirectResponse
    {
        $title = $request->input('title', 'Lowongan Baru');
        return redirect()
            ->route('bkk.mitra.lowongan.index')
            ->with('success', "Lowongan '{$title}' berhasil dipublikasikan dan dapat diakses siswa/alumni BKK!");
    }

    /**
     * Form Edit Lowongan (/bkk/dashboard/lowongan/{id_lowongan})
     */
    public function lowonganEdit(Request $request, string $id_lowongan): View
    {
        $profile = $this->dataService->getProfile();
        $vacancy = $this->dataService->getVacancyById($id_lowongan);

        if (!$vacancy) {
            // Fallback ke lowongan pertama jika ID tidak ditemukan di mock
            $all = $this->dataService->getVacancies();
            $vacancy = $all[0];
        }

        return view('mitra.pages.lowongan.edit', compact('profile', 'vacancy'));
    }

    /**
     * Handler Update Lowongan (PUT /bkk/dashboard/lowongan/{id_lowongan})
     */
    public function lowonganUpdate(Request $request, string $id_lowongan): RedirectResponse
    {
        $title = $request->input('title', 'Lowongan');
        return redirect()
            ->route('bkk.mitra.lowongan.index')
            ->with('success', "Perubahan data lowongan '{$title}' berhasil disimpan!");
    }

    /**
     * Handler Hapus / Nonaktifkan Lowongan (DELETE /bkk/dashboard/lowongan/{id_lowongan})
     */
    public function lowonganDestroy(Request $request, string $id_lowongan): RedirectResponse
    {
        return redirect()
            ->route('bkk.mitra.lowongan.index')
            ->with('success', "Lowongan dengan ID '{$id_lowongan}' berhasil diarsipkan/dihapus.");
    }

    /**
     * Daftar CV Pelamar pada Spesifik Lowongan (/bkk/dashboard/lowongan/{id_lowongan}/pelamar)
     */
    public function pelamarIndex(Request $request, string $id_lowongan): View
    {
        $profile = $this->dataService->getProfile();
        $vacancy = $this->dataService->getVacancyById($id_lowongan);

        if (!$vacancy) {
            $all = $this->dataService->getVacancies();
            $vacancy = $all[0];
            $id_lowongan = $vacancy['id'];
        }

        $applicants = $this->dataService->getApplicantsByVacancy($id_lowongan);
        if (empty($applicants)) {
            $applicants = $this->dataService->getAllApplicants();
        }

        $search = strtolower(trim((string) $request->query('q', '')));
        $statusFilter = $request->query('status');

        if (!empty($search)) {
            $applicants = array_values(array_filter($applicants, function ($a) use ($search) {
                return str_contains(strtolower($a['nama']), $search)
                    || str_contains(strtolower($a['jurusan']), $search)
                    || str_contains(strtolower($a['status_pendidikan']), $search);
            }));
        }

        if (!empty($statusFilter) && $statusFilter !== 'Semua') {
            $applicants = array_values(array_filter($applicants, fn ($a) => $a['status'] === $statusFilter));
        }

        return view('mitra.pages.pelamar.index', compact(
            'profile',
            'vacancy',
            'applicants',
            'search',
            'statusFilter'
        ));
    }

    /**
     * Detail Pelamar, Review CV, dan Form Status Seleksi
     * (/bkk/dashboard/lowongan/{id_lowongan}/pelamar/{id_pelamar})
     */
    public function pelamarShow(Request $request, string $id_lowongan, string $id_pelamar): View
    {
        $profile = $this->dataService->getProfile();
        $vacancy = $this->dataService->getVacancyById($id_lowongan);

        if (!$vacancy) {
            $all = $this->dataService->getVacancies();
            $vacancy = $all[0];
        }

        $applicant = $this->dataService->getApplicant($id_lowongan, $id_pelamar);
        if (!$applicant) {
            $allApplicants = $this->dataService->getAllApplicants();
            $applicant = $allApplicants[0];
        }

        $cvMarkdown = $this->dataService->getApplicantCvMarkdown($applicant);

        return view('mitra.pages.pelamar.detail', compact(
            'profile',
            'vacancy',
            'applicant',
            'cvMarkdown'
        ));
    }

    /**
     * Handler Update Status Seleksi Pelamar
     * (POST /bkk/dashboard/lowongan/{id_lowongan}/pelamar/{id_pelamar}/status)
     */
    public function pelamarUpdateStatus(Request $request, string $id_lowongan, string $id_pelamar): RedirectResponse
    {
        $newStatus = $request->input('status', 'Dipanggil');
        $namaPelamar = $request->input('nama', 'Pelamar');
        $notes = $request->input('catatan_seleksi', '');

        return redirect()
            ->route('bkk.mitra.pelamar.show', [$id_lowongan, $id_pelamar])
            ->with('success', "Status seleksi untuk {$namaPelamar} berhasil diperbarui menjadi '{$newStatus}'! Notifikasi otomatis terkirim ke portal siswa.");
    }
}
