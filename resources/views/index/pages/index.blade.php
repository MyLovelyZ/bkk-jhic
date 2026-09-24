@extends('index.master')

@section('title', 'BKK Penus - Bursa Kerja Khusus SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<!-- HERO SECTION: BURSA KERJA KHUSUS (BKK) ECOSYSTEM -->
<div class="relative w-full overflow-hidden bg-surface">
    <!-- Interactive Background Canvas & Ambient Gradients -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden select-none z-0">
        <!-- Canvas for Dynamic Career Mesh Network -->
        <canvas id="bkk-hero-canvas" class="absolute inset-0 w-full h-full opacity-60"></canvas>
        
        <!-- Ambient Glowing Orbs -->
        <div class="absolute -top-40 left-1/4 w-[750px] h-[450px] bg-gradient-to-tr from-primary/15 via-secondary-container/10 to-transparent blur-[120px] rounded-full pointer-events-none transform -translate-x-1/2"></div>
        <div class="absolute top-1/3 -right-24 w-[500px] h-[500px] rounded-full bg-[#EB001B]/[0.07] blur-[120px] animate-pulse pointer-events-none" style="animation-duration: 8s;"></div>
        <div class="absolute bottom-10 -left-20 w-[480px] h-[480px] rounded-full bg-[#F79E1B]/[0.06] blur-[130px] animate-pulse pointer-events-none" style="animation-duration: 11s;"></div>
        
        <!-- Architectural Grid Mask -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(28,28,26,0.03)_1px,transparent_1px),linear-gradient(to_bottom,rgba(28,28,26,0.03)_1px,transparent_1px)] bg-[size:44px_44px] [mask-image:radial-gradient(ellipse_75%_65%_at_50%_40%,#000_65%,transparent_100%)]"></div>
        
        <!-- Interactive Mouse Spotlight -->
        <div class="absolute inset-0 transition-opacity duration-300 opacity-70" id="hero-interactive-spotlight" style="background: radial-gradient(700px circle at var(--mouse-x, 50%) var(--mouse-y, 35%), rgba(235,0,27,0.07), rgba(255,165,37,0.04), transparent 70%);"></div>
    </div>

    <!-- MAIN HERO CONTENT CONTAINER -->
    <section class="relative max-w-7xl mx-auto px-6 lg:px-12 pt-8 pb-14 lg:pt-14 lg:pb-20 z-10">

        <!-- 2-Column Responsive Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- LEFT COLUMN: Headline, Mission, Search & Filter Console (Col 7) -->
            <div class="lg:col-span-7 flex flex-col gap-6 text-left">
                <!-- Main Kinetic Headline -->
                <div class="flex flex-col gap-2 hero-anim-item">
                    <h1 class="font-headline-xl text-3xl sm:text-4xl md:text-5xl lg:text-[46px] font-bold text-on-surface leading-[1.16] tracking-tight">
                        Wujudkan Karier Impian di 
                        <span class="relative inline-block whitespace-nowrap text-primary-container">
                            <span id="hero-rotating-word" class="inline-block transition-transform duration-300">Industri Terpercaya</span>
                            <span class="absolute bottom-1 left-0 w-full h-3 bg-secondary-container/20 -z-10 rounded-sm -rotate-1"></span>
                        </span>
                        Bersama BKK Penus.
                    </h1>
                </div>

                <!-- Editorial Description -->
                <p class="font-body-editorial text-base sm:text-lg text-on-surface-variant leading-relaxed max-w-2xl hero-anim-item">
                    Platform resmi penyaluran Praktik Kerja Lapangan (PKL), rekrutmen lulusan langsung oleh mitra IDUKA terpercaya, dan pendampingan portofolio berstandar ATS untuk mencetak generasi muda siap kerja dengan gaji terstandarisasi.
                </p>

                <!-- INTERACTIVE DISCOVERY & SEARCH CONSOLE (Alpine.js Powered) -->
                <div x-data="bkkHeroSearch()" class="w-full bg-surface-container-lowest p-3 sm:p-4 rounded-lg shadow-lg border border-outline-variant/30 flex flex-col gap-3.5 hero-anim-item transition-all duration-300 hover:shadow-xl">
                    
                    <!-- Mode Switcher Tabs -->
                    <div class="flex items-center justify-between border-b border-surface-container pb-2.5">
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="mode = 'job'" 
                                    :class="mode === 'job' ? 'bg-primary-container text-on-primary-container shadow-sm font-semibold' : 'text-on-surface-variant hover:text-on-surface'"
                                    class="px-3.5 py-1.5 rounded-full text-xs font-medium transition-all flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[15px]">school</span>
                                <span>Pencari Kerja & PKL</span>
                            </button>
                            <button type="button" 
                                    @click="mode = 'partner'" 
                                    :class="mode === 'partner' ? 'bg-primary-container text-on-primary-container shadow-sm font-semibold' : 'text-on-surface-variant hover:text-on-surface'"
                                    class="px-3.5 py-1.5 rounded-full text-xs font-medium transition-all flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[15px]">corporate_fare</span>
                                <span>Mitra Industri (DUDI)</span>
                            </button>
                        </div>
                        <span class="text-[11px] text-on-surface-variant hidden sm:inline">
                            <span class="text-primary font-bold">140+</span> Perusahaan Terhubung
                        </span>
                    </div>

                    <!-- Job Search Form Mode -->
                    <div x-show="mode === 'job'" x-transition class="flex flex-col gap-3">
                        <form action="{{ route('bkk.lowongan') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-2">
                            <!-- Keyword Input -->
                            <div class="flex-1 flex items-center gap-2.5 px-3.5 py-2.5 w-full bg-surface-container-low rounded-lg border border-transparent focus-within:border-primary-container/40 focus-within:bg-surface-container-lowest transition-all">
                                <span class="material-symbols-outlined text-[20px] text-outline shrink-0">search</span>
                                <input type="text" 
                                       name="keyword" 
                                       x-model="searchQuery"
                                       placeholder="Cari lowongan, posisi (Laravel, Mikrotik, Admin)..." 
                                       class="w-full bg-transparent text-sm text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none font-body-default" />
                                <button type="button" x-show="searchQuery" @click="searchQuery = ''" class="text-outline hover:text-on-surface">
                                    <span class="material-symbols-outlined text-[16px]">close</span>
                                </button>
                            </div>

                            <!-- Major / Jurusan Selector -->
                            <div class="w-full sm:w-auto shrink-0">
                                <select name="jurusan" class="w-full bg-surface-container-low text-xs sm:text-sm text-on-surface font-medium rounded-lg px-3.5 py-3 border border-transparent focus:border-primary-container/40 focus:outline-none cursor-pointer">
                                    <option value="">Semua Jurusan</option>
                                    <option value="tkj">TKJ (Teknik Komputer & Jaringan)</option>
                                    <option value="rpl">RPL (Rekayasa Perangkat Lunak)</option>
                                    <option value="akl">AKL (Akuntansi & Keuangan)</option>
                                    <option value="otkp">OTKP (Manajemen Perkantoran)</option>
                                </select>
                            </div>

                            <!-- Action Button -->
                            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-primary-container text-on-primary-container font-label-md text-sm font-semibold hover:bg-primary transition-all duration-200 shadow-md hover:shadow-lg shrink-0 group">
                                <span>Cari Loker</span>
                                <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </button>
                        </form>

                    </div>

                    <!-- Partner Recruitment Form Mode -->
                    <div x-show="mode === 'partner'" x-transition class="p-3 bg-surface-container-low rounded-lg flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex flex-col gap-1">
                            <h4 class="font-title-md text-sm font-semibold text-on-surface flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-primary text-[18px]">handshake</span>
                                Rekrut Talenta Siap Kerja & Siswa PKL Penus
                            </h4>
                            <p class="text-xs text-on-surface-variant">Pasang lowongan gratis untuk perusahaan Anda & temukan kandidat lulusan tersertifikasi.</p>
                        </div>
                        <a href="{{ route('bkk.kerjasama') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-white text-xs font-semibold hover:bg-primary-container transition-colors shadow-sm shrink-0">
                            <span>Buka Lowongan Mitra</span>
                            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                        </a>
                    </div>
                </div>

                <!-- Primary CTAs & Trust Seals -->
                <div class="flex flex-wrap items-center gap-4 pt-1 hero-anim-item">
                    <a href="#lowongan" class="inline-flex items-center justify-center px-7 py-3 rounded-full bg-primary-container text-on-primary-container font-label-md text-sm font-semibold shadow-md hover:bg-primary hover:shadow-lg transition-all duration-200 group">
                        <span>Jelajahi Lowongan PKL & Kerja</span>
                        <span class="material-symbols-outlined text-[16px] ml-1.5 group-hover:translate-x-1 transition-transform">east</span>
                    </a>
                    
                    <a href="{{ route('bkk.kerjasama') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-surface-container-lowest text-tertiary ring-1 ring-tertiary/30 font-label-md text-sm font-semibold hover:bg-surface-container hover:text-on-surface transition-all duration-200">
                        <span>Daftar Kemitraan IDUKA</span>
                    </a>
                </div>
            </div>

            <!-- RIGHT COLUMN: Interactive 3D "BKK Live Career Matrix & Match Hub" (Col 5) -->
            <div class="lg:col-span-5 relative flex items-center justify-center hero-anim-item" id="hero-right-visual">
                
                <!-- Floating Ambient Glow Behind Cards -->
                <div class="absolute w-72 h-72 rounded-full bg-gradient-to-br from-primary/20 via-secondary-container/20 to-transparent blur-3xl pointer-events-none -z-10 animate-pulse"></div>

                <!-- Interactive Talent Match Simulator Card (Alpine.js Driven) -->
                <div x-data="bkkTalentHub()" class="relative w-full max-w-md bg-surface-container-lowest/90 backdrop-blur-xl rounded-2xl p-6 shadow-2xl border border-outline-variant/40 flex flex-col gap-5 transition-transform duration-300 hover:-translate-y-1">
                    
                    <!-- Card Top Header -->
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[20px]">hub</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold uppercase tracking-wider text-on-surface">BKK Smart Matchmaker</span>
                                <span class="text-[11px] text-on-surface-variant">Live Algoritma Penyaluran Siswa</span>
                            </div>
                        </div>
                    </div>

                    <!-- Candidate & Industry Live Match Showcase -->
                    <div class="p-4 bg-surface-container-low rounded-md border border-outline-variant/30 flex flex-col gap-3.5 relative overflow-hidden transition-all duration-300">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <img :src="currentMajorData.avatar" alt="Avatar Siswa" class="w-11 h-11 rounded-full object-cover ring-2 ring-primary-container/30 shrink-0" />
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-on-surface" x-text="currentMajorData.studentName"></span>
                                    <span class="text-[11px] text-on-surface-variant" x-text="currentMajorData.className"></span>
                                </div>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-xs font-bold text-primary" x-text="currentMajorData.score"></span>
                                <span class="text-[10px] text-on-surface-variant">ATS Match</span>
                            </div>
                        </div>

                        <!-- Matched Vacancy Info -->
                        <div class="p-2.5 bg-surface-container-lowest rounded-md border border-surface-container flex flex-col gap-1.5">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-semibold text-primary-container flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">apartment</span>
                                    <span x-text="currentMajorData.partner"></span>
                                </span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-semibold" x-text="currentMajorData.badge"></span>
                            </div>
                            <span class="text-xs font-bold text-on-surface" x-text="currentMajorData.position"></span>
                            <div class="flex items-center justify-between text-[11px] text-on-surface-variant pt-1 border-t border-surface-container">
                                <span>Gaji & Insentif:</span>
                                <span class="font-bold text-on-surface" x-text="currentMajorData.salary"></span>
                            </div>
                        </div>

                        <!-- Competency Skills Match Chips -->
                        <div class="flex flex-wrap gap-1">
                            <template x-for="skill in currentMajorData.skills" :key="skill">
                                <span class="px-2 py-0.5 rounded-md bg-surface-container text-[10px] font-medium text-on-surface flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[10px] text-emerald-600">check</span>
                                    <span x-text="skill"></span>
                                </span>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- FLOATING BADGE 1: Recent Placement Notification (Top Right) -->
                <div class="absolute -top-6 -right-4 sm:-right-8 bg-surface-container-lowest/95 backdrop-blur-md px-3.5 py-2.5 rounded-xl shadow-xl border border-outline-variant/30 flex items-center gap-3 z-20 bkk-floating-badge-1 max-w-[240px]">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold text-on-surface leading-tight">Penempatan Walk-In</span>
                        <span class="text-[10px] text-on-surface-variant truncate">Nurul A. (RPL) di PT Telkom</span>
                    </div>
                </div>

                <!-- FLOATING BADGE 2: Automated ATS CV Score (Bottom Left) -->
                <div class="absolute -bottom-6 -left-4 sm:-left-8 bg-surface-container-lowest/95 backdrop-blur-md px-3.5 py-2.5 rounded-xl shadow-xl border border-outline-variant/30 flex items-center gap-3 z-20 bkk-floating-badge-2 max-w-[240px]">
                    <div class="w-8 h-8 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[18px]">auto_awesome</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold text-on-surface leading-tight">Standar CV ATS Penus</span>
                        <span class="text-[10px] text-on-surface-variant">Skor Lolos 96% Terverifikasi</span>
                    </div>
                </div>

            </div>

        </div>

        <!-- INFINITE CORPORATE PARTNER MARQUEE RIBBON -->
        <div class="mt-14 pt-8 border-t border-surface-container flex flex-col gap-4">
            <div class="flex items-center justify-between text-xs text-on-surface-variant">
                <span class="uppercase font-bold tracking-wider text-outline flex items-center gap-2">
                    Jaringan Kemitraan Resmi IDUKA BKK Penus
                </span>
                <a href="{{ route('bkk.kerjasama') }}" class="font-semibold text-primary hover:underline flex items-center gap-1">
                    <span>Lihat Seluruh 140+ Mitra</span>
                    <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </a>
            </div>

            <!-- Continuous Logo / Partner Strip -->
            <div class="relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_10%,black_90%,transparent)]">
                <div class="flex items-center gap-8 py-2 animate-marquee whitespace-nowrap">
                    <!-- Partner 1 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">directions_car</span>
                        <span class="text-xs font-bold text-on-surface">PT Astra Otoparts Tbk</span>
                    </div>
                    <!-- Partner 2 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">cell_tower</span>
                        <span class="text-xs font-bold text-on-surface">PT Telkom Indonesia Tbk</span>
                    </div>
                    <!-- Partner 3 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-secondary text-[20px]">precision_manufacturing</span>
                        <span class="text-xs font-bold text-on-surface">PT United Tractors Tbk</span>
                    </div>
                    <!-- Partner 4 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">laptop_chromebook</span>
                        <span class="text-xs font-bold text-on-surface">Axioo Smart Education</span>
                    </div>
                    <!-- Partner 5 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-secondary text-[20px]">account_balance</span>
                        <span class="text-xs font-bold text-on-surface">PT Bank Central Asia Tbk</span>
                    </div>
                    <!-- Partner 6 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">store</span>
                        <span class="text-xs font-bold text-on-surface">PT Indomarco Prismatama</span>
                    </div>
                    <!-- Partner 7 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-secondary text-[20px]">two_wheeler</span>
                        <span class="text-xs font-bold text-on-surface">PT Yamaha Indonesia Motor</span>
                    </div>
                    <!-- Partner 8 -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">newspaper</span>
                        <span class="text-xs font-bold text-on-surface">Kompas Gramedia Group</span>
                    </div>

                    <!-- Duplicate for infinite smooth marquee -->
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">directions_car</span>
                        <span class="text-xs font-bold text-on-surface">PT Astra Otoparts Tbk</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">cell_tower</span>
                        <span class="text-xs font-bold text-on-surface">PT Telkom Indonesia Tbk</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-secondary text-[20px]">precision_manufacturing</span>
                        <span class="text-xs font-bold text-on-surface">PT United Tractors Tbk</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-surface-container shrink-0">
                        <span class="material-symbols-outlined text-primary text-[20px]">laptop_chromebook</span>
                        <span class="text-xs font-bold text-on-surface">Axioo Smart Education</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- SECTION 2: 3 PILAR FITUR UNGGULAN BKK DIGITAL -->
<section class="w-full bg-surface-container-low py-20">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-12">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div class="flex flex-col gap-3 max-w-2xl">
<span class="inline-flex items-center self-start px-3 py-1 rounded-full bg-tertiary-fixed text-tertiary font-label-dense text-label-dense uppercase tracking-widest font-bold">Arsitektur Ekosistem Karier</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Tiga Pilar Utama Mempersiapkan Talenta Vokasi Unggulan</h2>
<p class="font-body-default text-body-default text-on-surface-variant">Integrasi komprehensif antara administrasi sekolah terstruktur, keterbukaan bursa kerja nyata, serta pendampingan portofolio profesional berstandar industri modern.</p>
</div>
<div class="shrink-0">
<a class="inline-flex items-center font-label-md text-label-md text-tertiary font-semibold hover:text-primary transition-colors" href="#">Lihat Alur Kerja Sistem<span class="material-symbols-outlined text-[18px] ml-1">arrow_forward</span></a>
</div>
</div>
<!-- 3 Pillar Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Pilar 1 -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow group">
<div class="flex flex-col gap-5">
<div class="w-14 h-14 rounded-full bg-primary-fixed flex items-center justify-center text-primary group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[28px]">assignment</span>
</div>
<div class="flex flex-col gap-2">
<span class="font-label-dense text-label-dense text-primary uppercase font-bold tracking-wider">Pilar 01 • Praktik Kerja</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Penyaluran PKL Terstruktur</h3>
</div>
<!-- Feature Checkpoints -->
<ul class="flex flex-col gap-2.5 pt-2 text-on-surface-variant font-body-dense text-body-dense">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span class="">Surat Pengantar &amp; Pakta Integritas Digital</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span class="">Logbook kegiatan harian dengan geotagging</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span class="">Penilaian rubrik kompetensi terpusat</span>
</li>
</ul>
</div>
</div>
<!-- Pilar 2 -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-sm ring-1 ring-tertiary/20 flex flex-col justify-between hover:shadow-md transition-all group">
  <div class="flex flex-col gap-5">
    <div class="w-14 h-14 rounded-DEFAULT bg-tertiary-fixed rounded-full flex items-center justify-center text-tertiary group-hover:scale-105 transition-transform">
      <span class="material-symbols-outlined text-[28px]">verified_user</span></div><div class="flex flex-col gap-2">
        <span class="font-label-dense text-label-dense text-tertiary uppercase font-bold tracking-wider">Pilar 02 • Kesempatan Kerja</span>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Lowongan Kerja Terkurasi</h3>
      </div>
      <ul class="flex flex-col gap-2.5 pt-2 text-on-surface-variant font-body-dense text-body-dense"><li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-tertiary">check</span><span>Prioritas walk-in interview kampus</span></li><li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-tertiary">check</span><span>Sesuai standar UMK &amp; legalitas resmi</span></li><li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-tertiary">check</span><span>Penyaluran terarah per jurusan</span></li></ul></div>
    </div>
<!-- Pilar 3 -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow group">
<div class="flex flex-col gap-5">
<div class="w-14 h-14 rounded-DEFAULT bg-tertiary-fixed rounded-full flex items-center justify-center text-tertiary group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[28px]">auto_stories</span>
</div>
<div class="flex flex-col gap-2">
<span class="font-label-dense text-label-dense text-tertiary uppercase font-bold tracking-wider">Pilar 03 • Portofolio Siap Pakai</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Automated CV &amp; Career Builder</h3>
</div>
<!-- Feature Checkpoints -->
<ul class="flex flex-col gap-2.5 pt-2 text-on-surface-variant font-body-dense text-body-dense">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span class="">Format ATS-Friendly siap ekspor PDF</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span class="">Pustaka kata kunci skill teknis per kejuruan</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">check</span>
<span class="">Review langsung oleh tim konselor BKK</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 3: FEATURED LOWONGAN PKL & KERJA -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 py-20 w-full" id="lowongan">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div class="flex flex-col gap-2 max-w-xl">
<span class="inline-flex items-center self-start px-3 py-1 rounded-full bg-tertiary-fixed text-tertiary font-label-dense text-label-dense uppercase tracking-widest font-bold">Peluang Emas Terbuka</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Lowongan PKL &amp; Rekrutmen Kerja Terkini</h2>
<p class="font-body-default text-body-default text-on-surface-variant">Lowongan eksklusif dari jaringan kemitraan resmi IDUKA SMK Plus Pelita Nusantara.</p>
</div>
<div class="flex items-center gap-3"><button class="px-4 py-2 rounded-full bg-primary-container text-on-primary-container font-label-dense text-label-dense font-semibold shadow-sm">Semua Jurusan</button><button class="px-4 py-2 rounded-full bg-surface-container text-tertiary hover:bg-surface-container-high font-label-dense text-label-dense font-medium transition-colors">Khusus PKL</button><button class="px-4 py-2 rounded-full bg-surface-container text-tertiary hover:bg-surface-container-high font-label-dense text-label-dense font-medium transition-colors">Lulusan Baru</button></div>
</div>
<!-- 3 Job Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Card 1 -->
<div class="p-6 rounded-lg bg-surface-container-lowest shadow-md flex flex-col justify-between hover:-translate-y-1 transition-transform">
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-4">
<span class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-dense text-label-dense font-semibold">
              PKL / Magang Bersertifikat
            </span>
<span class="font-label-dense text-label-dense text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 5 Hari Lagi
            </span>
</div>
<div class="flex items-center gap-3 pt-1"><button class="px-4 py-2 rounded-full bg-primary-container text-on-primary-container font-label-dense text-label-dense font-semibold shadow-sm">Semua Jurusan</button><button class="px-4 py-2 rounded-full bg-surface-container text-tertiary hover:bg-surface-container-high font-label-dense text-label-dense font-medium transition-colors">Khusus PKL</button><button class="px-4 py-2 rounded-full bg-surface-container text-tertiary hover:bg-surface-container-high font-label-dense text-label-dense font-medium transition-colors">Lulusan Baru</button></div>
<div class="flex flex-wrap gap-2 pt-2">
<span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface">Jurusan TKJ</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface">Cibinong, Bogor</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface">MikroTik MTCNA</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
            Membantu instalasi topologi jaringan LAN/WLAN kantor cabang, pemeliharaan router, dan troubleshooting tiket bantuan pengguna internal.
          </p>
</div>
<div class="mt-6 pt-5 bg-surface-container-low -mx-6 -mb-6 p-6 rounded-b-lg flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Uang Saku &amp; Fasilitas</span>
<span class="font-title-md text-title-md text-on-surface font-bold">Rp 1.500.000 /bln</span>
</div>
<button class="px-5 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary shadow-sm transition-colors">
            Lamar Cepat
          </button>
</div>
</div>
<!-- Card 2 -->
<div class="p-6 rounded-lg bg-surface-container-lowest shadow-md ring-1 ring-tertiary/20 flex flex-col justify-between hover:-translate-y-1 transition-transform"><div class="flex flex-col gap-4"><div class="flex items-start justify-between gap-4"><span class="px-3 py-1 rounded-full bg-tertiary-fixed text-tertiary font-label-dense text-label-dense font-semibold">PKL Unggulan IDUKA</span><span class="font-label-dense text-label-dense text-tertiary flex items-center gap-1"><span class="material-symbols-outlined text-[14px] text-tertiary">schedule</span> 3 Hari Lagi</span></div><div class="flex items-center gap-3 pt-1"><div class="w-12 h-12 rounded-DEFAULT bg-tertiary-fixed flex items-center justify-center font-bold text-tertiary text-lg"><span class="material-symbols-outlined text-[28px] text-tertiary">design_services</span></div><div><h3 class="font-title-md text-title-md text-on-surface">UI/UX &amp; Graphic Creative Intern</h3><p class="font-body-dense text-body-dense text-on-surface-variant">PT Digital Media Kreasi Indonesia</p></div></div><div class="flex flex-wrap gap-2 pt-2"><span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-tertiary">Jurusan RPL / DKV</span><span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-tertiary">Bogor Selatan</span><span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-tertiary">Figma &amp; Adobe CC</span></div><p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">Kolaborasi tim kreatif merancang aset visual marketing promosi digital, prototipe antarmuka website, dan katalog interaktif.</p></div><div class="mt-6 pt-5 bg-surface-container-low -mx-6 -mb-6 p-6 rounded-b-lg flex items-center justify-between"><div class="flex flex-col"><span class="font-label-dense text-label-dense text-tertiary">Uang Saku &amp; Fasilitas</span><span class="font-title-md text-title-md text-on-surface font-bold">Rp 1.750.000 /bln</span></div><button class="px-5 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary shadow-sm transition-colors">Lamar Cepat</button></div></div>
<!-- Card 3 -->
<div class="p-6 rounded-lg bg-surface-container-lowest shadow-md flex flex-col justify-between hover:-translate-y-1 transition-transform">
<div class="flex flex-col gap-4">
<div class="flex items-start justify-between gap-4">
<span class="px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense font-semibold">
              Full-time Lulusan SMK
            </span>
<span class="font-label-dense text-label-dense text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 2 Minggu Lagi
            </span>
</div>
<div class="flex items-center gap-3 pt-1"><button class="px-4 py-2 rounded-full bg-primary-container text-on-primary-container font-label-dense text-label-dense font-semibold shadow-sm">Semua Jurusan</button><button class="px-4 py-2 rounded-full bg-surface-container text-tertiary hover:bg-surface-container-high font-label-dense text-label-dense font-medium transition-colors">Khusus PKL</button><button class="px-4 py-2 rounded-full bg-surface-container text-tertiary hover:bg-surface-container-high font-label-dense text-label-dense font-medium transition-colors">Lulusan Baru</button></div>
<div class="flex flex-wrap gap-2 pt-2">
<span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface">Jurusan AKL / OTKP</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface">Bogor Kota</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container font-label-dense text-label-dense text-on-surface">MS Excel Mahir</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
            Pencatatan mutasi harian, rekonsiliasi arsip dokumen kredit perbankan, pelayanan nasabah loket unit mikro, serta kearsipan digital.
          </p>
</div>
<div class="mt-6 pt-5 bg-surface-container-low -mx-6 -mb-6 p-6 rounded-b-lg flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant">Gaji &amp; Insentif</span>
<span class="font-title-md text-title-md text-on-surface font-bold">Rp 4.800.000+</span>
</div>
<button class="px-5 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary shadow-sm transition-colors">
            Lamar Cepat
          </button>
</div>
</div>
</div>
<!-- View All Button -->
<div class="mt-10 flex justify-center">
<a class="inline-flex items-center px-6 py-3 rounded-full bg-surface-container text-tertiary ring-1 ring-tertiary/20 font-label-md text-label-md font-semibold hover:bg-tertiary hover:text-on-tertiary transition-all duration-200" href="#">Tampilkan Seluruh 45+ Lowongan Aktif<span class="material-symbols-outlined text-[18px] ml-2 text-tertiary group-hover:text-on-tertiary">east</span></a>
</div>
</section>
<!-- SECTION 4: BERITA & AGENDA BKK TERKINI -->
<section class="w-full bg-surface-container-low py-20">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-10">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div class="flex flex-col gap-2">
<span class="inline-flex items-center px-3 py-1 rounded-full bg-tertiary-fixed text-tertiary font-label-dense text-label-dense uppercase tracking-widest font-bold">Kisah Keberhasilan Nyata</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Berita &amp; Agenda Walk-in BKK Penus</h2>
</div>
<a class="font-label-md text-label-md text-primary font-semibold hover:text-on-surface transition-colors flex items-center gap-1" href="#">
          Arsip Berita &amp; Agenda Lengkap <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
<!-- Articles Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Article 1 -->
<article class="flex flex-col rounded-lg bg-surface-container-lowest overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Bustling Indonesian high school vocational Job Fair hall packed with students in uniform visiting corporate booths, interview desks, career banners, bright indoor lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIdwu3qVWEqAouIpLosRJ_BVzyxezM6itjNXW3z93M7oYNlcPUmAEjAUcIHhr9FbSGxjxFWTJK8iV7ijaJuw-KJwAlwzR50YBG0Sw4iMuOg-nj8OLJM2FmbNFmvvqMu_HwNXLFmi7k3RrZ5TVJhV2cowgFE4pSrYoO-piXQrcC1lfl-bDACtaY-97Q6l38FblIBiR79bquIaBnM3xDGXY2ZzBulPoHovhkCkA0DiL9Db_KmE5I5Tg5"/>
<span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-dense text-label-dense text-on-surface font-semibold">
              Agenda Akbar
            </span>
</div>
<div class="p-6 flex flex-col gap-3 flex-1 justify-between">
<div class="flex flex-col gap-2">
<span class="font-label-dense text-label-dense text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">calendar_today</span> 14 November 2025 • Aula Graha Penus
              </span>
<h3 class="font-title-md text-title-md text-on-surface hover:text-primary transition-colors">
<a class="" href="#">Job Fair Tahunan SMK Plus Pelita Nusantara 2025: Hadirkan 35 Perusahaan dan 500 Lowongan Langsung</a>
</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-3">
                Rangkaian bursa kerja terbuka mempertemukan calon wisudawan dengan perwakilan HR industri manufaktur, IT, perbankan, dan logistik se-Jabodetabek.
              </p>
</div>
<div class="pt-4 flex items-center justify-between font-label-dense text-label-dense text-primary font-semibold">
<span class="">Baca Liputan Acara</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</div>
</div>
</article>
<!-- Article 2 -->
<article class="flex flex-col rounded-lg bg-surface-container-lowest overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Indonesian vocational school students visiting modern industrial robotics laboratory and telecommunication data center, guided by industrial engineers with safety helmets" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwnoXXverFbXUIW9AsYhQD3YdiPfB8RG92eiGs--QX83whVC4Rahb0Xmcl2Qh-AMWQMbxThXy_NOI6gXyttX-x6X0lZKy-EBBR7TH511DWlzrQtWjj0sqOHhZxDdjdFa3xZZKcjhPbQvmDlAu62FWcOftCoQOdgffyXzhQ4UJXMxmw4CuID-R8Ma5hZ9OKpDEljY0xalLf1IdXVTrpjFFjR10_la2PKIzDTC6MGY0b6QwbeTNeDfAF"/>
<span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-dense text-label-dense text-on-surface font-semibold">
              Kunjungan Industri
            </span>
</div>
<div class="p-6 flex flex-col gap-3 flex-1 justify-between">
<div class="flex flex-col gap-2">
<span class="font-label-dense text-label-dense text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">calendar_today</span> 28 Oktober 2025 • Sentul &amp; Jakarta
              </span>
<h3 class="font-title-md text-title-md text-on-surface hover:text-primary transition-colors">
<a class="" href="#">Kunjungan Industri dan Sinkronisasi Kurikulum Bersama PT Astra Otoparts &amp; Telkom Indonesia</a>
</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-3">
                Memperkuat standar kompetensi siswa jurusan RPL dan TKJ agar selaras dengan kebutuhan cloud infrastructure dan otomasi industri 4.0.
              </p>
</div>
<div class="pt-4 flex items-center justify-between font-label-dense text-label-dense text-primary font-semibold">
<span class="">Baca Selengkapnya</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</div>
</div>
</article>
<!-- Article 3 -->
<article class="flex flex-col rounded-lg bg-surface-container-lowest overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="relative h-48 w-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Close up professional HR mock interview session with cheerful young Indonesian female graduate student holding portfolio folder in bright office room" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZ3DbasAo98Y6iTfMJa_lPRzTD22K45X0d1q097TxqgzaGF5JU22Zp9rCmLKCRWude8X7CjZ2n22YUjLtp-2U2naaWi-iiIbz2Et2DQEgYd1DpDqGPzst36nOLSfKJQHdJcJoWdUnEEw1ok42y6AUOaUnHzBW6mYCX2I7LcsxQq_Z49vhrQWyZJB72NqgrfbRYfGFvVlL_n_WYG02cMlAQvadRKAuutBuzozQfXBRbS1m67vrg8K0y"/>
<span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md font-label-dense text-label-dense text-on-surface font-semibold">
              Tips &amp; Karir
            </span>
</div>
<div class="p-6 flex flex-col gap-3 flex-1 justify-between">
<div class="flex flex-col gap-2">
<span class="font-label-dense text-label-dense text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">calendar_today</span> 15 Oktober 2025 • Panduan BKK
              </span>
<h3 class="font-title-md text-title-md text-on-surface hover:text-primary transition-colors">
<a class="" href="#">5 Kunci Sukses Lolos Interview User untuk Fresh Graduate SMK Tanpa Pengalaman Formal</a>
</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-3">
                Bagaimana menceritakan pengalaman tugas akhir, kepemimpinan organisasi, serta kesiapan mental bekerja di bawah ritme industri profesional.
              </p>
</div>
<div class="pt-4 flex items-center justify-between font-label-dense text-label-dense text-primary font-semibold">
<span class="">Baca Panduan HR</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</div>
</div>
</article>
</div>
</div>
</section>
<!-- SECTION 5: TESTIMONI ALUMNI & MITRA INDUSTRI DUDI -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 py-20 w-full">
<div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-14 gap-3">
<span class="font-label-dense text-label-dense uppercase tracking-widest text-secondary font-bold">Kisah Keberhasilan Nyata</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Dipercaya Mitra Industri, Dibuktikan oleh Rekam Jejak Alumni</h2>
<p class="font-body-default text-body-default text-on-surface-variant">Dengarkan penuturan lulusan yang sukses berkarier dan apresiasi dari pimpinan perusahaan mitra.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Testi 1: Alumni TKJ -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-1 text-secondary-container">
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
</div>
<p class="font-body-default text-body-default text-on-surface italic">
            "Berkat fitur CV Builder BKK Penus, portofolio jaringan komputer dan sertifikasi Mikrotik saya tersusun rapi. Belum genap 1 bulan setelah wisuda, saya langsung diterima melalui seleksi walk-in di kampus."
          </p>
</div>
<div class="flex items-center gap-3 pt-6 mt-6 border-t-0 bg-surface-container-low p-3 rounded-DEFAULT">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Portrait of young Indonesian male professional in IT data center polo shirt, smiling confidently, clean modern lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCS4FPVROda6rluwoB6SKZPdk0vWQNZE1jlTqLqsOTzI7hmvbAE73zWQ-klikycR2p46OWSnjhJojLa98eQPy-4QCWiByo4neKBVF1sDkmiqpFihbgmu-RrNrIcl4PEK7zBIVVIg_f279a3hyNFegKVkCCNwshZ0mtG_7ixgvEh-Ynb02c62dRF8GMnK4ZsSnKUUTCXhgC2akxoqBPuygcm9T8j9_d94tlrq1c3bii9nKw1b3UQrZO2"/>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface text-sm font-semibold">Rian Pratama, A.Md.</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Alumni TKJ 2023 • Network Engineer di PT Solusi Data Prima</span>
</div>
</div>
</div>
<!-- Testi 2: Mitra Industri HR Director -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-sm ring-1 ring-tertiary/30 flex flex-col justify-between"><div class="flex flex-col gap-4"><div class="flex items-center justify-between"><div class="flex items-center gap-1 text-secondary-container"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span></div><span class="px-2.5 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-dense text-label-dense font-semibold">Mitra Industri DUDI</span></div><p class="font-body-default text-body-default text-on-surface italic">"Lulusan SMK Plus Pelita Nusantara memiliki kedisiplinan kerja tinggi dan adaptasi teknis yang sangat cepat. Kerja sama penyaluran BKK ini memangkas durasi rekrutmen teknisi kami hingga 50%."</p></div><div class="flex items-center gap-3 pt-6 mt-6 bg-surface-container-low p-3 rounded-DEFAULT"><div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary font-bold"><span class="material-symbols-outlined text-[24px]">apartment</span></div><div class="flex flex-col"><span class="font-title-md text-title-md text-on-surface text-sm font-semibold">Bambang Hermanto, S.T.</span><span class="font-body-dense text-body-dense text-tertiary">HR Operations Head • PT Astra Otoparts Div. Komponen</span></div></div></div>
<!-- Testi 3: Alumni RPL -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-1 text-secondary-container">
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
<span class="material-symbols-outlined text-[20px]" style='font-variation-settings: "FILL" 1;'>star</span>
</div>
<p class="font-body-default text-body-default text-on-surface italic">
            "Jurnal PKL digital memudahkan kami dipantau tanpa ribet fotokopi dokumen. Dari tempat PKL yang difasilitasi BKK, saya langsung ditawari kontrak kerja permanen sebelum ijazah resmi keluar."
          </p>
</div>
<div class="flex items-center gap-3 pt-6 mt-6 bg-surface-container-low p-3 rounded-DEFAULT">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Portrait of young Indonesian female software engineer wearing modest hijab, working with laptop at creative agency" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFfV05rKeXurjQCwpzJ078Bv7HRSSojaT9KuXBshKraoQtjmkhPbIhpyfvjam90ajQ_gXrFdQ3IpvlT5y-c81Tiq2zHaLDfqF_YzJvCeoIxfjHXrvlY3nlOzhwkY0CytYpdNQd-ddslLQ0rbr22UfofHkMwle1auezpl2msjjiXy0s81vNo6_WLE5Vb_HSVwXje1FRVlGwCiut_6XPWW-2gF2k1MRkvI6SgQrTXYrc5cch6Ezhp_Hn"/>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface text-sm font-semibold">Nurul Azizah</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Alumni RPL 2024 • Web QA di Creative Studio Nusantara</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 6: BANNER CTA PENUTUP -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 pb-20 w-full">
<div class="relative overflow-hidden rounded-xl bg-gradient-to-r from-on-background via-[#252523] to-[#1c1c1a] p-10 lg:p-16 text-surface-container-lowest shadow-2xl">
<!-- Background Ambient Geometric Rings -->
<div class="absolute -right-24 -bottom-24 w-96 h-96 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
<div class="absolute -left-20 -top-20 w-72 h-72 rounded-full bg-secondary-container/20 blur-2xl pointer-events-none"></div>
<div class="relative z-10 max-w-3xl flex flex-col gap-6">
<div class="inline-flex items-center gap-2 self-start px-3.5 py-1.5 rounded-full bg-surface-container-lowest/10 backdrop-blur-md">
<span class="material-symbols-outlined text-[16px] text-secondary-container">rocket_launch</span>
<span class="font-label-dense text-label-dense text-surface-container-lowest uppercase tracking-wider font-semibold">Akselerasi Karier Mandiri</span>
</div>
<h2 class="font-headline-xl text-headline-xl text-surface-container-lowest tracking-tight leading-tight">
          Siap Melangkah ke Dunia Profesional? Buat CV Digital dan Lamar Posisi Impianmu Sekarang.
        </h2>
<p class="font-body-editorial text-body-editorial text-surface-variant max-w-2xl">
          Masuk dengan akun portal siswa SMK Plus Pelita Nusantara, perbarui sertifikasi kompetensimu, dan akses ratusan relasi perusahaan mitra resmi BKK.
        </p>
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-bold shadow-lg hover:bg-primary transition-all duration-200" href="#">
<span class="material-symbols-outlined text-[20px] mr-2">contact_page</span>
            Mulai Buat CV Digital Siswa
          </a>
<a class="inline-flex items-center justify-center px-7 py-4 rounded-full bg-tertiary-fixed/20 backdrop-blur-md text-surface-container-lowest ring-1 ring-tertiary-fixed/40 font-label-md text-label-md font-semibold hover:bg-tertiary hover:ring-tertiary transition-all duration-200" href="#"><span class="material-symbols-outlined text-[20px] mr-2">business</span>Portal Pendaftaran Mitra Perusahaan</a>
</div>
</div>
</div>
</section>
</div>
@endsection

@push('styles')
<style>
    /* Continuous Infinite Partner Marquee Animation */
    @keyframes bkkMarquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: flex;
        width: max-content;
        animation: bkkMarquee 32s linear infinite;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }

    /* 3D Perspective and Card Transitions */
    #hero-right-visual {
        perspective: 1200px;
    }
    .hero-anim-item {
        will-change: transform, opacity;
    }
    
    /* Interactive Mouse Spotlight transition */
    #hero-interactive-spotlight {
        pointer-events: none;
    }
