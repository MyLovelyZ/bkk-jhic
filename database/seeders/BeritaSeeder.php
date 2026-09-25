<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriMap = KategoriBerita::pluck('id', 'slug')->toArray();

        $markdownCvAts = <<<MD
Masalah paling lazim yang kerap dihadapi siswa SMK tingkat akhir saat hendak melamar Praktik Kerja Lapangan (PKL) maupun lowongan kerja perdana adalah sindrom *"halaman kosong"*. Banyak siswa merasa rendah diri karena belum memiliki pengalaman kerja kantoran formal, sehingga bingung poin apa saja yang layak dimasukkan ke dalam resume profesional.

Padahal, industri mitra BKK Penus justru mencari **kapabilitas kejuruan terapan, kedisiplinan teknis, dan portofolio nyata**. Melalui standar *Applicant Tracking System (ATS)* yang kini diterapkan oleh 85% perusahaan rekanan BKK Pelita Nusantara, resume Anda dinilai berdasarkan kesesuaian kata kunci kompetensi, struktur hierarki teks yang bersih, dan keterverifikasian data.

---

## 1. Konversikan Tugas & Proyek Praktikum Menjadi Pengalaman Nyata (Project-Based Learning)

Jangan biarkan kolom pengalaman kosong melompong. Bila Anda jurusan Rekayasa Perangkat Lunak, cantumkan proyek akhir pembuatan sistem kasir berbasis web atau implementasi API pembayaran. Bagi jurusan Akuntansi, tuliskan pengalaman menyusun laporan keuangan neraca lajur UKM saat simulasi *Teaching Factory (TEFA)*. Gunakan formula aksi: **Tindakan + Alat/Teknologi + Hasil yang Terukur**.

> **Contoh Format Penulisan:**
> *"Mengembangkan aplikasi inventaris bengkel menggunakan PHP Native dan MySQL dengan efisiensi pencarian data suku cadang di bawah 2 detik selama program TEFA Semester 5."*

---

## 2. Cantumkan Sertifikasi Uji Kompetensi Keahlian (UKK) dan Lisensi BNSP

Sertifikasi kejuruan adalah pembeda paling vital antara siswa SMK dengan pelamar umum. Di BKK Penus, HRD mitra secara spesifik menyortir kandidat berdasar nomor registrasi sertifikat BNSP (Badan Nasional Sertifikasi Profesi) atau predikat Uji Kompetensi Keahlian (UKK) Mandiri. Letakkan bagian ini langsung di bawah ringkasan profil Anda.

---

## 3. Gunakan Kata Kunci Teknis Sesuai Spesialisasi Jurusan

Algoritma ATS bekerja dengan mencocokkan kata kunci spesifik yang tercantum pada kualifikasi lowongan. Hindari istilah umum yang kabur seperti "bisa komputer" atau "rajin bekerja". Ganti dengan frasa kompetensi industri yang presisi:

### TKJ & RPL
* MikroTik MTCNA, Subnetting CIDR
* Tailwind CSS, React.js, Git Versioning
* Cisco Packet Tracer, Linux Server CentOS

### AKL & OTKP
* General Ledger & Neraca Lajur
* Perpajakan PPh 21 & e-Faktur
* Kearsipan Sistem Abjad & Agenda Surat

---

## 4. Sertakan Bukti Portofolio Tautan Aktif (GitHub, Figma, atau Cloud Drive)

Rekruter industri vokasi mengapresiasi pelamar yang berani menunjukkan hasil karya nyata. Pastikan tautan portofolio dapat diakses publik tanpa hambatan kata sandi. Cantumkan tautan Figma untuk siswa Desain Komunikasi Visual, repositori GitHub untuk RPL, atau Google Drive rapi berisi lembar kerja kalkulasi akuntansi untuk AKL.

---

## 5. Pastikan Kontak Valid & Nilai Rapor Terverifikasi Tata Usaha

Banyak lamaran gugur karena nomor WhatsApp yang tidak aktif atau alamat surel yang tidak profesional (misal: *pejuang.santai99@gmail.com*). Gunakan format nama depan dan belakang resmi: *nama.lengkap@domain.com*. Pastikan pula sinkronisasi nilai rapor semester 1-5 telah disahkan oleh staf TU BKK agar memperoleh status **"Validated by Penus Authority"**.

---

### Kesimpulan & Arahan Selanjutnya

Penyusunan resume bukan sekadar mendaftar riwayat hidup, melainkan instrumen *positioning* nilai tambah kejuruan Anda. Jangan tunda hingga masa kelulusan tiba. Mulailah menginventarisir bukti praktikum hari ini, lalu manfaatkan generator CV BKK Penus untuk segera mendaftar pada deretan lowongan PKL gelombang terbaru.
MD;

        $articles = [
            [
                'judul' => 'Job Fair Akbar SMK Plus Pelita Nusantara 2025: Hadirkan 35 Perusahaan Nasional dan 500+ Lowongan Khusus Lulusan Vokasi',
                'slug' => 'job-fair-akbar-smk-plus-pelita-nusantara-2025',
                'kategori_id' => $kategoriMap['agenda-event'] ?? 1,
                'ringkasan' => 'Pusat karier BKK Penus kembali menghelat perhelatan rekrutmen massal tahunan dengan menggandeng industri otomotif, teknologi informasi, logistik, dan hospitality terkemuka. Registrasi dibuka secara terintegrasi via portal mandiri siswa.',
                'konten' => "## Sukseskan Masa Depan Vokasi di Penus Career Expo 2025\n\nBursa Kerja Khusus (BKK) SMK Plus Pelita Nusantara kembali menyelenggarakan agenda rekrutmen tahunan berskala nasional. Sebanyak lebih dari 35 perusahaan dari berbagai sektor siap merekrut bibit unggul vokasi secara langsung.\n\n### Rangkaian Kegiatan\n- **Walk-in Interview Langsung**: Siswa dan alumni dapat mengikuti tes tahap 1 di tempat.\n- **Seminar Kesiapan Karier**: Menghadirkan narasumber dari praktisi industri manufaktur dan digital.\n- **Pameran Teaching Factory**: Unjuk karya inovasi siswa per jurusan.\n\nPastikan Anda mempersiapkan berkas CV digital yang rapi dan seragam resmi sekolah saat menghadiri expo ini.",
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAUM_9PoEDzhUHmysf4BQAkT6lrpVW6bpBNpCPaTFKzAYGFnllsgVWTQNfJTWHAi1yxF_RhLLP4cxUUc7ZB09-sJOgY7ng8NZN7hwgw7Va_jkHa3--Cp3LB1LEw064ZKk2M1otu2uG6ily06ajNGnvx5hqVoE9yDT3aFtKAlB-d7SSSdhePgEWrs_nXRkfKrBqNFVoGt2Ozb-bIg55sYJhjHaA3sjDTI8G8eoB0HdZDlf6FpDDDOC1b',
                'caption_gambar' => 'Suasana antusias Job Fair akbar di aula auditorium SMK Plus Pelita Nusantara bersama puluhan mitra industri ternama.',
                'penulis_nama' => 'Tim Humas & BKK Penus',
                'penulis_jabatan' => 'Sekretariat Penus Cibinong',
                'penulis_avatar' => null,
                'penulis_bio' => 'Divisi Komunikasi Publik dan Pusat Bursa Kerja Khusus SMK Plus Pelita Nusantara Cibinong Bogor.',
                'estimasi_baca' => '4 Menit Baca',
                'is_featured' => true,
                'status' => 'PUBLISHED',
                'views_count' => 1240,
                'published_at' => Carbon::parse('2025-05-24 08:00:00'),
            ],
            [
                'judul' => 'Panduan Praktis Siswa: 5 Langkah Membuat CV Digital Standar ATS Menggunakan BKK Penus',
                'slug' => 'panduan-praktis-siswa-5-langkah-membuat-cv-digital-standar-ats',
                'kategori_id' => $kategoriMap['panduan-tips-karier'] ?? 3,
                'ringkasan' => 'Pelajari rahasia lolos penyaringan otomatis Applicant Tracking System bagi fresh graduate SMK dengan kata kunci kompetensi keahlian.',
                'konten' => $markdownCvAts,
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBhUAdcpYiluQpZfjpUo75IgCnwRib0o2bdtKm1MlqHU7QD6tTy0TRicTctlr_mFtI8N6qEz062Rn2qpj0sm2vDthps2LcZTHbMbUL8MBt5eL9DvYtkATQD6zsFjhBF7qiFJ4n7hqBGBljQVPzcbYNJOgrxfXn9DpEdIrnIaNVStIb4Xb5_hnfGFJvsACn3McSVO5PYoz7F2Qm293LjDMtfsyYmOuH6CJOM0-CxOoF7bLFwRIRL7unG',
                'caption_gambar' => 'Dokumentasi & Ilustrasi: Modul Persiapan Magang Industri Mandiri • Unit Penjaminan Mutu Lulusan',
                'penulis_nama' => 'Ibu Sri Rahayu, M.Pd.',
                'penulis_jabatan' => 'Koordinator BKK & Bimbingan Konseling SMK Penus',
                'penulis_avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB63mLO-BnMgFFgqx1mTuwPFGCzTmwLyy8_J4aLTzOGznPDmlW9ogUP_BfzTLkJ0xlAceEAOeRFi6oS_ZIKOEISZaexn-6scwvS0zs0dbPRAtJzIBlUYU2AMsnkYW-A-8Jh1zw-wQ4iRtEhhvoE1Ukg7i6-1XSC3KrQ8MOWP1Mp2FIYqYepTfVt-76KoTaeWJF2gXKoGd38EgQEhJhlThO8F6cMObBxynYkKpZ54dFAgJrgWayRbAbo',
                'penulis_bio' => 'Berpengalaman lebih dari 12 tahun membimbing ribuan siswa SMK Plus Pelita Nusantara menembus industri otomotif, perbankan, manufaktur, dan software house nasional. Memegang sertifikasi Konselor Vokasi BNSP.',
                'estimasi_baca' => '5 Menit Baca',
                'is_featured' => false,
                'status' => 'PUBLISHED',
                'views_count' => 890,
                'published_at' => Carbon::parse('2025-05-18 10:15:00'),
            ],
            [
                'judul' => 'Penyelarasan Kurikulum Vokasi 2025 bersama PT Astra Otoparts & Telkom Akses',
                'slug' => 'penyelarasan-kurikulum-vokasi-2025-astra-otoparts-telkom',
                'kategori_id' => $kategoriMap['kemitraan'] ?? 5,
                'ringkasan' => 'Memastikan kompetensi teknis peserta didik jurusan TKRO, TKJ, dan RPL selaras langsung dengan standar operasional pabrikasi terkini.',
                'konten' => "## Sinkronisasi Kebutuhan Industri Manufaktur & Telekomunikasi\n\nUntuk menjamin keterserapan lulusan yang optimal, SMK Plus Pelita Nusantara secara berkala mengadakan sinkronisasi kurikulum bersama para pemangku industri terkemuka. Dalam pertemuan terkini bersama jajaran manajemen **PT Astra Otoparts Tbk** dan **PT Telkom Akses**, disepakati penambahan materi praktikum berbasis standar bengkel resmi dan instalasi serat optik modern.\n\n> *\"Siswa vokasi harus familiar dengan peralatan dan SOP industri sejak di bangku kelas XI, bukan baru belajar saat turun ke lapangan magang.\"* — Tim Pengembang Kurikulum Vokasi.\n\nKerja sama ini juga mencakup komitmen kuota magang prioritas dan sertifikasi industri bagi siswa berprestasi.",
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDE8yzqYGf2hT4bYvUkHE0P7LQgydg9R0JGxxrsQKfytPHWXSCg9IWXfcX_nrjJ3tHsMSxkKdGtjyT3eZeLj1jnL_efbCxxQQQ1rPqDBPxDVQ5U7rmdpL6VSDBr6yf98jPqXXhC-fzM_wcQsU_vHGlHvReqVE4tXOK0o6wSCcp0Yxwo8N7cY9mPA1t1Zs1n7upMLABr0pJ3EgkuMOf71n6CdWgWs8fblcFnXMRfm1Lv9r4l8YgJs-zC',
                'caption_gambar' => 'Sesi penandatanganan nota kesepahaman sinkronisasi kurikulum industri di ruang rapat pimpinan.',
                'penulis_nama' => 'Humas Industri',
                'penulis_jabatan' => 'Pokja Kemitraan IDUKA',
                'penulis_avatar' => null,
                'penulis_bio' => 'Pokja Kerja Sama Industri dan Dunia Usaha SMK Plus Pelita Nusantara.',
                'estimasi_baca' => '3 Menit Baca',
                'is_featured' => false,
                'status' => 'PUBLISHED',
                'views_count' => 640,
                'published_at' => Carbon::parse('2025-05-20 09:00:00'),
            ],
            [
                'judul' => 'Jadwal Pembekalan dan Pelepasan PKL Gelombang II Tahun Ajaran 2024/2025',
                'slug' => 'jadwal-pembekalan-dan-pelepasan-pkl-gelombang-ii',
                'kategori_id' => $kategoriMap['agenda-event'] ?? 1,
                'ringkasan' => 'Informasi komprehensif tanggal serah terima ke 42 IDUKA mitra, tata tertib absensi harian, dan pembagian dosen pamong pembimbing lapangan.',
                'konten' => "## Persiapan Menuju Praktik Kerja Lapangan Gelombang II\n\nDiberitahukan kepada seluruh siswa kelas XI yang terdaftar pada program PKL Gelombang II, agenda pembekalan terpusat akan dilaksanakan sesuai jadwal berikut:\n\n* **Hari/Tanggal**: Rabu, 28 Mei 2025\n* **Pukul**: 07.30 - 12.00 WIB\n* **Tempat**: Lapangan Utama & Aula Serbaguna Penus\n* **Pakaian**: Seragam Wearpack Kejuruan Lengkap\n\n### Berkas yang Wajib Dibawa:\n1. Buku Jurnal Kegiatan PKL Resmi BKK\n2. Surat Izin Orang Tua bermaterai\n3. Salinan Kartu Pelajar & Kartu BPJS Ketenagakerjaan Siswa\n\nKehadiran bersifat wajib bagi seluruh calon peserta magang.",
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCdEP9QiyayhPuPK5DqZghuMq7WPV4nv2Cp_p0FupgIiKyxwcr2TNBXEk6Lx8v7IHJhG-BAapIfGLu3yTcdKQ-XqylHfI4nkUoq0AsBSmCIc1z6siGwT6eJlTdEXYfmQqcM4CPzBHfKoLxV2MXh5aCPQbBclhiUZTHDrC2_y09ZFFHKVVMmNc4wFzOBdlxRbADB3Tn5_TfyJVV9a-pHG9CiIXwY8BfA7iLu5d2kkabwqeMDZA9OfBM2',
                'caption_gambar' => 'Apel pelepasan pembekalan magang industri siswa SMK di lapangan utama kampus.',
                'penulis_nama' => 'Pokja Magang PKL',
                'penulis_jabatan' => 'Koordinator Praktik Lapangan',
                'penulis_avatar' => null,
                'penulis_bio' => 'Pengelola Pelaksanaan dan Pengawasan Praktik Kerja Lapangan SMK Plus Pelita Nusantara.',
                'estimasi_baca' => '2 Menit Baca',
                'is_featured' => false,
                'status' => 'PUBLISHED',
                'views_count' => 520,
                'published_at' => Carbon::parse('2025-05-15 10:00:00'),
            ],
            [
                'judul' => 'Kisah Sukses Alumni: Dari Magang PKL di Software Studio hingga Diangkat Menjadi Junior Cloud Engineer',
                'slug' => 'kisah-sukses-alumni-dimas-ramadhan-junior-cloud-engineer',
                'kategori_id' => $kategoriMap['prestasi-alumni'] ?? 4,
                'ringkasan' => 'Simak perjalanan Dimas Ramadhan (Alumni RPL \'23) membuktikan dedikasi tinggi selama masa prakerin berbuah kontrak kerja profesional tetap.',
                'konten' => "## Inspirasi Alumni: Ketekunan dan Rasa Ingin Tahu Tinggi\n\nDimas Ramadhan, lulusan jurusan Rekayasa Perangkat Lunak tahun 2023, kini telah resmi dikontrak sebagai **Junior Cloud Engineer** di salah satu software studio rekanan industri di Jakarta Selatan.\n\n### Kunci Keberhasilan Dimas:\n- Memanfaatkan masa magang PKL untuk mempelajari arsitektur cloud server di luar jam wajib.\n- Aktif berinisiatif membantu tim senior dalam memecahkan masalah otomasi deployment CI/CD.\n- Menyelesaikan sertifikasi AWS Cloud Practitioner berkat fasilitas beasiswa yang difasilitasi oleh BKK Penus.\n\n> *\"Jangan pernah ragu bertanya dan eksplorasi hal baru saat magang. Kesempatan emas datang saat kemampuan teknis kita bertemu dengan kebutuhan mendesak di tim kerja.\"* — Dimas Ramadhan.",
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDkPp_-I6dMWpDQDJpKhyQvaRhj2nCMcjrTrSTLLPv8QxLYkSQHyJnbSO3nZSfhMaOnzeqDs1IqacW27WCBGrD7yiWy5GHhZr7vC5ATdXpRdk4EGM_0YaMI647jqM2KbsZZ2axt4ucUW8EcqbkLWRoLf321usoQGmlG5pbiSvhamXaq7UEsZu2EFCB579t7lVyh41Zs-PauvBFeSnCDcoeNn1hoY2YLuwfUCtzSMsK1IQS4XDTWuSjd',
                'caption_gambar' => 'Dimas Ramadhan, alumni RPL 2023 di depan stasiun kerja cloud engineering.',
                'penulis_nama' => 'Divisi Alumni',
                'penulis_jabatan' => 'Tracer Study Penus',
                'penulis_avatar' => null,
                'penulis_bio' => 'Tim Pengelola Jaringan Alumni dan Pendataan Tracer Study BKK Penus.',
                'estimasi_baca' => '6 Menit Baca',
                'is_featured' => false,
                'status' => 'PUBLISHED',
                'views_count' => 780,
                'published_at' => Carbon::parse('2025-05-12 11:00:00'),
            ],
            [
                'judul' => 'Tips Menjawab Pertanyaan Menjebak Saat Interview Kerja untuk Fresh Graduate SMK',
                'slug' => 'tips-menjawab-pertanyaan-menjebak-interview-kerja-smk',
                'kategori_id' => $kategoriMap['panduan-tips-karier'] ?? 3,
                'ringkasan' => 'Strategi menggunakan metode STAR (Situation, Task, Action, Result) saat ditanya kelemahan diri, gaji yang diharapkan, dan rencana studi lanjutan.',
                'konten' => "## Bedah Pertanyaan Interview yang Kerap Mengecoh\n\nWawancara kerja seringkali menjadi momok bagi lulusan baru vokasi. Padahal, panelis HRD hanya ingin menguji integritas, kejujuran, dan kesiapan mental kandidat.\n\n### 3 Pertanyaan Paling Lazim & Panduan Menjawabnya:\n1. **\"Apa kelemahan terbesar Anda?\"**\n   *Hindari*: Mengatakan 'tidak punya kelemahan' atau 'terlalu perfeksionis'.\n   *Solusi*: Sebutkan area yang sedang Anda kembangkan beserta langkah nyata yang sudah diambil (contoh: *\"Dulu saya gugup presentasi di depan umum, namun selama PKL saya aktif mengambil peran sebagai presenter hasil uji fungsional mingguan\"*).\n2. **\"Berapa ekspektasi gaji Anda?\"**\n   *Solusi*: Lakukan riset standar UMR/UMK wilayah kerja dan sampaikan kisaran nominal logis sesuai kualifikasi teknis yang Anda miliki.\n3. **\"Apakah berencana melanjutkan kuliah?\"**\n   *Solusi*: Tunjukkan komitmen bekerja penuh sambil menjelaskan keterbukaan kuliah kelas karyawan di akhir pekan tanpa mengganggu jam kerja industri.",
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBxEkNx4fgUB6x2z7PMfHpsPLuVBy3ss3HuIdM-NwMj27DJWvXSkfEb-K9OwT7IiRaQQjc2tDW0UT5GSOO4eG9p7V2YAw9nFLVuU9uh4cAdTRolFFKyBnwRD2fi5XCNlnB7r6GHLyfVhV6V4o5xIW214A1EXGdJz39Fp-O5_WZ0CfqKzuTICjbymmgK5Qlo5qhAHoLdkVvNA8si0l9VaTw9LSMfrYNnewcg2nMkhRtMz-sUh8Kx8CN0',
                'caption_gambar' => 'Simulasi sesi wawancara kerja profesional antara siswa dan panelis HRD.',
                'penulis_nama' => 'Bimbingan Karier',
                'penulis_jabatan' => 'Konselor Vokasi',
                'penulis_avatar' => null,
                'penulis_bio' => 'Layanan Bimbingan Konseling dan Konsultasi Karier Siswa SMK Plus Pelita Nusantara.',
                'estimasi_baca' => '4 Menit Baca',
                'is_featured' => false,
                'status' => 'PUBLISHED',
                'views_count' => 610,
                'published_at' => Carbon::parse('2025-05-08 08:30:00'),
            ],
            [
                'judul' => 'Sosialisasi Program Pemagangan Industri ke Jepang: Peluang Karier Global bagi Siswa Penus',
                'slug' => 'sosialisasi-program-pemagangan-industri-ke-jepang',
                'kategori_id' => $kategoriMap['peluang-global'] ?? 6,
                'ringkasan' => 'Kolaborasi strategis LPK Resmi Sending Organization dengan BKK Penus untuk kuota pelatihan bahasa N4 dan magang teknisi manufaktur presisi.',
                'konten' => "## Buka Akses Karier Internasional Menuju Negeri Sakura\n\nBKK SMK Plus Pelita Nusantara menjalin kemitraan strategis dengan *Sending Organization (SO)* resmi terakreditasi untuk program pemagangan luar negeri ke Jepang (*Ginou Jisshusei* dan *Tokutei Ginou*).\n\n### Fasilitas & Tahapan Program:\n- Pelatihan intensif bahasa Jepang di kampus hingga mencapai tingkat kemampuan minimal JLPT N4.\n- Pembekalan budaya kerja kedisiplinan dan standar keselamatan 5S industri Jepang.\n- Uang saku kompetitif, akomodasi tempat tinggal, dan asuransi kesehatan penuh selama kontrak 3-5 tahun di Jepang.\n\nSiswa yang berminat dapat mendaftarkan diri melalui meja sekretariat BKK mulai pekan depan.",
                'gambar_sampul' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC0I8ALJRMLmAlhbAMxhmsMx8uE7F1pzd1WFnb0ZxH683ywhCcsHDXbBrXn5ibo2An4rWYNO_zBYwXFK27-rNyU-vdnztbnNEbl1VesWlzFWtXC0pflKEvdDT8zsxWJ6jJ2BmAlyah_vBcscfwtjFEEScLcRfM7YoqZ-6XJOrUS4bcAiAxd_OH9Y4326s0okMv0Zk6lNHFx32uOLvo4fBJ9KDYbpRfSyGo0J4A--ikyonV9esaMLur9',
                'caption_gambar' => 'Presentasi informasi magang teknis ke luar negeri di hadapan siswa dan wali murid.',
                'penulis_nama' => 'Kerja Sama Global',
                'penulis_jabatan' => 'Divisi Hubungan Internasional',
                'penulis_avatar' => null,
                'penulis_bio' => 'Divisi Penyaluran Tenaga Kerja dan Magang Internasional BKK Pelita Nusantara.',
                'estimasi_baca' => '5 Menit Baca',
                'is_featured' => false,
                'status' => 'PUBLISHED',
                'views_count' => 930,
                'published_at' => Carbon::parse('2025-05-04 14:00:00'),
            ],
        ];

        foreach ($articles as $art) {
            Berita::updateOrCreate(
                ['slug' => $art['slug']],
                $art
            );
        }
    }
}
