<!DOCTYPE html>
<html lang="en" style="font-family: 'Jost', sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="@yield('meta_description', 'BP Marine Co — A traditional Pinisi shipyard based in Bulukumba, South Sulawesi, Indonesia.')">
    <meta name="keywords" content="kapal pinisi, pinisi bulukumba, pinisi luxury, BP Marine">

    <meta property="og:title" content="@yield('title', 'BP Marine Co — Traditional Pinisi Shipyard')">
    <meta property="og:description"
        content="@yield('meta_description', 'Handcrafted Pinisi vessels from Bulukumba, South Sulawesi.')">
    <meta property="og:image" content="{{ asset('img/Bina Pusaka/og-image.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Title --}}
    <title>@yield('title', 'BPMarine.co')</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background m-0 p-0 overflow-x-hidden" style="font-family: 'Jost', sans-serif;">

    {{-- Garis background --}}
    <div class="fixed inset-0 pointer-events-none z-0"
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
            <img src="{{ asset('img/Bina Pusaka/aset/LOGO BINA PUSAKA 21.png') }}" alt="Logo" class="h-10 w-auto">
            <div class="flex flex-col leading-tight mt-1">
                <span class="text-[2.8vw] font-light">BINA PUSAKA</span>
                <span class="text-[1.3vw] font-light text-accentsecond tracking-wide">Desain and Pinisi
                    Contruction</span>
            </div>
        </div>
        <button onclick="toggleSidebar()">
            <i id="burger-icon" class="ri-menu-line text-2xl cursor-pointer"></i>
        </button>
    </div>

    {{-- Sidebar mobile — overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden" onclick="toggleSidebar()">
    </div>
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-80 h-dvh bg-background transform -translate-x-full transition-transform duration-300 md:hidden overflow-hidden">
        <div class="flex items-center justify-between px-6 py-5 border-b border-accentthird">
            <div class="flex items-center gap-1">
                <img src="{{ asset('img/Bina Pusaka/aset/LOGO BINA PUSAKA 21.png') }}" alt="Logo" class="h-10 w-auto">
                <div class="flex flex-col leading-tight mt-1">
                    <span class="text-[2.8vw] font-light">BINA PUSAKA</span>
                    <span class="text-[1.3vw] font-light text-accentsecond tracking-wide">Desain and Pinisi
                        Contruction</span>
                </div>
            </div>
            <button onclick="toggleSidebar()"
                class="flex items-center justify-center text-accentsecond hover:text-accent transition-colors duration-300 bg-transparent border-none cursor-pointer p-0">
                <i class="ti ti-x text-xl"></i>
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

    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init({
        duration: 1000,
        once: true
    });
    </script>
</body>

</html>