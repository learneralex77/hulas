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
      <h3 class="text-4xl font-extrabold text-white">Quick Links</h3>
      <div class="flex space-x-5 items-center">
        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="{{ route('quickLinks') }}" class="text-accent font-bold">Quick Links</a>
      </div>
      </div>
    </section>
    <!-- banner-section -->

    <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 my-10">
       <section class="overflow-x-hidden">
          <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
          <div class="flex flex-col items-center space-y-6">
            <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
              text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
              -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
              ">
            Quick Links </h1>

            <p class="text-2xl text-black font-bold md:text-4xl text-center">
            Quick Access to Services
            </p>
            <p class="p-2 text-lg text-[#737879] text-center max-w-4xl line-clamp-3">
            Easily navigate to our most commonly used pages and services.
            </p>
          </div>
          </div>
        </section>

        <!-- Card -->
        <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-10 rounded-2xl text-left my-10">
  @isset($quickLinks)
    @foreach($quickLinks as $quickLink)
      @isset($quickLink->external_link)
        <a href="{{ $quickLink->external_link }}" target="_blank" class="block">
          <div
            class="px-4 py-4 rounded-t-xl text-xl font-semibold border-b-[4px] hover:border- border-accent bg-white shadow-md hover:shadow-lg cursor-pointer hover:bg-gradient-to-r from-amber-50 to-amber-100 hover:-translate-y-1 transition-transform ease-in-out duration-300">
            {{ $quickLink->name_en ?? 'Quick Link' }}
          </div>
        </a>
      @else
        <div class="px-4 py-4 rounded-t-xl text-xl font-semibold border-b-[4px] border-accent bg-white shadow-md">
          {{ $quickLink->name_en ?? 'Quick Link' }}
          <p class="text-sm text-gray-500 mt-1">No link available</p>
        </div>
      @endisset
    @endforeach
  @endisset
</div>

  </div>
  </div>


@endsection


@push('scripts')
@endpush