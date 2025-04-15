@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">Grievances</h3>
      <div class="flex space-x-5 items-center">
      <a href="index.html" class="text-white font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="grievances" class="text-accent font-bold">Grievances</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->


  <!-- grievance form  -->
  <section class="m-6">
    <div class=" px-4 py-2 rounded-lg text-center">
    </div>

    <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-accent uppercase text-lg tracking-wider">
        Your Concerns Matter
      </h1>

      <!-- <p class="text-2xl font-bold md:text-2xl lg:text-4xl text-center">
      Your Concerns Matter
      </p> -->

      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
        At Hulas Remittance, we take every grievance seriously. If you’ve faced any issues, please let us know. Our
        team is here to listen and resolve your concerns quickly and fairly.
      </p>
      <p class="text-gray-600 text-sm mb-6">Last updated: March 25, 2025</p>

      </div>
    </div>
    </section>

    <div class="flex justify-center w-full">
    <div class=" bg-white shadow-xl rounded-md p-6">
      <form class="">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="flex flex-col space-y-5">
        <label for="name" class="font-bold text-lg text-[#3d5169]">Name</label>
        <input id="name" type="text" placeholder="Your name" class="w-full rounded-md bg-[#f5faff]" />
        </div>
        <div class="flex flex-col space-y-5">
        <label for="email" class="font-bold text-lg text-[#3d5169]">Mobile Number</label>
        <input id="email" type="email" placeholder="Your number" class="w-full rounded-md bg-[#f5faff]" />
        </div>
        <div class="flex flex-col space-y-5">
        <label for="phone" class="font-bold text-lg text-[#3d5169]">City District</label>
        <input id="phone" type="tel" placeholder="Your district" class="w-full rounded-md bg-[#f5faff]" />
        </div>
      </div>
      <div class="mt-5 flex flex-col space-y-4">
        <label for="query" class="font-bold text-lg text-[#3d5169]">
        Your Message</label>
        <textarea name="query" id="query" cols="20" rows="10" class="bg-[#f5faff] rounded-md"
        placeholder="Please enter your message..."></textarea>
      </div>
      <div class="w-full flex justify-center">
        <button type="submit"
        class="bg-black text-white text-base transition-all ease-in-out mt-5 w-44 py-2 px-8 flex justify-center tracking-wide hover:text-accent rounded-full cursor-pointer">
        Send Message
        </button>
      </div>
      </form>
    </div>
    </div>
  </section>
  <!-- grievance form  -->
@endsection


@push('scripts')
@endpush