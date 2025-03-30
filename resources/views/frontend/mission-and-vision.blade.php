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
              <img src="./images/navbar/location-icon.png" class="w-5" alt="" />
              <p class="text-xs">
                Bagdurbar, Sundhara (Near to China Town Gate) Kathmandu, Nepal
              </p>
            </div>
            <div class="flex space-x-3 items-center">
              <img
                src="./images/navbar/phone-call-icon.png"
                class="w-5"
                alt=""
              />
              <p class="text-xs">
                +977 1 5361313, 5358225, 5352008, Toll Free Number: 16600 111222
                (For NTC Users Only)
              </p>
            </div>
            <div class="flex space-x-3 items-center">
              <img src="./images/navbar/mail-icon.png" class="w-5" alt="" />
              <p class="text-xs">
                info@hulasremittance.com, csc@hulasremittance.com
              </p>
            </div>
          </div>
          <!-- social -->
          <div class="flex space-x-5 items-center">
            <a href="#"
              ><img
                src="./images/navbar/fb-icon.png"
                class="w-4"
                alt="facebook Icon"
            /></a>
            <a href="#"
              ><img src="./images/navbar/x-icon.png" class="w-4" alt="X Icon"
            /></a>
            <a href="#"
              ><img
                src="./images/navbar/linked-in-icon.png"
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
            src="./images/logo/hulas-remittance-logo.jpg"
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
    </header>
    <div class="container mx-auto px-6 md:px-16 lg:px-24 py-10 mt-5">
      <!-- Title -->
      <h1 class="text-3xl md:text-4xl font-bold text-yellow-400">
        Mission and Vision
      </h1>

      <!-- Content Wrapper -->
      <div
        class="flex flex-col lg:flex-row items-center lg:items-start mt-6 gap-8"
      >
        <!-- Left Content -->
        <div class="lg:w-2/3">
          <h2 class="text-2xl font-bold text-gray-800">
            Our Corporate Mission
          </h2>
          <p class="text-gray-700 mt-2">
            To provide accessible, affordable, and innovative general insurance
            solutions that safeguard the interests of individuals, businesses,
            and society, while upholding trust, transparency, and efficiency as
            a responsible enterprise.
          </p>

          <h2 class="text-2xl font-bold text-gray-800 mt-6">
            Our Corporate Vision
          </h2>
          <p class="text-gray-700 mt-2 text-justify">
            To be a globally admired insurance leader, delivering unparalleled
            customer satisfaction, driving socio-economic progress, and setting
            benchmarks in risk management, sustainability, and inclusive growth.
          </p>

          <!-- Bullet Points -->
          <ul class="list-none mt-4 space-y-2 text-justify">
            <li class="flex items-center">
              <span class="text-yellow-400 text-lg mr-2">➜</span>
              <span
                >Emphasize providing value-driven services to individuals and
                enterprises.</span
              >
            </li>
            <li class="flex items-center">
              <span class="text-yellow-400 text-lg mr-2">➜</span>
              <span
                >Reflect on adopting modern technologies for faster claims
                processing and policy issuance.</span
              >
            </li>
            <li class="flex items-center">
              <span class="text-yellow-400 text-lg mr-2">➜</span>
              <span
                >To act as a financially sound corporate entity with high
                business ethics.</span
              >
            </li>
            <li class="flex items-center">
              <span class="text-yellow-400 text-lg mr-2">➜</span>
              <span
                >To increase insurance penetration and run the business
                profitably through prudent underwriting and proper claim
                management.</span
              >
            </li>
            <li class="flex items-center">
              <span class="text-yellow-400 text-lg mr-2">➜</span>
              <span
                >To optimize the retention of Nepal business in the best
                interest of the country.</span
              >
            </li>
          </ul>
        </div>

        <!-- Right Content (Image and Text) -->
        <div class="lg:w-1/3 text-center pl-10">
          <img
            src="https://www.rpsjhalawar.com/img/our-Mission-Vision.jpg"
            alt="Mission and Vision"
            class="w-full h-auto max-w-sm mx-auto lg:max-w-full rounded-lg shadow-md"
          />
          <p class="text-gray-700 mt-4 text-justify">
            <span class="font-bold text-yellow-400">Hullas Remittance</span> is
            proud of the fact that around 1 million plus lives are part of our
            family. It gives us immense pleasure, while we realize the
            responsibility at the same time.
          </p>
          <p class="text-gray-700 mt-2">
            Our online application questions and real-time underwriting enable
            us to calculate the best price for you.
          </p>
        </div>
      </div>
    </div>
    <footer
      class="flex flex-col bg-black pb-10 text-center text-accent px-3 md:px-20"
    >
      <div
        class="flex flex-col text-center items-center lg:items-start lg:text-left m-6"
      >
        <img
          src="./images/logo/hulas-remittance-logo.jpg"
          class="w-56 m-6"
          alt="Hulas Remittance Logo"
        />
      </div>
      <div class="flex flex-col lg:flex-row justify-start gap-6 md:gap-20">
        <div class="flex flex-col text-center md:text-left mx-14 mb-10 gap-1">
          <div></div>
          <a href="about-us.html" class="hover:underline">About us</a>
          <a href="become-an-agent.html" class="hover:underline"
            >Become an agent</a
          >
          <a href="find-an-agent.html" class="hover:underline">Find an agent</a>
          <a href="gallery.html" class="hover:underline">Gallery</a>
          <a href="contact.html" class="hover:underline">Contact</a>
        </div>
        <div class="flex flex-col text-center md:text-left mx-14 mb-10 gap-1">
          <h3 class="font-bold capitalize">Important Links</h3>
          <p>
            <a href="http://fedan.com.np/" class="hover:underline"
              >Fedan Fx Rate</a
            >
          </p>
          <p>
            <a
              href="https://www.nrb.org.np/category/circulars/
        "
              class="hover:underline"
              >NRB Circulars</a
            >
          </p>
        </div>
      </div>

      <div></div>

      <hr class="text-accent" />

      <div class="flex flex-row justify-center text-center mt-10 gap-10">
        <img
          src="./images/social-media-icons/x-icon.jpg"
          alt="Linkedin Icon"
          class="h-7 w-7 cursor-pointer"
        />
        <img
          src="./images/social-media-icons/linkedin-svgrepo-com.png"
          alt="Linkedin Icon"
          class="h-5 w-5 cursor-pointer"
        />
        <img
          src="./images/social-media-icons/facebook-svgrepo-com.png"
          alt="Facebook Icon"
          class="h-7 w-7 cursor-pointer"
        />
      </div>
      <div
        class="flex flex-col text-accent justify-center text-sm tracking-wide mt-10"
      >
        <div class="flex flex-row justify-center">
          <a href="privacy-policy.html" class="hover:underline"
            >Privacy Policy</a
          >
          &nbsp;|&nbsp;
          <a href="terms-and-conditions.html" class="hover:underline"
            >Terms and Conditions</a
          >
          &nbsp;|&nbsp;
          <a href="sitemap.html" class="hover:underline">Site Map</a>
        </div>
        <div class="text-sm">
          &copy; 2025 Hulas Remittance Pvt. Ltd. All rights reserved.
          <span
            >Developed by
            <a href="awt.cloud" class="hover:underline">AWT</a>.</span
          >
        </div>
      </div>
    </footer>
  </body>
</html>
