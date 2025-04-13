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
                    <a href="index.html" class="text-[#666] font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="become-an-agent.html" class="text-accent font-bold">Become an agent</a>
                </div>
            </div>
    </section>
    <!-- banner-section -->

    <!-- form section  -->
    <section class="flex flex-col m-6 sm:m-10 md:m-20 lg:mx-40">
        <h2 class="text-xl lg:text-3xl text-black font-extrabold text-center my-10">
            Fill up the form
        </h2>
        <div class="flex flex-col justify-around lg:flex-row gap-10 rounded-lg">
            <!-- <div class="lg:flex lg:justify-center lg:mt-32"> -->
            <div class="flex flex-2 bg-white shadow-xl rounded-md p-6 w-full">
                <form class="w-full">
                    <div class="flex flex-col space-y-8">
                        <div class="flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-5">
                            <div class="flex flex-col space-y-3 w-full">
                                <label for="name" class="font-bold text-xl text-[#3d5169]">Name</label>
                                <input id="name" placeholder="Name" type="text" class="rounded-md bg-[#f5faff]" />
                            </div>

                            <div class="flex flex-col space-y-3 w-full">
                                <label for="contact" class="font-bold text-xl text-[#3d5169]">Contact Number</label>
                                <input type="tel" placeholder="Contact Number" id="contact"
                                    class="bg-[#f5faff] rounded-md" />
                            </div>
                        </div>

                        <div class="flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-5">
                            <div class="flex flex-col space-y-3 w-full">
                                <label for="email" class="font-bold text-xl text-[#3d5169]">Email</label>
                                <input type="email" placeholder="Email" id="email" class="bg-[#f5faff] rounded-md" />
                            </div>
                            <div class="flex flex-col space-y-3 w-full">
                                <label for="name" class="font-bold text-xl text-[#3d5169]">District</label>
                                <input id="name" placeholder="District" type="text" class="rounded-md bg-[#f5faff]" />
                            </div>
                        </div>

                        <div class="flex flex-col space-y-3">
                            <label for="query" class="font-bold text-xl text-[#3d5169]">Message</label>
                            <textarea name="query" id="query" cols="20" rows="10" class="bg-[#f5faff] rounded-md"
                                placeholder="Please enter your message..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-44 flex justify-center items-center bg-black text-accent hover:opacity-85 py-3 px-5 rounded-full cursor-pointer">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-1 flex-col w-full shadow-xl gap-6 p-6 rounded-lg">
                <h2 class="text-xl text-black font-extrabold text-center m-6">
                    Contact Information
                </h2>
                <div class="flex flex-col space-y-10 items-left lg:items-center lg:justify-center sm:px-10 lg:px-0">
                    <div class="flex flex-row gap-6 space-x-5 items-center">
                        <div class="w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                            <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}" class="w-8"
                                alt="Location Icon" />
                        </div>
                        <div class="flex flex-col space-y-1">
                            <p class="font-semibold">Location:</p>

                            <p class="">
                                Bagdurbar, Sundhara <br />
                                (Near to China Town Gate)
                            </p>

                            <p>Kathmandu, Nepal</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-6 space-x-5 items-center">
                        <div class="w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}" class="w-8" alt="" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <p>+977 1 5361313, 5358225, <br />5352008</p>
                            <p class="font-semibold">Toll Free Number:</p>
                            <p>
                                16600 111222 <br />(For NTC Users Only)
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-6 space-x-5 items-center">
                        <div class="w-16 h-16 rounded-full bg-accent flex justify-center items-center">
                            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" class="w-8" alt="" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <p class="font-semibold">Email:</p>
                            <p>
                                info@hulasremittance.com,<br />
                                csc@hulasremittance.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- form section  -->

@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush