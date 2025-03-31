@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Goodwill Finance Pvt. Ltd.')
@section('content')

 <!-- Page Content -->
  <div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-6">Sitemap</h1>

    <div class="bg-white mt-10 rounded-lg text-base">
        <div class="lg:grid grid-cols-3 gap-4">
            <div><a href="/" class="text-blue-500 hover:underline">Homepage</a></div>
            <div>
                <a href="/about" class="text-blue-500 hover:underline">About Us</a>
                <ul class="ml-4 list-disc">
                    <li><a href="#" class="text-blue-500 hover:underline">Hula Remittance</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Western Union</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Message from Director</a></li>
                </ul>
            </div>
            <div>
                <a href="#" class="text-blue-500 hover:underline">Services</a>
                <ul class="ml-4 list-disc">
                    <li><a href="#" class="text-blue-500 hover:underline">Send Money</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Track Money</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Receive Money</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Search Agent Locations</a></li>
                </ul>
            </div>
            <div><a href="#" class="text-blue-500 hover:underline">Become an Agent</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">News & Events</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Gallery</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Downloads</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Forex Page</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Sitemap</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Privacy Policy</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Terms & Conditions</a></div>
            <div><a href="#" class="text-blue-500 hover:underline">Contact Us</a></div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
@endpush
