<!DOCTYPE html>
<html lang="en" style="font-family: 'Jost', sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BPMarineCo — Traditional Pinisi Shipyard')</title>

    <meta name="description"
        content="@yield('meta_description', 'Bina Pusaka is a traditional Pinisi shipyard based in Bulukumba, Indonesia, crafting handcrafted wooden vessels that blend maritime heritage with modern shipbuilding excellence.')">

    <meta name="keywords"
        content="BPMarineCo, Bina Pusaka, Pinisi shipyard, Phinisi Indonesia, traditional Pinisi, luxury Pinisi, Bulukumba shipyard, handcrafted vessels, wooden boatbuilding, Sulawesi shipyard">

    <meta property="og:title" content="@yield('og_title', 'BPMarineCo — Traditional Pinisi Shipyard')">

    <meta property="og:description"
        content="@yield('meta_description', 'Traditional Phinisi, built for global luxury. Handcrafted in Indonesia by Bina Pusaka, preserving authentic Pinisi craftsmanship since 1998.')">

    <meta property="og:image" content="@yield('og_image', url('img/Aset/BINA PUSAKA.jpg'))">
    <meta property="og:image:secure_url" content="@yield('og_image', url('img/Aset/BINA PUSAKA.jpg'))">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="@yield('og_title', 'BPMarineCo - Traditional Pinisi Shipyard')">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="BPMarineCo">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'BPMarineCo — Traditional Pinisi Shipyard')">
    <meta name="twitter:description"
        content="@yield('meta_description', 'Traditional Phinisi, built for global luxury. Handcrafted in Indonesia by Bina Pusaka, preserving authentic Pinisi craftsmanship since 1998.')">
    <meta name="twitter:image" content="@yield('og_image', url('img/Aset/BINA PUSAKA.jpg'))">

    <link rel="icon" href="{{ url('img/Aset/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('img/Aset/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/Aset/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/Aset/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('img/Aset/apple-touch-icon.png') }}">

    <meta name="theme-color" content="#18254D">
    <meta name="msvalidate.01" content="920FA4A1628FBD9845F4CC92F0E2BC84" />

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
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-background relative min-h-screen m-0 p-0" style="font-family: 'Jost', sans-serif; overflow-x: clip;">

    {{-- Garis background --}}
    <div class="absolute inset-0 pointer-events-none z-0" aria-hidden="true"
        style="display: grid; grid-template-columns: 6% 22% 22% 22% 22% 1fr;">
        <div class="border-r border-accentthird "></div>
        <div class="border-r border-accentthird "></div>
        <div class="border-r border-accentthird "></div>
        <div class="border-r border-accentthird "></div>
        <div class="border-r border-accentthird "></div>
    </div>

    {{-- Navbar — desktop only (lg+) --}}
    <div class="relative z-20 w-full hidden lg:block">
        @include('partials.navbar')
    </div>

    {{-- Burger button — mobile & tablet (< lg) --}} <div
        class="relative z-20 lg:hidden py-4 px-6 md:px-12 flex items-center justify-between">
        <div class="flex items-center gap-1">
            <img src="{{ url('img/Aset/apple-touch-icon.png') }}" alt="Logo BP Marine Co" width="40"
                height="40" class="h-10 -ml-2 w-auto">
            <div class="flex flex-col leading-tight mt-1">
                <span class="text-[3.8vw] md:text-[2vh] xl:text-[2.7vh] font-light">BINA PUSAKA</span>
                <span
                    class="text-[1.7vw] md:text-[0.9vh] xl:text-[2.7vh] font-light text-accentsecond tracking-wide">Design
                    and Pinisi
                    Construction</span>
            </div>
        </div>
        <button onclick="toggleSidebar()" aria-label="Buka menu navigasi" aria-expanded="false" id="burger-btn">
            <i id="burger-icon" class="ri-menu-line text-2xl cursor-pointer" aria-hidden="true"></i>
        </button>
        </div>

        {{-- Sidebar overlay — mobile & tablet (< lg) --}} <div id="sidebar-overlay"
            class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden" onclick="toggleSidebar()" aria-hidden="true">
            </div>
            <aside id="sidebar"
                class="fixed top-0 left-0 z-40 w-80 h-dvh bg-background transform -translate-x-full transition-transform duration-300 lg:hidden overflow-hidden"
                aria-label="Menu navigasi mobile">
                <div class="flex items-center justify-between px-6 py-5 border-b border-accentthird">
                    <div class="flex items-center gap-1">
                        <img src="{{ url('img/Aset/apple-touch-icon.png') }}" alt="Logo BP Marine Co"
                            width="40" height="40" class="h-10 w-auto">
                        <div class="flex flex-col leading-tight mt-1">
                            <span class="text-[2.8vw] md:text-[1.8vw] font-light">BINA PUSAKA</span>
                            <span class="text-[clamp(9px,1.3vw,13px)] font-light text-accentsecond tracking-wide">Design
                                and
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
            <main class="relative z-10" style="overflow-x: clip;">
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