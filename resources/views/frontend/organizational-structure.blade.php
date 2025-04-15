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
                <h3 class="text-4xl font-extrabold text-white">Organizational Structure</h3>
                <div class="flex space-x-5 items-center">
                    <a href="index.html" class="text-white font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="organizational-structure" class="text-accent font-bold"> Organizational Structure</a>
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
                    Organizational Structure
                </h1>

                <p class="text-2xl text-black font-bold md:text-4xl text-center">
                    Leadership. Teamwork. Vision.
                </p>

                <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
                    Get to know the structure that drives Hulas Remittance. Our dedicated leadership and departments work
                    together to ensure seamless service and lasting impact.
                </p>
            </div>
        </div>
    </section>

    <div class="container m-auto px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ml-8 mr-8">
            <!-- Board Member - 1 -->
            <div
                class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent ">
                <h3 class="text-base font-semibold mt-4 mb-4">
                    Information Officer
                </h3>

                <img src="https://goodwillfinance.com.np/storage/team/image/24/1735887749.jpg" alt="Memeber Image"
                    class="mb-4 w-40 h-40 object-cover rounded-full items-center" />
                <h3 class="font-bold text-black mb-5">Bharat Bahadur Mahat</h3>
                <div class="space-y-3">
                    <!-- Location -->
                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                            alt="Address Icon" class="w-4 h-4" />
                        <p class="">Hattisar, Kathmandu, Nepal</p>
                    </div>

                    <!-- Number -->

                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                            alt="Address Icon" class="w-4 h-4" />
                        <p class="">01-4544039, 9851127743</p>
                    </div>
                    <!-- Email -->

                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" alt="Email Icon"
                            class="w-4 h-4" />
                        <p class="">bharat@goodwill.net.np</p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent ">
                <h3 class="text-base font-semibold mt-4 mb-4">
                    Information Officer
                </h3>

                <img src="https://goodwillfinance.com.np/storage/team/image/24/1735887749.jpg" alt="Memeber Image"
                    class="mb-4 w-40 h-40 object-cover rounded-full items-center" />
                <h3 class="font-bold text-black mb-5">Bharat Bahadur Mahat</h3>
                <div class="space-y-3">
                    <!-- Location -->
                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                            alt="Address Icon" class="w-4 h-4" />
                        <p class="">Hattisar, Kathmandu, Nepal</p>
                    </div>

                    <!-- Number -->

                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                            alt="Address Icon" class="w-4 h-4" />
                        <p class="">01-4544039, 9851127743</p>
                    </div>
                    <!-- Email -->

                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" alt="Email Icon"
                            class="w-4 h-4" />
                        <p class="">bharat@goodwill.net.np</p>
                    </div>
                </div>
            </div>

            <div
                class="rounded-lg shadow-lg p-4 flex flex-col items-center bg-slate-100 text-center border-t-4 border-accent ">
                <h3 class="text-base font-semibold mt-4 mb-4">
                    Information Officer
                </h3>

                <img src="https://goodwillfinance.com.np/storage/team/image/24/1735887749.jpg" alt="Memeber Image"
                    class="mb-4 w-40 h-40 object-cover rounded-full items-center" />
                <h3 class="font-bold text-black mb-5">Bharat Bahadur Mahat</h3>
                <div class="space-y-3">
                    <!-- Location -->
                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                            alt="Address Icon" class="w-4 h-4" />
                        <p class="">Hattisar, Kathmandu, Nepal</p>
                    </div>

                    <!-- Number -->

                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset(path: 'assets/images/contact/location-pin-svgrepo-com.svg') }}"
                            alt="Address Icon" class="w-4 h-4" />
                        <p class="">01-4544039, 9851127743</p>
                    </div>
                    <!-- Email -->

                    <div class="flex mb-3 space-x-3">
                        <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" alt="Email Icon"
                            class="w-4 h-4" />
                        <p class="">bharat@goodwill.net.np</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush