@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

    <div class="container mx-auto px-6 md:px-16 lg:px-24 py-10 mt-5">
        <!-- Title -->
        <h1 class="text-3xl md:text-4xl font-bold text-yellow-400">
            Mission and Vision
        </h1>

        <!-- Content Wrapper -->
        <div class="flex flex-col lg:flex-row items-center lg:items-start mt-6 gap-8">
            <!-- Left Content -->
            <div class="lg:w-2/3">
                <h2 class="text-2xl font-bold text-gray-800">
                    Our Corporate Mission
                </h2>
                <p class="text-gray-700 mt-2">
                    To provide accessible, affordable, and innovative general insurance
                    solutions that safeguard the interests of individuals, businesses,
                    and society, while upholding trust, transparency, and efficiency as
                    a responsible enterprise.
                </p>

                <h2 class="text-2xl font-bold text-gray-800 mt-6">
                    Our Corporate Vision
                </h2>
                <p class="text-gray-700 mt-2 text-justify">
                    To be a globally admired insurance leader, delivering unparalleled
                    customer satisfaction, driving socio-economic progress, and setting
                    benchmarks in risk management, sustainability, and inclusive growth.
                </p>

                <!-- Bullet Points -->
                <ul class="list-none mt-4 space-y-2 text-justify">
                    <li class="flex items-center">
                        <span class="text-yellow-400 text-lg mr-2">➜</span>
                        <span>Emphasize providing value-driven services to individuals and
                            enterprises.</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-yellow-400 text-lg mr-2">➜</span>
                        <span>Reflect on adopting modern technologies for faster claims
                            processing and policy issuance.</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-yellow-400 text-lg mr-2">➜</span>
                        <span>To act as a financially sound corporate entity with high
                            business ethics.</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-yellow-400 text-lg mr-2">➜</span>
                        <span>To increase insurance penetration and run the business
                            profitably through prudent underwriting and proper claim
                            management.</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-yellow-400 text-lg mr-2">➜</span>
                        <span>To optimize the retention of Nepal business in the best
                            interest of the country.</span>
                    </li>
                </ul>
            </div>

            <!-- Right Content (Image and Text) -->
            <div class="lg:w-1/3 text-center pl-10">
                <img src="https://www.rpsjhalawar.com/img/our-Mission-Vision.jpg" alt="Mission and Vision"
                    class="w-full h-auto max-w-sm mx-auto lg:max-w-full rounded-lg shadow-md" />
                <p class="text-gray-700 mt-4 text-justify">
                    <span class="font-bold text-yellow-400">Hullas Remittance</span> is
                    proud of the fact that around 1 million plus lives are part of our
                    family. It gives us immense pleasure, while we realize the
                    responsibility at the same time.
                </p>
                <p class="text-gray-700 mt-2">
                    Our online application questions and real-time underwriting enable
                    us to calculate the best price for you.
                </p>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
@endpush
