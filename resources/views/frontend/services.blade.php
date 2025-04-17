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
      <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
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
  <section class="flex justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 md:px-0 mx-10 sm:m-20 xl:mx-40 items-center">

    @if(count($services) > 0)
      @foreach($services as $service)
      <a href="{{ route('serviceDetail', $service->slug) }}">
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-blue-600 cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 max-w-[420px] h-[300px]">
          <div class="flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-700 rounded-full mx-auto mb-4">
            @if(isset($service->file) && !empty($service->file))
              <img src="{{ asset('storage/' . $service->file) }}" alt="{{ $service->name_en }}" class="w-10 h-10 object-contain">
            @else
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path d="M13.3085 0.293087C13.699 -0.0976958 14.3322 -0.0976956 14.7227 0.293087L17.7186 3.29095C18.1091 3.68175 18.1091 4.31536 17.7185 4.70613L14.716 7.71034C14.3255 8.10113 13.6923 8.10113 13.3018 7.71034C12.9113 7.31956 12.9113 6.68598 13.3018 6.2952L14.6087 4.98743L7 4.98743C6.44771 4.98743 6 4.53942 6 3.98677C6 3.43412 6.44771 2.98611 7 2.98611L14.5855 2.9861L13.3085 1.70824C12.918 1.31745 12.918 0.683869 13.3085 0.293087Z" fill="#0F0F0F"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12 20.998C14.2091 20.998 16 19.206 16 16.9954C16 14.7848 14.2091 12.9927 12 12.9927C9.79086 12.9927 8 14.7848 8 16.9954C8 19.206 9.79086 20.998 12 20.998ZM12 19.0934C10.842 19.0934 9.90331 18.1541 9.90331 16.9954C9.90331 15.8366 10.842 14.8973 12 14.8973C13.158 14.8973 14.0967 15.8366 14.0967 16.9954C14.0967 18.1541 13.158 19.0934 12 19.0934Z" fill="#0F0F0F"></path>
                  <path d="M7 16.9954C7 17.548 6.55229 17.996 6 17.996C5.44772 17.996 5 17.548 5 16.9954C5 16.4427 5.44772 15.9947 6 15.9947C6.55229 15.9947 7 16.4427 7 16.9954Z" fill="#0F0F0F"></path>
                  <path d="M19 16.9954C19 17.548 18.5523 17.996 18 17.996C17.4477 17.996 17 17.548 17 16.9954C17 16.4427 17.4477 15.9947 18 15.9947C18.5523 15.9947 19 16.4427 19 16.9954Z" fill="#0F0F0F"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M21 9.99074C22.6569 9.99074 24 11.3348 24 12.9927V20.998C24 22.656 22.6569 24 21 24H3C1.34315 24 0 22.656 0 20.998V12.9927C0 11.3348 1.34315 9.99074 3 9.99074H21ZM4 11.9921H20C20 12.2549 20.0517 12.5151 20.1522 12.7579C20.2528 13.0007 20.4001 13.2214 20.5858 13.4072C20.7715 13.593 20.992 13.7405 21.2346 13.841C21.4773 13.9416 21.7374 13.9934 22 13.9934V19.9974C21.7374 19.9974 21.4773 20.0491 21.2346 20.1497C20.992 20.2503 20.7715 20.3977 20.5858 20.5835C20.4001 20.7694 20.2528 20.99 20.1522 21.2328C20.0517 21.4756 20 21.7359 20 21.9987H4C4 21.7359 3.94827 21.4756 3.84776 21.2328C3.74725 20.99 3.59993 20.7694 3.41421 20.5835C3.2285 20.3977 3.00802 20.2503 2.76537 20.1497C2.52272 20.0491 2.26264 19.9974 2 19.9974V13.9934C2.26264 13.9934 2.52272 13.9416 2.76537 13.841C3.00802 13.7405 3.2285 13.593 3.41421 13.4072C3.59993 13.2214 3.74725 13.0007 3.84776 12.7579C3.94827 12.5151 4 12.2549 4 11.9921Z" fill="#0F0F0F"></path>
                </g>
              </svg>
            @endif
          </div>
          <h2 class="text-2xl text-black font-semibold text-center my-6">{{ $service->name_en }}</h2>
          <p class="text-gray-600 text-center">
            @if(isset($service->description_en))
              {{ \Illuminate\Support\Str::limit($service->description_en, 120) }}
            @endif
          </p>
        </div>
      </a>
      @endforeach
    @else
      <!-- Fallback for empty services -->
      <div class="col-span-3 text-center py-12">
        <p class="text-lg text-gray-600">No services available at the moment. Please check back later.</p>
      </div>
    @endif

    </div>
  </section>

@endsection


@push('scripts')
  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush