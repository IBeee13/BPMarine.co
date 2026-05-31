@extends('layouts.app')

@section('title', 'BPMarine.Co — Traditional Pinisi Shipyard')
@section('og_title', 'BPMarine.Co — Traditional Pinisi Shipyard')
@section('meta_description', 'BPMarine.Co builds handcrafted Pinisi vessels that blend 600 years of Indonesian maritime
heritage with modern shipbuilding excellence. Discover our fleet and legacy.')

@push('preload')
<link rel="preload" as="image" href="{{ url('img/Bina Pusaka/Vela/vela-exterior-11.webp') }}" fetchpriority="high"
    imagesrcset="{{ url('img/Bina Pusaka/Vela/vela-exterior-11.webp') }}" type="image/webp">
@endpush

@section('content')

{{-- ============================================================ --}}
{{-- HERO SECTION                                                  --}}
{{-- ============================================================ --}}
<section class="relative w-full overflow-hidden px-6 md:px-12 lg:px-16 xl:px-23 py-16 pb-20 md:pb-16 xl:min-h-screen"
    aria-label="Hero — BP Marine Co Pinisi Shipyard">

    <div class="md:absolute -mx-6 -my-16 md:-mx-0 md:-my-0 inset-0 z-0 pointer-events-none overflow-hidden flex md:top-72"
        aria-hidden="true">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] xl:text-[20vw] font-medium">
            <p
                style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </p>
        </div>
    </div>

    {{-- ── Mobile: < 768px ────────────────────────────────────────────────── --}}
    <div class="relative z-10 flex flex-col md:hidden gap-6 pt-4 -mt-24">
        <div data-aos="custom-zoom-in-up" data-aos-duration="800"
            class="w-full h-[260px] sm:h-[320px] rounded-2xl overflow-hidden">
            <img src="{{ url('img/Bina Pusaka/Vela/vela-exterior-11.webp') }}"
                alt="Kapal Pinisi Vela — BP Marine Co, galangan kapal tradisional Sulawesi" width="600" height="320"
                loading="eager" fetchpriority="high" decoding="sync"
                class="h-full w-full hover:scale-110 transition duration-500 object-cover">
        </div>
        <div data-aos="custom-blur-up" data-aos-delay="100">
            <h1 class="text-3xl sm:text-4xl font-medium leading-tight text-primary">
                Traditional Phinisi, Built for Global Luxury
            </h1>
            <p class="text-accentsecond text-base mt-2">Proudly Crafted in Indonesia</p>
        </div>
        <a href="/collection" data-aos="custom-zoom-in-up" data-aos-delay="200"
            aria-label="View Our Collection of Pinisi vessels"
            class="bg-secondary relative group overflow-hidden text-background px-7 py-3 inline-flex items-center rounded-full shadow-md w-max transition ease-in-out duration-500">
            <span
                class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                aria-hidden="true"></span>
            <span class="relative group-hover:text-background text-md font-base">View Our Collection</span>
        </a>
        <div data-aos="custom-zoom-in-up" data-aos-delay="250" class="flex gap-3 h-[220px] sm:h-[280px]">
            <div class="flex-1 rounded-2xl overflow-hidden">
                <img src="{{ url('img/Bina Pusaka/Ilike/vessel_Ilike_liveaboard_06-640x600.webp') }}"
                    alt="Interior liveaboard kapal Pinisi Ilike — BP Marine Co" width="300" height="280" loading="lazy"
                    decoding="async" class="h-full w-full object-cover hover:scale-110 transition duration-500">
            </div>
            <div class="flex-1 rounded-2xl overflow-hidden">
                <img src="{{ url('img/Bina Pusaka/Prana/Prana-by-Atzaro-Yacht-1.webp') }}"
                    alt="Kapal Pinisi Prana — mewah buatan BP Marine Co" width="300" height="280" loading="lazy"
                    decoding="async" class="h-full w-full object-cover hover:scale-110 transition duration-500">
            </div>
        </div>
    </div>

    {{-- ── Tablet: 768px – 1279px ──────────────────────────────────────────── --}}
    <div class="relative z-10 hidden md:flex xl:hidden flex-col gap-6 pt-4">
        {{-- Judul --}}
        <div class="flex flex-row justify-between">
            <div data-aos="custom-blur-up" data-aos-delay="100">
                <h1 class="text-[5.5vw] font-bold leading-none text-primary"
                    style="font-family: 'Poppins', sans-serif;">
                    Traditional
                </h1>
                <p class="text-[5.5vw] font-bold leading-none text-primary" style="font-family: 'Poppins', sans-serif;">
                    Phinisi,<span
                        style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                        Built for</span>
                </p>
                <p class="text-[5.5vw] font-bold leading-none"
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                    Global Luxury
                </p>
                <p class="text-accentsecond text-sm mt-2">Proudly Crafted in Indonesia</p>
            </div>
            <div class="flex items-end w-[45%] ">
                <a href="/collection" data-aos="custom-zoom-in-up" data-aos-delay="150"
                    aria-label="View Our Collection of Pinisi vessels"
                    class="bg-secondary w-full relative group overflow-hidden text-background px-6 py-3 inline-flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                    <span
                        class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                        aria-hidden="true"></span>
                    <span class="relative group-hover:text-background text-base font-base">View Our Collection</span>
                </a>
            </div>

        </div>
        {{-- 2 Kolom Gambar + CTA --}}
        <div class="flex gap-4 h-[380px] md:h-[360px] lg:h-[420px]">
            {{-- Gambar kiri besar --}}
            <div data-aos="custom-zoom-in-up" data-aos-duration="900" class="w-[50%] rounded-2xl overflow-hidden">
                <img src="{{ url('img/Bina Pusaka/Vela/vela-exterior-11.webp') }}"
                    alt="Kapal Pinisi Vela — BP Marine Co" width="420" height="560" loading="eager" fetchpriority="high"
                    decoding="sync" class="h-full w-full object-cover hover:scale-110 transition duration-500">
            </div>

            {{-- Kanan: CTA + 2 gambar --}}
            <div class="flex-1 flex flex-col gap-4">
                <div class="flex gap-4 flex-1">
                    <div data-aos="custom-zoom-in-up" data-aos-delay="200" class="flex-1 rounded-2xl overflow-hidden">
                        <img src="{{ url('img/Bina Pusaka/Ilike/vessel_Ilike_liveaboard_06-640x600.webp') }}"
                            alt="Interior liveaboard kapal Pinisi Ilike — BP Marine Co" width="640" height="600"
                            loading="lazy" decoding="async"
                            class="h-full w-full object-cover hover:scale-110 transition duration-500">
                    </div>
                    <div data-aos="custom-zoom-in-up" data-aos-delay="250" class="flex-1 rounded-2xl overflow-hidden">
                        <img src="{{ url('img/Bina Pusaka/The Maj Oceanic/TMO-Areal-view-scaled-e1664971034548__2_.webp') }}"
                            alt="Aerial view kapal Pinisi The Maj Oceanic — buatan BP Marine Co" width="480"
                            height="320" loading="lazy" decoding="async"
                            class="h-full w-full object-cover hover:scale-110 transition duration-500">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Desktop: >= 1280px ───────────────────────────────────────────────── --}}
    <div class="relative z-10 hidden xl:flex items-start gap-3 xl:gap-4 h-auto xl:h-[85vh]">

        <div data-aos="custom-zoom-in-up" data-aos-duration="900"
            class="flex-shrink-0 w-[21%] h-[70%] rounded-2xl overflow-hidden self-start mt-4">
            <img src="{{ url('img/Bina Pusaka/Vela/vela-exterior-11.webp') }}"
                alt="Kapal Pinisi Vela — BP Marine Co, galangan kapal tradisional Sulawesi" width="420" height="560"
                loading="eager" fetchpriority="high" decoding="sync"
                class="h-full w-full object-cover hover:scale-110 transition duration-500">
        </div>

        <div class="flex-1 flex flex-col h-full gap-4 xl:ml-9">
            <div class="flex">
                <div data-aos="custom-blur-up" data-aos-delay="100">
                    <h1 class="text-[6vw] flex items-center gap-3 font-bold leading-none text-primary"
                        style="font-family: 'Poppins', sans-serif;">
                        Traditional
                        <span class="flex flex-col">
                            <span class="text-accentsecond text-sm font-light"
                                style="font-family: 'Poppins', sans-serif;">Proudly Crafted in</span>
                            <span class="text-accentsecond text-sm font-light"
                                style="font-family: 'Poppins', sans-serif;">Indonesia</span>
                        </span>
                    </h1>
                    <p class="text-[5.5vw] font-bold leading-none text-primary"
                        style="font-family: 'Poppins', sans-serif;">
                        Phinisi,<span
                            style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">Built
                            for</span>
                    </p>
                    <p class="text-[6vw] font-bold leading-none"
                        style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                        Global Luxury
                    </p>
                </div>
            </div>
            <div class="flex gap-4 flex-1 xl:ml-88">
                <div data-aos="custom-zoom-in-up" data-aos-delay="200" class="flex-1 rounded-2xl overflow-hidden">
                    <img src="{{ url('img/Bina Pusaka/Ilike/vessel_Ilike_liveaboard_06-640x600.webp') }}"
                        alt="Interior liveaboard kapal Pinisi Ilike — BP Marine Co" width="640" height="600"
                        loading="lazy" decoding="async"
                        class="h-full w-full object-cover hover:scale-110 transition duration-500">
                </div>
            </div>
        </div>

        <div class="flex-shrink-0 w-[24%] pt-24 gap-4 flex flex-col justify-between h-[100%]">
            <div data-aos="custom-zoom-in-up" data-aos-delay="150" class="lg:ml-24">
                <a href="/collection" aria-label="View Our Collection of Pinisi vessels"
                    class="bg-secondary relative group overflow-hidden text-background px-6 py-3 flex justify-center items-center rounded-full shadow-md transition ease-in-out duration-500">
                    <span
                        class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                        aria-hidden="true"></span>
                    <span class="relative group-hover:text-background text-lg font-base">View Our Collection</span>
                </a>
            </div>
            <div data-aos="custom-zoom-in-up" data-aos-delay="250" class="flex-1 rounded-2xl overflow-hidden">
                <img src="{{ url('img/Bina Pusaka/The Maj Oceanic/TMO-Areal-view-scaled-e1664971034548__2_.webp') }}"
                    alt="Aerial view kapal Pinisi The Maj Oceanic — buatan BP Marine Co" width="480" height="320"
                    loading="lazy" decoding="async"
                    class="h-full w-full object-cover hover:scale-110 transition duration-500">
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- OUR LEGACY SECTION                                            --}}
{{-- ============================================================ --}}
<section
    class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-13 w-full px-6 md:px-12 lg:px-16 xl:px-23 py-12 md:py-16"
    aria-labelledby="legacy-heading">
    <div data-aos="custom-zoom-in-up" data-aos-duration="700"
        class="w-full md:w-[180px] lg:w-[280px] h-[240px] md:h-[260px] lg:h-[380px] rounded-2xl overflow-hidden flex-shrink-0">
        <img src="{{ url('img/Bina Pusaka/The Maj Oceanic/The-Maj-Oceanic-Ambience-01-scaled.webp') }}"
            alt="Suasana dek kapal Pinisi The Maj Oceanic — BP Marine Co" width="280" height="380" loading="lazy"
            decoding="async" class="h-full w-full object-cover hover:scale-110 transition duration-500">
    </div>
    <div class="flex flex-col gap-4 md:gap-5 lg:gap-8">
        <div class="overflow-hidden flex items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Our Legacy</p>
        </div>
        <div data-aos="custom-blur-up" data-aos-duration="700" data-aos-delay="100">
            <h2 id="legacy-heading" class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-primary">
                BP Marine Co Is A Traditional Shipyard Dedicated To Preserving The Legacy Of Authentic Pinisi
                Craftsmanship.
            </h2>
        </div>
        <div data-aos="custom-zoom-in-up" data-aos-delay="200" class="w-max">
            <a href="/about" aria-label="Discover Our Story — About BP Marine Co"
                class="bg-secondary relative group overflow-hidden text-background px-7 py-3 flex items-center rounded-full shadow-md transition ease-in-out duration-500">
                <span
                    class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                    aria-hidden="true"></span>
                <span class="relative group-hover:text-background text-lg font-base">Discover Our Story</span>
            </a>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- MARQUEE STATS SECTION                                         --}}
{{-- ============================================================ --}}
<section data-aos="fade-up" data-aos-duration="700" class="relative w-full overflow-hidden flex flex-col gap-2 py-8"
    aria-label="Statistik dan pencapaian BP Marine Co">

    <div class="flex w-max gap-2 animate-leftscroll" aria-hidden="true">
        @foreach([
        ['img' => 'img/Bina Pusaka/Prana/AGY_Indonesia_Prana-01.webp', 'num' => '25+', 'title' => 'Years of Excellence',
        'desc' => 'Preserving Pinisi shipbuilding since 1998, delivering vessels of heritage and global standards.'],
        ['img' => 'img/Bina Pusaka/Prana/Prana-by-Atzaro-Onboard.webp', 'num' => '20+', 'title' => 'Ships Built with
        Precision',
        'desc' => 'Each vessel reflects our commitment to craftsmanship and modern shipbuilding standards.'],
        ['img' => 'img/Bina Pusaka/The Maj Oceanic/vessel-6.webp', 'num' => '25+', 'title' => 'Years of Excellence',
        'desc' => 'Preserving Pinisi shipbuilding since 1998, delivering vessels of heritage and global standards.'],
        ['img' => 'img/Bina Pusaka/The Maj Oceanic/vessel-1.webp', 'num' => '20+', 'title' => 'Ships Built with
        Precision',
        'desc' => 'Each vessel reflects our commitment to craftsmanship and modern shipbuilding standards.'],
        ] as $item)
        <div class="overflow-hidden flex-shrink-0 h-40 sm:h-44 md:h-56 w-56 sm:w-64 md:w-104">
            <img src="{{ url($item['img']) }}" alt="Kapal Pinisi BP Marine Co" width="416" height="224" loading="lazy"
                decoding="async" class="h-full w-full object-cover">
        </div>
        <div class="border-2 border-accentthird bg-background flex-shrink-0
                    h-40 sm:h-44 md:h-56
                    w-56 sm:w-64 md:w-104
                    px-3 sm:px-3 md:px-4
                    gap-2 sm:gap-3 md:gap-4
                    flex items-center justify-center overflow-hidden">
            <p class="text-3xl sm:text-5xl md:text-7xl text-primary font-medium leading-none flex-shrink-0">
                {{ $item['num'] }}</p>
            <div class="flex flex-col gap-1 sm:gap-2 md:gap-4 min-w-0">
                <p class="text-primary text-xs sm:text-base md:text-lg font-medium leading-tight">{{ $item['title'] }}
                </p>
                <p class="text-xs md:text-sm text-accent leading-snug">{{ $item['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="flex w-max gap-2 animate-rightscroll" aria-hidden="true">
        @foreach([
        ['img' => 'img/Bina Pusaka/Sanctuary/vessel-2.webp', 'num' => '1983', 'title' => 'From Indonesia to the World',
        'desc' => 'Pinisi was introduced at Expo Vancouver 1983 in Canada, marking our global legacy.'],
        ['img' => 'img/Bina Pusaka/Tiger Blue/tiger-blue-phinisi.webp', 'num' => '1998', 'title' => 'Continuing a
        600-Year Legacy',
        'desc' => 'Carrying forward Pinisi craftsmanship combining heritage with modern shipbuilding expertise.'],
        ['img' => 'img/Bina Pusaka/Tiger Blue/vessel-1__1_.webp', 'num' => '1983', 'title' => 'From Indonesia to the
        World',
        'desc' => 'Pinisi was introduced at Expo Vancouver 1983 in Canada, marking our global legacy.'],
        ['img' => 'img/Bina Pusaka/Sanctuary/vessel-10.webp', 'num' => '1998', 'title' => 'Continuing a 600-Year
        Legacy',
        'desc' => 'Carrying forward Pinisi craftsmanship combining heritage with modern shipbuilding expertise.'],
        ] as $item)
        <div class="overflow-hidden flex-shrink-0 h-40 sm:h-44 md:h-56 w-56 sm:w-64 md:w-104">
            <img src="{{ url($item['img']) }}" alt="Kapal Pinisi BP Marine Co" width="416" height="224" loading="lazy"
                decoding="async" class="h-full w-full object-cover">
        </div>
        <div class="border-2 border-accentthird bg-background flex-shrink-0
                    h-40 sm:h-44 md:h-56
                    w-56 sm:w-64 md:w-104
                    px-3 sm:px-3 md:px-4
                    gap-2 sm:gap-3 md:gap-4
                    flex items-center justify-center overflow-hidden">
            <p class="text-3xl sm:text-5xl md:text-6xl text-primary font-medium leading-none flex-shrink-0">
                {{ $item['num'] }}</p>
            <div class="flex flex-col gap-1 sm:gap-2 md:gap-4 min-w-0">
                <p class="text-primary text-xs sm:text-base md:text-lg font-medium leading-tight">{{ $item['title'] }}
                </p>
                <p class="text-xs md:text-sm text-accent leading-snug">{{ $item['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ============================================================ --}}
{{-- OUR FLEET SECTION                                             --}}
{{-- ============================================================ --}}
<section class="px-6 md:px-12 lg:px-16 xl:px-23 py-16 md:py-20 lg:py-32" aria-labelledby="fleet-heading">
    <div class="flex flex-col xl:flex-row gap-6 md:gap-6 xl:gap-59 mb-10 md:mb-14 xl:items-end">
        <div class="overflow-hidden flex items-center gap-4 h-max">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Our Fleet</p>
        </div>
        <div data-aos="custom-blur-up" data-aos-duration="700" class="flex-1">
            <h2 id="fleet-heading" class="text-3xl md:text-4xl lg:text-7xl font-bold text-primary">STORIES AT</h2>
            <div
                class="flex flex-col sm:flex-row gap-2 sm:gap-4 text-3xl md:text-4xl lg:text-7xl font-bold text-primary">
                <span>SEA</span>
                <p class="text-justify text-sm md:text-sm lg:text-lg font-normal text-accentsecond max-w-md self-end">
                    Each project tells a story — of heritage, dedication, and the pursuit of excellence in every vessel
                    we create.
                </p>
            </div>
        </div>
        <div data-aos="custom-zoom-in-up" data-aos-delay="150" class="w-max self-start xl:self-end">
            <a href="/collection" aria-label="Discover Our Fleet of Pinisi vessels"
                class="group bg-secondary relative overflow-hidden text-background px-7 py-3 flex items-center rounded-full shadow-md transition ease-in-out duration-500">
                <span
                    class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                    aria-hidden="true"></span>
                <span class="relative group-hover:text-background text-lg font-base">Discover Our Fleet</span>
            </a>
        </div>
    </div>

    {{-- Fleet Grid --}}
    <div class="w-full columns-1 sm:columns-2 gap-4">
        @foreach($featuredProjects as $index => $project)
        @php $delay = $index * 80; @endphp
        <div data-aos="custom-zoom-in-up" data-aos-duration="600" data-aos-delay="{{ $delay }}"
            class="group cursor-pointer break-inside-avoid mb-4 md:mb-6">
            <a href="{{ route('collection.show', $project->id) }}" aria-label="Lihat detail kapal {{ $project->name }}">
                <div class="mag-area relative overflow-hidden rounded-xl">
                    <img src="{{ url('storage_link/' . $project->cover_image) }}"
                        alt="{{ $project->name }} — Kapal Pinisi buatan BP Marine Co" width="600" height="400"
                        loading="lazy" decoding="async"
                        class="w-full h-auto object-cover hover:scale-110 transition duration-500">
                    <div
                        class="absolute inset-0 flex flex-col justify-end p-4 md:p-8 gap-2 items-center rounded-xl bg-gradient-to-t from-black/80 via-black/20 to-transparent pointer-events-none">
                        <p class="text-base md:text-xl text-white font-base">{{ $project->name }}</p>
                        <p class="text-xs md:text-sm text-white py-1 px-2 rounded-sm bg-white/30 font-medium">
                            {{ $project->year }}</p>
                    </div>
                    <div
                        class="group/item absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                        <div class="group/item mag-btn pointer-events-auto">
                            <div
                                class="flex justify-center items-center relative overflow-hidden bg-black/50 rounded-full w-12 h-12 group-hover/item:w-44 transition-all duration-500">
                                <i class="ti ti-eye absolute text-white text-2xl group-hover/item:opacity-0 group-hover/item:translate-y-[-40px] delay-100 transition ease-in-out duration-300"
                                    aria-hidden="true"></i>
                                <span
                                    class="absolute flex items-center justify-center gap-2 text-white text-2xl opacity-0 group-hover/item:opacity-100 delay-100 ease-in-out duration-300 translate-y-10 transition-all group-hover/item:translate-y-0">
                                    <i class="ti ti-eye-search" aria-hidden="true"></i>
                                    <span class="text-base font-normal shrink-0">View Heritage</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>

{{-- ============================================================ --}}
{{-- VOICES SECTION                                                --}}
{{-- ============================================================ --}}
<section
    class="relative w-full px-6 md:px-12 lg:px-16 xl:px-23 py-16 md:py-20 lg:py-24 flex flex-col gap-12 md:gap-16 lg:gap-32 bg-primary overflow-hidden"
    aria-labelledby="voices-heading">
    <div class="absolute inset-0 pointer-events-none z-0" aria-hidden="true"
        style="display: grid; grid-template-columns: 6% 22% 22% 22% 22% 1fr;">
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
    </div>

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-6 md:mb-10">
        <div class="w-max h-max overflow-hidden flex items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-background shrink-0">
            </div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-background">/Voice Of
                Heritage</p>
        </div>
        <div class="sm:text-right">
            <h2 id="voices-heading" data-aos="custom-blur-up" data-aos-duration="700"
                class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-bold leading-none text-background"
                style="font-family: 'Poppins', sans-serif;">
                VOICES<span
                    style="color:transparent;-webkit-text-stroke:2px var(--color-secondary); font-family: 'Poppins', sans-serif;"><br>OF
                    THE SEA</span>
            </h2>
        </div>
    </div>

    {{-- UNESCO Card --}}
    <div data-aos="custom-zoom-in-up" data-aos-duration="700"
        class="flex flex-col lg:flex-row border border-secondary rounded-xl overflow-hidden">
        <div class="w-full lg:w-1/2 flex flex-col gap-4 p-6 md:p-8 bg-background">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center flex-shrink-0">
                    <i class="ti ti-star text-accentthird" aria-hidden="true"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-primary">Pengakuan UNESCO</p>
                    <p class="text-xs text-accent">Intangible Cultural Heritage</p>
                </div>
                <span
                    class="ml-auto text-xs font-medium bg-primary text-accentthird rounded px-2 py-0.5 flex-shrink-0">2021</span>
            </div>
            <hr class="border-accentthird">
            <p class="text-sm text-accent leading-relaxed">
                <em>Art of Boatbuilding and Seafaring of the Pinisi</em> resmi diakui UNESCO sebagai Warisan
                Budaya Tak Benda umat manusia — mengukuhkan Pinisi sebagai kebanggaan maritim Indonesia di mata dunia.
            </p>
            <div class="flex flex-wrap gap-2">
                <span class="text-xs font-medium px-2 py-0.5 rounded bg-secondary text-background">UNESCO ICH
                    2021</span>
                <span class="text-xs px-2 py-0.5 rounded bg-secondary text-background">Art of Boatbuilding</span>
                <span class="text-xs px-2 py-0.5 rounded bg-secondary text-background">Warisan Budaya Tak Benda</span>
            </div>
        </div>
        <div class="hidden lg:flex w-px bg-accentthird items-center justify-center relative" aria-hidden="true">
            <div
                class="absolute w-8 h-8 rounded-full bg-background border border-accentthird flex items-center justify-center z-10">
                <i class="ti ti-anchor text-secondary" aria-hidden="true"></i>
            </div>
        </div>
        <div class="group relative w-full lg:w-1/2 min-h-[220px] md:min-h-[260px] overflow-hidden block">
            <img src="{{ url('img/Bina Pusaka/Prana/679c9730b8ad5230db05317b.webp') }}"
                alt="Kapal Pinisi Prana — warisan budaya maritim Indonesia" width="512" height="280" loading="lazy"
                decoding="async"
                class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent
                group-hover:from-black/80 group-hover:via-black/50
                transition duration-300 flex flex-col items-center justify-end gap-3 p-6 md:p-8">
                <div
                    class="flex items-center gap-2 bg-black/30 border border-accentthird rounded px-3 py-1 text-xs text-background font-medium tracking-wide">
                    <i class="ti ti-world text-background text-lg" aria-hidden="true"></i>
                    ich.unesco.org
                </div>
                <p class="text-background font-medium text-center text-base leading-snug">
                    Perahu Pinisi<br>dalam Catatan UNESCO
                </p>
                <a href="https://ich.unesco.org/en/RL/pinisi-art-of-boatbuilding-in-south-sulawesi-01197"
                    target="_blank" rel="noopener noreferrer"
                    aria-label="Kunjungi halaman UNESCO tentang Pinisi (membuka tab baru)"
                    class="bg-secondary relative group/item overflow-hidden text-background border px-4 py-2 flex items-center rounded-lg shadow-md transition ease-in-out duration-500">
                    <span
                        class="absolute bg-primary rounded-lg inset-y-0 left-0 w-0 group-hover/item:w-full transition-all duration-300"
                        aria-hidden="true"></span>
                    <span class="relative text-xs font-medium flex items-center">
                        <i class="ti ti-external-link text-lg pr-2" aria-hidden="true"></i>Kunjungi Situs UNESCO
                    </span>
                </a>
            </div>
        </div>
    </div>

    {{-- Quote Card --}}
    <div data-aos="custom-zoom-in-up" data-aos-duration="800"
        class="relative h-80 md:h-[380px] lg:h-140 rounded-xl border border-secondary overflow-hidden bg-background">
        <img src="{{ url('img/Bina Pusaka/Aset/IMG_0668_2.webp') }}" alt="Suasana kapal Pinisi BP Marine Co"
            width="1200" height="560" loading="lazy" decoding="async"
            class="absolute inset-0 w-full h-full object-cover object-top">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-black/20" aria-hidden="true"></div>

        <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="200"
            class="hidden lg:block absolute bottom-8 right-8 w-64 h-80 rounded-xl border-2 border-secondary overflow-hidden z-10">
            <img src="{{ url('img/Bina Pusaka/Aset/IMG_0669.webp') }}"
                alt="Surya Paloh — Tokoh Nasional &amp; Pendiri Media Group" width="320" height="320" loading="lazy"
                decoding="async" class="w-full h-full object-cover object-top scale-120">
        </div>
        {{-- Foto kecil tablet --}}
        <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="200"
            class="hidden md:block lg:hidden absolute bottom-4 right-4 w-40 h-48 rounded-xl border-2 border-secondary overflow-hidden z-10">
            <img src="{{ url('img/Bina Pusaka/Aset/IMG_0669.webp') }}"
                alt="Surya Paloh — Tokoh Nasional &amp; Pendiri Media Group" width="128" height="160" loading="lazy"
                decoding="async" class="w-full h-full object-cover object-top">
        </div>

        <figure data-aos="fade-right" data-aos-duration="700" data-aos-delay="150"
            class="relative z-10 flex flex-col justify-end gap-3 md:gap-4 p-6 md:p-8 h-full w-full md:w-[68%] lg:w-[70%]">
            <span class="text-xs md:text-sm tracking-widest uppercase text-secondary">(Success Project)</span>
            <span class="text-5xl md:text-6xl lg:text-7xl text-secondary font-serif leading-none"
                aria-hidden="true">"</span>
            <blockquote
                class="text-base md:text-lg lg:text-3xl text-background font-light italic leading-relaxed line-clamp-4 md:line-clamp-none">
                Pinisi adalah bukti nyata bahwa Indonesia adalah bangsa pelaut yang besar. Kita harus
                bangga dan terus melestarikan warisan maritim ini untuk generasi mendatang.
            </blockquote>
            <figcaption class="flex items-center gap-3 pt-3 md:pt-4 border-t border-secondary/40">
                <div class="w-6 md:w-8 h-px bg-secondary flex-shrink-0" aria-hidden="true"></div>
                <div class="flex flex-col">
                    <span class="text-base md:text-lg font-medium text-background">Surya Paloh</span>
                    <span class="text-xs md:text-sm text-secondary uppercase tracking-widest mt-1">
                        Tokoh Nasional &amp; Pendiri Media Group
                    </span>
                </div>
            </figcaption>
        </figure>
    </div>
</section>

{{-- ============================================================ --}}
{{-- TESTIMONIAL SECTION                                           --}}
{{-- ============================================================ --}}
@php
$countryNames = [
'ID' => 'Indonesia', 'AU' => 'Australia', 'JP' => 'Japan',
'FR' => 'France', 'MX' => 'Mexico', 'IE' => 'Ireland',
'SE' => 'Sweden', 'US' => 'United States', 'GB' => 'United Kingdom',
'DE' => 'Germany', 'NL' => 'Netherlands', 'IT' => 'Italy',
'ES' => 'Spain', 'SG' => 'Singapore', 'MY' => 'Malaysia',
'CN' => 'China', 'KR' => 'South Korea', 'IN' => 'India',
'BR' => 'Brazil', 'ZA' => 'South Africa', 'NZ' => 'New Zealand',
'CA' => 'Canada', 'RU' => 'Russia', 'AE' => 'United Arab Emirates',
'SA' => 'Saudi Arabia', 'TH' => 'Thailand', 'PH' => 'Philippines',
'VN' => 'Vietnam', 'PT' => 'Portugal', 'CH' => 'Switzerland',
];
@endphp

<section class="px-6 md:px-12 lg:px-16 xl:px-23 py-16 md:py-20 lg:py-32 flex flex-col gap-12 md:gap-16 lg:gap-40"
    aria-label="Testimonial dari klien BP Marine Co">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-6 md:mb-10">
        <div class="w-max h-max overflow-hidden flex items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Testimonial</p>
        </div>
        <div class="sm:text-right">
            <h2 data-aos="custom-blur-up" data-aos-duration="700"
                class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-bold leading-none text-primary"
                style="font-family: 'Poppins', sans-serif;">
                WORLD<span
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;"><br>OF
                    SUPPORT</span>
            </h2>
        </div>
    </div>

    @if ($testimonials->count() > 0)
    <div data-aos="custom-zoom-in-up" data-aos-duration="700" class="flex flex-col md:flex-row items-stretch gap-0">
        {{-- Foto sticky — tablet pakai ukuran lebih kecil --}}
        <div class="hidden md:block sticky top-8 flex-shrink-0 w-44 lg:w-72" aria-hidden="true">
            <div class="w-full h-[55vh] lg:h-[65vh] rounded-2xl overflow-hidden bg-primary relative">
                @foreach ($testimonials as $index => $item)
                <img src="{{ $item->photo ? Storage::url($item->photo) : asset('img/default-avatar.png') }}"
                    alt="{{ $item->name }}" width="288" height="520" loading="lazy" decoding="async"
                    data-photo="{{ $index }}"
                    class="absolute inset-0 w-full h-full object-cover object-top transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                @endforeach
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
                    aria-hidden="true"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 md:p-5">
                    @foreach ($testimonials as $index => $item)
                    <div data-info="{{ $index }}"
                        class="transition-opacity flex flex-col gap-1 duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0 absolute' }}">
                        <p class="text-xs md:text-sm font-medium text-background leading-snug">
                            {{ Str::limit($item->quote, 80) }}</p>
                        <p class="text-xs text-accentsecond">— {{ $item->name }}</p>
                        @if ($item->country)
                        <p class="text-xs text-accentthird">{{ $countryNames[$item->country] ?? $item->country }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex-1 min-w-0">
            <div id="testimonial-scroll"
                class="overflow-x-auto rounded-2xl md:ml-4 lg:ml-6 pr-2 md:pr-6 lg:pr-8 cursor-grab active:cursor-grabbing select-none"
                style="-ms-overflow-style: none; scrollbar-width: none;" role="list"
                aria-label="Daftar testimonial klien">
                <div class="flex gap-3 md:gap-3 lg:gap-4 w-max items-stretch">
                    @foreach ($testimonials as $index => $item)
                    <article data-card="{{ $index }}" role="listitem"
                        class="w-60 md:w-64 lg:w-72 bg-background border border-accentsecond rounded-2xl p-4 md:p-5 lg:p-6 flex flex-col justify-between min-h-[320px] md:min-h-[380px] lg:min-h-[420px] flex-shrink-0 transition-all duration-500 group hover:bg-primary hover:border-primary cursor-pointer">
                        <div>
                            <p class="text-3xl text-secondary font-serif leading-none mb-4" aria-hidden="true">"</p>
                            <blockquote
                                class="text-sm text-accent italic leading-relaxed group-hover:text-background duration-500">
                                {{ $item->quote }}
                            </blockquote>
                        </div>
                        <footer class="flex flex-col gap-3 pt-4 mt-4 border-t border-secondary">
                            <div
                                class="w-12 h-12 md:w-14 md:h-14 lg:w-16 lg:h-16 rounded-xl overflow-hidden border border-secondary flex-shrink-0">
                                <img src="{{ $item->photo ? Storage::url($item->photo) : asset('img/default-avatar.png') }}"
                                    alt="Foto {{ $item->name }}" width="64" height="64" loading="lazy" decoding="async"
                                    class="w-full h-full object-cover object-top">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-sm font-medium text-primary group-hover:text-background duration-500">
                                    {{ $item->name }}</p>
                                <p class="text-xs text-accent group-hover:text-accentthird duration-500">
                                    {{ $item->position }}</p>
                                @if ($item->country)
                                <p class="text-xs text-accentsecond group-hover:text-secondary duration-500">
                                    {{ $countryNames[$item->country] ?? $item->country }}
                                </p>
                                @endif
                            </div>
                        </footer>
                    </article>
                    @endforeach
                </div>
            </div>
            <div id="testimonial-dots" class="flex items-center gap-2 pl-2 md:pl-4 lg:pl-8 mt-4" role="tablist"
                aria-label="Navigasi testimonial">
                @foreach ($testimonials as $index => $item)
                <div data-dot="{{ $index }}" role="tab" aria-label="Testimonial {{ $index + 1 }} dari {{ $item->name }}"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                    class="h-1 rounded-full transition-all duration-500 {{ $index === 0 ? 'w-6 bg-secondary' : 'w-2 bg-accentthird' }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <div data-aos="custom-zoom-in-up"
        class="flex flex-col items-center justify-center gap-6 py-16 md:py-24 border-2 bg-background border-accentsecond rounded-2xl">
        <div class="flex items-center justify-center w-20 h-20 rounded-full border-2 border-accentsecond">
            <i class="ti ti-message-circle text-4xl text-accentsecond" aria-hidden="true"></i>
        </div>
        <div class="flex flex-col items-center gap-2 text-center">
            <p class="text-xl md:text-2xl text-primary font-medium">Testimonials Coming Soon</p>
            <p class="text-sm text-accent max-w-sm">We are gathering stories from our clients. Be the first to share
                your experience with us.</p>
        </div>
        <a href="/contact" aria-label="Contact us — Get in touch with BP Marine Co"
            class="bg-secondary relative group overflow-hidden text-background px-6 py-3 flex items-center rounded-full shadow-md transition ease-in-out duration-500">
            <span
                class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                aria-hidden="true"></span>
            <span class="relative text-sm font-medium">Get In Touch</span>
        </a>
    </div>
    @endif
</section>

{{-- ============================================================ --}}
{{-- FAQ SECTION                                                   --}}
{{-- ============================================================ --}}
<section class="w-full px-6 md:px-12 lg:px-16 xl:px-23 y-16 md:py-20 lg:py-32" aria-labelledby="faq-heading">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10 md:mb-14">
        <div class="overflow-hidden flex items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Frequently Asked
                Questions</p>
        </div>
        <div class="sm:text-right">
            <h2 id="faq-heading" data-aos="custom-blur-up" data-aos-duration="700"
                class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-bold leading-none text-primary"
                style="font-family: 'Poppins', sans-serif;">
                COMMON <span
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;"><br>QUESTIONS</span>
            </h2>
        </div>
    </div>

    @php
    $faqs = [
    ['q' => 'How long does it take to build a Pinisi vessel?',
    'a' => 'Build time varies depending on the size and complexity of the vessel. On average, a standard Pinisi takes
    between 12 to 24 months to complete. Larger luxury vessels with custom specifications may take up to 36 months. We
    provide a detailed timeline during the consultation phase.'],
    ['q' => 'Can I customize the design and specifications of my vessel?',
    'a' => 'Absolutely. Every vessel we build is tailor-made. From hull dimensions and deck layout to interior finish
    and onboard systems — all specifications can be customized to your requirements and preferences.'],
    ['q' => 'What type of wood is used in the construction?',
    'a' => 'We primarily use ironwood (ulin) and teak — both renowned for durability and resistance to saltwater. All
    timber is sourced from certified, sustainable suppliers to ensure quality and environmental responsibility.'],
    ['q' => 'Do you assist with international shipping and documentation?',
    'a' => 'Yes. We handle all necessary paperwork including vessel registration, export permits, and flag state
    certification. Our team coordinates with international agents to ensure a smooth delivery process to your
    destination port.'],
    ['q' => 'What is the price range for a Pinisi vessel?',
    'a' => 'Pricing varies widely based on size, materials, and level of customization. We offer a transparent quotation
    process — contact us with your requirements and we will provide a detailed breakdown with no hidden costs.'],
    ['q' => 'Is it possible to visit the shipyard during construction?',
    'a' => 'We welcome client visits at our shipyard in Sulawesi at any stage of the build. We believe in full
    transparency and encourage our clients to witness the craftsmanship firsthand. Site visits can be arranged by
    appointment.'],
    ];
    @endphp

    <div class="flex flex-col gap-2" x-data="{ active: null }">
        @foreach($faqs as $index => $faq)
        @php $faqDelay = $index * 60; @endphp
        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $faqDelay }}"
            class="group relative border rounded-lg overflow-hidden cursor-pointer transition-all duration-500"
            :class="active === {{ $index }} ? 'bg-primary border-background' : 'bg-background border-accentsecond'"
            @click="active === {{ $index }} ? active = null : active = {{ $index }}" role="button"
            :aria-expanded="active === {{ $index }} ? 'true' : 'false'" :aria-label="'{{ addslashes($faq['q']) }}'">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary rounded-l-lg transition-all duration-500"
                :class="active === {{ $index }} ? 'opacity-100 w-1' : 'opacity-0 w-0 group-hover:opacity-100 group-hover:w-1'"
                aria-hidden="true"></div>
            <div class="flex items-center gap-3 md:gap-4 px-3 md:px-4 py-3 md:py-4 select-none">
                <span
                    class="font-bold text-xl sm:text-2xl md:text-3xl leading-none flex-shrink-0 w-7 sm:w-9 md:w-11 transition-colors duration-500"
                    :class="active === {{ $index }} ? 'text-background' : 'text-primary'"
                    style="font-family: 'Poppins', sans-serif; letter-spacing: 0.02em;" aria-hidden="true">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>
                <span
                    class="flex-1 text-sm sm:text-base md:text-base lg:text-lg font-medium leading-snug transition-colors duration-500"
                    :class="active === {{ $index }} ? 'text-background' : 'text-accent'">
                    {{ $faq['q'] }}
                </span>
                <div class="p-2 sm:p-3 md:p-3 lg:p-4 rounded-full border flex items-center justify-center flex-shrink-0 transition-all duration-500"
                    :class="active === {{ $index }} ? 'bg-secondary border-background' : 'bg-transparent border-accentsecond'">
                    <i class="ti ti-chevron-down text-lg transition-transform duration-500"
                        :class="active === {{ $index }} ? 'rotate-180 text-background' : 'rotate-0 text-accentsecond'"
                        aria-hidden="true"></i>
                </div>
            </div>
            <div x-show="active === {{ $index }}" x-collapse
                x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div
                    class="px-10 md:px-12 pb-5 ml-3 md:ml-7 text-sm sm:text-base md:text-base lg:text-lg text-accentthird leading-relaxed font-light">
                    {{ $faq['a'] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100"
        class="mt-6 md:mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 sm:gap-0">
        <span class="text-lg text-accent tracking-wide">Still have questions?</span>
        <a href="/contact" aria-label="Contact us with your questions about BP Marine Co"
            class="group relative overflow-hidden px-6 py-2 mr-3 bg-secondary rounded-full text-background w-max">
            <span
                class="absolute rounded-full inset-y-0 left-0 w-0 bg-primary transition-all duration-500 group-hover:w-full"
                aria-hidden="true"></span>
            <span
                class="flex items-center gap-2 text-md text-background font-medium relative z-10 group-hover:text-white transition">
                Contact Us <i class="ti ti-arrow-up-right" aria-hidden="true"></i>
            </span>
        </a>
    </div>
</section>

@endsection