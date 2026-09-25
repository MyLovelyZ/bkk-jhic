<!-- Sidebar Overlay for mobile -->
<div id="adminSidebarBackdrop" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleAdminSidebar()"></div>

<aside id="adminSidebar" class="w-64 shrink-0 fixed lg:static top-16 bottom-0 left-0 z-40 bg-surface-container-lowest lg:bg-transparent border-r lg:border-r-0 border-surface-variant/40 p-4 lg:p-0 flex flex-col gap-6 overflow-y-auto transform -translate-x-full lg:translate-x-0 transition-transform duration-200">
    <!-- Admin Navigation Container -->
    <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-surface-variant/30 flex flex-col gap-6">
        <!-- Main Navigation -->
        <div class="flex flex-col gap-1">
            <span class="text-[11px] font-bold text-on-surface-variant/70 uppercase tracking-wider px-3 mb-1">
                Utama
            </span>
            <a href="{{ route('bkk.admin.index') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('bkk.admin.index') ? 'bg-primary text-on-primary font-semibold shadow-sm' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-[20px]">dashboard</span>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- Modul Berita & Agenda (Fokus Aktif) -->
        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between px-3 mb-1">
                <span class="text-[11px] font-bold text-primary uppercase tracking-wider">
                    Modul Berita
                </span>
                <span class="text-[10px] bg-primary/10 text-primary font-bold px-1.5 py-0.5 rounded-full">Aktif</span>
            </div>
            
            <a href="{{ route('bkk.admin.berita.index') }}" 
               class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('bkk.admin.berita.index') ? 'bg-primary text-on-primary font-semibold shadow-sm' : 'text-on-surface hover:bg-surface-container' }}">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">newspaper</span>
                    <span>Kelola Berita</span>
                </div>
            </a>

            <a href="{{ route('bkk.admin.berita.create') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('bkk.admin.berita.create') ? 'bg-primary text-on-primary font-semibold shadow-sm' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-[20px]">add_box</span>
                <span>Tulis Berita Baru</span>
            </a>
        </div>

        <!-- Fitur Sesuai SITEMAP.md -->
        <div class="flex flex-col gap-1">
            <span class="text-[11px] font-bold text-on-surface-variant/70 uppercase tracking-wider px-3 mb-1">
                Manajemen BKK
            </span>
            <div class="flex items-center justify-between px-3 py-2 text-sm text-on-surface-variant/60 rounded-lg hover:bg-surface-container/50 cursor-not-allowed" title="Segera Hadir">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">analytics</span>
                    <span>Tracer Study</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant font-semibold">Sitemap</span>
            </div>

            <div class="flex items-center justify-between px-3 py-2 text-sm text-on-surface-variant/60 rounded-lg hover:bg-surface-container/50 cursor-not-allowed" title="Segera Hadir">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">apartment</span>
                    <span>Mitra IDUKA</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant font-semibold">Sitemap</span>
            </div>

            <div class="flex items-center justify-between px-3 py-2 text-sm text-on-surface-variant/60 rounded-lg hover:bg-surface-container/50 cursor-not-allowed" title="Segera Hadir">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">work</span>
                    <span>Lowongan Kerja</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant font-semibold">Sitemap</span>
            </div>

            <div class="flex items-center justify-between px-3 py-2 text-sm text-on-surface-variant/60 rounded-lg hover:bg-surface-container/50 cursor-not-allowed" title="Segera Hadir">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">monitoring</span>
                    <span>Monitoring PKL</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant font-semibold">Sitemap</span>
            </div>

            <div class="flex items-center justify-between px-3 py-2 text-sm text-on-surface-variant/60 rounded-lg hover:bg-surface-container/50 cursor-not-allowed" title="Segera Hadir">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">fact_check</span>
                    <span>Review Laporan</span>
                </div>
                <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant font-semibold">Sitemap</span>
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
