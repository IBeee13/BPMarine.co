@extends('layouts.app')

@section('title', $project->name . ' — BPMarine.Co Pinisi Shipyard')
@section('og_title', $project->name . ' | Handcrafted Pinisi by BPMarine.Co')
@section('meta_description', Str::limit($project->description, 155))
@section('og_image', asset('storage/' . $project->cover_image))

@section('content')


<section class="w-full px-6 md:px-12 lg:px-16 xl:px-23 pt-8 pb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
        <div data-aos="custom-blur-up">
            @php
            $words = explode(' ', $project->name);
            $first = $words[0];
            $rest = implode(' ', array_slice($words, 1));
            @endphp
            <h1 class="text-4xl md:text-7xl text-primary font-extrabold leading-tight uppercase" style="font-family: 'Poppins', sans-serif;">
                {{ $first }} <span class="text-accent uppercase" style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">{{ $rest }} PINISI</span>
            </h1>
        </div>
        <h1 data-aos="custom-blur-up" data-aos-delay="100" class="text-2xl md:text-5xl text-accent font-bold">{{ $project->year }}</h1>
    </div>
</section>

{{-- MARQUEE BACKGROUND TEXT --}}
<div class="inset-0 z-0 h-[95%] -mx-6 md:-mx-23 pointer-events-none overflow-hidden flex items-end leading-none">
    <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
        <h1 style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
            We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
        </h1>
        <div class="h-104 w-full absolute left-[-90px] top-4 md:top-16 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10"></div>
    </div>
</div>

{{-- COVER IMAGE --}}
<section class="w-full h-64 xl:h-max px-6 md:px-12 lg:px-16 xl:px-23 pb-16">
    <div data-aos="custom-zoom-in-up" data-aos-duration="800" class="w-max rounded-xl xl:rounded-2xl overflow-hidden h-64 xl:h-max">
        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}" loading="lazy"
            class="w-max h-64 xl:h-max object-cover hover:scale-105 transition duration-700">
    </div>
</section>

{{-- OVERVIEW + GALLERY --}}
<section class="w-full px-6 md:px-12 lg:px-16 xl:px-23 py-8">
    <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-14">

        {{-- KIRI: Overview --}}
        <div data-aos="fade-up" data-aos-duration="700" class="w-full md:w-[47.8%] flex flex-col gap-6 md:sticky md:top-6 md:self-start">

            {{-- Section label --}}
            <div class="overflow-hidden flex items-center gap-4">
                <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
                <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Overview</p>
            </div>

            {{-- Deskripsi --}}
            <p data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                class="text-md text-accent font-light leading-relaxed">
                {{ $project->description }}
            </p>

            {{-- Spesifikasi --}}
            <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="150" class="grid grid-cols-2">
                @if($project->type)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Type</span>
                    <span class="text-sm font-bold text-accent">{{ $project->type }}</span>
                </div>
                @endif
                @if($project->build_time)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Build Time</span>
                    <span class="text-sm font-bold text-accent">± <span class="text-secondary">{{ $project->build_time }}</span> months</span>
                </div>
                @endif
                @if($project->length)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Length</span>
                    <span class="text-sm font-bold text-accent">± <span class="text-secondary">{{ $project->length }}</span> meters</span>
                </div>
                @endif
                @if($project->beam)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Beam</span>
                    <span class="text-sm font-bold text-accent">± <span class="text-secondary">{{ $project->beam }}</span> meters</span>
                </div>
                @endif
                @if($project->deck)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Decks</span>
                    <span class="text-sm font-bold text-accent"><span class="text-secondary">{{ $project->deck }}</span> deck</span>
                </div>
                @endif
                @if($project->sail_count)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Sails</span>
                    <span class="text-sm font-bold text-accent"><span class="text-secondary">{{ $project->sail_count }}</span> sails · 2 masts</span>
                </div>
                @endif
                @if($project->guest_capacity)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Capacity</span>
                    <span class="text-sm font-bold text-accent">up to <span class="text-secondary">{{ $project->guest_capacity }}</span> guests</span>
                </div>
                @endif
                @if($project->cabin_count)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Cabins</span>
                    <span class="text-sm font-bold text-accent"><span class="text-secondary">{{ $project->cabin_count }}</span> ensuite cabins</span>
                </div>
                @endif
                @if($project->ensuite)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">All Cabins</span>
                    <span class="text-sm font-bold text-accent">ensuite (private bathroom)</span>
                </div>
                @endif
                @if($project->cruise_speed)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Cruise Speed</span>
                    <span class="text-sm font-bold text-accent">± <span class="text-secondary">{{ $project->cruise_speed }}</span> knots</span>
                </div>
                @endif
                @if($project->max_speed)
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird">
                    <span class="text-xs tracking-[0.18em] uppercase text-accent">Max Speed</span>
                    <span class="text-sm font-bold text-accent">± <span class="text-secondary">{{ $project->max_speed }}</span> knots</span>
                </div>
                <div class="flex flex-col gap-1 py-3 border-b border-accentthird"></div>
                @endif
            </div>
        </div>

        {{-- KANAN: Gallery --}}
        <div class="w-full md:w-[52.2%] flex flex-col gap-4">
            @if($project->gallery_images && count($project->gallery_images) > 0)
                @foreach($project->gallery_images as $index => $image)
                @php $delay = $index * 80; @endphp
                <div data-aos="custom-zoom-in-up" data-aos-duration="600" data-aos-delay="{{ $delay }}"
                    class="w-full rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $project->name }}" loading="lazy"
                        class="w-full h-auto object-cover hover:scale-105 transition duration-500">
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


