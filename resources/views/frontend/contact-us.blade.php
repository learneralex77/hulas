@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
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
      <h3 class="text-4xl font-extrabold text-white">Contact us</h3>
      <div class="flex space-x-5 items-center">
        <a href="index.html" class="text-[#666] font-bold">Home</a>
        <p class="text-white text-lg fony-bold hover:cursor-pointer">></p>
        <a href="contact-us.html" class="text-accent font-bold"> Contact us</a>
      </div>
  </div>
</section>
<!-- banner-section -->


    <!-- cards section -->
    <section>
      <div class="mt-16 mx-8 flex justify-center">
        <div class="flex flex-col lg:flex-row gap-6 lg:items-center">
          <!--  -->
          <div
            class="bg-[#f3f3f3] xl:h-[130px] lg:h-[170px] shadow-md rounded-md p-3"
          >
            <div class="flex flex-col justify-start sm:flex-row gap-4">
              <div class="flex justify-center">
                <div
                  class="w-20 h-20 rounded-full bg-accent flex justify-center items-center"
                >
                <img src="{{ asset('assets/images/contact/location-pin-svgrepo-com.svg') }}" 
                    class="w-10 h-10"
                    alt="Location Icon"
                  />
                </div>
              </div>

              <div class="flex flex-col items-center sm:items-start space-y-3">
                <p class="text-2xl font-bold">Our Location</p>
                <p class="text-[#666]">
                  Bagdurbar, Sundhara (Near to China Town Gate) Kathmandu Nepal
                </p>
              </div>
            </div>
          </div>
          <!--  -->
          <div
            class="bg-[#f3f3f3] lg:h-[170px] xl:h-[130px] shadow-md rounded-md p-3"
          >
            <div class="flex flex-col justify-start sm:flex-row gap-4">
              <div class="flex justify-center">
                <div
                  class="w-20 h-20 rounded-full bg-accent flex justify-center items-center"
                >
                <img src="{{ asset('assets/images/contact/mail-svgrepo-com.png') }}" 

                    class="w-10 h-10"
                    alt=""
                  />
                </div>
              </div>
              <div class="flex flex-col items-center sm:items-start space-y-3">
                <p class="text-2xl font-bold">Email us</p>
                <p class="text-[#666]">
                  info@hulasremittance.com,<br class="block sm:hidden" />
                  csc@hulasremittance.com
                </p>
              </div>
            </div>
          </div>
          <!--  -->
          <div
            class="bg-[#f3f3f3] lg:h-[170px] xl:h-[130px] Fshadow-md rounded-md p-3"
          >
            <div class="flex flex-col justify-start sm:flex-row gap-4">
              <div class="flex justify-center">
                <div
                  class="w-20 h-20 rounded-full bg-accent flex justify-center items-center"
                >
                <img src="{{ asset('assets/images/contact/phone-svgrepo-com.svg') }}" 

                    class="w-12 h-12"
                    alt=""
                  />
                </div>
              </div>
              <div class="flex flex-col items-center sm:items-start space-y-3">
                <p class="text-2xl font-bold">Call us</p>
                <p class="text-[#666]">
                  +977 1 5361313, 5358225, 5352008
                  <br class="hidden sm:block" />Toll Free Number 16600 111222
                  (For NTC Users Only)
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- cards section -->

    <!-- map section -->
    <section>
      <div class="mt-16 flex justify-center w-full">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6111886008625!2d85.31059677522961!3d27.698409576187725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18534e533eaf%3A0x4fec1318777796b7!2sHulas%20Remittance%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1698921349849!5m2!1sen!2snp"
          class="w-full lg:h-[500px]"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    <!-- map section -->

    <!-- contact form  -->
    <section class="m-10">
      <div class="mt-16 mx-10 sm:m-20">
        <div class="flex flex-col space-y-6 justify-center items-center">
          <h3 class="text-xl lg:text-3xl font-extrabold text-accent">
            Get in touch with us.
          </h3>
          <p
            class="max-w-sm lg:max-w-none text-black text-xl lg:border-b-2 lg:border-accent"
          >
            Fill up the form and our team will get back to you within 24 hours.
          </p>
        </div>
      </div>
      <div class="lg:flex lg:justify-center lg:mt-32 w-full">
        <img src="./img/contact-form-bg.png" class="h-full" alt="" />
        <div class="lg:w-[70%] bg-white shadow-xl rounded-md p-6">
          <form class="sm:mx-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
              <div class="flex flex-col space-y-5">
                <label for="name" class="font-bold text-xl text-[#3d5169]"
                  >Name</label
                >
                <input
                  id="name"
                  type="text"
                  placeholder="What's your name?"
                  class="w-full rounded-md bg-[#f5faff]"
                />
              </div>
              <div class="flex flex-col space-y-5">
                <label for="email" class="font-bold text-xl text-[#3d5169]"
                  >Email</label
                >
                <input
                  id="email"
                  type="email"
                  placeholder="What's your email?"
                  class="w-full rounded-md bg-[#f5faff]"
                />
              </div>
              <div class="flex flex-col space-y-5">
                <label for="phone" class="font-bold text-xl text-[#3d5169]"
                  >Phone</label
                >
                <input
                  id="phone"
                  type="tel"
                  placeholder="Enter your phone"
                  class="w-full rounded-md bg-[#f5faff]"
                />
              </div>
              <div class="flex flex-col space-y-5">
                <label for="service" class="font-bold text-xl text-[#3d5169]"
                  >Service interested in</label
                >
                <input
                  id="service"
                  type="text"
                  placeholder="ex. Remittance"
                  class="w-full rounded-md bg-[#f5faff]"
                />
              </div>
            </div>
            <div class="mt-5 flex flex-col space-y-4">
              <label for="query" class="font-bold text-xl text-[#3d5169]"
                >Message</label
              >
              <textarea
                name="query"
                id="query"
                cols="20"
                rows="10"
                class="bg-[#f5faff] rounded-md"
                placeholder="Please enter your message..."
              ></textarea>
            </div>
            <div class="w-full flex justify-center">
              <button
                type="submit"
                class="w-44 text-center bg-black text-white hover:text-accent py-3 px-5 rounded-xl cursor-pointer tracking-wide m-3"
              >
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- contact form  -->
@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
