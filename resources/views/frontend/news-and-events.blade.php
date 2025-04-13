@extends('frontend.layouts.app')
@section('title', 'News and Events')
@section('meta', 'Latest News and Events from Hulas Remittance')
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
                    <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                    <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                    <a href="{{ route('newsAndEvents') }}" class="text-accent font-bold"> News and Events</a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section -->

    <!-- Card part for our news and Article -->
    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-6 sm:m-10 lg:mx-20 2xl:mx-[100px] space-x-3">
        @isset($newsAndEvents)
            @foreach ($newsAndEvents as $newsAndEvent)
                <a href="{{ route('newsAndEventsDetailPage', $newsAndEvent->id) }}">
                    <div
                        class="bg-white rounded-sm shadow-lg p-3 mx-3 flex flex-col gap-3 text-left hover:-translate-y-2 transition-transform ease-in-out duration-300 border-l-accent border-l-[4px] border-l-accent">
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
                        <p class="text-gray-600 text-justify truncate whitespace-nowrap overflow-hidden">
                            {{ Str::words($newsAndEvent->description_en, 15, '...') }}
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

@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush