@php
    $navLinks = [
        [
            'label' => 'Ringkasan Dashboard',
            'route' => route('bkk.mitra.dashboard'),
            'icon' => 'layout-dashboard',
            'active' => request()->routeIs('bkk.mitra.dashboard'),
        ],
        [
            'label' => 'Daftar Lowongan',
            'route' => route('bkk.mitra.lowongan.index'),
            'icon' => 'briefcase',
            'active' => request()->routeIs('bkk.mitra.lowongan.index') || request()->routeIs('bkk.mitra.lowongan.edit') || request()->routeIs('bkk.mitra.pelamar.*'),
        ],
        [
            'label' => 'Bikin Lowongan Baru',
            'route' => route('bkk.mitra.lowongan.create'),
            'icon' => 'plus-circle',
            'active' => request()->routeIs('bkk.mitra.lowongan.create'),
        ],
    ];
@endphp

<!-- Mobile Backdrop Overlay -->
<div id="sidebar-backdrop" class="fixed inset-0 bg-navy/40 z-40 lg:hidden hidden transition-opacity"></div>

<!-- Sidebar Container -->
<aside id="mitra-sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-line flex flex-col justify-between transform -translate-x-full lg:translate-x-0 lg:static lg:z-auto transition-transform duration-200 ease-in-out">
    <div class="p-5 flex-1 overflow-y-auto">
        <!-- Close Button (Mobile Only) -->
        <div class="flex items-center justify-between pb-4 lg:hidden border-b border-line mb-4">
            <span class="font-headline font-bold text-navy text-sm">MENU MITRA IDUKA</span>
            <button id="mobile-sidebar-close" class="p-1.5 rounded-full hover:bg-canvas text-muted">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Section: Menu Utama -->
        <div class="mb-6">
            <div class="text-[11px] font-bold text-muted uppercase tracking-wider px-3 mb-2">
                Akses Rekrutmen
            </div>
            <nav class="space-y-1">
                @foreach($navLinks as $item)
                    <a href="{{ $item['route'] }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-full text-sm transition-colors {{ $item['active'] ? 'bg-navy text-white font-semibold shadow-sm' : 'text-navy hover:bg-canvas font-medium' }}">
                        <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4 {{ $item['active'] ? 'text-white' : 'text-muted' }}"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Section: Layanan Sekolah & Panduan -->
        <div class="mb-6">
            <div class="text-[11px] font-bold text-muted uppercase tracking-wider px-3 mb-2">
                Layanan IDUKA & MoU
            </div>
            <nav class="space-y-1">
                <a href="{{ url('/bkk/kerja-sama') }}" target="_blank"
                   class="flex items-center justify-between px-4 py-2.5 rounded-full text-sm text-navy hover:bg-canvas font-medium transition-colors">
                    <div class="flex items-center gap-3">
                        <i data-lucide="handshake" class="w-4 h-4 text-muted"></i>
                        <span>Panduan Kerja Sama</span>
                    </div>
                    <i data-lucide="external-link" class="w-3.5 h-3.5 text-muted"></i>
                </a>
                <a href="{{ url('/bkk/lowongan') }}" target="_blank"
                   class="flex items-center justify-between px-4 py-2.5 rounded-full text-sm text-navy hover:bg-canvas font-medium transition-colors">
                    <div class="flex items-center gap-3">
                        <i data-lucide="globe" class="w-4 h-4 text-muted"></i>
                        <span>Katalog Publik Siswa</span>
                    </div>
                    <i data-lucide="external-link" class="w-3.5 h-3.5 text-muted"></i>
                </a>
            </nav>
        </div>
    </div>

    <!-- Bottom IDUKA Card & Partnership Status -->
    <div class="p-4 border-t border-line bg-canvas/60">
        <div class="p-3.5 rounded-2xl bg-white border border-line shadow-xs">
            <div class="flex items-center gap-2 mb-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-[11px] font-bold text-navy uppercase tracking-wide">Status Kemitraan</span>
            </div>
            <div class="text-xs font-semibold text-navy truncate">
                {{ $profile['nama_perusahaan'] ?? 'PT Mitra Industri' }}
            </div>
            <div class="text-[11px] text-muted mt-1 leading-snug">
                {{ $profile['status_kemitraan'] ?? 'MoU IDUKA Terverifikasi' }}
            </div>
            <div class="mt-3 pt-2.5 border-t border-line flex items-center justify-between text-[11px] text-muted">
                <span>PIC: {{ $profile['pic_name'] ?? 'HR Lead' }}</span>
                <span class="text-maroon font-semibold">Aktif</span>
            </div>
        </div>
    </div>
</aside>

<script>
    // Responsive Mobile Sidebar Toggle
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('mobile-sidebar-toggle');
        const closeBtn = document.getElementById('mobile-sidebar-close');
        const sidebar = document.getElementById('mitra-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        function openSidebar() {
            sidebar?.classList.remove('-translate-x-full');
            backdrop?.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar?.classList.add('-translate-x-full');
            backdrop?.classList.add('hidden');
        }

        toggleBtn?.addEventListener('click', openSidebar);
        closeBtn?.addEventListener('click', closeSidebar);
        backdrop?.addEventListener('click', closeSidebar);
    });
</script>
