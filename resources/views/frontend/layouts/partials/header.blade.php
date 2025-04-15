<header class="sticky top-0 lg:top-0 z-50">
    <!---------- top-nav ---------->
    <nav class="hidden w-full py-1 bg-bgprimary border-b-2 px-5 lg:px-10 lg:block">
        <div class="w-full p-2 flex justify-between items-center">
            <!-- address, toll free -->
            <div class="flex space-x-4 items-center">
                <div class="flex space-x-2 items-center">
                    <img src="{{ asset('assets/images/navbar/location-icon.png') }}" class="w-4 h-4" alt="" />
                    <p class="text-xs text-gray-600">
                        Bagdurbar, Sundhara (Near to China Town Gate) Kathmandu, Nepal
                    </p>
                </div>
                <div class="flex space-x-2 items-center">
                    <img src="{{ asset('assets/images/navbar/phone-call-icon.png') }}" class="w-4 h-4" alt="" />
                    <p class="text-xs text-gray-600">
                        +977 1 5361313, 5358225, 5352008, Toll Free Number: 16600 111222 (For NTC Users Only)
                    </p>
                </div>
                <div class="flex space-x-2 items-center">
                    <img src="{{ asset('assets/images/navbar/mail-icon.png') }}" class="w-4 h-4" alt="" />
                    <p class="text-xs text-gray-600">
                        info@hulasremittance.com, csc@hulasremittance.com
                    </p>
                </div>
            </div>
            <!-- social -->
            <div class="flex space-x-3 items-center">
                <a rel="noopener noreferrer" href="#" class="hover:opacity-75 transition-opacity">
                    <img src="{{ asset('assets/images/navbar/fb-icon.png') }}" class="w-5 h-5" alt="facebook Icon" />
                </a>
                <a rel="noopener noreferrer" href="#" class="hover:opacity-75 transition-opacity">
                    <img src="{{ asset('assets/images/navbar/x-icon.png') }}" class="w-4 h-4" alt="X Icon" />
                </a>
                <a rel="noopener noreferrer" href="#" class="hover:opacity-75 transition-opacity">
                    <img src="{{ asset('assets/images/navbar/linked-in-icon.png') }}" class="w-5 h-5"
                        alt="Linkedin Icon" />
                </a>
            </div>
        </div>
    </nav>
    <!---------- top-nav ---------->

    <!-- Main Navigation -->
    <nav class="relative px-4 py-3 flex justify-between items-center bg-white shadow-md">
        <!-- Logo -->
        <a class="text-xl lg:pl-5 font-bold" href="homepage">
            <img src="{{ asset('assets/images/logo/hulas-remittance-logo.jpg') }}" class="w-48" alt="Hulas Logo" />
        </a>

        <!-- Centered second child -->
        <div class="hidden lg:flex justify-center items-center flex-grow">
            <!-- Your centered content -->
            <div class="text-center">
                <!-- Example content -->
                <ul class="flex space-x-6" x-data="{ openMenu: null }">
                    @foreach ($menus as $i => $menu)
                        <li class="relative" @mouseenter="openMenu = {{ $i }}" @mouseleave="openMenu = null">
                            <button class="px-3 py-2 font-medium text-gray-700 hover:text-accent focus:outline-none transition-colors duration-200"
                                @focus="openMenu = {{ $i }}" @blur="openMenu = null"
                                aria-haspopup="{{ $menu->children->isNotEmpty() ? 'true' : 'false' }}"
                                :aria-expanded="openMenu === {{ $i }}">
                                {{ $menu->name_en }}
                            </button>
                            @if ($menu->children->isNotEmpty())
                                <ul x-show="openMenu === {{ $i }}" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute left-0 mt-2 w-48 bg-white  rounded-md shadow-lg z-20"
                                    @mouseenter="openMenu = {{ $i }}" @mouseleave="openMenu = null">
                                    @foreach ($menu->children as $j => $child)
                                        <li class="relative" x-data="{ openSub: false }" @mouseenter="openSub = true"
                                            @mouseleave="openSub = false">
                                            <button
                                                class="w-full text-left px-4 py-2 hover:bg-sky-50 flex justify-between items-center transition-colors duration-200"
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
                                            </button>
                                            @if ($child->children->isNotEmpty())
                                                <ul x-show="openSub" x-transition:enter="transition ease-out duration-100"
                                                    x-transition:enter-start="transform opacity-0 scale-95"
                                                    x-transition:enter-end="transform opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75"
                                                    x-transition:leave-start="transform opacity-100 scale-100"
                                                    x-transition:leave-end="transform opacity-0 scale-95"
                                                    class="absolute left-full top-0 mt-0 ml-1 w-48 bg-white  rounded-md shadow-lg z-30">
                                                    @foreach ($child->children as $sub)
                                                        <li>
                                                            <a href="{{ url($sub->slug) }}"
                                                                class="block px-4 py-2 hover:bg-sky-50 transition-colors duration-200">
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
        </div>

        <!-- Mobile burger -->
        <div class="lg:hidden block">
            <button id="burger" class="navbar-burger flex items-center text-sky-500 p-3 focus:outline-none">
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
        <nav
            class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white  overflow-y-auto">
            <div class="flex items-center mb-8">
                <a rel="noopener noreferrer" class="mr-auto text-lg font-bold leading-none" href="index.html">
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
            <ul x-data="{ openMenus: {} }">
                @foreach ($menus as $menuIndex => $menu)
                    <li class="mb-1">
                        <div class="flex items-center justify-between">
                            <a href="{{ url($menu->slug) }}"
                                class="block p-4 text-sm font-semibold text-gray-700 hover:text-acccent rounded flex-grow transition-colors duration-200">
                                {{ $menu->name_en }}
                            </a>

                            @if ($menu->children->isNotEmpty())
                                <button
                                    @click="openMenus['menu{{ $menuIndex }}'] = !openMenus['menu{{ $menuIndex }}']"
                                    class="p-4 focus:outline-none">
                                    <svg class="w-4 h-4 transition-transform transform"
                                        :class="{ 'rotate-90': openMenus['menu{{ $menuIndex }}'] }" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>

                        @if ($menu->children->isNotEmpty())
                            <ul x-show="openMenus['menu{{ $menuIndex }}']" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="ml-4">

                                @foreach ($menu->children as $childIndex => $child)
                                    <li>
                                        <div class="flex items-center justify-between">
                                            <a href="{{ url($child->slug) }}"
                                                class="block p-3 pl-4 text-sm text-gray-700 hover:text-acccent transition-colors duration-200">
                                                {{ $child->name_en }}
                                            </a>

                                            @if ($child->children->isNotEmpty())
                                                <button
                                                    @click.stop="openMenus['child{{ $menuIndex }}_{{ $childIndex }}'] = !openMenus['child{{ $menuIndex }}_{{ $childIndex }}']"
                                                    class="p-3 focus:outline-none">
                                                    <svg class="w-4 h-4 transition-transform transform"
                                                        :class="{
                                                            'rotate-90': openMenus[
                                                                'child{{ $menuIndex }}_{{ $childIndex }}']
                                                        }"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>

                                        @if ($child->children->isNotEmpty())
                                            <ul x-show="openMenus['child{{ $menuIndex }}_{{ $childIndex }}']"
                                                x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="transform opacity-0 scale-95"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-75"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-95"
                                                class="ml-4">

                                                @foreach ($child->children as $sub)
                                                    <li>
                                                        <a href="{{ url($sub->slug) }}"
                                                            class="block p-3 pl-4 text-sm text-gray-600 hover:text-acccent transition-colors duration-200">
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
