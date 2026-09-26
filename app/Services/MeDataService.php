<?php

namespace App\Services;

class MeDataService
{
    /**
     * Dapatkan profil dummy yang diadaptasi dengan data auth pengguna (100% Mock / Tanpa Database).
     */
    public function getProfile(array $authUser = []): array
    {
        $role = strtoupper($authUser['role'] ?? 'SISWA');
        $isSiswa = ($role === 'SISWA');
        $userId = $authUser['id'] ?? ($isSiswa ? 'usr-siswa-001' : 'usr-alumni-001');

        $defaultProfile = [
            'name' => $isSiswa ? 'Ahmad Rizky Pratama' : 'Nadia Salsabila',
            'nis' => $isSiswa ? '0061234567' : '1920.08.112',
            'jurusan' => $isSiswa ? 'Teknik Komputer & Jaringan' : 'Akuntansi & Keuangan Lembaga',
            'kelas' => $isSiswa ? 'XII TKJ 2' : 'Alumni 2023',
            'email' => $isSiswa ? 'siswa_rizky@smkpenus.sch.id' : 'nadia.salsabila@gmail.com',
            'phone' => $isSiswa ? '0812-3456-7890' : '0857-1122-3344',
            'completion' => $isSiswa ? 78 : 92,
            'initials' => $isSiswa ? 'RP' : 'NS',
            'angkatan' => $isSiswa ? '2023' : '2020',
            'status' => $isSiswa ? 'PKL di PT Telkom Akses' : 'Mencari kerja full-time',
        ];

        // Timpa atribut dengan data dari auth_user jika tersedia
        $nama = $authUser['nama_lengkap'] ?? $authUser['username'] ?? $defaultProfile['name'];
        $initials = '';
        $words = array_values(array_filter(explode(' ', trim($nama))));
        if (count($words) >= 2) {
            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        } else {
            $initials = strtoupper(substr($nama, 0, 2));
        }

        return array_merge($defaultProfile, [
            'name' => $nama,
            'nis' => $authUser['nomor_induk'] ?? $defaultProfile['nis'],
            'email' => $authUser['email'] ?? $defaultProfile['email'],
            'phone' => $authUser['no_hp'] ?? $defaultProfile['phone'],
            'initials' => $initials,
            'role' => $role,
            'user_id' => $userId,
        ]);
    }

    /**
     * Dapatkan daftar riwayat lamaran dummy (100% Mock / Tanpa Database).
     */
    public function getApplications(string $role = 'SISWA', ?string $userId = null): array
    {
        $role = strtoupper($role);
        return ($role === 'SISWA') ? $this->getSiswaApplications() : $this->getAlumniApplications();
    }

    /**
     * Rekomendasi lowongan / PKL dummy (100% Mock / Tanpa Database).
     */
    public function getVacancies(string $role = 'SISWA'): array
    {
        $role = strtoupper($role);
        return ($role === 'SISWA') ? $this->getSiswaVacancies() : $this->getAlumniVacancies();
    }

    /**
     * Skor CV dan parameter penilaian AI dummy (100% Mock / Tanpa Database).
     */
    public function getCvScore(string $role = 'SISWA', ?string $userId = null): array
    {
        $role = strtoupper($role);
        if ($role === 'SISWA') {
            return [
                'total' => 84,
                'params' => [
                    ['label' => 'Kesesuaian Industri', 'value' => 88],
                    ['label' => 'Kelengkapan Data', 'value' => 78],
                    ['label' => 'Format ATS', 'value' => 92],
                    ['label' => 'Daya Tarik Portofolio', 'value' => 80],
                ],
            ];
        }

        return [
            'total' => 89,
            'params' => [
                ['label' => 'Kesesuaian Industri', 'value' => 91],
                ['label' => 'Kelengkapan Data', 'value' => 93],
                ['label' => 'Format ATS', 'value' => 89],
                ['label' => 'Daya Tarik Portofolio', 'value' => 84],
            ],
        ];
    }

