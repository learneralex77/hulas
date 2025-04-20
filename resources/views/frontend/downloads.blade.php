@extends('frontend.layouts.app')

@section('title', 'Downloads')
@section('meta', 'Download the latest forms and resources from Hulas Remittance')

@section('content')
    <!-- banner-section -->
    <section class="relative">
        <div class="mb-10">
            <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="Banner Image"
                class="h-60 w-full object-cover" />
        </div>
        <div class="absolute w-full top-20">
            <div class="flex flex-col space-y-8 ml-10">
                <h3 class="text-4xl font-extrabold text-white">Downloads</h3>
                <div class="flex space-x-5 items-center">
                    <a href="{{ url('/homepage') }}" class="text-white font-bold">Home</a>
                    <p class="text-white text-base font-bold">></p>
                    <a href="{{ url('/downloads') }}" class="text-accent font-bold">Downloads</a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section -->

    <div class="flex flex-col justify-center mx-auto bg-white p-6 rounded-lg md:mx-[50px] xl:mx-[100px] max-w-screen-xl">
        <h2 class="text-2xl font-bold mb-2 hidden md:block text-black">Downloads</h2>
        <hr class="text-gray-300 font-bold mb-4 hidden md:block" />

        <!-- Downloads Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($downloads as $download)
                <div x-data="{
                    fileType: (() => {
                        const file = '{{ $download->file }}';
                        if (file.endsWith('.pdf')) return 'pdf';
                        if (file.endsWith('.docx') || file.endsWith('.doc')) return 'word';
                        if (file.endsWith('.jpg') || file.endsWith('.jpeg') || file.endsWith('.png')) return 'image';
                        if (file.endsWith('.zip') || file.endsWith('.rar')) return 'archive';
                        return 'default';
                    })()
                }"
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">

                    <!-- File Icon and Name -->
                    <div class="flex items-center mb-4">
                        <i
                            :class="{
                                'fas fa-file-pdf text-red-500 text-3xl': fileType === 'pdf',
                                'fas fa-file-word text-blue-500 text-3xl': fileType === 'word',
                                'fas fa-file-image text-green-500 text-3xl': fileType === 'image',
                                'fas fa-file-archive text-yellow-500 text-3xl': fileType === 'archive',
                                'fas fa-file-alt text-gray-500 text-3xl': fileType === 'default'
                            }"></i>
                        <h5 class="ml-4 text-xl font-bold text-gray-900">{{ $download->name_en }}</h5>
                    </div>
                    <div class="flex space-x-2 mb-2 pl-2">
                        <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}"
                            class="w-4 h-4 object-contain" alt="date" />
                        <p class="text-sm text-gray-500">
                            {{ isset($download->created_at) ? $download->created_at->format('jS F Y') : 'Date not available' }}
                        </p>
                    </div>
                    <!-- Download Button -->
                    <a href="{{ route('frontend.downloads.download', $download->id) }}" target="_blank"
                        class="relative inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-accent bg-black rounded-lg overflow-hidden group transition-all duration-300 ease-out">
                        <i
                            class="fas fa-download text-xl transition-transform duration-300 ease-in-out transform group-hover:-translate-x-8"></i>
                        <span
                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out ml-8">
                            <span>Download</span>
                        </span>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center flex flex-col items-center justify-center h-64">
                    <h3 class="text-lg text-gray-500 mb-4">We're preparing new content for you. It will be available here
                        soon.</h3>
                </div>
            @endforelse
        </div>

        <!-- Pagination (if using paginate in controller) -->
        @if ($downloads instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="mt-6">
                {{ $downloads->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