</style>
@endpush

@push('scripts')
<!-- GSAP & Alpine.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

<script>
    // Alpine.js Component: Hero Search & Discovery State
    function bkkHeroSearch() {
        return {
            mode: 'job',
            searchQuery: '',
            popularTags: ['MagangPKL', 'LokerRPL', 'TeknisiTKJ', 'StaffAdmin', 'AstraOtoparts', 'GajiUMK']
        };
    }

    // Alpine.js Component: Interactive Talent Match Hub
    function bkkTalentHub() {
        return {
            activeMajor: 'RPL',
            majors: [
                { code: 'RPL', name: 'Rekayasa Perangkat Lunak' },
                { code: 'TKJ', name: 'Teknik Komputer & Jaringan' },
                { code: 'AKL', name: 'Akuntansi & Keuangan' },
                { code: 'OTKP', name: 'Manajemen Perkantoran' }
            ],
            majorData: {
                'RPL': {
                    studentName: 'Aditya Pratama',
                    className: 'Siswa RPL • Siap PKL / Kerja',
                    avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80',
                    partner: 'PT Astra Graphia Information Tech',
                    badge: 'Prioritas Walk-In',
                    position: 'Junior Fullstack & Web Developer',
                    score: '98%',
                    salary: 'Rp 4.800.000 - Rp 6.500.000 / bln',
                    skills: ['Laravel', 'Vue.js', 'REST API', 'Git & CI/CD'],
                    quotaText: '5 Kuota Terbuka'
                },
                'TKJ': {
                    studentName: 'Fikri Maulana',
                    className: 'Siswa TKJ • Sertifikasi MTCNA',
                    avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80',
                    partner: 'PT Telkom Indonesia (Div. Akses)',
                    badge: 'Mitra Unggulan',
                    position: 'Junior Network & Cloud Engineer',
                    score: '96%',
                    salary: 'Rp 4.500.000 - Rp 5.800.000 / bln',
                    skills: ['MikroTik', 'Fiber Optic', 'Cisco CCNA', 'Linux Server'],
                    quotaText: '8 Kuota Terbuka'
                },
                'AKL': {
                    studentName: 'Siti Nurhaliza',
                    className: 'Siswi AKL • Brevet Pajak A/B',
                    avatar: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80',
                    partner: 'PT Bank Central Asia Tbk Mitra',
                    badge: 'Seleksi Kampus',
                    position: 'Accounting & Tax Associate Staff',
                    score: '95%',
                    salary: 'Rp 4.600.000 - Rp 5.500.000 / bln',
                    skills: ['Excel Mahir', 'SAP Finance', 'Rekonsiliasi Bank', 'PPh 21/23'],
                    quotaText: '6 Kuota Terbuka'
                },
                'OTKP': {
                    studentName: 'Nabila Larasati',
                    className: 'Siswi OTKP • Administrasi Perkantoran',
                    avatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80',
                    partner: 'PT United Tractors Tbk',
                    badge: 'Kerja Sama DUDI',
                    position: 'Corporate Admin & Executive Secretary',
                    score: '97%',
                    salary: 'Rp 4.500.000 - Rp 5.400.000 / bln',
                    skills: ['Digital Filing', 'Public Relations', 'Notulensi Rapat', 'ERP Office'],
                    quotaText: '4 Kuota Terbuka'
                }
            },
            get currentMajorData() {
                return this.majorData[this.activeMajor];
            }
        };
    }

    // GSAP and Interactive Canvas Animations on DOM Ready
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Mouse Spotlight tracking
        const spotlight = document.getElementById('hero-interactive-spotlight');
        if (spotlight) {
            window.addEventListener('mousemove', (e) => {
                const x = ((e.clientX / window.innerWidth) * 100).toFixed(1);
                const y = ((e.clientY / window.innerHeight) * 100).toFixed(1);
                spotlight.style.setProperty('--mouse-x', `${x}%`);
                spotlight.style.setProperty('--mouse-y', `${y}%`);
            });
        }

        // 2. Interactive Canvas: Career Mesh Network
        const canvas = document.getElementById('bkk-hero-canvas');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            let width, height, dpr;
            let particles = [];
            const particleCount = 42;
            let mouse = { x: null, y: null, radius: 140 };

            function resizeCanvas() {
                dpr = window.devicePixelRatio || 1;
                width = canvas.parentElement.clientWidth;
                height = canvas.parentElement.clientHeight;
                canvas.width = width * dpr;
                canvas.height = height * dpr;
                ctx.scale(dpr, dpr);
            }

            class Particle {
                constructor() {
                    this.x = Math.random() * width;
                    this.y = Math.random() * height;
                    this.vx = (Math.random() - 0.5) * 0.7;
                    this.vy = (Math.random() - 0.5) * 0.7;
                    this.radius = Math.random() * 2 + 1.2;
                    // Color variety: Primary Red (#bc0013), Ember Gold (#ffa525), Soft Slate (#875300)
                    const colors = ['rgba(188, 0, 19, ', 'rgba(255, 165, 37, ', 'rgba(235, 0, 27, '];
                    this.colorPrefix = colors[Math.floor(Math.random() * colors.length)];
                    this.alpha = Math.random() * 0.4 + 0.2;
                }

                update() {
                    this.x += this.vx;
                    this.y += this.vy;

                    if (this.x < 0 || this.x > width) this.vx *= -1;
                    if (this.y < 0 || this.y > height) this.vy *= -1;

                    // Mouse interaction
                    if (mouse.x !== null && mouse.y !== null) {
                        const dx = mouse.x - this.x;
                        const dy = mouse.y - this.y;
                        const dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < mouse.radius) {
                            const force = (mouse.radius - dist) / mouse.radius;
                            this.x -= (dx / dist) * force * 1.5;
                            this.y -= (dy / dist) * force * 1.5;
                        }
                    }
                }

                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                    ctx.fillStyle = this.colorPrefix + this.alpha + ')';
                    ctx.fill();
                }
            }

            function initParticles() {
                resizeCanvas();
                particles = [];
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }
            }

            function animateParticles() {
                ctx.clearRect(0, 0, width, height);

                // Draw connecting network lines
                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const dist = Math.sqrt(dx * dx + dy * dy);

                        if (dist < 115) {
                            const lineAlpha = (1 - dist / 115) * 0.18;
                            ctx.beginPath();
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.strokeStyle = `rgba(188, 0, 19, ${lineAlpha})`;
                            ctx.lineWidth = 0.8;
                            ctx.stroke();
                        }
                    }
                }

                // Update & draw particles
                particles.forEach(p => {
                    p.update();
                    p.draw();
                });

                requestAnimationFrame(animateParticles);
            }

            initParticles();
            requestAnimationFrame(animateParticles);

            window.addEventListener('resize', initParticles);
            window.addEventListener('mousemove', (e) => {
                const rect = canvas.getBoundingClientRect();
                mouse.x = e.clientX - rect.left;
                mouse.y = e.clientY - rect.top;
            });
            window.addEventListener('mouseleave', () => {
                mouse.x = null;
                mouse.y = null;
            });
        }

        // 3. GSAP Entrance Timeline & Micro-Animations
        if (typeof gsap !== 'undefined') {
            const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

            // Stagger hero elements in
            tl.fromTo('.hero-anim-item', 
                { opacity: 0, y: 28 }, 
                { opacity: 1, y: 0, duration: 0.8, stagger: 0.1, delay: 0.15 }
            );

            // Floating Levitation for Micro-Badges
            gsap.to('.bkk-floating-badge-1', {
                y: -12,
                rotation: 1.2,
                duration: 3.2,
                ease: 'sine.inOut',
                repeat: -1,
                yoyo: true
            });

            gsap.to('.bkk-floating-badge-2', {
                y: 10,
                rotation: -1,
                duration: 3.6,
                ease: 'sine.inOut',
                repeat: -1,
                yoyo: true,
                delay: 0.6
            });

            // Kinetic Rotating Headline Words
            const rotatingWords = [
                'Industri Terpercaya',
                'Korporasi Global',
                'Dunia Kerja Nyata',
                'Karier Cemerlang',
                'Mitra Industri IDUKA'
            ];
            let currentWordIndex = 0;
            const wordEl = document.getElementById('hero-rotating-word');

            if (wordEl) {
                setInterval(() => {
                    currentWordIndex = (currentWordIndex + 1) % rotatingWords.length;
                    const nextWord = rotatingWords[currentWordIndex];

                    gsap.to(wordEl, {
                        opacity: 0,
                        y: -14,
                        duration: 0.35,
                        ease: 'power2.in',
                        onComplete: () => {
                            wordEl.textContent = nextWord;
                            gsap.fromTo(wordEl, 
                                { opacity: 0, y: 14 }, 
                                { opacity: 1, y: 0, duration: 0.45, ease: 'power2.out' }
                            );
                        }
                    });
                }, 3400);
            }

            // Numerical Counters Rollup
            const statCounters = document.querySelectorAll('.bkk-stat-counter');
            statCounters.forEach(counter => {
                const target = parseFloat(counter.getAttribute('data-target'));
                const isDecimal = counter.getAttribute('data-decimal') === '1';

                const obj = { val: 0 };
                gsap.to(obj, {
                    val: target,
                    duration: 2.2,
                    ease: 'power2.out',
                    delay: 0.5,
                    onUpdate: () => {
                        counter.textContent = isDecimal ? obj.val.toFixed(1) : Math.floor(obj.val).toLocaleString('id-ID');
                    }
                });
            });
        }
    });
</script>
@endpush