    /**
     * Saran perbaikan CV AI dummy (100% Mock / Tanpa Database).
     */
    public function getCvSuggestions(string $role = 'SISWA', ?string $userId = null): array
    {
        $role = strtoupper($role);
        if ($role === 'SISWA') {
            return [
                [
                    'id' => 's1',
                    'title' => 'Tambahkan sertifikasi kejuruan BNSP / MTCNA',
                    'desc' => 'Cantumkan sertifikat keahlian MikroTik (MTCNA) atau sertifikasi BNSP Teknik Komputer Jaringan agar lolos filter rekruter telekomunikasi.',
                    'impact' => 'Tinggi',
                    'section' => 'Portofolio & Sertifikat',
                ],
                [
                    'id' => 's2',
                    'title' => 'Kuantifikasi pengalaman saat PKL di PT Telkom Akses',
                    'desc' => 'Ganti kalimat umum menjadi: "Melakukan splicing kabel fiber optic drop core di 60+ titik pelanggan dengan tingkat redaman < -18 dB".',
                    'impact' => 'Tinggi',
                    'section' => 'Pengalaman',
                ],
                [
                    'id' => 's3',
                    'title' => 'Gunakan kata kerja aksi aktif berstandar ATS',
                    'desc' => 'Ganti kata "membantu" atau "mempelajari" dengan "mengonfigurasi", "mengimplementasikan", "mendiagnosis".',
                    'impact' => 'Sedang',
                    'section' => 'Pengalaman',
                ],
                [
                    'id' => 's4',
                    'title' => 'Lengkapi ringkasan profil dengan target karier',
                    'desc' => 'Sebutkan ketertarikan spesifik pada bidang Network Engineer atau Field Operations.',
                    'impact' => 'Rendah',
                    'section' => 'Informasi Pribadi',
                ],
            ];
        }

        return [
            [
                'id' => 't1',
                'title' => 'Kuantifikasi pencapaian administrasi & finance',
                'desc' => 'Tulis "Memproses 300+ transaksi harian dengan rekonsiliasi kas 100% tanpa selisih selama 12 bulan berturut-turut".',
                'impact' => 'Tinggi',
                'section' => 'Pengalaman',
            ],
            [
                'id' => 't2',
                'title' => 'Cantumkan sertifikasi Brevet Pajak A & B',
                'desc' => 'Sertifikat Brevet A/B sangat diprioritaskan oleh perusahaan perbankan dan industri FMCG.',
                'impact' => 'Tinggi',
                'section' => 'Portofolio & Sertifikat',
            ],
            [
                'id' => 't3',
                'title' => 'Sesuaikan kata kunci ATS bidang Keuangan',
                'desc' => 'Tambahkan kata kunci teknis: "rekonsiliasi bank", "jurnal penyesuaian", "Accurate 5", "Microsoft Excel VLOOKUP & Pivot".',
                'impact' => 'Sedang',
                'section' => 'Keahlian Teknis',
            ],
            [
                'id' => 't4',
                'title' => 'Tingkatkan format ringkasan profil profesional',
                'desc' => 'Tuliskan total pengalaman kerja dan spesialisasi pembukuan di kalimat pembuka.',
                'impact' => 'Rendah',
                'section' => 'Informasi Pribadi',
            ],
        ];
    }

    /**
     * Draf konten Markdown CV dummy (100% Mock / Tanpa Database).
     */
    public function getCvMarkdown(string $role = 'SISWA', array $profile = [], ?string $userId = null): string
    {
        $role = strtoupper($role);
        return ($role === 'SISWA') ? $this->getSiswaMarkdown($profile) : $this->getAlumniMarkdown($profile);
    }

    /**
     * Entri Jurnal PKL Harian dummy (100% Mock / Tanpa Database).
     */
    public function getJurnalEntries(?string $userId = null): array
    {
        return [
            [
                'id' => 'j1',
                'date' => 'Jumat, 14 Mar 2025',
                'activity' => 'Splicing kabel FO drop core di 3 rumah pelanggan area Tembalang dan uji redaman OPM (-16.4 dB).',
                'hours' => 8,
                'status' => 'Disetujui',
                'note' => 'Pekerjaan rapi dan redaman memenuhi standar Telkom.',
            ],
            [
                'id' => 'j2',
                'date' => 'Kamis, 13 Mar 2025',
                'activity' => 'Pengukuran redaman ODP cluster Banyumanik menggunakan OPM dan pelaporan rekap ke teknisi senior.',
                'hours' => 8,
                'status' => 'Disetujui',
                'note' => 'Data input sudah sesuai format laporan.',
            ],
            [
                'id' => 'j3',
                'date' => 'Rabu, 12 Mar 2025',
                'activity' => 'Konfigurasi ONT Huawei HG8245W5 dan aktivasi layanan IndiHome pelanggan baru di Perum Graha Estetika.',
                'hours' => 7,
                'status' => 'Menunggu',
                'note' => 'Menunggu validasi guru pembimbing sekolah.',
            ],
            [
                'id' => 'j4',
                'date' => 'Selasa, 11 Mar 2025',
                'activity' => 'Briefing K3 ketinggian, penataan toolbag kerja, dan maintenance berkala mesin fusion splicer Sumitomo.',
                'hours' => 6,
                'status' => 'Revisi',
                'note' => 'Tolong lengkapi foto dokumentasi pembersihan elektroda splicer.',
            ],
            [
                'id' => 'j5',
                'date' => 'Senin, 10 Mar 2025',
                'activity' => 'Penarikan kabel drop optic 1 core 150 meter dari tiang distribusi ke rumah pelanggan.',
                'hours' => 8,
                'status' => 'Disetujui',
                'note' => 'K3 tiang terpasang dengan baik.',
            ],
            [
                'id' => 'j6',
                'date' => 'Jumat, 07 Mar 2025',
                'activity' => 'Troubleshooting gangguan LOS (Loss of Signal) pada Optical Network Terminal pelanggan di Ngesrep.',
                'hours' => 8,
                'status' => 'Disetujui',
                'note' => 'Penyebab konektor patah berhasil diganti fast connector baru.',
            ],
        ];
    }

