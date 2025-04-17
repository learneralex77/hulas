<header class="sticky -top-0 lg:-top-12 z-50">
    <!-- Top Nav -->
    <nav class="hidden w-full py-1 bg-bgprimary border-black border-b-2 px-10 lg:block">
        <div class="w-full p-2 flex justify-between items-center">
            <!-- address, toll free -->
            <div class="flex space-x-8 items-center">
                <div class="flex space-x-3 items-center">
                    <img src="{{ asset('assets/images/navbar/location-icon.png') }}" class="w-5" alt="" />
                    <p class="text-xs">
                        @isset($settings->address_en)
                            {{ $settings->address_en }}
                        @endisset
                    </p>
                </div>
                <div class="flex space-x-3 items-center">
                    <img src="{{ asset('assets/images/navbar/phone-call-icon.png') }}" class="w-5" alt="" />
                    <p class="text-xs">
                        @isset($settings->phone_number_en)
                            {{ $settings->phone_number_en }}
                        @endisset
                    </p>
                </div>
                <div class="flex space-x-3 items-center">
                    <img src="{{ asset('assets/images/navbar/mail-icon.png') }}" class="w-5" alt="" />
                    <p class="text-xs">
                        @isset($settings->email)
                            {{ $settings->email }}
                        @endisset
                        @isset($settings->agent_notify_email)
                            {{ $settings->agent_notify_email }}
                        @endisset
                    </p>
                </div>
            </div>
            <!-- social -->
            <div class="flex space-x-5 items-center">
                @isset($settings->facebook)
                    <a rel="noopener noreferrer" href="{{ $settings->facebook }}"><img src="{{ asset('assets/images/navbar/fb-icon.png') }}"
                            class="w-6" alt="facebook Icon" /></a>
                @endisset
                @isset($settings->twitter)
                    <a rel="noopener noreferrer" href="{{ $settings->twitter }}"><img src="{{ asset('assets/images/navbar/x-icon.png') }}"
                            class="w-4" alt="X Icon" /></a>
                @endisset
                @isset($settings->linkedin)
                    <a rel="noopener noreferrer" href="{{ $settings->linkedin }}"><img
                        src="{{ asset('assets/images/navbar/linked-in-icon.png') }}" class="w-5"
                        alt="Linkedin Icon" /></a>
                @endisset
            </div>
        </div>
    </nav>

    <!-- Main Navigation -->
    <nav class="relative px-4 pr-8 py-3 flex justify-between items-center bg-white shadow-lg">
        <a class="text-xl lg:pl-10 font-bold" href="{{ route('homepage') }}">
            <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-40 lg:w-56"
                alt="Hulas Logo" />
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex justify-end items-center flex-end flex-grow">
            <ul class="flex space-x-4" x-data="{ openMenu: null }">
                @foreach ($menus as $i => $menu)
                    <li class="relative" @mouseenter="openMenu = {{ $i }}" @mouseleave="openMenu = null">
                        <button class="px-4 py-2 font-semibold text-gray-700 hover:text-accent focus:outline-none cursor-pointer"
                            @focus="openMenu = {{ $i }}" @blur="openMenu = null"
                            aria-haspopup="{{ $menu->children->isNotEmpty() ? 'true' : 'false' }}"
                            :aria-expanded="openMenu === {{ $i }}" type="button">
                            {{ $menu->name_en }}
                        </button>

                        @if ($menu->children->isEmpty())
                            {{-- Only if there are no children, render it as a link --}}
                            <a href="{{ url($menu->slug) }}" class="absolute inset-0 z-10" aria-hidden="true"
                                tabindex="-1"></a>
                        @endif

                        @if ($menu->children->isNotEmpty())
                            <ul x-show="openMenu === {{ $i }}" x-transition
                                class="absolute left-0 mt-2 w-48 bg-white rounded shadow-lg z-20"
                                @mouseenter="openMenu = {{ $i }}" @mouseleave="openMenu = null">
                                @foreach ($menu->children as $j => $child)
                                    <li class="relative" x-data="{ openSub: false }" @mouseenter="openSub = true"
                                        @mouseleave="openSub = false">
                                        <a href="{{ $child->children->isEmpty() ? url($child->slug) : '#' }}"
                                            class="w-full block text-left px-4 py-2 hover:bg-sky-50 flex justify-between items-center"
                                            @focus="openSub = true" @blur="openSub = false"
                                            aria-haspopup="{{ $child->children->isNotEmpty() ? 'true' : 'false' }}"
                                            :aria-expanded="openSub">
                                            {{ $child->name_en }}
                                            @if ($child->children->isNotEmpty())
                                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            @endif
                                        </a>

                                        @if ($child->children->isNotEmpty())
                                            <ul x-show="openSub" x-transition
                                                class="absolute left-full top-0 mt-0 ml-1 w-48 bg-white rounded shadow-lg z-30">
                                                @foreach ($child->children as $sub)
                                                    <li>
                                                        <a href="{{ url($sub->slug) }}"
                                                            class="block px-4 py-2 hover:bg-sky-50">
                                                            {{ $sub->name_en }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>

        </div>


        <!-- Mobile Toggle -->
        <div class="lg:hidden" id="burger-container">
            <button id="burger" class="navbar-burger flex items-center text-[#ffdd00] p-3 cursor-pointer">
                <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="navbar-menu relative z-50 hidden" x-data="{ openMenus: {} }">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a href="{{ route('homepage') }}" class="mr-auto text-lg font-bold leading-none">
                    <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-40"
                        alt="Logo" />
                </a>
                <button id="close-menu" class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <ul>
                @foreach ($menus as $menuIndex => $menu)
                    <li class="mb-1" x-data="{ open: false }">
                        @if ($menu->children->isEmpty())
                            <a href="{{ url($menu->slug) }}"
                                class="block p-4 text-sm font-semibold text-gray-700 hover:text-accent rounded">
                                {{ $menu->name_en }}
                            </a>
                        @else
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-4 text-sm font-semibold text-gray-700 rounded hover:text-accent focus:outline-none">
                                <span>{{ $menu->name_en }}</span>
                                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-90': open }"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        @endif

                        @if ($menu->children->isNotEmpty())
                            <ul x-show="open" x-transition class="ml-4 border-l border-gray-200">
                                @foreach ($menu->children as $childIndex => $child)
                                    <li class="pt-1" x-data="{ openChild: false }">
                                        @if ($child->children->isEmpty())
                                            <a href="{{ url($child->slug) }}"
                                                class="block p-3 pl-4 text-sm text-gray-700 hover:text-accent">
                                                {{ $child->name_en }}
                                            </a>
                                        @else
                                            <button @click="openChild = !openChild"
                                                class="flex items-center justify-between w-full p-3 pl-4 text-sm text-gray-700 rounded hover:text-accent focus:outline-none">
                                                <span>{{ $child->name_en }}</span>
                                                <svg class="w-4 h-4 transition-transform"
                                                    :class="{ 'rotate-90': openChild }" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        @endif

                                        @if ($child->children->isNotEmpty())
                                            <ul x-show="openChild" x-transition class="ml-4 border-l border-gray-200">
                                                @foreach ($child->children as $sub)
                                                    <li>
                                                        <a href="{{ url($sub->slug) }}"
                                                            class="block p-3 pl-6 text-sm text-gray-600 hover:text-accent">
                                                            {{ $sub->name_en }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>



            <div class="mt-auto flex justify-end pt-4">
                <img src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowBlack.png') }}"
                    class="w-44 h-5" alt="Western Union Logo" />
            </div>
        </nav>
    </div>

</header>

<!-- Mobile Nav Toggle Script -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const burger = document.getElementById("burger");
        const burgerContainer = document.getElementById("burger-container");
        const mobileMenu = document.getElementById("mobile-menu");
        const closeMenu = document.getElementById("close-menu");
        const backdrop = document.querySelector(".navbar-backdrop");

        function openMobileMenu() {
            mobileMenu.classList.remove("hidden");
            burgerContainer.classList.add("hidden");
        }

        function closeMobileMenu() {
            mobileMenu.classList.add("hidden");
            burgerContainer.classList.remove("hidden");
        }

        burger?.addEventListener("click", openMobileMenu);
        closeMenu?.addEventListener("click", closeMobileMenu);
        backdrop?.addEventListener("click", closeMobileMenu);

        document.addEventListener("click", (event) => {
            if (
                !mobileMenu.classList.contains("hidden") &&
                !mobileMenu.contains(event.target) &&
                !burger.contains(event.target)
            ) {
                closeMobileMenu();
            }
        });
    });
</script>
