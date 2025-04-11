<header>
  <div class="bg-white">
    <!-- Top Nav -->
    <nav class="hidden w-full py-2 bg-white text-black border-b-2 px-10 lg:block">
      <div class="w-full flex justify-between items-center">
        <!-- Contact Information Section -->
        <div class="flex space-x-8 items-center">
          <!-- Address -->
          <div class="flex space-x-3 items-center">
          <img src="{{ asset('assets/images/navbar/location-icon.png') }}"
              class="w-5"
              alt="Location Icon"
            />
            <p class="text-xs">
              
            @isset($setting->address_en)  
                  {{ $setting->address_en }}
                  @endisset
            </p>
          </div>

          <!-- Phone Numbers -->
          <div class="flex space-x-3 items-center">
          <img src="{{ asset('assets/images/navbar/phone-call-icon.png') }}"

              class="w-5"
              alt="Phone Icon"
            />
            <p class="text-xs">
              +977 1 5361313, 5358225, 5352008, Toll Free Number: 16600 111222
              (For NTC Users Only)
            </p>
          </div>

          <!-- Email Addresses -->
          <div class="flex space-x-3 items-center">
            <img
             src="{{ asset('assets/images/navbar/mail-icon.png') }}"
            class="w-5"
              alt="Email Icon"
            />
            <p class="text-xs">
              info@hulasremittance.com, csc@hulasremittance.com
            </p>
          </div>
        </div>

        <!-- Social Media Links -->
        <div class="flex space-x-5 items-center">
          <a rel="noopener noreferrer" href="#">
          <img
             src="{{ asset('assets/images/navbar/fb-icon.png') }}"
              class="w-6"
              alt="Facebook Icon"
            />
          </a>
          <a rel="noopener noreferrer" href="#">
       <img
             src="{{ asset('assets/images/navbar/x-icon.png') }}"
              class="w-4"
              alt="X (Twitter) Icon"
            />
          </a>
          <a rel="noopener noreferrer" href="#">
        <img
             src="{{ asset('assets/images/navbar/linked-in-icon.png') }}"
              class="w-5"
              alt="LinkedIn Icon"
            />
          </a>
        </div>
      </div>
    </nav>

    <!-- Bottom Nav (Sticky) -->
    <nav class="sticky top-0 z-50 px-4 pr-8 py-2 flex justify-between items-center bg-white text-black shadow-lg">
      <!-- Company Logo -->
      <a class="text-xl lg:pl-10 font-bold leading-none" href="{{ route('homepage') }}">
      <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}"

          class="w-56"
          alt="Hulas Remittance Logo"
        />
      </a>

      <!-- Desktop Navigation Links -->
      <div class="hidden lg:block">
        <ul class="flex">
          <li class="mb-1">
            <a
              class="block p-4 text-sm font-semibold text-black hover:text-accent"
              href="{{ route('homepage') }}"
              >Home</a
            >
          </li>
          <li class="mb-1">
            <a
              class="block p-4 text-sm font-semibold text-black hover:text-accent"
              href="{{ route('aboutHulasRemittance') }}"
              >About us</a
            >
          </li>
          <li class="mb-1">
            <a
              class="block p-4 text-sm font-semibold text-black hover:text-accent"
              href="{{ route('becomeAnAgent') }}"
              >Become an agent</a
            >
          </li>
          <li class="mb-1">
            <a
              class="block p-4 text-sm font-semibold text-black hover:text-accent"
              href="{{ route('findAnAgent') }}"
              >Find an agent</a
            >
          </li>
          <li class="mb-1">
            <a
              class="block p-4 text-sm font-semibold text-black hover:text-accent"
              href="{{ route('gallery') }}"
              >Gallery</a
            >
          </li>
          <li class="mb-1">
            <a
              class="block p-4 text-sm font-semibold text-black hover:text-accent"
              href="{{ route('contactUs') }}"
              >Contact us</a
            >
          </li>
        </ul>
      </div>

      <!-- Mobile Menu Toggle Button -->
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
  </div>

  <!-- Mobile Menu Section -->
  <div class="navbar-menu relative z-50 hidden">
    <!-- Overlay Background -->
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>

    <!-- Mobile Navigation Panel -->
    <nav
      class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto"
    >
      <!-- Mobile Header Section -->
      <div class="flex items-center mb-8">
        <a
          rel="noopener noreferrer"
          class="mr-auto text-lg font-bold leading-none"
          href="{{ route('homepage') }}"
        >
          <img
            src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}"
            class="w-40"
            alt="Hulas Remittance Mobile Logo"
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
            />
          </svg>
        </button>
      </div>

      <!-- Mobile Navigation Links -->
      <div>
        <ul>
          <li class="mb-1">
            <a
              rel="noopener noreferrer"
              class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent"
              href="{{ route('homepage') }}"
              >Home</a
            >
          </li>
          <li class="mb-1">
            <a
              rel="noopener noreferrer"
              class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent"
              href="{{ route('aboutHulasRemittance') }}"
              >About Us</a
            >
          </li>
          <li class="mb-1">
            <a
              rel="noopener noreferrer"
              class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent"
              href="{{ route('becomeAnAgent') }}"
              >Become an Agent</a
            >
          </li>
          <li class="mb-1">
            <a
              rel="noopener noreferrer"
              class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent"
              href="{{ route('findAnAgent') }}"
              >Find an Agent</a
            >
          </li>
          <li class="mb-1">
            <a
              rel="noopener noreferrer"
              class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent"
              href="{{ route('gallery') }}"
              >Gallery</a
            >
          </li>
          <li class="mb-1">
            <a
              rel="noopener noreferrer"
              class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded"
              href="{{ route('contactUs') }}"
              >Contact</a
            >
          </li>
        </ul>
      </div>

      <!-- Western Union Logo Footer -->
      <div class="mt-auto">
        <div class="flex justify-end">
          <img
            src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowBlack.png') }}"
            class="w-44 h-5"
            alt="Western Union Logo"
          />
        </div>
      </div>
    </nav>
  </div>
</header>
