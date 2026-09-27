<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Masuk Portal Mitra IDUKA - BKK SMK Plus Pelita Nusantara</title>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: "#1b283b",
                            dark: "#101a29",
                            light: "#25374e",
                        },
                        maroon: {
                            DEFAULT: "#741918",
                            dark: "#5e1413",
                            light: "#8a201f",
                        },
                        line: "#dcdcdc",
                        canvas: "#f8f9fa",
                        muted: "#5f6368",
                    },
                    fontFamily: {
                        sans: ["Inter", "Roboto", "system-ui", "sans-serif"],
                        headline: ["Hanken Grotesk", "Inter", "sans-serif"],
                    }
                }
            }
        };
    </script>

    <style>
        body {
            background-color: #f8f9fa;
            color: #1b283b;
            font-family: 'Inter', system-ui, sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-maroon selection:text-white">

    <!-- Top Simple Bar -->
    <header class="w-full py-4 px-6 md:px-12 flex items-center justify-between border-b border-line bg-white/80 backdrop-blur-md sticky top-0 z-30">
        <a href="{{ url('/bkk') }}" class="flex items-center gap-3 group">
            <div class="w-9 h-9 rounded-xl bg-navy text-white flex items-center justify-center font-bold text-sm shadow-sm group-hover:bg-maroon transition-colors">
                BKK
            </div>
            <div>
                <div class="font-headline font-bold text-navy text-sm">SMK PLUS PELITA NUSANTARA</div>
                <div class="text-[11px] text-muted">Portal Kemitraan Industri & IDUKA</div>
            </div>
        </a>
        <a href="{{ url('/bkk') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-muted hover:text-navy transition-colors px-3 py-1.5 rounded-full hover:bg-canvas">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Beranda</span>
        </a>
    </header>

    <!-- Main Container -->
    <main class="flex-1 flex items-center justify-center p-4 sm:p-6 md:p-10">
        <div class="w-full max-w-md">

            <!-- Card Utama -->
            <div class="bg-white rounded-3xl border border-line p-6 sm:p-8 shadow-sm">
                <!-- Header Icon & Title -->
                <div class="text-center mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-navy/5 text-navy border border-navy/10 flex items-center justify-center mx-auto mb-3 shadow-inner">
                        <i data-lucide="building-2" class="w-7 h-7 text-maroon"></i>
                    </div>
                    <h1 class="text-xl sm:text-2xl font-headline font-bold text-navy">Masuk Portal IDUKA</h1>
                    <p class="text-xs sm:text-sm text-muted mt-1">
                        Akses dashboard rekrutmen, publikasi lowongan, & review berkas siswa/alumni BKK.
                    </p>
                </div>

                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="mb-5 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-start gap-2.5">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-5 p-3.5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs flex items-start gap-2.5">
                        <i data-lucide="alert-triangle" class="w-4 h-4 text-rose-600 shrink-0 mt-0.5"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-5 p-3.5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
                        @foreach($errors->all() as $err)
                            <div class="flex items-center gap-2">
                                <i data-lucide="alert-circle" class="w-3.5 h-3.5 text-rose-600 shrink-0"></i>
                                <span>{{ $err }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('bkk.mitra.login.post') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Input Nama Perusahaan (Sanitize) -->
                    <div>
                        <label for="nama_perusahaan" class="block text-xs font-semibold text-navy uppercase tracking-wider mb-1.5">
                            Nama Perusahaan <span class="text-maroon">*</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-muted pointer-events-none">
                                <i data-lucide="briefcase" class="w-4 h-4"></i>
                            </span>
                            <input
                                type="text"
                                id="nama_perusahaan"
                                name="nama_perusahaan"
                                value="{{ old('nama_perusahaan') }}"
                                required
                                autocomplete="organization"
                                placeholder="Contoh: PT Solusi Teknologi Nusantara"
                                class="w-full bg-canvas text-navy placeholder:text-[#9aa0a6] text-sm rounded-2xl pl-10 pr-4 py-2.5 border border-line hover:border-[#b0b0b0] focus:bg-white focus:border-navy focus:outline-none focus:ring-2 focus:ring-navy/10 transition-all"
                            />
                        </div>
                        <p class="text-[11px] text-muted mt-1">
                            Sistem akan otomatis membersihkan spasi berlebih dan tidak sensitif huruf besar/kecil.
                        </p>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-xs font-semibold text-navy uppercase tracking-wider">
                                Kata Sandi <span class="text-maroon">*</span>
                            </label>
                            <span class="text-[11px] text-muted">Hubungi Hubin jika lupa</span>
                        </div>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-muted pointer-events-none">
                                <i data-lucide="lock" class="w-4 h-4"></i>
                            </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan kata sandi akun"
                                class="w-full bg-canvas text-navy placeholder:text-[#9aa0a6] text-sm rounded-2xl pl-10 pr-10 py-2.5 border border-line hover:border-[#b0b0b0] focus:bg-white focus:border-navy focus:outline-none focus:ring-2 focus:ring-navy/10 transition-all"
                            />
                            <button
                                type="button"
                                id="togglePasswordBtn"
                                class="absolute right-3.5 text-muted hover:text-navy focus:outline-none"
                                aria-label="Tampilkan kata sandi"
                            >
                                <i data-lucide="eye" id="togglePasswordIcon" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                class="w-4 h-4 rounded border-line text-navy focus:ring-navy/30 cursor-pointer"
                                {{ old('remember') ? 'checked' : '' }}
                            />
                            <span class="text-xs text-navy font-medium">Ingat Sesi di Perangkat Ini</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full mt-2 py-3 px-4 rounded-2xl bg-navy hover:bg-maroon text-white font-semibold text-sm shadow-sm hover:shadow transition-all flex items-center justify-center gap-2 group cursor-pointer"
                    >
                        <span>Masuk ke Dashboard Mitra</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>

                <!-- Quick Login Demo Chips (Bantuan Pengujian) -->
                @if(isset($registeredMitras) && $registeredMitras->isNotEmpty())
                    <div class="mt-6 pt-5 border-t border-line">
                        <div class="flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wider text-muted mb-2.5">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-maroon"></i>
                            <span>Uji Coba Cepat (Akun Mitra Terdaftar)</span>
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($registeredMitras as $demo)
                                <button
                                    type="button"
                                    onclick="fillLoginForm('{{ addslashes($demo->nama_perusahaan) }}')"
                                    class="text-[11px] font-medium px-2.5 py-1 rounded-full bg-canvas border border-line hover:border-navy text-navy hover:bg-white transition-all text-left flex items-center gap-1.5 cursor-pointer"
                                    title="Klik untuk mengisi otomatis"
                                >
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span>{{ $demo->singkatan ?: $demo->nama_perusahaan }}</span>
                                </button>
                            @endforeach
                        </div>
                        <p class="text-[10px] text-muted mt-2">
                            *Password default seeder pengujian: <code class="bg-[#e8eaed] px-1.5 py-0.5 rounded text-navy font-mono font-bold">Password123!</code>
                        </p>
                    </div>
                @endif
            </div>

            <!-- Footer Partner Link -->
            <div class="text-center mt-6">
                <p class="text-xs text-muted">
                    Perusahaan Anda belum terdaftar sebagai mitra BKK?
                </p>
                <a href="{{ url('/bkk/kerja-sama') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-maroon hover:underline mt-1">
                    <span>Ajukan Permohonan Kemitraan / MoU IDUKA</span>
                    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

        </div>
    </main>

    <!-- Footer Copyright -->
    <footer class="w-full py-4 text-center text-xs text-muted border-t border-line bg-white/50">
        &copy; {{ date('Y') }} BKK SMK Plus Pelita Nusantara. Hak Cipta Dilindungi.
    </footer>

    <script>
        lucide.createIcons();

        // Toggle Password Visibility
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePasswordIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', () => {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                toggleIcon.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
                lucide.createIcons();
            });
        }

        // Fill Login Form helper
        function fillLoginForm(companyName) {
            const nameInput = document.getElementById('nama_perusahaan');
            const pwdInput = document.getElementById('password');
            if (nameInput) nameInput.value = companyName;
            if (pwdInput) pwdInput.value = 'Password123!';
            nameInput?.focus();
        }
    </script>
</body>
</html>
