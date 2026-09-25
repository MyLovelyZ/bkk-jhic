<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="web_standard" name="shell-type"/>
    <title>@yield('title', 'Admin BKK - SMK Plus Pelita Nusantara')</title>
    
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@500;600;700&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
        }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f0edeb; }
        ::-webkit-scrollbar-thumb { background: #946e6a; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #bc0013; }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary": "#ffffff",
                        "secondary": "#875300",
                        "inverse-primary": "#ffb4ab",
                        "surface-variant": "#e5e2e0",
                        "surface-container": "#f0edeb",
                        "on-secondary-container": "#6a4000",
                        "primary-fixed": "#ffdad6",
                        "on-primary-fixed": "#410002",
                        "primary": "#bc0013",
                        "on-tertiary-fixed": "#111c2e",
                        "surface-container-highest": "#e5e2e0",
                        "surface-tint": "#c00014",
                        "surface-container-high": "#ebe8e5",
                        "surface-dim": "#dcd9d7",
                        "surface": "#fcf9f6",
                        "on-background": "#1c1c1a",
                        "on-surface": "#1c1c1a",
                        "on-secondary-fixed-variant": "#663d00",
                        "on-tertiary-container": "#fffcff",
                        "surface-bright": "#fcf9f6",
                        "on-error-container": "#93000a",
                        "tertiary-fixed": "#d8e2fc",
                        "secondary-fixed-dim": "#ffb965",
                        "tertiary-container": "#6b758b",
                        "on-primary-container": "#fffcff",
                        "on-error": "#ffffff",
                        "outline": "#946e6a",
                        "on-tertiary-fixed-variant": "#3d475b",
                        "primary-fixed-dim": "#ffb4ab",
                        "on-secondary": "#ffffff",
                        "background": "#fcf9f6",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed-variant": "#93000c",
                        "secondary-container": "#ffa525",
                        "primary-container": "#eb001b",
                        "outline-variant": "#e9bcb7",
                        "surface-container-low": "#f6f3f1",
                        "on-primary": "#ffffff",
                        "tertiary": "#525c72",
                        "on-secondary-fixed": "#2b1700",
                        "inverse-on-surface": "#f3f0ee",
                        "error-container": "#ffdad6",
                        "tertiary-fixed-dim": "#bcc6df",
                        "error": "#ba1a1a",
                        "inverse-surface": "#31302f",
                        "secondary-fixed": "#ffddba",
                        "on-surface-variant": "#5f3f3b"
                    },
                    borderRadius: {
                        DEFAULT: "0.75rem",
                        lg: "1.25rem",
                        xl: "2rem",
                        full: "9999px"
                    },
                    fontFamily: {
                        "title-md": ["Inter"],
                        "headline-sm": ["Hanken Grotesk"],
                        "body-default": ["Inter"],
                        "headline-lg": ["Hanken Grotesk"],
                        "metric-stat": ["Hanken Grotesk"],
                        "body-dense": ["Inter"],
                        "body-editorial": ["Inter"],
                        "label-md": ["Inter"],
                        "label-dense": ["Inter"],
                        "headline-xl": ["Hanken Grotesk"],
                        "headline-md": ["Hanken Grotesk"]
                    }
                }
            }
        };
    </script>
    @stack('styles')
</head>
<body class="bg-surface font-body-default text-body-default text-on-surface antialiased min-h-screen flex flex-col">
    <!-- Top Header -->
    @include('admin.partials.header')

    <!-- Main Container with Sidebar + Content -->
    <div class="flex-1 flex w-full pt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 gap-6">
        <!-- Sidebar Navigation -->
        @include('admin.partials.sidebar')

        <!-- Dynamic Content Area -->
        <main class="flex-1 min-w-0">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-DEFAULT bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3">
                    <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-DEFAULT bg-red-50 border border-red-200 text-red-800 flex items-center gap-3">
                    <span class="material-symbols-outlined text-red-600">error</span>
                    <span class="font-medium text-sm">{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-DEFAULT bg-red-50 border border-red-200 text-red-800">
                    <div class="flex items-center gap-2 font-semibold mb-2">
                        <span class="material-symbols-outlined text-red-600">warning</span>
                        <span>Terdapat kesalahan pengisian formulir:</span>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
