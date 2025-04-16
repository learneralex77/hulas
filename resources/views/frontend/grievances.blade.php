@extends('frontend.layouts.app')
@section('title', 'Grievances')
@section('meta', 'Submit grievances to Hulas Remittance')
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
      <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="{{ route('grievances') }}" class="text-accent font-bold">Grievances</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->


  <!-- grievance form  -->
  <section class="m-6">
    <section class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">
      <h1 class="font-bold text-accent uppercase text-lg tracking-wider">
        Your Concerns Matter
      </h1>

      <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
        At Hulas Remittance, we take every grievance seriously. If you've faced any issues, please let us know. Our
        team is here to listen and resolve your concerns quickly and fairly.
      </p>
      <p class="text-gray-600 text-sm mb-6">Last updated: March 25, 2025</p>

      </div>
    </div>
    </section>

    <div class="flex justify-center w-full">
    <div class="bg-white shadow-xl rounded-md p-6">
      <form action="{{ route('grievances.store') }}" method="POST" class="lg:mx-10">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="flex flex-col space-y-5">
            <label for="name" class="font-bold text-lg text-[#3d5169]">Name</label>
            <input 
              id="name" 
              name="name" 
              type="text" 
              placeholder="Your name" 
              class="w-full rounded-md bg-[#f5faff] @error('name') border-red-500 @enderror" 
              value="{{ old('name') }}"
              required
            />
            @error('name')
              <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex flex-col space-y-5">
            <label for="mobile_number" class="font-bold text-lg text-[#3d5169]">Mobile Number</label>
            <input 
              id="mobile_number" 
              name="mobile_number" 
              type="text" 
              placeholder="Your mobile number" 
              class="w-full rounded-md bg-[#f5faff] @error('mobile_number') border-red-500 @enderror" 
              value="{{ old('mobile_number') }}"
              required
            />
            @error('mobile_number')
              <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex flex-col space-y-5">
            <label for="city" class="font-bold text-lg text-[#3d5169]">City</label>
            <input 
              id="city" 
              name="city" 
              type="text" 
              placeholder="Your city" 
              class="w-full rounded-md bg-[#f5faff] @error('city') border-red-500 @enderror" 
              value="{{ old('city') }}"
              required
            />
            @error('city')
              <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="mt-5 flex flex-col space-y-4">
          <label for="message" class="font-bold text-lg text-[#3d5169]">Your Message</label>
          <textarea 
            id="message" 
            name="message" 
            cols="20" 
            rows="10" 
            class="bg-[#f5faff] rounded-md @error('message') border-red-500 @enderror"
            placeholder="Please enter your message..."
            required
          >{{ old('message') }}</textarea>
          @error('message')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
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
    <script>
        // Execute as soon as the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Success and error message handling
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#10B981',
                    timer: 5000,
                    timerProgressBar: true
                });
            @endif
            
            // Check for error message in session
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'Try Again',
                    confirmButtonColor: '#EF4444'
                });
            @endif
        });
    </script>
@endpush