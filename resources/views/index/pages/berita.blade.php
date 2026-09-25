@extends('index.master')

@section('title', 'Berita & Agenda - BKK SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<!-- Page Header & Categorization Layer -->
<section class="w-full bg-surface-container-low py-12 lg:py-16">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-8">
<!-- Breadcrumb & Status Pill -->
<div class="flex items-center gap-3">
<span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary font-label-dense text-label-dense">
<span class="w-2 h-2 rounded-full bg-primary mr-2 animate-pulse"></span>
          Warta &amp; Agenda Terkini
        </span>
<span class="text-on-surface-variant font-label-dense text-label-dense">/ Portal Informasi Terpadu</span>
</div>
<!-- Main Header Text -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
<div class="max-w-3xl flex flex-col gap-3">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">
            Kabar &amp; Agenda Bursa Kerja Khusus
          </h1>
<p class="font-body-editorial text-body-editorial text-on-surface-variant">
            Informasi terkini mengenai bursa kerja, agenda walk-in interview, kunjungan industri, pembekalan magang (PKL), serta tips karier persiapan dunia kerja SMK Plus Pelita Nusantara.
          </p>
</div>
<!-- Quick Search Form -->
<form method="GET" action="{{ route('bkk.berita') }}" class="w-full sm:w-80 relative shrink-0">
@if($kategoriSlug)
    <input type="hidden" name="kategori" value="{{ $kategoriSlug }}"/>
@endif
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input name="q" value="{{ $searchQuery }}" class="w-full pl-11 pr-4 py-3 bg-surface-container-lowest text-on-surface font-body-default text-body-default rounded-full shadow-sm placeholder:text-on-surface-variant/70 focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Cari berita atau agenda..." type="text"/>
</form>
</div>
<!-- Category Filter Tabs -->
<div class="flex items-center gap-2 overflow-x-auto pb-2 pt-1 no-scrollbar">
<a href="{{ route('bkk.berita', request()->only('q')) }}" 
   class="px-5 py-2.5 rounded-full {{ empty($kategoriSlug) ? 'bg-primary text-on-primary shadow-sm' : 'bg-surface-container text-on-surface hover:bg-surface-variant' }} font-label-md text-label-md font-semibold shrink-0 transition-all flex items-center gap-2">
<span>Semua Artikel</span>
<span class="text-[11px] {{ empty($kategoriSlug) ? 'bg-white/20' : 'bg-on-surface/10 text-on-surface-variant' }} px-2 py-0.5 rounded-full">{{ $totalPublished }}</span>
</a>
@foreach($categories as $cat)
<a href="{{ route('bkk.berita', array_merge(request()->only('q'), ['kategori' => $cat->slug])) }}" 
   class="px-5 py-2.5 rounded-full {{ $kategoriSlug === $cat->slug ? 'bg-primary text-on-primary shadow-sm' : 'bg-surface-container text-on-surface hover:bg-surface-variant' }} font-label-md text-label-md font-semibold shrink-0 transition-colors flex items-center gap-2">
<span>{{ $cat->nama }}</span>
<span class="text-[11px] {{ $kategoriSlug === $cat->slug ? 'bg-white/20' : 'bg-on-surface/10 text-on-surface-variant' }} px-2 py-0.5 rounded-full">{{ $cat->beritas_count }}</span>
</a>
@endforeach
</div>
</div>
</section>
<!-- Main Content Structure: Hero + Articles Grid with Sidebar -->
<section class="w-full max-w-7xl mx-auto px-6 lg:px-12 py-12 lg:py-16 flex flex-col gap-12">
<!-- FEATURED HERO ARTICLE (Horizontal Split 16:9 feel) -->
@if($heroBerita)
<article class="w-full bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden flex flex-col lg:flex-row transition-all hover:shadow-md">
<!-- Media Aspect Holder -->
<div class="lg:w-7/12 relative aspect-video lg:aspect-auto min-h-[320px] overflow-hidden group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $heroBerita->judul }}" src="{{ $heroBerita->gambar_sampul }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent lg:hidden"></div>
<div class="absolute top-4 left-4 flex flex-wrap gap-2">
<span class="px-3 py-1 rounded-full bg-primary text-on-primary font-label-dense text-label-dense uppercase tracking-wider font-semibold shadow-sm">
    Agenda Utama
</span>
<span class="px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-dense text-label-dense uppercase tracking-wider font-semibold shadow-sm">
    {{ $heroBerita->kategori->nama ?? 'Bursa Kerja' }}
</span>
</div>
</div>
<!-- Text Details -->
<div class="lg:w-5/12 p-8 lg:p-10 flex flex-col justify-between bg-surface-container-lowest">
<div class="flex flex-col gap-4">
<!-- Metadata Bar -->
<div class="flex items-center gap-4 text-on-surface-variant font-label-dense text-label-dense">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">calendar_today</span>
    {{ $heroBerita->formatted_date }}
</span>
<span>•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">schedule</span>
    {{ $heroBerita->estimasi_baca ?? '4 Menit Baca' }}
</span>
</div>
<a href="{{ route('bkk.berita.detail', $heroBerita->slug) }}">
<h2 class="font-headline-md text-headline-md text-on-surface leading-snug hover:text-primary transition-colors cursor-pointer">
    {{ $heroBerita->judul }}
</h2>
</a>
<p class="font-body-default text-body-default text-on-surface-variant line-clamp-3">
    {{ $heroBerita->ringkasan }}
</p>
</div>
<!-- Byline & CTA -->
<div class="pt-6 mt-6 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-semibold text-[14px]">
    {{ strtoupper(substr($heroBerita->penulis_nama, 0, 2)) }}
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">{{ $heroBerita->penulis_nama }}</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">{{ $heroBerita->penulis_jabatan ?? 'Sekretariat Penus Cibinong' }}</span>
</div>
</div>
<a class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary/90 transition-all" href="{{ route('bkk.berita.detail', $heroBerita->slug) }}">
<span>Baca Selengkapnya</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
@endif

<!-- CONTENT GRID: Left (Articles) & Right (Sidebar) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
<!-- ARTICLES COLUMN (8 Cols) -->
<div class="lg:col-span-8 flex flex-col gap-8">
<div class="flex items-center justify-between">
<h3 class="font-title-md text-title-md text-on-surface flex items-center gap-2">
<span class="w-1.5 h-6 bg-primary rounded-full inline-block"></span>
    @if($kategoriSlug)
        Kategori: {{ $categories->firstWhere('slug', $kategoriSlug)->nama ?? $kategoriSlug }}
    @elseif($searchQuery)
        Hasil Pencarian: "{{ $searchQuery }}"
    @else
        Semua Publikasi Terkini
    @endif
</h3>
<span class="font-label-dense text-label-dense text-on-surface-variant">
    Menampilkan {{ $beritas->firstItem() ?? 0 }} - {{ $beritas->lastItem() ?? 0 }} dari {{ $beritas->total() }} Kabar
</span>
</div>
<!-- 6 Cards Grid (2 columns on desktop) -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
@forelse($beritas as $item)
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
@if($item->gambar_sampul)
    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $item->judul }}" src="{{ $item->gambar_sampul }}"/>
