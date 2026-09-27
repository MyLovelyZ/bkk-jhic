<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="web_standard" name="shell-type"/>
    <title>@yield('title', 'Dashboard Mitra IDUKA - BKK SMK Plus Pelita Nusantara')</title>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
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
                    },
                    borderRadius: {
                        'xl': '0.75rem',
                        '2xl': '1rem',
                        '3xl': '1.5rem',
                    }
                }
            }
        };
    </script>

    <style>
        html, body {
            background-color: #f8f9fa;
            color: #1b283b;
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f8f9fa; }
        ::-webkit-scrollbar-thumb { background: #dcdcdc; border-radius: 999px; }
        ::-webkit-scrollbar-thumb:hover { background: #b0b0b0; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: none; }
        }
        .fade-up {
            animation: fadeUp .3s ease-out both;
        }

        /* Google Material Design subtle card styles */
        .google-card {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 1rem;
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }
        .google-card:hover {
            box-shadow: 0 4px 12px rgba(27, 40, 59, 0.05);
            border-color: #c5c5c5;
        }

        /* Markdown rendering inside CV */
        .md-cv h1 { font-size: 1.4rem; font-weight: 700; margin-bottom: .25rem; color: #1b283b; }
        .md-cv h2 { font-size: .85rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: #741918; border-bottom: 1px solid #dcdcdc; padding-bottom: .25rem; margin: 1.25rem 0 .5rem; }
        .md-cv h3 { font-size: .95rem; font-weight: 600; margin-top: .5rem; color: #1b283b; }
        .md-cv p { font-size: .84rem; line-height: 1.6; color: #3c4043; margin: .25rem 0; }
        .md-cv ul { list-style: disc; padding-left: 1.2rem; margin: .25rem 0; }
        .md-cv li { font-size: .84rem; line-height: 1.55; color: #3c4043; margin-bottom: 0.2rem; }
        .md-cv strong { color: #1b283b; }
        .md-cv em { color: #5f6368; }
        .md-cv a { color: #741918; text-decoration: underline; }
        .md-cv hr { border-color: #dcdcdc; margin: .75rem 0; }
    </style>
    @stack('styles')
</head>
<body class="bg-canvas text-navy font-sans antialiased min-h-screen flex flex-col">
    <!-- Top Bar Navigation (Google Style) -->
    @include('mitra.partials.header')

    <!-- Main Container with Sidebar + Main Content -->
    <div class="flex flex-1 min-h-[calc(100vh-4rem)]">
        <!-- Sidebar Navigation -->
        @include('mitra.partials.sidebar')

        <!-- Dynamic Content Area -->
        <main id="main-scroll" class="flex-1 min-w-0 overflow-y-auto">
            <div class="max-w-[1400px] mx-auto p-4 sm:p-6 lg:p-8">
                {{-- Flash Message Success --}}
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex items-center justify-between gap-3 shadow-sm fade-up">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center shrink-0">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-700"></i>
                            </span>
                            <span class="font-medium text-sm">{{ session('success') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800 p-1">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endif

                {{-- Flash Message Error --}}
                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-900 flex items-center justify-between gap-3 shadow-sm fade-up">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center shrink-0">
                                <i data-lucide="alert-circle" class="w-4 h-4 text-red-700"></i>
                            </span>
                            <span class="font-medium text-sm">{{ session('error') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 p-1">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-[70] space-y-2 w-[min(92vw,380px)] pointer-events-none"></div>

    <script>
        // Global Toast Helper
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            const isSuccess = type === 'success';
            toast.className = `fade-up ${isSuccess ? 'bg-navy' : 'bg-red-900'} text-white text-sm rounded-2xl px-4 py-3 shadow-xl flex items-center gap-3 pointer-events-auto border border-line/20`;
            toast.innerHTML = `
                <i data-lucide="${isSuccess ? 'check-circle-2' : 'alert-circle'}" class="w-5 h-5 ${isSuccess ? 'text-emerald-400' : 'text-red-400'} shrink-0"></i>
                <span class="flex-1">${message}</span>
            `;
            container.appendChild(toast);
            lucide.createIcons({ root: toast });

            setTimeout(() => {
                toast.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(10px)';
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }

        // Initialize Lucide Icons on DOM ready
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>
    @stack('scripts')
</body>
</html>
