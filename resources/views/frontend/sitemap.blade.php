@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
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
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">Sitemap</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="homepage" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="sitemap" class="text-accent font-bold">Sitemap</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->

        <div class="mx-6 md:mx-10 lg:m-20 xl:mx-40 pb-20">
            <!-- Page Content -->
                <div class="lg:grid grid-cols-3 gap-4">
                    <div><a href="/" class="text-black cursor-pointer hover:underline">Homepage</a></div>
                    <div>
                        <a href="/about" class="text-black cursor-pointer hover:underline">About Us</a>
                        <ul class="ml-4 list-disc">
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Hula Remittance</a></li>
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Western Union</a></li>
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Message from Director</a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="#" class="text-black cursor-pointer hover:underline">Services</a>
                        <ul class="ml-4 list-disc">
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Send Money</a></li>
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Track Money</a></li>
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Receive Money</a></li>
                            <li><a href="#" class="text-black cursor-pointer hover:underline">Search Agent Locations</a></li>
                        </ul>
                    </div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Become an Agent</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">News & Events</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Gallery</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Downloads</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Forex Page</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Sitemap</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Privacy Policy</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Terms & Conditions</a></div>
                    <div><a href="#" class="text-black cursor-pointer hover:underline">Contact Us</a></div>
                </div>
        </div>
    </div>
@endsection


@push('scripts')
@endpush