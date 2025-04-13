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
      <h3 class="text-4xl font-extrabold text-white">Message from the director</h3>
      <div class="flex space-x-5 items-center">
        <a href="index.html" class="text-white font-bold">Home</a>
        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
        <a href="messsage-from-director" class="text-accent font-bold"> Message from the director</a>
      </div>
  </div>
</section>
<!-- banner-section -->

    <!-- Main Container -->

    <div class="container mx-auto px-6 md:px-16 lg:px-24 py-12">

        <!-- Content Wrapper -->
        <div class="bg-white rounded-lg p-8 md:p-12 flex flex-col md:flex-row items-center gap-6">
            <div class="flex flex-col lg:flex-row">
                <!-- Director's Image -->
                <div class="">
                    <img src="https://www.1stformationsblog.co.uk/wp-content/uploads/2022/09/Shutterstock_1361250623-2.jpg"
                        alt="Director Image" class="md:w-2xl lg:w-full" rounded-lg />
                    <hr class="w-full border-t-4 border-accent mt-4" />
                </div>

                <!-- Director's Message -->
                <div class="lg:pl-10 text-base">
                    <!-- Header -->
                    <p class="text-gray-700 mt-4 lg:text-justify leading-relaxed w-full md:w-full">
                        It is my pleasure to welcome you to our organization. Our
                        commitment to excellence, innovation, and integrity drives
                        everything we do. With a dedicated team and a vision for the
                        future, we strive to create meaningful impact in our industry.
                    </p>
                    <p class="text-gray-700 mt-4 text-justify leading-relaxed">
                        We value your trust and support as we continue on this journey.
                        Thank you for being part of our story.
                    </p>
                    <br />
                    <p class="text-gray-800 font-bold">John Doe</p>
                    <p class="text-gray-600">Hulas Remittance</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Container -->

@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
