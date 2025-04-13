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
      <a href="index.html" class="text-[#666] font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="gallery" class="text-accent font-bold">Gallery</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->

  <div class="grid items-center justify-center m-6 lg:m-16">

    <div
    class="flex-wrap grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-8 gap-6 md:gap-4 lg:gap-10 ">
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
        src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75" alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
        <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
        <span class="text-gray-600 text-sm">April 2, 2025</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
        Noteworthy technology acquisitions 2021
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
        Here are the biggest enterprise technology acquisitions of 2021 so
        far, in reverse chronological order.
      </p>
      <div class="flex justify-center">
        <button onclick="redirectToPage()"
        class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-sm cursor-pointer" id="Btn">
        <i class="fa-regular fa-eye"></i> View
        </button>
      </div>
      </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
        src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75" alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
        <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
        <span class="text-gray-600 text-sm">April 2, 2025</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
        Noteworthy technology acquisitions 2021
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
        Here are the biggest enterprise technology acquisitions of 2021 so
        far, in reverse chronological order.
      </p>
      <div class="flex justify-center">
        <button onclick="redirectToPage()"
        class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-sm cursor-pointer" id="Btn">
        <i class="fa-regular fa-eye"></i> View
        </button>
      </div>
      </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
        src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75" alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
        <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
        <span class="text-gray-600 text-sm">April 2, 2025</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
        Noteworthy technology acquisitions 2021
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
        Here are the biggest enterprise technology acquisitions of 2021 so
        far, in reverse chronological order.
      </p>
      <div class="flex justify-center">
        <button onclick="redirectToPage()"
        class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-sm cursor-pointer" id="Btn">
        <i class="fa-regular fa-eye"></i> View
        </button>
      </div>
      </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
        src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75" alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
        <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
        <span class="text-gray-600 text-sm">April 2, 2025</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
        Noteworthy technology acquisitions 2021
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
        Here are the biggest enterprise technology acquisitions of 2021 so
        far, in reverse chronological order.
      </p>
      <div class="flex justify-center">
        <button onclick="redirectToPage()"
        class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-sm cursor-pointer" id="Btn">
        <i class="fa-regular fa-eye"></i> View
        </button>
      </div>
      </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
        src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75" alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
        <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
        <span class="text-gray-600 text-sm">April 2, 2025</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
        Noteworthy technology acquisitions 2021
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
        Here are the biggest enterprise technology acquisitions of 2021 so
        far, in reverse chronological order.
      </p>
      <div class="flex justify-center">
        <button onclick="redirectToPage()"
        class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-sm cursor-pointer" id="Btn">
        <i class="fa-regular fa-eye"></i> View
        </button>
      </div>
      </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-72">
      <a href="#">
      <img class="rounded-t-lg w-full h-48 object-contain"
        src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75" alt="" />
      </a>
      <div class="p-3">
      <div class="flex items-center mb-2">
        <div class="mr-2"><i class="fa-regular fa-calendar-days fa-xl" style="color: #FFD43B;"></i> </div>
        <span class="text-gray-600 text-sm">April 2, 2025</span>
      </div>
      <h5 class="mb-2 text-lg font-bold text-gray-900">
        Noteworthy technology acquisitions 2021
      </h5>
      <p class="text-gray-700 line-clamp-4 leading-tight text-sm">
        Here are the biggest enterprise technology acquisitions of 2021 so
        far, in reverse chronological order.
      </p>
      <div class="flex justify-center">
        <button onclick="redirectToPage()"
        class="bg-black text-sm text-accent hover:opacity-85 py-1 px-5 mt-2 rounded-sm cursor-pointer" id="Btn">
        <i class="fa-regular fa-eye"></i> View
        </button>
      </div>
      </div>
    </div>

    </div>
  </div>
@endsection



@push('scripts')

  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  <script>
    function redirectToPage() {
    window.location.href = "gallery-detail";
    }

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