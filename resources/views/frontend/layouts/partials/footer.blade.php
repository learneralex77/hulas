<footer>
    <div class="bg-black text-[#ffffffcc] p-12 text-sm">
        <div class="flex flex-col space-y-10">
            <!-- logo and desc -->
            <div class="w-full flex flex-col space-y-2 lg:space-y-0 lg:flex-row lg:justify-between ">
                <div class="flex justify-center lg:justify-left">
                    <a class="text-3xl text-white font-bold" href="index.html">
                        <img src="{{ asset('assets/images/logo/hulas.png') }}" class="w-56" alt="Logo" />
                    </a>
                </div>
                <!-- social media icons -->
                <div class="flex justify-center lg:justify-left space-x-3 items-center">
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->facebook)
                        <a rel="noopener noreferrer" href="{{ $settings->facebook }}">
                            <img id="fb-white"
                                src="{{ asset('assets/images/social-media-icons/facebook-svgrepo-com.png') }}" class="w-6"
                                alt="Facebook Icon" />
                        </a>
                        @endisset
                    </div>
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->linkedin)
                        <a rel="noopener noreferrer" href="{{ $settings->linkedin }}">
                            <img id="fb-white"
                                src="{{ asset('assets/images/social-media-icons/linkedin-svgrepo-com.png') }}"
                                class="w-4 h-4" alt="LinkedIn Icon" />
                        </a>
                        @endisset
                    </div>
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->twitter)
                        <a rel="noopener noreferrer" href="{{ $settings->twitter }}">
                            <img id="fb-white" src="{{ asset('assets/images/social-media-icons/x-icon.jpg') }}"
                                class="w-6" alt="X Icon" />
                        </a>
                        @endisset
                    </div>
                </div>
            </div>
            <!-- description -->
            <div class="flex flex-col md:flex-row justify-around gap-6">
                <div class="flex flex-1 flex-col lg:flex-row items-center justify-around gap-6">
                    <div class="max-w-xs pr-0 lg:pr-8 flex flex-col text-center items-center space-y-5">
                        <p class="text-center md:text-left">
                            A Principal Agent of Western Union in Nepal.</p>
                        <p class="text-center md:text-left">
                            @isset($aboutUs->description_en)
                            {{ $aboutUs->description_en }}
                            @endisset
                        </p>
                    </div>
                    <div class="text-[#ffffffcc] flex flex-col space-y-5 items-left lg:items-center ">
                        <div class="flex flex-row gap-6 space-x-5 items-center">
                            <img src="{{ asset('assets/images/footer/location.png') }}" class="w-6" alt="" />
                            <div class="flex flex-col space-y-1">
                                <p>
                                    @isset($settings->address_en)
                                    {{ $settings->address_en }}
                                    @endisset
                                </p>

                                <p>Kathmandu, Nepal</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 items-center">
                            <img src="{{ asset('assets/images/footer/phone-call.png') }}" class="w-6" alt="" />
                            <div class="flex flex-col space-y-2">
                                <p>
                                    @isset($settings->phone_number_en)
                                    {{ $settings->phone_number_en }}
                                    @endisset
                                </p>
                                <!-- <p>
                                    Toll Free Number: <br />
                                    16600 111222 <br />(For NTC Users Only)
                                </p> -->
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 items-center">
                            <img src="{{ asset('assets/images/footer/mail.png') }}" class="w-6" alt="" />
                            <div class="flex flex-col space-y-2">
                                <p>Email:</p>
                                <p>
                                    @isset($settings->email)
                                    {{ $settings->email }}
                                    @isset($settings->agent_notify_email)
                                    {{ $settings->agent_notify_email }}
                                    @endisset
                                    @endisset
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-1 flex-col lg:flex-row justify-around items-center lg:justify-between gap-6">
                    <div class="text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class=" text-accent font-bold md:text-left  text-center items-center">Important Links</h4>
                        <a href="homepage" class="hover:underline text-center">Home</a>
                        <a href="about-hulas-remittance" class="hover:underline text-center">About Hulas Remittance</a>
                        <a href="about-western-union" class="hover:underline text-center">About Western Union</a>
                        <a href="find-an-agent" class="hover:underline text-center">Agents List</a>
                        <a href="gallery" class="hover:underline text-center">Gallery</a>
                    </div>
                    <div class=" text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class=" text-accent font-bold md:text-left text-center">Navigate</h4>
                        <a href="forex-rate" class="hover:underline text-center">Forex Rate</a>
                        <a href="faq" class="hover:underline text-center">FAQ</a>
                        <a href="contact-us" class="hover:underline text-center">Contact us</a>
                        <a href="{{ route('termsAndConditions') }}" class="hover:underline text-center">Terms & Conditions</a>
                        <a href="{{ route('privacyAndPolicy') }}" class="hover:underline text-center">Privacy Policy</a>
                    </div>
                    <div class=" text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class=" text-accent font-bold md:text-left text-center">Quick Links</h4>
                        <a href="https://www.nrb.org.np/" target="_blank" class="hover:underline text-center">Nepal
                            Rastra Bank</a>
                        <a href="https://www.nrb.org.np/forex/" target="_blank"
                            class="hover:underline text-center">Foreign Exchange Rates</a>
                    </div>
                </div>
            </div>

            <!-- bottom footer -->
            <div class="flex flex-col md:flex-row md:justify-between items-center gap-6">
                <p>&copy; 2025 Hulas Remittance Pvt.Ltd.&nbsp;All rights reserved.</p>
                <p>
                    Designed and crafted by
                    <a href="https://dev.awt.cloud/" class="text-[#0000cc] font-bold">AWT</a>
                </p>
                <a href="https://www.westernunion.com/np/en/home.html">
                    <img src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowWhite.png') }}"
                        class="w-44 h-5" alt="Western Union Icon" />
                </a>
            </div>
        </div>
    </div>
</footer>