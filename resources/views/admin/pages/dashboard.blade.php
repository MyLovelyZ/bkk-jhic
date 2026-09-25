@extends('admin.master')

@section('title', 'Dashboard Admin BKK - SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col gap-6">
    <!-- Welcome Header & Action Banner -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-gradient-to-r from-primary to-primary-container p-6 rounded-xl text-white shadow-sm">
        <div class="flex flex-col gap-1">
            <span class="text-xs uppercase tracking-wider font-semibold opacity-80">
                Pusat Kendali Informasi BKK Penus
            </span>
            <h1 class="text-2xl font-bold font-headline-md">
                Selamat Datang, {{ $authUser['nama_lengkap'] ?? $authUser['username'] ?? 'Administrator' }}!
            </h1>
            <p class="text-xs text-white/90 max-w-xl">
                Kelola publikasi warta bursa kerja, agenda rekrutmen industri, dan panduan karier siswa secara terpusat melalui modul berita.
            </p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="{{ route('bkk.admin.berita.create') }}" 
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-white text-primary font-bold text-xs hover:bg-surface-container transition-all shadow-sm">
                <span class="material-symbols-outlined text-[18px]">add</span>
                <span>Tulis Berita Baru</span>
            </a>
            <a href="{{ route('bkk.admin.berita.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-black/20 text-white font-semibold text-xs hover:bg-black/30 transition-all border border-white/20">
                <span class="material-symbols-outlined text-[18px]">list</span>
                <span>Semua Berita</span>
            </a>
        </div>
    </div>

    <!-- Stat Metric Cards (4 Grid) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1: Total Berita -->
        <div class="bg-surface-container-lowest p-5 rounded-xl border border-surface-variant/30 shadow-sm flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xs text-on-surface-variant font-medium">Total Artikel</span>
                <span class="text-2xl font-bold text-on-surface mt-1 font-headline-lg">
                    {{ number_format($stats['total_berita']) }}
                </span>
                <span class="text-[11px] text-on-surface-variant/80 mt-0.5">Semua data publikasi</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                <span class="material-symbols-outlined text-[26px]">newspaper</span>
            </div>
        </div>

        <!-- Card 2: Terbit -->
        <div class="bg-surface-container-lowest p-5 rounded-xl border border-surface-variant/30 shadow-sm flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xs text-on-surface-variant font-medium">Berita Terbit</span>
                <span class="text-2xl font-bold text-emerald-600 mt-1 font-headline-lg">
                    {{ number_format($stats['total_published']) }}
                </span>
                <span class="text-[11px] text-emerald-700/80 mt-0.5">Tayang di web publik</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[26px]">verified</span>
            </div>
        </div>

        <!-- Card 3: Draf -->
        <div class="bg-surface-container-lowest p-5 rounded-xl border border-surface-variant/30 shadow-sm flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xs text-on-surface-variant font-medium">Draf / Menunggu</span>
                <span class="text-2xl font-bold text-amber-600 mt-1 font-headline-lg">
                    {{ number_format($stats['total_draft']) }}
                </span>
                <span class="text-[11px] text-amber-700/80 mt-0.5">Belum dipublikasikan</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[26px]">edit_note</span>
            </div>
        </div>

        <!-- Card 4: Total Views -->
        <div class="bg-surface-container-lowest p-5 rounded-xl border border-surface-variant/30 shadow-sm flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xs text-on-surface-variant font-medium">Total Pembaca</span>
                <span class="text-2xl font-bold text-blue-600 mt-1 font-headline-lg">
                    {{ number_format($stats['total_views']) }}
                </span>
                <span class="text-[11px] text-blue-700/80 mt-0.5">Akumulasi tayangan artikel</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[26px]">visibility</span>
            </div>
        </div>
    </div>

    <!-- Main Content: Recent Articles & Authenticated Account Info -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- 2 Cols: Recent Articles Table -->
        <div class="lg:col-span-2 bg-surface-container-lowest p-5 rounded-xl border border-surface-variant/30 shadow-sm flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[20px]">feed</span>
                    <h2 class="font-title-md text-base text-on-surface font-semibold">Publikasi Terkini</h2>
                </div>
                <a href="{{ route('bkk.admin.berita.index') }}" class="text-xs text-primary font-semibold hover:underline flex items-center gap-0.5">
                    <span>Lihat Semua</span>
                    <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-surface-variant/40 text-on-surface-variant font-semibold">
                            <th class="py-2.5 px-3">Artikel</th>
                            <th class="py-2.5 px-3">Kategori</th>
                            <th class="py-2.5 px-3">Status</th>
                            <th class="py-2.5 px-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-variant/30">
                        @forelse($recentBeritas as $b)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="py-3 px-3">
                                    <div class="flex items-center gap-3">
                                        @if($b->gambar_sampul)
                                            <img src="{{ $b->gambar_sampul }}" alt="{{ $b->judul }}" class="w-10 h-10 rounded-lg object-cover shrink-0"/>
                                        @else
                                            <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant shrink-0">
                                                <span class="material-symbols-outlined text-[18px]">image</span>
                                            </div>
                                        @endif
                                        <div class="flex flex-col min-w-0">
                                            <a href="{{ route('bkk.admin.berita.edit', $b->id) }}" class="font-semibold text-on-surface hover:text-primary transition-colors truncate max-w-xs md:max-w-md">
                                                {{ $b->judul }}
                                            </a>
                                            <span class="text-[10px] text-on-surface-variant/80">
                                                {{ $b->penulis_nama }} • {{ $b->formatted_date }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-3 whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-surface-container text-on-surface">
                                        {{ $b->kategori->nama ?? '-' }}
                                    </span>
                                </td>
                                <td class="py-3 px-3 whitespace-nowrap">
                                    @if($b->status === 'PUBLISHED')
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800">Terbit</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-100 text-amber-800">Draf</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('bkk.berita.detail', $b->slug) }}" target="_blank" class="p-1.5 rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors" title="Lihat di Web">
                                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                                        </a>
                                        <a href="{{ route('bkk.admin.berita.edit', $b->id) }}" class="p-1.5 rounded-lg text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors" title="Edit">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-on-surface-variant">
                                    Belum ada data berita.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 1 Col: Authenticated User Info (VERIFY_MIDDLEWARE) -->
        <div class="bg-surface-container-lowest p-5 rounded-xl border border-surface-variant/30 shadow-sm flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[20px]">badge</span>
                <h2 class="font-title-md text-base text-on-surface font-semibold">Profil Otentikasi</h2>
            </div>
            
            <div class="flex flex-col items-center p-4 rounded-xl bg-surface-container-low text-center">
                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl mb-3 shadow-md">
                    {{ strtoupper(substr($authUser['nama_lengkap'] ?? $authUser['username'] ?? 'A', 0, 1)) }}
                </div>
                <h3 class="font-bold text-sm text-on-surface">
                    {{ $authUser['nama_lengkap'] ?? $authUser['username'] ?? 'Administrator' }}
                </h3>
                <span class="text-xs text-primary font-semibold mt-0.5">
                    {{ $authUser['role'] ?? 'ADMIN' }}
                </span>
                <span class="text-[11px] text-on-surface-variant mt-1">
                    {{ $authUser['nomor_induk'] ?? 'ADM-2026-001' }}
                </span>
            </div>

            <div class="flex flex-col gap-2 text-xs">
                <div class="flex justify-between py-1.5 border-b border-surface-variant/30">
                    <span class="text-on-surface-variant">Username</span>
                    <span class="font-medium text-on-surface">{{ $authUser['username'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-surface-variant/30">
                    <span class="text-on-surface-variant">Email</span>
                    <span class="font-medium text-on-surface">{{ $authUser['email'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-surface-variant/30">
                    <span class="text-on-surface-variant">Status Akun</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800">
                        {{ ($authUser['status_aktif'] ?? true) ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
                <div class="flex justify-between py-1.5">
                    <span class="text-on-surface-variant">Auth Layer</span>
                    <span class="font-medium text-on-surface">VerifyAuthToken</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
