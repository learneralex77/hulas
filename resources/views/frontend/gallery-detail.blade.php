@extends('frontend.layouts.app')
@section('title', $gallery->title_en)
@section('meta', $gallery->short_description ?? 'Gallery Details')
@section('content')

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ $gallery->title_en }}</h3>
      <div class="flex space-x-5 items-center">
      <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('gallery') }}" class="text-white font-bold">Gallery</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('galleryDetail', $gallery->slug) }}" class="text-accent font-bold">{{ $gallery->title_en }}</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->

  <!-- new start -->
  <!-- For image part -->
  <div x-data="{
      imageGalleryOpened: false,
      imageGalleryActiveUrl: null,
      imageGalleryImageIndex: null,
      imageGallery: [
      @isset($gallery)
        @if($gallery->featured_image)
        {
          'photo': '{{ asset('storage/' . $gallery->featured_image) }}',
          'alt': '{{ $gallery->title_en }} - Featured Image'
        },
        @endif

        @if($gallery->images)
          @foreach($gallery->images as $index => $image)
          {
            'photo': '{{ asset('storage/' . $image) }}',
            'alt': '{{ $gallery->title_en }} - Image {{ $index + 1 }}'
          }@if(!$loop->last),@endif
          @endforeach
        @endif
      ],
      imageGalleryOpen(event) {
        this.imageGalleryImageIndex = event.target.dataset.index;
        this.imageGalleryActiveUrl = event.target.src;
        this.imageGalleryOpened = true;
      },
      imageGalleryClose() {
        this.imageGalleryOpened = false;
        setTimeout(() => this.imageGalleryActiveUrl = null, 300);
      },
      imageGalleryNext(){
        this.imageGalleryImageIndex = (this.imageGalleryImageIndex == this.imageGallery.length) ? 1 : (parseInt(this.imageGalleryImageIndex) + 1);
        this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
      },
      imageGalleryPrev() {
        this.imageGalleryImageIndex = (this.imageGalleryImageIndex == 1) ? this.imageGallery.length : (parseInt(this.imageGalleryImageIndex) - 1);
        this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;

      }
    }" @image-gallery-next.window="imageGalleryNext()" @image-gallery-prev.window="imageGalleryPrev()"
    @keyup.right.window="imageGalleryNext();" @keyup.left.window="imageGalleryPrev();"
    class="w-full h-full select-none mt-5 mb-5">
    <div class="max-w-6xl my-20 mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view" style="
        translate: none;
        rotate: none;
        opacity: 1;
        transform: translate(0px, 0px);
        ">
       
    <!-- Heading for the image -->

    <div class="mx-12">
      @isset($gallery->title_en)
      <h2 class="text-2xl font-bold mb-2 text-black">{{ $gallery->title_en }}</h2>
      @endisset
      @isset($gallery->short_description)
      <p class="text-gray-600 mb-4">{{ $gallery->short_description }}</p>
      @endisset
    </div>
    <div class="mx-10 p-4 flex">

      <ul x-ref="gallery" id="gallery" class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:grid-cols-3 xl:grid-cols-4">
      <template x-for="(image, index) in imageGallery">
        <li>
        <img x-on:click="imageGalleryOpen" :src="image.photo" :alt="image.alt" :data-index="index+1"
          class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[4/3] lg:aspect-[4/3] xl:aspect-[4/3]" />
        </li>
      </template>
      </ul>
    </div>
    <template x-teleport="body">
      <div x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300"
      x-transition:enter-start="opacity-0" x-transition:leave="transition ease-in-in duration-300"
      x-transition:leave-end="opacity-0" @click="imageGalleryClose" @keydown.window.escape="imageGalleryClose"
      x-trap.inert.noscroll="imageGalleryOpened"
      class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out"
      x-cloak>
      <div class="relative flex items-center justify-center w-11/12 xl:w-4/5 h-11/12">
        <div @click="$event.stopPropagation(); $dispatch('image-gallery-prev')"
        class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        </div>
        <img x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-50"
        x-transition:leave="transition ease-in-in duration-300"
        x-transition:leave-end="opacity-0 transform scale-50"
        class="object-contain object-center w-full h-full select-none cursor-zoom-out" :src="imageGalleryActiveUrl"
        alt="" style="display: none" />
        <div @click="$event.stopPropagation(); $dispatch('image-gallery-next');"
        class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        </div>
      </div>
      </div>
    </template>
    </div>
    @endisset

  @endsection

  @push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @endpush