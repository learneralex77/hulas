@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">Gallery</h3>
      <div class="flex space-x-5 items-center">
      <a href="{{ route('homepage') }}" class="text-[#666] font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('gallery') }}" class="text-accent font-bold">Gallery</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->

  <div class="grid items-center justify-center m-6 lg:m-16">

    <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
    </p>

    <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
      ">
        gallery </h1>

      <p class="text-2xl text-black font-bold md:text-4xl text-center">
        Moments That Matter
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
        Browse highlights from our events, community initiatives, and everyday moments that reflect the spirit of
        Hulas Remittance.
      </p>
      </div>
    </div>
    </section>

    <div class="flex-wrap grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-8 gap-6 md:gap-4 lg:gap-10 ">
    @isset($galleries)
    @foreach ($galleries as $gallery)
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
      src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg')  }}"
      alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
      <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
      <span class="text-gray-600 text-sm">{{ $gallery->created_at->format('F d, Y') }}</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
      {{ $gallery->title_en }}
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
      {{ $gallery->short_description }}
      </p>
      <div class="flex justify-center">
      <a href="{{ route('galleryDetail', $gallery->id) }}"
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