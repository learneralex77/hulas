@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')


    <!-- banner-section -->
    <section class="relative">
        <div class="mb-10">
            <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
                alt="Banner Image" class="h-60 w-full object-cover" />
        </div>
     
        <div class="absolute w-full top-20">
            <div class="flex flex-col space-y-8 ml-10">
                <h3 class="text-4xl font-extrabold text-white">Mission and Vision</h3>
                <div class="flex space-x-5 items-center">
                    <a href="index.html" class="text-white font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="mission-and-vision" class="text-accent font-bold">Mission and Vision</a>
                </div>
            </div>
    </section>
    <!-- banner-section -->


        <!-- Content Wrapper -->
        <!-- Left Content -->
        @if(isset($aboutUs) && is_array($aboutUs->mission_vision) && count($aboutUs->mission_vision) >= 2)
        <div class="flex flex-col md:flex-row flex-2 items-center justify-center lg:justify-around gap-6 lg:gap-10 m-10 md:m">
            <!-- Mission Card -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
                <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                    @php
                        $missionIconPath = isset($mission_vision_images) && is_array($mission_vision_images) && !empty($mission_vision_images) && isset($mission_vision_images[0]) ? $mission_vision_images[0] : null;
                    @endphp
                    
                    @if($missionIconPath)
                        <img src="{{ asset('storage/' . $missionIconPath) }}" alt="Mission Icon" class="h-8 w-8">
                    @else
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 16V21M12 21H7M12 21H17M17 13H17.01M12 13H12.01M7 13H7.01M7 8H7.01M12 8H12.01M17 8H17.01M3 3L21 21" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    @endif
                </div>
                <h2 class="text-2xl text-black font-semibold text-center my-6">Mission</h2>
                <p class="text-gray-600 text-center">
                    {{ $aboutUs->mission_vision[0]['description'] ?? 'Our mission is to provide reliable and efficient remittance services to connect people across borders.' }}
                </p>
            </div>
            
            <!-- Vision Card -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
                <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                    @php
                        $visionIconPath = isset($mission_vision_images) && is_array($mission_vision_images) && !empty($mission_vision_images) && isset($mission_vision_images[1]) ? $mission_vision_images[1] : null;
                    @endphp
                    
                    @if($visionIconPath)
                        <img src="{{ asset('storage/' . $visionIconPath) }}" alt="Vision Icon" class="h-8 w-8">
                    @else
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M2 12C2 12 5.5 7 12 7C18.5 7 22 12 22 12C22 12 18.5 17 12 17C5.5 17 2 12 2 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    @endif
                </div>
                <h2 class="text-2xl text-black font-semibold text-center my-6">Vision</h2>
                <p class="text-gray-600 text-center">
                    {{ $aboutUs->mission_vision[1]['description'] ?? 'Our vision is to be the leading remittance service provider, known for reliability and excellence in financial services.' }}
                </p>
            </div>
        </div>
        @elseif(isset($missions) && is_array($missions) && count($missions) >= 2)
        <div class="flex flex-col md:flex-row flex-2 items-center justify-center lg:justify-around gap-6 lg:gap-10 m-10 md:m">
            <!-- Mission Card (fallback) -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
                <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                    @php
                        $missionIconPath = isset($mission_vision_images) && is_array($mission_vision_images) && !empty($mission_vision_images) && isset($mission_vision_images[0]) ? $mission_vision_images[0] : null;
                    @endphp
                    
                    @if($missionIconPath)
                        <img src="{{ asset('storage/' . $missionIconPath) }}" alt="Mission Icon" class="h-8 w-8">
                    @else
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 16V21M12 21H7M12 21H17M17 13H17.01M12 13H12.01M7 13H7.01M7 8H7.01M12 8H12.01M17 8H17.01M3 3L21 21" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    @endif
                </div>
                <h2 class="text-2xl text-black font-semibold text-center my-6">Mission</h2>
                <p class="text-gray-600 text-center">
                    {{ $missions[0]['description'] ?? 'Our mission is to provide reliable and efficient remittance services to connect people across borders.' }}
                </p>
            </div>
            
            <!-- Vision Card (fallback) -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
                <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                    @php
                        $visionIconPath = isset($mission_vision_images) && is_array($mission_vision_images) && !empty($mission_vision_images) && isset($mission_vision_images[1]) ? $mission_vision_images[1] : null;
                    @endphp
                    
                    @if($visionIconPath)
                        <img src="{{ asset('storage/' . $visionIconPath) }}" alt="Vision Icon" class="h-8 w-8">
                    @else
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M2 12C2 12 5.5 7 12 7C18.5 7 22 12 22 12C22 12 18.5 17 12 17C5.5 17 2 12 2 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    @endif
                </div>
                <h2 class="text-2xl text-black font-semibold text-center my-6">Vision</h2>
                <p class="text-gray-600 text-center">
                    {{ $missions[1]['description'] ?? 'Our vision is to be the leading remittance service provider, known for reliability and excellence in financial services.' }}
                </p>
            </div>
        </div>
        @else
        <div class="flex flex-col md:flex-row flex-2 items-center justify-center lg:justify-around gap-6 lg:gap-10 m-10 md:m">
            <!-- Default Mission Card -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
                <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M12 16V21M12 21H7M12 21H17M17 13H17.01M12 13H12.01M7 13H7.01M7 8H7.01M12 8H12.01M17 8H17.01M3 3L21 21" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </svg>
                </div>
                <h2 class="text-2xl text-black font-semibold text-center my-6">Mission</h2>
                <p class="text-gray-600 text-center">
                    Our mission is to provide reliable and efficient remittance services to connect people across borders.
                </p>
            </div>
            
            <!-- Default Vision Card -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl border-t-4 border-accent cursor-pointer hover:-translate-y-2 transition-transform ease-in-out duration-300 w-full h-[300px]">
                <div class="flex items-center justify-center w-16 h-16 bg-accent text-blue-700 rounded-full mx-auto mb-4">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M2 12C2 12 5.5 7 12 7C18.5 7 22 12 22 12C22 12 18.5 17 12 17C5.5 17 2 12 2 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </svg>
                </div>
                <h2 class="text-2xl text-black font-semibold text-center my-6">Vision</h2>
                <p class="text-gray-600 text-center">
                    Our vision is to be the leading remittance service provider, known for reliability and excellence in financial services.
                </p>
            </div>
        </div>
        @endif
</div>
@endsection


@push('scripts')
@endpush