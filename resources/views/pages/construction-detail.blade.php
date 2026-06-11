@extends('layouts.app')

@section('title', $project->name . ' — Under Construction · BPMarineCo')

@section('og_title', $project->name . ' | Pinisi Under Construction by Bina Pusaka')

@section('meta_description', 'Follow the construction progress of ' . $project->name . ', a handcrafted Pinisi vessel currently being built by Bina Pusaka through traditional craftsmanship, precision, and maritime expertise.')

@section('og_image', $project->cover_image
    ? url('storage/' . $project->cover_image)
    : url('img/Aset/BINA PUSAKA.png')
)

@section('content')

{{-- HERO --}}
<section class="w-full bg-primary px-6 md:px-12 lg:px-16 xl:px-23 py-8 md:py-12 lg:py-16 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none z-0" aria-hidden="true"
        style="display: grid; grid-template-columns: 6% 22% 22% 22% 22% 1fr;">
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
        <div class="border-r border-accent opacity-30"></div>
    </div>

    {{-- Eyebrow --}}
    <div data-aos="fade-down" data-aos-duration="600" class="flex items-center gap-2 mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
        <span class="text-secondary text-xs md:text-sm tracking-[0.1em] uppercase">
            Under construction — {{ $project->construction_stage_label }}
        </span>
    </div>

    {{-- Title --}}
    <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="100"
        class="text-3xl md:text-4xl lg:text-6xl text-background font-bold leading-tight mb-2"
        style="font-family:'Jost',sans-serif">
        {{ $project->name }}
    </h1>

    <p data-aos="fade-up" data-aos-duration="600" data-aos-delay="150"
        class="text-accentthird text-xs md:text-sm tracking-[0.06em] mb-8">
        {{ $project->type ?? 'Pinisi' }}
        @if($project->estimated_launch_date)
            &nbsp;·&nbsp; Est. launch {{ $project->estimated_launch_date->format('F Y') }}
        @endif
    </p>

    {{-- Progress bar --}}
    <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="mt-8 md:mt-10 mb-0">
        <div class="flex justify-between items-end mb-6">
            <div class="flex flex-col gap-2 md:gap-4">
                <span class="text-xs md:text-sm text-secondary tracking-[0.12em] uppercase">Construction progress</span>
                <span class="text-2xl md:text-3xl font-medium text-secondary leading-none" style="font-family:'Jost',sans-serif">
                    {{ $project->progress_percentage }}<span class="text-xl md:text-2xl font-normal text-secondary">%</span>
                </span>
            </div>
            <div class="text-right flex flex-col gap-1">
                <span class="text-[10px] md:text-xs text-secondary/80 tracking-[0.08em] uppercase">Current stage</span>
                <span class="text-xs md:text-sm text-secondary font-medium">{{ $project->construction_stage_label }}</span>
            </div>
        </div>

        {{-- Track — animasi width dari 0 saat masuk viewport --}}
        <div class="relative h-1 bg-secondary/10 rounded-full overflow-hidden mt-4 md:mt-6"
                x-data="{ started: false }"
                x-intersect.once="started = true">
            <div class="absolute inset-y-0 left-0 rounded-full bg-secondary/80 blur-md"
                    :style="started ? 'width: {{ $project->progress_percentage }}%; transition: width 1.4s cubic-bezier(.4,0,.2,1) 0.3s' : 'width: 0%'"></div>
            <div class="absolute inset-y-0 left-0 rounded-full bg-secondary"
                    :style="started ? 'width: {{ $project->progress_percentage }}%; transition: width 1.2s cubic-bezier(.4,0,.2,1) 0.2s' : 'width: 0%'"></div>
        </div>

        {{-- Milestone labels --}}
        <div class="relative flex justify-between mt-2">
            <span class="text-[9px] md:text-[10px] text-secondary tracking-[0.06em]">0%</span>
            <span class="text-[9px] md:text-[10px] text-secondary tracking-[0.06em]">25%</span>
            <span class="text-[9px] md:text-[10px] text-secondary tracking-[0.06em]">50%</span>
            <span class="text-[9px] md:text-[10px] text-secondary tracking-[0.06em]">75%</span>
            <span class="text-[9px] md:text-[10px] text-secondary tracking-[0.06em]">100%</span>
        </div>
    </div>

    {{-- Stage strip --}}
    @php
        $stages = ['design' => 'Design', 'keel' => 'Keel', 'hull' => 'Hull', 'fitout' => 'Fit-out', 'finishing' => 'Launch'];
        $stageKeys = array_keys($stages);
        $currentIndex = $project->construction_stage_index;
    @endphp

    <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="300"
            class="flex items-center mt-6 md:mt-8 lg:mt-12 gap-0">
        @foreach($stages as $key => $label)
        @php $i = array_search($key, $stageKeys); $isLast = $i === count($stageKeys) - 1; @endphp
        <div class="flex items-center {{ $isLast ? '' : 'flex-1' }}">
            <div class="flex flex-col items-center gap-1.5 md:gap-2">
                <div class="w-2 h-2 md:w-3 md:h-3 rounded-full flex-shrink-0
                    {{ $i < $currentIndex  ? 'bg-secondary' : '' }}
                    {{ $i === $currentIndex ? 'bg-secondary ring-4 ring-secondary/20' : '' }}
                    {{ $i > $currentIndex  ? 'bg-white/15' : '' }}">
                </div>
                <span class="text-[9px] md:text-sm tracking-[0.08em] whitespace-nowrap
                    {{ $i < $currentIndex  ? 'text-secondary/70' : '' }}
                    {{ $i === $currentIndex ? 'text-secondary font-medium' : '' }}
                    {{ $i > $currentIndex  ? 'text-accentsecond' : '' }}">
                    {{ $label }}
                </span>
            </div>
            @if(!$isLast)
            <div class="flex-1 h-px mx-2 md:mx-3 mb-5
                {{ $i < $currentIndex ? 'bg-secondary/50' : 'bg-accent/50' }}">
            </div>
            @endif
        </div>
        @endforeach
    </div>
