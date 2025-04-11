@extends('frontend.layouts.app')
@section('title', $newsEvent->name_en)
@section('meta', $newsEvent->description_en)
@section('content')


 <!-- banner-section -->
 <section class="relative">
  <div class="mb-10">
  <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
      alt="Banner Image"
      class="h-60 w-full object-cover"
    />
  </div>
  <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">{{ $newsEvent->name_en }}</h3>
      <div class="flex space-x-5 items-center">
        <a href="{{ route('homepage') }}" class="text-[#666] font-bold">Home</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="{{ route('newsAndEvents') }}" class="text-[#666] font-bold">News and Events</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="#" class="text-accent font-bold">{{ $newsEvent->name_en }}</a>
      </div>
    </div>
  </div>
</section>
<!-- banner-section -->
 
    <!-- new start -->
    <div class="flex flex-col lg:flex-row m-7">
        <!-- 1st part - Left column with fixed width -->
        <div class="ml-5 lg:w-3/5">
            <!-- Image -->
            <img src="{{ $newsEvent->image ? asset('storage/' . $newsEvent->image) : asset('assets/images/placeholder.jpg') }}"
                alt="{{ $newsEvent->name_en }}" class="w-full rounded-lg" />
            <!-- Content -->
            <div class="mt-5 text-justify w-full">
                <div id="short-description">
                    {{ \Illuminate\Support\Str::words($newsEvent->description_en, 30, '...') }}
                </div>
                <div id="full-description" class="hidden">
                    {{ $newsEvent->description_en }}
                </div>
            </div>
            <!-- button -->
            <button id="read-more-btn" class="mt-6 px-10 py-4 bg-amber-200 rounded-2xl cursor-pointer hover:bg-amber-300 transition-colors duration-200" onclick="toggleDescription()">
                Read More
            </button>
        </div>

        <!-- 2nd part - Right column with fixed width -->
        <div class="ml-5 lg:ml-10 mt-7 lg:w-2/5 bg-slate-200 rounded-lg mr-10 h-96">
            <!-- Heading for scroll -->
            <div class="p-2 bg-amber-200 rounded">
                <h1>All news and articles</h1>
            </div>

            <!-- Content inside the heading -->
            <div class="overflow-y-scroll h-90 sticky bg-slate-200">
                @foreach($otherNewsEvents as $otherNewsEvent)
                <!-- Content Repeated -->
                <div class="flex flex-row p-6 border-b-2 border-slate-300 {{ !$loop->last ? 'mb-5' : '' }}">
                    <img src="{{ $otherNewsEvent->image ? asset('storage/' . $otherNewsEvent->image) : asset('assets/images/placeholder.jpg') }}"
                        alt="{{ $otherNewsEvent->name_en }}" class="h-10" />
                    <a href="{{ route('newsAndEventsDetailPage', $otherNewsEvent->id) }}" class="ml-2.5">{{ $otherNewsEvent->name_en }}</a>
                </div>
                @endforeach
                
                @if(count($otherNewsEvents) == 0)
                <div class="flex flex-row p-6 border-b-2 border-slate-300">
                    <p class="ml-2.5 text-gray-500">No other news or events available.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- End in here -->
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
