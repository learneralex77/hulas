@extends('frontend.layouts.app')
@section('title', 'Privacy Policy')
@section('meta', 'Hulas Remittance Privacy Policy - Learn how we protect and handle your personal information')
@section('content')

    <div class="min-h-screen">

        <!-- banner-section -->
        <section class="relative">
            <div class="mb-10">
                <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="Privacy Policy"
                    class="h-60 w-full object-cover" />
            </div>
            <div class="absolute w-full top-20">
                <div class="flex flex-col space-y-8 ml-10">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">Privacy Policy</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('privacyAndPolicy') }}" class="text-accent font-bold">Privacy Policy</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->

        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 pb-20">
            <div class="px-9 py-2 mt-0 rounded-xltext-xl text-center">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Privacy Policy</h1>
                <p class="text-gray-600 mb-6">Last Updated: December 2023</p>
            </div>

            <!-- Introduction -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Introduction</h2>
                <p class="text-gray-700">This Privacy Policy outlines how Hulas Remittance collects, uses, maintains, and discloses information collected from users of our services. We are committed to protecting your privacy and handling your data with transparency and care.</p>
            </div>

            <!-- Information Collection -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Information We Collect</h2>
                <p class="text-gray-700">We collect various types of information to provide and improve our services. This may include personal identification information (such as name, email address, phone number) and transaction-related data when you use our remittance services.</p>
            </div>

            <!-- Information Usage -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">How We Use Your Information</h2>
                <p class="text-gray-700">We use the collected information to process your transactions, maintain your account, improve our services, communicate with you about our services, and comply with legal obligations.</p>
            </div>

            <!-- Information Protection -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">How We Protect Your Information</h2>
                <p class="text-gray-700">We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information.</p>
            </div>

            <!-- Information Sharing -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Sharing Your Information</h2>
                <p class="text-gray-700">We do not sell, trade, or rent users' personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users.</p>
            </div>

            <!-- Cookies -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Use of Cookies</h2>
                <p class="text-gray-700">Our website may use "cookies" to enhance user experience. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent.</p>
            </div>

            <!-- Third Party Links -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Third-Party Links</h2>
                <p class="text-gray-700">Our service may contain links to third-party websites. We are not responsible for the privacy practices of such other sites and encourage you to read their privacy statements.</p>
            </div>

            <!-- Policy Changes -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Changes to This Privacy Policy</h2>
                <p class="text-gray-700">Hulas Remittance has the discretion to update this privacy policy at any time. We encourage users to frequently check this page for any changes.</p>
            </div>

            <!-- Contact -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Contact Us</h2>
                <p class="text-gray-700">If you have any questions about this Privacy Policy, please contact us through the information provided on our website.</p>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush