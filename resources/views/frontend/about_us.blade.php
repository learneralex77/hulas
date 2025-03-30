<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Hulas Remittance</title>
  </head>
  <body>
    <header class="sticky -top-0 lg:-top-16 z-50">
      <!---------- top-nav ---------->
      <nav class="hidden w-full py-2 bg-bgprimary border-b-2 px-10 lg:block">
        <div class="w-full p-2 flex justify-between items-center">
          <!-- address, toll free -->
          <div class="flex space-x-8 items-center">
            <div class="flex space-x-3 items-center">
              <img
                src="public/images/navbar/location-icon.png"
                class="w-5"
                alt=""
              />
              <p class="text-xs">
                Bagdurbar, Sundhara (Near to China Town Gate) Kathmandu, Nepal
              </p>
            </div>
            <div class="flex space-x-3 items-center">
              <img
                src="public/images/navbar/phone-call-icon.png"
                class="w-5"
                alt=""
              />
              <p class="text-xs">
                +977 1 5361313, 5358225, 5352008, Toll Free Number: 16600 111222
                (For NTC Users Only)
              </p>
            </div>
            <div class="flex space-x-3 items-center">
              <img
                src="public/images/navbar/mail-icon.png"
                class="w-5"
                alt=""
              />
              <p class="text-xs">
                info@hulasremittance.com, csc@hulasremittance.com
              </p>
            </div>
          </div>
          <!-- social -->
          <div class="flex space-x-5 items-center">
            <a href="#"
              ><img
                src="public/images/navbar/fb-icon.png"
                class="w-4"
                alt="facebook Icon"
            /></a>
            <a href="#"
              ><img
                src="public/images/navbar/x-icon.png"
                class="w-4"
                alt="X Icon"
            /></a>
            <a href="#"
              ><img
                src="public/images/navbar/linked-in-icon.png"
                class="w-4"
                alt="Linkedin Icon"
            /></a>
            <a href="#"><img src="" class="w-4" alt="" /></a>
          </div>
        </div>
      </nav>
      <!---------- top-nav ---------->

      <!---------- bottom-nav ---------->
      <nav
        class="relative px-4 pr-8 py-4 flex justify-between items-center bg-white shadow-lg"
      >
        <a class="text-xl lg:pl-10 font-bold leading-none" href="index.html">
          <img
            src="public/images/logo/hulas-remittance-logo.jpg"
            class="w-56"
            alt="Hulas Remittance Logo"
          />
        </a>

        <div class="hidden lg:block">
          <ul class="flex">
            <li class="mb-1">
              <a
                class="block p-4 text-sm font-semibold text-black hover:text-[#ffdd00] rounded"
                href="#"
                >Home</a
              >
            </li>
            <li class="mb-1">
              <a
                class="block p-4 text-sm font-semibold text-black hover:text-[#ffdd00] rounded"
                href="#about_us"
                >About Us</a
              >
            </li>
            <li class="mb-1">
              <a
                class="block p-4 text-sm font-semibold text-black hover:text-[#ffdd00] rounded"
                href="#become_agent"
                >Become an Agent</a
              >
            </li>
            <li class="mb-1">
              <a
                class="block p-4 text-sm font-semibold text-black hover:text-[#ffdd00] rounded"
                href="agent-list.html"
                >Find an Agent</a
              >
            </li>
            <li class="mb-1">
              <a
                class="block p-4 text-sm font-semibold text-black hover:text-[#ffdd00] rounded"
                href="#gallery"
                >Gallery</a
              >
            </li>
            <li class="mb-1">
              <a
                class="block p-4 text-sm font-semibold text-black hover:text-[#ffdd00] rounded"
                href="#contact_p"
                >Contact</a
              >
            </li>
          </ul>
        </div>
        <div class="lg:hidden">
          <button class="navbar-burger flex items-center text-[#ffdd00] p-3">
            <svg
              class="block h-6 w-6 fill-current"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <title>Mobile menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
          </button>
        </div>
      </nav>
      <!---------- bottom-nav ---------->
      <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
          class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto"
        >
          <div class="flex items-center mb-8">
            <a class="mr-auto text-lg font-bold leading-none" href="index.html">
              <img
                src="public/images/logo/hulas-remittance-logo.jpg"
                class="w-40"
                alt=""
              />
            </a>
            <button class="navbar-close">
              <svg
                class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                ></path>
              </svg>
            </button>
          </div>
          <div>
            <ul>
              <li class="mb-1">
                <a
                  class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded"
                  href="index.html"
                  >Home</a
                >
              </li>
              <li class="mb-1">
                <a
                  class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded"
                  href="#about_us"
                  >About Us</a
                >
              </li>

              <li class="mb-1">
                <a
                  class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded"
                  href="#become_agent"
                  >Become an Agent</a
                >
              </li>
              <li class="mb-1">
                <a
                  class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded"
                  href="#gallery"
                  >Gallery</a
                >
              </li>
              <li class="mb-1">
                <a
                  class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded"
                  href="#contact_p"
                  >Contact</a
                >
              </li>
              <li class="mb-1">
                <a
                  href="https://www.westernunion.com/us/en/send-money/app/price-estimator"
                  target="_blank"
                  class="block p-4 text-sm font-semibold text-accent rounded"
                >
                  Our Fees
                </a>
              </li>
              <li class="mb-1">
                <a
                  href="https://www.westernunion.com/us/en/send-money-to-nepal.html"
                  target="_blank"
                  class="block p-4 text-sm font-semibold text-accent rounded"
                  >Forex Rates
                </a>
              </li>
            </ul>
          </div>
          <div class="mt-auto">
            <div class="flex justify-end">
              <img
                src="public/img/Logo/WesternUnion_HorizontalLockup_YellowBlack.png"
                class="w-44 h-5"
                alt=""
              />
            </div>
          </div>
        </nav>
      </div>
    </header>
   <!----------Slider---------->

