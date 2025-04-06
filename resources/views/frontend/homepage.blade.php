@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')
    <section id="home-slider">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-80 overflow-hidden rounded-lg md:h-[600px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/images/slider/slider-three.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2')}}" alt="..." />
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/images/slider/slider-two.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2')}}"
                        alt="..." />
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/images/slider/slider-three.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2')}}"
                        alt="..." />
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>

    <section class="about flex flex-col xl:flex-row m-10 md:m-20 lg:mx-40 gap-10">
        <div class="flex justify-center flex-1 text-center">
            <img src="{{ asset('assets/images/about-us/about-img-1.webp') }}" alt="About Us Image"
                class="w-full rounded-md object-contain xl:object-fit" />
        </div>
        <div class="flex flex-1 flex-col space-y-6">
            <h3 class="text-2xl font-semibold text-accent">
                About Hulas Remittance
            </h3>
            <h1 class="text-4xl font-bold">
                {{ $aboutUs->tagline }}
                <!-- Delivering Happiness through fast and reliable services -->
            </h1>
            <p class="text-gray-600 text-lg">
                {{ $aboutUs->description }}
                <!-- Hulas Remittance, a member company of Golchha Organization, was
                established in August 2005 with the vision to bring in quality and
                reliable money transfer services in to Nepal. A leading business house
                with a dedicated business history of more than 85 years, Golchha
                Organization has established "HULAS" as one of the most trusted
                household consumer brands in the country. Hulas Remittance, being one
                of the principal agents, playing a leading role in offering money
                transfer services of The Western Union Company in Nepal since January
                2006. We have been serving customers from more than 3,200 (comprising
                of major commercial banks, Development Banks, Finance Companies and
                cooperative organizations) locations have established brand promise of
                Western Union as a fast, reliable and convenient way of remittance
                service across the country. Hulas Remittance, being one of the
                principal agents, playing a leading role in offering money transfer
                services of The Western Union Company in Nepal since January 2006. We
                have been serving customers from more than 3,200 (comprising of major
                commercial banks, Development Banks, Finance Companies and cooperative
                organizations) locations have established brand promise of Western
                Union as a fast, reliable and convenient way of remittance service
                across the country. -->
            </p>
            <button class="m-3 text-left text-accent text-xl uppercase cursor-pointer">
                read more
            </button>
        </div>
    </section>

    <section class="m-10 xl:m-40 gap-10 flex flex-col items-center text-center">
        <div class="space-y-3">
            <h3 class="text-2xl font-semibold text-accent capitalize">What we do</h3>
            <h1 class="text-5xl font-bold">Services</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 space-y-6 gap-3 ">
            <!-- Main Service Card -->
        @isset($services)
            @foreach($services as $service)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <a src="#">
                    <img class="rounded-t-lg w-full" src="{{ asset('storage/' . $service->file) }}"
                        alt="{{ $service->name ?? 'Service Image' }}" />
                </a>
                <div class="p-5">
                    <a src="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight">
                            {{ $service->name }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        {{ $service->description }}
                    </p>
                    <a src="#"
                        class="inline-flex items-center px-3 py-2 text-base font-medium text-center rounded-lg hover:text-accent focus:ring-4 focus:outline-none">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
            @endisset
            <!-- Service Details Cards -->
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="p-5">
                    <a src="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight">
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                    </p>
                    <a src="#"
                        class="inline-flex items-center px-3 py-2 text-base font-medium text-center rounded-lg hover:text-accent focus:ring-4 focus:outline-none">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        </div>

    </section>
    <section class="about flex flex-col xl:flex-row items-center m-10 md:m-20 lg:mx-40 gap-10">
        <div class="flex flex-1 flex-col space-y-6">
            <h3 class="text-4xl text-center font-semibold capitalize text-primary">
                Our partners & Supporters
            </h3>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    @foreach($partners as $partner)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $partner->image) }}"
                            class="h-40 w-40 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Partners Icon">
                    </div>
                    @endforeach
                    <!-- Item 2 -->
                    <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/images/partners/WesternUnion.webp') }}"
                            class="h-40 w-40 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Partners Icon">

                    </div> -->
                    <!-- Item 3 -->
                    <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/images/partners/WesternUnion.webp') }}"
                            class="h-40 w-40 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Partners Icon">
                    </div> -->
                    <!-- Item 4 -->
                    <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/images/partners/WesternUnion.webp') }}"
                            class="h-40 w-40 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Partners Icon">
                    </div> -->
                    <!-- Item 5 -->
                    <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/images/partners/WesternUnion.webp') }}"
                            class="h-40 w-40 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Partners Icon">
                    </div> -->
                </div>
                <!-- Slider controls -->
                <!-- <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                                                                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                                      <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                                                      </svg>
                                                                                      <span class="sr-only">Previous</span>
                                                                                  </span>
                                                                              </button>
                                                                              <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                                                                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                                      <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                                                      </svg>
                                                                                      <span class="sr-only">Next</span>
                                                                                  </span>
                                                                              </button> -->
            </div>
    </section>
    <section class="lg:mx-40 left-10 flex flex-col space-y-10 m-10">
        <div class="space-y-3 flex flex-col justify-center text-center">
            <h3 class="text-2xl font-semibold text-accent capitalize">
                <!-- Become an Agent -->
            </h3>
            <h1 class="text-5xl font-bold">Become an Agent</h1>
        </div>
        <div class="flex flex-col lg:flex-row justify-around">
            <div class="flex flex-1 justify-center">
                <ol class="flex flex-col">
                    <li class="mb-10 ms-6 flex flex-row gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white dark:bg-accent">
                            <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon"
                                class="w-6 h-6" />
                        </span>
                        <div clss="flex flex-col gap-2">
                            <h3 class="font-medium leading-tight text-primary">
                                Select sender country
                            </h3>
                            <p class="text-sm">from where you are receiving the remittance.</p>
                        </div>
                    </li>
                    <li class="mb-10 ms-6 flex flex-row gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white dark:bg-accent">
                            <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon"
                                class="w-6 h-6" />
                        </span>
                        <div clss="flex flex-col gap-2">
                            <h3 class="font-medium leading-tight text-primary">
                                Enter control number
                            </h3>
                            <p class="text-sm">of 12 – 16 digits received from the sender.</p>
                        </div>
                    </li>
                    <li class="mb-10 ms-6 flex flex-row gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white dark:bg-accent">
                            <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon"
                                class="w-6 h-6" />
                        </span>
                        <div clss="flex flex-col gap-2">
                            <h3 class="font-medium leading-tight text-primary">Enter amount</h3>
                            <p class="text-sm">you are expecting from the sender.</p>
                        </div>
                    </li>
                    <li class="mb-10 ms-6 flex flex-row gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white dark:bg-accent">
                            <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon"
                                class="w-6 h-6" />
                        </span>
                        <div clss="flex flex-col gap-2">
                            <h3 class="font-medium leading-tight text-primary">
                                Track your money
                            </h3>
                            <p class="text-sm">check the progress.</p>
                        </div>
                    </li>
                    <li class="mb-10 ms-6 flex flex-row gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white dark:bg-accent">
                            <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon"
                                class="w-6 h-6" />
                        </span>
                        <div clss="flex flex-col gap-2">
                            <h3 class="font-medium leading-tight text-primary">
                                Receive money and bonus
                            </h3>
                            <p class="text-sm">
                                straight in your account, along with other rewards.
                            </p>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="flex flex-1 flex-col justify-center items-center text-center">
                <img src="{{ asset('assets/images/agent/agent.jpg') }}" alt="About Us Image"
                    class="w-[600px] rounded-md object-contain xl:object-fit mb-6" />
                <a href="#" class="px-6 py-3 bg-accent text-white rounded-md hover:bg-primary transition-colors font-medium text-lg">Apply to Become an Agent</a>
            </div>
        </div>
    </section>

@endsection


@push('scripts')
@endpush
