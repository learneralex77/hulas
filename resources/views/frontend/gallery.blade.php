@extends('frontend.layouts.app')
@section('title', 'Home')
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
      <h3 class="text-2xl md:text-4xl font-extrabold text-white">Gallery</h3>
      <div class="flex space-x-5 items-center">
        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="{{ route('gallery') }}" class="text-accent font-bold">Gallery</a>
      </div>
      </div>
    </section>
    <!-- banner-section -->

    <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 mb-20">
    <div class="grid items-center justify-center m-6">
      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
      </p>

      <section class="overflow-x-hidden">
      <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
        <div class="flex flex-col items-center">
        <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
          gallery </h1>

        <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
          Moments That Matter
        </p>
        <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
          Browse highlights from our events, community initiatives, and everyday moments that reflect the spirit of
          Hulas Remittance.
        </p>
        </div>
      </div>
      </section>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 items-center gap-4 text-center mx-auto">
      @isset($galleries)
      @foreach ($galleries as $gallery)
      <div class="bg-white border border-gray-200 rounded-lg shadow-sm max-w-72 p-3">
      <a href="{{ route('galleryDetail', $gallery->slug) }}">
      <img class="rounded-t-lg w-full h-48 object-cover"
      src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg')  }}"
      alt="Gallery Image" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2 space-x-2 text-sm">
      <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}"
      class="w-3 h-3 object-contain" alt="date" /> <span
      class="text-gray-600 text-xs">{{ $gallery->created_at->format('F d, Y') }}</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
      {{ $gallery->title_en }}
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm h-22">
      {{ $gallery->short_description }}
      </p>
      <div class="flex justify-center">
      <a href="{{ route('galleryDetail', $gallery->slug) }}"
      class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-full cursor-pointer">
      <i class="fa-regular fa-eye"></i> View
      </a>
      </div>
      </div>
      </div>
    @endforeach
    @endisset

      </div>
    </div>
    </div>
  </div>

@endsection



@push('scripts')

  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  <script>
    const swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    });
  </script>
@endpush