@else
    <div class="w-full h-full bg-surface-container flex items-center justify-center text-on-surface-variant">
        <span class="material-symbols-outlined text-[36px]">newspaper</span>
    </div>
@endif
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-primary font-label-dense text-label-dense font-semibold">
    {{ $item->kategori->nama ?? 'Umum' }}
</span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>{{ $item->formatted_date }}</span>
<span>•</span>
<span>{{ $item->estimasi_baca ?? '3 Menit' }}</span>
</div>
<a href="{{ route('bkk.berita.detail', $item->slug) }}">
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
    {{ $item->judul }}
</h4>
</a>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
    {{ $item->ringkasan }}
</p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">{{ $item->penulis_nama }}</span>
<a href="{{ route('bkk.berita.detail', $item->slug) }}" class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
    Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</a>
</div>
</div>
</article>
@empty
<div class="col-span-2 py-12 flex flex-col items-center justify-center gap-3 bg-surface-container-lowest rounded-lg p-8 text-center">
    <span class="material-symbols-outlined text-[48px] text-on-surface-variant/40">feed</span>
    <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Belum Ada Artikel</h4>
    <p class="font-body-dense text-body-dense text-on-surface-variant max-w-md">
        Belum ditemukan publikasi berita yang sesuai dengan kategori atau kata kunci pencarian yang dipilih.
    </p>
    <a href="{{ route('bkk.berita') }}" class="mt-2 px-5 py-2 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary/90 transition-all">
        Lihat Semua Artikel
    </a>
</div>
@endforelse
</div>
<!-- PAGINATION SECTION -->
@if($beritas->hasPages())
<div class="w-full bg-surface-container-lowest rounded-lg p-4 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4 mt-4">
<div class="text-on-surface-variant font-body-dense text-body-dense">
    Halaman <strong class="text-on-surface">{{ $beritas->currentPage() }}</strong> dari <strong class="text-on-surface">{{ $beritas->lastPage() }}</strong> (Total {{ $beritas->total() }} Catatan Berita)
</div>
<div class="flex items-center gap-1.5">
@if($beritas->onFirstPage())
    <span class="w-9 h-9 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center opacity-50 cursor-not-allowed">
        <span class="material-symbols-outlined text-[18px]">chevron_left</span>
    </span>
@else
    <a href="{{ $beritas->previousPageUrl() }}" class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant transition-colors flex items-center justify-center">
        <span class="material-symbols-outlined text-[18px]">chevron_left</span>
    </a>
@endif

@foreach($beritas->getUrlRange(1, $beritas->lastPage()) as $page => $url)
    @if($page == $beritas->currentPage())
        <span class="w-9 h-9 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold flex items-center justify-center shadow-sm">
            {{ $page }}
        </span>
    @else
        <a href="{{ $url }}" class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors flex items-center justify-center">
            {{ $page }}
        </a>
    @endif
@endforeach

@if($beritas->hasMorePages())
    <a href="{{ $beritas->nextPageUrl() }}" class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant transition-colors flex items-center justify-center">
        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
    </a>
@else
    <span class="w-9 h-9 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center opacity-50 cursor-not-allowed">
        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
    </span>
@endif
</div>
</div>
@endif
</div>
<!-- SIDEBAR WIDGETS COLUMN (4 Cols) -->
<aside class="lg:col-span-4 flex flex-col gap-6 w-full">
<!-- WIDGET 1: Agenda Calendar & Milestones -->
<div class="w-full bg-surface-container-lowest rounded-lg p-6 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">event</span>
<h3 class="font-title-md text-title-md text-on-surface">Kalender Agenda BKK</h3>
</div>
<span class="font-label-dense text-label-dense px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant">Mei - Juni 2025</span>
</div>
<!-- Micro Schedule Timeline -->
<div class="flex flex-col gap-3.5">
<!-- Event Item 1 -->
<div class="flex items-start gap-3 p-3 rounded-DEFAULT bg-surface-container-low transition-colors hover:bg-surface-container">
<div class="flex flex-col items-center justify-center w-12 h-12 rounded-DEFAULT bg-primary text-on-primary shrink-0">
<span class="text-[10px] uppercase font-label-dense font-semibold tracking-wide">Mei</span>
<span class="text-[18px] font-bold leading-none">24</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Penus Career Fair 2025</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Aula Serbaguna Kampus • 08:00 WIB</span>
<span class="font-label-dense text-label-dense text-primary mt-0.5">35 Perusahaan Partisipan</span>
</div>
</div>
<!-- Event Item 2 -->
<div class="flex items-start gap-3 p-3 rounded-DEFAULT bg-surface-container-low transition-colors hover:bg-surface-container">
<div class="flex flex-col items-center justify-center w-12 h-12 rounded-DEFAULT bg-secondary-container text-on-secondary-container shrink-0">
<span class="text-[10px] uppercase font-label-dense font-semibold tracking-wide">Mei</span>
<span class="text-[18px] font-bold leading-none">28</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Pelepasan Magang Gel. II</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Lapangan Utama • Siswa Kelas XI</span>
<span class="font-label-dense text-label-dense text-on-surface-variant mt-0.5">Wajib Seragam Wearpack</span>
</div>
</div>
<!-- Event Item 3 -->
<div class="flex items-start gap-3 p-3 rounded-DEFAULT bg-surface-container-low transition-colors hover:bg-surface-container">
<div class="flex flex-col items-center justify-center w-12 h-12 rounded-DEFAULT bg-surface-container-highest text-on-surface shrink-0">
<span class="text-[10px] uppercase font-label-dense font-semibold tracking-wide">Jun</span>
<span class="text-[18px] font-bold leading-none">05</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Walk-in PT Denso Indonesia</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Lab Mesin &amp; Otomotif • 09:00 WIB</span>
<span class="font-label-dense text-label-dense text-primary mt-0.5">Khusus Alumni 2024 &amp; 2025</span>
</div>
</div>
</div>
<a class="w-full py-2.5 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant text-center font-label-md text-label-md font-medium transition-colors" href="#">
            Lihat Jadwal Lengkap Semester Ini
          </a>
