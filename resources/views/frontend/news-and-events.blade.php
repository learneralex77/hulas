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
                <h3 class="text-4xl font-extrabold text-white">News and Events</h3>
                <div class="flex space-x-5 items-center">
                    <a href="index.html" class="text-[#666] font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="news-and-events.html" class="text-accent font-bold"> News and Events</a>
                </div>
            </div>
    </section>
    <!-- banner-section -->

    <!-- Card part for our news and Article -->
    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-6 sm:m-10 lg:mx-20 2xl:mx-[100px] space-x-3">
        <!-- 1st -->
        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px] border-l-accent">
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a> <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>
        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>
        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>
        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>
        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>
        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://grandehospital.com/_next/image?url=https%3A%2F%2Fcms.grandehospital.com%2Fstorage%2FPublication%2F1%2F6573_publication.png&w=750&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>

        <a href="news-and-events-detail-page.html">
            <div
                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left  hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px]">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&q=75"
                    alt="News Image" class="rounded-md w-full h-44 object-cover" />
                <h4 href="news-and-events-detail-page.html" class="text-lg font-semibold line-clamp-1 text-left">World
                    Stroke day</h4>
                <div class="flex space-x-2 ">
                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                        class="h-auto w-4" />
                    <p class="text-sm text-gray-500">29th March 2020</p>
                </div>
                <p class="text-gray-600  text-justify line-clamp-3 ">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex
                    dignissimos aliquam sit inventore debitis, culpa tempore consequuntur
                    in eligendi, magni illum eos, vero corrupti? Magnam amet iste dolores
                    voluptate molestias.
                </p>

            </div>
        </a>


    </div>

@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush