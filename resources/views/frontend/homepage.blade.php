@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@push('styles')


@endpush
@section('content')

  @push('styles')

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  @endpush

  <!-- Slider Section -->
  <section id="home-slider">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-80 overflow-hidden rounded-lg md:h-[600px] ">
      <!-- Item 1 -->
      @isset($sliders)
      @foreach ($sliders as $key => $slider)
      <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $key === 0 ? 'active' : '' }}">
      <img src="{{ asset('storage/' . $slider->image) }}"
      class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
      alt="{{ $slider->title ?? 'Slider Image' }}" />
      </div>
    @endforeach
    @endisset
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
      @isset($sliders)
      @foreach($sliders as $key => $slider)
      <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $key === 0 ? 'true' : 'false' }}"
      aria-label="Slide {{ $key + 1 }}" data-carousel-slide-to="{{ $key }}">
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
      <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 6 10">
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
      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
      <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 9 4-4-4-4" />
      </svg>
      <span class="sr-only">Next</span>
      </span>
    </button>
    </div>
  </section>
  <!-- Slider Section -->

  <!-- --------About-us-section-------- -->
  <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
    <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
      ">
      Our Introduction
      </h1>

      <p class="text-2xl text-black font-bold md:text-4xl text-center">
      Welcome To Hulas Remittance
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
      A leading business house with a dedicated business history of more than
      85 years, Golchha Organization has established "HULAS"
      </p>
    </div>
    </div>
  </section>
  <section class="flex flex-col md:flex-row md:justify-center md:items-center lg:flex-row m-10 md:m-10 2xl:mx-40 gap-10">
    <div class="flex justify-center flex-1 flex-grow text-center">
    <div class="flex-1 flex justify-center w-full">
      <img src="{{ asset('assets/images/about-us/about-img-1.webp') }}" alt="About Us Image"
      class="w-full rounded-md object-contain xl:object-fit" />
    </div>
    </div>
    <div class="flex flex-2 flex-col space-y-6">
    <p class="text-gray-600 text-base lg:text-lg text-justify">
      @isset($aboutUs)
      {{ $aboutUs->description_en ?? $aboutUs->description }}
    @endisset

    </p>
    <a href="{{ route('aboutHulasRemittance') }}"
      class="text-center text-accent hover:opacity-85 text-lg drop-shadow-sm cursor-pointer bg-black px-6 py-3 w-40 rounded-full">
      Read more
    </a>
    </div>
  </section>
  <!-- --------About-us-section-------- -->

  <!----------Services Section---------->
  <section class="m-10 items-center">
    <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
        -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
        ">
        Our Services
      </h1>

      <p class="text-2xl text-black font-bold md:text-4xl text-center">
        Simple. Secure. Seamless.
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
        Fast, secure money transfers made easy with Hulas Remittance and trusted partners like Western Union.
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
      <div class="flex flex-row gap-8 transition-transform duration-500 ease-in-out" id="services-slider-content">
      @isset($services)
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

  <!----------Our Partners Section---------->
  <section class="my-10">
    <div class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-[#FDDC2B] uppercase text-lg tracking-wider" style="
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
      ">
        Our partners & Supporters
      </h1>

      <p class="text-2xl text-black font-bold md:text-4xl text-center">
        In Collaboration with Our Esteemed Partners and Supporters
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
        We are proud to collaborate with trusted partners and supporters
        who share our vision and strengthen our mission.
      </p>
      </div>
    </div>
    </div>

    <div class="w-full overflow-hidden relative">
    <div class="w-full h-full absolute">
      <div class="w-1/4 h-full absolute z-50 left-0" style="
      background: linear-gradient(
      to right,
      #fff8cc 0%,
      rgba(255, 255, 255, 0) 100%
      );
      "></div>
      <div class="w-1/4 h-full absolute z-50 right-0" style="
      background: linear-gradient(
      to left,
      #fff8cc 0%,
      rgba(255, 255, 255, 0) 100%
      );
      "></div>
    </div>

    <div class="carousel-items flex items-center justify-center w-full" style="
      width: fit-content;
      animation: carouselAnim 10s infinite alternate linear;
      ">
      @isset($partners)
      @foreach ($partners as $partner)
      <div class="carousel-focus flex items-center flex-col relative bg-white mx-5 my-10 px-4 py-3"
      style="width: 270px">
      <img src="{{ asset('storage/' . $partner->image) }}" class="h-40 w-40 rounded-xl shadow-2xl"
      alt="Partners Icon" />
      <h4 class="tracking-wide text-lg m-3">{{ $partner->name_en ?? $partner->name }}</h4>
      </div>
    @endforeach
    @endisset



  </section>
  <!----------Our Partners Section---------->

  <!----------Become an agent Section---------->
  <section class="lg:mx-40 left-10 flex flex-col space-y-10 m-10">
    <div class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
      ">
        Become an Agent
      </h1>

      <p class="text-2xl text-black font-bold md:text-4xl text-center">
        Join Our Network of Trusted Agents
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
        Take the next step in your career by becoming an agent. Help us expand
        our reach while enjoying flexible opportunities and competitive
        rewards.
      </p>
      </div>
    </div>
    </div>
    <div class="flex flex-col lg:flex-row justify-between">
    <div class="flex flex-1 justify-center">
      <ol class="flex flex-col">
      <li class="mb-10 ms-6 flex flex-row gap-4">
        <span class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white">
        <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon" class="w-6 h-6" />
        </span>
        <div clss="flex flex-col gap-2">
        <h3 class="font-semibold leading-tight text-primary">
          Select sender country
        </h3>
        <p class="text-sm">from where you are receiving the remittance.</p>
        </div>
      </li>
      <li class="mb-10 ms-6 flex flex-row gap-4">
        <span class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white">
        <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon" class="w-6 h-6" />
        </span>
        <div clss="flex flex-col gap-2">
        <h3 class="font-semibold leading-tight text-primary">
          Enter control number
        </h3>
        <p class="text-sm">of 12 – 16 digits received from the sender.</p>
        </div>
      </li>
      <li class="mb-10 ms-6 flex flex-row gap-4">
        <span class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white">
        <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon" class="w-6 h-6" />
        </span>
        <div clss="flex flex-col gap-2">
        <h3 class="font-semibold leading-tight text-primary">Enter amount</h3>
        <p class="text-sm">you are expecting from the sender.</p>
        </div>
      </li>
      <li class="mb-10 ms-6 flex flex-row gap-4">
        <span class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white">
        <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon" class="w-6 h-6" />
        </span>
        <div clss="flex flex-col gap-2">
        <h3 class="font-semibold leading-tight text-primary">
          Track your money
        </h3>
        <p class="text-sm">check the progress.</p>
        </div>
      </li>
      <li class="mb-10 ms-6 flex flex-row gap-4">
        <span class="flex items-center justify-center w-8 h-8 bg-accent rounded-full left-0 ring-4 ring-white">
        <img src="{{ asset('assets/images/stepper/tick-svgrepo-com.png') }}" alt="Tick Icon" class="w-6 h-6" />
        </span>
        <div clss="flex flex-col gap-2">
        <h3 class="font-semibold leading-tight text-primary">
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
      <a href="{{route('becomeAnAgent')}}"
      class="px-6 py-2 bg-accent text-black border-2 rounded-full hover:opacity-85 font-semibold text-base">Apply
      to become an agent</a>
    </div>
    </div>
  </section>
  <!----------Become an agent Section---------->


  <!-- --------Gallery and News Section-------- -->
  <div class="flex flex-col md:flex-row mx-10 lg:mx-40 px-4 gap-10 my-10">
    <div class="flex-1 overflow-hidden">
    <div class="flex flex-row justify-between m-3">
      <h1 class="font-bold text-accent uppercase text-lg lg:text-2xl tracking-wider" style="
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
      ">
      Image Gallery
      </h1>
      <a href="{{ route('gallery') }}"
      class="bg-black items-center text-accent px-6 py-3 rounded-full cursor-pointer hover:opacity-85">
      Explore Gallery
      </a>
    </div>
    <div style="
      --swiper-navigation-color: #fff;
      --swiper-pagination-color: #fff;
      " class="swiper mySwiper2 w-full h-1/2 aspect-[16/9]">
      <div class="swiper-wrapper h-[800px] lg:h-[400px]">
      @foreach($galleries as $gallery)
      <div class="swiper-slide">
      <img
      src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg') }}"
      class="w-full h-full object-contain" alt="{{ $gallery->title_en }}" />
      </div>
    @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
      <div class="swiper-wrapper">
      @foreach($galleries as $index => $gallery)
      <div class="swiper-slide">
      <img
      src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg') }}"
      alt="{{ $gallery->title_en }}" />
      </div>
    @endforeach
      </div>
    </div>
    </div>


    <div class="flex-1 w-full h-full">
    <div class="flex justify-end">
      <a href="{{ route('newsAndEvents')}}"
      class="bg-black items-center text-accent px-4 py-3 rounded-full cursor-pointer hover:opacity-85">
      Explore News Articles
      </a>
    </div>
    <div class="drop-shadow-xl shadow-gray-100 bg-white rounded-lg m-3">
      <!-- Heading for scroll -->
      <div class="flex flex-row bg-white rounded m-3 p-3">
      <!-- Explore part -->
      <div class="mx-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
        <!-- Hamburger Lines -->
        <path d="M3 6h14M3 12h14M3 18h14" stroke="black" stroke-width="2" stroke-linecap="round" />
        <!-- Three Dots -->
        <circle cx="20" cy="6" r="1.5" fill="black" />
        <circle cx="20" cy="12" r="1.5" fill="black" />
        <circle cx="20" cy="18" r="1.5" fill="black" />
        </svg>
      </div>
      <h1 class="font-bold text-lg text-black">All News and Articles</h1>
      </div>

      <!-- Content inside the heading -->
      <div class="overflow-y-scroll h-[420px] m-3 sticky bg-white">
      <!-- Content Repeated -->

      @if(isset($newsAndEvents) && count($newsAndEvents) > 0)
      @foreach($newsAndEvents as $news)
      <div class="flex flex-row gap-10 p-2 border-l-accent border-l-[4px] my-2 shadow-sm h-25">
      <div class="h-auto w-30">
      <img
      src="{{ isset($news->image) ? asset('storage/' . $news->image) : asset('assets/images/placeholder.jpg') }}"
      alt="{{ $news->title_en ?? 'News Image' }}" class="h-full w-full rounded-lg object-cover" />
      </div>

      <div class="flex flex-col gap-3">
      <a href="{{ route('newsAndEventsDetailPage', $news->id) }}"
      class="line-clamp-2 hover:text-accent transition-colors duration-200">
      {{ $news->name_en ?? 'News Title' }}
      </a>
      <div class="flex space-x-2">
      <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
      class="h-auto w-4" />
      <p class="text-xs text-gray-500">
      {{ isset($news->created_at) ? $news->created_at->format('jS F Y') : 'Date not available' }}</p>
      </div>
      </div>
      </div>
    @endforeach
    @else
      <div class="flex flex-row gap-10 p-2 border-l-accent border-l-[4px] my-2 shadow-sm h-25">
      <div class="h-auto w-30">
      <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="No News Available"
        class="h-full w-full rounded-lg object-cover" />
      </div>

      <div class="flex flex-col gap-3">
      <p class="line-clamp-2">
        No news or events available at the moment
      </p>
      <div class="flex space-x-2">
        <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
        class="h-auto w-4" />
        <p class="text-xs text-gray-500">{{ now()->format('jS F Y') }}</p>
      </div>
      </div>
      </div>
    @endif
      </div>
    </div>
    </div>
  </div>
  <!-- --------Gallery and News Section-------- -->


  <!-- Modal Section-->
  <div id="popupModal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full inset-shadow-sm inset-shadow-indigo-500/50">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-2">
      <h3 class="text-xl font-medium text-gray-900"></h3>
      <button type="button"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
        data-modal-hide="popupModal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5 space-y-4">
      <img src="./images/logo/hulas-remittance-logo.jpg" alt="" srcset="" class="mx-auto" />
      </div>
    </div>
    </div>
  </div>
  <!-- Modal Section-->

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
    const offset =
      -servicesSliderIndex * (servicesSlides[0].offsetWidth + 16);

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
    const offset =
      -servicesSliderIndex * (servicesSlides[0].offsetWidth + 16);

    servicesSliderContent.style.transform = `translateX(${offset}px)`;
    }
  </script>

  <script>
    $(document).ready(function () {
    const buttons = document.querySelectorAll(".modal-button");

    buttons.forEach((button) => {
      const modalId = button.getAttribute("data-modal-target");
      const modalElement = document.getElementById(modalId);

      if (modalElement) {
      const modal = new Modal(modalElement);
      modal.show();
      }
    });
    });
  </script>
@endpush