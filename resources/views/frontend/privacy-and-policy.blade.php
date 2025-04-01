@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')
    <div class="bg-yellow-400 text-gray-800">
        <div class="max-w-3xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-12">
            <div class=" bg-black px-4 py-2 rounded-lg text-center">
                <h1 class="text-4xl font-bold  text-gray-900 mb-4">Privacy Policy</h1>
                <p class="text-gray-600 mb-6">Last updated: March 25, 2025</p>
            </div>
            <h2 class="text-2xl font-semibold mt-6 flex items-center">
                <span class="text-yellow-400 text-lg mr-2">➜</span> With description of compliance
            </h2>

            <h2 class="text-2xl font-semibold mt-6 flex ">
                <span class="text-yellow-400 text-lg mr-2 ">➜</span> Costomer / Data protection
            </h2>


            <h2 class="text-2xl font-semibold mt-6 flex items-center">
                <span class="text-yellow-400 text-lg mr-2">➜</span> OBTAINING/COLLECTING PERSONAL CONSUMER INFORMATION
            </h2>
            <p class="text-gray-700 mt-2">The personal information you collect from the consumer such as name, address,
                phone number, legal ID, and account number are private and need to protect from unauthorized access.</p>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                <li>Do not ask for other personal information that you don't need to serve</li>
                <li>Do your best to make sure other do not overhear your conversation and the information beong given to you
                </li>
                <li>keep your forms in a secure location, away from the public view</li>
            </ul>

            <h2 class="text-2xl font-semibold mt-6 flex items-center">
                <span class="text-yellow-400 text-lg mr-2">➜</span> STORING CONSUMER INFORMATION
            </h2>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                <li>ID's receipt and data collected from coustomers needs must store in a secure, locked location</li>
                <li>Electronics files must store and back-up securely to protect from unauthorized view </li>
                <li>ID's, receipts for transaction must be maintained for five(5) years and them promptly and secure
                    destroyed</li>
            </ul>

            <h2 class="text-2xl font-semibold mt-6 flex items-center">
                <span class="text-yellow-400 text-lg mr-2">➜</span> RELEASING CONSUMER INFORMATION
            </h2>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                <li> If someone claims to be auditor or from the law enforcement, protect yourself and your coustomer
                    verfying the personal identification</li>
            </UL>
            <h2 class="text-2xl font-semibold mt-6 flex items-center">
                <span class="text-yellow-400 text-lg mr-2">➜</span> BEFORE allowing him/her access to any location re
                records.
            </h2>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                <li>You cannot release any consumer re transaction information without a subpoena re other written direction
                    from a court re regulatory agency</li>
                <li>You cannot release any information to third party including a spouse or family </li>
            </ul>

        </div>
    </div>

@endsection


@push('scripts')
@endpush
