@extends('layouts.app')

@section('title', 'About BPMarine.Co — Pinisi Shipyard Since 1998')

@section('og_title', 'About BPMarine.Co — Traditional Pinisi Shipyard Since 1998')

@section('meta_description', 'Learn the story behind BPMarine.Co — a family-rooted Pinisi shipyard in Bulukumba, South
Sulawesi, dedicated to preserving the art of traditional Indonesian boatbuilding since 1998.')

@section('og_image', url('img/Aset/BINA PUSAKA.jpg'))

@push('preload')
<link rel="preload" as="image" href="{{ url('img/The Maj Oceanic/TMO-Areal-view-scaled-e1664971034548 (2).webp') }}"
    fetchpriority="high" type="image/webp">
@endpush

@section('content')

{{-- ============================================================ --}}
{{-- HERO SECTION                                                  --}}
{{-- ============================================================ --}}
<section class="relative flex w-full xl:min-h-screen overflow-hidden px-6 md:px-12 lg:px-16 xl:px-23 py-8"
    aria-label="Hero — About BP Marine Co">

    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden flex top-99 md:top-64 lg:top-104 xl:top-64"
        aria-hidden="true">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
            <p
                style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </p>
        </div>
    </div>

    {{-- ── Mobile ──────────────────────────────────────────────────────────── --}}
    <div class="relative z-10 flex flex-col md:hidden gap-5 pt-4 w-full">
        <div data-aos="custom-blur-up">
            <h1 class="text-6xl sm:text-7xl text-primary font-extrabold leading-none"
                style="font-family: 'Poppins', sans-serif;">About</h1>
            <span class="text-6xl sm:text-7xl font-extrabold leading-none"
                style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;"
                aria-hidden="true">Us</span>
        </div>

        <p data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" class="text-base text-primary font-medium">
            Crafted Since 1998 — <span class="text-accent">Since 1998, Bina Pusaka has built more than 20 Pinisi vessels
                — preserving tradition while delivering vessels for modern maritime needs.</span>
        </p>

        <a data-aos="custom-zoom-in-up" data-aos-delay="150" href="/collection"
            aria-label="View Our Collection of Pinisi vessels"
            class="bg-secondary relative group overflow-hidden text-background px-6 py-3 flex justify-center items-center rounded-full shadow-md w-fit transition ease-in-out duration-500">
            <span
                class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                aria-hidden="true"></span>
            <span class="relative group-hover:text-background text-md font-base">View Our Collection</span>
        </a>

        <div data-aos="fade-up" data-aos-delay="200" class="flex gap-4">
            <a href="https://www.tiktok.com/@ud.binapusakapinisi?is_from_webapp=1&sender_device=pc"
                aria-label="Ikuti BP Marine Co di TikTok"
                class="bg-secondary relative group overflow-hidden text-background w-10 h-10 flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                <span
                    class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                    aria-hidden="true"></span>
                <i class="ti ti-brand-tiktok relative group-hover:text-background text-xl" aria-hidden="true"></i>
            </a>
            <a href="https://www.instagram.com/bpmarineco_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                aria-label="Ikuti BP Marine Co di Instagram"
                class="bg-secondary relative group overflow-hidden text-background w-10 h-10 flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                <span
                    class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                    aria-hidden="true"></span>
                <i class="ti ti-brand-instagram relative group-hover:text-background text-xl" aria-hidden="true"></i>
            </a>
            <a href="#" aria-label="LinkedIn BP Marine Co (segera hadir)" aria-disabled="true"
                class="bg-secondary relative group overflow-hidden text-background w-10 h-10 flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                <span
                    class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                    aria-hidden="true"></span>
                <i class="ti ti-brand-linkedin relative group-hover:text-background text-xl font-bold"
                    aria-hidden="true"></i>
            </a>
        </div>

        <div data-aos="custom-zoom-in-up" data-aos-delay="200"
            class="rounded-2xl overflow-hidden h-56 sm:h-64 w-full mt-24">
            <img src="{{ url('img/Tiger Blue/tiger-blue-phinisi.webp') }}"
                alt="Kapal Pinisi Tiger Blue — buatan BP Marine Co Bulukumba" width="600" height="256" loading="eager"
                fetchpriority="high" decoding="sync"
                class="h-full w-full object-cover hover:scale-110 transition duration-500">
        </div>
    </div>

    {{-- ── Desktop ──────────────────────────────────────────────────────────── --}}
    <div class="relative z-10 hidden md:flex items-stretch w-full md:h-[62vh] lg:h-[62vh] xl:h-[120vh]">
        <div data-aos="custom-blur-up" class="flex flex-col flex-1 justify-between py-4">
            <div>
                <h1 class="text-[80px] lg:text-[180px] text-primary font-extrabold leading-none"
                    style="font-family: 'Poppins', sans-serif;">About</h1>
                <span class="block text-[80px] lg:text-[180px] text-accent font-extrabold leading-none"
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;"
                    aria-hidden="true">Us</span>
            </div>
            <div class="flex gap-6 xl:gap-23 w-full">
                <div data-aos="custom-zoom-in-up" data-aos-delay="150" class="w-[24vw] xl:w-[16vw] flex-shrink-0">
                    <a href="/collection" aria-label="View Our Collection of Pinisi vessels"
                        class="bg-secondary relative group overflow-hidden text-background px-4 lg:px-6 py-3 flex justify-center items-center rounded-full shadow-md transition ease-in-out duration-500">
                        <span
                            class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                            aria-hidden="true"></span>
                        <span class="relative group-hover:text-background text-sm lg:text-lg font-base">View Our
                            Collection</span>
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="flex-1">
                    <p class="text-base lg:text-xl text-primary font-medium">Crafted Since 1998 —
                        <span class="text-accent">Since 1998, Bina Pusaka has built more than 20 Pinisi vessels —
                            preserving tradition while delivering vessels for modern maritime needs.</span>
                    </p>
                </div>
            </div>
        </div>

        <div
            class="flex-shrink-0 w-[35%] lg:w-[30%] flex flex-col gap-4 lg:gap-8 ml-8 lg:ml-16 pt-4 lg:pt-32 h-full min-h-0">
            <div data-aos="fade-down" data-aos-duration="500" class="flex-shrink-0">
                <p class="text-lg lg:text-xl text-accent font-medium">/At Sea With Us</p>
            </div>
            <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100"
                class="flex gap-6 lg:gap-10 flex-shrink-0">
                <a href="https://www.tiktok.com/@ud.binapusakapinisi?is_from_webapp=1&sender_device=pc"
                    aria-label="Ikuti BP Marine Co di TikTok"
                    class="bg-secondary relative group overflow-hidden text-background w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-full shadow-md shadow-black/30 transition ease-in-out duration-500">
                    <span
                        class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                        aria-hidden="true"></span>
                    <i class="ti ti-brand-tiktok relative group-hover:text-background text-xl lg:text-2xl"
                        aria-hidden="true"></i>
                </a>
                <a href="https://www.instagram.com/bpmarineco_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                    aria-label="Ikuti BP Marine Co di Instagram"
                    class="bg-secondary relative group overflow-hidden text-background w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-full shadow-md shadow-black/30 transition ease-in-out duration-500">
                    <span
                        class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                        aria-hidden="true"></span>
                    <i class="ti ti-brand-instagram relative group-hover:text-background text-xl lg:text-2xl"
                        aria-hidden="true"></i>
                </a>
                <a href="#" aria-label="LinkedIn BP Marine Co (segera hadir)" aria-disabled="true"
                    class="bg-secondary relative group overflow-hidden text-background w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-full shadow-md shadow-black/30 transition ease-in-out duration-500">
                    <span
                        class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                        aria-hidden="true"></span>
                    <i class="ti ti-brand-linkedin relative group-hover:text-background text-xl lg:text-2xl font-bold"
                        aria-hidden="true"></i>
                </a>
            </div>
            <div data-aos="custom-zoom-in-up" data-aos-duration="800" data-aos-delay="100"
                class="flex-1 min-h-0 rounded-2xl overflow-hidden">
                <img src="{{ url('img/The_Maj_Oceanic/TMO-Areal-view-scaled-e1664971034548__2_.webp') }}"
                    alt="Aerial view kapal Pinisi The Maj Oceanic — buatan BP Marine Co" width="480" height="640"
                    loading="eager" fetchpriority="high" decoding="sync"
                    class="h-full w-full object-cover hover:scale-110 transition duration-500">
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- WHO WE ARE SECTION                                            --}}
{{-- ============================================================ --}}
<section class="flex flex-col gap-6 md:gap-8 w-full px-6 md:px-12 lg:px-16 xl:px-23 py-12 md:py-16"
    aria-labelledby="who-we-are-heading">
    <div class="overflow-hidden flex items-center gap-4">
        <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
        <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Who We Are</p>
    </div>
    <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-14">
        <div data-aos="custom-blur-up" data-aos-duration="700" class="w-full md:w-[40vw]">
            <h2 id="who-we-are-heading"
                class="text-4xl md:text-[4vw] lg:text-[6vw] text-primary font-extrabold leading-none"
                style="font-family: 'Poppins', sans-serif;">Where It All</h2>
            <span class="block text-4xl md:text-[4vw] lg:text-[6vw] text-accent font-extrabold leading-none"
                style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                Begins</span>
        </div>
        <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="w-full md:w-[43vw]">
            <p class="text-base md:text-lg lg:text-2xl text-primary font-medium">
                Bina Pusaka is a traditional shipyard based in Bulukumba, Indonesia —
                <span class="text-accent">the heart of Pinisi craftsmanship. We specialize in building authentic wooden
                    vessels, combining heritage techniques with modern engineering.</span>
            </p>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- STORY / TIMELINE SECTION                                      --}}
{{-- ============================================================ --}}
<section
    class="relative w-full rounded-b-4xl h-400 md:h-440 lg:h-480 xl:h-420 px-5 sm:px-8 md:px-12 lg:px-16 xl:px-23 py-12 lg:py-20 xl:py-24 bg-primary overflow-hidden"
    id="story-section" aria-labelledby="story-heading">

    <div class="absolute inset-0 pointer-events-none z-0 hidden sm:block" aria-hidden="true"
        style="display: grid; grid-template-columns: 6% 22% 22% 22% 22% 1fr;">
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
    </div>

    {{-- Header + Stats --}}
    <div
        class="relative z-10 flex flex-col xl:flex-row xl:items-end xl:justify-between gap-6 xl:gap-8 mb-10 lg:mb-16 xl:mb-20">
        <div>
            <h2 id="story-heading" data-aos="custom-blur-up" data-aos-duration="700"
                class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-background leading-tight"
                style="font-family: 'Poppins', sans-serif;">
                600 Years in the Making
            </h2>
            <p data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                class="mt-3 text-sm sm:text-base md:text-lg text-secondary max-w-md">
                From the shores of Sulawesi to the world's oceans — a living tradition of Pinisi craftsmanship.
            </p>
        </div>

        {{-- Stats --}}
        <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="150"
            class="flex flex-row gap-2 sm:gap-3 md:gap-4 flex-shrink-0 flex-wrap sm:flex-nowrap">
            @foreach([
            ['num' => 20, 'suffix' => '+', 'label' => 'Ships Built'],
            ['num' => 25, 'suffix' => '+', 'label' => 'Years of Excellence'],
            ['num' => 600, 'suffix' => '', 'label' => 'Years of Pinisi Heritage'],
            ] as $stat)
            <div class="flex flex-col justify-between border bg-primary border-accentsecond rounded-xl px-4 sm:px-5 py-3 sm:py-4 stat-item flex-1 sm:flex-none sm:min-w-[120px]"
                data-target="{{ $stat['num'] }}" data-suffix="{{ $stat['suffix'] }}">
                <div class="flex items-baseline gap-0.5">
                    <span
                        class="stat-number text-2xl sm:text-3xl md:text-4xl font-bold text-background transition-all duration-300">0</span>
                    <span class="text-lg sm:text-xl md:text-2xl font-bold text-secondary">{{ $stat['suffix'] }}</span>
                </div>
                <p class="text-[9px] sm:text-[10px] uppercase tracking-[2px] text-accentthird font-medium mt-1 sm:mt-2">
                    {{ $stat['label'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>

    @php
    $milestones = [
    ['year' => '1983', 'sublabel' => 'Expo Vancouver', 'badge' => 'Milestone', 'icon' => 'ti-map-pin', 'active' =>
    false, 'side' => 'left', 'title' => 'From Indonesia to the World', 'desc' => 'Pinisi introduced at Expo Vancouver,
    Canada — marking our global debut and proving Indonesian craftsmanship belongs on the world stage.'],
    ['year' => '1998', 'sublabel' => 'Bulukumba, ID', 'badge' => 'Founded', 'icon' => 'ti-anchor', 'active' => false,
    'side' => 'right', 'title' => 'BP Marine Co. Established', 'desc' => 'Continuing a 600-year legacy of Pinisi
    craftsmanship, combining generations of heritage with modern shipbuilding expertise.'],
    ['year' => '2021', 'sublabel' => 'UNESCO ICH', 'badge' => 'Recognition', 'icon' => 'ti-award', 'active' => false,
    'side' => 'left', 'title' => 'UNESCO Cultural Heritage', 'desc' => "Pinisi officially listed as Intangible Cultural
    Heritage of Humanity — a testament to the craft we've dedicated our lives to preserving."],
    ['year' => 'Now', 'sublabel' => 'Global Reach', 'badge' => 'Today', 'icon' => 'ti-ship', 'active' => true, 'side' =>
    'right', 'title' => '25+ Years, 20+ Vessels', 'desc' => 'Building heritage-grade Pinisi for discerning clients
    across the globe. Every vessel is a chapter in a story that spans six centuries.'],
    ];
    @endphp

    <div class="relative z-10" id="timeline-wrapper">
        {{-- Vertical center line (desktop only) --}}
        <div class="absolute left-1/2 -translate-x-1/2 top-0 bottom-0 w-px bg-accent overflow-hidden pointer-events-none hidden md:block"
            aria-hidden="true">
            <div id="timeline-line-fill" class="w-full bg-secondary transition-all duration-1000 ease-out"
                style="height: 0%;"></div>
        </div>
        {{-- Mobile: left line --}}
        <div class="absolute left-4 top-0 bottom-0 w-px bg-accent overflow-hidden pointer-events-none md:hidden"
            aria-hidden="true">
            <div id="timeline-line-fill-mobile" class="w-full bg-secondary transition-all duration-1000 ease-out"
                style="height: 0%;"></div>
        </div>

        @foreach($milestones as $index => $item)
        @php $cardOnLeft = $item['side'] === 'left'; @endphp

        {{-- ── MOBILE ── --}}
        <div class="md:hidden timeline-item-mobile group relative border-t border-accent last:border-b last:border-accent
            cursor-pointer transition-colors duration-300 pl-12 pr-4 py-5
            {{ $item['active'] ? 'bg-secondary/3 hover:bg-secondary/10' : 'hover:bg-accent/5' }}"
            style="opacity: 0; transform: translateY(16px);
                   transition: opacity .5s ease {{ $index * 120 }}ms, transform .5s ease {{ $index * 120 }}ms, background-color .3s ease;">

            <div class="absolute left-[2px] top-1/2 -translate-y-1/2 flex items-center justify-center" style="transform: scale(0) translateY(-50%); opacity: 0;
                       transition: transform .4s cubic-bezier(.34,1.56,.64,1) {{ $index * 120 + 200 }}ms,
                                   opacity .3s ease {{ $index * 120 + 200 }}ms;" data-dot data-dot-index="{{ $index }}"
                aria-hidden="true">
                <div
                    class="dot-inner w-7 h-7 rounded-lg flex items-center justify-center transition-all duration-500 ease-out
                    {{ $item['active'] ? 'bg-secondary' : 'bg-primary border-2 border-accentsecond group-hover:border-secondary group-hover:bg-secondary' }}">
                    <i class="ti {{ $item['icon'] }} text-xs transition-colors duration-300
                        {{ $item['active'] ? 'text-primary' : 'text-accentsecond group-hover:text-primary' }}"
                        aria-hidden="true"></i>
                </div>
            </div>

            <div class="flex items-center gap-2 mb-2">
                <span class="text-xl sm:text-2xl font-extrabold tabular-nums leading-none transition-colors duration-300
                    {{ $item['active'] ? 'text-secondary' : 'text-background group-hover:text-secondary' }}"
                    style="font-family: 'Poppins', sans-serif;">{{ $item['year'] }}</span>
                <span class="text-[9px] uppercase tracking-[1.5px] transition-colors duration-300
                    {{ $item['active'] ? 'text-secondary/60' : 'text-accentsecond' }}">{{ $item['sublabel'] }}</span>
                <span
                    class="ml-auto text-[9px] uppercase tracking-[2px] font-semibold px-2 py-0.5 rounded-full border
                    {{ $item['active'] ? 'border-secondary/40 text-secondary' : 'border-accentsecond text-accentsecond' }}">
                    {{ $item['badge'] }}
                </span>
            </div>

            <div
                class="border rounded-xl px-4 py-4 transition-all duration-300
                {{ $item['active'] ? 'bg-primary border-secondary group-hover:bg-secondary/80 group-hover:border-background' : 'bg-primary border-accentsecond group-hover:border-secondary' }}">
                <h3
                    class="text-base font-bold mb-1 leading-snug transition-colors duration-300
                    {{ $item['active'] ? 'text-secondary group-hover:text-background' : 'text-background group-hover:text-secondary' }}">
                    {{ $item['title'] }}
                </h3>
                <p
                    class="text-sm text-accentsecond leading-relaxed transition-colors duration-300 group-hover:text-secondbackground">
                    {{ $item['desc'] }}
                </p>
            </div>
        </div>

        {{-- ── DESKTOP ── --}}
        <div class="hidden md:grid timeline-item group relative items-center border-t border-accent last:border-b last:border-accent
            cursor-pointer transition-colors duration-300
            {{ $item['active'] ? 'bg-secondary/3 hover:bg-secondary/10' : 'hover:bg-accent/5' }}"
            style="grid-template-columns: 1fr 56px 1fr; min-height: 110px;
                opacity: 0; transform: translateY(16px);
                transition: opacity .5s ease {{ $index * 120 }}ms, transform .5s ease {{ $index * 120 }}ms, background-color .3s ease;">

            {{-- LEFT COLUMN --}}
            <div class="flex justify-end pr-6 py-7 min-w-0">
                @if($cardOnLeft)
                <div
                    class="w-full border rounded-xl px-5 lg:px-6 py-4 lg:py-5 transition-all duration-300
                    {{ $item['active'] ? 'bg-secondary/5 border-secondary/35 group-hover:bg-secondary/20 group-hover:border-secondary/60' : 'bg-primary border-accentsecond group-hover:border-secondary group-hover:bg-primary' }}">
                    <span class="text-xs uppercase tracking-[2.5px] font-semibold block mb-2 transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary' : 'text-accentsecond group-hover:text-secondary' }}">
                        {{ $item['badge'] }}
                    </span>
                    <h3 class="text-lg lg:text-xl font-bold mb-2 leading-snug transition-colors duration-300
                        {{ $item['active'] ? 'text-background' : 'text-background group-hover:text-secondary' }}">
                        {{ $item['title'] }}
                    </h3>
                    <p
                        class="text-sm lg:text-md text-accentsecond leading-relaxed transition-colors duration-300 group-hover:text-secondbackground">
                        {{ $item['desc'] }}
                    </p>
                </div>
                @else
                <div class="flex flex-col items-end transition-all duration-300 group-hover:-translate-x-1">
                    <span class="text-3xl md:text-4xl lg:text-5xl font-extrabold tabular-nums leading-none transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary' : 'text-background group-hover:text-secondary' }}"
                        style="font-family: 'Poppins', sans-serif;">{{ $item['year'] }}</span>
                    <span class="text-xs uppercase tracking-[1.5px] mt-2 transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary/60' : 'text-accentsecond group-hover:text-background' }}">
                        {{ $item['sublabel'] }}
                    </span>
                </div>
                @endif
            </div>

            {{-- CENTER DOT --}}
            <div class="flex items-center justify-center" data-dot data-dot-index="{{ $index }}" aria-hidden="true"
                style="transform: scale(0); opacity: 0;
                       transition: transform .4s cubic-bezier(.34,1.56,.64,1) {{ $index * 120 + 200 }}ms,
                                   opacity .3s ease {{ $index * 120 + 200 }}ms;">
                <div
                    class="dot-inner w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-500 ease-out
                    {{ $item['active'] ? 'bg-secondary group-hover:scale-110 group-hover:rounded-2xl' : 'bg-primary border-2 border-accentsecond group-hover:border-secondary group-hover:bg-secondary group-hover:scale-110 group-hover:rounded-2xl' }}">
                    <i class="ti {{ $item['icon'] }} text-base transition-colors duration-300
                        {{ $item['active'] ? 'text-primary' : 'text-accentsecond group-hover:text-primary' }}"
                        aria-hidden="true"></i>
                </div>
            </div>

            {{-- RIGHT COLUMN --}}
            <div class="flex justify-start pl-6 py-7 min-w-0">
                @if(!$cardOnLeft)
                <div
                    class="w-full border rounded-xl px-5 lg:px-6 py-4 lg:py-5 transition-all duration-300
                    {{ $item['active'] ? 'bg-primary border-secondary group-hover:bg-secondary/80 group-hover:border-secondbackground' : 'bg-primary border-accentsecond group-hover:border-secondary group-hover:bg-primary' }}">
                    <span
                        class="text-xs uppercase tracking-[2.5px] font-semibold block mb-2 transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary group-hover:text-background' : 'text-background group-hover:text-secondary' }}">
                        {{ $item['badge'] }}
                    </span>
                    <h3
                        class="text-lg lg:text-xl font-bold mb-2 leading-snug transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary group-hover:text-background' : 'text-background group-hover:text-secondary' }}">
                        {{ $item['title'] }}
                    </h3>
                    <p
                        class="text-sm lg:text-md text-accentsecond leading-relaxed transition-colors duration-300 group-hover:text-background">
                        {{ $item['desc'] }}
                    </p>
                </div>
                @else
                <div class="flex flex-col items-start transition-all duration-300 group-hover:translate-x-1">
                    <span class="text-3xl md:text-4xl lg:text-5xl font-extrabold tabular-nums leading-none transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary' : 'text-background group-hover:text-secondary' }}"
                        style="font-family: 'Poppins', sans-serif;">{{ $item['year'] }}</span>
                    <span class="text-[10px] uppercase tracking-[1.5px] mt-2 transition-colors duration-300
                        {{ $item['active'] ? 'text-secondary/60' : 'text-accentsecond group-hover:text-background' }}">
                        {{ $item['sublabel'] }}
                    </span>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ============================================================ --}}
{{-- CHARTING THE FUTURE SECTION                                   --}}
{{-- ============================================================ --}}
<section
    class="w-full -mt-72 md:-mt-80 lg:-mt-104 xl:-mt-88 px-6 md:px-12 lg:px-16 xl:px-23 pb-16 xl:pb-32 overflow-hidden"
    aria-labelledby="future-heading">
    <div class="overflow-hidden flex items-center gap-4">
        <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-background shrink-0"></div>
        <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-background">/Charting The Future
        </p>
    </div>
    <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-14 py-10 md:py-14">
        <div data-aos="custom-blur-up" data-aos-duration="700" class="w-full md:w-[40vw]">
            <h2 id="future-heading"
                class="text-4xl md:text-[4vw] lg:text-[6vw] text-background font-extrabold leading-none"
                style="font-family: 'Poppins', sans-serif;">The Future</h2>
            <span class="block text-4xl md:text-[4vw] lg:text-[6vw] text-secondary font-extrabold leading-none"
                style="color:transparent;-webkit-text-stroke:2px var(--color-secondary); font-family: 'Poppins', sans-serif;">
                We Build</span>
        </div>
        <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="w-full md:w-[43vw]">
            <blockquote class="text-base md:text-lg lg:text-2xl text-accentsecond font-medium">
                "We stand where tradition meets ambition. Every Pinisi we craft carries the wisdom of generations into
                the waters of the modern world."
            </blockquote>
        </div>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 -mt-6 gap-4 md:gap-5">
        @foreach([
        ['idx' => '01', 'icon' => 'ti-hammer', 'title' => 'Preserving authentic Pinisi craftsmanship', 'desc' =>
        'Traditional techniques passed down through generations of master builders from Sulawesi.'],
        ['idx' => '02', 'icon' => 'ti-refresh', 'title' => 'Blending tradition with modern innovation', 'desc' =>
        'Contemporary standards and technology without compromising 600 years of cultural authenticity.'],
        ['idx' => '03', 'icon' => 'ti-ship', 'title' => 'Building vessels for today and the future', 'desc' =>
        'Delivering durable, high-quality Pinisi ships that meet modern maritime demands globally.'],
        ] as $i => $item)
        @php $delay = $i * 100; @endphp
        <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ $delay }}" class="bg-background border border-secondary/30 rounded-2xl px-6 py-6 flex flex-col gap-5
            hover:border-secondary hover:shadow-[0_0_20px_2px_color-mix(in_srgb,theme(colors.secondary)_15%,transparent)]
            transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div
                    class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center group-hover:bg-secondary/20 transition-colors duration-300">
                    <i class="ti {{ $item['icon'] }} text-xl text-secondary" aria-hidden="true"></i>
                </div>
                <span
                    class="text-3xl font-extrabold text-accentthird group-hover:text-secondary transition-colors duration-300"
                    style="font-family: 'Poppins', sans-serif;" aria-hidden="true">{{ $item['idx'] }}</span>
            </div>
            <div class="flex flex-col gap-2">
                <h3
                    class="text-md md:text-2xl font-bold text-primary leading-snug group-hover:text-secondary transition-colors duration-300">
                    {{ $item['title'] }}
                </h3>
                <p class="text-sm md:text-md text-accent leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            <div class="w-8 h-0.5 bg-secondary rounded-full mt-auto group-hover:w-16 transition-all duration-500"></div>
        </div>
        @endforeach
    </div>
</section>

{{-- ============================================================ --}}
{{-- MASTER BUILDERS SECTION                                       --}}
{{-- ============================================================ --}}
<section class="flex flex-col gap-6 xl:gap-8 w-full px-6 md:px-12 lg:px-16 xl:px-22 py-12 xl:py-32"
    aria-labelledby="builders-heading">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10 md:mb-14">
        <div class="w-max h-max overflow-hidden flex items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Master Builders</p>
        </div>
        <div class="sm:text-right">
            <h2 id="faq-about-heading" data-aos="custom-blur-up" data-aos-duration="700"
                class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-bold leading-none text-primary"
                style="font-family: 'Poppins', sans-serif;">
                SAILING<span
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;"><br>THROUGH
                    TIME</span>
            </h2>
        </div>
    </div>

    <div data-aos="fade-up" data-aos-duration="700"
        class="flex flex-col xl:flex-row overflow-hidden border-2 border-accentsecond gap-0">
        {{-- Founder --}}
        <div
            class="bg-background xl:border-r-2 xl:border-accentsecond border-b-2 xl:border-b-0 border-accentsecond flex w-full xl:w-1/2">
            <img data-aos="custom-zoom-in-up" data-aos-duration="800" src="{{ url('img/Aset/co Founder.webp') }}"
                alt="H. Abdullah Hasan — Founder Bina Pusaka Marine" width="400" height="560" loading="lazy"
                decoding="async"
                class="w-2/5 md:w-[50%] h-56 md:h-120 lg:h-[48vh] xl:h-[83.5vh] object-cover flex-shrink-0">
            <div class="flex-1 flex flex-col justify-between p-4 md:p-5 lg:p-6">
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    <h3 class="text-base md:text-lg lg:text-2xl text-primary font-medium">H. Abdullah Hasan</h3>
                    <p class="text-sm md:text-base lg:text-lg text-accent italic">Founder</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                    <p class="text-xs lg:text-sm xl:text-lg text-accent font-medium">Leading the preservation of
                        Pinisi craftsmanship since 1998, delivering vessels defined by tradition and precision.</p>
                </div>
            </div>
        </div>

        {{-- CEO --}}
        <div class="bg-background flex w-full xl:w-1/2">
            <div class="flex-1 flex flex-col justify-between p-4 md:p-5 lg:p-6">
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    <h3 class="text-base md:text-lg lg:text-2xl text-primary font-medium">Pahrul Islami</h3>
                    <p class="text-sm md:text-base lg:text-lg text-accent italic">CEO</p>
                </div>
                <div class="flex flex-col gap-3 md:gap-4">
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="150" class="flex gap-3 md:gap-4">
                        <a href="https://www.tiktok.com/@ud.binapusakapinisi?is_from_webapp=1&sender_device=pc"
                            aria-label="Ikuti BP Marine Co di TikTok"
                            class="bg-secondary relative group overflow-hidden text-background w-9 h-9 md:w-10 md:h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                            <span
                                class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                                aria-hidden="true"></span>
                            <i class="ti ti-brand-tiktok relative group-hover:text-background text-lg md:text-xl lg:text-2xl"
                                aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/bpmarineco_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                            aria-label="Ikuti BP Marine Co di Instagram"
                            class="bg-secondary relative group overflow-hidden text-background w-9 h-9 md:w-10 md:h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                            <span
                                class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                                aria-hidden="true"></span>
                            <i class="ti ti-brand-instagram relative group-hover:text-background text-lg md:text-xl lg:text-2xl"
                                aria-hidden="true"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn BP Marine Co (segera hadir)" aria-disabled="true"
                            class="bg-secondary relative group overflow-hidden text-background w-9 h-9 md:w-10 md:h-10 lg:w-12 lg:h-12 flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                            <span
                                class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"
                                aria-hidden="true"></span>
                            <i class="ti ti-brand-linkedin relative group-hover:text-background text-lg md:text-xl lg:text-2xl font-bold"
                                aria-hidden="true"></i>
                        </a>
                    </div>
                    <p data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"
                        class="text-xs md:text-sm lg:text-lg mb-2 lg:mb-7 text-accent font-medium">
                        Leading the company with a vision to bring traditional Pinisi craftsmanship to a global stage.
                    </p>
                </div>
            </div>
            <img data-aos="custom-zoom-in-up" data-aos-duration="800" src="{{ url('img/Aset/CEO.webp') }}"
                alt="Pahrul Islami — CEO Bina Pusaka Marine" width="400" height="560" loading="lazy" decoding="async"
                class="w-2/5 md:w-[50%] h-56 md:h-120 lg:h-[48vh] xl:h-[83.5vh] object-cover flex-shrink-0">
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- VOICES SECTION                                                --}}
{{-- ============================================================ --}}
<section
    class="relative w-full px-6 md:px-12 lg:px-16 xl:px-23 py-16 md:py-24 flex flex-col gap-12 md:gap-20 lg:gap-32 bg-primary overflow-hidden"
    aria-labelledby="voices-heading">
    <div class="absolute inset-0 pointer-events-none z-0" aria-hidden="true"
        style="display: grid; grid-template-columns: 6% 22% 22% 22% 22% 1fr;">
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
    </div>

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10 md:mb-14">
        <div class="w-max h-max overflow-hidden flex items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-background shrink-0">
            </div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-background">/Voice Of
                Heritage</p>
        </div>
        <div class="sm:text-right">
            <h2 id="faq-about-heading" data-aos="custom-blur-up" data-aos-duration="700"
                class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-bold leading-none text-background"
                style="font-family: 'Poppins', sans-serif;">
                VOICES<span
                    style="color:transparent;-webkit-text-stroke:2px var(--color-secondary); font-family: 'Poppins', sans-serif;"><br>OF
                    THE SEA</span>
            </h2>
        </div>
    </div>

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
        <div class="group relative w-full lg:w-1/2 min-h-[220px] md:min-h-[280px] overflow-hidden block">
            <img src="{{ url('img/Prana/679c9730b8ad5230db05317b.webp') }}"
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
        class="relative h-80 md:h-[420px] lg:h-140 rounded-xl border border-secondary overflow-hidden bg-background">
        <img src="{{ url('img/Aset/IMG_0668_2.webp') }}" alt="Suasana kapal Pinisi BP Marine Co" width="1200"
            height="560" loading="lazy" decoding="async" class="absolute inset-0 w-full h-full object-cover object-top">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-black/20" aria-hidden="true"></div>

        <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="200"
            class="hidden lg:block absolute bottom-8 right-8 w-80 h-80 rounded-xl border-2 border-secondary overflow-hidden z-10">
            <img src="{{ url('img/Aset/IMG_0669.webp') }}" alt="Surya Paloh — Tokoh Nasional &amp; Pendiri Media Group"
                width="320" height="320" loading="lazy" decoding="async"
                class="w-full h-full object-cover object-top scale-120">
        </div>
        <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="200"
            class="hidden md:block lg:hidden absolute bottom-4 right-4 w-40 h-48 rounded-xl border-2 border-secondary overflow-hidden z-10">
            <img src="{{ url('img/Aset/IMG_0669.webp') }}" alt="Surya Paloh — Tokoh Nasional &amp; Pendiri Media Group"
                width="160" height="192" loading="lazy" decoding="async" class="w-full h-full object-cover object-top">
        </div>

        <figure data-aos="fade-right" data-aos-duration="700" data-aos-delay="150"
            class="relative z-10 flex flex-col justify-end gap-3 md:gap-5 p-6 md:p-8 h-full w-full md:w-[75%] lg:w-[70%]">
            <span class="text-xs md:text-sm tracking-widest uppercase text-secondary">(Success Project)</span>
            <span class="text-5xl md:text-7xl text-secondary font-serif leading-none" aria-hidden="true">"</span>
            <blockquote
                class="text-base md:text-xl lg:text-3xl text-background font-light italic leading-relaxed line-clamp-4 md:line-clamp-none">
                Pinisi adalah bukti nyata bahwa Indonesia adalah bangsa pelaut yang besar. Kita harus
                bangga dan terus melestarikan warisan maritim ini untuk generasi mendatang.
            </blockquote>
            <figcaption class="flex items-center gap-3 pt-3 md:pt-4 border-t border-secondary/40">
                <div class="w-6 md:w-8 h-px bg-secondary flex-shrink-0" aria-hidden="true"></div>
                <div class="flex flex-col">
                    <span class="text-base md:text-lg font-medium text-background">Surya Paloh</span>
                    <span class="text-xs md:text-md text-secondary uppercase tracking-widest mt-1">
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

<section class="px-6 md:px-12 lg:px-16 xl:px-23 py-12 lg:py-16 xl:py-24 flex flex-col gap-12 md:gap-16 xl:gap-18"
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
        <div class="hidden md:block sticky top-8 flex-shrink-0 md:w-68 lg:w-72 xl:w-72" aria-hidden="true">
            <div class="w-full md:h-[40vh] lg:h-[34vh] xl:h-[65vh] rounded-2xl overflow-hidden bg-primary relative">
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
                        class="w-60 md:w-64 xl:w-72 bg-background border border-accentsecond rounded-2xl p-4 md:p-5 lg:p-6 flex flex-col justify-between min-h-[320px] md:min-h-[380px] xl:min-h-[420px] flex-shrink-0 transition-all duration-500 group hover:bg-primary hover:border-primary cursor-pointer">
                        <div>
                            <p class="text-3xl text-secondary font-serif leading-none mb-4" aria-hidden="true">"</p>
                            <blockquote
                                class="text-sm text-accent italic leading-relaxed line-clamp-7 group-hover:text-background duration-500">
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
<section class="w-full px-6 md:px-12 lg:px-16 xl:px-23 py-16 md:py-24 lg:py-32" aria-labelledby="faq-heading">
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
                    class="flex-1 text-sm sm:text-base md:text-lg font-medium leading-snug transition-colors duration-500"
                    :class="active === {{ $index }} ? 'text-background' : 'text-accent'">
                    {{ $faq['q'] }}
                </span>
                <div class="p-2 sm:p-3 md:p-4 rounded-full border flex items-center justify-center flex-shrink-0 transition-all duration-500"
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
                    class="px-10 md:px-12 pb-5 ml-3 md:ml-7 text-sm sm:text-base md:text-lg text-accentthird leading-relaxed font-light">
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