{{-- ACCENT BAND --}}
<div data-aos="fade-up" data-aos-duration="700"
    class="w-full bg-primary px-6 md:px-12 lg:px-16 xl:px-23 py-10 flex flex-col md:flex-row items-center gap-6 md:gap-8 lg:gap-10 mt-16">
    <p class="text-base md:text-lg lg:text-2xl font-light leading-relaxed text-accentthird/80 italic flex-1">
        "Every Pinisi we bring to life carries the breath of
        <span class="text-secondary font-semibold not-italic">14 centuries of maritime tradition</span>
        — not merely a vessel, but a heritage that sails."
    </p>
    <div class="hidden md:block w-px h-14 bg-secondary/30 shrink-0"></div>
    <div class="flex flex-col gap-1 shrink-0">
        <span class="text-2xl font-bold text-secondary">BPMarine.Co</span>
        <span class="text-sm tracking-[0.18em] uppercase text-accentthird/40">Parepare Shipyard</span>
    </div>
</div>

{{-- OTHER COLLECTION --}}
@if($otherProjects->count() > 0)
<section class="flex flex-col w-full px-6 md:px-12 lg:px-16 xl:px-23 py-16 md:py-20 lg:py-32">
    <div class="overflow-hidden flex items-center gap-4 mb-2">
        <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
        <p data-aos="fade-up" data-aos-duration="500" class="text-2xl font-medium text-accent">/Other Collection</p>
    </div>

    {{-- Marquee --}}
    <div class="inset-0 z-0 h-[95%] -mx-6 md:-mx-23 pointer-events-none overflow-hidden flex items-end leading-none">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
            <h1 style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </h1>
            <div class="h-104 w-full absolute left-[-90px] top-4 md:top-16 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($otherProjects as $index => $other)
        @php $delay = $index * 100; @endphp
        <div data-aos="custom-zoom-in-up" data-aos-duration="600" data-aos-delay="{{ $delay }}"
            class="group mag-area relative overflow-hidden rounded-xl cursor-pointer block">
            <img src="{{ asset('storage/' . $other->cover_image) }}" alt="{{ $other->name }}" loading="lazy"
                class="w-full h-64 md:h-100 object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/15 to-transparent flex flex-col justify-end p-6">
                <div class="flex items-end justify-between">
                    <h1 class="text-xl text-background font-base">{{ $other->name }}</h1>
                    <h1 class="text-lg font-base text-background">{{ $other->year }}</h1>
                </div>
            </div>
            <a href="{{ route('collection.show', $other->id) }}"
                class="group/item absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                <div class="group/item mag-btn pointer-events-auto">
                    <div class="flex justify-center items-center relative overflow-hidden bg-black/50 rounded-full w-12 h-12 group-hover/item:w-44 transition-all duration-500">
                        <i class="ti ti-eye absolute text-background text-2xl group-hover/item:opacity-0 group-hover/item:translate-y-[-40px] delay-100 transition ease-in-out duration-300"></i>
                        <i class="ti ti-eye-search absolute flex items-center justify-center gap-2 text-background text-2xl opacity-0 group-hover/item:opacity-100 delay-100 ease-in-out duration-300 translate-y-10 transition-all group-hover/item:translate-y-0">
                            <h1 class="text-base font-normal shrink-0">View Heritage</h1>
                        </i>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endif


@endsection