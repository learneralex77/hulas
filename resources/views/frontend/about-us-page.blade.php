@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

    <section class="m-6 sm:m-8 2xl:mx-30">
        <!-- About Hulas Remittance -->
        <div class="m-10 flex flex-col gap-6 md:flex-row  md:justify-center md:items-center">
            <!-- image -->
            <div class="flex-1 flex justify-center w-full">
                <img src="/images/about-us/about-img-1.webp" class="rounded-2xl object-cover w-full" alt="About Us Image" />
            </div>

            <!-- Text Container -->
            <div class="flex flex-2 flex-col space-y-3">
                <h2 class="text-xl lg:text-2xl font-bold text-black ">
                    @isset($aboutUs)
                    {{ $aboutUs->title }}
                </h2>
                <div class="text-lg text-primary">
                    
                    <p> {{ $aboutUs->description }}</p>
                    <!-- <p>Hulas Remittance, being one of the principal agents, playing a leading role in offering money
                        transfer services of The Western Union Company in Nepal since January 2006. We have been serving
                        customers from more than 3,200 (comprising of major commercial banks, Development Banks, Finance
                        Companies and cooperative organizations) locations have established brand promise of Western Union
                        as a fast, reliable and convenient way of remittance service across the country.</p> -->
                </div>
                <!-- Years of experience -->
                <div class="flex flex-col items-center space-y-3 lg:space-y-0 lg:flex-row lg:space-x-4">
                    <div class="w-60 bg-black rounded-xl flex justify-center items-center flex-col space-y-4 p-3">
                        <p class="text-accent font-bold text-2xl">49+</p>
                        <p class="text-accent text-center text-lg">
                            {{ $aboutUs->years_of_experience }}
                        </p>
                    </div>
                </div>
                <hr class="mr-5 text-gray-400 font-semibold" />

                <!-- Social Media links -->
                <div>
                    <div class="flex flex-row gap-4 mx-3">
                        <!-- Facebook -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('images/social-media-icons/facebook-black.svg') }}" alt="Facebook Icon"
                                    class="w-6 h-6">
                            </a>
                        </div>
                        <!-- Years of experience -->
                        <div class="flex flex-col items-center space-y-3 lg:space-y-0 lg:flex-row lg:space-x-4">
                            <div
                                class="w-60 md:w-40 lg:w-60 bg-black rounded-xl flex justify-start lg:justify-center items-center flex-col space-y-2 lg:space-y-4 p-3">
                                <p class="text-accent font-bold text-2xl">49+</p>
                                <p class="text-accent text-center text-lg">
                                    {{ $aboutUs->years_of_experience }}
                                </p>
                            </div>
                        </div>
                        <hr class="mr-5 text-gray-400 font-semibold" />

                        <!-- Social Media links -->
                        <div>
                            <div class="flex flex-row gap-4 mx-3">
                                <!-- Facebook -->
                                <div
                                    class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                                    <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                        <img src="/images/social-media-icons/facebook-black.svg" alt="Facebook Icon"
                                            class="w-6 h-6">
                                    </a>
                                </div>

                                <!-- Instagram -->
                                <div
                                    class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                                    <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                        <img src="/images/social-media-icons/facebook-black.svg" alt="Facebook Icon"
                                            class="w-6 h-6">
                                    </a>
                                </div>


                                <!-- Twitter -->
                                <div
                                    class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                                    <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                        <img src="./public/images/social-media-icons/facebook-black.svg" alt="Facebook Icon"
                                            class="w-6 h-6">
                                    </a>
                                </div>


                                <!-- LinkedIn -->
                                <div
                                    class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                                    <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                        <img src="./public/images/social-media-icons/facebook-black.svg" alt="Facebook Icon"
                                            class="w-6 h-6">
                                    </a>
                                </div>

                            </div>
                    @endisset

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <section class="m-6 sm:m-10 md:m-20 lg:mx-30">
        <!-- About Western Union -->
        <div class="m-10 flex flex-col-reverse gap-6 lg:flex-row  md:justify-center md:items-center">
            <!-- Text Container -->
            <div class="flex flex-2 flex-col space-y-3">
                <h2 class="text-xl font-bold text-black md:text-4xl">
                    @isset($aboutUs1)
                    {{ $aboutUs1->title }}
                    @endisset
                </h2>
                <div class="text-lg text-primary">
                    <p> {{ $aboutUs1->description }}</p>
                </div>
                <!-- Years of experience -->
                <div class="flex flex-col items-center space-y-3 lg:space-y-0 lg:flex-row lg:space-x-4">
                    <div class="w-60 bg-black rounded-xl flex justify-center items-center flex-col space-y-4 p-3">
                        <p class="text-accent font-bold text-2xl">49+</p>
                        <p class="text-accent text-center text-lg">
                            {{ $aboutUs1->years_of_experience }}
                        </p>
                    </div>
                </div>
                <hr class="mr-5 text-gray-400 font-semibold" />

                <!-- Social Media links -->
                <div>
                    <div class="flex flex-row gap-4 mx-3">
                        <!-- Facebook -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('images/social-media-icons/facebook-black.svg') }}" alt="Facebook Icon"
                                    class="w-6 h-6">
                            </a>
                        </div>

                        <!-- Instagram -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('images/social-media-icons/facebook-black.svg') }}" alt="Facebook Icon"
                                    class="w-6 h-6">
                            </a>
                        </div>


                        <!-- Twitter -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('images/social-media-icons/facebook-black.svg') }}" alt="Facebook Icon"
                                    class="w-6 h-6">
                            </a>
                        </div>


                        <!-- LinkedIn -->
                        <div
                            class="flex items-center justify-center w-10 h-10 border-1 border-primary rounded-full hover:cursor-pointer transition ease-in-out duration-200">
                            <a href="https://www.facebook.com/Nationalinsuranceindia/">
                                <img src="{{ asset('images/social-media-icons/facebook-black.svg') }}" alt="Facebook Icon"
                                    class="w-6 h-6">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- image -->
            <div class="flex-1 flex justify-center m-6">
                <img src="{{ asset('images/about-us/about-img-1.webp') }}" class="rounded-2xl object-cover w-full" alt="" />
            </div>
        </div>
    </section>

    <!-- Services We provide section -->
    <section class="mt-12 items-center">
        <h3 class="ml-10 text-black text-4xl font-bold mb-4 flex justify-center">
            Services we provide
        </h3>
        <div class="relative flex items-center justify-center">
            <button
                class="absolute left-0 top-1/2 transform -translate-y-1/2 text-xl text-gray-600 bg-transparent border-none cursor-pointer z-10"
                onclick="prevSlide()">
                ❮
            </button>
            @isset($services)
            @foreach($services as $service)
            <div class="overflow-hidden rounded-lg h-[300px] md:h-[400px] lg:h-[450px] w-full">
                <div class="flex transition-transform duration-500 ease-in-out" id="slider-content">
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px]  bg-gray-50 rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                        <!-- https://media.istockphoto.com/id/1333428875/photo/fire-insurance-concept-burning-small-wooden-house.jpg?s=612x612&w=0&k=20&c=eri3sWqqRhMaJfh81nrVmaS4hVrW4-9K7eTexu3eY9s= -->
                            <img src="{{ asset('storage/' . $service->file) }}"
                                alt="Property Insurance" class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto" />
                            <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                           
                                   {{ $service->name }}

                                <!-- Property Insurance -->
                            </h3>
                        </div>
                        <p class="text-xs md:text-sm text-black mt-4 text-center">
                            {{ $service->description }}

                            <!-- Safeguards property owners against losses and damages providing
                            compensation for the repair or replacement of the insured assets -->
                        </p>
                        <a href="#" class="text-[#008391] mt-4 tracking-widest text-center">Read More</a>
                    </div>
                    @endforeach
                    @endisset
                    <!-- <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-gray-50 rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://ebeema.com:1001/api/documentManagement/file?key=MjAyM1wwMVwwOFwtbW90b3ItaW5zdXJhbmNlX2JlNDAucG5n"
                                alt="Vehicle Insurance" class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto" />
                            <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                                Vehicle Insurance
                            </h3>
                        </div>
                        <p class="text-xs md:text-sm text-black mt-4 text-center">
                            Provides coverage for vehicles against losses and liabilities,
                            offering protection in case of accidents or unforeseen events.
                        </p>
                        <a href="#" class="text-[#008391] mt-4 tracking-widest text-center">Read More</a>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-gray-50 rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://nicnepal.com.np/national-insurance/public/./img/marine.jpg"
                                alt="Marine Insurance" class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto" />
                            <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                                Marine Insurance
                            </h3>
                        </div>
                        <p class="text-xs md:text-sm text-black mt-4 text-center">
                            Protects against financial losses related to maritime activities
                            by providing coverage for waterborne assets during transit.
                        </p>
                        <a href="#" class="text-black mt-4 tracking-widest text-center">Read More</a>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-gray-50 rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://nicnepal.com.np/national-insurance/public/img/miscellaneous.jpg"
                                alt="Miscellaneous  Insurance" class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto" />
                            <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                                Miscellaneous Insurance
                            </h3>
                        </div>
                        <p class="text-xs md:text-sm text-black mt-4 text-center">
                            Encompasses a diverse range of coverage options beyond
                            traditional categories, offering financial protection for
                            various risks.
                        </p>
                        <a href="#" class="text-black mt-4 tracking-widest text-center">Read More</a>
                    </div>
                    <div
                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-gray-50 rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card">
                        <div class="flex flex-col items-center">
                            <img src="https://media.licdn.com/dms/image/C4D12AQF3vYqQRpFaOw/article-cover_image-shrink_600_2000/0/1651676674940?e=2147483647&v=beta&t=BGSpmlC6Q9rQ_vYOqaHnUxgZf5krVGvmXpKR4OomyCU"
                                alt="Engineering Insurance" class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto" />
                            <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                                Engineering Insurance
                            </h3>
                        </div>
                        <p class="text-xs md:text-sm text-black mt-4 text-center">
                            Specialized risk management solution that provides coverage for
                            the unique challenges and potential financial losses
                        </p>
                        <a href="#" class="text-black mt-4 tracking-widest text-center">Read More</a>
                    </div>

                    <!-- Add more review-card divs as needed -->
                <!-- </div>
            </div>  -->
            <button
                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
                onclick="nextSlide()">
                ❯
            </button>
        </div>
        <h3 class="text-lg font-bold text-center">
          Miscellaneous Insurance
        </h3>
        <p class="text-base md:text-lg text-black text-center">
          Safeguards property owners against losses and damages providing
          compensation for the repair or replacement of the insured assets
        </p>
        <div class="flex justify-center ">
          <a
                          href="#"
                          class="bg-black text-white px-4 py-2 tracking-wide rounded-lg text-center"
                          >Read more</a
                        >
            
                        </div>
            </div>
      <div
      class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-50 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between review-card"
    >
      <div class="flex flex-col items-center">
        <img
        src="https://media.licdn.com/dms/image/C4D12AQF3vYqQRpFaOw/article-cover_image-shrink_600_2000/0/1651676674940?e=2147483647&v=beta&t=BGSpmlC6Q9rQ_vYOqaHnUxgZf5krVGvmXpKR4OomyCU"
        alt="Engineering Insurance"
          class="w-full h-[200px] rounded-lg"
        />
      </div>
      <h3 class="text-lg font-bold text-center">
        Engineering Insurance
      </h3>
      <p class="text-base md:text-lg text-black text-center">
        Safeguards property owners against losses and damages providing
        compensation for the repair or replacement of the insured assets
      </p>
      <div class="flex justify-center ">
        <a
                        href="#"
                        class="bg-black text-white px-4 py-2 tracking-wide rounded-lg text-center"
                        >Read more</a
                      >
          
                      </div>
        </div>
            
          </div>
        </div>
        <button
          class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
          onclick="nextSlide()"
        >
          ❯
        </button>
      </div>
    </section>



    <!-- Location -->
    <section>
        <div class="flex justify-center w-full">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6111886008625!2d85.31059677522961!3d27.698409576187725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18534e533eaf%3A0x4fec1318777796b7!2sHulas%20Remittance%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1698921349849!5m2!1sen!2snp"
                class="w-full lg:h-[500px]" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <div class="bg-black py-4">
        <!-- Section Breaker -->
        <hr class="my-10 border-t-2 border-gray-300" />

        <!-- Find an Agent -->
        <div class="flex justify-center">
            <button class="bg-yellow-300 text-black px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-400">
                Find an Agent
            </button>
        </div>
    </div>
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
@endpush