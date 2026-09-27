<?php

namespace App\Services;

class MitraDataService
{
    /**
     * Profil Perusahaan Mitra Dummy
     */
    public function getProfile(): array
    {
        return [
            'id' => 'mitra-001',
            'nama_perusahaan' => 'PT Solusi Teknologi Nusantara',
            'singkatan' => 'STN',
            'npwp' => '01.234.567.8-091.000',
            'sektor' => 'Teknologi Informasi, Rekayasa Perangkat Lunak & Jaringan',
            'alamat' => 'Kawasan Industri Digital Penus Blok C-12, Bogor, Jawa Barat 16710',
            'website' => 'https://solusiteknologi.co.id',
            'email' => 'career@solusiteknologi.co.id',
            'no_telp' => '(0251) 839-2041',
            'pic_name' => 'Cindy Claudia, S.Kom.',
            'pic_role' => 'Lead Talent Acquisition & IDUKA Partnership',
            'pic_email' => 'cindy.claudia@solusiteknologi.co.id',
            'pic_phone' => '0811-9876-5432',
            'status_kemitraan' => 'Mitra IDUKA Terverifikasi (MoU 2025-2028)',
            'total_mou_tahun' => 3,
            'tahun_bergabung' => 2023,
            'is_verified' => true,
        ];
    }

    /**
     * Metrik Statistik Dashboard Mitra
     */
    public function getDashboardMetrics(): array
    {
        $vacancies = $this->getVacancies();
        $allApplicants = $this->getAllApplicants();

        $activeVacancies = count(array_filter($vacancies, fn ($v) => $v['status'] === 'Aktif'));
        $totalApplicants = count($allApplicants);
        $interviewCount = count(array_filter($allApplicants, fn ($a) => in_array($a['status'], ['Dipanggil', 'Interview'])));
        $acceptedCount = count(array_filter($allApplicants, fn ($a) => $a['status'] === 'Diterima'));

        return [
            'total_lowongan' => count($vacancies),
            'lowongan_aktif' => $activeVacancies,
            'total_pelamar' => $totalApplicants,
            'pelamar_interview' => $interviewCount,
            'pelamar_diterima' => $acceptedCount,
            'kebutuhan_siswa_pkl' => 8,
            'siswa_aktif_pkl' => 5,
        ];
    }