<div id="default-carousel" class="relative w-full" data-carousel="slide">
  <!-- Carousel wrapper -->
  <div class="relative h-80 overflow-hidden rounded-lg md:h-96">
    <!-- Item 1 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img
        src="public/images/slider/silder-one.jpg"
        class="absolute block w-full h-full object-cover"
        alt="..."
      />
    </div>
    <!-- Item 2 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img
        src="public/images/slider/slider-two.jpg"
        class="absolute block w-full h-full object-cover"
        alt="..."
      />
    </div>
    <!-- Item 3 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img
        src="public/images/slider/slider-three.jpg"
        class="absolute block w-full h-full object-cover"
        alt="..."
      />
    </div>
  </div>
  <!-- Slider indicators -->
  <div
    class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse"
  >
    <button
      type="button"
      class="w-3 h-3 rounded-full"
      aria-current="true"
      aria-label="Slide 1"
      data-carousel-slide-to="0"
    ></button>
    <button
      type="button"
      class="w-3 h-3 rounded-full"
      aria-current="false"
      aria-label="Slide 2"
      data-carousel-slide-to="1"
    ></button>
    <button
      type="button"
      class="w-3 h-3 rounded-full"
      aria-current="false"
      aria-label="Slide 3"
      data-carousel-slide-to="2"
    ></button>
  </div>
  <!-- Slider controls -->
  <button
    type="button"
    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
    data-carousel-prev
  >
    <span
      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
    >
      <svg
        class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 6 10"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M5 1 1 5l4 4"
        />
      </svg>
      <span class="sr-only">Previous</span>
    </span>
  </button>
  <button
    type="button"
    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
    data-carousel-next
  >
    <span
      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
    >
      <svg
        class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 6 10"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="m1 9 4-4-4-4"
        />
      </svg>
      <span class="sr-only">Next</span>
    </span>
  </button>
</div>

<!----------Slider---------->

    <div id="app"></div>
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<!-- 1st edit  -->
    <!-- About Us -->

    <section>
      <!-- About Hulas Remittance -->
      <div class="m-10 flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:space-x-8">
        <!-- Image Section for Hulas Remittance (left on large screens) -->
        <img
          src="public/images/about-us/about-img-1.webp"
          class="w-full md:w-1/2 rounded-2xl"
          alt=""
        />
    
        <!-- Text Container for Hulas Remittance -->
        <div class="md:w-1/2 flex flex-col space-y-6">
          <h2 class="text-xl font-bold text-black md:text-4xl">
            About Hulas Remittance
          </h2>
          <p class="text-lg text-black">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi
            temporibus incidunt nostrum, perspiciatis magni nisi error
            reiciendis aperiam quo alias consectetur non blanditiis impedit?
            Perferendis facere labore explicabo aspernatur consequuntur?
          </p>
    
          <!-- Years of experience -->
          <div class="flex flex-col items-center space-y-4 border-b-2 pb-4 lg:space-y-0 lg:flex-row lg:space-x-4">
            <div class="py-4 md:px-3 w-80 bg-black rounded-xl">
              <div class="flex justify-center items-center flex-col space-y-4">
                <p class="text-[#ffdd00] font-bold text-2xl">49+</p>
                <p class="text-[#ffdd00] text-center text-lg">Years Experience</p>
              </div>
            </div>
          </div>
    
         <!-- Social Media links -->