    /**
     * Bagian Laporan Akhir PKL dummy (100% Mock / Tanpa Database).
     */
    public function getLaporanSections(?string $userId = null): array
    {
        return [
            [
                'id' => 'l1',
                'title' => 'BAB I — Pendahuluan (Latar Belakang & Tujuan PKL)',
                'status' => 'Disetujui',
                'note' => 'Struktur rumusan masalah dan tujuan sudah sangat baik.',
                'updated' => '20 Feb 2025',
            ],
            [
                'id' => 'l2',
                'title' => 'BAB II — Gambaran Umum PT Telkom Akses Semarang',
                'status' => 'Disetujui',
                'note' => 'Bagan struktur organisasi dan visi-misi telah lengkap.',
                'updated' => '27 Feb 2025',
            ],
            [
                'id' => 'l3',
                'title' => 'BAB III — Pelaksanaan Praktik Kerja Lapangan & Pembahasan Kasus',
                'status' => 'Revisi',
                'note' => 'Tambahkan diagram alur proses splicing kabel FO dan foto dokumentasi lapangan.',
                'updated' => '08 Mar 2025',
            ],
            [
                'id' => 'l4',
                'title' => 'BAB IV — Penutup (Kesimpulan & Saran)',
                'status' => 'Ditinjau',
                'note' => 'Draf bab penutup sedang diperiksa oleh guru pembimbing.',
                'updated' => '15 Mar 2025',
            ],
            [
                'id' => 'l5',
                'title' => 'Lampiran (Logbook, Lembar Pengesahan & Foto Kegiatan)',
                'status' => 'Belum',
                'note' => 'Harap meminta tanda tangan basah pembimbing industri sebelum upload.',
                'updated' => '-',
            ],
        ];
    }

    /**
     * Notifikasi sistem dummy (100% Mock / Tanpa Database).
     */
    public function getNotifications(?string $userId = null): array
    {
        return [
            [
                'id' => 'n1',
                'title' => 'Undangan Interview Terjadwal',
                'desc' => 'PT Telkom Akses mengundang Anda ke sesi interview tatap muka pada Kamis, 20 Mar 2025 pukul 09:00 WIB.',
                'time' => '1 jam lalu',
                'unread' => true,
                'accent' => true,
            ],
            [
                'id' => 'n2',
                'title' => 'Lowongan Baru Cocok 96%',
                'desc' => 'Ada 2 lowongan PKL/Karier baru yang sangat sesuai dengan profil keahlian Anda.',
                'time' => '3 jam lalu',
                'unread' => true,
                'accent' => false,
            ],
            [
                'id' => 'n3',
                'title' => 'Catatan Revisi Jurnal PKL',
                'desc' => 'Pembimbing memberikan catatan revisi pada jurnal tanggal 11 Mar 2025. Cek detail catatan.',
                'time' => 'Kemarin',
                'unread' => false,
                'accent' => false,
            ],
            [
                'id' => 'n4',
                'title' => 'Skor CV Meningkat (+5 Poin)',
                'desc' => 'Setelah penambahan pengalaman PKL, CV Health Score Anda meningkat menjadi 84/100.',
                'time' => '2 hari lalu',
                'unread' => false,
                'accent' => false,
            ],
        ];
    }

    /* -------------------------------------------------------------------------- */
    /* Internal Dummy Data Generators                                             */
    /* -------------------------------------------------------------------------- */

    protected function getSiswaApplications(): array
    {
        return [
            [
                'id' => 'app-01',
                'code' => 'LMR-2025-001',
                'position' => 'Teknisi Jaringan & Fiber Optic (PKL)',
                'company' => 'PT Telkom Akses',
                'mitra' => 'Telekomunikasi & Jaringan',
                'location' => 'Semarang',
                'type' => 'PKL / Magang',
                'date' => '15 Mar 2025',
                'status' => 'Dipanggil Interview',
                'step' => 3,
                'color' => '#e02424',
                'interview' => [
                    'date' => 'Kamis, 20 Mar 2025',
                    'time' => '09:00 WIB',
                    'mode' => 'Tatap Muka (Offline)',
                    'place' => 'Kantor Telkom Akses Witel Semarang, Ruang Rapat Lt. 2',
                    'pic' => 'Bpk. Hendro Wicaksono (HR Specialist)',
                    'instructions' => 'Harap membawa CV fisik cetak, portofolio jaringan/sertifikat, dan mengenakan seragam sekolah rapi.',
                ],
                'timeline' => [
                    ['date' => '10 Mar 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Berkas lamaran dan CV siswa berhasil diajukan ke sistem BKK.', 'done' => true],
                    ['date' => '12 Mar 2025', 'title' => 'Verifikasi Berkas BKK', 'desc' => 'BKK Penus memvalidasi nilai rapor dan rekomendasi kaprog TKJ.', 'done' => true],
                    ['date' => '15 Mar 2025', 'title' => 'Panggilan Interview', 'desc' => 'Mitra industri mengundang untuk sesi wawancara teknis & attitude.', 'done' => true],
                    ['date' => '25 Mar 2025', 'title' => 'Pengumuman Hasil', 'desc' => 'Penetapan penerimaan penempatan PKL resmi.', 'done' => false],
                ],
            ],
            [
                'id' => 'app-02',
                'code' => 'LMR-2025-002',
                'position' => 'Junior IT Support & Infrastructure',
                'company' => 'PT Astra Graphia IT',
                'mitra' => 'Teknologi Informasi',
                'location' => 'Semarang Barat',
                'type' => 'PKL / Magang',
                'date' => '12 Mar 2025',
                'status' => 'Sedang Ditinjau',
                'step' => 2,
                'color' => '#1b283b',
                'interview' => null,
                'timeline' => [
                    ['date' => '12 Mar 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Berkas dikirimkan melalui portal BKK Penus.', 'done' => true],
                    ['date' => '14 Mar 2025', 'title' => 'Review Tim HR', 'desc' => 'Kualifikasi teknis dan portofolio jaringan sedang diulas tim HRD.', 'done' => true],
                    ['date' => '22 Mar 2025', 'title' => 'Wawancara User', 'desc' => 'Menunggu konfirmasi jadwal user interview teknis.', 'done' => false],
                    ['date' => '28 Mar 2025', 'title' => 'Penawaran Magang', 'desc' => 'Penerbitan surat pengantar PKL dari sekolah.', 'done' => false],
                ],
            ],
            [
                'id' => 'app-03',
                'code' => 'LMR-2025-003',
                'position' => 'IT Systems & Database Assistant',
                'company' => 'PT Phapros Tbk',
                'mitra' => 'Farmasi & Manufaktur',
                'location' => 'Semarang',
                'type' => 'PKL / Magang',
                'date' => '08 Mar 2025',
                'status' => 'Terkirim',
                'step' => 1,
                'color' => '#047857',
                'interview' => null,
                'timeline' => [
                    ['date' => '08 Mar 2025', 'title' => 'Lamaran Terkirim', 'desc' => 'CV dan berkas permohonan magang terkirim ke HRD sistem mitra.', 'done' => true],
                    ['date' => '', 'title' => 'Screening Awal', 'desc' => 'Proses seleksi berkas administratif oleh departemen IT.', 'done' => false],
                    ['date' => '', 'title' => 'Wawancara Lapangan', 'desc' => 'Tahap seleksi wawancara industri.', 'done' => false],
                    ['date' => '', 'title' => 'Pengumuman', 'desc' => 'Keputusan akhir hasil seleksi penempatan magang.', 'done' => false],
                ],
            ],
            [
                'id' => 'app-04',
                'code' => 'LMR-2025-004',
                'position' => 'Junior Network Administrator',
                'company' => 'CV Media Kreasi Grafika',
                'mitra' => 'Percetakan Digital & IT',
                'location' => 'Semarang Selatan',
                'type' => 'PKL / Magang',
                'date' => '28 Feb 2025',
                'status' => 'Diterima',
                'step' => 4,
                'color' => '#7c3aed',
                'interview' => null,
                'timeline' => [
                    ['date' => '20 Feb 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Pendaftaran berkas via portal BKK SMK Penus.', 'done' => true],
                    ['date' => '23 Feb 2025', 'title' => 'Interview Sukses', 'desc' => 'Wawancara dengan supervisor IT lolos dengan nilai memuaskan.', 'done' => true],
                    ['date' => '28 Feb 2025', 'title' => 'Diterima Penempatan', 'desc' => 'Surat penerimaan PKL resmi diterbitkan industri.', 'done' => true],
                    ['date' => '01 Mar 2025', 'title' => 'Onboarding Selesai', 'desc' => 'Pembekalan dan serah terima siswa oleh guru pembimbing.', 'done' => true],
                ],
            ],
            [
                'id' => 'app-05',
                'code' => 'LMR-2025-005',
                'position' => 'Field Technician Apprentice',
                'company' => 'PT Smartfren Telecom',
                'mitra' => 'Telekomunikasi Seluler',
                'location' => 'Semarang',
                'type' => 'PKL / Magang',
                'date' => '15 Feb 2025',
                'status' => 'Ditolak',
                'step' => 3,
                'color' => '#dc2626',
                'interview' => null,
                'timeline' => [
                    ['date' => '15 Feb 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Pendaftaran lamaran magang teknisi lapangan.', 'done' => true],
                    ['date' => '18 Feb 2025', 'title' => 'Seleksi Kuota', 'desc' => 'Kuota siswa untuk jurusan TKJ pada periode ini telah terpenuhi.', 'done' => true],
                    ['date' => '19 Feb 2025', 'title' => 'Tidak Lolos Kuota', 'desc' => 'Disarankan memilih mitra industri alternatif rekomendasi BKK.', 'done' => true],
                    ['date' => '19 Feb 2025', 'title' => 'Proses Selesai', 'desc' => 'Lamaran ditutup dan diarsipkan.', 'done' => false],
                ],
            ],
        ];
    }