</div>
<!-- WIDGET 2: Document Downloads -->
<div class="w-full bg-surface-container-lowest rounded-lg p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[22px]">download_for_offline</span>
<h3 class="font-title-md text-title-md text-on-surface">Pusat Unduhan Siswa</h3>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
            Unduh format resmi berkas administratif prakerin magang dan template portofolio standar industri.
          </p>
<div class="flex flex-col gap-2.5">
<!-- Doc 1 -->
<a class="flex items-center justify-between p-3 rounded-DEFAULT bg-surface-container-low hover:bg-primary/5 transition-all group" href="#">
<div class="flex items-center gap-3 min-w-0">
<span class="material-symbols-outlined text-primary text-[24px]">description</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate group-hover:text-primary transition-colors">
                    Pedoman Laporan PKL 2025
                  </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">PDF • 2.4 MB • Versi Revisi</span>
</div>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">file_download</span>
</a>
<!-- Doc 2 -->
<a class="flex items-center justify-between p-3 rounded-DEFAULT bg-surface-container-low hover:bg-primary/5 transition-all group" href="#">
<div class="flex items-center gap-3 min-w-0">
<span class="material-symbols-outlined text-secondary text-[24px]">contact_page</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate group-hover:text-primary transition-colors">
                    Format CV ATS Vokasi SMK
                  </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">DOCX • 680 KB • Terstandarisasi</span>
</div>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">file_download</span>
</a>
<!-- Doc 3 -->
<a class="flex items-center justify-between p-3 rounded-DEFAULT bg-surface-container-low hover:bg-primary/5 transition-all group" href="#">
<div class="flex items-center gap-3 min-w-0">
<span class="material-symbols-outlined text-tertiary text-[24px]">fact_check</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate group-hover:text-primary transition-colors">
                    Form Penilaian Mitra IDUKA
                  </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">PDF • 450 KB • Lampiran Penilaian</span>
</div>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">file_download</span>
</a>
</div>
</div>
<!-- WIDGET 3: Newsletter & WhatsApp Career Alerts -->
<div class="w-full bg-gradient-to-br from-primary to-primary-fixed-variant rounded-lg p-6 text-on-primary shadow-sm flex flex-col gap-4 relative overflow-hidden">
<!-- Ambient Decorative Accent -->
<div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[24px] text-secondary-fixed">campaign</span>
<span class="font-label-dense text-label-dense uppercase tracking-wider font-semibold text-white/80">Langganan Info Karir</span>
</div>
<h3 class="font-title-md text-title-md font-bold leading-tight">
            Dapatkan Info Lowongan &amp; Walk-in Wawancara Langsung di Ponselmu
          </h3>
<p class="font-body-dense text-body-dense text-white/90">
            Bergabung dengan 1.200+ siswa dan alumni dalam siaran kabar eksklusif BKK Penus setiap Jumat pagi.
          </p>
<form class="flex flex-col gap-2.5 pt-1" onsubmit="event.preventDefault(); alert('Terima kasih! Anda telah terdaftar dalam sistem broadcast BKK Penus.');">
<input class="w-full px-4 py-2.5 rounded-full bg-white text-on-surface font-body-dense text-body-dense placeholder:text-on-surface-variant/70 focus:outline-none" placeholder="Nama Lengkap Siswa / Alumni" required="" type="text"/>
<input class="w-full px-4 py-2.5 rounded-full bg-white text-on-surface font-body-dense text-body-dense placeholder:text-on-surface-variant/70 focus:outline-none" placeholder="No. WhatsApp Aktif (08xx)" required="" type="tel"/>
<button class="w-full py-2.5 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md font-semibold hover:bg-secondary-fixed transition-all flex items-center justify-center gap-2 shadow-sm" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
              Daftar Notifikasi WhatsApp
            </button>
</form>
<div class="flex items-center justify-center gap-2 text-[11px] text-white/75 font-body-dense pt-1">
<span class="material-symbols-outlined text-[14px]">lock</span>
<span>Data privat terproteksi &amp; bebas spam iklan luar.</span>
</div>
</div>
</aside>
</div>
</section>
</div>
@endsection