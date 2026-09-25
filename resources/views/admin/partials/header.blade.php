<header class="fixed top-0 left-0 right-0 z-50 bg-surface-container-lowest/95 backdrop-blur-md border-b border-surface-variant/40 shadow-sm">
    <div class="h-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
        <!-- Logo & Brand Title -->
        <div class="flex items-center gap-3">
            <button class="lg:hidden p-2 rounded-lg text-on-surface-variant hover:bg-surface-container transition-colors" onclick="toggleAdminSidebar()" type="button" aria-label="Toggle Sidebar">
                <span class="material-symbols-outlined text-[24px]">menu</span>
            </button>
            <a href="{{ route('bkk.admin.index') }}" class="flex items-center gap-3 hover:opacity-90 transition-opacity">
                <div class="w-9 h-9 rounded-lg bg-primary flex items-center justify-center text-white font-bold font-headline-sm">
                    P
                </div>
                <div class="flex flex-col">
                    <span class="font-title-md text-base text-on-surface font-bold leading-tight">Admin BKK</span>
                    <span class="text-[11px] text-on-surface-variant leading-none">SMK Plus Pelita Nusantara</span>
                </div>
            </a>
        </div>

        <!-- Right Side: Public Link & Auth User Profile -->
        <div class="flex items-center gap-4">
            <a href="{{ url('/bkk') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold text-primary hover:bg-primary/10 transition-colors">
                <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                <span>Lihat Web Publik</span>
            </a>

            <div class="h-6 w-px bg-surface-variant/80 hidden sm:block"></div>

            <!-- User Info Pill -->
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-sm shadow-sm ring-1 ring-primary/20">
                    {{ strtoupper(substr($authUser['nama_lengkap'] ?? $authUser['username'] ?? 'A', 0, 1)) }}
                </div>
                <div class="hidden md:flex flex-col text-left">
                    <span class="font-semibold text-xs text-on-surface leading-tight">
                        {{ $authUser['nama_lengkap'] ?? $authUser['username'] ?? 'Administrator' }}
                    </span>
                    <span class="text-[10px] text-primary font-bold uppercase tracking-wider">
                        {{ $authUser['role'] ?? 'ADMIN' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
