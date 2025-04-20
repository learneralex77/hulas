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
                <h3 class="text-4xl font-extrabold text-white">Become an agent</h3>
                <div class="flex space-x-5 items-center">
                    <a href="index.html" class="text-white font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="become-an-agent.html" class="text-accent font-bold">Become an agent</a>
                </div>
            </div>
    </section>
    <!-- banner-section -->

    <!-- form section  -->
    <section class="flex flex-col m-6 sm:m-10 md:m-20 xl:mx-40">
        <section class="overflow-x-hidden">
            <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                <div class="flex flex-col items-center space-y-6">
                    <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
                                                          text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
                                                          -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                                          ">
                        Partner With us </h1>

                    <p class="text-2xl text-black font-bold md:text-4xl text-center">
                        Fill up the form </p>
                    <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
                        Join Hulas Remittance as an agent and be a part of a trusted global network. Help your community
                        send and receive money with ease—while growing your own business.


                    </p>
                </div>
            </div>
        </section>
        <div class="flex flex-col justify-center lg:flex-row gap-10 rounded-lg">
            <!-- <div class="lg:flex lg:justify-center lg:mt-32"> -->
            <div class="flex flex-2 bg-white shadow-xl rounded-md p-6 w-full">
                <form class="w-full" method="POST" action="{{ route('storeAgentRequest') }}" id="agent-request-form">
                    @csrf
                    <div class="flex flex-col space-y-8">
                        <div class="flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-5">
                            <div class="flex flex-col space-y-3 w-full">
                                <label for="name" class="font-bold text-xl text-[#3d5169]">Name</label>
                                <input id="name" name="name" placeholder="Name" type="text" class="rounded-md bg-[#fffdf1]"
                                    required />
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col space-y-3 w-full">
                                <label for="contact_number" class="font-bold text-xl text-[#3d5169]">Contact Number</label>
                                <input type="tel" placeholder="Contact Number" id="contact_number" name="contact_number"
                                    class="bg-[#fffdf1] rounded-md" required />
                                @error('contact_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-5">
                            <div class="flex flex-col space-y-3 w-full">
                                <label for="email" class="font-bold text-xl text-[#3d5169]">Email</label>
                                <input type="email" placeholder="Email" id="email" name="email"
                                    class="bg-[#fffdf1] rounded-md" required />
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-3 w-full">
                                <label for="district" class="font-bold text-xl text-[#3d5169]">District</label>
                                <input id="district" name="district" placeholder="District" type="text"
                                    class="rounded-md bg-[#fffdf1]" required />
                                @error('district')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col space-y-3">
                            <label for="message" class="font-bold text-xl text-[#3d5169]">Message</label>
                            <textarea name="message" id="message" cols="20" rows="10" class="bg-[#fffdf1] rounded-md"
                                placeholder="Please enter your message..." required></textarea>
                            @error('message')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-44 flex justify-center items-center bg-black text-accent hover:opacity-85 py-3 px-5 rounded-full cursor-pointer font-semibold">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-1 flex-col w-full shadow-xl gap-6 p-6 rounded-lg">
                <h2 class="text-xl text-black font-extrabold text-center m-6">
                    Contact Information
                </h2>
                <div class="flex flex-col space-y-10 items-left lg:items-left lg:justify-center sm:px-10 lg:px-0">
                    <div class="flex flex-row gap-6 justify-left space-x-5 items-center">
                        <div class="min-w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                            <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                                class="w-8 min-w-8 h-8" alt="Location Icon" />
                        </div>
                        <div class="flex flex-col space-y-1">
                            <p class="font-semibold">Location:</p>
                            @isset($setting->address_en)
                            <p>
                               
                                    {{ $setting->address_en }}
                            </p>
                            @endisset
                        </div>
                    </div>
                    <div class="flex flex-row gap-6 justify-left space-x-5 items-center">

                        <div class="min-w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}" class="w-8 min-w-8 h-8 "
                                alt="Phone Icon" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <p class="font-semibold">Toll Free Number:</p>
                            @isset($settings->phone_number_en)
                            <p>
                               
                                    {{ $settings->phone_number_en }}
                                @endisset

                            </p>
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-6 justify-left space-x-5 items-center">
                        <div class="min-w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" class="w-8 min-w-8 h-8"
                                alt="Contact Icon" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <p class="font-semibold">Email:</p>
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
            </p>
        </div>
    </section>
    <!-- form section  -->

@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#10B981',
                    timer: 5000,
                    timerProgressBar: true
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'Try Again',
                    confirmButtonColor: '#EF4444'
                });
            @endif
                                                            });
    </script>
@endpush