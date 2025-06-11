@extends('frontend.layouts.app')
@section('title', __('organizational-structure.title'))
@section('meta', __('organizational-structure.meta_title'))
@section('content')


    <!-- banner-section -->
    <section class="relative">
        <div class="mb-10">
            <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="{{ __('organizational-structure.title') }}"
                class="h-60 w-full object-cover" />
        </div>
        <div class="absolute w-full top-20">
            <div class="flex flex-col space-y-8 ml-10">
                <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ __('organizational-structure.title') }}</h3>
                <div class="flex space-x-5 items-center">
                    <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('organizational-structure.breadcrumb.home') }}</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="{{ route('organizationalStructure') }}" class="text-accent font-bold">{{ __('organizational-structure.breadcrumb.organizational_structure') }}</a>
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
                    {{ __('organizational-structure.intro.title') }}
                </h1>

                <p class="text-2xl text-black font-bold md:text-4xl text-center">
                    {{ __('organizational-structure.intro.subtitle') }}
                </p>

                <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
                    {{ __('organizational-structure.intro.description') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Board of Directors Section -->
    @isset($boardOfDirectors)
    @if($boardOfDirectors->count() > 0)
    <section class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">{{ __('organizational-structure.board_of_directors.title') }}</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-8">
                @foreach($boardOfDirectors as $director)
                <div class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent">
                    @if($director->description_en)
                    <h3 class="text-base font-semibold mt-4 mb-4">
                        {!! app()->getLocale() == 'en' ? $director->description_en : (isset($director->description_np) ? $director->description_np : $director->description_en) !!}
                    </h3>
                    @endif

                    @if($director->image)
                    <img src="{{ asset('storage/' . $director->image) }}" 
                         alt="{!! app()->getLocale() == 'en' ? $director->name_en : (isset($director->name_np) ? $director->name_np : $director->name_en) !!}"
                         class="mb-4 w-40 h-40 object-cover rounded-full" />
                    @else
                    <div class="mb-4 w-40 h-40 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-gray-500">{{ __('organizational-structure.board_of_directors.no_image') }}</span>
                    </div>
                    @endif
                    
                    <h3 class="font-bold text-black mb-5">{!! app()->getLocale() == 'en' ? $director->name_en : (isset($director->name_np) ? $director->name_np : $director->name_en) !!}</h3>
                    
                    <div class="space-y-3">
                        @if($director->address_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/location-pin-svgrepo-com.svg') }}"
                                alt="{{ __('organizational-structure.board_of_directors.contact.address') }}" class="w-4 h-4" />
                            <p>{!! app()->getLocale() == 'en' ? $director->address_en : (isset($director->address_np) ? $director->address_np : $director->address_en) !!}</p>
                        </div>
                        @endif

                        @if($director->phone_number_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}"
                                alt="{{ __('organizational-structure.board_of_directors.contact.phone') }}" class="w-4 h-4" />
                            <p>{!! app()->getLocale() == 'en' ? $director->phone_number_en : (isset($director->phone_number_np) ? $director->phone_number_np : $director->phone_number_en) !!}</p>
                        </div>
                        @endif

                        @if($director->email)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" 
                                alt="{{ __('organizational-structure.board_of_directors.contact.email') }}" class="w-4 h-4" />
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
            <h2 class="text-3xl font-bold text-center mb-10">{{ __('organizational-structure.management_team.title') }}</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-8">
                @foreach($managementTeam as $member)
                <div class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent">
                    @if($member->description_en)
                    <h3 class="text-base font-semibold mt-4 mb-4">
                        {!! app()->getLocale() == 'en' ? $member->description_en : (isset($member->description_np) ? $member->description_np : $member->description_en) !!}
                    </h3>
                    @endif

                    @if($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" 
                         alt="{!! app()->getLocale() == 'en' ? $member->name_en : (isset($member->name_np) ? $member->name_np : $member->name_en) !!}"
                         class="mb-4 w-40 h-40 object-cover rounded-full" />
                    @else
                    <div class="mb-4 w-40 h-40 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-gray-500">{{ __('organizational-structure.management_team.no_image') }}</span>
                    </div>
                    @endif
                    
                    <h3 class="font-bold text-black mb-5">{!! app()->getLocale() == 'en' ? $member->name_en : (isset($member->name_np) ? $member->name_np : $member->name_en) !!}</h3>
                    
                    <div class="space-y-3">
                        @if($member->address_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/location-pin-svgrepo-com.svg') }}"
                                alt="{{ __('organizational-structure.management_team.contact.address') }}" class="w-4 h-4" />
                            <p>{!! app()->getLocale() == 'en' ? $member->address_en : (isset($member->address_np) ? $member->address_np : $member->address_en) !!}</p>
                        </div>
                        @endif

                        @if($member->phone_number_en)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}"
                                alt="{{ __('organizational-structure.management_team.contact.phone') }}" class="w-4 h-4" />
                            <p>{!! app()->getLocale() == 'en' ? $member->phone_number_en : (isset($member->phone_number_np) ? $member->phone_number_np : $member->phone_number_en) !!}</p>
                        </div>
                        @endif

                        @if($member->email)
                        <div class="flex mb-3 space-x-3">
                            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" 
                                alt="{{ __('organizational-structure.management_team.contact.email') }}" class="w-4 h-4" />
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