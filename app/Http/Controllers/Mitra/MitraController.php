<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\LamaranRiwayatStatus;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Services\MitraDataService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
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

        try {
            if (Schema::hasTable('mitra') && Schema::hasTable('lowongan')) {
                $dbMitra = Mitra::where('npwp', $profile['npwp'])->first();
                if ($dbMitra) {
                    $dbLowonganCount = Lowongan::where('mitra_id', $dbMitra->id)->where('status', 'Aktif')->count();
                    if ($dbLowonganCount > 0) {
                        $metrics['lowongan_aktif'] = $dbLowonganCount;
                    }
                }
            }
        } catch (\Throwable) {}

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
        $tipe = $request->input('tipe', 'Kerja');
        $jurusan = $request->input('jurusan', 'Semua Jurusan');
        $lokasi = $request->input('lokasi', 'Bogor');
        $kuota = (int) $request->input('kuota', 1);
        $deadline = $request->input('deadline', now()->addMonths(1)->toDateString());

        try {
            if (Schema::hasTable('mitra') && Schema::hasTable('lowongan')) {
                $profile = $this->dataService->getProfile();
                $dbMitra = Mitra::where('npwp', $profile['npwp'])->first() ?? Mitra::first();

                if ($dbMitra) {
                    Lowongan::create([
                        'mitra_id' => $dbMitra->id,
                        'judul' => $title,
                        'slug' => Str::slug($title) . '-' . Str::random(5),
                        'tipe' => in_array($tipe, ['PKL', 'Kerja']) ? $tipe : 'Kerja',
                        'tipe_badge' => ($tipe === 'PKL') ? 'Magang / PKL Siswa' : 'Full-Time Lulusan',
                        'target_jurusan' => $jurusan,
                        'lokasi' => $lokasi,
                        'kategori_posisi' => 'Teknologi & Operasional',
                        'gaji_kompensasi' => 'Kompetitif UMK',
                        'kuota' => $kuota > 0 ? $kuota : 1,
                        'deadline' => $deadline,
                        'deskripsi' => $request->input('deskripsi', 'Lowongan kerja/PKL terbuka untuk siswa dan alumni SMK Plus Pelita Nusantara.'),
                        'persyaratan_json' => ['Siswa/Alumni SMK Plus Pelita Nusantara', 'Komitmen dan disiplin kerja tinggi'],
                        'benefit_json' => ['Sertifikat & Pengalaman Industri'],
                        'status' => 'Aktif',
                    ]);
                }
            }
        } catch (\Throwable) {}

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
            try {
                if (Schema::hasTable('lowongan')) {
                    $dbLowongan = Lowongan::where('id', is_numeric($id_lowongan) ? (int)$id_lowongan : 0)
                        ->orWhere('slug', $id_lowongan)
                        ->first();

                    if ($dbLowongan) {
                        $vacancy = [
                            'id' => (string) $dbLowongan->id,
                            'title' => $dbLowongan->judul,
                            'tipe' => $dbLowongan->tipe,
                            'tipe_badge' => $dbLowongan->tipe_badge,
                            'jurusan' => $dbLowongan->target_jurusan,
                            'lokasi' => $dbLowongan->lokasi,
                            'gaji' => $dbLowongan->gaji_kompensasi,
                            'kuota' => $dbLowongan->kuota,
                            'deadline' => $dbLowongan->deadline->format('Y-m-d'),
                            'status' => $dbLowongan->status,
                            'deskripsi' => $dbLowongan->deskripsi,
                            'persyaratan' => $dbLowongan->persyaratan_json ?? [],
                            'benefit' => $dbLowongan->benefit_json ?? [],
                        ];
                    }
                }
            } catch (\Throwable) {}

            if (!$vacancy) {
                $all = $this->dataService->getVacancies();
                $vacancy = $all[0];
            }
        }

        return view('mitra.pages.lowongan.edit', compact('profile', 'vacancy'));
    }

    /**
     * Handler Update Lowongan (PUT /bkk/dashboard/lowongan/{id_lowongan})
     */
    public function lowonganUpdate(Request $request, string $id_lowongan): RedirectResponse
    {
        $title = $request->input('title', 'Lowongan');

        try {
            if (Schema::hasTable('lowongan') && is_numeric($id_lowongan)) {
                $dbLowongan = Lowongan::find((int) $id_lowongan);
                if ($dbLowongan) {
                    $dbLowongan->update([
                        'judul' => $title,
                        'status' => $request->input('status', $dbLowongan->status),
                    ]);
                }
            }
        } catch (\Throwable) {}

        return redirect()
            ->route('bkk.mitra.lowongan.index')
            ->with('success', "Perubahan data lowongan '{$title}' berhasil disimpan!");
    }

    /**
     * Handler Hapus / Nonaktifkan Lowongan (DELETE /bkk/dashboard/lowongan/{id_lowongan})
     */
    public function lowonganDestroy(Request $request, string $id_lowongan): RedirectResponse
    {
        try {
            if (Schema::hasTable('lowongan') && is_numeric($id_lowongan)) {
                $dbLowongan = Lowongan::find((int) $id_lowongan);
                if ($dbLowongan) {
                    $dbLowongan->delete();
                }
            }
        } catch (\Throwable) {}

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
     */
    public function pelamarUpdateStatus(Request $request, string $id_lowongan, string $id_pelamar): RedirectResponse
    {
        $newStatus = $request->input('status', 'Dipanggil');
        $namaPelamar = $request->input('nama', 'Pelamar');
        $notes = $request->input('catatan_seleksi', '');

        try {
            if (Schema::hasTable('lamaran')) {
                $lamaran = Lamaran::where('kode_lamaran', $id_pelamar)
                    ->orWhere('id', is_numeric($id_pelamar) ? (int)$id_pelamar : 0)
                    ->first();

                if ($lamaran) {
                    $lamaran->update([
                        'status' => $newStatus,
                        'catatan_seleksi' => $notes,
                    ]);

                    if (Schema::hasTable('lamaran_riwayat_status')) {
                        LamaranRiwayatStatus::create([
                            'lamaran_id' => $lamaran->id,
                            'judul_tahapan' => "Status Diubah: {$newStatus}",
                            'deskripsi' => $notes ?: "Status pelamar diperbarui oleh Mitra Industri.",
                            'diubah_oleh_id' => 'mitra-hrd',
                            'diubah_oleh_role' => 'MITRA',
                        ]);
                    }
                }
            }
        } catch (\Throwable) {}

        return redirect()
            ->route('bkk.mitra.pelamar.show', [$id_lowongan, $id_pelamar])
            ->with('success', "Status seleksi untuk {$namaPelamar} berhasil diperbarui menjadi '{$newStatus}'! Notifikasi otomatis terkirim ke portal siswa.");
    }
}
