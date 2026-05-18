<div class="flex flex-col h-full pb-8 px-6 font-['Jost',sans-serif] bg-white overflow-hidden"
    style="height:calc(100dvh - 61px);">

    {{-- Nav Links --}}
    <nav class="flex flex-col mt-1">
        @php
        $path = request()->path();
        $navItems = [
        ['href' => '/', 'label' => 'Home', 'match' => ''],
        ['href' => '/about', 'label' => 'About', 'match' => 'about'],
        ['href' => '/collection', 'label' => 'Collection', 'match' => 'collection'],
        ['href' => '/contact', 'label' => 'Contact', 'match' => 'contact'],
        ];
        @endphp

        @foreach($navItems as $item)
        @php $active = $path === $item['match']; @endphp
        <a href="{{ $item['href'] }}" class="relative group block text-xl font-normal py-[18px] border-b border-accentthird no-underline transition-colors duration-300
                    {{ $active ? 'text-secondary' : 'text-primary hover:text-secondary' }}">
            {{ $item['label'] }}
            <span class="absolute left-0 bottom-0 h-[2px] bg-secondary transition-all duration-300
                            {{ $active ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
        </a>
        @endforeach
    </nav>

    {{-- Spacer --}}
    <div class="flex-1"></div>

    {{-- Social Icons --}}
    <div class="flex gap-8 md:ml-[1vw] md:mt-[16vh]">
        <a href="" aria-label="Tiktok"
            class="flex-shrink-0 bg-transparent border border-accentthird relative group overflow-hidden text-primary hover:text-background w-11 h-11 flex items-center justify-center rounded-full shadow-md transition duration-300">
            <span
                class="absolute bg-secondary rounded-full  inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span>
            <i class="ti ti-brand-tiktok relative text-xl"></i>
        </a>
        <a href="" aria-label="Tiktok"
            class="flex-shrink-0 bg-transparent border border-accentthird relative group overflow-hidden text-primary hover:text-background w-11 h-11 flex items-center justify-center rounded-full shadow-md transition duration-300">
            <span
                class="absolute bg-secondary rounded-full  inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span>
            <i class="ti ti-brand-instagram relative text-xl"></i>
        </a>
        <a href="" aria-label="Tiktok"
            class="flex-shrink-0 bg-transparent border border-accentthird relative group overflow-hidden text-primary hover:text-background w-11 h-11 flex items-center justify-center rounded-full shadow-md transition duration-300">
            <span
                class="absolute bg-secondary rounded-full  inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span>
            <i class="ti ti-brand-linkedin relative text-xl"></i>
        </a>
    </div>

</div>