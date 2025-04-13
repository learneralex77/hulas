<header class="sticky -top-0 lg:-top-16 z-50">
    <!---------- top-nav ---------->
    <nav class="hidden w-full py-2 bg-bgprimary border-b-2 px-10 lg:block">
        <div class="w-full p-2 flex justify-between items-center">
            <!-- address, toll free -->
            <div class="flex space-x-8 items-center">
                <div class="flex space-x-3 items-center">
                    <img src="{{ asset('assets/images/navbar/location-icon.png') }}" class="w-5" alt="" />
                    <p class="text-xs">
                        Bagdurbar, Sundhara (Near to China Town Gate) Kathmandu, Nepal
                    </p>
                </div>
                <div class="flex space-x-3 items-center">
                    <img src="{{ asset('assets/images/navbar/phone-call-icon.png') }}" class="w-5" alt="" />
                    <p class="text-xs">
                        +977 1 5361313, 5358225, 5352008, Toll Free Number: 16600 111222 (For NTC Users Only)
                    </p>
                </div>
                <div class="flex space-x-3 items-center">
                    <img src="{{ asset('assets/images/navbar/mail-icon.png') }}" class="w-5" alt="" />
                    <p class="text-xs">
                        info@hulasremittance.com, csc@hulasremittance.com
                    </p>
                </div>
            </div>
            <!-- social -->
            <div class="flex space-x-5 items-center">
                <a rel="noopener noreferrer" href="#"><img src="{{ asset('assets/images/navbar/fb-icon.png') }}" class="w-6" alt="facebook Icon" /></a>
                <a rel="noopener noreferrer" href="#"><img src="{{ asset('assets/images/navbar/x-icon.png') }}" class="w-4" alt="X Icon" /></a>
                <a rel="noopener noreferrer" href="#"><img src="{{ asset('assets/images/navbar/linked-in-icon.png') }}" class="w-5" alt="Linkedin Icon" /></a>
            </div>
        </div>
    </nav>
    <!---------- top-nav ---------->

    <!---------- bottom-nav ---------->
    <nav class="relative px-4 pr-8 py-4 flex justify-between items-center bg-white shadow-lg">
        <a class="text-xl lg:pl-10 font-bold leading-none" href="index.html">
            <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-56" alt="Hulas Remittance Logo" />
        </a>

        <div class="hidden lg:block">
            <ul class="flex">
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="#">Home</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="about-us-page.html">About Us</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="become-an-agent.html">Become an Agent</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="agent-list.html">Find an Agent</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="#gallery">Gallery</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-black hover:text-accent rounded" href="contact-us.html">Contact</a></li>
            </ul>
        </div>

        <!-- Mobile burger -->
        <div class="lg:hidden block">
            <button id="burger" class="navbar-burger flex items-center text-[#ffdd00] p-3">
                <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
    </nav>
    <!---------- bottom-nav ---------->

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a rel="noopener noreferrer" class="mr-auto text-lg font-bold leading-none" href="index.html">
                    <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-40" alt="Logo" />
                </a>
                <button id="close-menu" class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded" href="index.html">Home</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded" href="#about_us">About Us</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded" href="#become_agent">Become an Agent</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded" href="#gallery">Gallery</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:text-accent rounded" href="#contact_p">Contact</a></li>
                <li class="mb-1"><a href="https://www.westernunion.com/us/en/send-money/app/price-estimator" target="_blank" class="block p-4 text-sm font-semibold text-accent rounded">Our Fees</a></li>
                <li class="mb-1"><a href="https://www.westernunion.com/us/en/send-money-to-nepal.html" target="_blank" class="block p-4 text-sm font-semibold text-accent rounded">Forex Rates</a></li>
            </ul>
            <div class="mt-auto flex justify-end pt-4">
                <img src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowBlack.png') }}" class="w-44 h-5" alt="Western Union Logo" />
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Nav Toggle Script -->
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
