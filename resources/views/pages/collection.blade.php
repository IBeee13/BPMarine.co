@extends('layouts.app')

@section('title', 'Our Pinisi Collection — BPMarine.Co')

@section('og_title', 'Handcrafted Pinisi Vessels — BPMarine.Co Collection')

@section('meta_description', 'Browse our collection of handcrafted Pinisi vessels — from traditional phinisi liveaboards to luxury charter yachts, each built to order at our shipyard in Bulukumba, South Sulawesi.')

@section('og_image', url('img/Bina Pusaka/Aset/BINA PUSAKA.png'))

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative w-full h-[50vh] md:h-[40vh] lg:h-[40vh] xl:h-[104vh] overflow-hidden px-6 md:px-12 lg:px-15 xl:px-21 py-8 z-0">
        <div class="absolute inset-0 z-0 h-[100%] pointer-events-none overflow-hidden flex items-end">
            <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
                <h1
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                    We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                    We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                </h1>
                <div
                    class="h-104 w-full opacity-100 sm:opacity-100 md:opacity-100 lg:opacity-100 xl:opacity-100 absolute left-[-90px] -top-8 md:top-12 lg:top-16 xl:top-48 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10">
                </div>
            </div>
        </div>

        {{-- Mobile --}}
        <div data-aos="custom-blur-up"
            class="relative z-10 flex flex-col md:hidden gap-2 pb-12">
            <h1 class="text-7xl text-primary font-extrabold leading-none" style="font-family: 'Poppins', sans-serif;">Our
            </h1>
            <h1 class="text-7xl font-extrabold leading-none"
                style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                Fleet</h1>
        </div>

        {{-- Desktop --}}
        <div class="relative z-10 hidden md:flex items-start h-[65vh] lg:h-[85vh]">
            <div data-aos="custom-blur-up"
                class="h-100 w-160">
                <h1 class="text-[clamp(80px,12vw,180px)] text-primary font-extrabold leading-none"
                    style="font-family: 'Poppins', sans-serif;">Our</h1>
                <h1 class="text-[clamp(80px,12vw,180px)] font-extrabold leading-none"
                    style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                    Fleet</h1>
            </div>
        </div>
    </section>

    <script>
        window._projects = @json($projectsData);
        window._years = @json($yearsData);
        window._construction = @json($constructionData);
    </script>

    {{-- COLLECTION + CONSTRUCTION --}}
    <section data-aos="custom-blur-up" data-aos-duration="700" class="px-6 md:px-12 lg:px-16 xl:px-23 pb-24 -mt-8 w-full"
        x-data="{
                    activeTab: localStorage.getItem('collectionTab') || 'fleet',
                    transitioning: false,

                    switchTab(tab) {
                        if (this.activeTab === tab) return;
                        this.transitioning = true;
                        localStorage.setItem('collectionTab', tab);
                        setTimeout(() => {
                            this.activeTab = tab;
                            this.transitioning = false;
                        }, 180);
                    },
                    search: '',
                    year: '',
                    initial: '',
                    alphabet: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split(''),
                    projects: window._projects || [],
                    years: window._years || [],
                    get availableInitials() {
                        return new Set(this.projects.map(p => p.name.charAt(0).toUpperCase()));
                    },
                    get filtered() {
                        return this.projects.filter(p =>
                            (this.search  === '' || p.name.toLowerCase().includes(this.search.toLowerCase())) &&
                            (this.year    === '' || String(p.year) === String(this.year)) &&
                            (this.initial === '' || p.name.charAt(0).toUpperCase() === this.initial)
                        );
                    },
                    get hasFilter() {
                        return this.search !== '' || this.year !== '' || this.initial !== '';
                    },
                    reset() {
                        this.search  = '';
                        this.year    = '';
                        this.initial = '';
                    },
                    construction: window._construction || [],
                    stages: ['design','keel','hull','fitout','finishing'],
                }">

        {{-- TAB BAR --}}
        <div data-aos="custom-blur-up" data-aos-duration="600" data-aos-delay="150" class="w-full mb-10 sm:mt-3 md:-mt-12 lg:-mt-16 xl:-mt-24 flex items-stretch border-b gap-1 border-accentsecond z-10">
            {{-- Tab: Completed Fleet --}}
            <button @click="switchTab('fleet')"
                class="relative flex-1 md:flex-none bg-background flex items-center justify-center md:justify-start gap-2 px-4 md:px-7 py-3 text-sm font-medium tracking-[0.06em] transition-all duration-200 cursor-pointer -mb-px border border-b-1 rounded-t-lg overflow-hidden
                    hover:-translate-y-0.5"
                :class="activeTab === 'fleet'
                    ? 'text-primary border-accentsecond border-b-secondary'
                    : 'text-accentsecond border-accentsecond hover:text-accent'">

                <span class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 -mb-px"
                    :class="activeTab === 'fleet' ? 'bg-secondary' : 'bg-transparent'"></span>

                <i class="ti ti-ship text-sm shrink-0"></i>

                <span class="hidden sm:inline truncate">Completed fleet</span>
                <span class="sm:hidden truncate">Fleet</span>

                <span class="text-xs px-2 py-0.5 rounded-md shrink-0 transition-all duration-200"
                    :class="activeTab === 'fleet'
                        ? 'bg-primary text-background'
                        : 'bg-accentthird text-accentsecond'">
                    {{ str_pad($projectsData->count(), 2, '0', STR_PAD_LEFT) }}
                </span>
            </button>

            {{-- Tab: Under Construction --}}
            <button @click="switchTab('construction')"
                class="relative flex-1 md:flex-none bg-background flex items-center justify-center md:justify-start gap-2 px-4 md:px-7 py-3 text-sm font-medium tracking-[0.06em] transition-all duration-200 cursor-pointer -mb-px border border-b-1 rounded-t-lg ml-1 overflow-hidden
                    hover:-translate-y-0.5"
                :class="activeTab === 'construction'
                    ? 'text-primary border-accentsecond border-b-secondary'
                    : 'text-accentsecond border-accentsecond hover:text-accent'">

                <span class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 -mb-px"
                    :class="activeTab === 'construction' ? 'bg-secondary' : 'bg-transparent'"></span>

                <i class="ti ti-crane text-sm shrink-0"></i>

                <span class="hidden md:inline w-1.5 h-1.5 rounded-full shrink-0 transition-colors duration-200"
                    :class="activeTab === 'construction' ? 'bg-secondary' : 'bg-accentsecond'"></span>

                <span class="hidden sm:inline truncate">Under construction</span>
                <span class="sm:hidden truncate">Building</span>

                @if($constructionData->count() > 0)
                    <span class="text-[11px] px-2 py-0.5 rounded-full shrink-0 transition-all duration-200"
                        :class="activeTab === 'construction'
                            ? 'bg-secondary text-background'
                            : 'bg-accentthird text-accentsecond'">
                        <span class="sm:hidden">{{ $constructionData->count() }}</span>
                        <span class="hidden sm:inline">{{ $constructionData->count() }} active</span>
                    </span>
                @endif
            </button>

        </div>

        {{-- Fade wrapper --}}
        <div :class="transitioning ? 'opacity-0 translate-y-1' : 'opacity-100 translate-y-0'"
            class="transition-all duration-200 ease-out">

            {{-- ── PANEL: COMPLETED FLEET ──────────────────────────────────── --}}
            <div x-show="activeTab === 'fleet'">

                {{-- FILTER BAR --}}
                <div class="flex flex-col sm:flex-row gap-3 mb-10 items-stretch sm:items-end">

                    <div class="relative flex-1 w-full">
                        <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-accentsecond"></i>
                        <input x-model="search" type="text" placeholder="Search vessel name..." autocomplete="off"
                            class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-accentsecond bg-background text-sm text-primary placeholder-accentsecond
                                focus:outline-none focus:ring-2 focus:ring-accent/20
                                transition-all duration-300 hover:border-accent/50">
                    </div>

                    <div class="flex items-center gap-2 flex-wrap sm:flex-nowrap flex-shrink-0">

                        <div class="relative flex-1 sm:flex-none">
                            <select x-model="year"
                                class="w-full appearance-none pl-4 pr-10 py-2.5 rounded-xl border border-accentsecond bg-background text-sm text-accent
                                    focus:outline-none focus:ring-2 focus:ring-accent/20
                                    transition-all duration-300 hover:border-accent/50 cursor-pointer">
                                <option value="">All Years</option>
                                <template x-for="y in years" :key="y">
                                    <option :value="String(y)" x-text="y"></option>
                                </template>
                            </select>
                            <i class="ti ti-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-accentsecond pointer-events-none"></i>
                        </div>

                        <div class="relative flex-1 sm:flex-none">
                            <select x-model="initial"
                                class="w-full appearance-none pl-4 pr-10 py-2.5 rounded-xl border border-accentsecond bg-background text-sm text-accent
                                    focus:outline-none focus:ring-2 focus:ring-accent/20
                                    transition-all duration-300 hover:border-accent/50 cursor-pointer">
                                <option value="">All A–Z</option>
                                <template x-for="letter in alphabet.filter(l => availableInitials.has(l))" :key="letter">
                                    <option :value="letter" x-text="letter"></option>
                                </template>
                            </select>
                            <i class="ti ti-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-accentsecond pointer-events-none"></i>
                        </div>

                        <button x-show="hasFilter" x-transition @click="reset()"
                            class="px-4 py-2.5 rounded-xl border border-accent bg-background text-sm text-accent
                                hover:text-primary hover:border-primary hover:scale-105 active:scale-95
                                transition-all duration-300 cursor-pointer whitespace-nowrap">
                            Reset
                        </button>

                    </div>
                </div>

                {{-- MASONRY GRID --}}
                <div x-show="filtered.length > 0" class="w-full columns-1 sm:columns-2 gap-6">
                    <template x-for="project in filtered" :key="project.id">

                        <div data-aos="custom-zoom-in-up" data-aos-duration="600"
                            class="group break-inside-avoid mb-6 relative
                                transition-transform duration-300 hover:-translate-y-1"
                            :class="{ 'cursor-pointer': true }">

                            {{-- Mobile/Tablet tap overlay --}}
                            <div class="md:hidden absolute inset-0 z-20 cursor-pointer rounded-xl"
                                @click="window.location.href = project.url">
                            </div>

                            <div class="mag-area relative overflow-hidden rounded-xl
                                shadow-md hover:shadow-xl transition-shadow duration-500">
                                <img :src="'/storage/' + project.cover_image" :alt="project.name" loading="lazy"
                                    class="w-full h-auto object-cover group-hover:scale-110 transition-transform ease-in-out duration-500">

                                <div
                                    class="absolute inset-0 flex flex-col justify-end p-5 md:p-8 gap-2 items-center rounded-xl
                                        bg-gradient-to-t from-black/70 via-black/15 to-transparent pointer-events-none">
                                    <h1 class="text-base md:text-xl text-white font-light
                                        translate-y-1 group-hover:translate-y-0 transition-transform duration-300"
                                        x-text="project.name"></h1>
                                    <h1 class="text-xs md:text-sm text-white py-1 px-2 rounded-sm bg-white/30 font-medium
                                        opacity-80 group-hover:opacity-100 transition-opacity duration-300"
                                        x-text="project.year"></h1>
                                </div>

                                {{-- Desktop only: mag button --}}
                                <div class="hidden md:flex group/item absolute inset-0 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                                    <div class="mag-btn pointer-events-auto">
                                        <a :href="project.url"
                                            class="flex justify-center items-center relative overflow-hidden bg-black/50 rounded-full w-12 h-12 group-hover/item:w-44 transition-all duration-500">
                                            <i
                                                class="ti ti-eye absolute text-white text-2xl group-hover/item:opacity-0 group-hover/item:translate-y-[-40px] delay-100 transition ease-in-out duration-300"></i>
                                            <i
                                                class="ti ti-eye-search absolute flex items-center justify-center gap-2 text-white text-2xl opacity-0 group-hover/item:opacity-100 delay-100 ease-in-out duration-300 translate-y-10 transition-all group-hover/item:translate-y-0">
                                                <span class="text-base font-normal font-sans shrink-0">View Heritage</span>
                                            </i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </template>
                </div>

                {{-- Empty state --}}
                <div x-show="filtered.length === 0"
                    class="w-full py-24 flex flex-col items-center gap-4 text-center">
                    <i class="ti ti-ship text-4xl text-accentthird animate-bounce"></i>
                    <p class="text-accent text-base">No vessels found matching your search.</p>
                    <button @click="reset()"
                        class="text-sm text-secondary underline hover:opacity-70 transition-opacity duration-200">
                        Clear filters
                    </button>
                </div>
            </div>
            {{-- ── END PANEL: COMPLETED FLEET ─────────────────────────────── --}}

            {{-- ── PANEL: UNDER CONSTRUCTION ───────────────────────────────── --}}
            <div x-show="activeTab === 'construction'">

                {{-- Empty state --}}
                <div x-show="construction.length === 0"
                    class="w-full py-24 flex flex-col items-center gap-4 text-center">
                    <i class="ti ti-crane text-4xl text-accentthird animate-bounce"></i>
                    <p class="text-accent text-base">There are currently no ships under construction.</p>
                </div>

                {{-- Construction grid --}}
                <div x-show="construction.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                    <template x-for="vessel in construction" :key="vessel.id">
                        <div data-aos="custom-zoom-in-up" data-aos-duration="600"
                            class="group rounded-xl border border-accentthird overflow-hidden
                                hover:border-accent/50 hover:-translate-y-1 hover:shadow-xl
                                transition-all duration-300
                                bg-background relative">

                            {{-- Mobile/Tablet: seluruh card bisa diklik --}}
                            <div class="md:hidden absolute inset-0 z-20 cursor-pointer"
                                @click="window.location.href = vessel.url">
                            </div>

                            {{-- Image --}}
                            <div class="mag-area relative overflow-hidden h-max">
                                <template x-if="vessel.construction_cover">
                                    <img :src="'/storage/' + vessel.construction_cover" :alt="vessel.name" loading="lazy"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform ease-in-out duration-500">
                                </template>
                                <template x-if="!vessel.construction_cover && vessel.progress_photos && vessel.progress_photos.length > 0">
                                    <img :src="'/storage/' + vessel.progress_photos[0]" :alt="vessel.name" loading="lazy"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform ease-in-out duration-500">
                                </template>
                                <template x-if="!vessel.construction_cover && (!vessel.progress_photos || vessel.progress_photos.length === 0) && vessel.cover_image">
                                    <img :src="'/storage/' + vessel.cover_image" :alt="vessel.name" loading="lazy"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform ease-in-out duration-500">
                                </template>
                                <template x-if="!vessel.construction_cover && (!vessel.progress_photos || vessel.progress_photos.length === 0) && !vessel.cover_image">
                                    <div class="w-full h-48 flex items-center justify-center bg-accent/10">
                                        <i class="ti ti-crane text-4xl text-accent/30 animate-pulse"></i>
                                    </div>
                                </template>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none"></div>

                                {{-- Stage badge --}}
                                <div class="absolute top-3 left-3 transition-transform duration-300 group-hover:scale-105">
                                    <span class="flex items-center gap-1.5 text-md font-medium px-2.5 py-1 rounded bg-secondary/10 text-background border border-secondary">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                                        <span x-text="vessel.stage_label"></span>
                                    </span>
                                </div>

                                {{-- Desktop only: mag button --}}
                                <div class="hidden md:flex group/item absolute inset-0 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                                    <div class="mag-btn pointer-events-auto">
                                        <a :href="vessel.url"
                                            class="flex justify-center items-center relative overflow-hidden bg-black/50 rounded-full w-12 h-12 group-hover/item:w-44 transition-all duration-500">
                                            <i class="ti ti-eye absolute text-white text-2xl group-hover/item:opacity-0 group-hover/item:translate-y-[-40px] delay-100 transition ease-in-out duration-300"></i>
                                            <i class="ti ti-eye-search absolute flex items-center justify-center gap-2 text-white text-2xl opacity-0 group-hover/item:opacity-100 delay-100 ease-in-out duration-300 translate-y-10 transition-all group-hover/item:translate-y-0">
                                                <span class="text-base font-normal font-sans shrink-0">View Heritage</span>
                                            </i>
                                        </a>
                                    </div>
                                </div>

                                {{-- Progress bar --}}
                                <div class="absolute bottom-0 left-0 right-0 px-4 py-3 bg-primary/70">
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="text-md text-accentthird">Construction progress</span>
                                        <span class="text-md font-medium text-secondary" x-text="vessel.progress_percentage + '%'"></span>
                                    </div>
                                    <div class="h-1 bg-secondary/20 rounded-full overflow-hidden">
                                        <div class="h-full bg-secondary rounded-full transition-all duration-700 ease-out"
                                            :style="'width:' + vessel.progress_percentage + '%'"></div>
                                    </div>
                                </div>
                            </div>

                            {{-- Card body --}}
                            <div class="p-4">
                                <h3 class="text-base font-medium text-primary mb-3
                                    transition-colors duration-200 group-hover:text-accent"
                                    x-text="vessel.name"></h3>

                                {{-- Stage indicator --}}
                                <div class="flex gap-1 mb-1">
                                    <template x-for="(s, i) in stages" :key="s">
                                        <div class="flex-1 h-1 rounded-full transition-all duration-500" :class="{
                                                        'bg-secondary':     i < vessel.stage_index,
                                                        'bg-secondary/30':  i === vessel.stage_index,
                                                        'bg-accent/20':     i > vessel.stage_index
                                                    }">
                                        </div>
                                    </template>
                                </div>
                                <div class="flex justify-between mb-4">
                                    <template x-for="(s, i) in stages" :key="s">
                                        <span class="flex-1 text-center text-sm transition-colors duration-200"
                                            :class="i === vessel.stage_index ? 'text-secondary font-medium' : 'text-accent/50'"
                                            x-text="['Design','Keel','Hull','Fit-out','Launch'][i]">
                                        </span>
                                    </template>
                                </div>

                                {{-- Meta --}}
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-accent border border-accent/20 px-2 py-0.5 rounded
                                        transition-all duration-200 hover:border-accent/50 hover:text-primary"
                                        x-text="vessel.type ?? 'Pinisi'"></span>
                                    <template x-if="vessel.estimated_launch_date">
                                        <div class="flex items-center gap-1.5 text-sm text-accent
                                            transition-colors duration-200 group-hover:text-primary">
                                            <i class="ti ti-calendar text-sm transition-transform duration-300 group-hover:scale-110"></i>
                                            <span x-text="'Est. ' + vessel.estimated_launch_date"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

@endsection