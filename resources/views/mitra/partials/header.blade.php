<header class="sticky top-0 z-40 bg-white border-b border-line shadow-[0_1px_3px_rgba(0,0,0,0.03)] h-16 px-4 lg:px-8 flex items-center justify-between gap-4">
    <!-- Left: Mobile Menu Toggle & Brand Portal Badge -->
    <div class="flex items-center gap-3 lg:gap-6 min-w-0">
        <button id="mobile-sidebar-toggle" class="p-2 -ml-2 rounded-full hover:bg-canvas text-navy lg:hidden focus:outline-none transition-colors" aria-label="Buka Menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>

        <a href="{{ route('bkk.mitra.dashboard') }}" class="flex items-center gap-2.5 shrink-0 group">
            <div class="w-9 h-9 rounded-xl bg-navy text-white flex items-center justify-center font-bold text-sm shadow-sm group-hover:bg-maroon transition-colors">
                BKK
            </div>
            <div class="hidden sm:block leading-tight">
                <div class="flex items-center gap-1.5">
                    <span class="font-headline font-bold text-navy text-sm">PORTAL MITRA IDUKA</span>
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        <i data-lucide="shield-check" class="w-3 h-3 mr-0.5"></i> Terverifikasi
                    </span>
                </div>
                <div class="text-[11px] text-muted font-normal">SMK Plus Pelita Nusantara</div>
            </div>
        </a>
    </div>

    <!-- Center: Google-Style Global Search Bar -->
    <div class="flex-1 max-w-xl mx-2 hidden md:block">
        <form action="{{ route('bkk.mitra.lowongan.index') }}" method="GET" class="relative">
            <div class="relative flex items-center">
                <span class="absolute left-3.5 text-muted pointer-events-none">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </span>
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari lowongan, posisi, atau kualifikasi jurusan..."
                    class="w-full bg-[#f1f3f4] text-navy placeholder:text-[#5f6368] text-sm rounded-full pl-10 pr-4 py-2 border border-transparent hover:bg-[#e8eaed] focus:bg-white focus:border-navy focus:outline-none focus:ring-1 focus:ring-navy transition-all"
                />
            </div>
        </form>
    </div>

    <!-- Right: Quick Action, Notifications, & Company Profile Chip -->
    <div class="flex items-center gap-2 sm:gap-3 shrink-0">
        <!-- CTA: Pasang Lowongan Baru -->
        <a href="{{ route('bkk.mitra.lowongan.create') }}" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-maroon text-white hover:bg-maroon-dark text-xs font-semibold shadow-sm transition-all">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            <span>Pasang Lowongan</span>
        </a>

        <!-- Portal Publik Link -->
        <a href="{{ url('/bkk') }}" target="_blank" title="Lihat Portal Publik BKK" class="p-2 rounded-full text-muted hover:text-navy hover:bg-canvas transition-colors">
            <i data-lucide="external-link" class="w-5 h-5"></i>
        </a>

        <!-- Notifications -->
        <div class="relative" id="notification-wrapper">
            <button id="notification-btn" class="relative p-2 rounded-full text-muted hover:text-navy hover:bg-canvas transition-colors">
                <i data-lucide="bell" class="w-5 h-5"></i>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-maroon ring-2 ring-white"></span>
            </button>
            <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-line p-3 z-50 fade-up">
                <div class="flex items-center justify-between pb-2 border-b border-line px-1">
                    <span class="text-xs font-bold text-navy uppercase tracking-wider">Notifikasi IDUKA</span>
                    <span class="text-[11px] text-maroon font-semibold cursor-pointer hover:underline">Tandai Dibaca</span>
                </div>
                <div class="space-y-2 mt-2">
                    <div class="p-2 rounded-xl bg-canvas hover:bg-[#f1f3f4] transition-colors cursor-pointer text-xs">
                        <div class="font-semibold text-navy">Pelamar Baru: Ahmad Rizky</div>
                        <div class="text-[11px] text-muted">Melamar pada Internship Web & Backend Developer (PKL)</div>
                        <div class="text-[10px] text-maroon mt-1">10 menit yang lalu</div>
                    </div>
                    <div class="p-2 rounded-xl hover:bg-canvas transition-colors cursor-pointer text-xs">
                        <div class="font-semibold text-navy">Penyelarasan Kurikulum 2026/2027</div>
                        <div class="text-[11px] text-muted">Undangan rapat koordinasi Hubin & BKK SMK Penus</div>
                        <div class="text-[10px] text-muted mt-1">1 hari yang lalu</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-6 w-px bg-line mx-0.5 hidden sm:block"></div>

        <!-- Google-style User Profile Chip -->
        <div class="flex items-center gap-2.5 pl-1 py-1 rounded-full border border-line bg-canvas hover:bg-white transition-all cursor-default">
            <div class="w-8 h-8 rounded-full bg-navy text-white flex items-center justify-center font-bold text-xs shadow-inner">
                {{ $profile['singkatan'] ?? 'STN' }}
            </div>
            <div class="hidden md:block pr-3 leading-tight">
                <div class="text-xs font-semibold text-navy truncate max-w-[150px]">
                    {{ $profile['nama_perusahaan'] ?? 'PT Mitra Industri' }}
                </div>
                <div class="text-[10px] text-muted truncate">
                    NPWP: {{ $profile['npwp'] ?? '01.234.567.8-091.000' }}
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle Notification Dropdown
    document.addEventListener('DOMContentLoaded', () => {
        const notifBtn = document.getElementById('notification-btn');
        const notifDropdown = document.getElementById('notification-dropdown');
        if (notifBtn && notifDropdown) {
            notifBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                notifDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', (e) => {
                if (!notifDropdown.contains(e.target) && e.target !== notifBtn) {
                    notifDropdown.classList.add('hidden');
                }
            });
        }
    });
</script>
