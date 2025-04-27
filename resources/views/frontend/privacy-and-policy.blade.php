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
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">Privacy Policy</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('privacyAndPolicy') }}" class="text-accent font-bold"> Privacy Policy</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->

        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 pb-20">
            <div class="px-9 py-2 mt-0 rounded-xltext-xl text-center">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Privacy Policy</h1>
                <p class="text-gray-600 mb-6">Last updated: March 25, 2025</p>
            </div>

            <h2 class="text-xl font-semibold flex items-center mt-6">
                <span class="text-yellow-400 text-xl mr-2">➜</span> With description of
                compliance
            </h2>

            <h2 class="text-xl font-semibold mt-6 flex items-center">
                <span class="text-yellow-400 text-xl mr-2">➜</span> Customer / Data
                protection
            </h2>

            <h2 class="text-xl font-semibold mt-6 flex items-center capitalize">
                <span class="text-yellow-400 text-xl mr-2">➜</span> Obtaining/collecting
                Personal consumer information
            </h2>
            <p class="text-gray-700 mt-2 px-6">
                The personal information you collect from the consumer such as name,
                address, phone number, legal ID, and account number are private and need
                to be protected from unauthorized access.
            </p>
            <ul class="list-disc list-inside px-6 text-gray-700 mt-2">
                <li>
                    Do not ask for other personal information that you don't need to serve
                </li>
                <li>
                    Do your best to make sure others do not overhear your conversation and
                    the information being given to you
                </li>
                <li>Keep your forms in a secure location, away from public view</li>
            </ul>

            <h2 class="text-xl font-semibold mt-6 flex items-center capitalize">
                <span class="text-yellow-400 text-xl mr-2">➜</span> Storing Consumer Information
            </h2>
            <ul class="list-disc list-inside text-gray-700 px-6 mt-2">
                <li>
                    ID's receipt and data collected from customers must be stored in a
                    secure, locked location
                </li>
                <li>
                    Electronic files must be stored and backed up securely to protect from
                    unauthorized view
                </li>
                <li>
                    ID's, receipts for transactions must be maintained for five (5) years
                    and then promptly and securely destroyed
                </li>
            </ul>

            <h2 class="text-xl font-semibold mt-6 flex items-center capitalize">
                <span class="text-yellow-400 text-xl mr-2">➜</span> Releasing Consumer Information
            </h2>
            <ul class="list-disc list-inside text-gray-700 mt-2 px-6">
                <li>
                    If someone claims to be an auditor or from law enforcement, protect
                    yourself and your customer by verifying the personal identification
                </li>
            </ul>

            <h2 class="text-xl font-semibold mt-6 flex items-center capitalize">
                <span class="text-yellow-400 text-xl mr-2">➜</span> Before allowing
                him/her access to any location or records
            </h2>
            <ul class="list-disc list-inside text-gray-700 px-6 mt-2">
                <li>
                    You cannot release any consumer transaction information without a
                    subpoena or other written direction from a court or regulatory agency
                </li>
                <li>
                    You cannot release any information to a third party including a spouse
                    or family
                </li>
            </ul>
        </div>
    </div>

@endsection


@push('scripts')
@endpush