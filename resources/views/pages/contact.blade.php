@extends('layouts.app')
@section('title', 'Contact BPMarine.Co — Inquire About a Custom Pinisi')
@section('og_title', 'Get in Touch with BPMarine.Co — Pinisi Shipyard Inquiries')
@section('meta_description', 'Reach out to BPMarine.Co for custom Pinisi builds, charter inquiries, or shipyard visits. Our team in Bulukumba, South Sulawesi is ready to bring your vessel vision to life.')

@section('content')

{{-- Hero Section --}}
<section class="relative w-full overflow-hidden py-8">
    <div data-aos="custom-blur-up" class="relative px-6 md:px-12 lg:px-21 z-10 w-full">
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl text-primary font-extrabold leading-tight">
            Every Journey
        </h1>
        <div class="flex flex-col md:flex-row md:items-center gap-3 md:gap-8">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl text-accent font-extrabold leading-tight whitespace-nowrap" 
            style="color:transparent;-webkit-text-stroke:2px var(--color-accent); font-family: 'Poppins', sans-serif;">
                Begins Here
            </h1>
            <p class="text-sm sm:text-base md:text-lg text-accentsecond lg:font-medium max-w-xs md:max-w-2xl">
                Share your ideas with us and begin the process of building a handcrafted Pinisi vessel.
            </p>
        </div>
    </div>
    <div class="inset-0 z-0 pointer-events-none overflow-hidden mt-16 md:mt-24 flex items-end leading-none">
        <div class="whitespace-nowrap animate-leftscroll text-[30vw] md:text-[20vw] font-medium">
            <h1 style="color:transparent;-webkit-text-stroke:2px var(--color-accentthird); font-family: 'Poppins', sans-serif;"
                class="select-none cursor-default">
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
                We Carry a 14th-Century Maritime Legacy into the Future of Indonesia &nbsp;
            </h1>
            <div
                class="h-104 w-full absolute left-[-90px] top-4 md:top-20 bg-gradient-to-t from-background/100 via-background/100 to-background/20 z-10">
            </div>
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section class="flex flex-col mt-[-32px] md:flex-row w-full px-6 md:px-12 lg:px-22 pb-16 md:pb-20 items-start">
    {{-- Info Kontak --}}
    <div class="w-full md:w-1/2 bg-background border-2 border-b-0 md:border-b-2 md:border-r-0 border-accentsecond min-h-120 overflow-hidden">
        <div data-aos="fade-up"
            class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-1">
            <h1 class="text-sm md:text-base text-accent font-medium">/Phone</h1>
            <h1 class="text-xl md:text-2xl lg:text-3xl text-primary font-medium">+62 821-3081-0592</h1>
        </div>
        <div data-aos="fade-up"
            class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-1">
            <h1 class="text-sm md:text-base text-accent font-medium">/Email</h1>
            <h1 class="text-base md:text-xl lg:text-2xl text-primary font-medium break-all">binapusaka98@gmail.com</h1>
        </div>
        <div data-aos="fade-up" class="flex flex-col justify-center w-full p-5 md:p-6 lg:p-8 gap-1 border-accentsecond">
            <h1 class="text-sm md:text-base text-accent font-medium">/Location</h1>
            <h1 class="text-base md:text-lg lg:text-2xl text-primary font-medium leading-snug">
                F997+V26, Jl. Poros Bira Bulukumba, Tanah Lemo, Kec. Bonto Bahari, Kabupaten Bulukumba, Sulawesi Selatan
                92571
            </h1>
        </div>
    </div>

    {{-- Form + Button --}}
    <div class="w-full md:w-1/2 flex flex-col" x-data="{ sent: {{ session('success') ? 'true' : 'false' }} }">
        <div x-show="sent" x-cloak
            class="bg-background flex flex-col items-center justify-center gap-6 border-2 border-accentsecond p-12 text-center min-h-120">
            <div class="flex items-center justify-center w-20 h-20 rounded-full bg-accentthird border border-accentsecond">
                <i class="ti ti-mail-check text-4xl text-accent"></i>
            </div>
            <div class="flex flex-col gap-2">
                <h1 class="text-2xl text-primary font-semibold">Pesan Telah Terkirim!</h1>
                <p class="text-sm text-accentsecond max-w-xs leading-relaxed">
                    Terima kasih telah menghubungi kami. Tim kami akan segera merespons melalui email atau telepon Anda.
                </p>
            </div>
        </div>

        {{-- State: Form --}}
        <div x-show="!sent">
        <div class="bg-background border-2 border-accentsecond">
            <form action="{{ route('contact.send') }}" id="contact-form" method="POST" class="flex flex-col">
                @csrf
                <div data-aos="fade-up"
                    class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Name</label>
                    <input type="text" name="name" placeholder="John Doe"
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent placeholder-accent">
                </div>
                <div data-aos="fade-up"
                    class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Email</label>
                    <input type="email" name="email" placeholder="John@example.com"
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent placeholder-accent">
                </div>
                <div data-aos="fade-up"
                    class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Phone</label>
                    <input type="tel" name="phone" placeholder="+62 812 3456 7890"
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent placeholder-accent">
                </div>
                <div data-aos="fade-up"
                    class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Company</label>
                    <input type="text" name="company" placeholder="Your Company Name"
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent placeholder-accent">
                </div>
                <div data-aos="fade-up"
                    class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Country</label>
                    <select name="country" id="country-select"
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent text-accent"
                        onchange="if(this.value) this.classList.remove('text-accent'); else this.classList.add('text-accent')">
                        <option value="" disabled selected>Select your country</option>
                        <option value="Indonesia" class="text-primary">Indonesia</option>
                        <option value="Malaysia" class="text-primary">Malaysia</option>
                        <option value="Singapore" class="text-primary">Singapore</option>
                        <option value="Australia" class="text-primary">Australia</option>
                        <option value="United States" class="text-primary">United States</option>
                        <option value="United Kingdom" class="text-primary">United Kingdom</option>
                        <option value="Netherlands" class="text-primary">Netherlands</option>
                        <option value="Germany" class="text-primary">Germany</option>
                        <option value="France" class="text-primary">France</option>
                        <option value="Japan" class="text-primary">Japan</option>
                        <option value="China" class="text-primary">China</option>
                        <option value="India" class="text-primary">India</option>
                        <option value="UAE" class="text-primary">UAE</option>
                        <option value="Saudi Arabia" class="text-primary">Saudi Arabia</option>
                        <option value="Other" class="text-primary">Other</option>
                    </select>
                </div>
                <div data-aos="fade-up"
                    class="flex flex-col justify-center border-b-2 border-accentsecond w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Subject</label>
                    <input type="text" name="subject" placeholder="Pinisi Build Inquiry"
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent placeholder-accent">
                </div>
                <div data-aos="fade-up" class="flex flex-col justify-center w-full p-5 md:p-6 lg:p-8 gap-2">
                    <label class="text-sm font-medium text-accent">/Message</label>
                    <textarea name="message" rows="5" placeholder="Tell us about your project..."
                        class="border border-accentthird rounded-xl px-4 py-3 text-sm outline-none focus:border-accentsecond transition duration-300 bg-transparent resize-none placeholder-accent"></textarea>
                </div>
            </form>
        </div>

        <div data-aos="custom-zoom-in-up" class="mt-5 md:mt-6">
            <button type="submit" form="contact-form"
                class="bg-secondary relative group overflow-hidden text-background w-full md:w-44 h-12 flex items-center justify-center cursor-pointer rounded-full shadow-md transition ease-in-out duration-500">
                <span
                    class="absolute bg-primary rounded-full inset-y-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span>
                <p class="relative z-10 text-lg font-base">Send Message</p>
            </button>
        </div>
        </div> {{-- end x-show="!sent" --}}

    </div>

</section>

@endsection