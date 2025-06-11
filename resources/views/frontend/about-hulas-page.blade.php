@extends('frontend.layouts.app')
@section('title', __('about.about_hulas_remittance'))
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

    <div class="min-h-screen">

        <!-- banner-section -->
        <section class="relative">
            <div class="mb-10">
                <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
                    alt="Banner Image" class="h-60 w-full object-cover" />
            </div>
            <div class="absolute w-full top-20">
                <div class="flex flex-col space-y-8 ml-10">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ __('about.about_hulas_remittance') }}</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('about.home') }}</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('aboutHulasRemittance') }}" class="text-accent font-bold">{{ __('about.about_hulas_remittance') }}</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->
        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 pb-20">

            <!-- About Hulas Remittance -->
            <section class="m-6 md:m-10 2xl:mx-30">
                <div class=" flex flex-col gap-6 md:flex-row  md:justify-center md:items-center">
                    <!-- image -->
                    <div class="flex-1 flex justify-center w-full">
                        @isset($aboutUs->image)
                            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                                class="w-full rounded-xl object-contain lg:object-fit" alt="About Us Image" />
                        @endisset
                    </div>

            <!-- Text Container -->
            <div class="flex md:flex-2 flex-col space-y-6">
                <h2 class="text-xl lg:text-2xl font-bold text-black">
                    {{ __('about.about_hulas_remittance') }}
                </h2>
                @isset($aboutUs->description_en)
                <div class="text-lg">
                    <p>{!! app()->getLocale() == 'en' 
                        ? $aboutUs->description_en 
                        : (isset($aboutUs->description_np) 
                            ? $aboutUs->description_np 
                            : $aboutUs->description_en) !!}</p>
                </div>
                @endisset
                <!-- Years of experience -->
                <div class="flex flex-col items-center space-y-3 lg:space-y-0 lg:flex-row lg:space-x-4">
                    <div
                        class="w-60 md:w-40 lg:w-60 bg-black rounded-xl flex justify-start lg:justify-center items-center flex-col space-y-2 lg:space-y-4 p-3">
                        @isset($aboutUs->years_of_experience_en)
                        <p class="text-accent font-bold text-2xl">
                            {!! app()->getLocale() == 'en' 
                                ? $aboutUs->years_of_experience_en 
                                : (isset($aboutUs->years_of_experience_np) 
                                    ? $aboutUs->years_of_experience_np 
                                    : $aboutUs->years_of_experience_en) !!}
                        </p>
                        @endisset
                        <p class="text-accent text-center text-lg">
                            {{ __('about.years_of_experience') }}
                        </p>
                    </div>
                </div>
                <hr class="mr-5 text-gray-400 font-semibold" />

                <!-- Social Media links -->
                <div>
                    <div class="flex flex-row gap-4 mx-3">
                        <!-- Facebook -->
                        @isset($setting->facebook)
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="{{ $setting->facebook }}">
                                <img src="{{ asset('assets/images/social-media-icons/facebook-black.svg') }}"
                                    alt="Facebook Icon" class="w-6 h-6">
                            </a>
                        </div>
                        @endisset


                        <!-- Linkdin -->
                        @isset($setting->linkedin)
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="{{ $setting->linkedin }}">
                                <img src="{{ asset('assets/images/social-media-icons/linkedin-svgrepo-com.svg') }}"
                                    alt="Linkdin Icon" class="w-4 h-4">
                            </a>
                        </div>
                        @endisset

                        <!-- Twitter -->
                        @isset($setting->twitter)
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="{{ $setting->twitter }}">
                                <img src="{{ asset('assets/images/social-media-icons/icons8-x-50.png') }}"
                                    alt="Twitter Icon" class="w-5 h-5">
                            </a>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


            <!----------Services Section---------->
            <section class="m-10 items-center">
                <section class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                            <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                                {{ __('about.our_services') }}
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                {{ __('about.simple_secure_seamless') }}
                            </p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                {{ __('about.services_description') }}
                            </p>
                        </div>
                    </div>
                </section>
                <div class="relative flex items-center justify-center">
                    <button
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 text-xl text-gray-600 bg-transparent border-none cursor-pointer z-10"
                        onclick="prevServicesSlider()">
                        ❮
                    </button>

                    <div class="overflow-hidden rounded-lg w-full">
                        <div class="flex flex-row gap-8 transition-transform duration-500 ease-in-out"
                            id="services-slider-content">
                            @isset($services)
                                @foreach ($services as $service)
                                    <div
                                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between services-review-card">
                                        <div class="flex flex-col items-center">
                                            @if ($service->file)
                                                <img src="{{ asset('storage/' . $service->file) }}"
                                                alt="{{ app()->getLocale() == 'en' ? $service->name_en : (isset($service->name_np) ? $service->name_np : $service->name_en) }}" 
                                                class="w-full h-[200px] rounded-lg object-cover" />
                                            @else
                                                <div class="w-full h-[200px] rounded-lg bg-gray-200 flex items-center justify-center">
                                                    <i class="{{ $service->icon ?? 'fa fa-briefcase' }} text-5xl text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-lg font-bold text-center">
                                            {!! app()->getLocale() == 'en' 
                                                ? $service->name_en 
                                                : (isset($service->name_np) 
                                                    ? $service->name_np 
                                                    : $service->name_en) !!}
                                        </h3>
                                        <p class="text-base md:text-lg text-black text-center">
                                            {!! app()->getLocale() == 'en' 
                                                ? $service->description_en 
                                                : (isset($service->description_np) 
                                                    ? $service->description_np 
                                                    : $service->description_en) !!}
                                        </p>
                                        <div class="flex justify-center">
                                            <a href="{{ $service->slug ? route('serviceDetail', $service->slug) : '#' }}"
                                                class="bg-black hover:opacity-85 text-accent px-4 py-2 tracking-wide rounded-full text-sm text-center font-semibold">{{ __('about.read_more') }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>

                    <button
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
                        onclick="nextServicesSlider()">
                        ❯
                    </button>
                </div>
            </section>
            <!----------Services Section---------->

            <!-- Section breaker -->
            <div
                class="flex flex-col lg:flex-row bg-accent items-center justify-around gap-10 text-black rounded-lg mx-6 my-10 md:m-10 lg:mx-20 px-10 py-10">
                <div class="flex flex-col gap-6 text-center">
                    <h1 class="text-2xl lg:text-5xl font-extrabold tracking-wide">{{ __('about.lets_get_started') }}</h1>
                    <p class="line-clamp-2 text-lg lg:text-xl">{{ __('about.lets_get_started_description') }}</p>
                </div>
                <a href="{{ route('findAnAgent') }}"
                    class="px-6 py-4 bg-black text-accent rounded-full cursor-pointer text-center text-xl w-60 inline-block font-bold hover:opacity-85">{{ __('about.find_an_agent') }}</a>
            </div>
            <!-- Section breaker -->
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        // Services slider functionality
        let servicesCurrentSlide = 0;
        const servicesSliderContent = document.getElementById('services-slider-content');
        const servicesCards = document.querySelectorAll('.services-review-card');
        const servicesCardWidth = servicesCards.length > 0 ? servicesCards[0].offsetWidth + 32 : 400; // width + gap
        const servicesMaxSlide = Math.max(0, servicesCards.length - 3); // Show 3 items at once on desktop

        function nextServicesSlider() {
            if (servicesCurrentSlide < servicesMaxSlide) {
                servicesCurrentSlide++;
                updateServicesSliderPosition();
            }
        }

        function prevServicesSlider() {
            if (servicesCurrentSlide > 0) {
                servicesCurrentSlide--;
                updateServicesSliderPosition();
            }
        }

        function updateServicesSliderPosition() {
            const position = -servicesCurrentSlide * servicesCardWidth;
            servicesSliderContent.style.transform = `translateX(${position}px)`;
        }

        // Initialize slider positions on page load
        window.addEventListener('load', function () {
            if (servicesSliderContent && servicesCards.length > 0) {
                updateServicesSliderPosition();
            }
        });
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