<div>
  <div class="flex space-x-2">
    <!-- Facebook -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-[#ffdd00] rounded-full hover:cursor-pointer hover:bg-[#ffdd00] transition ease-in-out duration-200">
      <a href="https://www.facebook.com/Nationalinsuranceindia/">
        <svg class="w-8 h-8 text-[#ffdd00]" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22,12A10,10 0 1,0 12,22V14H10V12H12V10C12,8.3 13.3,7 15,7H17V9H15C14.4,9 14,9.4 14,10V12H17V14H14V22A10,10 0 0,0 22,12Z"/>
        </svg>
      </a>
    </div>
    
    <!-- Instagram -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-[#ffdd00] rounded-full hover:cursor-pointer hover:bg-[#ffdd00] transition ease-in-out duration-200">
      <a href="https://www.instagram.com/">
        <svg class="w-8 h-8 text-[#ffdd00]" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7,2A5,5 0 0,0 2,7V17A5,5 0 0,0 7,22H17A5,5 0 0,0 22,17V7A5,5 0 0,0 17,2H7M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M19,5A1,1 0 0,1 20,6A1,1 0 0,1 19,7A1,1 0 0,1 18,6A1,1 0 0,1 19,5Z"/>
        </svg>
      </a>
    </div>

    <!-- Twitter -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-[#ffdd00] rounded-full hover:cursor-pointer hover:bg-[#ffdd00] transition ease-in-out duration-200">
      <a href="https://twitter.com/">
        <svg class="w-8 h-8 text-[#ffdd00]" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22.46,6A8.06,8.06 0 0,1 20.84,7.4C21.44,6.86 21.92,6.18 22.22,5.39C21.5,5.81 20.7,6.11 19.86,6.28A4.07,4.07 0 0,0 17.3,4.75C15.57,4.75 14.17,6.15 14.17,7.89A4.38,4.38 0 0,0 14.3,8.68A11.61,11.61 0 0,1 3.15,5.34A4.09,4.09 0 0,0 3.84,10.33C3.23,10.31 2.67,10.11 2.19,9.81V9.89A4.07,4.07 0 0,0 5.35,13.87A4.28,4.28 0 0,1 4.4,14.09A3.89,3.89 0 0,1 3.89,14A4.07,4.07 0 0,0 7.55,17.43A8.15,8.15 0 0,1 2,19.47A7.89,7.89 0 0,1 1,19.41A11.55,11.55 0 0,0 7.29,21C15.55,21 20.18,14.5 20.18,8.93V8.5A7.88,7.88 0 0,0 22.46,6Z"/>
        </svg>
      </a>
    </div>

    <!-- LinkedIn -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-[#ffdd00] rounded-full hover:cursor-pointer hover:bg-[#ffdd00] transition ease-in-out duration-200">
      <a href="https://www.linkedin.com/">
        <svg class="w-8 h-8 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
          <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M8.35,18.35H5.64V9H8.35M7,7.78A1.56,1.56 0 0,1 5.43,6.22A1.57,1.57 0 0,1 7,4.65A1.56,1.56 0 0,1 8.57,6.22A1.57,1.57 0 0,1 7,7.78M18.35,18.35H15.64V13.19C15.64,11.72 15.64,9.9 13.71,9.9C11.78,9.9 11.5,11.41 11.5,13.08V18.35H8.79V9H11.39V10.45H11.44A2.92,2.92 0 0,1 14,8.9C17.12,8.9 18.35,10.79 18.35,13.5Z"/>
        </svg>
      </a>
    </div>
  </div>
</div>
        </div>
      </div>
    </section>
    
    <section>
      <div class="m-10 flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:space-x-8">
        <!-- Image Section for Western Union (right on large screens) -->
        <img
          src="public/images/about-us/about-img-2.webp"
          class="w-full md:w-1/2 rounded-2xl lg:order-2"
          alt=""
        />
    
        <!-- Text Container for Western Union (content left) -->
        <div class="md:w-1/2 flex flex-col space-y-6 lg:order-1">
          <h2 class="text-xl font-bold text-black md:text-4xl">
            About Western Union
          </h2>
          <p class="text-lg text-black">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate
            ipsum, quam, laborum vel dolores eaque autem sunt officiis, earum
            architecto odit voluptatibus magni ab iusto aspernatur ullam id
            optio amet.
          </p>
    
          <!-- Years of experience -->
          <div class="flex flex-col items-center space-y-4 border-b-2 pb-4 lg:space-y-0 lg:flex-row lg:space-x-4">
            <div class="py-4 md:px-3 w-80 bg-black rounded-xl">
              <div class="flex justify-center items-center flex-col space-y-4">
                <p class="text-[#ffdd00] font-bold text-2xl">49+</p>
                <p class="text-[#ffdd00] text-center text-lg">Years Experience</p>
              </div>
            </div>
          </div>
                    <!-- Social Media links -->
<div>
  <div class="flex space-x-2">
    <!-- Facebook -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-yellow-300 rounded-full hover:cursor-pointer hover:bg-yellow-300 transition ease-in-out duration-200">
      <a href="https://www.facebook.com/Nationalinsuranceindia/">
        <svg class="w-8 h-8 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22,12A10,10 0 1,0 12,22V14H10V12H12V10C12,8.3 13.3,7 15,7H17V9H15C14.4,9 14,9.4 14,10V12H17V14H14V22A10,10 0 0,0 22,12Z"/>
        </svg>
      </a>
    </div>
    
    <!-- Instagram -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-yellow-300 rounded-full hover:cursor-pointer hover:bg-yellow-300 transition ease-in-out duration-200">
      <a href="https://www.instagram.com/">
        <svg class="w-8 h-8 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7,2A5,5 0 0,0 2,7V17A5,5 0 0,0 7,22H17A5,5 0 0,0 22,17V7A5,5 0 0,0 17,2H7M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M19,5A1,1 0 0,1 20,6A1,1 0 0,1 19,7A1,1 0 0,1 18,6A1,1 0 0,1 19,5Z"/>
        </svg>
      </a>
    </div>

    <!-- Twitter -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-yellow-300 rounded-full hover:cursor-pointer hover:bg-yellow-300 transition ease-in-out duration-200">
      <a href="https://twitter.com/">
        <svg class="w-8 h-8 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22.46,6A8.06,8.06 0 0,1 20.84,7.4C21.44,6.86 21.92,6.18 22.22,5.39C21.5,5.81 20.7,6.11 19.86,6.28A4.07,4.07 0 0,0 17.3,4.75C15.57,4.75 14.17,6.15 14.17,7.89A4.38,4.38 0 0,0 14.3,8.68A11.61,11.61 0 0,1 3.15,5.34A4.09,4.09 0 0,0 3.84,10.33C3.23,10.31 2.67,10.11 2.19,9.81V9.89A4.07,4.07 0 0,0 5.35,13.87A4.28,4.28 0 0,1 4.4,14.09A3.89,3.89 0 0,1 3.89,14A4.07,4.07 0 0,0 7.55,17.43A8.15,8.15 0 0,1 2,19.47A7.89,7.89 0 0,1 1,19.41A11.55,11.55 0 0,0 7.29,21C15.55,21 20.18,14.5 20.18,8.93V8.5A7.88,7.88 0 0,0 22.46,6Z"/>
        </svg>
      </a>
    </div>

    <!-- LinkedIn -->
    <div class="flex items-center justify-center w-16 h-16 border-2 border-yellow-300 rounded-full hover:cursor-pointer hover:bg-yellow-300 transition ease-in-out duration-200">
      <a href="https://www.linkedin.com/">
        <svg class="w-8 h-8 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
          <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M8.35,18.35H5.64V9H8.35M7,7.78A1.56,1.56 0 0,1 5.43,6.22A1.57,1.57 0 0,1 7,4.65A1.56,1.56 0 0,1 8.57,6.22A1.57,1.57 0 0,1 7,7.78M18.35,18.35H15.64V13.19C15.64,11.72 15.64,9.9 13.71,9.9C11.78,9.9 11.5,11.41 11.5,13.08V18.35H8.79V9H11.39V10.45H11.44A2.92,2.92 0 0,1 14,8.9C17.12,8.9 18.35,10.79 18.35,13.5Z"/>
        </svg>
      </a>
    </div>
  </div>
</div>
        </div>
      </div>
    </section>

    <!-- Services We provide section -->
    <section class="mt-12 items-center">
      <h3 class="ml-10 text-black text-4xl font-bold mb-4">Service We provide</h3>
      <div
        class="relative flex items-center justify-center bg-gray-100 h-[60vh]"
      >
        <button
          class="absolute left-0 top-1/2 transform -translate-y-1/2 text-xl text-gray-600 bg-transparent border-none cursor-pointer z-10"
          onclick="prevSlide()"
        >
          ❮
        </button>
        <div
          class="overflow-hidden rounded-lg h-[300px] md:h-[400px] lg:h-[450px] w-full"
        >
          <div
            class="flex transition-transform duration-500 ease-in-out"
            id="slider-content"
          >
            <div
              class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-white rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card"
            >
              <div class="flex flex-col items-center">
                <img
                  src="https://media.istockphoto.com/id/1333428875/photo/fire-insurance-concept-burning-small-wooden-house.jpg?s=612x612&w=0&k=20&c=eri3sWqqRhMaJfh81nrVmaS4hVrW4-9K7eTexu3eY9s="
                  alt="Property Insurance"
                  class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto"
                />
                <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                  Property Insurance
                </h3>
              </div>
              <p class="text-xs md:text-sm text-black mt-4 text-center">
                Safeguards property owners against losses and damages providing
                compensation for the repair or replacement of the insured assets
              </p>
              <a
                href="https://nicnepal.com.np/insurance/property-insurance"
                class="text-[#008391] mt-4 tracking-widest text-center"
                >Read More</a
              >
            </div>
            <div
              class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-white rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card"
            >
              <div class="flex flex-col items-center">
                <img
                  src="https://ebeema.com:1001/api/documentManagement/file?key=MjAyM1wwMVwwOFwtbW90b3ItaW5zdXJhbmNlX2JlNDAucG5n"
                  alt="Vehicle Insurance"
                  class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto"
                />
                <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                  Vehicle Insurance
                </h3>
              </div>
              <p class="text-xs md:text-sm text-black mt-4 text-center">
                Provides coverage for vehicles against losses and liabilities,
                offering protection in case of accidents or unforeseen events.
              </p>
              <a
                href="https://nicnepal.com.np/insurance/vehicle-insurance"
                class="text-[#008391] mt-4 tracking-widest text-center"
                >Read More</a
              >
            </div>
            <div
              class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-white rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card"
            >
              <div class="flex flex-col items-center">
                <img
                  src="https://nicnepal.com.np/national-insurance/public/./img/marine.jpg"
                  alt="Marine Insurance"
                  class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto"
                />
                <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                  Marine Insurance
                </h3>
              </div>
              <p class="text-xs md:text-sm text-black mt-4 text-center">
                Protects against financial losses related to maritime activities
                by providing coverage for waterborne assets during transit.
              </p>
              <a
                href="https://nicnepal.com.np/insurance/marine-insurance"
                class="text-black mt-4 tracking-widest text-center"
                >Read More</a
              >
            </div>
            <div
              class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-white rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card"
            >
              <div class="flex flex-col items-center">
                <img
                  src="https://nicnepal.com.np/national-insurance/public/img/miscellaneous.jpg"
                  alt="Miscellaneous  Insurance"
                  class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto"
                />
                <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                  Miscellaneous Insurance
                </h3>
              </div>
              <p class="text-xs md:text-sm text-black mt-4 text-center">
                Encompasses a diverse range of coverage options beyond
                traditional categories, offering financial protection for
                various risks.
              </p>
              <a
                href="https://nicnepal.com.np/insurance/miscellaneous-insurance"
                class="text-black mt-4 tracking-widest text-center"
                >Read More</a
              >
            </div>
            <div
              class="flex-none w-[280px] md:w-[300px] lg:w-[380px] h-[360px] md:h-[400px] lg:h-[457px] bg-white rounded-lg shadow-lg mx-2 p-4 flex flex-col justify-between review-card"
            >
              <div class="flex flex-col items-center">
                <img
                  src="https://media.licdn.com/dms/image/C4D12AQF3vYqQRpFaOw/article-cover_image-shrink_600_2000/0/1651676674940?e=2147483647&v=beta&t=BGSpmlC6Q9rQ_vYOqaHnUxgZf5krVGvmXpKR4OomyCU"
                  alt="Engineering Insurance"
                  class="h-[120px] md:h-[140px] lg:h-[160px] mx-auto"
                />
                <h3 class="text-sm md:text-lg font-medium mt-4 text-center">
                  Engineering Insurance
                </h3>
              </div>
              <p class="text-xs md:text-sm text-black mt-4 text-center">
                Specialized risk management solution that provides coverage for
                the unique challenges and potential financial losses
              </p>
              <a
                href="https://nicnepal.com.np/insurance/engineering-insurance"
                class="text-black mt-4 tracking-widest text-center"
                >Read More</a
              >
            </div>

            <!-- Add more review-card divs as needed -->
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
<!-- Map  -->
<div class="w-full lg:w-full">
  <div class="p-4 bg-[#f4f4f4] flex flex-col lg:w-full">
    <!-- Location Title on the Left -->
    <h3 class="ml-10 text-black text-4xl font-bold mb-4">Location</h3>

    <div class="w-full">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6111886008625!2d85.31059677522961!3d27.698409576187725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18534e533eaf%3A0x4fec1318777796b7!2sHulas%20Remittance%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1698921349849!5m2!1sen!2snp"
        class="w-full h-[400px] block" style="border: 0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>

<!-- Section with black background -->
<div class="bg-black py-4">
  <!-- Section Breaker -->
  <hr class="my-10 border-t-2 border-gray-300">

  <!-- Find an Agent -->
  <div class="flex justify-center">
    <button class="bg-yellow-300 text-black px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-400">
      Find an Agent
    </button>
  </div>
</div>
  </div>
    </section>
  </body>
</html>
