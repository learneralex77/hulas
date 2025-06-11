@extends('frontend.layouts.app')
@section('title', __('home.home'))
@section('meta', __('home.meta_description'))
@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .carousel {
            display: flex;
            width: 100%;
            /* Adjust according to your container's size */
            overflow: hidden;
            /* Hide the content that is off-screen */
        }

        .carousel-item {
            flex: 0 0 100%;
            /* Each item takes up 100% of the width */
            animation: carouselAnim 200s linear infinite;
            /* 60 seconds for a full loop, slow pace */
            transition: transform 0.5s ease;
        }

        .carousel-focus:hover {
            transition: all 0.8s;
            transform: scale(1.1);
        }

        .carousel-container {
            display: flex;
            animation: scrollOnce 30s linear infinite;
        }

        .carousel-container.reverse {
            animation: scrollBack 0s linear infinite;
        }


        .carousel:hover .carousel-container {
            animation-play-state: paused;
        }
    </style>
@endpush

@section('content')
    <div class="min-h-screen">
        <!-- Slider Section -->
        @isset($sliders)
            <section id="home-slider">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-[200px] sm:h-[300px] overflow-hidden rounded-lg md:h-[400px] lg:h-[500px]">
                        <!-- Item 1 -->
                        @foreach ($sliders as $key => $slider)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $slider->image) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="{{ $slider->title ?? 'Slider Image' }}" />

                                <!-- Text Overlay -->
                                <div
                                    class="absolute inset-0 flex flex-col space-y-1 md:space-y-3 items-left text-left bg-black/20 py-10 sm:py-20 md:py-40 px-20 md:pb-50 md:px-30">
                                    <h2 class="text-white text-base sm:text-xl md::text-3xl md:text-5xl font-bold"
                                        style="
                                                                                                                                                                                                                                                                                  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
                                                                                                                                                                                                                                                                                  -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                                                                                                                                                                                                                                                                  ">
                                        {!! app()->getLocale() == 'en' 
                                            ? $slider->name_en 
                                            : (isset($slider->name_np) 
                                                ? $slider->name_np 
                                                : $slider->name_en) !!}
                                    </h2>
                                    <p class=" text-white text-base leading-4 sm:leading-6 sm:text-xl md:text-2xl max-w-3xl"
                                        style="
                                                                                                                                                                                                                                                                                      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                                                                                                                                                                                                                                                                  ">
                                        {!! app()->getLocale() == 'en' 
                                            ? $slider->short_description_en 
                                            : (isset($slider->short_description_np) 
                                                ? $slider->short_description_np 
                                                : $slider->short_description_en) !!}
                                    </p>
                                    <a href="{{ $slider->link ? $slider->link : '#' }}"
                                        class="px-3 sm:px-6 py-1 sm:py-2 bg-accent w-34 sm:w-40 text-center text-black border-2 rounded-full hover:opacity-85 font-semibold text-sm sm:text-lg">
                                        {{ __('home.read_more') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @isset($sliders)
                            @foreach ($sliders as $key => $slider)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                    aria-label="{{ __('home.slide') }} {{ $key + 1 }}" data-carousel-slide-to="{{ $key }}">
                                </button>
                            @endforeach
                        @endisset
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">{{ __('home.previous') }}</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">{{ __('home.next') }}</span>
                        </span>
                    </button>
                </div>
            </section>
        @endisset

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">

            <!-- --------About-us-section---------->
            <section class="overflow-x-hidden">
                <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                    <div class="flex flex-col items-center">
                        <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                            {{ __('home.our_introduction') }}
                        </h1>
                        <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                            {{ __('home.welcome') }}
                        </p>
                        @isset($aboutUs->short_description_en)
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                {!! app()->getLocale() == 'en' 
                                    ? $aboutUs->short_description_en 
                                    : (isset($aboutUs->short_description_np) 
                                        ? $aboutUs->short_description_np 
                                        : $aboutUs->short_description_en) !!}
                            </p>
                        @endisset
                    </div>
                </div>
            </section>

            <section class="flex flex-col md:flex-row md:justify-center md:items-center lg:flex-row gap-10">
                <div class="flex justify-center flex-1 flex-grow text-center">
                    <div class="flex-1 flex justify-center w-full">
                        @isset($aboutUs->image)
                            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                                class="w-full max-w-md h-80 rounded-md object-cover bg-gray-100"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.webp') }}';" />
                        @endisset
                    </div>
                </div>

                @isset($aboutUs)
                    <div class="flex flex-2 flex-col space-y-6">
                        <p class="text-gray-600 text-base lg:text-lg text-justify line-clamp-11">
                            {!! app()->getLocale() == 'en' 
                                ? ($aboutUs->description_en ?? $aboutUs->description)
                                : (isset($aboutUs->description_np) 
                                    ? $aboutUs->description_np 
                                    : ($aboutUs->description_en ?? $aboutUs->description)) !!}
                        </p>
                        <a href="{{ route('aboutHulasRemittance') }}"
                            class="text-center text-accent hover:opacity-85 text-md drop-shadow-sm cursor-pointer bg-black px-6 py-2 w-40 rounded-full font-bold">
                            {{ __('home.read_more') }}
                        </a>
                    </div>
                @endisset
            </section>
        </div>

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">
            <!----------Services-Section---------->
            @isset($service->name_en)

                <section class="m-10 items-center">
                    <section class="overflow-x-hidden">
                        <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                            <div class="flex flex-col items-center">
                            <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                            {{ __('home.our_services') }}
                                    </h1>

                                    <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                    {{ __('home.simple_secure_seamless') }}
                                    </p>
                                    <p class="p-2 text-base lg:text-lg  text-center lg:max-w-4xl line-clamp-3">
                                    {{ __('home.services_description') }}
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
                                @foreach ($services as $service)
                                    <div
                                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between services-review-card">
                                        <div class="flex flex-col items-center">
                                            @if ($service->file)
                                                <img src="{{ asset('storage/' . $service->file) }}" alt="{{ $service->name_en }}"
                                                    class="w-full h-[200px] rounded-lg object-cover" />
                                            @else
                                                <div class="w-full h-[200px] rounded-lg bg-gray-200 flex items-center justify-center">
                                                    <i class="{{ $service->icon ?? 'fa fa-briefcase' }} text-5xl text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-lg font-bold text-center">{{ $service->name_en }}</h3>
                                        <p class="text-base md:text-lg text-black text-center">
                                            {{ $service->description_en }}
                                        </p>
                                        <div class="flex justify-center">
                                            <a href="{{ $service->slug ? route('services.show', $service->slug) : '#' }}"
                                                class="bg-black  px-4 py-2 tracking-wide rounded-full text-accent hover:opacity-85 text-center">Read
                                                more</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
                            onclick="nextServicesSlider()">
                            ❯
                        </button>
                    </div>
                </section>
            @endisset
        </div>

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">
            <!----------Become an agent Section---------->
            <section class="lg:mx-40 left-10 flex flex-col space-y-10 m-10">
                <div class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                        <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                                {{ __('home.become_an_agent') }}
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                            {{ __('home.join_our_network_of_trusted_agents') }}
                            </p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                {{ __('home.take_the_next_step_in_your_career_by_becoming_an_agent_help_us_expand_our_reach_while_enjoying_flexible_opportunities_and_competitive_rewards') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Equal height flex wrapper -->
                <div class="flex flex-col lg:flex-row justify-between items-stretch gap-10">
                    <!-- Left Column -->
                    <div class="flex justify-center items-center flex-1">
                        <ul class="relative border-l-2 border-dotted border-accent space-y-10">
                            @php
                                $steps = [
                                    [
                                        'title' => __('home.select_sender_country'),
                                        'desc' => __('home.select_sender_country_desc'),
                                    ],
                                    [
                                        'title' => __('home.enter_control_number'),
                                        'desc' => __('home.enter_control_number_desc'),
                                    ],
                                    [
                                        'title' => __('home.enter_amount'),
                                        'desc' => __('home.enter_amount_desc'),
                                    ],
                                    [
                                        'title' => __('home.track_your_money'),
                                        'desc' => __('home.track_your_money_desc'),
                                    ],
                                    [
                                        'title' => __('home.receive_money_and_bonus'),
                                        'desc' => __('home.receive_money_and_bonus_desc'),
                                    ],
                                ];
                            @endphp

                            @foreach ($steps as $index => $step)
                                <li class="relative pl-6 space-x-4">
                                    <div
                                        class="absolute -left-[1.1rem] top-1 w-10 h-10  border-2 bg-accent text-black font-bold text-base rounded-full flex items-center justify-center z-10">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="mx-3">
                                        <h3 class="font-bold text-black mb-1">{{ $step['title'] }}</h3>
                                        <p class="text-[#737879] text-sm">{{ $step['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Right Column -->
                    <div class="flex flex-1 flex-col justify-center items-center text-center">
                        <img src="{{ asset('assets/images/agent/agent.jpg') }}" alt="About Us Image"
                            class="w-full max-w-[600px] rounded-md object-contain xl:object-fit mb-6" />
                        <a href="{{ route('becomeAnAgent') }}"
                            class="px-6 py-2 bg-accent text-black border-2 rounded-full hover:opacity-85 font-bold tracking-wide text-base">
                            {{ __('home.apply_to_become_an_agent') }}
                        </a>
                    </div>
                </div>
            </section>

        </div>

            <!----------Our Partners Section---------->
            <section class="my-10 z-30">
                <div class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                        <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                                {{ __('home.our_partners_supporters') }}
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                            {{ __('home.in_collaboration_with_our_esteemed_partners_and_supporters') }}
                            </p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                {{ __('home.we_are_proud_to_collaborate_with_trusted_partners_and_supporters_who_share_our_vision_and_strengthen_our_mission') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden relative">
                    <!-- Fading sides -->
                    <div class="w-full h-full absolute pointer-events-none">
                        <div class="w-1/4 h-full absolute z-20 left-0"
                            style="background: linear-gradient(to right, #fff8cc 0%, rgba(255, 255, 255, 0) 100%);">
                        </div>
                        <div class="w-1/4 h-full absolute z-20 right-0"
                            style="background: linear-gradient(to left, #fff8cc 0%, rgba(255, 255, 255, 0) 100%);">
                        </div>
                    </div>

                    <!-- Scrolling container -->
                    @isset($partners)1`
                    <div class="carousel-container w-full" style="animation: scrollOnce 20s linear infinite;">
                        @foreach ($partners as $partner)
                            <div class="carousel-focus flex !items-center flex-col relative mx-5 my-10 px-4 py-3 w-60">
                                <img src="{{ asset('storage/' . $partner->image) }}" class="min-h-40 min-w-40 rounded-xl shadow-2xl !object-fill "
                                    alt="Partners Icon" />
                                <h4 class="tracking-wide text-lg m-3">{{ $partner->name_en ?? $partner->name }}</h4>
                            </div>
                        @endforeach
                    </div>
                    @endisset
                </div>
            </section>

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40 mb-10">
            <!-- --------Gallery and News Section-------- -->
            <div class="flex flex-col md:flex-row px-4 gap-10 ">
                <div class="flex-1 overflow-hidden">
                    <div class="flex flex-row justify-between m-3">
                        <h1
                            class="font-bold text-accent uppercase text-lg lg:text-2xl tracking-wider sm:text-left text-center">
                            {{ __('home.gallery') }}
                        </h1>
                        <div class="flex justify-end">

                            <a href="{{ route('gallery') }}"
                                class="bg-black sm:w-full items-center text-accent px-6 py-2 rounded-full cursor-pointer hover:opacity-85 font-semibold">
                                {{ __('home.explore_gallery') }}
                            </a>
                        </div>
                    </div>

                    <div style=" --swiper-navigation-color: #fff; --swiper-pagination-color: #fff; "
                        class="swiper mySwiper2 w-full h-1/2 aspect-[16/9] m-2">
                        @isset($galleries)
                        <div class="swiper-wrapper h-[800px] lg:h-[400px]">
                            @foreach ($galleries as $gallery)
                                <div class="swiper-slide">
                                    <img src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg') }}"
                                        class="w-full h-full !object-cover" alt="{{ $gallery->title_en }}" />
                                </div>
                            @endforeach

                        </div>
                        @endisset
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    @isset($galleries)
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($galleries as $index => $gallery)
                                <div class="swiper-slide">
                                    <img src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg') }}"
                                        class="!w-full !h-[100px] !object-cover" alt="{{ $gallery->title_en }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endisset
                </div>

                <div class="flex-1 w-full h-full">
                    <div class="flex justify-end">
                        <a href="{{ route('newsAndEvents') }}"
                            class="bg-black items-center text-accent px-4 py-2 rounded-full cursor-pointer hover:opacity-85 font-semibold">
                            {{ __('home.explore_news_articles') }}
                        </a>
                    </div>
                    <div class="drop-shadow-xl shadow-gray-100 bg-white rounded-lg">
                        <!-- Heading for scroll -->
                        <div class="flex flex-row bg-white rounded m-3 p-3">
                            <!-- Explore part -->
                            <div class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                    fill="currentColor">
                                    <path d="M3 6h14M3 12h14M3 18h14" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                    <circle cx="20" cy="6" r="1.5" fill="black" />
                                    <circle cx="20" cy="12" r="1.5" fill="black" />
                                    <circle cx="20" cy="18" r="1.5" fill="black" />
                                </svg>
                            </div>
                            <h1 class="font-bold text-lg text-black">{{ __('home.all_news_and_articles') }}</h1>
                        </div>

                        <!-- Content inside the heading -->
                        @isset($newsAndEvents)
                        <div class="overflow-y-scroll h-[420px] m-3 sticky bg-white">
                            @foreach ($newsAndEvents as $news)
                                <div class="flex flex-row gap-10 p-2 border-l-accent border-l-[4px] my-2 shadow-sm h-25">
                                    <div class="h-auto w-30">
                                        <img src="{{ isset($news->image) ? asset('storage/' . $news->image) : asset('assets/images/placeholder.jpg') }}"
                                            alt="{{ $news->title_en ?? 'News Image' }}"
                                            class="h-full w-full rounded-lg object-cover" />
                                    </div>

                                    <div class="flex flex-col gap-3">
                                        <a href="{{ route('newsAndEventsDetailPage', $news->id) }}"
                                            class="line-clamp-2 font-semibold hover:text-accent transition-colors duration-200 cursor-pointer">
                                            {{ $news->name_en ?? 'News Title' }}
                                        </a>
                                        <div class="flex space-x-2">
                                            <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}"
                                                class="w-4 h-4 object-contain" alt="date" />
                                            <p class="text-xs text-gray-500">
                                                {{ isset($news->created_at) ? $news->created_at->format('jS F Y') : 'Date not available' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Section-->
        <div id="popup-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <!-- Overlay -->
            <div id="popup-background-overlay" class="fixed inset-0 bg-black opacity-80 z-40"></div>

            <div class="relative p-4 w-[80%] lg:w-[50%] max-h-full z-50">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <div class="p-3 md:p-4 space-y-4 relative">
                        <button type="button z-50"
                            class="absolute top-2 right-2 z-[999] text-black bg-transparent cursor-pointer hover:text-accent opacity-85 rounded-lg text-sm w-8 h-8 flex justify-center items-center"
                            id="close-modal">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">{{ __('home.close_modal') }}</span>
                        </button>

                        <div class="swiper !h-[40vh] md:!h-[60vh] mx-auto w-[100%] popupSwiper rounded-lg">
                            <div class="swiper-wrapper">
                                @isset($popups)
                                    @foreach($popups as $popup)
                                        <div class="swiper-slide">
                                            @isset($popup->link)
                                                <a href="{{ $popup->link }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $popup->image) }}" alt="{{ $popup->name_en }}"
                                                        class="w-full h-full object-contain" />
                                                </a>
                                            @endisset
                                           
                                        </div>
                                    @endforeach
                                @endisset
                            </div>

                            <!-- Swiper pagination dots -->
                            <div class="swiper-pagination"></div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        let servicesSliderIndex = 0;

        function nextServicesSlider() {
            const servicesSliderContent = document.getElementById(
                "services-slider-content"
            );
            const servicesSlides = document.querySelectorAll(
                ".services-review-card"
            );
            const totalSlides = servicesSlides.length;

            servicesSliderIndex = (servicesSliderIndex + 1) % totalSlides;
            const offset = -servicesSliderIndex * (servicesSlides[0].offsetWidth + 16);

            servicesSliderContent.style.transform = `translateX(${offset}px)`;
        }

        function prevServicesSlider() {
            const servicesSliderContent = document.getElementById(
                "services-slider-content"
            );
            const servicesSlides = document.querySelectorAll(
                ".services-review-card"
            );
            const totalSlides = servicesSlides.length;

            servicesSliderIndex =
                (servicesSliderIndex - 1 + totalSlides) % totalSlides;
            const offset = -servicesSliderIndex * (servicesSlides[0].offsetWidth + 16);

            servicesSliderContent.style.transform = `translateX(${offset}px)`;
        }
    </script>

    <script>
        // Show modal on page load only if popups exist
        window.addEventListener("DOMContentLoaded", () => {
            @if(isset($popups) && count($popups) > 0)
                const modal = document.getElementById("popup-modal");
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            @endif
                                        });

        // Close modal when clicking the close button
        document.getElemen tById("close-modal").addEventListener("click", () => {
            const modal = document.getElementById("popup-modal");
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        });
        
        document.getElementById("popup-background-overlay").addEventListener("click", () => {
            const modal = document.getElementById("popup-modal");
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        });


        // Close modal when on escape 
        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                const modal = document.getElementById("popup-modal");
                if (!modal.classList.contains("hidden")) {
                    modal.classList.remove("flex");
                    modal.classList.add("hidden");
                }
            }
        });

        //modal swiper
        document.addEventListener("DOMContentLoaded", function () {
    const swiperContainer = document.querySelector(".popupSwiper");
    if (swiperContainer) {
        const swiper = new Swiper(".popupSwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        // Explicitly start autoplay
        swiper.autoplay.start();
    }
});

    </script>

@endpush