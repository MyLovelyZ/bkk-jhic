@extends('index.master')

@section('title', 'Lowongan PKL & Kerja - BKK SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<!-- Top Highlight Section: Interactive Control Panel & Search Matrix -->
<section class="w-full bg-surface-container-low px-6 lg:px-12 py-10">
<div class="max-w-7xl mx-auto flex flex-col gap-8">
<!-- Breadcrumb & Direct Title -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 font-label-dense text-label-dense text-on-surface-variant">
<span>BKK Penus</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span>Bursa Karir Siswa &amp; Alumni</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-semibold">Lowongan Tersedia</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Eksplorasi Peluang PKL &amp; Karier Industri</h1>
<p class="font-body-default text-body-default text-on-surface-variant max-w-2xl">
            Akses langsung rekrutmen terverifikasi dari mitra IDUKA resmi SMK Plus Pelita Nusantara. Prioritas seleksi untuk siswa aktif dan alumni berprestasi.
          </p>
</div>
<div class="flex items-center gap-3">
<div class="flex items-center gap-2 bg-surface-container px-4 py-2 rounded-full shadow-sm">
<span class="w-2.5 h-2.5 rounded-full bg-primary-container animate-pulse"></span>
<span class="font-label-dense text-label-dense text-on-surface font-semibold">58 Lowongan Terverifikasi</span>
</div>
<a class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-surface-container hover:bg-surface-variant transition-colors font-label-md text-label-md text-on-surface" data-path="panduan-cv" href="#">
<span class="material-symbols-outlined text-[18px] text-secondary">assignment_turned_in</span>
<span>Standar CV Penus</span>
</a>
</div>
</div>
<!-- Main Search & Filter Console -->
<div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm flex flex-col gap-5">
<!-- Search bar with integrated filters -->
<div class="flex flex-col lg:flex-row items-center gap-3">
<div class="relative w-full flex-1">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-[22px]">search</span>
<input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low rounded-DEFAULT text-on-surface font-body-default placeholder:text-on-surface-variant/70 focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="job-search-input" placeholder="Cari posisi, skill (Laravel, Mikrotik, SAP), atau nama mitra industri..." type="text"/>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-3 w-full lg:w-auto shrink-0">
<!-- Dropdown Jurusan -->
<div class="relative">
<select class="w-full appearance-none pl-4 pr-10 py-3.5 bg-surface-container-low text-on-surface font-label-md text-label-md rounded-DEFAULT focus:outline-none focus:ring-2 focus:ring-primary-container cursor-pointer transition-all" id="filter-jurusan">
<option value="all">Semua Jurusan</option>
<option value="rpl">RPL (Perangkat Lunak)</option>
<option value="tkj">TKJ (Jaringan &amp; Komputer)</option>
<option value="otkp">OTKP (Perkantoran)</option>
<option value="akl">AKL (Akuntansi &amp; Keuangan)</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[18px]">expand_more</span>
</div>
<!-- Dropdown Lokasi -->
<div class="relative">
<select class="w-full appearance-none pl-4 pr-10 py-3.5 bg-surface-container-low text-on-surface font-label-md text-label-md rounded-DEFAULT focus:outline-none focus:ring-2 focus:ring-primary-container cursor-pointer transition-all" id="filter-lokasi">
<option value="all">Semua Lokasi</option>
<option value="bogor">Bogor / Cibinong</option>
<option value="jakarta">DKI Jakarta</option>
<option value="depok">Depok / Bekasi</option>
<option value="karawang">Kawasan Industri Karawang</option>
<option value="hybrid">Remote / Hybrid</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[18px]">place</span>
</div>
<!-- Dropdown Urutkan -->
<div class="relative col-span-2 sm:col-span-1">
<select class="w-full appearance-none pl-4 pr-10 py-3.5 bg-surface-container-low text-on-surface font-label-md text-label-md rounded-DEFAULT focus:outline-none focus:ring-2 focus:ring-primary-container cursor-pointer transition-all" id="filter-sort">
<option value="newest">Terbaru Ditambahkan</option>
<option value="deadline">Segera Ditutup (Urgent)</option>
<option value="quota">Sisa Kuota Terbanyak</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[18px]">swap_vert</span>
</div>
</div>
</div>
<!-- Pill Quick Filters -->
<div class="flex flex-wrap items-center justify-between gap-3 pt-2">
<div class="flex flex-wrap items-center gap-2">
<button class="filter-pill active px-4 py-2 rounded-full font-label-md text-label-md bg-primary-container text-on-primary-container font-semibold transition-all">
              Semua Lowongan (58)
            </button>
<button class="filter-pill px-4 py-2 rounded-full font-label-md text-label-md bg-surface-container text-on-surface hover:bg-surface-variant transition-all">
              Khusus PKL Siswa (24)
            </button>
<button class="filter-pill px-4 py-2 rounded-full font-label-md text-label-md bg-surface-container text-on-surface hover:bg-surface-variant transition-all">
              Full-Time Alumni (28)
            </button>
<button class="filter-pill px-4 py-2 rounded-full font-label-md text-label-md bg-surface-container text-on-surface hover:bg-surface-variant transition-all">
              Part-Time &amp; Magang Mandiri (6)
            </button>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span>
<span>100% IDUKA Terikat MoU Resmi</span>
</div>
</div>
</div>
</div>
</section>
<!-- Banner Info PKL Gelombang II -->
<section class="w-full px-6 lg:px-12 -mt-4">
<div class="max-w-7xl mx-auto">
<div class="bg-gradient-to-r from-secondary to-secondary-container text-on-secondary p-5 lg:p-6 rounded-DEFAULT shadow-md flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-surface-container-lowest/20 backdrop-blur flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px] text-surface-container-lowest">campaign</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm font-bold text-surface-container-lowest leading-tight">Pengumuman Penting PKL Gelombang II (Tahun Ajaran 2025/2026)</span>
<p class="font-body-default text-body-default text-surface-container-lowest/90 mt-1">
              Siswa aktif Kelas XI diwajibkan menyelesaikan data portofolio, sertifikat kompetensi, dan CV digital di akun BKK sebelum tanggal <strong>30 bulan ini</strong> untuk jadwal sinkronisasi perusahaan.
            </p>
</div>
</div>
<div class="flex items-center gap-2.5 shrink-0 self-end md:self-center">
<a class="px-5 py-2.5 rounded-full bg-surface-container-lowest text-secondary font-label-md text-label-md font-semibold hover:bg-surface transition-colors shadow-sm inline-flex items-center gap-1.5" href="#">
<span>Lengkapi Profil CV</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</section>
<!-- Main Grid Cards Section -->
<section class="w-full px-6 lg:px-12 py-12">
<div class="max-w-7xl mx-auto flex flex-col gap-8">
<!-- Grid Status Bar -->
<div class="flex items-center justify-between pb-2">
<div class="flex items-center gap-2">
<h2 class="font-title-md text-title-md text-on-surface">Daftar Rekomendasi Terkini</h2>
<span class="font-label-dense text-label-dense px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant">Menampilkan 6 dari 58</span>
</div>
<div class="hidden sm:flex items-center gap-2 font-label-dense text-label-dense text-on-surface-variant">
<span class="w-2 h-2 rounded-full bg-primary-container"></span>
<span>Diperbarui 15 menit lalu oleh Tim BKK</span>
</div>
</div>
<!-- Job Cards Bento/Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
<!-- Card 1: Junior Web & Frontend Developer (PKL) -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-4">
<!-- Header Card: Company Logo & Badges -->
<div class="flex items-start justify-between gap-3">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-container flex items-center justify-center p-2 shrink-0">
<span class="material-symbols-outlined text-[28px] text-primary">terminal</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 justify-end">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense font-semibold">
                  PKL Siswa
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container font-label-dense text-label-dense text-secondary font-medium">
<span class="material-symbols-outlined text-[13px] mr-1">verified</span>Mitra Gold
                </span>
</div>
</div>
<!-- Position & Company Name -->
<div class="flex flex-col">
<h3 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug">
                Junior Web &amp; Frontend Developer
              </h3>
<p class="font-label-md text-label-md text-on-surface-variant font-medium mt-0.5">
                PT Digital Solusindo Kreasi
              </p>
</div>
<!-- Key Info Tags -->
<div class="grid grid-cols-2 gap-2 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
<span>Jakarta / Hybrid</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span class="font-medium text-on-surface">Uang Saku Rp 1.5jt</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-tertiary">school</span>
<span>RPL (Kelas XI/XII)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span class="text-primary font-medium">12 hari lagi</span>
</div>
</div>
<!-- Qualifications Summary -->
<div class="bg-surface-container-low p-3 rounded-DEFAULT flex flex-col gap-1.5">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase tracking-wider">Kompetensi Dibutuhkan:</span>
<p class="font-body-dense text-body-dense text-on-surface line-clamp-2">
                Memahami dasar HTML, CSS, JavaScript framework (Tailwind/Vue), mampu membuat mockup responsif, dan siap magang min. 4 bulan.
              </p>
</div>
</div>
<!-- Card Footer: Quota & Action -->
<div class="mt-6 pt-4 bg-surface-container-lowest flex items-center justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Sisa Kuota BKK</span>
<span class="font-title-md text-title-md text-on-surface font-bold">3 Siswa</span>
</div>
<button class="px-4 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1.5 shadow-sm">
<span>Lamar Sekarang</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Card 2: Staff Administrasi & Dokumen Legal -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-secondary/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-3">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-container flex items-center justify-center p-2 shrink-0">
<span class="material-symbols-outlined text-[28px] text-secondary">inventory_2</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 justify-end">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-semibold">
                  Full-Time Alumni
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container font-label-dense text-label-dense text-primary-container font-medium">
<span class="material-symbols-outlined text-[13px] mr-1">bolt</span>Urgent
                </span>
</div>
</div>
<div class="flex flex-col">
<h3 class="font-title-md text-title-md text-on-surface group-hover:text-secondary transition-colors leading-snug">
                Staff Administrasi &amp; Dokumen Legal
              </h3>
<p class="font-label-md text-label-md text-on-surface-variant font-medium mt-0.5">
                PT Nusantara Logistics Logam
              </p>
</div>
<div class="grid grid-cols-2 gap-2 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
<span>KIIC Karawang</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span class="font-medium text-on-surface">UMR Karawang 2025</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-tertiary">school</span>
<span>OTKP / Manajemen</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>Ditutup 5 hari lagi</span>
</div>
</div>
<div class="bg-surface-container-low p-3 rounded-DEFAULT flex flex-col gap-1.5">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase tracking-wider">Kompetensi Dibutuhkan:</span>
<p class="font-body-dense text-body-dense text-on-surface line-clamp-2">
                Terbiasa kearsipan digital, pengoperasian Ms. Excel tingkat lanjut (VLOOKUP, Pivot), surat-menyurat resmi, dan korespondensi eksternal.
              </p>
</div>
</div>
<div class="mt-6 pt-4 bg-surface-container-lowest flex items-center justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Sisa Kuota BKK</span>
<span class="font-title-md text-title-md text-on-surface font-bold">2 Formasi</span>
</div>
<button class="px-4 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1.5 shadow-sm">
<span>Lihat Detail</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Card 3: Network & Infrastructure Technician (PKL) -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-tertiary/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-3">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-container flex items-center justify-center p-2 shrink-0">
<span class="material-symbols-outlined text-[28px] text-tertiary">hub</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 justify-end">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense font-semibold">
                  PKL Siswa
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface-variant font-medium">
                  Sertifikasi MTCNA
                </span>
</div>
</div>
<div class="flex flex-col">
<h3 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug">
                Network &amp; Infrastructure Technician
              </h3>
<p class="font-label-md text-label-md text-on-surface-variant font-medium mt-0.5">
                PT Graha Solusi Data Network
              </p>
</div>
<div class="grid grid-cols-2 gap-2 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
<span>Bogor / Depok</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span class="font-medium text-on-surface">Uang Transport &amp; Makan</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-tertiary">school</span>
<span>TKJ (Kelas XI)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>Deadline 18 hari lagi</span>
</div>
</div>
<div class="bg-surface-container-low p-3 rounded-DEFAULT flex flex-col gap-1.5">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase tracking-wider">Kompetensi Dibutuhkan:</span>
<p class="font-body-dense text-body-dense text-on-surface line-clamp-2">
                Pemasangan FO (Fiber Optic), crimping RJ45, routing dasar Mikrotik/Cisco, troubleshooting LAN kantor, dan kesiapan mobile on-site.
              </p>
</div>
</div>
<div class="mt-6 pt-4 bg-surface-container-lowest flex items-center justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Sisa Kuota BKK</span>
<span class="font-title-md text-title-md text-on-surface font-bold">4 Siswa</span>
</div>
<button class="px-4 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1.5 shadow-sm">
<span>Lamar Sekarang</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Card 4: Junior Accounting & Tax Assistant -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-3">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-container flex items-center justify-center p-2 shrink-0">
<span class="material-symbols-outlined text-[28px] text-secondary-container">account_balance</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 justify-end">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-semibold">
                  Alumni / Magang Siap Kerja
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container font-label-dense text-label-dense text-secondary font-medium">
                  KAP Terdaftar OJK
                </span>
</div>
</div>
<div class="flex flex-col">
<h3 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug">
                Junior Accounting &amp; Tax Assistant
              </h3>
<p class="font-label-md text-label-md text-on-surface-variant font-medium mt-0.5">
                KAP Hendra, Syamsul &amp; Rekan
              </p>
</div>
<div class="grid grid-cols-2 gap-2 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
<span>Jakarta Selatan</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span class="font-medium text-on-surface">Rp 3.8jt - 4.5jt</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-tertiary">school</span>
<span>AKL (Alumni)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>Deadline 8 hari lagi</span>
</div>
</div>
<div class="bg-surface-container-low p-3 rounded-DEFAULT flex flex-col gap-1.5">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase tracking-wider">Kompetensi Dibutuhkan:</span>
<p class="font-body-dense text-body-dense text-on-surface line-clamp-2">
                Penyusunan jurnal umum, buku besar, rekonsiliasi bank, pemahaman dasar e-Faktur/PPh 21, dan ketelitian tinggi angka keuangan.
              </p>
</div>
</div>
<div class="mt-6 pt-4 bg-surface-container-lowest flex items-center justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Sisa Kuota BKK</span>
<span class="font-title-md text-title-md text-on-surface font-bold">1 Formasi</span>
</div>
<button class="px-4 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1.5 shadow-sm">
<span>Lihat Detail</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Card 5: UI/UX Design & Content Intern -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-3">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-container flex items-center justify-center p-2 shrink-0">
<span class="material-symbols-outlined text-[28px] text-primary">palette</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 justify-end">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense font-semibold">
                  PKL Siswa
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container font-label-dense text-label-dense text-secondary font-medium">
                  Creative Hub
                </span>
</div>
</div>
<div class="flex flex-col">
<h3 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug">
                UI/UX Design &amp; Content Intern
              </h3>
<p class="font-label-md text-label-md text-on-surface-variant font-medium mt-0.5">
                Kinarya Creative Digital Studio
              </p>
</div>
<div class="grid grid-cols-2 gap-2 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
<span>Bogor Kota / Hybrid</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span class="font-medium text-on-surface">Uang Saku + Mentorship</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-tertiary">school</span>
<span>RPL / Multimedia</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>Deadline 14 hari lagi</span>
</div>
</div>
<div class="bg-surface-container-low p-3 rounded-DEFAULT flex flex-col gap-1.5">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase tracking-wider">Kompetensi Dibutuhkan:</span>
<p class="font-body-dense text-body-dense text-on-surface line-clamp-2">
                Mahir mengoperasikan Figma untuk wireframing mobile app, pengetahuan dasar design system, dan melampirkan portofolio visual interaktif.
              </p>
</div>
</div>
<div class="mt-6 pt-4 bg-surface-container-lowest flex items-center justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Sisa Kuota BKK</span>
<span class="font-title-md text-title-md text-on-surface font-bold">2 Siswa</span>
</div>
<button class="px-4 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1.5 shadow-sm">
<span>Lamar Sekarang</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Card 6: Quality Control & Assembly Staff -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-secondary/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-3">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-container flex items-center justify-center p-2 shrink-0">
<span class="material-symbols-outlined text-[28px] text-primary">precision_manufacturing</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 justify-end">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-semibold">
                  Full-Time Alumni
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-container font-label-dense text-label-dense text-primary-container font-medium">
                  Walk-in Interview
                </span>
</div>
</div>
<div class="flex flex-col">
<h3 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug">
                Quality Control &amp; Assembly Staff
              </h3>
<p class="font-label-md text-label-md text-on-surface-variant font-medium mt-0.5">
                PT Astra Otoparts Component Div.
              </p>
</div>
<div class="grid grid-cols-2 gap-2 font-body-dense text-body-dense text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
<span>Citeureup, Bogor</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">payments</span>
<span class="font-medium text-on-surface">Standar Astra + BPJS</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-tertiary">school</span>
<span>Semua Jurusan (Alumni)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span class="text-primary font-medium">Ditutup besok!</span>
</div>
</div>
<div class="bg-surface-container-low p-3 rounded-DEFAULT flex flex-col gap-1.5">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase tracking-wider">Kompetensi Dibutuhkan:</span>
<p class="font-body-dense text-body-dense text-on-surface line-clamp-2">
                Disiplin tinggi 5R/5S, pemahaman dasar alat ukur digital (Caliper/Micrometer), siap sistem shift, sehat jasmani dan tidak buta warna.
              </p>
</div>
</div>
<div class="mt-6 pt-4 bg-surface-container-lowest flex items-center justify-between gap-3">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Sisa Kuota BKK</span>
<span class="font-title-md text-title-md text-on-surface font-bold">12 Posisi</span>
</div>
<button class="px-4 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors flex items-center gap-1.5 shadow-sm">
<span>Ikuti Seleksi</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Pagination Interactive Bar -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 bg-surface-container-lowest p-5 rounded-DEFAULT shadow-sm">
<span class="font-body-dense text-body-dense text-on-surface-variant">
          Menampilkan baris <strong>1 sampai 6</strong> dari total <strong>58 lowongan</strong>
</span>
<div class="flex items-center gap-1.5">
<button aria-label="Halaman Sebelumnya" class="w-9 h-9 rounded-full flex items-center justify-center bg-surface-container text-on-surface-variant hover:bg-surface-variant transition-colors disabled:opacity-40" disabled="">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-9 h-9 rounded-full flex items-center justify-center bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold">
            1
          </button>
<button class="w-9 h-9 rounded-full flex items-center justify-center bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors">
            2
          </button>
<button class="w-9 h-9 rounded-full flex items-center justify-center bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors">
            3
          </button>
<span class="px-2 text-on-surface-variant font-body-dense">...</span>
<button class="w-9 h-9 rounded-full flex items-center justify-center bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors">
            10
          </button>
<button aria-label="Halaman Selanjutnya" class="w-9 h-9 rounded-full flex items-center justify-center bg-surface-container text-on-surface hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
</section>
<!-- Career Guidance & Support Helpdesk Box -->
<section class="w-full px-6 lg:px-12 pb-16">
<div class="max-w-7xl mx-auto">
<div class="bg-surface-container-lowest p-8 lg:p-10 rounded-xl shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<!-- Counselor Graphic & Context -->
<div class="lg:col-span-8 flex flex-col md:flex-row items-start md:items-center gap-6">
<div class="w-20 h-20 rounded-full bg-surface-container-high flex items-center justify-center shrink-0 shadow-inner">
<span class="material-symbols-outlined text-[42px] text-primary">support_agent</span>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-bold">
                Layanan Terpadu Siswa
              </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Bimbingan Konseling &amp; Hubin</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Butuh Konsultasi Penyaluran Karier &amp; Rekomendasi Magang?</h3>
<p class="font-body-default text-body-default text-on-surface-variant">
              Masih bingung memilih formasi PKL yang cocok dengan kompetensi jurusannmu? Guru BK dan Koordinator BKK Penus siap membantu bedah CV, simulasi interview, hingga penerbitan surat pengantar resmi.
            </p>
</div>
</div>
<!-- Action CTAs -->
<div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center w-full">
<a class="w-full px-5 py-3.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-all flex items-center justify-center gap-2 shadow-sm text-center" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[20px]">chat</span>
<span>Konsultasi via WhatsApp BKK</span>
</a>
<a class="w-full px-5 py-3 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant transition-all font-label-md text-label-md font-medium flex items-center justify-center gap-2 text-center" data-path="bimbingan-tatap-muka" href="#">
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
<span>Jadwalkan Konseling Tatap Muka</span>
</a>
</div>
</div>
</div>
</section>
<!-- Interactive JavaScript for Filters & Pills -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
      // Toggle Filter Pills
      const pills = document.querySelectorAll('.filter-pill');
      pills.forEach(pill => {
        pill.addEventListener('click', () => {
          pills.forEach(p => {
            p.classList.remove('bg-primary-container', 'text-on-primary-container', 'font-semibold');
            p.classList.add('bg-surface-container', 'text-on-surface');
          });
          pill.classList.remove('bg-surface-container', 'text-on-surface');
          pill.classList.add('bg-primary-container', 'text-on-primary-container', 'font-semibold');
        });
      });

      // Quick Search input filter effect
      const searchInput = document.getElementById('job-search-input');
      if (searchInput) {
        searchInput.addEventListener('input', (e) => {
          const val = e.target.value.toLowerCase();
          const cards = document.querySelectorAll('.grid > div.bg-surface-container-lowest');
          cards.forEach(card => {
            const text = card.textContent.toLowerCase();
            if (text.includes(val)) {
              card.style.display = 'flex';
            } else {
              card.style.display = 'none';
            }
          });
        });
      }
    });
  </script>
</div>
@endsection