@extends('frontend.layouts.app')
@section('title', 'News and Events')
@section('meta', 'Latest News and Events from Hulas Remittance')
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
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">News and Events</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('newsAndEvents') }}" class="text-accent font-bold"> News and Events</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section -->
        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 mb-20">
            <section class="overflow-x-hidden">
                <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                    <div class="flex flex-col items-center">

                        <!-- Sub Heading -->
                        <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                        News & Events
                        </h1>

                        <!-- Main Title -->
                        <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                            Stay Informed with Hulas Updates
                        </p>

                        <!-- Description -->
                        <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                        Catch up on the latest news, important announcements, and exciting events from Hulas Remittance.
                            Stay
                            connected to what's happening locally and around the world.
                        </p>

                    </div>
                </div>
            </section>

            <!-- Card part for our news and Article -->
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 m-6 sm:m-10 lg:mx-20 2xl:mx-[100px] space-x-3">
                @isset($newsAndEvents)
                    @foreach ($newsAndEvents as $newsAndEvent)
                        <a href="{{ route('newsAndEventsDetailPage', $newsAndEvent->slug) }}">
                            <div
                                class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px] border-l-accent min-h-[300px]">
                                <img src="{{ $newsAndEvent->image ? asset('storage/' . $newsAndEvent->image) : asset('assets/images/placeholder.jpg')  }}"
                                    alt="News Image" class="rounded-md w-full h-44 object-cover" />

                                <h4 class="text-lg font-semibold line-clamp-1 text-left">
                                    {{ $newsAndEvent->name_en }}
                                </h4>
                                <div class="flex space-x-2">
                                    <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}" alt="date"
                                        class="h-auto w-4" />
                                    <p class="text-sm text-gray-500">{{ $newsAndEvent->created_at->format('F d, Y') }}</p>
                                </div>
                                <p class="text-gray-600 text-justify overflow-hidden line-clamp-3">
                                    {{ $newsAndEvent->description_en }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="col-span-4 text-center py-10">
                        <p class="text-lg text-gray-600">No news or events available at the moment.</p>
                    </div>
                @endisset
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush