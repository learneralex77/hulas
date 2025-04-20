<footer>
    <div class="bg-black text-[#ffffffcc] text-sm">
        <div class="flex flex-col space-y-10">
            <!-- logo and desc -->
            <div class="w-full flex flex-col space-y-2 lg:space-y-0 lg:flex-row lg:justify-between ">
                <div class="flex justify-center lg:justify-left">
                    <a class="text-3xl text-white font-bold" href="{{ route('homepage') }}">
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
                                    src="{{ asset('assets/images/social-media-icons/facebook-svgrepo-com.png') }}"
                                    class="w-6" alt="Facebook Icon" />
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
            <div class="flex flex-col md:flex-row justify-left gap-6">
                <div class="flex flex-1 flex-col lg:flex-row justify-around gap-6 mx-10 lg:mx-0">
                    <div class="max-w-xs pr-0 lg:pr-8 flex flex-col text-center items-center space-y-5 flex-1">
                        <p class="text-center md:text-left">
                            A Principal Agent of Western Union in Nepal.</p>
                        <p class="text-center md:text-left">
                            @isset($aboutUs->description_en)
                                {{ $aboutUs->description_en }}
                            @endisset
                        </p>
                    </div>

                    <!-- contact details-->
                    <div class="text-[#ffffffcc] flex flex-col space-y-5 justify-left flex-1">
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/location.png') }}" class="w-6 h-6"
                                alt="Location Icon" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                                <p>
                                
                                <b>Address:</b> <br />
                                    @isset($settings->address_en)
                                        {{ $settings->address_en }}
                                    @endisset
                                </p>

                                <p>Kathmandu, Nepal</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/phone-call.png') }}" class="w-6 h-6"
                                alt="Phone call" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                                <p>
                                   <b>Phone no:</b>  <br />
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
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/mail.png') }}" class="w-6 h-6 " alt="Email Icon" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                                <p><b> Email:</b> </p>
                                <p>
                                    @isset($settings->email)
                                        {{ $settings->email }}
                                    @endisset
                                    @isset($settings->agent_notify_email)
                                        {{ $settings->agent_notify_email }}

                                    @endisset
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- links -->
                <div
                    class="flex flex-1 flex-col lg:flex-row justify-center lg:justify-start items-center lg:items-start gap-10 text-center lg:text-left">
                    <div class="text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class=" text-accent font-bold text-left">Quick Links</h4>
                        <a href="{{ route('homepage') }}" class="hover:underline text-left ">Home</a>
                        <a href="{{ route('aboutHulasRemittance') }}" class="hover:underline text-left ">About Hulas
                            Remittance</a>
                        <a href="{{ route('aboutWesternUnion') }}" class="hover:underline text-left ">About Western
                            Union</a>
                        <a href="{{ route('findAnAgent') }}" class="hover:underline text-left ">Agents
                            List</a>
                        <a href="{{ route('gallery') }}" class="hover:underline text-left ">Gallery</a>
                    </div>
                    <div class="text-[#ffffffcc] flex flex-col space-y-2 text-center lg:text-left">
                        <h4 class=" text-accent font-bold text-left ">Navigate</h4>
                        <a href="{{ route('forexRate') }}" class="hover:underline text-left  ">Forex Rate</a>
                        <a href="#" class="hover:underline text-left ">FAQ</a>
                        <a href="{{ route('contactUs') }}" class="hover:underline text-left ">Contact us</a>
                        <a href="{{ route('termsAndConditions') }}" class="hover:underline text-left ">Terms &
                            Conditions</a>
                        <a href="{{ route('privacyAndPolicy') }}" class="hover:underline text-left ">Privacy Policy</a>
                    </div>
                    <div class="text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class="text-accent font-bold text-left">Important Links</h4>
                        <a href="https://www.nrb.org.np/" target="_blank" class="hover:underline text-left ">Nepal
                            Rastra Bank</a>
                        <a href="https://www.nrb.org.np/forex/" target="_blank"
                            class="hover:underline text-left ">Foreign Exchange Rates</a>
                    </div>
                </div>
            </div>

            <!-- bottom footer -->
            <div class="flex flex-col md:flex-row md:justify-between items-center gap-6 lg:px-10">
                <p>&copy; 2025 Hulas Remittance Pvt.Ltd.&nbsp;All rights reserved.</p>
                <p>
                    Designed and crafted by
                    <a href="https://dev.awt.cloud/" class="text-[#0000cc] font-bold" ">AWT</a>
                </p>
                <a href=" https://www.westernunion.com/np/en/home.html">
                        <img src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowWhite.png') }}"
                            class="w-44 h-5" alt="Western Union Icon" />
                    </a>
            </div>
        </div>
    </div>
</footer>