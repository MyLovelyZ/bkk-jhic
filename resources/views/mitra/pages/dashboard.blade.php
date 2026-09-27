@extends('mitra.master')

@section('title', 'Dashboard Mitra IDUKA - PT Solusi Teknologi Nusantara')

@section('content')
<div class="space-y-6">
    <!-- Top Welcome Banner with IDUKA Verified Badge -->
    <div class="google-card p-6 bg-gradient-to-r from-navy via-navy-light to-navy text-white relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-white/90 text-xs font-medium mb-3 backdrop-blur-sm border border-white/15">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>Portal Resmi Rekrutmen Mitra IDUKA</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-headline font-bold text-white tracking-tight">
                    Selamat Datang, {{ $profile['nama_perusahaan'] }}
                </h1>
                <p class="text-white/80 text-sm mt-1 max-w-2xl leading-relaxed">
                    Kelola rekrutmen lulusan, lowongan Praktik Kerja Lapangan (PKL), dan tinjau berkas CV siswa & alumni SMK Plus Pelita Nusantara secara terpusat.
                </p>
                <div class="mt-4 flex flex-wrap items-center gap-3 text-xs text-white/70">
                    <span class="inline-flex items-center gap-1.5"><i data-lucide="file-badge" class="w-3.5 h-3.5 text-emerald-400"></i> NPWP: {{ $profile['npwp'] }}</span>
                    <span class="hidden sm:inline">•</span>
                    <span class="inline-flex items-center gap-1.5"><i data-lucide="user-check" class="w-3.5 h-3.5 text-white/90"></i> PIC: {{ $profile['pic_name'] }}</span>
                    <span class="hidden sm:inline">•</span>
                    <span class="inline-flex items-center gap-1.5"><i data-lucide="calendar" class="w-3.5 h-3.5 text-white/90"></i> Masa MoU: 2025 - 2028</span>
                </div>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('bkk.mitra.lowongan.create') }}" class="px-5 py-2.5 rounded-full bg-maroon hover:bg-maroon-dark text-white font-semibold text-sm shadow-md transition-all flex items-center gap-2">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Pasang Lowongan</span>
                </a>
                <a href="{{ route('bkk.mitra.lowongan.index') }}" class="px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-medium text-sm border border-white/20 transition-all flex items-center gap-2">
                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                    <span>Daftar Lowongan</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Metric Cards (Google Style) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Metric 1: Lowongan Aktif -->
        <div class="google-card p-5">
            <div class="flex items-center justify-between text-muted mb-2">
                <span class="text-xs font-semibold uppercase tracking-wider">Lowongan Aktif</span>
                <span class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                </span>
            </div>
            <div class="text-3xl font-headline font-bold text-navy">{{ $metrics['lowongan_aktif'] }}</div>
            <div class="text-[11px] text-muted mt-1 flex items-center gap-1">
                <span class="text-emerald-600 font-semibold">Tersedia</span> dari {{ $metrics['total_lowongan'] }} total postingan
            </div>
        </div>

        <!-- Metric 2: Total Pelamar Masuk -->
        <div class="google-card p-5">
            <div class="flex items-center justify-between text-muted mb-2">
                <span class="text-xs font-semibold uppercase tracking-wider">Total Pelamar</span>
                <span class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="users" class="w-4 h-4"></i>
                </span>
            </div>
            <div class="text-3xl font-headline font-bold text-navy">{{ $metrics['total_pelamar'] }}</div>
            <div class="text-[11px] text-muted mt-1 flex items-center gap-1">
                <span class="text-purple-600 font-semibold">Siswa & Alumni</span> terdaftar
            </div>
        </div>

        <!-- Metric 3: Tahap Wawancara / Dipanggil -->
        <div class="google-card p-5">
            <div class="flex items-center justify-between text-muted mb-2">
                <span class="text-xs font-semibold uppercase tracking-wider">Tahap Interview</span>
                <span class="w-8 h-8 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="calendar-check" class="w-4 h-4"></i>
                </span>
            </div>
            <div class="text-3xl font-headline font-bold text-navy">{{ $metrics['pelamar_interview'] }}</div>
            <div class="text-[11px] text-muted mt-1 flex items-center gap-1">
                <span class="text-amber-600 font-semibold">Jadwal seleksi</span> aktif
            </div>
        </div>

        <!-- Metric 4: Kandidat Diterima -->
        <div class="google-card p-5">
            <div class="flex items-center justify-between text-muted mb-2">
                <span class="text-xs font-semibold uppercase tracking-wider">Kandidat Diterima</span>
                <span class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="award" class="w-4 h-4"></i>
                </span>
            </div>
            <div class="text-3xl font-headline font-bold text-navy">{{ $metrics['pelamar_diterima'] }}</div>
            <div class="text-[11px] text-muted mt-1 flex items-center gap-1">
                <span class="text-emerald-600 font-semibold">{{ $metrics['siswa_aktif_pkl'] }} Siswa PKL</span> penempatan aktif
            </div>
        </div>
    </div>

    <!-- Main Content Grid: Active Vacancies & Recent Applicants -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left: Lowongan Unggulan Mitra (2 Cols) -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-headline font-bold text-navy">Lowongan Ditawarkan</h2>
                    <p class="text-xs text-muted">Daftar posisi magang PKL dan lowongan karir aktif</p>
                </div>
                <a href="{{ route('bkk.mitra.lowongan.index') }}" class="text-xs font-semibold text-maroon hover:underline flex items-center gap-1">
                    Lihat Semua Lowongan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="space-y-3">
                @foreach($vacancies as $job)
                    <div class="google-card p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="space-y-1.5 flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold {{ $job['tipe'] === 'PKL' ? 'bg-indigo-50 text-indigo-700 border border-indigo-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                    {{ $job['tipe_badge'] }}
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium {{ $job['status'] === 'Aktif' ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">
                                    Status: {{ $job['status'] }}
                                </span>
                                <span class="text-xs text-muted flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i> {{ $job['lokasi'] }}
                                </span>
                            </div>

                            <h3 class="font-headline font-bold text-navy text-base hover:text-maroon transition-colors truncate">
                                <a href="{{ route('bkk.mitra.pelamar.index', $job['id']) }}">
                                    {{ $job['title'] }}
                                </a>
                            </h3>

                            <div class="text-xs text-muted flex flex-wrap items-center gap-x-4 gap-y-1">
                                <span>Jurusan: <strong class="text-navy font-semibold">{{ $job['jurusan'] }}</strong></span>
                                <span>Batas: <strong class="text-navy font-semibold">{{ \Carbon\Carbon::parse($job['deadline'])->translatedFormat('d M Y') }}</strong></span>
                            </div>
                        </div>

                        <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-center gap-2 shrink-0 border-t sm:border-t-0 pt-3 sm:pt-0 border-line">
                            <div class="text-right">
                                <span class="text-sm font-bold text-navy">{{ $job['pelamar_count'] }}</span>
                                <span class="text-xs text-muted">Pelamar</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('bkk.mitra.pelamar.index', $job['id']) }}" class="px-3 py-1.5 rounded-full bg-navy text-white hover:bg-navy-light text-xs font-medium transition-colors">
                                    Review CV
                                </a>
                                <a href="{{ route('bkk.mitra.lowongan.edit', $job['id']) }}" class="p-1.5 rounded-full hover:bg-canvas text-muted hover:text-navy transition-colors" title="Edit Lowongan">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right: Recent Applicants Pipeline (1 Col) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-headline font-bold text-navy">Pelamar Terbaru</h2>
                    <p class="text-xs text-muted">Aktivitas lamaran masuk</p>
                </div>
            </div>

            <div class="google-card p-4 space-y-3">
                @foreach($recentApplicants as $applicant)
                    @php
                        $badgeColor = match($applicant['status']) {
                            'Interview' => 'bg-amber-50 text-amber-800 border-amber-200',
                            'Dipanggil' => 'bg-blue-50 text-blue-800 border-blue-200',
                            'Diterima' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
                            'Ditolak' => 'bg-red-50 text-red-800 border-red-200',
                            default => 'bg-gray-100 text-gray-700 border-gray-200',
                        };
                    @endphp
                    <div class="p-3 rounded-xl bg-canvas hover:bg-[#f1f3f4] transition-all border border-line/60">
                        <div class="flex items-start justify-between gap-2">
                            <div class="min-w-0">
                                <div class="font-headline font-bold text-sm text-navy truncate">
                                    {{ $applicant['nama'] }}
                                </div>
                                <div class="text-[11px] text-muted truncate">
                                    {{ $applicant['status_pendidikan'] }}
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold border {{ $badgeColor }}">
                                {{ $applicant['status'] }}
                            </span>
                        </div>

                        <div class="mt-2 text-[11px] text-navy/80 truncate">
                            Posisi: <span class="font-medium text-navy">{{ $applicant['lowongan_title'] }}</span>
                        </div>

                        <div class="mt-3 pt-2 border-t border-line flex items-center justify-between text-xs">
                            <span class="text-emerald-700 font-semibold text-[11px] flex items-center gap-1">
                                <i data-lucide="sparkles" class="w-3 h-3"></i> Skor CV: {{ $applicant['cv_score'] }}%
                            </span>
                            <a href="{{ route('bkk.mitra.pelamar.show', [$applicant['lowongan_id'], $applicant['id']]) }}" class="text-xs font-semibold text-maroon hover:underline">
                                Lihat Berkas
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="pt-2 text-center">
                    <a href="{{ route('bkk.mitra.lowongan.index') }}" class="text-xs font-semibold text-navy hover:text-maroon transition-colors block py-1.5 rounded-lg hover:bg-canvas">
                        Buka Seluruh Pelamar per Lowongan →
                    </a>
                </div>
            </div>

            <!-- Help & Coordination Box -->
            <div class="google-card p-5 bg-gradient-to-br from-white to-canvas border border-line">
                <div class="flex items-start gap-3">
                    <span class="w-9 h-9 rounded-xl bg-maroon/10 text-maroon flex items-center justify-center shrink-0">
                        <i data-lucide="life-buoy" class="w-5 h-5"></i>
                    </span>
                    <div>
                        <h4 class="font-headline font-bold text-navy text-sm">Butuh Penyelarasan Kualifikasi?</h4>
                        <p class="text-xs text-muted mt-1 leading-relaxed">
                            Hubungi Koordinator BKK & Hubungan Industri SMK Plus Pelita Nusantara untuk verifikasi sertifikasi atau jadwal walk-in interview massal di kampus sekolah.
                        </p>
                        <div class="mt-3 flex items-center gap-2 text-xs">
                            <a href="mailto:kemitraan@smkpenus.sch.id" class="text-maroon font-semibold hover:underline flex items-center gap-1">
                                <i data-lucide="mail" class="w-3.5 h-3.5"></i> kemitraan@smkpenus.sch.id
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
