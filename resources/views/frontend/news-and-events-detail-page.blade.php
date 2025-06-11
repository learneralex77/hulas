@extends('frontend.layouts.app')
@section('title', app()->getLocale() === 'np' ? $newsEvent->name_np : $newsEvent->name_en)
@section('meta', app()->getLocale() === 'np' ? $newsEvent->description_np : $newsEvent->description_en)
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
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ app()->getLocale() === 'np' ? $newsEvent->name_np : $newsEvent->name_en }}</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('news-and-events.breadcrumb.home') }}</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('newsAndEvents') }}" class="text-white font-bold">{{ __('news-and-events.breadcrumb.news_and_events') }}</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="#" class="text-accent font-bold">{{ app()->getLocale() === 'np' ? $newsEvent->name_np : $newsEvent->name_en }}</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section -->

        <!-- new start -->
        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 mb-20">
            <div class="flex flex-col max-h-1/4 lg:flex-row">
                <!-- 1st part -->
                <div class="flex-1 lg:flex-2 m-6 h-full justify-center">
                    <!-- Image -->
                    @if($newsEvent->image)
                        <img src="{{ asset('storage/' . $newsEvent->image) }}"
                            alt="{{ app()->getLocale() === 'np' ? $newsEvent->name_np : $newsEvent->name_en }}"
                            class="w-full object-contain max-w-full xl:max-w-[700px] rounded-lg" />
                    @endif
                    <!-- Content -->
                    @if($newsEvent->description_en)
                        <p class="mt-5 w-full">
                            {!! app()->getLocale() === 'np' ? $newsEvent->description_np : $newsEvent->description_en !!}
                        </p>
                    @endif
                </div>

                <!-- 2nd part -->
                <!-- Main div for second part -->
                <div class="flex-1 flex justify-center flex-col h-full gap-4 m-6">
                    <div class="flex flex-col gap-2">
                        <h3 class="font-bold text-xl text-black border-l-accent border-l-[4px] px-3">{{ __('news-and-events.detail_page.about_us') }}</h3>
                        @if($newsEvent->description_en)
                            <p class="px-3">{{ Str::limit(app()->getLocale() === 'np' ? $newsEvent->description_np : $newsEvent->description_en, 150) }}</p>
                        @endif
                        @if($setting->facebook)
                            <div class="flex flex-row gap-4 px-3">
                                <!-- Facebook -->
                                <div class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full cursor-pointer hover:opacity-80 transition ease-in-out duration-200">
                                    @if($setting->facebook)
                                        <a href="{{ $setting->facebook }}">
                                            <img src="{{ asset('assets/images/social-media-icons/facebook-black.svg') }}"
                                                alt="Facebook Icon" class="w-6 h-6">
                                        </a>
                                    @endif
                                </div>

                                <!-- LinkedIn -->
                                @if($setting->linkedin)
                                    <div class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full cursor-pointer hover:opacity-80 transition ease-in-out duration-200">
                                        <a href="{{ $setting->linkedin }}">
                                            <img src="{{ asset('assets/images/social-media-icons/linkedin-svgrepo-com.svg') }}"
                                                alt="LinkedIn Icon" class="w-4 h-4">
                                        </a>
                                    </div>
                                @endif

                                <!-- Twitter -->
                                @if($setting->twitter)
                                    <div class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full cursor-pointer hover:opacity-80 transition ease-in-out duration-200">
                                        <a href="{{ $setting->twitter }}">
                                            <img src="{{ asset('assets/images/social-media-icons/icons8-x-50.png') }}"
                                                alt="Twitter Icon" class="w-5 h-5">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('newsAndEvents') }}"
                            class="bg-black text-center items-center text-accent px-4 py-2 rounded-full cursor-pointer hover:opacity-85 w-54 font-semibold">
                            {{ __('news-and-events.detail_page.explore_news') }}
                        </a>
                    </div>
                    <div class="drop-shadow-xl shadow-gray-100 bg-white rounded-lg">
                        <!-- Heading for scroll -->
                        <div class="flex flex-row gap-4 bg-white rounded m-3 p-3">
                            <!-- Explore part -->
                            <div class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                    fill="currentColor">
                                    <!-- Hamburger Lines -->
                                    <path d="M3 6h14M3 12h14M3 18h14" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                    <!-- Three Dots -->
                                    <circle cx="20" cy="6" r="1.5" fill="black" />
                                    <circle cx="20" cy="12" r="1.5" fill="black" />
                                    <circle cx="20" cy="18" r="1.5" fill="black" />
                                </svg>
                            </div>
                            <h1 class="font-bold text-lg tracking-wide">{{ __('news-and-events.detail_page.all_news') }}</h1>
                        </div>

                        <!-- Content inside the heading -->
                        <div class="overflow-y-scroll h-[430px] m-3 sticky bg-white">
                            <!-- Content Repeated -->
                            @if($otherNewsEvents)
                                @foreach($otherNewsEvents as $otherNewsEvent)
                                    <div class="flex flex-row gap-10 p-2 border-l-accent border-l-[4px] my-2 shadow-sm h-25">
                                        <div class="h-auto w-30">
                                            <img src="{{ $otherNewsEvent->image ? asset('storage/' . $otherNewsEvent->image) : asset('assets/images/placeholder.jpg') }}"
                                                alt="{{ app()->getLocale() === 'np' ? $otherNewsEvent->name_np : $otherNewsEvent->name_en }}"
                                                class="h-full w-full rounded-lg object-cover" />
                                        </div>

                                        <div class="flex flex-col gap-3">
                                            <a href="{{ route('newsAndEventsDetailPage', $otherNewsEvent->slug) }}"
                                                class="line-clamp-2 text-lg font-semibold cursor-pointer hover:text-accent transition-colors duration-200">
                                                {{ app()->getLocale() === 'np' ? $otherNewsEvent->name_np : $otherNewsEvent->name_en }}
                                            </a>
                                            <div class="flex space-x-2">
                                                <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}"
                                                    class="w-4 h-4 object-contain" alt="{{ __('news-and-events.date') }}">
                                                <p class="text-xs text-gray-500">{{ $otherNewsEvent->created_at->format('d F Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="p-4 text-center">
                                    <p>{{ __('news-and-events.empty_state.message') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        function toggleDescription() {
            const shortDesc = document.getElementById('short-description');
            const fullDesc = document.getElementById('full-description');
            const readMoreBtn = document.getElementById('read-more-btn');

            if (shortDesc.classList.contains('hidden')) {
                // Show short description, hide full description
                shortDesc.classList.remove('hidden');
                fullDesc.classList.add('hidden');
                readMoreBtn.textContent = 'Read More';
            } else {
                // Hide short description, show full description
                shortDesc.classList.add('hidden');
                fullDesc.classList.remove('hidden');
                readMoreBtn.textContent = 'Read Less';
            }
        }
    </script>
@endpush
