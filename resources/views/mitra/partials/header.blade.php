<header class="sticky top-0 z-40 bg-white border-b border-line shadow-[0_1px_3px_rgba(0,0,0,0.03)] h-16 px-4 lg:px-8 flex items-center justify-between gap-4">
    <!-- Left: Mobile Menu Toggle & Brand Portal Badge -->
    <div class="flex items-center gap-3 lg:gap-6 min-w-0">
        <button id="mobile-sidebar-toggle" class="p-2 -ml-2 rounded-full hover:bg-canvas text-navy lg:hidden focus:outline-none transition-colors" aria-label="Buka Menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>

        <!-- Brandmark Logo / Image Placeholder -->
        <a href="{{ route('bkk.mitra.dashboard') }}" class="flex items-center hover:opacity-90 transition-opacity" title="Portal Mitra IDUKA">
            <img src="{{ asset('images/logo-penus.png') }}" alt="Logo" class="h-9 w-auto max-h-9 object-contain rounded-lg" />
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

        @php
            $activeMitra = $currentMitra ?? $mitra ?? null;
            $mNama = $activeMitra ? $activeMitra->nama_perusahaan : ($profile['nama_perusahaan'] ?? 'PT Mitra Industri');
            $mSingkatan = $activeMitra ? ($activeMitra->singkatan ?: substr($mNama, 0, 3)) : ($profile['singkatan'] ?? 'MITRA');
            $mNpwp = $activeMitra ? $activeMitra->npwp : ($profile['npwp'] ?? '-');
            $mLogo = $activeMitra ? $activeMitra->logo_url : null;
        @endphp

        <!-- Google-style User Profile Chip with Dropdown -->
        <div class="relative" id="profile-chip-wrapper">
            <button id="profile-chip-btn" type="button" class="flex items-center gap-2.5 pl-1 pr-3 py-1 rounded-full border border-line bg-canvas hover:bg-white transition-all cursor-pointer focus:outline-none">
                @if($mLogo)
                    <img src="{{ $mLogo }}" alt="{{ $mNama }}" class="w-8 h-8 rounded-full object-cover border border-line"/>
                @else
                    <div class="w-8 h-8 rounded-full bg-navy text-white flex items-center justify-center font-bold text-xs shadow-inner">
                        {{ strtoupper($mSingkatan) }}
                    </div>
                @endif
                <div class="hidden md:block leading-tight text-left">
                    <div class="text-xs font-semibold text-navy truncate max-w-[140px]">
                        {{ $mNama }}
                    </div>
                    <div class="text-[10px] text-muted truncate">
                        {{ $mNpwp }}
                    </div>
                </div>
                <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-muted hidden sm:block"></i>
            </button>

            <!-- Profile Dropdown Menu -->
            <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-line p-2 z-50 fade-up">
                <div class="px-3 py-2.5 border-b border-line">
                    <div class="text-xs font-bold text-navy truncate">{{ $mNama }}</div>
                    <div class="text-[11px] text-muted font-mono mt-0.5">NPWP: {{ $mNpwp }}</div>
                    <div class="inline-flex items-center gap-1 text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full mt-1.5 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>Akun Mitra Terverifikasi</span>
                    </div>
                </div>
                <div class="py-1 space-y-0.5">
                    <a href="{{ route('bkk.mitra.pengaturan') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-medium text-navy hover:bg-canvas transition-colors">
                        <i data-lucide="settings" class="w-4 h-4 text-muted"></i>
                        <span>Pengaturan Akun & Logo</span>
                    </a>
                    <a href="{{ url('/bkk') }}" target="_blank" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-navy hover:bg-canvas transition-colors">
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="external-link" class="w-4 h-4 text-muted"></i>
                            <span>Portal Publik Siswa</span>
                        </div>
                        <i data-lucide="arrow-up-right" class="w-3 h-3 text-muted"></i>
                    </a>
                </div>
                <div class="pt-1 border-t border-line">
                    <form action="{{ route('bkk.mitra.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-bold text-maroon hover:bg-rose-50 transition-colors cursor-pointer text-left">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Keluar (Logout)</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle Notification & Profile Dropdowns
    document.addEventListener('DOMContentLoaded', () => {
        const notifBtn = document.getElementById('notification-btn');
        const notifDropdown = document.getElementById('notification-dropdown');
        if (notifBtn && notifDropdown) {
            notifBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                notifDropdown.classList.toggle('hidden');
                document.getElementById('profile-dropdown')?.classList.add('hidden');
            });
        }

        const profileBtn = document.getElementById('profile-chip-btn');
        const profileDropdown = document.getElementById('profile-dropdown');
        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
                notifDropdown?.classList.add('hidden');
            });
        }

        document.addEventListener('click', (e) => {
            if (notifDropdown && !notifDropdown.contains(e.target) && e.target !== notifBtn) {
                notifDropdown.classList.add('hidden');
            }
            if (profileDropdown && !profileDropdown.contains(e.target) && e.target !== profileBtn) {
                profileDropdown.classList.add('hidden');
            }
        });
    });
</script>
