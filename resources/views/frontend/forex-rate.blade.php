@extends('frontend.layouts.app')
@section('title', 'Forex Rate')
@section('meta', 'Forex Rate')

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
                <h3 class="text-2xl md:text-4xl font-extrabold text-white">Forex Rate</h3>
                <div class="flex space-x-5 items-center">
                    <a href="{{ route('homepage') }}" class="text-[#666] font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="{{ route('forexRate') }}" class="text-accent font-bold">Forex Rate</a>

                </div>
            </div>
    </section>
    <!-- banner-section -->
    <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">

    <!-- live exchange rates -->
    <section>
        <div class="overflow-x-hidden">
            <div class="p-4 md:ml-8 lg:my-4 lg:mb-2">
                <div class="flex flex-col items-center">
                    <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                        Forex rate </h1>
                    <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                        Live Exchange Rates </p>
                    <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                        Exchange money across the world in real time with lowest fees

                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row justify-center gap-6 items-center my-10">
            <div class="relative mx-3 shadow-xl overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-red-500">
                        <tr>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Currency Rate for Remittance
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3"></th>
                            @isset($forexRate->date)
                                <th scope="col" class="px-2 md:px-6 py-3">{{ $forexRate->date }}</th>
                            @endisset
                        </tr>
                    </thead>
                    <thead class="text-xs text-white uppercase bg-gray-500">
                        <tr>
                            <th scope="col" class="px-2 md:px-6 py-3">Currency</th>
                            <th scope="col" class="px-2 md:px-6 py-3">Unit</th>
                            <th scope="col" class="px-2 md:px-6 py-3">Buying rate(average)</th>
                        </tr>
                    </thead>
                    @foreach ($forexRate->slots['morning'] ?? [] as $row)
                                    <tr>
                                        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                @php
                                                    $flag = 'flag-icon w-8 h-8 rounded-full flag-icon-' . $row['flag'];
                                                @endphp

                                                <span class="{{ trim($flag) }}"></span>
                                                <span class="text-base text-[#212529]">{{ $row['currency'] }}</span>
                                            </div>
                                        </th>

                                        <td class="px-2 md:px-6 py-4">{{ $row['unit'] }}</td>
                                        <td class="px-2 md:px-6 py-4 text-center">{{ $row['buying_rate'] }}</td>
                                    </tr>
                    @endforeach


                </table>
            </div>
            @isset($forexRate->slots['afternoon'])
                <div class="relative mx-3 shadow-xl overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-[#035797]">
                            <tr>
                                <th scope="col" class="px-2 md:px-6 py-3">
                                    Currency Rate for Remittance
                                </th>
                                <th scope="col" class="px-2 md:px-6 py-3"></th>
                                <th scope="col" class="px-2 md:px-6 py-3">{{ $forexRate->date }}</th>
                            </tr>
                        </thead>
                        <thead class="text-xs text-white uppercase bg-gray-500">
                            <tr>
                                <th scope="col" class="px-2 md:px-6 py-3">Currency</th>
                                <th scope="col" class="px-2 md:px-6 py-3">Unit</th>
                                <th scope="col" class="px-2 md:px-6 py-3">Buying rate(average)</th>
                            </tr>
                        </thead>
                        @foreach ($forexRate->slots['afternoon'] ?? [] as $row)
                            <tr>
                                <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <div class="flex space-x-3 items-center">
                                        <span class="flag-icon flag-icon-{{ $row['flag'] }} w-8 h-8 rounded-full"></span>
                                        <p class="text-base text-[#212529]">{{ $row['currency'] }}</p>
                                    </div>
                                </th>
                                <td class="px-2 md:px-6 py-4">{{ $row['unit'] }}</td>
                                <td class="px-2 md:px-6 py-4 text-center">{{ $row['buying_rate'] }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            @endisset
        </div>
    </section>
    </div>
    </div>

@endsection

@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush