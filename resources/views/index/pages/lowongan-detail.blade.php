@extends('index.master')

@section('title', 'Detail Lowongan - BKK SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<!-- Top Breadcrumb & Status Navigation Bar -->
<section class="w-full bg-surface-container-low px-6 lg:px-12 py-4">
<div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
<nav aria-label="Breadcrumb" class="flex items-center gap-2">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" data-path="beranda" href="#">Beranda</a>
<span class="material-symbols-outlined text-outline text-[16px]">chevron_right</span>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" data-path="lowongan-pkl-&amp;-kerja" href="#">Lowongan PKL &amp; Kerja</a>
<span class="material-symbols-outlined text-outline text-[16px]">chevron_right</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate max-w-[240px] sm:max-w-md">Junior Frontend Developer &amp; IT Support</span>
</nav>
<div class="flex items-center gap-2">
<span class="inline-flex items-center px-3 py-1 rounded-full bg-surface-container-highest font-label-dense text-label-dense text-on-surface font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary-container mr-2 animate-pulse"></span>
          Periode Ganjil 2024/2025
        </span>
<span class="inline-flex items-center px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed-variant font-label-dense text-label-dense font-semibold">
          ID: PENUS-PKL-882
        </span>
</div>
</div>
</section>
<!-- Hero Header Posisi -->
<section class="w-full bg-surface-container-lowest shadow-sm px-6 lg:px-12 py-10">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
<div class="flex items-start sm:items-center gap-6">
<!-- Logo Perusahaan Mitra -->
<div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-surface-container-high p-3 flex items-center justify-center shrink-0 shadow-sm relative overflow-hidden">
<img class="w-full h-full object-contain rounded-xl" data-alt="Modern tech corporation badge logo PT Pelita Teknologi Digital with clean red and charcoal geometric mark on pure white background, sharp vector emblem corporate style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCp4c0LCTh1P6jXa5IO3GLJLFXEjdOhYxMXbGAdh7n6IuqfZL_WHHbbVutQuEpxF40ONEznouk2pe91hEiAUrZ25XZ2ut4AjaG03lU6Vb_kJWQNeFcXG1cfZpt6nyVSB_Zb-kTqsve7-aS7VyGFr4Jjc4zA34OQj5GvOvDWxp4qpS2znqoaDP-y7yvLZabv7qe4P0v5Voyu0RqBC2uB1MOb2OI7-8kcudYM_pjZaibg91zgkyX-fJNy"/>
<div class="absolute -bottom-1 -right-1 bg-surface-container-lowest p-1 rounded-full shadow-sm">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
</div>
<div class="flex flex-col gap-2 min-w-0">
<div class="flex flex-wrap items-center gap-2">
<span class="inline-flex items-center px-3 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-dense text-label-dense">
<span class="material-symbols-outlined text-[16px] mr-1 text-primary">domain</span>PT Pelita Teknologi Digital
            </span>
<span class="inline-flex items-center px-3 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-dense text-label-dense font-semibold">
<span class="material-symbols-outlined text-[15px] mr-1" style="font-variation-settings: 'FILL' 1;">shield</span>Terverifikasi BKK Penus
            </span>
<span class="inline-flex items-center px-3 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-semibold">
              MoU DUDI 2024-2027
            </span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            Junior Frontend Developer &amp; IT Support
          </h1>
<div class="flex flex-wrap items-center gap-y-2 gap-x-5 font-body-dense text-body-dense text-on-surface-variant pt-1">
<span class="inline-flex items-center gap-1.5 font-label-md text-label-md text-primary font-semibold">
<span class="material-symbols-outlined text-[18px]">school</span>
              PKL Siswa SMK — RPL / TKJ
            </span>
<span class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-tertiary">location_on</span>
              Cilandak, Jakarta Selatan (Hybrid 3 Hari Kantor)
            </span>
<span class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-secondary">payments</span>
              Uang Saku &amp; Transportasi Bulanan
            </span>
<span class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">calendar_today</span>
              6 Bulan (Jan – Jun 2025)
            </span>
</div>
</div>
</div>
<!-- Quick Action / Share -->
<div class="flex items-center gap-3 shrink-0 self-stretch md:self-auto justify-end">
<button class="w-11 h-11 rounded-full bg-surface-container flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors shadow-sm" onclick="navigator.clipboard?.writeText(window.location.href); this.querySelector('span').textContent='check'; setTimeout(()=&gt;this.querySelector('span').textContent='share', 2000)" title="Bagikan Lowongan" type="button">
<span class="material-symbols-outlined text-[20px]">share</span>
</button>
<button class="w-11 h-11 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-colors shadow-sm" onclick="this.classList.toggle('text-primary');" title="Simpan ke Bookmark Siswa" type="button">
<span class="material-symbols-outlined text-[20px]">bookmark</span>
</button>
</div>
</div>
</section>
<!-- Main Content Grid -->
<div class="max-w-7xl mx-auto px-6 lg:px-12 py-12 w-full">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
<!-- KOLOM KIRI (Detail Lengkap) -->
<div class="lg:col-span-8 flex flex-col gap-10">
<!-- Banner Visual Suasana Kerja DUDI -->
<div class="relative rounded-lg overflow-hidden shadow-sm bg-surface-container">
<img class="w-full h-72 object-cover" data-alt="Modern open-plan IT workspace with dual monitors displaying web code, young Indonesian vocational apprentices working alongside senior developers with laptops, natural ambient lighting and sleek ergonomic office aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB845iH7IeHgLiMAqgTL6lALtEGLtrQbloghtz98eopgWP2dfM0ukbejdhTskCwMyJUw_kmFAA-TNDNSI6Mqu6O6Q7nOSSgYhhLmp1L21O1k0wNDCXkl18nVVec-BtePSYQc-f5L_vYCvMWQV2orzd67xBinWpF4pSUzPcc-6GY20JV10G9xuCDhyHcNyWaEGhvquOb5OeN7bTcFfsJD-HxIp426h4MNkMmgIIZKimaZjxgbTA6fhuH"/>
<div class="absolute inset-0 bg-gradient-to-t from-on-background/80 via-on-background/20 to-transparent flex items-end p-6">
<div class="flex items-center gap-4 text-on-tertiary">
<div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center font-metric-stat text-metric-stat text-on-primary shadow">
                6x
              </div>
<div class="flex flex-col">
<span class="font-title-md text-title-md font-semibold text-white">Lingkungan Magang Industri Berstandar Nasional</span>
<span class="font-body-dense text-body-dense text-surface-variant">Kerja praktek nyata dengan bimbingan langsung arsitek web &amp; infrastruktur cloud.</span>
</div>
</div>
</div>
</div>
<!-- Ringkasan Peran & Profil Perusahaan -->
<section class="bg-surface-container-lowest rounded-lg p-8 shadow-sm flex flex-col gap-6">
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-3 h-8 bg-primary rounded-full"></div>
<h2 class="font-headline-md text-headline-md text-on-surface">Ringkasan Peran &amp; Profil Perusahaan</h2>
</div>
<span class="font-label-dense text-label-dense uppercase tracking-wider text-outline">DUDI Partner Info</span>
</div>
<p class="font-body-editorial text-body-editorial text-on-surface-variant leading-relaxed">
<strong class="text-on-surface font-semibold">PT Pelita Teknologi Digital</strong> adalah software house dan penyedia managed IT services terkemuka di Jabodetabek yang telah menjalin MoU resmi dengan SMK Plus Pelita Nusantara. Perusahaan ini berfokus pada perancangan portal web korporasi, sistem Enterprise Resource Planning (ERP), dan optimalisasi jaringan data perkantoran.
          </p>
<p class="font-body-default text-body-default text-on-surface-variant">
            Program PKL Magang Industri 6 Bulan ini dirancang khusus bagi siswa SMK jurusan <strong class="text-on-surface">Rekayasa Perangkat Lunak (RPL)</strong> dan <strong class="text-on-surface">Teknik Komputer &amp; Jaringan (TKJ)</strong> untuk mengasah keterampilan coding modular, kolaborasi Git di lingkungan Gitlab industri, serta pemecahan masalah operasional IT hardware dan mikrotik secara nyata di lapangan.
          </p>
<!-- Key Highlights Bento Mini -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
<div class="bg-surface-container-low rounded-DEFAULT p-4 flex flex-col gap-1">
<span class="font-label-dense text-label-dense text-on-surface-variant">Model Penugasan</span>
<span class="font-title-md text-title-md text-on-surface">Hybrid Working</span>
<span class="font-body-dense text-body-dense text-tertiary">3 Hari WFO / 2 Hari WFH</span>
</div>
<div class="bg-surface-container-low rounded-DEFAULT p-4 flex flex-col gap-1">
<span class="font-label-dense text-label-dense text-on-surface-variant">Jam Praktik</span>
<span class="font-title-md text-title-md text-on-surface">08.30 – 16.30 WIB</span>
<span class="font-body-dense text-body-dense text-tertiary">Senin s/d Jumat</span>
</div>
<div class="bg-surface-container-low rounded-DEFAULT p-4 flex flex-col gap-1">
<span class="font-label-dense text-label-dense text-on-surface-variant">Mentor Industri</span>
<span class="font-title-md text-title-md text-on-surface">1-on-1 Assigned</span>
<span class="font-body-dense text-body-dense text-tertiary">Senior Tech Lead Bersertifikat</span>
</div>
</div>
</section>
<!-- Tanggung Jawab Utama -->
<section class="bg-surface-container-lowest rounded-lg p-8 shadow-sm flex flex-col gap-6">
<div class="flex items-center gap-3">
<div class="w-3 h-8 bg-secondary rounded-full"></div>
<h2 class="font-headline-md text-headline-md text-on-surface">Tanggung Jawab Utama Selama PKL</h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant">
            Peserta didik akan didampingi oleh instruktur profesional dalam mengeksekusi tugas-tugas terstruktur yang sejalan dengan capaian kurikulum merdeka vokasi:
          </p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="p-5 rounded-DEFAULT bg-surface-container-low flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-[22px]">code</span>
</div>
<div class="flex flex-col gap-1">
<h3 class="font-title-md text-title-md text-on-surface">Slicing UI &amp; Component Builder</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Menerjemahkan desain Figma dari tim UI/UX menjadi komponen web interaktif menggunakan Tailwind CSS dan modern JavaScript framework.</p>
</div>
</div>
<div class="p-5 rounded-DEFAULT bg-surface-container-low flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary text-[22px]">bug_report</span>
</div>
<div class="flex flex-col gap-1">
<h3 class="font-title-md text-title-md text-on-surface">Bug Fixing &amp; Cross-Browser Test</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Membantu proses pengujian tampilan pada berbagai perangkat (mobile, tablet, desktop) dan membersihkan console error.</p>
</div>
</div>
<div class="p-5 rounded-DEFAULT bg-surface-container-low flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-surface text-[22px]">router</span>
</div>
<div class="flex flex-col gap-1">
<h3 class="font-title-md text-title-md text-on-surface">Support Jaringan &amp; Hardware Kantor</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Membantu konfigurasi access point internal, crimping kabel LAN, dan monitoring uptime koneksi kantor cabang.</p>
</div>
</div>
<div class="p-5 rounded-DEFAULT bg-surface-container-low flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-tertiary text-[22px]">menu_book</span>
</div>
<div class="flex flex-col gap-1">
<h3 class="font-title-md text-title-md text-on-surface">Dokumentasi Teknis &amp; Jurnal PKL</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Menyusun logbook aktivitas harian BKK serta membuat panduan instalasi modul aplikasi internal untuk kebutuhan tim developer.</p>
</div>
</div>
</div>
</section>
<!-- Kualifikasi & Persyaratan -->
<section class="bg-surface-container-lowest rounded-lg p-8 shadow-sm flex flex-col gap-6">
<div class="flex items-center gap-3">
<div class="w-3 h-8 bg-tertiary rounded-full"></div>
<h2 class="font-headline-md text-headline-md text-on-surface">Kualifikasi &amp; Persyaratan Siswa</h2>
</div>
<div class="flex flex-col gap-4">
<div class="flex items-start gap-3.5">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">check_circle</span>
<p class="font-body-default text-body-default text-on-surface">
<strong>Status Siswa Aktif:</strong> Siswa SMK Plus Pelita Nusantara kelas XI atau XII tahun ajaran berjalan dari program keahlian <strong>Rekayasa Perangkat Lunak (RPL)</strong> atau <strong>Teknik Komputer &amp; Jaringan (TKJ)</strong>.
              </p>
</div>
<div class="flex items-start gap-3.5">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">check_circle</span>
<p class="font-body-default text-body-default text-on-surface">
<strong>Fondasi Teknis:</strong> Memahami dasar logika pemrograman web (HTML5, CSS3, JavaScript ES6) ATAU pemahaman dasar konfigurasi IP Address, DNS, dan subnetting.
              </p>
</div>
<div class="flex items-start gap-3.5">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">check_circle</span>
<p class="font-body-default text-body-default text-on-surface">
<strong>Portofolio Proyek:</strong> Memiliki minimal 1 karya tugas sekolah atau proyek mandiri (link GitHub, mockup Figma, screenshot tugas praktikum, atau link website online).
              </p>
</div>
<div class="flex items-start gap-3.5">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">check_circle</span>
<p class="font-body-default text-body-default text-on-surface">
<strong>Rekomendasi Sekolah:</strong> Memperoleh persetujuan dan verifikasi rekomendasi dari Wali Kelas dan Kepala Program Keahlian (Kaprogli).
              </p>
</div>
<div class="flex items-start gap-3.5">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">check_circle</span>
<p class="font-body-default text-body-default text-on-surface">
<strong>Sikap Kerja:</strong> Disiplin kehadiran, berintegritas tinggi, bersemangat untuk belajar hal baru, dan sanggup mematuhi SOP kerahasiaan data perusahaan.
              </p>
</div>
</div>
<!-- Alert Dokumen Wajib -->
<div class="mt-2 p-4 rounded-DEFAULT bg-surface-container flex items-start gap-3.5">
<span class="material-symbols-outlined text-secondary-container text-[24px] shrink-0">info</span>
<div class="flex flex-col gap-1">
<span class="font-label-md text-label-md font-semibold text-on-surface">Dokumen yang disiapkan saat dinyatakan lolos berkas:</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">1. Surat Izin Orang Tua bertandatangan basah, 2. Transkrip Nilai Rapor Semester Terakhir, 3. Surat Pengantar Resmi BKK Penus.</span>
</div>
</div>
</section>
<!-- Keuntungan / Benefits -->
<section class="bg-surface-container-lowest rounded-lg p-8 shadow-sm flex flex-col gap-6">
<div class="flex items-center gap-3">
<div class="w-3 h-8 bg-primary-container rounded-full"></div>
<h2 class="font-headline-md text-headline-md text-on-surface">Keuntungan &amp; Fasilitas Peserta PKL</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[24px] shrink-0">workspace_premium</span>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Sertifikat Industri Resmi SKKNI</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Sertifikasi kompetensi resmi berstandar nasional yang diakui asosiasi DUDI.</span>
</div>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[24px] shrink-0">wallet</span>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Uang Saku &amp; Uang Makan Bulanan</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Subsidi operasional berkala yang ditransfer langsung ke rekening siswa.</span>
</div>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[24px] shrink-0">supervisor_account</span>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Mentorship 1-on-1 Intensif</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Review kode mingguan langsung dari Software Engineer berpengalaman.</span>
</div>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-tertiary text-[24px] shrink-0">badge</span>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface">Golden Ticket Rekrutmen Pasca Lulus</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Peluang kontrak langsung sebagai Junior Staff tanpa tes ulang saat lulus SMK.</span>
</div>
</div>
</div>
</section>
<!-- Alur Seleksi Step-by-Step -->
<section class="bg-surface-container-lowest rounded-lg p-8 shadow-sm flex flex-col gap-6">
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-3 h-8 bg-on-surface rounded-full"></div>
<h2 class="font-headline-md text-headline-md text-on-surface">Alur Tahapan Seleksi Masuk</h2>
</div>
<span class="font-label-dense text-label-dense text-primary font-semibold">Total Waktu: ~14 Hari Kerja</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 relative">
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex flex-col gap-2 relative">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary font-label-dense text-label-dense flex items-center justify-center font-bold">
                01
              </div>
<span class="font-title-md text-title-md text-on-surface">Seleksi Berkas CV BKK</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Kurasi profil siswa, portofolio, dan validasi data absensi sekolah.</span>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex flex-col gap-2 relative">
<div class="w-8 h-8 rounded-full bg-secondary text-on-secondary font-label-dense text-label-dense flex items-center justify-center font-bold">
                02
              </div>
<span class="font-title-md text-title-md text-on-surface">Tes Praktik Sekolah</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Live coding / konfigurasi lab di Lab Komputer SMK Penus.</span>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex flex-col gap-2 relative">
<div class="w-8 h-8 rounded-full bg-tertiary text-on-tertiary font-label-dense text-label-dense flex items-center justify-center font-bold">
                03
              </div>
<span class="font-title-md text-title-md text-on-surface">Wawancara DUDI</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Sesi tatap muka online / offline dengan tim HRD &amp; Tech Lead mitra.</span>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex flex-col gap-2 relative">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary font-label-dense text-label-dense flex items-center justify-center font-bold">
                04
              </div>
<span class="font-title-md text-title-md text-on-surface">Surat Tugas PKL</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Penerbitan Surat Tugas resmi sekolah dan pembekalan pra-keberangkatan.</span>
</div>
</div>
</section>
</div>
<!-- KOLOM KANAN (Sticky Summary Card & Form Lamaran) -->
<div class="lg:col-span-4 flex flex-col gap-8 lg:sticky lg:top-24">
<!-- Card Lamaran Utama -->
<div class="bg-surface-container-lowest rounded-lg p-6 sm:p-7 shadow-md flex flex-col gap-6 relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-primary-container via-secondary-container to-primary"></div>
<div class="flex flex-col gap-1">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-outline font-semibold">Status Pendaftaran PKL</span>
<div class="flex items-center justify-between">
<span class="font-headline-sm text-headline-sm text-on-surface">Terbuka Untuk Siswa</span>
<span class="inline-flex items-center px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-bold">
                Sisa 2 Kursi
              </span>
</div>
</div>
<!-- Progress Ring & Kuota Mini Bar -->
<div class="p-4 rounded-DEFAULT bg-surface-container-low flex flex-col gap-3">
<div class="flex items-center justify-between font-label-dense text-label-dense">
<span class="text-on-surface-variant">Kapasitas Diterima DUDI</span>
<span class="font-bold text-on-surface">2 dari 4 Siswa Terisi</span>
</div>
<div class="w-full h-2.5 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary-container rounded-full transition-all duration-500" style="width: 50%;"></div>
</div>
<div class="flex items-center justify-between font-body-dense text-body-dense text-on-surface-variant">
<span>Batas Akhir:</span>
<span class="font-semibold text-primary">15 November 2024</span>
</div>
</div>
<!-- Snapshot Ringkas Form Data -->
<div class="flex flex-col gap-3 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center justify-between py-1.5 bg-surface-container/50 px-3 rounded-DEFAULT">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
                Durasi Magang
              </span>
<span class="font-semibold text-on-surface">6 Bulan Penuh</span>
</div>
<div class="flex items-center justify-between py-1.5 bg-surface-container/50 px-3 rounded-DEFAULT">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-tertiary">badge</span>
                Status Siswa
              </span>
<span class="font-semibold text-on-surface">Kelas XI &amp; XII</span>
</div>
<div class="flex items-center justify-between py-1.5 bg-surface-container/50 px-3 rounded-DEFAULT">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-tertiary">assignment_turned_in</span>
                Metode Seleksi
              </span>
<span class="font-semibold text-on-surface">Online via BKK Penus</span>
</div>
</div>
<!-- Modal Trigger / Tombol Lamar -->
<div class="flex flex-col gap-3">
<button class="w-full py-4 rounded-full bg-primary-container text-on-primary-container font-headline-sm text-headline-sm font-semibold hover:bg-primary shadow-md transition-all flex items-center justify-center gap-2" id="btn-lamar" onclick="document.getElementById('modal-lamar').classList.remove('hidden');" type="button">
<span class="material-symbols-outlined text-[22px]">send</span>
              Lamar Posisi Ini Sekarang
            </button>
<p class="font-body-dense text-body-dense text-center text-on-surface-variant">
              Sistem BKK otomatis menyertakan <strong>CV Digital &amp; Nilai Rapor</strong> akun Anda.
            </p>
</div>
<!-- Action Shortcuts -->
<div class="flex flex-col gap-2 pt-2">
<button class="w-full py-2.5 px-4 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-semibold transition-colors flex items-center justify-center gap-2" onclick="alert('Membuka pratinjau CV BKK Siswa...');" type="button">
<span class="material-symbols-outlined text-[18px] text-primary">visibility</span>
              Preview CV Kamu Sebelum Melamar
            </button>
<a class="w-full py-2.5 px-4 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-medium transition-colors flex items-center justify-center gap-2 text-center" download="" href="#">
<span class="material-symbols-outlined text-[18px] text-secondary">download</span>
              Unduh Format Surat Izin Orang Tua (PDF)
            </a>
</div>
<!-- PIC Rekruter / Koordinator BKK -->
<div class="pt-4 flex items-center gap-3 bg-surface-container-low p-4 rounded-DEFAULT">
<img class="w-11 h-11 rounded-full object-cover shrink-0" data-alt="Professional Indonesian female teacher and vocational career counselor headshot portrait wearing polite formal uniform with friendly welcoming expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcjjCBfAezmA703GB7G6UMBzuTjpfz2ckJ44u9CcsP6baMLGVwRx8vGC0RlPMUPrFYztJDQ1OAJqD4Zts3LbD7JG-jsCB-qHxzg-YsFXmG4n4K_q2bpW-BnSxVLYyGYo3XdNiQt1HUonOpFHuenH0yj8LZ6bTrb89twO8-l36FOgs024UjJwi_ohbax_lPfxaz8xbHA7iFtj9oc8fssEUuCpX-Rso6SViRGMWJNHqej4fvE5OWmVMS"/>
<div class="flex flex-col min-w-0">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase">Koordinator Hubin &amp; BKK</span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Ibu Sri Rahayu, M.Pd.</span>
<span class="font-body-dense text-body-dense text-tertiary">Konsultasi via Ruang BKK Gd. A Lt. 2</span>
</div>
</div>
</div>
<!-- Mini Banner Bantuan Siswa -->
<div class="p-6 rounded-lg bg-secondary-fixed text-on-secondary-fixed flex items-start gap-4">
<span class="material-symbols-outlined text-[28px] shrink-0 text-secondary">help_center</span>
<div class="flex flex-col gap-1">
<span class="font-title-md text-title-md font-semibold">Butuh Panduan Portfolio?</span>
<p class="font-body-dense text-body-dense text-on-secondary-fixed-variant">
              Ikuti klinik bimbingan CV &amp; simulasi wawancara setiap hari Rabu sepulang sekolah di Lab Multimedia BKK Penus.
            </p>
</div>
</div>
</div>
</div>
<!-- Rekomendasi Lowongan PKL Serupa -->
<section class="mt-20 pt-10 flex flex-col gap-8">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
<div class="flex flex-col gap-1">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Peluang Karir Alternatif</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Rekomendasi Lowongan PKL &amp; Kerja Terkait</h2>
</div>
<a class="inline-flex items-center gap-1.5 font-label-md text-label-md text-primary font-semibold hover:text-on-surface transition-colors" data-path="lowongan-pkl-&amp;-kerja" href="#">
          Lihat Semua 34 Lowongan Aktif
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Lowongan Serupa 1 -->
<div class="p-6 rounded-lg bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between gap-6">
<div class="flex items-start gap-4">
<div class="w-14 h-14 rounded-DEFAULT bg-surface-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-[28px]">network_node</span>
</div>
<div class="flex flex-col gap-1 min-w-0">
<div class="flex flex-wrap items-center gap-2">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-surface-container-highest text-on-surface font-label-dense text-label-dense font-semibold">
                  PKL 6 Bulan
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense">
                  Jurusan TKJ
                </span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface hover:text-primary transition-colors cursor-pointer truncate">
                Network &amp; Cloud Infrastructure Intern
              </h3>
<span class="font-label-md text-label-md text-on-surface-variant">PT Data Prima Integrasi • Sentul, Bogor</span>
</div>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
            Membantu teknisi lapangan mengonfigurasi perangkat MikroTik, switch manageable, kabel fiber optic, dan pemantauan server Zabbix.
          </p>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-outline">Batas: 20 Nov 2024</span>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:underline" href="#">
              Detail Lowongan
              <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Lowongan Serupa 2 -->
<div class="p-6 rounded-lg bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between gap-6">
<div class="flex items-start gap-4">
<div class="w-14 h-14 rounded-DEFAULT bg-surface-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary text-[28px]">design_services</span>
</div>
<div class="flex flex-col gap-1 min-w-0">
<div class="flex flex-wrap items-center gap-2">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-surface-container-highest text-on-surface font-label-dense text-label-dense font-semibold">
                  PKL 6 Bulan
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense">
                  Jurusan RPL / DKV
                </span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface hover:text-primary transition-colors cursor-pointer truncate">
                Junior UI/UX &amp; Web Content Designer
              </h3>
<span class="font-label-md text-label-md text-on-surface-variant">Kreatif Nusa Media • Cibinong, Kab. Bogor</span>
</div>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
            Praktek merancang mockup mobile application menggunakan Figma, membuat aset icon, serta menyusun layout landing page promosi sekolah.
          </p>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-outline">Batas: 18 Nov 2024</span>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:underline" href="#">
              Detail Lowongan
              <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</section>
</div>
<!-- Interactive Submission Scrim Modal -->
<div class="fixed inset-0 z-50 hidden bg-on-background/70 backdrop-blur-sm flex items-center justify-center p-4" id="modal-lamar">
<div class="w-full max-w-lg bg-surface-container-lowest rounded-lg p-6 sm:p-8 shadow-xl flex flex-col gap-6 relative">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-[24px]">send</span>
<span class="font-title-md text-title-md text-on-surface">Konfirmasi Pengajuan PKL</span>
</div>
<button class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors" onclick="document.getElementById('modal-lamar').classList.add('hidden');" type="button">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
<div class="flex flex-col gap-3 font-body-default text-body-default text-on-surface-variant">
<p>Anda akan mendaftar pada posisi:</p>
<div class="p-3 bg-surface-container-low rounded-DEFAULT flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">Junior Frontend Developer &amp; IT Support</span>
<span class="font-label-md text-label-md text-tertiary">PT Pelita Teknologi Digital</span>
</div>
<div class="flex flex-col gap-2 pt-2">
<label class="font-label-dense text-label-dense uppercase tracking-wider text-on-surface">Tautan Portofolio / GitHub Siswa</label>
<input class="w-full px-4 py-2.5 rounded-DEFAULT bg-surface-container-lowest text-on-surface text-body-dense shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="https://github.com/username/project-anda" type="url"/>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-dense text-label-dense uppercase tracking-wider text-on-surface">Catatan Tambahan untuk Kaprogli &amp; DUDI (Opsional)</label>
<textarea class="w-full px-4 py-2.5 rounded-DEFAULT bg-surface-container-lowest text-on-surface text-body-dense shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Sebutkan proyek sekolah terbaik yang pernah Anda buat..." rows="3"></textarea>
</div>
<div class="flex items-start gap-2 pt-1">
<input class="mt-1 rounded text-primary" id="check-pernyataan" type="checkbox"/>
<label class="font-body-dense text-body-dense text-on-surface-variant leading-snug" for="check-pernyataan">
            Saya menyatakan data di profil siswa BKK benar dan bersedia mengikuti seluruh tata tertib PKL SMK Plus Pelita Nusantara.
          </label>
</div>
</div>
<div class="flex items-center justify-end gap-3 pt-2">
<button class="px-5 py-2.5 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-semibold transition-colors" onclick="document.getElementById('modal-lamar').classList.add('hidden');" type="button">
          Batal
        </button>
<button class="px-6 py-2.5 rounded-full bg-primary-container text-on-primary-container hover:bg-primary font-label-md text-label-md font-semibold shadow transition-colors" onclick="this.textContent='Mengirim Berkas...'; setTimeout(()=&gt;{ alert('Selamat! Pengajuan PKL berhasil dikirim ke BKK SMK Penus.'); document.getElementById('modal-lamar').classList.add('hidden'); }, 1200);" type="button">
          Kirim Lamaran Sekarang
        </button>
</div>
</div>
</div>
</div>
@endsection