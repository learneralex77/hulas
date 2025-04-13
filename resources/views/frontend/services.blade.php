@extends('frontend.layouts.app')
@section('title', 'Services')
@section('meta', 'Services')
@section('content')

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">Services</h3>
      <div class="flex space-x-5 items-center">
      <a href="{{ route('homepage') }}" class="text-[#666] font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('services') }}" class="text-accent font-bold"> Services</a>
      </div>
    </div>
    </div>
  </section>
  <!-- banner-section -->
  <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <p class="text-2xl text-black font-bold md:text-4xl text-center">
        Simple. Secure. Seamless.
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-3xl">
        Fast, secure money transfers made easy with Hulas Remittance and trusted partners like Western Union.
      </p>
      </div>
    </div>
    </section>
  <!-- Card part for our news and Article -->
  <div class="  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 md:px-0 mx-10 sm:m-20 lg:mx-40 items-center">

    <!-- Send -->
    <div
    class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-blue-600 cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 max-w-[420px] h-[300px]">
    <div class="flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-700 rounded-full mx-auto mb-4">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <path
        d="M13.3085 0.293087C13.699 -0.0976958 14.3322 -0.0976956 14.7227 0.293087L17.7186 3.29095C18.1091 3.68175 18.1091 4.31536 17.7185 4.70613L14.716 7.71034C14.3255 8.10113 13.6923 8.10113 13.3018 7.71034C12.9113 7.31956 12.9113 6.68598 13.3018 6.2952L14.6087 4.98743L7 4.98743C6.44771 4.98743 6 4.53942 6 3.98677C6 3.43412 6.44771 2.98611 7 2.98611L14.5855 2.9861L13.3085 1.70824C12.918 1.31745 12.918 0.683869 13.3085 0.293087Z"
        fill="#0F0F0F"></path>
        <path fill-rule="evenodd" clip-rule="evenodd"
        d="M12 20.998C14.2091 20.998 16 19.206 16 16.9954C16 14.7848 14.2091 12.9927 12 12.9927C9.79086 12.9927 8 14.7848 8 16.9954C8 19.206 9.79086 20.998 12 20.998ZM12 19.0934C10.842 19.0934 9.90331 18.1541 9.90331 16.9954C9.90331 15.8366 10.842 14.8973 12 14.8973C13.158 14.8973 14.0967 15.8366 14.0967 16.9954C14.0967 18.1541 13.158 19.0934 12 19.0934Z"
        fill="#0F0F0F"></path>
        <path
        d="M7 16.9954C7 17.548 6.55229 17.996 6 17.996C5.44772 17.996 5 17.548 5 16.9954C5 16.4427 5.44772 15.9947 6 15.9947C6.55229 15.9947 7 16.4427 7 16.9954Z"
        fill="#0F0F0F"></path>
        <path
        d="M19 16.9954C19 17.548 18.5523 17.996 18 17.996C17.4477 17.996 17 17.548 17 16.9954C17 16.4427 17.4477 15.9947 18 15.9947C18.5523 15.9947 19 16.4427 19 16.9954Z"
        fill="#0F0F0F"></path>
        <path fill-rule="evenodd" clip-rule="evenodd"
        d="M21 9.99074C22.6569 9.99074 24 11.3348 24 12.9927V20.998C24 22.656 22.6569 24 21 24H3C1.34315 24 0 22.656 0 20.998V12.9927C0 11.3348 1.34315 9.99074 3 9.99074H21ZM4 11.9921H20C20 12.2549 20.0517 12.5151 20.1522 12.7579C20.2528 13.0007 20.4001 13.2214 20.5858 13.4072C20.7715 13.593 20.992 13.7405 21.2346 13.841C21.4773 13.9416 21.7374 13.9934 22 13.9934V19.9974C21.7374 19.9974 21.4773 20.0491 21.2346 20.1497C20.992 20.2503 20.7715 20.3977 20.5858 20.5835C20.4001 20.7694 20.2528 20.99 20.1522 21.2328C20.0517 21.4756 20 21.7359 20 21.9987H4C4 21.7359 3.94827 21.4756 3.84776 21.2328C3.74725 20.99 3.59993 20.7694 3.41421 20.5835C3.2285 20.3977 3.00802 20.2503 2.76537 20.1497C2.52272 20.0491 2.26264 19.9974 2 19.9974V13.9934C2.26264 13.9934 2.52272 13.9416 2.76537 13.841C3.00802 13.7405 3.2285 13.593 3.41421 13.4072C3.59993 13.2214 3.74725 13.0007 3.84776 12.7579C3.94827 12.5151 4 12.2549 4 11.9921Z"
        fill="#0F0F0F"></path>
      </g>
      </svg>
    </div>
    <h2 class="text-2xl text-black font-semibold text-center my-6">Send Money</h2>
    <p class="text-gray-600 text-center">
      Transfer money to your loved ones instantly — locally or internationally — with trusted partners and great rates.
    </p>
    </div>

    <!-- Track -->
    <div
    class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl  border-t-4 border-yellow-500 cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 max-w-[420px] h-[300px]">
    <div class="flex items-center justify-center w-16 h-16 bg-yellow-100 text-yellow-700 rounded-full mx-auto mb-4">
      <svg viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <rect width="16" height="16" id="icon-bound" fill="none"></rect>
        <path
        d="M15,3L15,4.268C15.598,4.614 16,5.26 16,6C16,7.104 15.104,8 14,8C12.896,8 12,7.104 12,6C12,5.26 12.402,4.614 13,4.268L13,3.5C13,2.672 12.328,2 11.5,2C10.672,2 10,2.672 10,3.5L10,12L10,12.013C9.993,14.215 8.203,16 6,16C3.792,16 2,14.208 2,12L2,11.829C0.835,11.417 0,10.305 0,9C0,7.344 1.344,6 3,6C4.656,6 6,7.344 6,9C6,10.305 5.165,11.417 4,11.829L4,12.006C4,12.108 4.008,12.21 4.024,12.311C4.049,12.471 4.094,12.629 4.157,12.778C4.254,13.008 4.395,13.219 4.569,13.397C4.736,13.568 4.933,13.709 5.15,13.81C5.336,13.898 5.535,13.957 5.739,13.983C5.958,14.012 6.181,14.004 6.397,13.961C6.583,13.923 6.764,13.859 6.932,13.77C7.13,13.665 7.311,13.527 7.464,13.362C7.615,13.2 7.738,13.014 7.828,12.812C7.898,12.654 7.948,12.487 7.975,12.317C7.992,12.212 8,12.106 8,12L8,3.5C8,1.568 9.568,0 11.5,0C13.262,0 14.721,1.305 14.964,3L15,3ZM3,8C2.448,8 2,8.448 2,9C2,9.552 2.448,10 3,10C3.552,10 4,9.552 4,9C4,8.448 3.552,8 3,8Z">
        </path>
      </g>
      </svg>
    </div>
    <h2 class="text-2xl text-black font-semibold text-center my-6">Track Money</h2>
    <p class="text-gray-600 text-center">
      Monitor the status of your remittance in real-time and stay informed every step of the way.
    </p>
    </div>

    <!-- Receive -->
    <div
    class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-green-600 cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 max-w-[420px] h-[300px]">
    <div class="flex items-center justify-center w-16 h-16 bg-green-100 text-green-700 rounded-full mx-auto mb-4">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <path
        d="M10.6915 0.293087C10.301 -0.0976958 9.66782 -0.0976956 9.2773 0.293087L6.28142 3.29095C5.89088 3.68175 5.8909 4.31536 6.28145 4.70613L9.28398 7.71034C9.67451 8.10113 10.3077 8.10113 10.6982 7.71034C11.0887 7.31956 11.0887 6.68598 10.6982 6.2952L9.39129 4.98743L17 4.98743C17.5523 4.98743 18 4.53942 18 3.98677C18 3.43412 17.5523 2.98611 17 2.98611L9.41449 2.9861L10.6915 1.70824C11.082 1.31745 11.082 0.683869 10.6915 0.293087Z"
        fill="#0F0F0F"></path>
        <path fill-rule="evenodd" clip-rule="evenodd"
        d="M12 20.998C9.79086 20.998 8 19.206 8 16.9954C8 14.7848 9.79086 12.9927 12 12.9927C14.2091 12.9927 16 14.7848 16 16.9954C16 19.206 14.2091 20.998 12 20.998ZM12 19.0934C13.158 19.0934 14.0967 18.1541 14.0967 16.9954C14.0967 15.8366 13.158 14.8973 12 14.8973C10.842 14.8973 9.90331 15.8366 9.90331 16.9954C9.90331 18.1541 10.842 19.0934 12 19.0934Z"
        fill="#0F0F0F"></path>
        <path
        d="M17 16.9954C17 17.548 17.4477 17.996 18 17.996C18.5523 17.996 19 17.548 19 16.9954C19 16.4427 18.5523 15.9947 18 15.9947C17.4477 15.9947 17 16.4427 17 16.9954Z"
        fill="#0F0F0F"></path>
        <path
        d="M5 16.9954C5 17.548 5.44772 17.996 6 17.996C6.55228 17.996 7 17.548 7 16.9954C7 16.4427 6.55228 15.9947 6 15.9947C5.44772 15.9947 5 16.4427 5 16.9954Z"
        fill="#0F0F0F"></path>
        <path fill-rule="evenodd" clip-rule="evenodd"
        d="M3 9.99074C1.34315 9.99074 0 11.3348 0 12.9927V20.998C0 22.656 1.34315 24 3 24H21C22.6569 24 24 22.656 24 20.998V12.9927C24 11.3348 22.6569 9.99074 21 9.99074H3ZM20 11.9921H4C4 12.2549 3.94827 12.5151 3.84776 12.7579C3.74725 13.0007 3.59993 13.2214 3.41421 13.4072C3.2285 13.593 3.00802 13.7405 2.76537 13.841C2.52272 13.9416 2.26264 13.9934 2 13.9934V19.9974C2.26264 19.9974 2.52272 20.0491 2.76537 20.1497C3.00802 20.2503 3.2285 20.3977 3.41421 20.5835C3.59993 20.7694 3.74725 20.99 3.84776 21.2328C3.94827 21.4756 4 21.7359 4 21.9987H20C20 21.7359 20.0517 21.4756 20.1522 21.2328C20.2528 20.99 20.4001 20.7694 20.5858 20.5835C20.7715 20.3977 20.992 20.2503 21.2346 20.1497C21.4773 20.0491 21.7374 19.9974 22 19.9974V13.9934C21.7374 13.9934 21.4773 13.9416 21.2346 13.841C20.992 13.7405 20.7715 13.593 20.5858 13.4072C20.4001 13.2214 20.2528 13.0007 20.1522 12.7579C20.0517 12.5151 20 12.2549 20 11.9921Z"
        fill="#0F0F0F"></path>
      </g>
      </svg>
    </div>
    <h2 class="text-2xl text-black font-semibold text-center my-6">Receive Money</h2>
    <p class="text-gray-600 text-center">
      Recipients can collect their money quickly and safely at any of our partner locations or direct to their account.
    </p>
    </div>

  </div>


@endsection


@push('scripts')
  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

@endpush