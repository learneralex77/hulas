@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')



    <!-- About Western Union -->
    <section class="m-6 md:m-10 2xl:mx-30">
        <div class=" flex flex-col gap-6 md:flex-row  md:justify-center md:items-center">
            <!-- image -->
            <div class="flex-1 flex justify-center w-full">
                <img src="{{ asset('assets/images/slider/slider-three.jpg') }}" alt="About Us Image"
                    class="w-full rounded-xl object-contain lg:object-fit" alt="About Us Image" />
            </div>

            <!-- Text Container -->
            <div class="flex md:flex-2 flex-col space-y-6">
                <h2 class="text-xl lg:text-2xl font-bold text-acccent ">
                    About Western Union
                </h2>
                <div class="text-lg">
                    <p> Hulas Remittance, a member company of Golchha Organization, was established in August 2005 with the
                        vision to bring in quality and reliable money transfer services in to Nepal. A leading business
                        house with a dedicated business history of more than 85 years, Golchha Organization has established
                        “HULAS” as one of the most trusted household consumer brands in the country.</p>
                </div>
                <!-- Years of experience -->
                <div class="flex flex-col items-center space-y-3 lg:space-y-0 lg:flex-row lg:space-x-4">
                    <div
                        class="w-60 md:w-40 lg:w-60 bg-black rounded-xl flex justify-start lg:justify-center items-center flex-col space-y-2 lg:space-y-4 p-3">
                        <p class="text-accent font-bold text-2xl">49+</p>
                        <p class="text-accent text-center text-lg">
                            Years Experience
                        </p>
                    </div>
                </div>
                <hr class="mr-5 text-gray-400 font-semibold" />

                <!-- Social Media links -->
                <div>
                    <div class="flex flex-row gap-4 mx-3">
                        <!-- Facebook -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('assets/images/social-media-icons/facebook-black.svg') }}"
                                    alt="Facebook Icon" class="w-6 h-6">
                            </a>
                        </div>

                        <!-- Linkdin -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('assets/images/social-media-icons/linkedin-svgrepo-com.svg') }}"
                                    alt="Linkdin Icon" class="w-4 h-4">
                            </a>
                        </div>


                        <!-- Twitter -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('assets/images/social-media-icons/icons8-x-50.png') }}"
                                    alt="Twitter Icon" class="w-5 h-5">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!----------Services Section---------->
    <section class="m-10 items-center">
        <div class="flex flex-col items-center space-y-6">
            <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
                                -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                              ">
                Services we provide
            </h1>
            <p class="text-2xl font-bold md:text-2xl lg:text-4xl text-center">
                Services </p>
            <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
                <!-- A leading business house with a dedicated business history of more than
                              85 years, Golchha Organization has established “HULAS” -->
            </p>
        </div>
        <div class="relative flex items-center justify-center">
            <button
                class="absolute left-0 top-1/2 transform -translate-y-1/2 text-xl text-gray-600 bg-transparent border-none cursor-pointer z-10"
                onclick="prevServicesSlider()">
                ❮
            </button>
            <div class="overflow-hidden rounded-lg w-full">
                <div class="flex flex-row gap-8 transition-transform duration-500 ease-in-out" id="services-slider-content">
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between services-review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://media.istockphoto.com/id/1333428875/photo/fire-insurance-concept-burning-small-wooden-house.jpg?s=612x612&w=0&k=20&c=eri3sWqqRhMaJfh81nrVmaS4hVrW4-9K7eTexu3eY9s="
                                alt="Property Insurance" class="w-full h-[200px] rounded-lg" />
                        </div>
                        <h3 class="text-lg font-bold text-center">Property Insurance</h3>
                        <p class="text-base md:text-lg text-black text-center">
                            Safeguards property owners against losses and damages providing
                            compensation for the repair or replacement of the insured assets
                        </p>
                        <div class="flex justify-center">
                            <a href="#" class="bg-black text-white px-4 py-2 tracking-wide rounded-full text-center">Read
                                more</a>
                        </div>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between services-review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://ebeema.com:1001/api/documentManagement/file?key=MjAyM1wwMVwwOFwtbW90b3ItaW5zdXJhbmNlX2JlNDAucG5n"
                                alt="Property Insurance" class="w-full h-[200px] rounded-lg" />
                        </div>
                        <h3 class="text-lg font-bold text-center">Property Insurance</h3>
                        <p class="text-base md:text-lg text-black text-center">
                            Safeguards property owners against losses and damages providing
                            compensation for the repair or replacement of the insured assets
                        </p>
                        <div class="flex justify-center">
                            <a href="#" class="bg-black text-white px-4 py-2 tracking-wide rounded-full text-center">Read
                                more</a>
                        </div>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://nicnepal.com.np/national-insurance/public/./img/marine.jpg"
                                alt="Property Insurance" class="w-full h-[200px] rounded-lg" />
                        </div>
                        <h3 class="text-lg font-bold text-center">Marine Insurance</h3>
                        <p class="text-base md:text-lg text-black text-center">
                            Safeguards property owners against losses and damages providing
                            compensation for the repair or replacement of the insured assets
                        </p>
                        <div class="flex justify-center">
                            <a href="#" class="bg-black text-white px-4 py-2 tracking-wide rounded-full text-center">Read
                                more</a>
                        </div>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://nicnepal.com.np/national-insurance/public/img/miscellaneous.jpg"
                                alt="Property Insurance" class="w-full h-[200px] rounded-lg" />
                        </div>
                        <h3 class="text-lg font-bold text-center">
                            Miscellaneous Insurance
                        </h3>
                        <p class="text-base md:text-lg text-black text-center">
                            Safeguards property owners against losses and damages providing
                            compensation for the repair or replacement of the insured assets
                        </p>
                        <div class="flex justify-center">
                            <a href="#" class="bg-black text-white px-4 py-2 tracking-wide rounded-full text-center">Read
                                more</a>
                        </div>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://media.licdn.com/dms/image/C4D12AQF3vYqQRpFaOw/article-cover_image-shrink_600_2000/0/1651676674940?e=2147483647&v=beta&t=BGSpmlC6Q9rQ_vYOqaHnUxgZf5krVGvmXpKR4OomyCU"
                                alt="Engineering Insurance" class="w-full h-[200px] rounded-lg" />
                        </div>
                        <h3 class="text-lg font-bold text-center">
                            Engineering Insurance
                        </h3>
                        <p class="text-base md:text-lg text-black text-center">
                            Safeguards property owners against losses and damages providing
                            compensation for the repair or replacement of the insured assets
                        </p>
                        <div class="flex justify-center">
                            <a href="#" class="bg-black text-white px-4 py-2 tracking-wide rounded-full text-center">Read
                                more</a>
                        </div>
                    </div>
                </div>
            </div>
            <button
                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
                onclick="nextServicesSlider()">
                ❯
            </button>
        </div>
    </section>
    <!----------Services Section---------->

    <!-- Section breaker -->
    <div
        class="flex flex-col lg:flex-row bg-accent  items-center justify-center gap-10  rounded-sm mx-6 my-10 md:m-10 lg:mx-20 px-10 py-10">
        <div class="flex flex-col gap-6 text-center">
            <h1 class="text-2xl lg:text-3xl font-extrabold tracking-wide">Subscribe to our NewsLetter</h1>
            <p class="line-clamp-2 text-lg lg:text-xl">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum,
                eligendi quis
                sed
                labore provident</p>
        </div>
        <button class="px-8 py-4 bg-black text-white rounded-full cursor-pointer text-center text-lg w-60">Find an
            agent</button>
    </div>
    <!-- Section breaker -->

@endsection


@push('scripts')
    <script>
        let currentIndex = 0;

        function nextSlide() {
            const sliderContent = document.getElementById("slider-content");
            const slides = document.querySelectorAll(".review-card");
            const totalSlides = slides.length;

            // Increment the index and move the slide, loop back to the first slide after the last one
            currentIndex = (currentIndex + 1) % totalSlides;
            const offset = -currentIndex * (slides[0].offsetWidth + 16); // 16px is the margin between cards

            sliderContent.style.transform = `translateX(${offset}px)`;
        }

        function prevSlide() {
            const sliderContent = document.getElementById("slider-content");
            const slides = document.querySelectorAll(".review-card");
            const totalSlides = slides.length;

            // Decrement the index and move the slide, loop back to the last slide after the first one
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            const offset = -currentIndex * (slides[0].offsetWidth + 16); // 16px is the margin between cards

            sliderContent.style.transform = `translateX(${offset}px)`;
        }
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush