<nav class="px-10 lg:px-14 xl:px-20 py-4 flex justify-between items-center">

    {{-- Logo --}}
    <div class="flex items-center gap-1 ">
        <picture>
            <img src="{{ url('img/Bina Pusaka/Aset/LOGO BINA PUSAKA 21.webp') }}" alt="BP Marine Logo"
                class="h-12 w-auto">
        </picture>
        <div class="flex flex-col leading-tight">
            <span class="lg:text-[2vh] xl:text-[2.8vh] text-primary">BINA PUSAKA</span>
            <span class="lg:text-[0.9vh] xl:text-[1.3vh] font-light text-accentsecond tracking-wide">Design and Pinisi Construction</span>
        </div>
    </div>

    {{-- Menu --}}
    <ul class="flex gap-16 ml-[17.5vw]">
        <li><a href="/"
                class="relative group text-medium text-primary hover:text-secondary transition ease-in-out duration-300">Home<span
                    class="absolute left-0 -bottom-1 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span></a>
        </li>
        <li><a href="/about"
                class="relative group text-medium text-primary hover:text-secondary transition ease-in-out duration-300">About<span
                    class="absolute left-0 -bottom-1 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span></a>
        </li>
        <li><a href="/collection"
                class="relative group text-medium text-primary hover:text-secondary transition ease-in-out duration-300">Collection<span
                    class="absolute left-0 -bottom-1 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span></a>
        </li>
    </ul>

    {{-- Button --}}
    <a href="/contact"
        class="group relative overflow-hidden px-6 py-2 mr-3 border border-primary rounded-full text-primary">
        <span
            class="absolute rounded-full inset-y-0 left-0 w-0 bg-primary transition-all duration-500 group-hover:w-full"></span>
        <span
            class="flex items-center gap-2 text-md text-primary font-medium relative z-10 group-hover:text-white transition">
            Contact Us <i class="ti ti-arrow-up-right"></i>
        </span>
    </a>

</nav>