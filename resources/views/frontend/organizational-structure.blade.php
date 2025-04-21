@extends('frontend.layouts.app')
@section('title', 'Organizational Structure')
@section('meta', 'Organizational Structure - Hulas Remittance')
@section('content')


    <!-- banner-section -->
    <section class="relative">
        <div class="mb-10">
            <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
                alt="Banner Image" class="h-60 w-full object-cover" />
        </div>
        <div class="absolute w-full top-20">
            <div class="flex flex-col space-y-8 ml-10">
                <h3 class="text-4xl font-extrabold text-white">Organizational Structure</h3>
                <div class="flex space-x-5 items-center">
                    <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="{{ route('organizationalStructure') }}" class="text-accent font-bold">Organizational Structure</a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section -->

    <section class="overflow-x-hidden">
        <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
            <div class="flex flex-col items-center space-y-6">
                <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
                                -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                ">
                    Organizational Structure
                </h1>

                <p class="text-2xl text-black font-bold md:text-4xl text-center">
                    Leadership. Teamwork. Vision.
                </p>

                <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
                    Get to know the structure that drives Hulas Remittance. Our dedicated leadership and departments work
                    together to ensure seamless service and lasting impact.
                </p>
            </div>
        </div>
    </section>

    <!-- Board of Directors Section -->
    @isset($boardOfDirectors)
    @if($boardOfDirectors->count() > 0)
    <section class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">Board of Directors</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-8">
                @foreach($boardOfDirectors as $director)
                <div class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent">
                    @if($director->description_en)
                    <h3 class="text-base font-semibold mt-4 mb-4">
                        {{ $director->description_en }}
                    </h3>
                    @endif

                    @if($director->image)
                    <img src="{{ asset('storage/' . $director->image) }}" alt="{{ $director->name_en }}"
                        class="mb-4 w-40 h-40 object-cover rounded-full" />
                    @else
                    <div class="mb-4 w-40 h-40 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                    @endif
                    
                    <h3 class="font-bold text-black mb-5">{{ $director->name_en }}</h3>
                    
                    <div class="space-y-3">
                        @if($director->address_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/location-pin-svgrepo-com.svg') }}"
                                alt="Address Icon" class="w-4 h-4" />
                            <p>{{ $director->address_en }}</p>
                        </div>
                        @endif

                        @if($director->phone_number_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}"
                                alt="Phone Icon" class="w-4 h-4" />
                            <p>{{ $director->phone_number_en }}</p>
                        </div>
                        @endif

                        @if($director->email)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" 
                                alt="Email Icon" class="w-4 h-4" />
                            <p>{{ $director->email }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endisset

    <!-- Management Team Section -->
    @isset($managementTeam)
    @if($managementTeam->count() > 0)
    <section class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">Management Team</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-8">
                @foreach($managementTeam as $member)
                <div class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent">
                    @if($member->description_en)
                    <h3 class="text-base font-semibold mt-4 mb-4">
                        {{ $member->description_en }}
                    </h3>
                    @endif

                    @if($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name_en }}"
                        class="mb-4 w-40 h-40 object-cover rounded-full" />
                    @else
                    <div class="mb-4 w-40 h-40 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                    @endif
                    
                    <h3 class="font-bold text-black mb-5">{{ $member->name_en }}</h3>
                    
                    <div class="space-y-3">
                        @if($member->address_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/location-pin-svgrepo-com.svg') }}"
                                alt="Address Icon" class="w-4 h-4" />
                            <p>{{ $member->address_en }}</p>
                        </div>
                        @endif

                        @if($member->phone_number_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}"
                                alt="Phone Icon" class="w-4 h-4" />
                            <p>{{ $member->phone_number_en }}</p>
                        </div>
                        @endif

                        @if($member->email)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" 
                                alt="Email Icon" class="w-4 h-4" />
                            <p>{{ $member->email }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endisset
@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush