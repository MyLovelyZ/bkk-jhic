@php
    $role = strtoupper($authUser['role'] ?? 'ADMIN');
    $nip = $authUser['nomor_induk'] ?? 'ADM-2026-001';
@endphp

<!-- Mobile Sidebar Backdrop -->
<div id="adminSidebarBackdrop" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleAdminSidebar()"></div>

<!-- Main Aside Navigation: Fixed on mobile, Sticky on desktop locked to viewport height -->
<aside id="adminSidebar" class="w-[272px] shrink-0 fixed lg:sticky top-16 h-[calc(100vh-4rem)] left-0 z-40 bg-[#f8f9fa] border-r border-line flex flex-col justify-between transform -translate-x-full lg:translate-x-0 transition-transform duration-200">
    <!-- Top Scrollable Nav Area -->
    <div class="flex-1 overflow-y-auto p-3 space-y-4">
        <!-- Top Action Card: Tulis Berita Baru -->
        <div class="px-1">
            <a href="{{ route('bkk.admin.berita.create') }}" class="flex items-center gap-3 h-14 rounded-2xl bg-white border border-line shadow-sm hover:shadow-md transition-all px-4 group">
                <div class="w-8 h-8 rounded-xl bg-maroon/10 grid place-items-center text-maroon group-hover:bg-maroon group-hover:text-white transition-colors">
                    <i data-lucide="pen-tool" class="w-4 h-4"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-semibold text-navy leading-tight">Tulis Berita Baru</span>
                    <span class="text-[11px] text-muted">Publikasi warta & agenda</span>
                </div>
            </a>
        </div>

        <!-- Main Navigation Group -->
        <nav class="space-y-1">
            <div class="px-4 pt-2 pb-1 text-[11px] font-bold uppercase tracking-wider text-muted/80">
                Menu Utama
            </div>

            <a href="{{ route('bkk.admin.index') }}"
               class="group flex items-center gap-3.5 h-11 px-4 rounded-full text-sm font-medium transition-colors {{ (request()->routeIs('bkk.admin.index') || request()->routeIs('bkk.dashboard.index')) ? 'bg-navy text-white shadow-sm' : 'text-navy hover:bg-navy/5' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 shrink-0 {{ (request()->routeIs('bkk.admin.index') || request()->routeIs('bkk.dashboard.index')) ? 'text-white' : 'text-muted group-hover:text-navy' }}"></i>
                <span class="truncate">Dashboard</span>
            </a>

            <a href="{{ route('bkk.admin.berita.index') }}"
               class="group flex items-center gap-3.5 h-11 px-4 rounded-full text-sm font-medium transition-colors {{ request()->routeIs('*berita.index*') ? 'bg-navy text-white shadow-sm' : 'text-navy hover:bg-navy/5' }}">
                <i data-lucide="newspaper" class="w-4 h-4 shrink-0 {{ request()->routeIs('*berita.index*') ? 'text-white' : 'text-muted group-hover:text-navy' }}"></i>
                <span class="truncate">Kelola Berita</span>
                <span class="ml-auto text-[10px] font-bold rounded-full px-2 py-0.5 {{ request()->routeIs('*berita.index*') ? 'bg-white/20 text-white' : 'bg-emerald-100 text-emerald-800' }}">
                    Live
                </span>
            </a>

            <a href="{{ route('bkk.admin.berita.create') }}"
               class="group flex items-center gap-3.5 h-11 px-4 rounded-full text-sm font-medium transition-colors {{ request()->routeIs('*berita.create*') ? 'bg-navy text-white shadow-sm' : 'text-navy hover:bg-navy/5' }}">
                <i data-lucide="plus-circle" class="w-4 h-4 shrink-0 {{ request()->routeIs('*berita.create*') ? 'text-white' : 'text-muted group-hover:text-navy' }}"></i>
                <span class="truncate">Tulis Berita</span>
            </a>
        </nav>

        <!-- Modul Manajemen BKK Sesuai SITEMAP.md -->
        <nav class="space-y-1 pt-2">
            <div class="px-4 pb-1 text-[11px] font-bold uppercase tracking-wider text-muted/80 flex items-center gap-2">
                <span>Manajemen BKK</span>
                <span class="h-px flex-1 bg-line"></span>
            </div>

            <div class="flex items-center justify-between h-10 px-4 rounded-full text-xs font-medium text-muted/70 hover:bg-navy/5 cursor-not-allowed select-none transition-colors" title="Segera Hadir">
                <div class="flex items-center gap-3 truncate">
                    <i data-lucide="graduation-cap" class="w-4 h-4 shrink-0 text-muted/60"></i>
                    <span class="truncate">Tracer Study</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-line/60 text-muted font-semibold shrink-0">Sitemap</span>
            </div>

            <div class="flex items-center justify-between h-10 px-4 rounded-full text-xs font-medium text-muted/70 hover:bg-navy/5 cursor-not-allowed select-none transition-colors" title="Segera Hadir">
                <div class="flex items-center gap-3 truncate">
                    <i data-lucide="building-2" class="w-4 h-4 shrink-0 text-muted/60"></i>
                    <span class="truncate">Mitra IDUKA</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-line/60 text-muted font-semibold shrink-0">Sitemap</span>
            </div>

            <div class="flex items-center justify-between h-10 px-4 rounded-full text-xs font-medium text-muted/70 hover:bg-navy/5 cursor-not-allowed select-none transition-colors" title="Segera Hadir">
                <div class="flex items-center gap-3 truncate">
                    <i data-lucide="briefcase" class="w-4 h-4 shrink-0 text-muted/60"></i>
                    <span class="truncate">Lowongan Kerja</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-line/60 text-muted font-semibold shrink-0">Sitemap</span>
            </div>

            <div class="flex items-center justify-between h-10 px-4 rounded-full text-xs font-medium text-muted/70 hover:bg-navy/5 cursor-not-allowed select-none transition-colors" title="Segera Hadir">
                <div class="flex items-center gap-3 truncate">
                    <i data-lucide="activity" class="w-4 h-4 shrink-0 text-muted/60"></i>
                    <span class="truncate">Monitoring PKL</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-line/60 text-muted font-semibold shrink-0">Sitemap</span>
            </div>

            <div class="flex items-center justify-between h-10 px-4 rounded-full text-xs font-medium text-muted/70 hover:bg-navy/5 cursor-not-allowed select-none transition-colors" title="Segera Hadir">
                <div class="flex items-center gap-3 truncate">
                    <i data-lucide="clipboard-check" class="w-4 h-4 shrink-0 text-muted/60"></i>
                    <span class="truncate">Review Laporan</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-line/60 text-muted font-semibold shrink-0">Sitemap</span>
            </div>
        </nav>

        <!-- Integrasi Portal & Publik -->
        <nav class="space-y-1 pt-2">
            <div class="px-4 pb-1 text-[11px] font-bold uppercase tracking-wider text-muted/80 flex items-center gap-2">
                <span>Portal & Integrasi</span>
                <span class="h-px flex-1 bg-line"></span>
            </div>

            <a href="{{ route('bkk.me.index') }}"
               class="group flex items-center gap-3.5 h-11 px-4 rounded-full text-sm font-medium transition-colors text-navy hover:bg-navy/5">
                <i data-lucide="user-check" class="w-4 h-4 shrink-0 text-muted group-hover:text-navy"></i>
                <span class="truncate">Portal Siswa/Alumni</span>
            </a>

            <a href="{{ url('/bkk') }}" target="_blank"
               class="group flex items-center gap-3.5 h-11 px-4 rounded-full text-sm font-medium transition-colors text-navy hover:bg-navy/5">
                <i data-lucide="globe" class="w-4 h-4 shrink-0 text-muted group-hover:text-navy"></i>
                <span class="truncate">Web Publik BKK</span>
            </a>
        </nav>
    </div>

    <!-- Pinned Bottom Status Card -->
    <div class="p-3 pt-0 shrink-0">
        <div class="p-4 rounded-2xl bg-navy text-white relative overflow-hidden shadow-sm">
            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-maroon/60 blur-sm pointer-events-none"></div>
            <div class="relative">
                <div class="text-xs text-white/70 font-medium">Sesi Administrator</div>
                <div class="text-sm font-semibold mt-0.5 leading-snug">SMK Plus Pelita Nusantara</div>
                <div class="text-[11px] text-white/60 mt-2 font-mono">
                    {{ $role }} · ID {{ $nip }}
                </div>
            </div>
        </div>
    </div>
</aside>

<script>
    function toggleAdminSidebar() {
        const sidebar = document.getElementById('adminSidebar');
        const backdrop = document.getElementById('adminSidebarBackdrop');
        if (!sidebar || !backdrop) return;

        const isHidden = sidebar.classList.contains('-translate-x-full');
        if (isHidden) {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        }
    }
</script>
