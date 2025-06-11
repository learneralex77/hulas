@extends('frontend.layouts.app')
@section('title', __('contact.title'))
@section('meta', __('contact.meta_title'))
@section('content')

  <div class="min-h-screen">
    <!-- banner-section -->
    <section class="relative">
    <div class="mb-10">
      <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="{{ __('contact.title') }}"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
      <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ __('contact.title') }}</h3>
      <div class="flex space-x-5 items-center">
        <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('contact.breadcrumb.home') }}</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="{{ route("contactUs") }}" class="text-accent font-bold">{{ __('contact.breadcrumb.contact_us') }}</a>
      </div>
      </div>
    </section>
    <!-- banner-section -->

    <!-- content -->
    <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 pb-20">

    <!-- cards section -->
    <section>
      <div class="mt-16 mx-8 flex justify-center">
      <div class="flex flex-col lg:flex-row gap-6 justify-center lg:items-center">
        <!-- Location Card -->
        <div class="bg-[#f3f3f3] h-[200px] xl:h-[180px] lg:h-[220px] shadow-md rounded-md p-3 flex flex-1 w-[340px] md:w-[400px] lg:w-[300px] xl:w-[400px]">
        <div class="flex justify-start flex-row gap-4">
          <div class="flex justify-center py-4">
          <div class="w-18 h-18 rounded-full bg-accent flex justify-center items-center">
            <img src="{{ asset('assets/images/contact/location-pin-svgrepo-com.svg') }}" class="w-10 h-10"
            alt="{{ __('contact.info_cards.location.icon_alt') }}" />
          </div>
          </div>

          <div class="flex flex-col items-left sm:items-start space-y-3">
          <p class="text-xl text-black font-semibold text-left">{{ __('contact.info_cards.location.title') }}</p>
          <p class="">
            @isset($setting->address_en)
              {!! app()->getLocale() == 'en' ? $setting->address_en : (isset($setting->address_np) ? $setting->address_np : $setting->address_en) !!}
            @endisset
          </p>
          </div>
        </div>
        </div>
        <!-- Email Card -->
        <div class="bg-[#f3f3f3] h-[200px] xl:h-[180px] lg:h-[220px] shadow-md rounded-md p-3 flex flex-1 w-[340px] md:w-[400px] lg:w-[300px] xl:w-[400px]">
        <div class="flex justify-start flex-row gap-4">
          <div class="flex justify-center py-4">
          <div class="w-18 h-18 rounded-full bg-accent flex justify-center items-center">
            <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" class="w-10 h-10" 
              alt="{{ __('contact.info_cards.email.icon_alt') }}" />
          </div>
          </div>
          <div class="flex flex-col items-left sm:items-start space-y-3">
          <p class="text-xl font-bold text-black">{{ __('contact.info_cards.email.title') }}</p>
          <p class="">
            @isset($setting->email)
              {{ $setting->email }}
            @endisset
            <br>
            @isset($setting->agent_notify_email)
              {{ $setting->agent_notify_email }}
            @endisset
          </p>
          </div>
        </div>
        </div>
        <!-- Phone Card -->
        <div class="bg-[#f3f3f3] h-[200px] xl:h-[180px] lg:h-[220px] shadow-md rounded-md p-3 flex flex-1 w-[340px] md:w-[400px] lg:w-[300px] xl:w-[400px]">
        <div class="flex justify-start flex-row gap-4">
          <div class="flex justify-center py-4">
          <div class="w-18 h-18 rounded-full bg-accent flex justify-center items-center">
            <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}" class="w-10 h-10" 
              alt="{{ __('contact.info_cards.phone.icon_alt') }}" />
          </div>
          </div>
          <div class="flex flex-col items-left sm:items-start space-y-3">
          <p class="text-xl font-bold text-black">{{ __('contact.info_cards.phone.title') }}</p>
          <p class="">
            @isset($setting->phone_number_en)
              {!! app()->getLocale() == 'en' ? $setting->phone_number_en : (isset($setting->phone_number_np) ? $setting->phone_number_np : $setting->phone_number_en) !!}
            @endisset
            <br>
            @isset($setting->toll_free_number)
              {{ $setting->toll_free_number }}
            @endisset
          </p>
          </div>
        </div>
        </div>
      </div>
      </div>
    </section>
    <!-- cards section -->

    <!-- map section -->
    @isset($setting->google_maplink)
    <section>
      <div class="mt-16 flex justify-center w-full">
      <iframe src="{{ $setting->google_maplink }}"
        class="w-full lg:h-[500px]" style="border: 0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
    @endisset
    <!-- map section -->

    <!-- contact form  -->
    <section class="">
      <div class="mt-16 mx-10 sm:m-20">
      <section class="overflow-x-hidden">
        <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
        <div class="flex flex-col items-center">
          <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
            {{ __('contact.form_section.title') }}
          </h1>
          <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
            {{ __('contact.form_section.subtitle') }}
          </p>
          <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
            {{ __('contact.form_section.description') }}
          </p>
        </div>
        </div>
      </section>
      </div>
      <div class="lg:flex lg:justify-center lg:mt-20 w-full">
      <img src="{{ asset('assets/images/contact/contact-form-bg.png') }}" class="h-full" alt="" />
      <div class="lg:w-[70%] bg-white shadow-xl rounded-md p-6">
        <form class="sm:mx-20" action="{{ url('/contact-us') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="flex flex-col space-y-5">
          <label for="full_name" class="font-bold text-xl text-[#3d5169]">{{ __('contact.form_section.fields.name.label') }}</label>
          <input id="full_name" name="full_name" type="text" 
            placeholder="{{ __('contact.form_section.fields.name.placeholder') }}"
            class="w-full rounded-md bg-[#fffae2] @error('full_name') border-red-500 @enderror"
            value="{{ old('full_name') }}" required />
          @error('full_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
          </div>
          <div class="flex flex-col space-y-5">
          <label for="email" class="font-bold text-xl text-[#3d5169]">{{ __('contact.form_section.fields.email.label') }}</label>
          <input id="email" name="email" type="email" 
            placeholder="{{ __('contact.form_section.fields.email.placeholder') }}"
            class="w-full rounded-md bg-[#fffae2] @error('email') border-red-500 @enderror"
            value="{{ old('email') }}" required />
          @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
          </div>
          <div class="flex flex-col space-y-5">
          <label for="phone_number" class="font-bold text-xl text-[#3d5169]">{{ __('contact.form_section.fields.phone.label') }}</label>
          <input id="phone_number" name="phone_number" type="tel" 
            placeholder="{{ __('contact.form_section.fields.phone.placeholder') }}"
            class="w-full rounded-md bg-[#fffae2] @error('phone_number') border-red-500 @enderror"
            value="{{ old('phone_number') }}" required />
          @error('phone_number')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
          </div>
          <div class="flex flex-col space-y-5">
          <label for="service_interested_in" class="font-bold text-xl text-[#3d5169]">{{ __('contact.form_section.fields.service.label') }}</label>
          <input id="service_interested_in" name="service_interested_in" type="text" 
            placeholder="{{ __('contact.form_section.fields.service.placeholder') }}"
            class="w-full rounded-md bg-[#fffae2] @error('service_interested_in') border-red-500 @enderror"
            value="{{ old('service_interested_in') }}" />
          @error('service_interested_in')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
          </div>
        </div>
        <div class="mt-5 flex flex-col space-y-4">
          <label for="message" class="font-bold text-xl text-[#3d5169]">{{ __('contact.form_section.fields.message.label') }}</label>
          <textarea name="message" id="message" cols="20" rows="10"
          class="bg-[#fffae2] rounded-md @error('message') border-red-500 @enderror"
          placeholder="{{ __('contact.form_section.fields.message.placeholder') }}">{{ old('message') }}</textarea>
          @error('message')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div class="w-full flex justify-center">
          <button type="submit"
          class="w-44 text-center bg-black text-accent hover:opacity-85 py-3 px-5 rounded-full cursor-pointer tracking-wide my-6 font-semibold">
            {{ __('contact.form_section.submit_button') }}
          </button>
        </div>
        </form>
      </div>
      </div>
    </section>
    <!-- contact form  -->
    </div>
  </div>

@endsection


@push('scripts')
  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      @if(session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: "{{ __('contact.alerts.success') }}",
          showConfirmButton: true,
          confirmButtonText: 'OK',
          confirmButtonColor: '#10B981',
          timer: 5000,
          timerProgressBar: true
        });
      @endif

      @if(session('error'))
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "{{ __('contact.alerts.error') }}",
          showConfirmButton: true,
          confirmButtonText: 'Try Again',
          confirmButtonColor: '#EF4444'
        });
      @endif
    });
  </script>
@endpush