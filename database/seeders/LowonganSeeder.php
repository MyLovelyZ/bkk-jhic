<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use App\Models\Mitra;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LowonganSeeder extends Seeder
{
    public function run(): void
    {
        $stn = Mitra::where('npwp', '01.234.567.8-012.000')->first();
        $telkom = Mitra::where('npwp', '02.345.678.9-501.000')->first();
        $bca = Mitra::where('npwp', '03.456.789.0-021.000')->first();
        $cni = Mitra::where('npwp', '04.567.890.1-401.000')->first();
        $lentera = Mitra::where('npwp', '05.678.901.2-123.000')->first();

        if ($stn) {
            Lowongan::updateOrCreate(
                ['slug' => 'junior-web-developer-laravel-react-stn'],
                [
                    'mitra_id' => $stn->id,
                    'judul' => 'Junior Web Developer (Laravel & React)',
                    'tipe' => 'Kerja',
                    'tipe_badge' => 'Full-Time Lulusan',
                    'target_jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                    'lokasi' => 'Bogor (Hybrid)',
                    'kategori_posisi' => 'Software Engineering',
                    'gaji_kompensasi' => 'Rp 4.500.000 - Rp 6.000.000',
                    'kuota' => 3,
                    'deadline' => now()->addMonths(2)->toDateString(),
                    'deskripsi' => 'Kami membuka kesempatan bagi alumni SMK Plus Pelita Nusantara jurusan RPL untuk bergabung sebagai Junior Web Developer. Anda akan berkolaborasi dalam sprint pengembangan aplikasi internal dan modul sistem informasi klien berbasis Laravel dan modern frontend framework.',
                    'persyaratan_json' => [
                        'Lulusan SMK jurusan Rekayasa Perangkat Lunak (RPL)',
                        'Memahami konsep OOP, MVC, dan framework Laravel',
                        'Mampu menggunakan Git untuk kolaborasi tim',
                        'Memiliki nilai plus jika terbiasa dengan RESTful API & MySQL/PostgreSQL',
                    ],
                    'benefit_json' => [
                        'Gaji pokok kompetitif sesuai UMK Bogor',
                        'BPJS Kesehatan & Ketenagakerjaan',
                        'Fasilitas laptop kerja MacBook / ThinkPad',
                        'Jalur jenjang karier & mentoring engineer senior',
                    ],
                    'status' => 'Aktif',
                    'views_count' => 142,
                ]
            );

            Lowongan::updateOrCreate(
                ['slug' => 'pkl-web-application-tester-support-stn'],
                [
                    'mitra_id' => $stn->id,
                    'judul' => 'Praktik Kerja Lapangan (PKL) — Web Application Support',
                    'tipe' => 'PKL',
                    'tipe_badge' => 'Magang / PKL Siswa',
                    'target_jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                    'lokasi' => 'Bogor (On-Site)',
                    'kategori_posisi' => 'Quality Assurance & Support',
                    'gaji_kompensasi' => 'Uang Saku & Uang Makan Harian',
                    'kuota' => 4,
                    'deadline' => now()->addMonth()->toDateString(),
                    'deskripsi' => 'Program PKL intensif 6 bulan untuk siswa aktif kelas XI/XII RPL. Siswa akan belajar langsung pengujian fungsionalitas web, pembuatan dokumentasi test case, serta debugging bug pada staging server.',
                    'persyaratan_json' => [
                        'Siswa aktif SMK Plus Pelita Nusantara jurusan RPL',
                        'Mendapat rekomendasi surat pengantar dari sekolah',
                        'Teliti, disiplin, dan memiliki rasa ingin tahu tinggi',
                    ],
                    'benefit_json' => [
                        'Sertifikat PKL resmi industri IDUKA',
                        'Uang saku bulanan dan makan siang',
                        'Prioritas rekrutmen kerja setelah lulus',
                    ],
                    'status' => 'Aktif',
                    'views_count' => 88,
                ]
            );
        }

        if ($telkom) {
            Lowongan::updateOrCreate(
                ['slug' => 'pkl-field-technician-fiber-optic-telkom-akses'],
                [
                    'mitra_id' => $telkom->id,
                    'judul' => 'Field Technician & Fiber Optic Support (PKL)',
                    'tipe' => 'PKL',
                    'tipe_badge' => 'Magang / PKL Siswa',
                    'target_jurusan' => 'Teknik Komputer & Jaringan (TKJ)',
                    'lokasi' => 'Semarang (Field Ops)',
                    'kategori_posisi' => 'Telecommunication Ops',
                    'gaji_kompensasi' => 'Uang Saku Bulanan & Transport',
                    'kuota' => 6,
                    'deadline' => now()->addMonths(1)->toDateString(),
                    'deskripsi' => 'Kesempatan magang PKL langsung di lapangan bersama teknisi profesional PT Telkom Akses. Siswa akan mempraktikkan proses optical network deployment, splicing kabel fiber optic, pengukuran OTDR, dan troubleshooting ODP/ONT pelanggan.',
                    'persyaratan_json' => [
                        'Siswa aktif kelas XI / XII jurusan TKJ SMK Penus',
                        'Memahami dasar topologi jaringan dan keselamatan kerja (K3)',
                        'Siap bertugas di area teknis lapangan',
                    ],
                    'benefit_json' => [
                        'Sertifikat industri Telkom Akses',
                        'Pelatihan standar sertifikasi teknisi fiber optic',
                        'APD keselamatan kerja lengkap',
                    ],
                    'status' => 'Aktif',
                    'views_count' => 215,
                ]
            );
        }

        if ($bca) {
            Lowongan::updateOrCreate(
                ['slug' => 'junior-operations-it-support-bca-digital'],
                [
                    'mitra_id' => $bca->id,
                    'judul' => 'Junior IT Operations & Helpdesk Support',
                    'tipe' => 'Kerja',
                    'tipe_badge' => 'Full-Time Lulusan',
                    'target_jurusan' => 'TKJ & RPL',
                    'lokasi' => 'Jakarta Selatan',
                    'kategori_posisi' => 'IT Infrastructure',
                    'gaji_kompensasi' => 'Rp 5.500.000 - Rp 7.000.000',
                    'kuota' => 2,
                    'deadline' => now()->addMonths(3)->toDateString(),
                    'deskripsi' => 'Mendukung operasional infrastruktur workstation karyawan, sistem monitoring layanan digital, serta ticketing sistem support di lingkungan bank digital modern.',
                    'persyaratan_json' => [
                        'Alumni SMK Penus jurusan TKJ atau RPL (maksimal kelulusan 2 tahun)',
                        'Memahami administrasi Windows/Linux dan LAN network dasar',
                        'Komunikasi sopan, responsif, dan mampu bekerja shift jika diperlukan',
                    ],
                    'benefit_json' => [
                        'Asuransi kesehatan swasta kelas 1',
                        'Bonus tahunan performa kerja',
                        'Subsidi gym & program kesejahteraan mental',
                    ],
                    'status' => 'Aktif',
                    'views_count' => 310,
                ]
            );
        }

        if ($lentera) {
            Lowongan::updateOrCreate(
                ['slug' => 'junior-graphic-designer-multimedia-lentera'],
                [
                    'mitra_id' => $lentera->id,
                    'judul' => 'Junior Graphic Designer & Motion Content Artist',
                    'tipe' => 'Kerja',
                    'tipe_badge' => 'Full-Time Lulusan',
                    'target_jurusan' => 'Desain Komunikasi Visual (DKV)',
                    'lokasi' => 'Bogor',
                    'kategori_posisi' => 'Creative & Multimedia',
                    'gaji_kompensasi' => 'Rp 4.000.000 - Rp 5.200.000',
                    'kuota' => 2,
                    'deadline' => now()->addMonths(2)->toDateString(),
                    'deskripsi' => 'Membuat aset visual promosi media sosial, materi branding identitas klien, layout brosur, dan animasi bumper video ringkas.',
                    'persyaratan_json' => [
                        'Lulusan SMK jurusan DKV / Multimedia',
                        'Wajib melampirkan portofolio karya kreatif (Behance/Drive)',
                        'Menguasai Adobe Photoshop, Illustrator, atau After Effects',
                    ],
                    'benefit_json' => [
                        'Ruang kerja studio kreatif dan santai',
                        'Bonus per proyek komersial terselesaikan',
                    ],
                    'status' => 'Aktif',
                    'views_count' => 95,
                ]
            );
        }
    }
}
