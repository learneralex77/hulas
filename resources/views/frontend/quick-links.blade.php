@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

  <div class="mb-10 ml-20 mr-20 min-h-[500px]">
    <!-- Heading -->
    <h1 class="mb-5 mt-20 font-bold text-2xl text-center text-black">Quick Links</h1>
    <!-- Card -->
    <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-6 rounded-2xl text-left">
      @if(isset($quickLinks) && $quickLinks->count() > 0)
        @foreach($quickLinks as $quickLink)
          @if(isset($quickLink->external_link) && !empty($quickLink->external_link))
            <a href="{{ $quickLink->external_link }}" target="_blank" class="block">
              <div class="px-4 py-4 rounded-t-xl text-xl font-semibold border-b-[4px] border-accent bg-white shadow-md hover:shadow-lg cursor-pointer hover:bg-gradient-to-r from-amber-100 to-amber-200 hover:-translate-y-1 transition-transform ease-in-out duration-300">
                {{ $quickLink->name_en ?? 'Quick Link' }}
              </div>
            </a>
          @else
            <div class="px-4 py-4 rounded-t-xl text-xl font-semibold border-b-[4px] border-accent bg-white shadow-md">
              {{ $quickLink->name_en ?? 'Quick Link' }}
              <p class="text-sm text-gray-500 mt-1">No link available</p>
            </div>
          @endif
        @endforeach
      @else
        <div class="col-span-2 text-center py-8">
          <p class="text-gray-500">No quick links available at the moment.</p>
        </div>
      @endif
    </div>
  </div>
@endsection


@push('scripts')
@endpush