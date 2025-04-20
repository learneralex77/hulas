@extends('frontend.layouts.app')
@section('title', $service->name_en)
@section('meta', $service->name_en)
@section('content')

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">{{ $service->name_en }}</h3>
      <div class="flex space-x-5 items-center">
      <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('services') }}" class="text-white font-bold">Services</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('serviceDetail', $service->slug) }}" class="text-accent font-bold">{{ $service->name_en }}</a>
      </div>
    </div>
    </div>
  </section>
  <!-- banner-section -->

  <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
    <div class="flex flex-col items-center space-y-6">
      @isset($service->name_en)
      <p class="text-2xl text-black font-bold md:text-4xl text-center">
      {{ $service->name_en }} </p>
      @endisset
      @isset($service->description_en)
      <p class="p-2 text-lg text-[#737879] text-center max-w-3xl">
      
        {{ $service->description_en }}
      </p>
      @endisset
    </div>
    </div>
  </section>

  <section class="flex flex-col md:flex-row md:justify-center md:items-center lg:flex-row m-10 md:m-10 2xl:mx-40 gap-10">
    <div class="flex justify-center flex-1 flex-grow text-center">
    @isset($service->file)
    <div class="flex-1 flex justify-center w-full">
     
        <img src="{{ asset('storage/' . $service->file) }}" alt="{{ $service->name_en }}"
        class="w-full max-w-md h-80 rounded-md object-cover bg-gray-100" />

    </div>
    @endisset
    </div>

    <div class="flex flex-2 flex-col space-y-6">
    @isset($service->description_en)
    <p class="text-gray-600 text-base lg:text-lg text-justify">
     
        {{ $service->description_en }}
     
    </p>
    @endisset
    </div>
  </section>


  <!-- Card part for our news and Article -->

  <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
    <div class="flex flex-col items-center space-y-6">
      <p class="text-2xl text-black font-bold md:text-4xl text-center">
        How It Works
      </p>
      <p class="p-2 text-lg text-[#737879] text-center max-w-3xl">
        Just follow these simple steps to send money with ease.
      </p>
    </div>
  </div>
  <section class="flex justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 md:px-0 mx-10 sm:m-20 xl:mx-40 items-center">

    @isset($service->translation_names)
      @foreach($service->translation_names as $index => $name)
        <!-- Service item -->
        @php
          $hasLink = isset($service->external_link) && isset($service->external_link[$index]) && !empty($service->external_link[$index]);
          $cardTag = $hasLink ? 'a' : 'div';
          $cardAttr = $hasLink ? 'href="' . $service->external_link[$index] . '" target="_blank"' : '';
        @endphp
        <{{ $cardTag }} {!! $cardAttr !!} class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-blue-600 cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 max-w-[420px] h-[300px] block no-underline">
          <div class="flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-700 rounded-full mx-auto mb-4">
            @isset($service->translation_icons)
              @if(isset($service->translation_icons[$index]))
                <img src="{{ asset('storage/' . $service->translation_icons[$index]) }}" alt="{{ $name }}" class="w-10 h-10 object-contain">
              @endif
            @endisset
          </div>
          <h2 class="text-2xl text-black font-semibold text-center my-6">{{ $name }}</h2>
          @isset($service->translation_descriptions)
            @if(isset($service->translation_descriptions[$index]))
              <p class="text-gray-600 text-center">
                {{ $service->translation_descriptions[$index] }}
              </p>
            @endif
          @endisset
        </{{ $cardTag }}>
      @endforeach
    @endisset
    </div>
  </section>
@endsection


@push('scripts')
  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
