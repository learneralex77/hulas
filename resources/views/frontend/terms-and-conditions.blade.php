@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
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
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">Terms & Conditions</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route("contactUs") }}" class="text-accent font-bold"> Terms and Conditions</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->
        <div class="mx-6 md:m-10 lg:mx-20 xl:mx-40">

            <div class="p-8 text-justify mx-auto bg-white">
                <h1 class="text-2xl  font-bold mb-4 ">Terms and Conditions</h1>
                <hr class="border-accent">

                <h2 class="text-xl font-semibold mt-6"> <span class="text-accent  mr-2">➜</span>Introduction</h2>
                <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores cupiditate rem eum vel,
                    exercitationem quidem hic tempore suscipit, quibusdam dolorum necessitatibus voluptatibus enim molestias
                    deserunt fugit in ab. Veritatis, ex?</p>

                <h2 class="text-xl font-semibold mt-6"> <span class="text-accent text-xl mr-2">➜</span>Use of the Website
                </h2>
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque consequuntur tempore modi
                    natus
                    maiores officia velit omnis. Quisquam, minus, minima ipsa saepe ipsum necessitatibus expedita illo ex,
                    explicabo
                    officia inventore?</p>

                <h2 class="text-xl font-semibold mt-6"> <span class="text-accent text-xl mr-2">➜</span>Intellectual Property
                </h2>
                <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam quidem tenetur explicabo
                    recusandae, ad nulla natus magni corporis? Molestiae nihil, minima nulla ratione assumenda quidem
                    officia
                    exercitationem cum ad repudiandae!</p>

                <h2 class="text-xl font-semibold mt-6"> <span class="text-accent text-xl mr-2">➜</span>Limitation of
                    Liability</h2>
                <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam, necessitatibus vero dolores
                    fuga
                    quo
                    cumque iste similique odio voluptatibus eligendi facere nihil dicta mollitia corporis sit possimus ipsa
                    libero
                    aliquid!</p>

                <h2 class="text-xl font-semibold mt-6"> <span class="text-accent text-xl mr-2">➜</span>Changes to Terms</h2>
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus veniam vero
                    perspiciatis
                    rem
                    voluptates quas mollitia molestias tempore iure fugit similique a, quae architecto harum! Doloribus
                    ipsum
                    dolore
                    animi. Ad?</p>

                <h2 class="text-xl font-semibold mt-6"> <span class="text-accent text-xl mr-2">➜</span>Contact Us</h2>
                <p class="mt-2">If you have any questions about these Terms and Conditions, please contact us at <a
                        href="mailto:support@example.com" class="text-blue-600 underline">support@example.com</a>.</p>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
@endpush