    /**
     * Daftar Lowongan yang ditawarkan Mitra
     */
    public function getVacancies(): array
    {
        return [
            [
                'id' => 'low-001',
                'title' => 'Junior Frontend Developer (Tailwind & Vue/React)',
                'tipe' => 'Kerja',
                'tipe_badge' => 'Full-Time Lulusan',
                'lokasi' => 'Bogor (Hybrid)',
                'kategori' => 'Software Engineering',
                'gaji' => 'Rp 4.500.000 - Rp 6.000.000',
                'status' => 'Aktif',
                'deadline' => '2026-10-31',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'pelamar_count' => 12,
                'interview_count' => 3,
                'diterima_count' => 1,
                'kuota' => 2,
                'deskripsi' => 'Kami mencari talenta lulusan / alumni SMK Plus Pelita Nusantara jurusan RPL dengan kemampuan logika pemrograman yang baik, menguasai HTML/CSS, Tailwind CSS, JavaScript modern, serta dasar library frontend (Vue atau React).',
                'persyaratan' => [
                    'Lulusan SMK Plus Pelita Nusantara jurusan RPL',
                    'Menguasai HTML5, CSS3, Tailwind CSS, dan JavaScript (ES6+)',
                    'Memahami konsep Git / GitHub untuk kolaborasi tim',
                    'Nilai tambah jika pernah membuat proyek fullstack / REST API',
                    'Disiplin, komunikatif, dan mau belajar hal baru',
                ],
                'benefit' => [
                    'Gaji pokok kompetitif sesuai UMR Bogor Plus Tunjangan',
                    'BPJS Kesehatan & Ketenagakerjaan',
                    'Mentorship langsung dari Senior Software Engineer',
                    'Peralatan kerja laptop & monitor disediakan',
                ],
                'created_at' => '2026-09-10',
            ],
            [
                'id' => 'low-002',
                'title' => 'Internship Web & Backend Developer (PKL Siswa)',
                'tipe' => 'PKL',
                'tipe_badge' => 'Magang / PKL',
                'lokasi' => 'Bogor (On-site Penus Technopark)',
                'kategori' => 'Software Engineering',
                'gaji' => 'Uang Saku & Uang Makan Harian',
                'status' => 'Aktif',
                'deadline' => '2026-11-15',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'pelamar_count' => 18,
                'interview_count' => 5,
                'diterima_count' => 3,
                'kuota' => 5,
                'deskripsi' => 'Program Praktik Kerja Lapangan (PKL) semester ganjil untuk siswa kelas XI & XII RPL SMK Plus Pelita Nusantara. Siswa akan dibimbing mengerjakan modul aplikasi internal berbasis Laravel dan API development.',
                'persyaratan' => [
                    'Siswa aktif kelas XI atau XII jurusan Rekayasa Perangkat Lunak (RPL)',
                    'Mendapat rekomendasi surat izin dari pihak sekolah / BKK',
                    'Memahami dasar pemrograman PHP, Database MySQL / PostgreSQL',
                    'Familiar dengan command line terminal dan Git dasar',
                ],
                'benefit' => [
                    'Sertifikat Penyelesaian PKL Industri Resmi Terverifikasi',
                    'Uang saku bulanan dan subsidi konsumsi harian',
                    'Bimbingan langsung dalam penyusunan jurnal dan laporan PKL',
                    'Peluang rekrutmen langsung sebagai junior engineer pasca lulus',
                ],
                'created_at' => '2026-09-12',
            ],
            [
                'id' => 'low-003',
                'title' => 'Network & Infrastructure Support Intern (PKL)',
                'tipe' => 'PKL',
                'tipe_badge' => 'Magang / PKL',
                'lokasi' => 'Bogor (On-site Penus Technopark)',
                'kategori' => 'Networking & IT Ops',
                'gaji' => 'Uang Saku + Sertifikat Industri',
                'status' => 'Aktif',
                'deadline' => '2026-11-10',
                'jurusan' => 'Teknik Komputer & Jaringan (TKJ)',
                'pelamar_count' => 8,
                'interview_count' => 2,
                'diterima_count' => 2,
                'kuota' => 4,
                'deskripsi' => 'Posisi magang teknis infrastruktur jaringan, konfigurasi perangkat router MikroTik / Cisco, pemeliharaan kabel LAN, troubleshooting hardware PC, dan konfigurasi server lokal Linux.',
                'persyaratan' => [
                    'Siswa aktif SMK Plus Pelita Nusantara jurusan TKJ',
                    'Memahami dasar TCP/IP, Subnetting, dan Routing MikroTik dasar',
                    'Mampu merakit PC dan crimping kabel RJ45 dengan rapi',
                    'Ketelitian tinggi dalam dokumentasi inventaris perangkat',
                ],
                'benefit' => [
                    'Pengalaman langsung menangani lab server dan rack cabinet IDUKA',
                    'Sertifikat verifikasi industri IDUKA SMK Penus',
                    'Uang saku bulanan',
                ],
                'created_at' => '2026-09-15',
            ],
            [
                'id' => 'low-004',
                'title' => 'Junior UI/UX Designer & Graphic Specialist',
                'tipe' => 'Kerja',
                'tipe_badge' => 'Full-Time Lulusan',
                'lokasi' => 'Bogor (Hybrid)',
                'kategori' => 'Design & Creative',
                'gaji' => 'Rp 4.000.000 - Rp 5.500.000',
                'status' => 'Ditutup',
                'deadline' => '2026-09-01',
                'jurusan' => 'Desain Komunikasi Visual (DKV) / Multimedia',
                'pelamar_count' => 15,
                'interview_count' => 4,
                'diterima_count' => 1,
                'kuota' => 1,
                'deskripsi' => 'Mendesain antarmuka aplikasi web dan mobile menggunakan Figma, membuat aset grafis banner marketing dan media sosial perusahaan.',
                'persyaratan' => [
                    'Lulusan SMK Plus Pelita Nusantara jurusan Multimedia / DKV / RPL',
                    'Portofolio desain UI di Figma / Behance',
                    'Menguasai prinsip layout, hierarki tipografi, dan kontras warna',
                ],
                'benefit' => [
                    'Gaji tetap bulanan',
                    'Subsidi langganan Figma Professional & Adobe Creative Cloud',
                    'Jam kerja fleksibel hybrid',
                ],
                'created_at' => '2026-08-20',
            ],
        ];
    }

    /**
     * Dapatkan detail lowongan berdasarkan ID
     */
    public function getVacancyById(string $id): ?array
    {
        $vacancies = $this->getVacancies();
        foreach ($vacancies as $v) {
            if ($v['id'] === $id) {
                return $v;
            }
        }
        return null;
    }

    /**
     * Dapatkan seluruh data pelamar dari semua lowongan
     */
    public function getAllApplicants(): array
    {
        return [
            [
                'id' => 'pel-001',
                'lowongan_id' => 'low-002',
                'lowongan_title' => 'Internship Web & Backend Developer (PKL Siswa)',
                'nama' => 'Ahmad Rizky Pratama',
                'nis_nisn' => '0061234567',
                'status_pendidikan' => 'Siswa Aktif Kelas XII RPL',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'email' => 'siswa_rizky@smkpenus.sch.id',
                'no_hp' => '0812-3456-7890',
                'cv_score' => 94,
                'status' => 'Interview',
                'tanggal_melamar' => '2026-09-20',
                'lokasi' => 'Cibinong, Bogor',
                'portfolio_url' => 'https://github.com/rizkypratama',
                'skills' => ['Laravel', 'PHP', 'Tailwind CSS', 'MySQL', 'Git'],
                'ringkasan_diri' => 'Siswa kelas XII SMK Plus Pelita Nusantara jurusan RPL dengan minat mendalam pada arsitektur web backend dan API. Memiliki pengalaman membangun sistem informasi perpustakaan mini dengan Laravel 11.',
                'catatan_seleksi' => 'Skor CV 94%. Pemahaman fondasi database dan MVC sangat kuat. Jadwal wawancara teknis diatur tanggal 30 September 2026.',
            ],
            [
                'id' => 'pel-002',
                'lowongan_id' => 'low-001',
                'lowongan_title' => 'Junior Frontend Developer (Tailwind & Vue/React)',
                'nama' => 'Nadia Salsabila, S.T.',
                'nis_nisn' => '1920.08.112',
                'status_pendidikan' => 'Alumni SMK Plus Pelita Nusantara (Lulus 2024)',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'email' => 'nadia.salsabila@gmail.com',
                'no_hp' => '0857-1122-3344',
                'cv_score' => 96,
                'status' => 'Dipanggil',
                'tanggal_melamar' => '2026-09-18',
                'lokasi' => 'Bogor Tengah',
                'portfolio_url' => 'https://nadiasalsabila.dev',
                'skills' => ['React.js', 'Vue.js', 'Tailwind CSS', 'TypeScript', 'Figma'],
                'ringkasan_diri' => 'Alumni berprestasi SMK Plus Pelita Nusantara dengan pengalaman 1 tahun lepas (freelance) membangun antarmuka web responsif dan integrasi RESTful API.',
                'catatan_seleksi' => 'Portofolio interaktif sangat rapi, pemahaman CSS modern di atas rata-rata. Dipanggil untuk wawancara user.',
            ],
            [
                'id' => 'pel-003',
                'lowongan_id' => 'low-003',
                'lowongan_title' => 'Network & Infrastructure Support Intern (PKL)',
                'nama' => 'Fajar Nugraha',
                'nis_nisn' => '0069876543',
                'status_pendidikan' => 'Siswa Aktif Kelas XI TKJ',
                'jurusan' => 'Teknik Komputer & Jaringan (TKJ)',
                'email' => 'fajar.nugraha@smkpenus.sch.id',
                'no_hp' => '0813-8899-0011',
                'cv_score' => 88,
                'status' => 'Interview',
                'tanggal_melamar' => '2026-09-22',
                'lokasi' => 'Depok / Cibinong',
                'portfolio_url' => 'https://github.com/fajartkj',
                'skills' => ['MikroTik MTCNA', 'Subnetting', 'Linux Ubuntu Server', 'Cabling UTP'],
                'ringkasan_diri' => 'Siswa aktif jurusan TKJ yang rajin bereksperimen dengan virtualisasi Proxmox dan routing MikroTik di lab sekolah.',
                'catatan_seleksi' => 'Lulus tes screening awal konfigurasi IP dan VLAN. Dijadwalkan interview praktikum hardware.',
            ],
            [
                'id' => 'pel-004',
                'lowongan_id' => 'low-002',
                'lowongan_title' => 'Internship Web & Backend Developer (PKL Siswa)',
                'nama' => 'Siti Nurhaliza',
                'nis_nisn' => '0065544332',
                'status_pendidikan' => 'Siswa Aktif Kelas XII RPL',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'email' => 'siti.nurhaliza@smkpenus.sch.id',
                'no_hp' => '0821-4455-6677',
                'cv_score' => 91,
                'status' => 'Diterima',
                'tanggal_melamar' => '2026-09-14',
                'lokasi' => 'Bogor Selatan',
                'portfolio_url' => 'https://github.com/sitinur',
                'skills' => ['PHP Native', 'Laravel', 'Bootstrap 5', 'MySQL'],
                'ringkasan_diri' => 'Juara 2 LKS Web Technologies tingkat sekolah, terbiasa merancang skema ERD basis data relasional.',
                'catatan_seleksi' => 'Diterima untuk penempatan PKL mulai 1 November 2026 di tim Core Application STN.',
            ],
            [
                'id' => 'pel-005',
                'lowongan_id' => 'low-001',
                'lowongan_title' => 'Junior Frontend Developer (Tailwind & Vue/React)',
                'nama' => 'Bima Satria Wicaksana',
                'nis_nisn' => '1819.07.098',
                'status_pendidikan' => 'Alumni SMK Plus Pelita Nusantara (Lulus 2023)',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'email' => 'bima.satria@gmail.com',
                'no_hp' => '0878-9900-1122',
                'cv_score' => 74,
                'status' => 'Ditolak',
                'tanggal_melamar' => '2026-09-11',
                'lokasi' => 'Jakarta Timur',
                'portfolio_url' => 'https://linkedin.com/in/bimasatria',
                'skills' => ['HTML', 'Basic CSS', 'WordPress'],
                'ringkasan_diri' => 'Alumni dengan pengalaman pengoperasian CMS WordPress dan entri data web e-commerce.',
                'catatan_seleksi' => 'Kualifikasi teknis JavaScript dan framework belum sesuai dengan kriteria yang dibutuhkan posisi ini.',
            ],
            [
                'id' => 'pel-006',
                'lowongan_id' => 'low-002',
                'lowongan_title' => 'Internship Web & Backend Developer (PKL Siswa)',
                'nama' => 'Dimas Prasetyo',
                'nis_nisn' => '0063322110',
                'status_pendidikan' => 'Siswa Aktif Kelas XI RPL',
                'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                'email' => 'dimas.prasetyo@smkpenus.sch.id',
                'no_hp' => '0858-3344-5566',
                'cv_score' => 85,
                'status' => 'Dipanggil',
                'tanggal_melamar' => '2026-09-24',
                'lokasi' => 'Cibinong, Bogor',
                'portfolio_url' => 'https://github.com/dimasprast',
                'skills' => ['JavaScript', 'Node.js Express', 'PostgreSQL'],
                'ringkasan_diri' => 'Siswa antusias yang gemar mengeksplorasi backend modern berbasis asynchronous runtime Node.js.',
                'catatan_seleksi' => 'Berkas pendaftaran lengkap. Menunggu konfirmasi jadwal briefing teknis.',
            ],
        ];
    }

