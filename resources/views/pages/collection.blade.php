@extends('layouts.app')

@section('content')
@section('meta_description', 'Explore our collection of premium handcrafted Pinisi vessels — each built with precision,
indigenous timber, and the timeless craftsmanship of South Sulawesi\'s master shipbuilders.')

{{-- HERO SECTION --}}
<section class="relative w-full min-h-[50vh] md:min-h-screen overflow-hidden px-6 md:px-10 lg:px-21 py-8">
    <div class="absolute inset-0 z-0 h-[95%] pointer-events-none overflow-hidden flex items-end leading-none">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
            <h1 style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </h1>
            <div class="h-104 w-full absolute left-[-90px] top-4 md:top-20 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10"></div>
        </div>
    </div>

    {{-- Mobile --}}
    <div data-aos="custom-blur-up" class="relative z-10 flex flex-col md:hidden gap-2 pt-16 pb-12">
        <h1 class="text-7xl text-primary font-extrabold leading-none" style="font-family: 'Poppins', sans-serif;">Our</h1>
        <h1 class="text-7xl font-extrabold leading-none" style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">Fleet</h1>
    </div>

    {{-- Desktop --}}
    <div class="relative z-10 hidden md:flex items-start h-[85vh]">
        <div data-aos="custom-blur-up" class="h-100 w-160">
            <h1 class="text-[clamp(80px,12vw,180px)] text-primary font-extrabold leading-none" style="font-family: 'Poppins', sans-serif;">Our</h1>
            <h1 class="text-[clamp(80px,12vw,180px)] font-extrabold leading-none" style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">Fleet</h1>
        </div>
    </div>
</section>

<script>
window._projects = @json($projectsData);
window._years = @json($yearsData);
</script>

{{-- COLLECTION GRID --}}
<section class="px-8 md:pb-13 lg:px-23 pb-24 -mt-8 w-full" x-data="{
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
        }
    }">

    {{-- FILTER BAR --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-10 items-stretch sm:items-end">

        {{-- Search --}}
        <div class="relative flex-1 w-full">
            <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-accentsecond"></i>
            <input
                x-model="search"
                type="text"
                placeholder="Search vessel name..."
                autocomplete="off"
                class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-accent bg-background text-sm text-primary placeholder-accentsecond focus:outline-none focus:ring-2 focus:ring-accent/20 transition"
            >
        </div>

        {{-- Filters row --}}
        <div class="flex items-center gap-2 flex-wrap sm:flex-nowrap flex-shrink-0">

            {{-- Year --}}
            <div class="relative flex-1 sm:flex-none">
                <select
                    x-model="year"
                    class="w-full appearance-none pl-4 pr-10 py-2.5 rounded-xl border border-accent bg-background text-sm text-accent focus:outline-none focus:ring-2 focus:ring-accent/20 transition cursor-pointer"
                >
                    <option value="">All Years</option>
                    <template x-for="y in years" :key="y">
                        <option :value="String(y)" x-text="y"></option>
                    </template>
                </select>
                <i class="ti ti-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-accentsecond pointer-events-none"></i>
            </div>

            {{-- A–Z --}}
            <div class="relative flex-1 sm:flex-none">
                <select
                    x-model="initial"
                    class="w-full appearance-none pl-4 pr-10 py-2.5 rounded-xl border border-accent bg-background text-sm text-accent focus:outline-none focus:ring-2 focus:ring-accent/20 transition cursor-pointer"
                >
                    <option value="">All A–Z</option>
                    <template x-for="letter in alphabet.filter(l => availableInitials.has(l))" :key="letter">
                        <option :value="letter" x-text="letter"></option>
                    </template>
                </select>
                <i class="ti ti-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-accentsecond pointer-events-none"></i>
            </div>

            {{-- Reset --}}
            <button
                x-show="hasFilter"
                x-transition
                @click="reset()"
                class="px-4 py-2.5 rounded-xl border border-accent bg-background text-sm text-accent hover:text-primary hover:border-primary transition duration-300 cursor-pointer whitespace-nowrap"
            >
                Reset
            </button>

        </div>
    </div>

    {{-- GRID --}}
    <div x-show="filtered.length > 0" class="w-full columns-1 sm:columns-2 gap-6">
        <template x-for="project in filtered" :key="project.id">
            <div data-aos="custom-zoom-in-up" data-aos-duration="600"
                class="group cursor-pointer break-inside-avoid mb-6">
                <div class="mag-area relative overflow-hidden rounded-xl">
                    <img :src="'/storage/' + project.cover_image" :alt="project.name" loading="lazy"
                        class="w-full h-auto object-cover group-hover:scale-110 transition ease-in-out duration-500">
                    <div class="absolute inset-0 flex flex-col justify-end p-5 md:p-8 gap-2 items-center rounded-xl bg-gradient-to-t from-black/70 via-black/15 to-transparent pointer-events-none">
                        <h1 class="text-base md:text-xl text-white font-light" x-text="project.name"></h1>
                        <h1 class="text-xs md:text-sm text-white py-1 px-2 rounded-sm bg-white/30 font-medium" x-text="project.year"></h1>
                    </div>
                    <div class="group/item absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                        <div class="mag-btn pointer-events-auto">
                            <a :href="project.url"
                                class="flex justify-center items-center relative overflow-hidden bg-black/50 rounded-full w-12 h-12 group-hover/item:w-44 transition-all duration-500">
                                <i class="ti ti-eye absolute text-white text-2xl group-hover/item:opacity-0 group-hover/item:translate-y-[-40px] delay-100 transition ease-in-out duration-300"></i>
                                <i class="ti ti-eye-search absolute flex items-center justify-center gap-2 text-white text-2xl opacity-0 group-hover/item:opacity-100 delay-100 ease-in-out duration-300 translate-y-10 transition-all group-hover/item:translate-y-0">
                                    <span class="text-base font-normal shrink-0">View Heritage</span>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Empty state --}}
    <div x-show="filtered.length === 0" class="w-full py-24 flex flex-col items-center gap-4 text-center">
        <i class="ti ti-ship text-4xl text-accentthird"></i>
        <p class="text-accent text-base">No vessels found matching your search.</p>
        <button @click="reset()" class="text-sm text-secondary underline">Clear filters</button>
    </div>

</section>

@endsection