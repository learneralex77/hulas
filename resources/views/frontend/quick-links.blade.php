@extends('frontend.layouts.app')
@section('title', __('quick-links.title'))
@section('meta', __('quick-links.meta_description'))
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
      <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ __('quick-links.title') }}</h3>
      <div class="flex space-x-5 items-center">
        <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('quick-links.breadcrumb.home') }}</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="{{ route('quickLinks') }}" class="text-accent font-bold">{{ __('quick-links.breadcrumb.quick_links') }}</a>
      </div>
      </div>
    </section>
    <!-- banner-section -->

    <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 my-10">
       <section class="overflow-x-hidden">
          <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
          <div class="flex flex-col items-center">
          <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
          {{ __('quick-links.section.title') }}</h1>

          <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
          {{ __('quick-links.section.subtitle') }}
          </p>
          <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
          {{ __('quick-links.section.description') }}
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
          class="px-4 py-4 rounded-t-xl text-xl font-semibold border-b-[4px] hover:border-gray-800 border-accent bg-white shadow-md hover:shadow-lg cursor-pointer hover:bg-gradient-to-r from-amber-50 to-amber-100 hover:-translate-y-1 transition-transform ease-in-out duration-300">
          {{ app()->getLocale() == 'en' ? $quickLink->name_en : (isset($quickLink->name_np) ? $quickLink->name_np : $quickLink->name_en) }}
          </div>
        </a>
      @else
        <div class="px-4 py-4 rounded-t-xl text-xl font-semibold border-b-[4px] border-accent bg-white shadow-md">
          {{ app()->getLocale() == 'en' ? $quickLink->name_en : (isset($quickLink->name_np) ? $quickLink->name_np : $quickLink->name_en) }}
          <p class="text-sm text-gray-500 mt-1">{{ __('quick-links.external_link.not_available') }}</p>
        </div>
      @endisset
    @endforeach
  @else
    <div class="col-span-full text-center text-gray-500">
      {{ __('quick-links.no_links') }}
    </div>
  @endisset
</div>

  </div>
  </div>

@endsection

@push('scripts')
@endpush