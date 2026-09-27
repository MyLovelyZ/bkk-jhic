<?php

namespace Database\Seeders;

use App\Models\CvKeahlian;
use App\Models\CvPendidikan;
use App\Models\CvPengalaman;
use App\Models\CvResume;
use App\Models\CvSertifikat;
use App\Models\ProfilSiswa;
use Illuminate\Database\Seeder;

class CvResumeSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = ProfilSiswa::find('usr-siswa-001');
        $alumni = ProfilSiswa::find('usr-alumni-001');

        if ($siswa) {
            $markdownSiswa = <<<MARKDOWN
# Ahmad Rizky Pratama
**Junior Full-Stack Web Developer**
Email: siswa_rizky@smkpenus.sch.id | Telepon: 0812-3456-7890 | Bogor, Jawa Barat
LinkedIn: linkedin.com/in/ahmad-rizky-pratama | GitHub: github.com/rizkypratama-dev

---

## Ringkasan Profesional
Siswa kelas XII jurusan Rekayasa Perangkat Lunak SMK Plus Pelita Nusantara dengan pengalaman praktis dalam perancangan web responsif dan backend menggunakan PHP Laravel, PostgreSQL, dan Tailwind CSS. Memiliki portofolio proyek manajemen sekolah dan sistem inventaris barang.

## Pendidikan
**SMK Plus Pelita Nusantara** — Rekayasa Perangkat Lunak (RPL)  
*2023 - 2026 (Sekarang)* | Nilai Rata-rata: 89.5 / 100  
- Juara 2 Lomba Kompetensi Siswa (LKS) Web Technologies Tingkat Kota Bogor (2025)

## Pengalaman PKL & Proyek
**PT Solusi Teknologi Nusantara** — Web Developer Intern  
*Juli 2025 - Sekarang | Bogor*  
- Mengembangkan 12 antarmuka dashboard admin menggunakan Tailwind CSS & Blade template.
- Mengintegrasikan modul otentikasi JWT microservice dengan waktu respon API di bawah 200ms.
- Mengoptimalkan query database PostgreSQL untuk pelaporan transaksi bulanan.

## Keahlian Teknis
- **Bahasa Pemrograman**: PHP, JavaScript, SQL, HTML5/CSS3
- **Framework & Libs**: Laravel 12, Bootstrap 5, Tailwind CSS, Alpine.js
- **Tools**: Git, GitHub, Postman, VS Code, Figma
MARKDOWN;

            $resumeSiswa = CvResume::updateOrCreate(
                ['siswa_id' => $siswa->user_id, 'is_primary' => true],
                [
                    'judul_cv' => 'CV ATS Utama — Software Engineering',
                    'target_posisi' => 'Junior Web Developer / Backend Intern',
                    'domisili_kota' => 'Bogor',
                    'ringkasan_eksekutif' => 'Siswa kelas XII RPL yang menguasai ekosistem Laravel dan modern relational database.',
                    'konten_markdown' => $markdownSiswa,
                    'skor_total_ai' => 94,
                    'skor_parameter_json' => [
                        ['label' => 'Kesesuaian Industri', 'value' => 95],
                        ['label' => 'Kelengkapan Data', 'value' => 92],
                        ['label' => 'Format ATS Standar', 'value' => 98],
                        ['label' => 'Daya Tarik Portofolio', 'value' => 91],
                    ],
                    'saran_perbaikan_ai_json' => [
                        [
                            'id' => 's1',
                            'section' => 'Sertifikasi Kejuruan',
                            'impact' => 'Tinggi',
                            'title' => 'Tambahkan Sertifikat BNSP Pemrograman Web',
                            'desc' => 'Sertifikasi BNSP Skema Junior Web Programmer akan meningkatkan daya saing ATS hingga 98%.',
                        ]
                    ],
                    'terakhir_dianalisis_ai' => now()->subDays(2),
                ]
            );

            // Sub-tables
            CvPendidikan::updateOrCreate(
                ['cv_id' => $resumeSiswa->id, 'nama_institusi' => 'SMK Plus Pelita Nusantara'],
                [
                    'jurusan_peminatan' => 'Rekayasa Perangkat Lunak',
                    'tahun_mulai' => '2023',
                    'tahun_selesai' => '2026',
                    'nilai_akhir' => 'Rata-rata 89.5',
                    'deskripsi_prestasi' => 'Juara 2 LKS Web Technologies Tingkat Kota Bogor',
                    'urutan' => 1,
                ]
            );

            CvPengalaman::updateOrCreate(
                ['cv_id' => $resumeSiswa->id, 'perusahaan' => 'PT Solusi Teknologi Nusantara'],
                [
                    'tipe_pengalaman' => 'PKL',
                    'posisi' => 'Web Developer Intern',
                    'lokasi' => 'Bogor',
                    'periode_mulai' => '2025-07-01',
                    'periode_selesai' => null,
                    'is_current' => true,
                    'deskripsi_tugas' => 'Membangun komponen Blade UI dan REST API backend modul sistem informasi BKK.',
                    'urutan' => 1,
                ]
            );

            $skills = [
                ['nama' => 'Laravel Framework', 'kat' => 'Backend', 'tingkat' => 'Mahir'],
                ['nama' => 'PostgreSQL & MySQL', 'kat' => 'Database', 'tingkat' => 'Mahir'],
                ['nama' => 'Tailwind CSS', 'kat' => 'Frontend', 'tingkat' => 'Mahir'],
                ['nama' => 'REST API Design', 'kat' => 'Arsitektur', 'tingkat' => 'Menengah'],
                ['nama' => 'Git Version Control', 'kat' => 'Tools', 'tingkat' => 'Mahir'],
            ];
            foreach ($skills as $s) {
                CvKeahlian::updateOrCreate(
                    ['cv_id' => $resumeSiswa->id, 'nama_keahlian' => $s['nama']],
                    ['kategori' => $s['kat'], 'tingkat_kemahiran' => $s['tingkat']]
                );
            }

            CvSertifikat::updateOrCreate(
                ['cv_id' => $resumeSiswa->id, 'nama_sertifikat' => 'LSP-P1 Junior Web Developer SMK Pelita Nusantara'],
                [
                    'lembaga_penerbit' => 'Badan Nasional Sertifikasi Profesi (BNSP)',
                    'tahun_perolehan' => '2025',
                    'nomor_sertifikat' => 'BNSP-SMK-PENUS-2025-089',
                    'status_verifikasi' => 'VALID',
                ]
            );
        }

        if ($alumni) {
            $markdownAlumni = <<<MARKDOWN
# Nadia Salsabila
**MikroTik Certified Network Associate (MTCNA)**
Email: nadia.salsabila@gmail.com | Telepon: 0857-1122-3344 | Semarang, Jawa Tengah
LinkedIn: linkedin.com/in/nadiasalsabila

---

## Ringkasan Profesional
Alumni SMK Plus Pelita Nusantara 2024 jurusan Teknik Komputer & Jaringan dengan sertifikasi resmi MTCNA. Berpengalaman 1 tahun dalam konfigurasi perangkat jaringan MikroTik, troubleshooting fiber optic, dan pemeliharaan infrastruktur jaringan ISP.

## Pengalaman Kerja
**PT Telkom Akses Semarang** — Junior Network Engineer  
*Agustus 2024 - Sekarang | Semarang*  
- Melakukan maintenance preventif pada 50+ ODP (Optical Distribution Point) per bulan.
- Mengonfigurasi VLAN dan bandwidth management RouterOS MikroTik untuk pelanggan korporasi.

## Pendidikan
**SMK Plus Pelita Nusantara** — Teknik Komputer & Jaringan (TKJ)  
*2021 - 2024* | Nilai Akhir: 91.0 / 100
MARKDOWN;

            $resumeAlumni = CvResume::updateOrCreate(
                ['siswa_id' => $alumni->user_id, 'is_primary' => true],
                [
                    'judul_cv' => 'CV ATS Profesional — Network Engineer',
                    'target_posisi' => 'Network Engineer / Systems Support',
                    'domisili_kota' => 'Semarang',
                    'ringkasan_eksekutif' => 'Alumni TKJ berdedikasi tinggi dengan keahlian sertifikasi MTCNA.',
                    'konten_markdown' => $markdownAlumni,
                    'skor_total_ai' => 96,
                    'skor_parameter_json' => [
                        ['label' => 'Kesesuaian Industri', 'value' => 98],
                        ['label' => 'Kelengkapan Data', 'value' => 95],
                        ['label' => 'Format ATS Standar', 'value' => 96],
                        ['label' => 'Daya Tarik Portofolio', 'value' => 95],
                    ],
                    'terakhir_dianalisis_ai' => now()->subDay(),
                ]
            );

            CvPendidikan::updateOrCreate(
                ['cv_id' => $resumeAlumni->id, 'nama_institusi' => 'SMK Plus Pelita Nusantara'],
                [
                    'jurusan_peminatan' => 'Teknik Komputer & Jaringan',
                    'tahun_mulai' => '2021',
                    'tahun_selesai' => '2024',
                    'nilai_akhir' => '91.0 / 100',
                    'deskripsi_prestasi' => 'Peringkat 1 Lulusan Terbaik Jurusan TKJ Angkatan 2024',
                    'urutan' => 1,
                ]
            );

            CvPengalaman::updateOrCreate(
                ['cv_id' => $resumeAlumni->id, 'perusahaan' => 'PT Telkom Akses Semarang'],
                [
                    'tipe_pengalaman' => 'KERJA',
                    'posisi' => 'Junior Network Engineer',
                    'lokasi' => 'Semarang',
                    'periode_mulai' => '2024-08-01',
                    'periode_selesai' => null,
                    'is_current' => true,
                    'deskripsi_tugas' => 'Instalasi dan pemeliharaan jaringan fiber optic serta manajemen bandwidth MikroTik.',
                    'urutan' => 1,
                ]
            );

            CvSertifikat::updateOrCreate(
                ['cv_id' => $resumeAlumni->id, 'nama_sertifikat' => 'MikroTik Certified Network Associate (MTCNA)'],
                [
                    'lembaga_penerbit' => 'MikroTik SIA / Academy Penus',
                    'tahun_perolehan' => '2024',
                    'nomor_sertifikat' => 'MTCNA-2405-ID-8819',
                    'status_verifikasi' => 'VALID',
                ]
            );
        }
    }
}