    protected function getAlumniApplications(): array
    {
        return [
            [
                'id' => 'app-11',
                'code' => 'LMR-2025-011',
                'position' => 'Junior Accounting & Finance Staff',
                'company' => 'PT Bank Central Asia Tbk',
                'mitra' => 'Perbankan & Keuangan',
                'location' => 'Semarang',
                'type' => 'Full-time',
                'date' => '14 Mar 2025',
                'status' => 'Dipanggil Interview',
                'step' => 3,
                'color' => '#005baa',
                'interview' => [
                    'date' => 'Jumat, 21 Mar 2025',
                    'time' => '13:30 WIB',
                    'mode' => 'Online (Zoom Meeting)',
                    'place' => 'https://zoom.us/j/98234718239 (Passcode: BCA2025)',
                    'pic' => 'Ibu Ratna Dewi, S.Psi (Talent Acquisition)',
                    'instructions' => 'Harap hadir 10 menit sebelum jadwal, berpakaian formal perbankan, dan siapkan scan ijazah serta transkrip nilai.',
                ],
                'timeline' => [
                    ['date' => '05 Mar 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Berkas dan portofolio keuangan diajukan ke portal karier mitra.', 'done' => true],
                    ['date' => '10 Mar 2025', 'title' => 'Lolos Screening ATS', 'desc' => 'Kesesuaian kualifikasi mencapai skor 92%.', 'done' => true],
                    ['date' => '14 Mar 2025', 'title' => 'Jadwal Interview HR', 'desc' => 'Undangan wawancara tatap maya diterbitkan.', 'done' => true],
                    ['date' => '24 Mar 2025', 'title' => 'User Interview & Offering', 'desc' => 'Tahap negosiasi kontrak kerja.', 'done' => false],
                ],
            ],
            [
                'id' => 'app-12',
                'code' => 'LMR-2025-012',
                'position' => 'Staff Administrasi Operasional',
                'company' => 'PT Djarum',
                'mitra' => 'FMCG & Manufaktur',
                'location' => 'Kudus / Semarang',
                'type' => 'Full-time',
                'date' => '11 Mar 2025',
                'status' => 'Sedang Ditinjau',
                'step' => 2,
                'color' => '#b91c1c',
                'interview' => null,
                'timeline' => [
                    ['date' => '11 Mar 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Pengiriman lamaran via rekomendasi BKK Penus.', 'done' => true],
                    ['date' => '13 Mar 2025', 'title' => 'Pemeriksaan Berkas', 'desc' => 'Dokumen administrasi dan sertifikasi Brevet diperiksa.', 'done' => true],
                    ['date' => '20 Mar 2025', 'title' => 'Psikotes Online', 'desc' => 'Tes kemampuan logika & ketelitian kerja akuntansi.', 'done' => false],
                    ['date' => '27 Mar 2025', 'title' => 'Offering Letter', 'desc' => 'Penawaran kerja resmi.', 'done' => false],
                ],
            ],
            [
                'id' => 'app-13',
                'code' => 'LMR-2025-013',
                'position' => 'Store Management Trainee',
                'company' => 'PT Fast Food Indonesia Tbk',
                'mitra' => 'Food & Beverage',
                'location' => 'Semarang Kota',
                'type' => 'Full-time',
                'date' => '09 Mar 2025',
                'status' => 'Terkirim',
                'step' => 1,
                'color' => '#991b1b',
                'interview' => null,
                'timeline' => [
                    ['date' => '09 Mar 2025', 'title' => 'Lamaran Terkirim', 'desc' => 'Berkas lamaran diterima sistem rekrutmen mitra.', 'done' => true],
                    ['date' => '', 'title' => 'Screening Dokumen', 'desc' => 'Verifikasi kelengkapan berkas fisik & digital.', 'done' => false],
                    ['date' => '', 'title' => 'Walk-in Interview', 'desc' => 'Wawancara langsung di kantor regional Jawa Tengah.', 'done' => false],
                    ['date' => '', 'title' => 'Pelatihan Kerja', 'desc' => 'Masa orientasi manajemen cabang.', 'done' => false],
                ],
            ],
            [
                'id' => 'app-14',
                'code' => 'LMR-2025-014',
                'position' => 'Junior Auditor Internal',
                'company' => 'PT Trans Retail Indonesia',
                'mitra' => 'Retail & Logistik',
                'location' => 'Semarang Barat',
                'type' => 'Full-time',
                'date' => '01 Mar 2025',
                'status' => 'Diterima',
                'step' => 4,
                'color' => '#0d9488',
                'interview' => null,
                'timeline' => [
                    ['date' => '18 Feb 2025', 'title' => 'Lamaran Diajukan', 'desc' => 'Pengajuan via bursa kerja SMK Penus.', 'done' => true],
                    ['date' => '24 Feb 2025', 'title' => 'Interview User & HRD', 'desc' => 'Wawancara kompetensi akuntansi dan uji spreadsheet.', 'done' => true],
                    ['date' => '01 Mar 2025', 'title' => 'Offering & Kontrak', 'desc' => 'Penandatanganan kontrak kerja tetap.', 'done' => true],
                    ['date' => '01 Mar 2025', 'title' => 'Mulai Bekerja', 'desc' => 'Penempatan di kantor cabang Semarang.', 'done' => true],
                ],
            ],
            [
                'id' => 'app-15',
                'code' => 'LMR-2025-015',
                'position' => 'Staff Inventory & Logistik',
                'company' => 'PT Kalbe Farma Tbk',
                'mitra' => 'Kesehatan & Distribusi',
                'location' => 'Kawasan Industri Candi Semarang',
                'type' => 'Full-time',
                'date' => '20 Feb 2025',
                'status' => 'Ditolak',
                'step' => 3,
                'color' => '#15803d',
                'interview' => null,
                'timeline' => [
                    ['date' => '20 Feb 2025', 'title' => 'Lamaran Dikirim', 'desc' => 'Pengajuan berkas via web karir Kalbe.', 'done' => true],
                    ['date' => '22 Feb 2025', 'title' => 'Seleksi Berkas', 'desc' => 'Kandidat lain memiliki pengalaman relevan yang lebih tinggi.', 'done' => true],
                    ['date' => '23 Feb 2025', 'title' => 'Tidak Memenuhi Kriteria', 'desc' => 'Proses seleksi selesai.', 'done' => true],
                    ['date' => '23 Feb 2025', 'title' => 'Selesai', 'desc' => 'Lamaran diarsipkan.', 'done' => false],
                ],
            ],
        ];
    }

