<header class="sticky top-0 lg:-top-16 z-50">
  <!-- Top Navigation (Visible on large screens) -->
  <nav class="hidden lg:block w-full py-2 bg-bgprimary border-b-2 px-10">
    <div class="w-full p-2 flex justify-between items-center">
      <!-- Contact Info -->
      <div class="flex space-x-8 items-center">
        <div class="flex space-x-3 items-center">
          <img src="{{ asset('assets/images/navbar/location-icon.png') }}" class="w-5" alt="Location Icon" />
          <p class="text-xs">Bagdurbar, Sundhara, Kathmandu, Nepal</p>
        </div>
        <div class="flex space-x-3 items-center">
          <img src="{{ asset('assets/images/navbar/phone-call-icon.png') }}" class="w-5" alt="Phone Icon" />
          <p class="text-xs">+977 1 5361313, Toll Free: 16600 111222</p>
        </div>
        <div class="flex space-x-3 items-center">
          <img src="{{ asset('assets/images/navbar/mail-icon.png') }}" class="w-5" alt="Mail Icon" />
          <p class="text-xs">info@hulasremittance.com</p>
        </div>
      </div>
      <!-- Social Media -->
      <div class="flex space-x-5 items-center">
        <a href="#"><img src="{{ asset('assets/images/navbar/fb-icon.png') }}" class="w-6" alt="Facebook" /></a>
        <a href="#"><img src="{{ asset('assets/images/navbar/x-icon.png') }}" class="w-4" alt="X" /></a>
        <a href="#"><img src="{{ asset('assets/images/navbar/linked-in-icon.png') }}" class="w-5" alt="LinkedIn" /></a>
      </div>
    </div>
  </nav>

  <!-- Main Navigation -->
  <nav class="relative px-4 pr-8 py-4 flex justify-between items-center bg-white shadow-lg">
    <a class="text-xl lg:pl-10 font-bold" href="index.html">
      <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-56" alt="Hulas Logo" />
    </a>

    <div class="hidden lg:block">
      <ul class="flex">
        @foreach ([
          ['Home', '#'],
          ['About Us', 'about-us-page.html'],
          ['Become an Agent', 'become-an-agent.html'],
          ['Find an Agent', 'agent-list.html'],
          ['Gallery', '#gallery'],
          ['Contact', 'contact-us.html']
        ] as [$label, $link])
        <li class="mb-1">
          <a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="{{ $link }}">
            {{ $label }}
          </a>
        </li>
        @endforeach
      </ul>
    </div>

    <!-- Mobile Burger -->
    <div class="lg:hidden block">
      <button id="burger" class="flex items-center text-[#ffdd00] p-3">
        <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="navbar-menu fixed inset-0 z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
      <div class="flex items-center mb-8">
        <a class="mr-auto text-lg font-bold" href="index.html">
          <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-40" alt="Logo" />
        </a>
        <button id="close-menu">
          <svg class="h-6 w-6 text-gray-400 hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <ul>
        @foreach ([
          ['Home', 'index.html'],
          ['About Us', '#about_us'],
          ['Become an Agent', '#become_agent'],
          ['Gallery', '#gallery'],
          ['Contact', '#contact_p'],
          ['Our Fees', 'https://www.westernunion.com/us/en/send-money/app/price-estimator'],
          ['Forex Rates', 'https://www.westernunion.com/us/en/send-money-to-nepal.html']
        ] as [$label, $link])
        <li class="mb-1">
          <a href="{{ $link }}" class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded" target="{{ str_starts_with($link, 'http') ? '_blank' : '_self' }}">
            {{ $label }}
          </a>
        </li>
        @endforeach
      </ul>

      <div class="mt-auto flex justify-end">
        <img src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowBlack.png') }}" class="w-44 h-5" alt="WU Logo" />
      </div>
    </nav>
  </div>
</header>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const burger = document.getElementById("burger");
  const mobileMenu = document.getElementById("mobile-menu");
  const closeMenu = document.getElementById("close-menu");
  const backdrop = document.querySelector(".navbar-backdrop");

  burger?.addEventListener("click", () => {
    mobileMenu.classList.remove("hidden");
  });

  [closeMenu, backdrop].forEach(el => {
    el?.addEventListener("click", () => {
      mobileMenu.classList.add("hidden");
    });
  });

  document.addEventListener("click", (event) => {
    if (
      !mobileMenu.classList.contains("hidden") &&
      !mobileMenu.contains(event.target) &&
      !burger.contains(event.target)
    ) {
      mobileMenu.classList.add("hidden");
    }
  });
});
</script>