    /**
     * Dapatkan daftar pelamar pada spesifik lowongan
     */
    public function getApplicantsByVacancy(string $vacancyId): array
    {
        $all = $this->getAllApplicants();
        return array_values(array_filter($all, fn ($a) => $a['lowongan_id'] === $vacancyId));
    }

    /**
     * Dapatkan detail satu pelamar berdasarkan vacancyId dan applicantId
     */
    public function getApplicant(string $vacancyId, string $applicantId): ?array
    {
        $all = $this->getAllApplicants();
        foreach ($all as $item) {
            if ($item['id'] === $applicantId) {
                return $item;
            }
        }
        return null;
    }

    /**
     * Generate format CV Markdown untuk preview pelamar
     */
    public function getApplicantCvMarkdown(array $applicant): string
    {
        $nama = $applicant['nama'];
        $jurusan = $applicant['jurusan'];
        $statusPendidikan = $applicant['status_pendidikan'];
        $email = $applicant['email'];
        $phone = $applicant['no_hp'];
        $lokasi = $applicant['lokasi'];
        $ringkasan = $applicant['ringkasan_diri'];
        $skills = implode(', ', $applicant['skills']);

        return <<<MD
# {$nama}
**{$statusPendidikan} — {$jurusan}**
📧 {$email} | 📞 {$phone} | 📍 {$lokasi}

---

## 📌 Ringkasan Profesional
{$ringkasan}

## 🎓 Riwayat Pendidikan
- **SMK Plus Pelita Nusantara** (2023 - Sekarang)
  - Program Keahlian: {$jurusan}
  - Nilai Rata-rata Rapor Kejuruan: 89.4 / 100
  - Keaktifan: Anggota Tim IT Club & Pengurus OSIS

## 🛠️ Keterampilan Teknis & Tooling
- **Kompetensi Utama**: {$skills}
- **Tools**: VS Code, Git, GitHub, Postman, Figma, Terminal bash/zsh
- **Bahasa**: Bahasa Indonesia (Native), Bahasa Inggris (Teknis / Menengah)

## 💼 Pengalaman Proyek & Praktik
- **Aplikasi Sistem Informasi Presensi Digital Sekolah**
  - Mengembangkan sistem autentikasi dan pencatatan absensi siswa harian.
  - Mengimplementasikan responsive UI dengan Tailwind CSS dan basis data MySQL.
- **Portofolio Proyek Mandiri**
  - Tersimpan dan terdokumentasi di repositori: [{$applicant['portfolio_url']}]({$applicant['portfolio_url']})

## 🏆 Prestasi & Sertifikasi
- Sertifikasi Uji Kompetensi Keahlian (UKK) BNSP Tingkat II (Predikat Sangat Kompeten)
- Finalis Lomba Kompetensi Siswa (LKS) Tingkat Kota/Kabupaten Bogor
MD;
    }
}