    protected function getSiswaVacancies(): array
    {
        return [
            [
                'id' => 'vac-01',
                'title' => 'Teknisi Jaringan & Fiber Optic (PKL)',
                'company' => 'PT Telkom Akses',
                'location' => 'Semarang & Sekitarnya',
                'type' => 'PKL / Magang',
                'salary' => 'Uang Saku Rp 1.5 - 2.5 Jt',
                'match' => 96,
                'tags' => ['Fiber Optic', 'MikroTik', 'Routing', 'K3 Lapangan'],
                'deadline' => '30 Apr 2025',
                'color' => '#e02424',
            ],
            [
                'id' => 'vac-02',
                'title' => 'Praktik Kerja Lapangan — Otomasi & IT',
                'company' => 'PT Astra Honda Motor',
                'location' => 'Kawasan Industri Semarang',
                'type' => 'PKL / Magang',
                'salary' => 'Uang Saku & Uang Makan',
                'match' => 91,
                'tags' => ['Hardware', 'IoT Dasar', 'Preventive Maintenance'],
                'deadline' => '25 Apr 2025',
                'color' => '#b91c1c',
            ],
            [
                'id' => 'vac-03',
                'title' => 'Network Operations Center (NOC) Intern',
                'company' => 'PT Lintasarta',
                'location' => 'Semarang Kota',
                'type' => 'PKL / Magang',
                'salary' => 'Uang Saku + Sertifikat Industri',
                'match' => 89,
                'tags' => ['Cisco CCNA Dasar', 'Monitoring NOC', 'Linux'],
                'deadline' => '15 Mei 2025',
                'color' => '#0369a1',
            ],
            [
                'id' => 'vac-04',
                'title' => 'IT Warehouse Infrastructure Intern',
                'company' => 'PT Global Digital Niaga (Blibli Logistics)',
                'location' => 'Semarang Barat',
                'type' => 'PKL / Magang',
                'salary' => 'Uang Saku Rp 1.2 - 2.0 Jt',
                'match' => 85,
                'tags' => ['Barcode Scanner', 'LAN Setup', 'Troubleshooting'],
                'deadline' => '20 Mei 2025',
                'color' => '#2563eb',
            ],
        ];
    }

    protected function getAlumniVacancies(): array
    {
        return [
            [
                'id' => 'vac-11',
                'title' => 'Staff Finance & Accounting',
                'company' => 'PT Bank Central Asia Tbk (BCA)',
                'location' => 'Semarang',
                'type' => 'Full-time',
                'salary' => 'Rp 4.5 - 6.0 Jt',
                'match' => 95,
                'tags' => ['Brevet A/B', 'Rekonsiliasi Bank', 'SAP Basic', 'Excel Expert'],
                'deadline' => '30 Apr 2025',
                'color' => '#005baa',
            ],
            [
                'id' => 'vac-12',
                'title' => 'Staff Administrasi & Pembukuan',
                'company' => 'PT Djarum',
                'location' => 'Kudus / Semarang',
                'type' => 'Full-time',
                'salary' => 'Rp 4.2 - 5.5 Jt',
                'match' => 92,
                'tags' => ['Jurnal Umum', 'Perpajakan', 'Administrasi Gudang'],
                'deadline' => '10 Mei 2025',
                'color' => '#991b1b',
            ],
            [
                'id' => 'vac-13',
                'title' => 'Junior Equity Settlement Officer',
                'company' => 'PT Indo Premier Sekuritas',
                'location' => 'Semarang',
                'type' => 'Full-time',
                'salary' => 'Rp 4.0 - 5.2 Jt',
                'match' => 88,
                'tags' => ['Pasar Modal', 'Kliring Transaksi', 'Kompak & Teliti'],
                'deadline' => '18 Mei 2025',
                'color' => '#047857',
            ],
            [
                'id' => 'vac-14',
                'title' => 'Staff Akuntansi Biaya (Cost Control)',
                'company' => 'PT Indofood CBP Sukses Makmur Tbk',
                'location' => 'Semarang',
                'type' => 'Full-time',
                'salary' => 'Rp 4.3 - 5.8 Jt',
                'match' => 86,
                'tags' => ['Costing', 'Bahan Baku', 'Audit Internal'],
                'deadline' => '25 Mei 2025',
                'color' => '#1d4ed8',
            ],
        ];
    }

    protected function getSiswaMarkdown(array $profile): string
    {
        $name = $profile['name'] ?? 'Ahmad Rizky Pratama';
        $email = $profile['email'] ?? 'siswa_rizky@smkpenus.sch.id';
        $phone = $profile['phone'] ?? '0812-3456-7890';

        return "# {$name}\n"
            . "*Teknisi Jaringan Komputer · Semarang · {$email} · {$phone}*\n\n"
            . "## Ringkasan Profil\n"
            . "Siswa kelas XII Teknik Komputer & Jaringan SMK Plus Pelita Nusantara yang berdedikasi dan memiliki ketertarikan mendalam pada infrastruktur jaringan, routing, dan instalasi Fiber Optic (FTTH). Berpengalaman langsung dalam Praktik Kerja Lapangan (PKL) di PT Telkom Akses Semarang dengan rekam jejak penyelesaian target pekerjaan yang memuaskan dan kepatuhan tinggi terhadap standar K3.\n\n"
            . "## Pendidikan\n"
            . "### SMK Plus Pelita Nusantara — Teknik Komputer & Jaringan\n"
            . "*2022 – 2025 · Rata-rata Nilai Kejuruan: 88.4 / 100*\n"
            . "- Ketua Kelompok Praktik Jaringan Komputer Kejuruan\n"
            . "- Peringkat 3 Lomba Kompetensi Siswa (LKS) Bidang IT Network System Administration Tingkat Kota Semarang\n\n"
            . "## Pengalaman PKL\n"
            . "### Praktik Kerja Lapangan (PKL) — PT Telkom Akses Semarang\n"
            . "*Juli 2024 – Desember 2024*\n"
            . "- Mengimplementasikan instalasi jaringan FTTH (Fiber to the Home) untuk 60+ pelanggan residensial dengan tingkat keberhasilan aktivasi 98%.\n"
            . "- Melakukan splicing core kabel fiber optic menggunakan fusion splicer dan mengukur redaman sinyal dengan Optical Power Meter (OPM) sesuai standar batas toleransi < -18 dB.\n"
            . "- Mengonfigurasi perangkat Optical Network Terminal (ONT) dan router wireless untuk aktivasi layanan internet pita lebar.\n"
            . "- Mendiagnosis dan menyelesaikan 40+ tiket gangguan jaringan pelanggan per minggu bersama teknisi senior dengan SLA 95%.\n\n"
            . "## Keahlian Teknis\n"
            . "- **Jaringan**: TCP/IP, Subnetting VLSM, VLAN, Routing Statis & OSPF Dasar, MikroTik RouterOS\n"
            . "- **Fiber Optic**: Splicing FO, OTDR, Optical Power Meter (OPM), FTTH Distribution Point\n"
            . "- **Sistem Operasi**: Linux Debian/Ubuntu Server dasar, Windows Client/Server\n"
            . "- **Hardware & Tools**: Crimping RJ-45, Fusion Splicer, LAN Tester, Maintenance PC\n\n"
            . "## Portofolio & Sertifikat\n"
            . "- Sertifikat PKL PT Telkom Akses Semarang dengan Predikat Sangat Memuaskan (A)\n"
            . "- Sertifikasi Kompetensi Keahlian TKJ dari Lembaga Sertifikasi Profesi (LSP) P1 SMK Penus\n"
            . "- Pelatihan Konfigurasi MikroTik MTCNA Fundamental (MikroTik Academy Penus)\n";
    }

