@extends('index.master')

@section('title', $berita->judul . ' - BKK SMK Plus Pelita Nusantara')

@push('styles')
<style>
    .markdown-rendered-content {
        font-size: 16px;
        line-height: 1.85;
        color: #1c1c1a;
    }
    .markdown-rendered-content p {
        margin-bottom: 1.35rem;
    }
    .markdown-rendered-content h1, 
    .markdown-rendered-content h2, 
    .markdown-rendered-content h3, 
    .markdown-rendered-content h4 {
        font-family: 'Hanken Grotesk', sans-serif;
        color: #1c1c1a;
        font-weight: 700;
        line-height: 1.35;
    }
    .markdown-rendered-content h1 {
        font-size: 1.85rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #bc0013;
    }
    .markdown-rendered-content h2 {
        font-size: 1.45rem;
        margin-top: 2.25rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f0edeb;
        color: #1c1c1a;
    }
    .markdown-rendered-content h3 {
        font-size: 1.25rem;
        margin-top: 1.75rem;
        margin-bottom: 0.75rem;
        color: #875300;
    }
    .markdown-rendered-content blockquote {
        border-left: 4px solid #bc0013;
        background: #f6f3f1;
        padding: 1rem 1.25rem;
        border-radius: 0 0.75rem 0.75rem 0;
        margin: 1.75rem 0;
        color: #5f3f3b;
        font-style: italic;
    }
    .markdown-rendered-content ul {
        list-style-type: disc;
        margin-left: 1.75rem;
        margin-bottom: 1.35rem;
    }
    .markdown-rendered-content ol {
        list-style-type: decimal;
        margin-left: 1.75rem;
        margin-bottom: 1.35rem;
    }
    .markdown-rendered-content li {
        margin-bottom: 0.5rem;
    }
    .markdown-rendered-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.75rem 0;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .markdown-rendered-content th, 
    .markdown-rendered-content td {
        border: 1px solid #e5e2e0;
        padding: 0.75rem 1rem;
    }
    .markdown-rendered-content th {
        background: #f0edeb;
        font-weight: 600;
    }
    .markdown-rendered-content code {
        background: #f0edeb;
        padding: 0.2rem 0.45rem;
        border-radius: 0.25rem;
        font-size: 0.9em;
        color: #bc0013;
    }
    .markdown-rendered-content pre {
        background: #1c1c1a;
        color: #ffffff;
        padding: 1.25rem;
        border-radius: 0.75rem;
        overflow-x: auto;
        margin: 1.75rem 0;
    }
    .markdown-rendered-content pre code {
        background: transparent;
        color: #ffffff;
        padding: 0;
    }
    .markdown-rendered-content img {
        border-radius: 0.75rem;
        margin: 1.75rem 0;
        max-width: 100%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .markdown-rendered-content hr {
        border: 0;
        height: 1px;
        background: #e5e2e0;
        margin: 2.25rem 0;
    }
    .markdown-rendered-content strong {
        color: #1c1c1a;
        font-weight: 600;
    }
    .markdown-rendered-content em {
        color: #5f3f3b;
    }
</style>
@endpush

@section('content')
<div class="flex flex-col w-full">
<!-- Breadcrumb Header -->
<div class="w-full bg-surface-container-low py-4">
<div class="max-w-5xl mx-auto px-6 lg:px-8">
<nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant overflow-x-auto whitespace-nowrap">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ url('/bkk') }}">
<span class="material-symbols-outlined text-[16px]">home</span>
<span>Beranda</span>
</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary transition-colors" href="{{ route('bkk.berita') }}">Berita &amp; Agenda</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface-variant/80">{{ $berita->kategori->nama ?? 'Warta' }}</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">{{ $berita->judul }}</span>
</nav>
</div>
</div>

<article class="w-full max-w-5xl mx-auto px-6 lg:px-8 py-10 md:py-14">
<header class="flex flex-col gap-6">
<div class="flex flex-wrap items-center gap-3">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense uppercase tracking-wider flex items-center gap-1.5 font-semibold">
<span class="material-symbols-outlined text-[15px]">school</span>
    {{ $berita->kategori->nama ?? 'Warta & Agenda BKK' }}
</span>
<span class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-dense text-label-dense flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-secondary">update</span>
    {{ $berita->formatted_date }}
</span>
@if($berita->views_count > 0)
<span class="px-3 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-dense text-label-dense flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-primary">visibility</span>
    {{ number_format($berita->views_count) }} Kali Dibaca
</span>
@endif
</div>

<h1 class="font-headline-xl text-headline-xl text-on-surface leading-tight tracking-tight">
    {{ $berita->judul }}
</h1>

<!-- Author Bar & Actions -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 py-6 bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center gap-4">
@if($berita->penulis_avatar)
    <img alt="{{ $berita->penulis_nama }}" class="w-14 h-14 rounded-full object-cover shadow-sm ring-2 ring-primary/10" src="{{ $berita->penulis_avatar }}"/>
@else
    <div class="w-14 h-14 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-lg ring-2 ring-primary/10">
        {{ strtoupper(substr($berita->penulis_nama, 0, 2)) }}
    </div>
@endif
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-title-md text-title-md text-on-surface">{{ $berita->penulis_nama }}</span>
<span class="material-symbols-outlined text-[18px] text-primary" style="font-variation-settings: 'FILL' 1;" title="Penulis Terverifikasi">verified</span>
</div>
<span class="font-body-dense text-body-dense text-on-surface-variant">{{ $berita->penulis_jabatan ?? 'Kontributor Resmi BKK SMK Plus Pelita Nusantara' }}</span>
<div class="flex items-center gap-3 font-label-dense text-label-dense text-on-surface-variant/80 mt-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">calendar_today</span>
    {{ $berita->formatted_date }}
</span>
<span>•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">timer</span>
    {{ $berita->estimasi_baca ?? '5 Menit Baca' }}
</span>
</div>
</div>
</div>

<!-- Social Share & Bookmark -->
<div class="flex items-center gap-2">
<button aria-label="Simpan Artikel" class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-surface-container text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all" id="btnBookmark" type="button">
<span class="material-symbols-outlined text-[20px]" id="bookmarkIcon">bookmark_border</span>
</button>
<a aria-label="Bagikan ke WhatsApp" class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-surface-container text-[#25D366] hover:bg-surface-container-high transition-all" href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . url()->current()) }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[20px]">chat</span>
</a>
<a aria-label="Bagikan ke LinkedIn" class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-surface-container text-[#0A66C2] hover:bg-surface-container-high transition-all" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[20px]">share</span>
</a>
<button aria-label="Salin Tautan" class="inline-flex items-center gap-2 px-4 h-11 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary/90 transition-all shadow-sm" id="btnCopyLink" type="button">
<span class="material-symbols-outlined text-[18px]" id="copyIcon">content_copy</span>
<span id="copyLabel">Salin Link</span>
</button>
</div>
</div>
</header>

<!-- Featured Image Hero Banner -->
@if($berita->gambar_sampul)
<div class="mt-8 mb-12 overflow-hidden rounded-xl bg-surface-container shadow-md">
<div class="w-full h-80 sm:h-96 md:h-[460px] relative">
<img class="w-full h-full object-cover" alt="{{ $berita->judul }}" src="{{ $berita->gambar_sampul }}"/>
@if($berita->caption_gambar)
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-6 md:p-8">
<p class="font-body-dense text-body-dense text-white/90 bg-black/40 backdrop-blur-md px-4 py-2 rounded-full">
    {{ $berita->caption_gambar }}
</p>
</div>
@endif
</div>
</div>
@endif

<!-- Article Content Grid: Left (Markdown Content) + Right (Sidebar) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
<!-- Markdown Article Content (8 Cols) -->
<div class="lg:col-span-8 flex flex-col gap-8 text-on-surface">
<!-- Excerpt Lead -->
@if($berita->ringkasan)
<div class="font-body-editorial text-body-editorial text-on-surface-variant leading-relaxed p-6 rounded-xl bg-surface-container-low border-l-4 border-primary">
    <p class="font-medium text-on-surface italic">
        {{ $berita->ringkasan }}
    </p>
</div>
@endif

<!-- Dynamic Markdown Content Rendered -->
<div class="markdown-rendered-content">
    {!! $berita->rendered_konten !!}
</div>

<!-- Author Bio Footer Box -->
<div class="mt-8 p-6 md:p-8 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col sm:flex-row items-center sm:items-start gap-6 border border-surface-variant/30">
@if($berita->penulis_avatar)
    <img alt="{{ $berita->penulis_nama }}" class="w-20 h-20 rounded-full object-cover shadow-sm shrink-0" src="{{ $berita->penulis_avatar }}"/>
@else
    <div class="w-20 h-20 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-2xl shrink-0">
        {{ strtoupper(substr($berita->penulis_nama, 0, 2)) }}
    </div>
@endif
<div class="flex flex-col gap-2 text-center sm:text-left">
<div class="flex flex-col sm:flex-row sm:items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold">{{ $berita->penulis_nama }}</span>
<span class="font-label-dense text-label-dense px-2.5 py-0.5 rounded-full bg-primary/10 text-primary w-fit mx-auto sm:mx-0 font-medium">
    {{ $berita->penulis_jabatan ?? 'Penulis & Kontributor' }}
</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
    {{ $berita->penulis_bio ?? 'Tim Humas & Pusat Karier Bursa Kerja Khusus SMK Plus Pelita Nusantara Cibinong.' }}
</p>
<div class="pt-2 flex flex-wrap items-center justify-center sm:justify-start gap-3">
<a class="inline-flex items-center gap-1 font-label-dense text-label-dense text-primary font-semibold hover:underline" href="{{ url('/bkk/tentang') }}">
<span class="material-symbols-outlined text-[16px]">mail</span>
    Konsultasi Bimbingan Karier
</a>
<span class="text-on-surface-variant/40">•</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Ruang BKK Gedung A Lt. 2</span>
</div>
</div>
</div>
</div>

<!-- Sidebar Widgets (4 Cols) -->
<aside class="lg:col-span-4 flex flex-col gap-8">
<div class="p-6 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-5 sticky top-28 border border-surface-variant/30">
<span class="font-title-md text-title-md text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-primary">view_timeline</span>
    Alur Cepat BKK Penus
</span>
<div class="flex flex-col gap-4">
<div class="flex items-start gap-3">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">1</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Lengkapi Profil Siswa</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Upload nilai &amp; portofolio praktikum.</span>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">2</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Generate ATS CV</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Unduh format PDF terstandar resmi.</span>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">3</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Apply Lowongan Sekali Klik</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Tersambung ke 45+ IDUKA mitra Penus.</span>
</div>
</div>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container flex flex-col gap-2">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-secondary font-bold">Agenda Terdekat</span>
<span class="font-title-md text-title-md text-on-surface">Walk-in Interview Batch 1</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Kamis, 6 Maret 2025 di Aula Utama</span>
<a class="mt-2 text-primary font-label-dense text-label-dense font-semibold flex items-center gap-1 hover:underline" href="{{ route('bkk.berita') }}">
    Lihat Syarat &amp; Dokumen
    <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
<div class="p-4 rounded-DEFAULT bg-primary/5 flex flex-col gap-3">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Unduhan Berkas</span>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-lowest">
<div class="flex items-center gap-2 truncate">
<span class="material-symbols-outlined text-primary">description</span>
<span class="font-body-dense text-body-dense text-on-surface truncate">Template_CV_ATS_Penus.docx</span>
</div>
<button aria-label="Unduh Dokumen" class="text-on-surface-variant hover:text-primary" type="button">
<span class="material-symbols-outlined text-[20px]">download</span>
</button>
</div>
</div>
</div>
</aside>
</div>

<!-- Recommended / Related Articles Section -->
@if($relatedBerita->count() > 0)
<section class="mt-20 pt-12 border-t border-surface-variant/40">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
<div>
<span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Rekomendasi Bacaan</span>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold mt-1">Artikel &amp; Pembekalan Terkait</h3>
</div>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:text-on-surface transition-colors" href="{{ route('bkk.berita') }}">
    Lihat Semua Artikel
    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
@foreach($relatedBerita as $rel)
<article class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col border border-surface-variant/30">
<div class="h-44 w-full relative">
@if($rel->gambar_sampul)
    <img class="w-full h-full object-cover" alt="{{ $rel->judul }}" src="{{ $rel->gambar_sampul }}"/>
@else
    <div class="w-full h-full bg-surface-container flex items-center justify-center text-on-surface-variant">
        <span class="material-symbols-outlined text-[32px]">newspaper</span>
    </div>
@endif
<span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md text-on-surface font-label-dense text-label-dense font-medium">
    {{ $rel->kategori->nama ?? 'Warta' }}
</span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 font-label-dense text-label-dense text-on-surface-variant">
<span>{{ $rel->formatted_date }}</span>
<span>•</span>
<span>{{ $rel->estimasi_baca ?? '4 Min Baca' }}</span>
</div>
<a href="{{ route('bkk.berita.detail', $rel->slug) }}">
<h4 class="font-title-md text-title-md text-on-surface font-semibold line-clamp-2 hover:text-primary cursor-pointer transition-colors">
    {{ $rel->judul }}
</h4>
</a>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
    {{ $rel->ringkasan }}
</p>
</div>
<a class="font-label-md text-label-md text-primary font-semibold flex items-center gap-1 hover:underline" href="{{ route('bkk.berita.detail', $rel->slug) }}">
    Baca Selengkapnya
    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
</article>
@endforeach
</div>
</section>
@endif

</article>

<script>
    (function() {
      const btnBookmark = document.getElementById('btnBookmark');
      const bookmarkIcon = document.getElementById('bookmarkIcon');
      let bookmarked = false;

      if (btnBookmark && bookmarkIcon) {
        btnBookmark.addEventListener('click', function() {
          bookmarked = !bookmarked;
          if (bookmarked) {
            bookmarkIcon.textContent = 'bookmark';
            bookmarkIcon.style.fontVariationSettings = "'FILL' 1";
            btnBookmark.classList.add('text-primary');
          } else {
            bookmarkIcon.textContent = 'bookmark_border';
            bookmarkIcon.style.fontVariationSettings = "'FILL' 0";
            btnBookmark.classList.remove('text-primary');
          }
        });
      }

      const btnCopyLink = document.getElementById('btnCopyLink');
      const copyIcon = document.getElementById('copyIcon');
      const copyLabel = document.getElementById('copyLabel');

      if (btnCopyLink && copyIcon && copyLabel) {
        btnCopyLink.addEventListener('click', function() {
          if (navigator.clipboard) {
            navigator.clipboard.writeText(window.location.href).catch(function() {});
          }
          copyIcon.textContent = 'check';
          copyLabel.textContent = 'Tersalin!';
          setTimeout(function() {
            copyIcon.textContent = 'content_copy';
            copyLabel.textContent = 'Salin Link';
          }, 2500);
        });
      }
    })();
</script>
</div>
@endsection