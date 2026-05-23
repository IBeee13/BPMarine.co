<!DOCTYPE html>
<html lang="en" style="font-family: 'Jost', sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="@yield('meta_description', 'BP Marine Co — A traditional Pinisi shipyard based in Bulukumba, South Sulawesi, Indonesia.')">
    <meta name="keywords" content="kapal pinisi, pinisi bulukumba, pinisi luxury, BP Marine">

    <meta property="og:title" content="@yield('og_title', 'BP Marine Co — Traditional Pinisi Shipyard')">
    <meta property="og:description"
        content="@yield('meta_description', 'Handcrafted Pinisi vessels from Bulukumba, South Sulawesi.')">
    <meta property="og:image" content="@yield('og_image', url('img/Bina Pusaka/Aset/og image Binapusaka.webp'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <title>@yield('title', 'BPMarine.co')</title>
    <link rel="icon" href="{{ url('img/Bina Pusaka/Aset/LOGO BINA PUSAKA 21.webp') }}" type="image/webp">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    @stack('preload')

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@400;500;700;800&display=swap"
        media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@400;500;700;800&display=swap">
    </noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"
        media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    </noscript>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" media="print"
        onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css">
    </noscript>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" media="print"
        onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">
    </noscript>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-background m-0 p-0 overflow-x-hidden" style="font-family: 'Jost', sans-serif;">

    {{-- Garis background --}}
    <div class="fixed inset-0 pointer-events-none z-0" aria-hidden="true"
        style="display: grid; grid-template-columns: 6% 22% 22% 22% 22% 1fr;">
        <div class="border-r border-accentthird"></div>
        <div class="border-r border-accentthird"></div>
        <div class="border-r border-accentthird"></div>
        <div class="border-r border-accentthird"></div>
        <div class="border-r border-accentthird"></div>
        <div></div>
    </div>

    {{-- Navbar — hanya desktop --}}
    <div class="relative z-20 w-full hidden md:block">
        @include('partials.navbar')
    </div>

    {{-- Tombol burger — hanya mobile --}}
    <div class="relative z-20 md:hidden p-4 flex items-center justify-between">
        <div class="flex items-center gap-1">
            <img src="{{ url('img/Bina Pusaka/aset/LOGO BINA PUSAKA 21.webp') }}" alt="Logo BP Marine Co" width="40"
                height="40" class="h-10 w-auto">
            <div class="flex flex-col leading-tight mt-1">
                <span class="text-[2.8vw] font-light">BINA PUSAKA</span>
                <span class="text-[clamp(9px,1.3vw,13px)] font-light text-accentsecond tracking-wide">Design and Pinisi
                    Construction</span>
            </div>
        </div>
        <button onclick="toggleSidebar()" aria-label="Buka menu navigasi" aria-expanded="false" id="burger-btn">
            <i id="burger-icon" class="ri-menu-line text-2xl cursor-pointer" aria-hidden="true"></i>
        </button>
    </div>

    {{-- Sidebar mobile — overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden" onclick="toggleSidebar()"
        aria-hidden="true">
    </div>
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-80 h-dvh bg-background transform -translate-x-full transition-transform duration-300 md:hidden overflow-hidden"
        aria-label="Menu navigasi mobile">
        <div class="flex items-center justify-between px-6 py-5 border-b border-accentthird">
            <div class="flex items-center gap-1">
                <img src="{{ url('img/Bina Pusaka/aset/LOGO BINA PUSAKA 21.webp') }}" alt="Logo BP Marine Co" width="40"
                    height="40" class="h-10 w-auto">
                <div class="flex flex-col leading-tight mt-1">
                    <span class="text-[2.8vw] font-light">BINA PUSAKA</span>
                    <span class="text-[clamp(9px,1.3vw,13px)] font-light text-accentsecond tracking-wide">Design and
                        Pinisi Construction</span>
                </div>
            </div>
            <button onclick="toggleSidebar()" aria-label="Tutup menu navigasi"
                class="flex items-center justify-center text-accentsecond hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer p-0">
                <i class="ti ti-x text-xl" aria-hidden="true"></i>
            </button>
        </div>

        @include('layouts.sidebar')
    </aside>

    {{-- Konten --}}
    <main class="relative z-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <div class="relative z-10">
        @include('partials.footer')
    </div>


    <script defer src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 800,
                once: false,
                mirror: true,
                offset: 80,
                easing: 'ease-out-cubic',
            });
        });
    </script>
</body>

</html>