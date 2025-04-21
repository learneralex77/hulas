@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

<!-- banner-section -->
<section class="relative">
    <div class="mb-10">
        <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
            class="h-60 w-full object-cover" />
    </div>

    <div class="absolute w-full top-20">
        <div class="flex flex-col space-y-8 ml-10">
            <h3 class="text-4xl font-extrabold text-white">Mission and Vision</h3>
            <div class="flex space-x-5 items-center">
                <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                <p class="text-white text-base font-bold hover:cursor-pointer">></p>
                <a href="{{ route('missionAndVision') }}" class="text-accent font-bold">Mission and Vision</a>
            </div>
        </div>
</section>
<!-- banner-section -->

@php
    $data = $aboutUs->mission_vision ?? $missions ?? null;
@endphp

<div class="flex flex-col md:flex-row flex-2 items-center justify-center lg:justify-around gap-6 lg:gap-10 m-10 md:m">
    @foreach (['Mission', 'Vision'] as $index => $label)
        @php
            $iconPath = $mission_vision_images[$index] ?? null;
            $description = $data[$index]['description'] ?? "Our $label is to provide reliable and efficient remittance services to connect people across borders.";
            if ($label === 'Vision') {
                $description = $data[$index]['description'] ?? 'Our vision is to be the leading remittance service provider, known for reliability and excellence in financial services.';
            }
        @endphp

        <div
            class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
            <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                @if ($iconPath)
                    <img src="{{ asset('storage/' . $iconPath) }}" alt="{{ $label }} Icon" class="h-8 w-8">
                @else
                    {{-- Default SVG --}}
                    @if ($label === 'Mission')
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16V21M12 21H7M12 21H17M17 13H17.01M12 13H12.01M7 13H7.01M7 8H7.01M12 8H12.01M17 8H17.01M3 3L21 21"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    @else
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 12C2 12 5.5 7 12 7C18.5 7 22 12 22 12C22 12 18.5 17 12 17C5.5 17 2 12 2 12Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    @endif
                @endif
            </div>
            <h2 class="text-2xl text-black font-semibold text-center my-6">{{ $label }}</h2>
            <p class="text-gray-600 text-left"><span class="text-accent  mr-2">➜</span> {{ $description }}</p>
        </div>
    @endforeach
</div>
@endsection
