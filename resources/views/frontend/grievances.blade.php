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
      <form id="grievanceForm" action="{{ route('grievances.store') }}" method="POST" class="lg:mx-10">
      @csrf
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="flex flex-col space-y-5">
        <label for="name" class="font-bold text-lg text-[#3d5169]">Name</label>
        <input id="name" name="name" type="text" placeholder="Your name"
          class="w-full rounded-md bg-[#f5faff] @error('name') border-red-500 @enderror"
           value="{{ old('name') }}"
           oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"

          required />
        @error('name')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
        </div>
        <div class="flex flex-col space-y-5">
        <label for="mobile_number" class="font-bold text-lg text-[#3d5169]">Mobile Number</label>
        <input id="mobile_number" name="mobile_number" type="text" placeholder="Your mobile number"
          class="w-full rounded-md bg-[#f5faff] @error('mobile_number') border-red-500 @enderror"
          value="{{ old('mobile_number') }}" required
           inputmode="numeric" pattern="\d{10}" minlength="10"
          maxlength="19"
          />
        @error('mobile_number')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
        </div>
        <div class="flex flex-col space-y-5">
        <label for="city" class="font-bold text-lg text-[#3d5169]">City</label>
        <input id="city" name="city" type="text" placeholder="Your city"
          class="w-full rounded-md bg-[#f5faff] @error('city') border-red-500 @enderror"
           value="{{ old('city') }}"
          required 
          oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
          />
        @error('city')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
        </div>
      </div>
      <div class="mt-5 flex flex-col space-y-4">
        <label for="message" class="font-bold text-lg text-[#3d5169]">Your Message</label>
        <textarea id="message"
         name="message"
         cols="20" rows="10"
        class="bg-[#f5faff] rounded-md @error('message') border-red-500 @enderror"
  minlength="10"
        placeholder="Please enter your message..." 
        required
        >{{ old('message') }}</textarea>
        @error('message')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
      </div>
      <div class="w-full flex justify-center">
        <button type="submit"
        class="bg-black text-accent text-base transition-all ease-in-out mt-5 w-44 py-2 px-8 flex justify-center tracking-wide hover:opacity-85 rounded-full cursor-pointer">
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
    document.addEventListener('DOMContentLoaded', function () {
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('grievanceForm');

      
    mobileInput.addEventListener('input', function () {
    if (!/^\d{10}$/.test(this.value)) {
      this.classList.add('border-red-500');
    } else {
      this.classList.remove('border-red-500');
    }
    });

    form.addEventListener('submit', function (e) {
      let isValid = true;
      let errors = [];

      const name = form['name'].value.trim();
      const mobile = form['mobile_number'].value.trim();
      const city = form['city'].value.trim();
      const message = form['message'].value.trim();

      if (name === '') {
      isValid = false;
      errors.push('Name is required.');
      }

      if (mobile === '' || !/^\d{7,15}$/.test(mobile)) {
      isValid = false;
      errors.push('Valid mobile number is required (7-15 digits).');
      }

      if (city === '') {
      isValid = false;
      errors.push('City is required.');
      }

      if (message.length < 10) {
      isValid = false;
      errors.push('Message must be at least 10 characters.');
      }

      if (!isValid) {
      e.preventDefault();

      Swal.fire({
        icon: 'warning',
        title: 'Please fix the following:',
        html: errors.map(e => `<p>${e}</p>`).join(''),
        confirmButtonColor: '#F59E0B'
      });
      }
    });
    });
  </script>

  <script>

//mobile

//name validation
if (name === '' || !/^[A-Za-z\s]{2,}$/.test(name)) {
  isValid = false;
  errors.push('Name must be at least 2 characters and contain only letters and spaces.');
}

const nameInput = document.getElementById('name');

nameInput.addEventListener('input', function () {
  if (!/^[A-Za-z\s]{2,}$/.test(this.value)) {
    this.classList.add('border-red-500');
  } else {
    this.classList.remove('border-red-500');
  }
});

//city validation

if (city === '' || !/^[A-Za-z\s]{2,}$/.test(city)) {
  isValid = false;
  errors.push('City must be at least 2 characters and contain only letters and spaces.');
}
const cityInput = document.getElementById('city');

cityInput.addEventListener('input', function () {
  if (!/^[A-Za-z\s]{2,}$/.test(this.value)) {
    this.classList.add('border-red-500');
  } else {
    this.classList.remove('border-red-500');
  }
});

//message
if (message.length < 10) {
  isValid = false;
  errors.push('Message must be at least 10 characters long.');
}

const messageInput = document.getElementById('message');

messageInput.addEventListener('input', function () {
  if (this.value.length < 10) {
    this.classList.add('border-red-500');
  } else {
    this.classList.remove('border-red-500');
  }
});

const messageCount = document.getElementById('message-count');

messageInput.addEventListener('input', function () {
  messageCount.textContent = `${this.value.length} / 500 characters`;

  if (this.value.length < 10) {
    messageInput.classList.add('border-red-500');
  } else {
    messageInput.classList.remove('border-red-500');
  }
});


  </script>


@endpush