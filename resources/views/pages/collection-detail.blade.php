@extends('layouts.app')

@section('title', $project->name . ' — BPMarine.Co Pinisi Shipyard')
@section('og_title', $project->name . ' | Handcrafted Pinisi by BPMarine.Co')
@section('meta_description', Str::limit($project->description, 155))
@section('og_image', url('storage/' . $project->cover_image))

@section('content')


<section class="w-full px-6 md:px-23 pt-8 pb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
        <div data-aos="custom-blur-up">
            @php
            $words = explode(' ', $project->name);
            $first = $words[0];
            $rest = implode(' ', array_slice($words, 1));
            @endphp
            <h1 class="text-4xl md:text-6xl text-primary font-extrabold leading-tight uppercase" style="font-family: 'Poppins', sans-serif;">
                {{ $first }} <span class="text-accent uppercase" style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">{{ $rest }}</span>
            </h1>
        </div>
        <h1 div data-aos="custom-blur-up" class="text-2xl md:text-4xl text-accent font-bold" >{{ $project->year }}</h1>
    </div>
</section>

{{-- MARQUEE BACKGROUND TEXT --}}
<div class="inset-0 z-0 h-[95%] -mx-6 md:-mx-23 pointer-events-none overflow-hidden flex items-end leading-none">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
            <h1
                style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </h1>
            <div
                class="h-104 w-full absolute left-[-90px] top-4 md:top-16 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10">
            </div>
        </div>
    </div>

{{-- COVER IMAGE --}}
<section class="w-full px-6 md:px-23 pb-16">
    <div data-aos="custom-zoom-in-up" class="w-full rounded-2xl overflow-hidden h-64 md:h-[100vh]">
        <img src="{{ url('storage/' . $project->cover_image) }}" alt="{{ $project->name }}" loading="lazy"
            class="w-full h-full object-cover hover:scale-105 transition duration-700">
    </div>
</section>

{{-- OVERVIEW + GALLERY --}}
<section class="w-full px-6 md:px-23 py-8">
    <div class="flex flex-col md:flex-row gap-12 md:gap-16">
        {{-- KIRI: Deskripsi + Spesifikasi --}}
        <div data-aos="custom-blur-up" class="w-full md:w-[40%] flex flex-col gap-4 md:sticky md:top-12 md:self-start">
            <div class="flex flex-col gap-8">
                <div class="flex items-center h-max w-max overflow-hidden ">
                    <h1 data-aos="fade-up" data-aos-duration="800" class="text-2xl text-accent">/Overview</h1>
                </div>
                <p  class="text-base text-primary font-light leading-relaxed">
                    {{ $project->description }}
                </p>
            </div>

            {{-- Spesifikasi --}}
            <div class="flex flex-col gap-3">
                @if($project->type)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Type: <span
                            class="text-accent font-medium">{{ $project->type }}</span></p>
                </div>
                @endif
                @if($project->length)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Length: <span class="text-accent font-medium">±
                            {{ $project->length }} meters</span></p>
                </div>
                @endif
                @if($project->beam)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Beam: <span class="text-accent font-medium">±
                            {{ $project->beam }} meters</span></p>
                </div>
                @endif
                @if($project->deck)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Decks: <span class="text-accent font-medium">{{ $project->deck }}
                            deck</span></p>
                </div>
                @endif
                @if($project->sail_count)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Sails: <span
                            class="text-accent font-medium">{{ $project->sail_count }} sails (2 main masts)</span></p>
                </div>
                @endif
                @if($project->build_time)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Build Time: <span class="text-accent font-medium">±
                            {{ $project->build_time }} months</span></p>
                </div>
                @endif
                @if($project->guest_capacity)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Guest Capacity: <span class="text-accent font-medium">up to
                            {{ $project->guest_capacity }} guests</span></p>
                </div>
                @endif
                @if($project->cabin_count)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Cabins: <span
                            class="text-accent font-medium">{{ $project->cabin_count }} cabins</span></p>
                </div>
                @endif
                @if($project->ensuite)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">All Cabins: <span class="text-accent font-medium">ensuite (private
                            bathroom)</span></p>
                </div>
                @endif
                @if($project->cruise_speed)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Cruise Speed: <span class="text-accent font-medium">±
                            {{ $project->cruise_speed }} knots</span></p>
                </div>
                @endif
                @if($project->max_speed)
                <div class="flex gap-2">
                    <span class="text-accent">•</span>
                    <p class="text-base text-primary">Max Speed: <span class="text-accent font-medium">±
                            {{ $project->max_speed }} knots</span></p>
                </div>
                @endif
            </div>
        </div>

        {{-- KANAN: Gallery --}}
        <div class="w-full md:w-[60%] flex flex-col gap-4">
            @if($project->gallery_images && count($project->gallery_images) > 0)
            @foreach($project->gallery_images as $image)
            <div data-aos="custom-zoom-in-up" class="w-full rounded-xl overflow-hidden">
                <img src="{{ url('storage/' . $image) }}" alt="{{ $project->name }}" loading="lazy"
                    class="w-full h-auto object-cover hover:scale-105 transition duration-500">
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section>

{{-- OTHER COLLECTION --}}
@if($otherProjects->count() > 0)
<section class=" flex flex-col w-full px-6 md:px-23 py-32">
    <div class="flex items-center h-full w-max overflow-hidden ">
        <h1 data-aos="fade-up" data-aos-duration="800" class="text-2xl text-accent">/Other Collection</h1>
    </div>
    {{-- Marquee --}}
    <div class="inset-0 z-0 h-[95%] -mx-6 md:-mx-23 pointer-events-none overflow-hidden flex items-end leading-none">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
            <h1
                style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </h1>
            <div
                class="h-104 w-full absolute left-[-90px] top-4 md:top-16 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($otherProjects as $other)
        <div data-aos="custom-zoom-in-up" class="group mag-area relative overflow-hidden rounded-xl cursor-pointer block">
            <img src="{{ url('storage/' . $other->cover_image) }}" alt="{{ $other->name }}" loading="lazy"
                class="w-full h-64 md:h-100 object-cover group-hover:scale-110 transition duration-500">
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/15 to-transparent flex flex-col justify-end p-6">
                <div class="flex items-end justify-between">
                    <h1 class="text-xl text-background font-base">{{ $other->name }}</h1>
                    <h1 class="text-lg font-base text-background">{{ $other->year }}</h1>
                </div>
            </div>
            <a href="{{ route('collection.show', $other->id) }}"
                class="group/item absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                <div class="group/item mag-btn pointer-events-auto">
                    <div
                        class="flex justify-center items-center relative overflow-hidden bg-black/50 rounded-full w-12 h-12 group-hover/item:w-44 transition-all duration-500">
                        <i
                            class="ti ti-eye absolute text-background text-2xl group-hover/item:opacity-0 group-hover/item:translate-y-[-40px] delay-100 transition ease-in-out duration-300"></i>
                        <i
                            class="ti ti-eye-search absolute flex items-center justify-center gap-2 text-background text-2xl opacity-0 group-hover/item:opacity-100 delay-100 ease-in-out duration-300 translate-y-10 transition-all group-hover/item:translate-y-0">
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