    protected function getAlumniMarkdown(array $profile): string
    {
        $name = $profile['name'] ?? 'Nadia Salsabila';
        $email = $profile['email'] ?? 'nadia.salsabila@gmail.com';
        $phone = $profile['phone'] ?? '0857-1122-3344';

        return "# {$name}\n"
            . "*Staff Akuntansi & Keuangan · Semarang · {$email} · {$phone}*\n\n"
            . "## Ringkasan Profil\n"
            . "Alumni Akuntansi & Keuangan Lembaga SMK Plus Pelita Nusantara angkatan 2023 dengan 1,5 tahun pengalaman profesional di bidang administrasi kasir, pembukuan keuangan, dan rekonsiliasi kas. Memiliki ketelitian tinggi, pemahaman mendalam tentang siklus akuntansi jasa dan dagang, serta mahir mengoperasikan software Accurate Accounting dan Microsoft Excel tingkat lanjut.\n\n"
            . "## Pendidikan\n"
            . "### SMK Plus Pelita Nusantara — Akuntansi & Keuangan Lembaga\n"
            . "*2020 – 2023 · Nilai Ujian Sekolah: 91.2 / 100*\n"
            . "- Lulusan Terbaik Program Keahlian Akuntansi & Keuangan Lembaga Angkatan 2023\n"
            . "- Juara 2 Olimpiade Akuntansi Tingkat SMK se-Jawa Tengah\n\n"
            . "## Pengalaman Kerja\n"
            . "### Senior Cashier & Finance Admin — CV Sumber Berkah Makmur\n"
            . "*Agustus 2023 – Sekarang (Semarang)*\n"
            . "- Memproses rata-rata 300+ transaksi penjualan harian dengan akurasi 100% tanpa selisih kas selama 12 bulan berturut-turut.\n"
            . "- Menyusun laporan arus kas harian dan mingguan yang menjadi dasar laporan manajerial pemilik perusahaan.\n"
            . "- Melakukan rekonsiliasi bank dan bukti transaksi kas masuk/keluar senilai rata-rata Rp 180 juta per bulan.\n"
            . "- Membimbing dan melatih 6 staf kasir junior dalam pengoperasian POS dan prosedur penutupan shift kas.\n\n"
            . "### Praktik Kerja Lapangan (PKL) — Kantor Akuntan Publik (KAP) Semarang\n"
            . "*Januari 2023 – April 2023*\n"
            . "- Melakukan verifikasi dan pencocokan 500+ dokumen bukti transaksi fisik dengan entri software akuntansi klien.\n"
            . "- Membantu tim auditor dalam penyusunan kertas kerja pemeriksaan akun kas dan persediaan barang dagang.\n\n"
            . "## Keahlian Teknis\n"
            . "- **Software Akuntansi**: Accurate Accounting v5, Zahir Accounting, MYOB\n"
            . "- **Spreadsheet**: Microsoft Excel (VLOOKUP, HLOOKUP, Pivot Table, IF Bertingkat, Data Validation)\n"
            . "- **Kompetensi Keuangan**: Jurnal Umum, Buku Besar, Neraca Saldo, Laporan Laba Rugi, Rekonsiliasi Bank\n"
            . "- **Perpajakan Dasar**: PPh 21, PPh 23, PPN, dan e-Faktur\n\n"
            . "## Portofolio & Sertifikat\n"
            . "- Sertifikasi Brevet Pajak Terapan A & B (Kerjasama IAI & Universitas Diponegoro)\n"
            . "- Sertifikasi Kompetensi Akuntan Yunior dari BNSP (Badan Nasional Sertifikasi Profesi)\n"
            . "- Sertifikat Microsoft Office Specialist (MOS) — Excel Associate\n";
    }
}
