@php
    $navItems = [
        [
            'label' => 'Beranda',
            'url' => url('/bkk'),
            'path' => 'beranda',
            'active' => request()->is('bkk')
        ],
        [
            'label' => 'Lowongan',
            'url' => url('/bkk/lowongan'),
            'path' => 'lowongan-pkl-&-kerja',
            'active' => request()->is('bkk/lowongan*')
        ],
        [
            'label' => 'Berita',
            'url' => url('/bkk/berita'),
            'path' => 'berita-&-agenda',
            'active' => request()->is('bkk/berita*')
        ],
        [
            'label' => 'Mitra',
            'url' => url('/bkk/kerja-sama'),
            'path' => 'kerja-sama-mitra',
            'active' => request()->is('bkk/kerja-sama*')
        ],
        [
            'label' => 'Tentang',
            'url' => url('/bkk/tentang'),
            'path' => 'tentang-bkk',
            'active' => request()->is('bkk/tentang*')
        ],
    ];
@endphp

<!-- Desktop Navigation -->
<nav class="hidden xl:flex items-center gap-1" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-full px-4 py-2">
    @foreach($navItems as $item)
        @if($item['active'])
            <a aria-current="page"
               class="transition-colors bg-primary-container text-on-primary-container font-semibold rounded-full px-4 py-2"
               data-path="{{ $item['path'] }}"
               href="{{ $item['url'] }}">
                {{ $item['label'] }}
            </a>
        @else
            <a class="px-3.5 py-2 font-label-md text-label-md text-on-surface-variant hover:bg-surface-container hover:text-on-surface rounded-full transition-colors"
               data-path="{{ $item['path'] }}"
               href="{{ $item['url'] }}">
                {{ $item['label'] }}
            </a>
        @endif
    @endforeach
</nav>

<!-- Mobile Navigation Backdrop & Drawer -->
<div id="mobile-nav-backdrop" class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm hidden xl:hidden transition-opacity" onclick="toggleMobileNav()"></div>
<div id="mobile-nav-drawer" class="fixed top-20 right-0 w-80 max-w-[85vw] h-[calc(100vh-5rem)] bg-surface-container-lowest shadow-2xl z-50 p-6 transform translate-x-full transition-transform duration-300 ease-in-out xl:hidden flex flex-col justify-between overflow-y-auto">
    <div class="flex flex-col gap-2">
        <span class="font-label-dense text-label-dense uppercase tracking-wider text-on-surface-variant px-3 py-1">Navigasi Utama</span>
        <div class="flex flex-col gap-1.5 mt-1">
            @foreach($navItems as $item)
                @if($item['active'])
                    <a aria-current="page"
                       class="transition-colors bg-primary-container text-on-primary-container font-semibold rounded-2xl px-4 py-3 text-body-default flex items-center justify-between"
                       data-path="{{ $item['path'] }}"
                       href="{{ $item['url'] }}">
                        <span>{{ $item['label'] }}</span>
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                @else
                    <a class="px-4 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-container hover:text-on-surface rounded-2xl transition-colors flex items-center justify-between"
                       data-path="{{ $item['path'] }}"
                       href="{{ $item['url'] }}">
                        <span>{{ $item['label'] }}</span>
                        <span class="material-symbols-outlined text-[18px] opacity-40">chevron_right</span>
                    </a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="pt-6 border-t border-surface-container flex flex-col gap-3">
        <a class="w-full inline-flex items-center justify-center px-5 py-3 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary transition-colors" href="#">
            <span class="material-symbols-outlined text-[18px] mr-2">login</span>
            Masuk / Daftar Siswa
        </a>
    </div>
</div>
