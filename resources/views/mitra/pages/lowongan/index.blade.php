@extends('mitra.master')

@section('title', 'Daftar Lowongan Kerja & PKL - Mitra IDUKA')

@section('content')
<div class="space-y-6">
    <!-- Header Section with Breadcrumb & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-muted mb-1">
                <a href="{{ route('bkk.mitra.dashboard') }}" class="hover:text-navy">Dashboard</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                <span class="text-navy font-semibold">Lowongan Mitra</span>
            </div>
            <h1 class="text-2xl font-headline font-bold text-navy">
                Kelola Lowongan IDUKA
            </h1>
            <p class="text-xs text-muted mt-0.5">
                Pantau lowongan magang PKL dan rekrutmen kerja lulusan yang dipublikasikan oleh {{ $profile['nama_perusahaan'] }}.
            </p>
        </div>

        <a href="{{ route('bkk.mitra.lowongan.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full bg-maroon hover:bg-maroon-dark text-white font-semibold text-sm shadow-sm transition-all shrink-0">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            <span>Bikin Lowongan Baru</span>
        </a>
    </div>

    <!-- Search & Google-style Filter Chips -->
    <div class="google-card p-4 space-y-3">
        <form action="{{ route('bkk.mitra.lowongan.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
            <div class="relative flex-1">
                <i data-lucide="search" class="w-4 h-4 text-muted absolute left-3.5 top-3"></i>
                <input
                    type="text"
                    name="q"
                    value="{{ $search ?? '' }}"
                    placeholder="Cari berdasarkan judul posisi, jurusan, atau lokasi..."
                    class="w-full pl-10 pr-4 py-2 bg-canvas text-navy placeholder:text-muted text-sm rounded-full border border-line focus:bg-white focus:outline-none focus:ring-1 focus:ring-navy"
                />
            </div>

            <div class="flex items-center gap-2 overflow-x-auto pb-1 md:pb-0">
                <!-- Status Filter -->
                <select name="status" onchange="this.form.submit()" class="px-3.5 py-2 bg-canvas text-xs font-medium text-navy rounded-full border border-line focus:outline-none focus:ring-1 focus:ring-navy">
                    <option value="Semua" {{ ($statusFilter ?? 'Semua') === 'Semua' ? 'selected' : '' }}>Semua Status</option>
                    <option value="Aktif" {{ ($statusFilter ?? '') === 'Aktif' ? 'selected' : '' }}>Status: Aktif</option>
                    <option value="Ditutup" {{ ($statusFilter ?? '') === 'Ditutup' ? 'selected' : '' }}>Status: Ditutup</option>
                </select>

                <!-- Tipe Filter -->
                <select name="tipe" onchange="this.form.submit()" class="px-3.5 py-2 bg-canvas text-xs font-medium text-navy rounded-full border border-line focus:outline-none focus:ring-1 focus:ring-navy">
                    <option value="Semua" {{ ($tipeFilter ?? 'Semua') === 'Semua' ? 'selected' : '' }}>Semua Tipe</option>
                    <option value="PKL" {{ ($tipeFilter ?? '') === 'PKL' ? 'selected' : '' }}>Tipe: Magang PKL</option>
                    <option value="Kerja" {{ ($tipeFilter ?? '') === 'Kerja' ? 'selected' : '' }}>Tipe: Kerja Lulusan</option>
                </select>

                <button type="submit" class="px-4 py-2 bg-navy text-white text-xs font-semibold rounded-full hover:bg-navy-light transition-colors">
                    Filter
                </button>

                @if(!empty($search) || (!empty($statusFilter) && $statusFilter !== 'Semua') || (!empty($tipeFilter) && $tipeFilter !== 'Semua'))
                    <a href="{{ route('bkk.mitra.lowongan.index') }}" class="px-3 py-2 text-muted hover:text-navy text-xs font-medium">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Vacancies List -->
    @if(empty($vacancies))
        <div class="google-card p-12 text-center">
            <span class="w-12 h-12 rounded-full bg-canvas text-muted flex items-center justify-center mx-auto mb-3">
                <i data-lucide="inbox" class="w-6 h-6"></i>
            </span>
            <h3 class="font-headline font-bold text-navy text-base">Tidak ada lowongan yang sesuai kriteria</h3>
            <p class="text-xs text-muted mt-1 max-w-md mx-auto">
                Silakan ubah filter pencarian Anda atau buat lowongan baru untuk ditayangkan di portal BKK.
            </p>
            <div class="mt-4">
                <a href="{{ route('bkk.mitra.lowongan.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-navy text-white text-xs font-semibold">
                    <i data-lucide="plus" class="w-4 h-4"></i> Buat Lowongan Baru
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 gap-4">
            @foreach($vacancies as $job)
                <div class="google-card p-5 transition-all">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                        <!-- Left Info -->
                        <div class="space-y-2 flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold {{ $job['tipe'] === 'PKL' ? 'bg-indigo-50 text-indigo-700 border border-indigo-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                    {{ $job['tipe_badge'] }}
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium {{ $job['status'] === 'Aktif' ? 'bg-emerald-50 text-emerald-800' : 'bg-gray-100 text-gray-700' }}">
                                    ● {{ $job['status'] }}
                                </span>
                                <span class="text-xs text-muted">ID: <code class="font-mono text-[11px] text-navy">{{ $job['id'] }}</code></span>
                            </div>

                            <h2 class="text-lg font-headline font-bold text-navy hover:text-maroon transition-colors">
                                <a href="{{ route('bkk.mitra.pelamar.index', $job['id']) }}">
                                    {{ $job['title'] }}
                                </a>
                            </h2>

                            <p class="text-xs text-muted line-clamp-2 leading-relaxed">
                                {{ $job['deskripsi'] }}
                            </p>

                            <div class="flex flex-wrap items-center gap-x-5 gap-y-1 text-xs text-muted pt-1">
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="graduation-cap" class="w-3.5 h-3.5 text-navy"></i>
                                    Kualifikasi: <strong class="text-navy font-semibold">{{ $job['jurusan'] }}</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-navy"></i>
                                    {{ $job['lokasi'] }}
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="banknote" class="w-3.5 h-3.5 text-navy"></i>
                                    {{ $job['gaji'] }}
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="clock" class="w-3.5 h-3.5 text-maroon"></i>
                                    Batas: <strong class="text-navy font-semibold">{{ \Carbon\Carbon::parse($job['deadline'])->translatedFormat('d F Y') }}</strong>
                                </span>
                            </div>
                        </div>

                        <!-- Right Stats & Actions -->
                        <div class="flex lg:flex-col items-center lg:items-end justify-between lg:justify-center gap-3 shrink-0 border-t lg:border-t-0 pt-4 lg:pt-0 border-line">
                            <!-- Applicant counter pill -->
                            <div class="text-left lg:text-right">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-canvas border border-line text-xs">
                                    <i data-lucide="users" class="w-3.5 h-3.5 text-purple-600"></i>
                                    <span class="font-bold text-navy">{{ $job['pelamar_count'] }} Pelamar</span>
                                </div>
                                <div class="text-[11px] text-muted mt-1">
                                    Kuota: {{ $job['kuota'] }} orang
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-2">
                                <a href="{{ route('bkk.mitra.pelamar.index', $job['id']) }}" class="px-4 py-2 rounded-full bg-navy hover:bg-navy-light text-white text-xs font-semibold transition-colors flex items-center gap-1.5">
                                    <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                                    <span>Review CV ({{ $job['pelamar_count'] }})</span>
                                </a>

                                <a href="{{ route('bkk.mitra.lowongan.edit', $job['id']) }}" class="p-2 rounded-full border border-line hover:bg-canvas text-navy text-xs transition-colors" title="Edit Informasi Lowongan">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>

                                <form action="{{ route('bkk.mitra.lowongan.destroy', $job['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus / mengarsipkan lowongan ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-full border border-line hover:bg-red-50 text-red-600 text-xs transition-colors" title="Hapus / Tutup Lowongan">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