</section>


{{-- BODY --}}
<section class="px-6 md:px-12 lg:px-16 xl:px-23 py-10 md:py-12 lg:py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-8 lg:gap-8 min-w-0">

        {{-- LEFT --}}
        <div class="flex flex-col gap-10 md:gap-12 min-w-0 overflow-hidden">

            {{-- Description --}}
            @if($project->description)
            <div class="min-w-0 flex flex-col gap-8">
                <div class="overflow-hidden flex items-center gap-4">
                    <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
                    <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/About This Build</p>
                </div>
                <p data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                    class="text-primary/70 text-sm md:text-lg leading-relaxed font-light break-words">
                    {{ $project->description }}
                </p>
            </div>
            @endif

            {{-- Timeline --}}
            <div class="min-w-0 flex flex-col gap-8">
                <div class="overflow-hidden flex items-center gap-4">
                    <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
                    <p data-aos="fade-up" data-aos-duration="500" class="text-xl font-medium text-accent">/Build Stage</p>
                </div>

                @php
                    $timelineStages = [
                        ['key' => 'design',    'label' => 'Design',         'icon' => 'ti-compass',   'desc' => 'Naval architecture, blueprints, and client consultation.'],
                        ['key' => 'keel',      'label' => 'Keel laying',    'icon' => 'ti-anchor',    'desc' => 'The backbone of the vessel is laid — a centuries-old ceremony.'],
                        ['key' => 'hull',      'label' => 'Hull framing',   'icon' => 'ti-container', 'desc' => 'Master craftsmen shape the ribs and hull from ironwood.'],
                        ['key' => 'fitout',    'label' => 'Deck & fit-out', 'icon' => 'ti-armchair',  'desc' => 'Interior joinery, mechanical systems, and deck finishing.'],
                        ['key' => 'finishing', 'label' => 'Finishing',      'icon' => 'ti-sparkles',  'desc' => 'Final paintwork, rigging, sea trials, and handover.'],
                    ];
                @endphp

                <div class="flex flex-col">
                    @foreach($timelineStages as $i => $stage)
                    @php
                        $isDone    = $i < $currentIndex;
                        $isCurrent = $i === $currentIndex;
                        $isPending = $i > $currentIndex;
                        $delay     = $i * 80;
                    @endphp
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $delay }}"
                            class="flex gap-3 md:gap-4">

                        {{-- Dot + Line --}}
                        <div class="flex flex-col items-center w-10 md:w-16 flex-shrink-0">
                            <div class="w-9 h-9 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0
                                {{ $isDone    ? 'bg-secondary/10 border border-secondary/30' : '' }}
                                {{ $isCurrent ? 'bg-secondary' : '' }}
                                {{ $isPending ? 'bg-secondbackground border border-accentthird' : '' }}">
                                <i class="ti {{ $stage['icon'] }} text-base md:text-lg
                                    {{ $isDone    ? 'text-secondary' : '' }}
                                    {{ $isCurrent ? 'text-background' : '' }}
                                    {{ $isPending ? 'text-accentsecond' : '' }}"></i>
                            </div>
                            @if(!$loop->last)
                                <div class="w-px flex-1 my-1
                                    {{ $isDone ? 'bg-secondary/20' : 'bg-accentthird' }}"></div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="pb-6 md:pb-8 pt-1 flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                                <span class="text-base md:text-xl
                                    {{ $isCurrent ? 'text-primary' : '' }}
                                    {{ $isDone    ? 'text-accent' : '' }}
                                    {{ $isPending ? 'text-accentsecond' : '' }}">
                                    {{ $stage['label'] }}
                                </span>
                                @if($isCurrent)
                                    <span class="text-[10px] md:text-sm px-2 py-0.5 rounded-sm bg-secondary text-background tracking-[0.04em]">
                                        In progress
                                    </span>
                                @elseif($isDone)
                                    <span class="text-[10px] md:text-sm px-2 py-0.5 rounded-sm bg-secondary/10 text-secondary border border-secondary/20 tracking-[0.04em]">
                                        Completed
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs md:text-sm leading-relaxed break-words
                                {{ $isPending ? 'text-accentsecond' : 'text-accent' }}">
                                {{ $stage['desc'] }}
                            </p>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex flex-col gap-4">

            {{-- Build info card --}}
            <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="100"
                    class="bg-background border border-accentthird rounded-xl overflow-hidden">
                <div class="px-4 py-3 bg-secondbackground border-b border-accentthird">
                    <p class="text-sm md:text-lg text-accent tracking-[0.1em]">Build Info</p>
                </div>
                <div>
                    @if($project->estimated_launch_date)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-calendar text-base md:text-xl"></i> Est. launch
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->estimated_launch_date->format('F Y') }}</span>
                    </div>
                    @endif

                    @if($project->type)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-ship text-base md:text-lg"></i> Vessel type
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->type }}</span>
                    </div>
                    @endif

                    @if($project->length)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-ruler text-base md:text-xl"></i> Length
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->length }} m</span>
                    </div>
                    @endif

                    @if($project->beam)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-arrows-horizontal text-base md:text-xl"></i> Beam
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->beam }} m</span>
                    </div>
                    @endif

                    @if($project->guest_capacity)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-users text-base md:text-xl"></i> Capacity
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->guest_capacity }} guests</span>
                    </div>
                    @endif

                    @if($project->cabin_count)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-bed text-base md:text-xl"></i> Cabins
                        </span>
                        <span class="text-xs md:text-md text-primary">
                            {{ $project->cabin_count }}{{ $project->ensuite ? ' (all ensuite)' : '' }}
                        </span>
                    </div>
                    @endif

                    @if($project->cruise_speed)
                    <div class="flex items-center justify-between px-4 py-3 border-b border-accentthird/60">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-gauge text-base md:text-xl"></i> Cruise speed
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->cruise_speed }} kn</span>
                    </div>
                    @endif

                    @if($project->build_time)
                    <div class="flex items-center justify-between px-4 py-3">
                        <span class="text-xs md:text-md text-accent flex items-center gap-2">
                            <i class="ti ti-clock text-base md:text-xl"></i> Build time
                        </span>
                        <span class="text-xs md:text-md text-primary">{{ $project->build_time }} months</span>
                    </div>
                    @endif
                </div>
            </div>

            <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"
                    class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3">
                {{-- CTA --}}
                <a href="/contact" aria-label="Enquire about this build"
                    class="bg-secondary relative group overflow-hidden text-background px-6 py-3 inline-flex items-center justify-center rounded-full shadow-md transition ease-in-out duration-500">
                    <span class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300" aria-hidden="true"></span>
                    <span class="relative group-hover:text-background text-sm md:text-md font-base">Enquire about this build</span>
                </a>

                {{-- Back --}}
                <a href="{{ route('collection.index') }}"
                    class="group text-center text-sm text-accentsecond hover:text-accent transition-all duration-300 flex items-center justify-center gap-1.5 py-1">
                    <i class="ti ti-arrow-left text-lg transition-transform duration-300 group-hover:-translate-x-1"></i>
                    Back to collection
                </a>
            </div>
        </div>
    </div>
</section>


{{-- PROGRESS GALLERY --}}
@if($project->progress_photos && count($project->progress_photos))
<section class="px-6 md:px-12 lg:px-16 xl:px-23 py-10 md:py-14 lg:py-24">
    <div>
        <div class="overflow-hidden flex items-center gap-4 mb-6 md:mb-8">
            <div data-aos="fade-right" data-aos-duration="500" class="w-8 h-0.5 rounded-full bg-accent shrink-0"></div>
            <p data-aos="fade-up" data-aos-duration="500" class="text-lg font-medium text-accent tracking-[0.1em]">/Progress Gallery</p>
        </div>
        <div class="columns-1 sm:columns-2 md:columns-2 lg:columns-3 gap-3 md:gap-4">
            @foreach($project->progress_photos as $index => $photo)
            @php $delay = ($index % 6) * 60; @endphp
            <div data-aos="zoom-in" data-aos-duration="500" data-aos-delay="{{ $delay }}"
                class="break-inside-avoid mb-3 md:mb-4 overflow-hidden rounded-xl group">
                <img src="{{ Storage::url($photo) }}" alt="Progress photo"
                    class="w-full h-auto object-cover group-hover:scale-105 transition duration-500">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection