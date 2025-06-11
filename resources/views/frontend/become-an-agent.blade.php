@extends('frontend.layouts.app')
@section('title', __('become-agent.page_title'))
@section('meta', __('become-agent.meta_description'))
@section('content')
    <div class="min-h-screen">
        <!-- banner-section -->
        <section class="relative">
            <div class="mb-10">
                <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" 
                    alt="{{ __('become-agent.banner.image_alt') }}" class="h-60 w-full object-cover" />
            </div>
            <div class="absolute w-full top-20">
                <div class="flex flex-col space-y-8 ml-10">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ __('become-agent.banner.title') }}</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('become-agent.breadcrumb.home') }}</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('becomeAnAgent') }}" class="text-accent font-bold">{{ __('become-agent.breadcrumb.become_agent') }}</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->
        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40 pb-10">
            <!-- form section  -->
            <section class="flex flex-col">
                <section class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center ">
                            <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                                {{ __('become-agent.form_section.title') }}</h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                {{ __('become-agent.form_section.subtitle') }}</p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                {{ __('become-agent.form_section.description') }}
                            </p>
                        </div>
                    </div>
                </section>
                <div class="flex flex-col justify-center lg:flex-row gap-10 rounded-lg">
                    <div class="flex flex-2 bg-white shadow-xl rounded-md p-6 w-full">
                        <form class="w-full" method="POST" action="{{ route('storeAgentRequest') }}"
                            id="agent-request-form">
                            @csrf
                            <div class="flex flex-col space-y-8">
                                <div class="flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-5">
                                    <div class="flex flex-col space-y-3 w-full">
                                        <label for="name" class="font-bold text-xl text-[#3d5169]">{{ __('become-agent.form_section.fields.name') }}</label>
                                        <input id="name" name="name" placeholder="{{ __('become-agent.form_section.fields.name') }}" type="text"
                                            class="rounded-md bg-[#fffdf1]" required />
                                        @error('name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="flex flex-col space-y-3 w-full">
                                        <label for="contact_number" class="font-bold text-xl text-[#3d5169]">{{ __('become-agent.form_section.fields.contact_number') }}</label>
                                        <input type="tel" placeholder="{{ __('become-agent.form_section.fields.contact_number') }}" id="contact_number"
                                            name="contact_number" class="bg-[#fffdf1] rounded-md" required />
                                        @error('contact_number')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-5">
                                    <div class="flex flex-col space-y-3 w-full">
                                        <label for="email" class="font-bold text-xl text-[#3d5169]">{{ __('become-agent.form_section.fields.email') }}</label>
                                        <input type="email" placeholder="{{ __('become-agent.form_section.fields.email') }}" id="email" name="email"
                                            class="bg-[#fffdf1] rounded-md" required />
                                        @error('email')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col space-y-3 w-full">
                                        <label for="district" class="font-bold text-xl text-[#3d5169]">{{ __('become-agent.form_section.fields.district') }}</label>
                                        <input id="district" name="district" placeholder="{{ __('become-agent.form_section.fields.district') }}" type="text"
                                            class="rounded-md bg-[#fffdf1]" required />
                                        @error('district')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex flex-col space-y-3">
                                    <label for="message" class="font-bold text-xl text-[#3d5169]">{{ __('become-agent.form_section.fields.message') }}</label>
                                    <textarea name="message" id="message" cols="20" rows="10"
                                        class="bg-[#fffdf1] rounded-md" placeholder="{{ __('become-agent.form_section.fields.message_placeholder') }}"
                                        required></textarea>
                                    @error('message')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="w-44 flex justify-center items-center bg-black text-accent hover:opacity-85 py-3 px-5 rounded-full cursor-pointer font-semibold">
                                    {{ __('become-agent.form_section.fields.submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-1 flex-col w-full shadow-xl gap-6 p-6 rounded-lg">
                        <h2 class="text-xl text-black font-extrabold text-center m-6">
                            {{ __('become-agent.contact_info.title') }}
                        </h2>
                        <div class="flex flex-col space-y-10 items-left lg:items-left lg:justify-center sm:px-10 lg:px-0">
                            <div class="flex flex-row gap-6 justify-left space-x-5 items-center">
                                <div class="min-w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                                    <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                                        class="w-8 min-w-8 h-8" alt="{{ __('become-agent.contact_info.location.icon_alt') }}" />
                                </div>
                                <div class="flex flex-col space-y-1">
                                    <p class="font-semibold">{{ __('become-agent.contact_info.location.label') }}</p>
                                    <p>
                                        @isset($setting->address_en)
                                            @if(app()->getLocale() == 'np')
                                                {{ $setting->address_np }}
                                            @else
                                                {{ $setting->address_en }}
                                            @endif
                                        @endisset
                                    </p>
                                    <p>{{ __('become-agent.contact_info.location.city') }}</p>
                                </div>
                            </div>
                            <div class="flex flex-row gap-6 justify-left space-x-5 items-center">
                                <div class="min-w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                                    <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}"
                                        class="w-8 min-w-8 h-8 " alt="{{ __('become-agent.contact_info.phone.icon_alt') }}" />
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <p class="font-semibold">{{ __('become-agent.contact_info.phone.label') }}</p>
                                    <p>
                                        @isset($settings->phone_number_en)
                                            @if(app()->getLocale() == 'np')
                                                {{ $settings->phone_number_np }}
                                            @else
                                                {{ $settings->phone_number_en }}
                                            @endif
                                        @endisset
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-row gap-6 justify-left space-x-5 items-center">
                                <div class="min-w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                                    <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}"
                                        class="w-8 min-w-8 h-8" alt="{{ __('become-agent.contact_info.email.icon_alt') }}" />
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <p class="font-semibold">{{ __('become-agent.contact_info.email.label') }}</p>
                                    <p>
                                        @isset($settings->email)
                                            {{ $settings->email }}<br>
                                            {{ $settings->agent_notify_email }}
                                        @endisset
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- form section  -->
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: "{{ __('become-agent.alerts.success.title') }}",
                    text: "{{ session('success') }}",
                    showConfirmButton: true,
                    confirmButtonText: "{{ __('become-agent.alerts.success.button') }}",
                    confirmButtonColor: '#10B981',
                    timer: 5000,
                    timerProgressBar: true
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: "{{ __('become-agent.alerts.error.title') }}",
                    text: "{{ session('error') }}",
                    showConfirmButton: true,
                    confirmButtonText: "{{ __('become-agent.alerts.error.button') }}",
                    confirmButtonColor: '#EF4444'
                });
            @endif
        });
    </script>
@endpush