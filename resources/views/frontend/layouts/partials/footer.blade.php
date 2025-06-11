@php
    use Illuminate\Support\Str;
@endphp
<footer>
    <div class="bg-black text-[#ffffffcc] text-sm mx-10">
        <div class="flex flex-col space-y-10">
            <!-- logo and desc -->
            <div class="w-full flex flex-col space-y-2 lg:space-y-0 lg:flex-row lg:justify-between ">
                <div class="flex justify-center lg:justify-left">
                    <a class="text-3xl text-white font-bold" href="{{ route('homepage') }}">
                        <img src="{{ asset('assets/images/logo/hulas.png') }}" class="w-56" alt="{{ __('footer.logo_alt') }}" />
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
                                    class="w-6" alt="{{ __('footer.social_media.facebook') }}" />
                            </a>
                        @endisset
                    </div>
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->linkedin)
                            <a rel="noopener noreferrer" href="{{ $settings->linkedin }}">
                                <img id="fb-white"
                                    src="{{ asset('assets/images/social-media-icons/linkedin-svgrepo-com.png') }}"
                                    class="w-4 h-4" alt="{{ __('footer.social_media.linkedin') }}" />
                            </a>
                        @endisset
                    </div>
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->twitter)
                            <a rel="noopener noreferrer" href="{{ $settings->twitter }}">
                                <img id="fb-white" src="{{ asset('assets/images/social-media-icons/x-icon.jpg') }}"
                                    class="w-6" alt="{{ __('footer.social_media.twitter') }}" />
                            </a>
                        @endisset
                    </div>
                </div>
            </div>
            <!-- description -->
            <div class="flex flex-col md:flex-row justify-left md:justify-center gap-6">
                <div class="flex flex-1 flex-col lg:flex-row justify-around gap-6 lg:mx-0">
                    <div class=" pr-0 lg:pr-8 flex flex-col text-center items-center space-y-5 flex-1">
                        <p class="text-center md:text-left">
                            {{ __('footer.western_union_desc') }}</p>
                        
                            @isset($aboutUs->description_en)
                        <p class="text-center md:text-left">
                            @if(app()->getLocale() == 'np')
                                {{ Str::words($aboutUs->description_np, 50, '...') }}
                            @else
                                {{ Str::words($aboutUs->description_en, 50, '...') }}
                            @endif
                        </p>
                            @endisset
                    </div>

                    <!-- contact details-->
                    <div class="text-[#ffffffcc] flex flex-col space-y-5 lg:justify-left flex-1 lg:px-6 justify-center">
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/location.png') }}" class="w-6 h-6"
                                alt="{{ __('footer.location_icon_alt') }}" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                            @isset($settings->address_en)
                                <p>
                                <b>{{ __('footer.contact.address') }}</b> <br />
                                    @if(app()->getLocale() == 'np')
                                        {{ $settings->address_np }}
                                    @else
                                        {{ $settings->address_en }}
                                    @endif
                                </p>
                                @endisset
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/phone-call.png') }}" class="w-6 h-6"
                                alt="{{ __('footer.phone_icon_alt') }}" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                            @isset($settings->phone_number_en)
                                <p>
                                   <b>{{ __('footer.contact.phone') }}</b> <br />
                                    @if(app()->getLocale() == 'np')
                                        {{ $settings->phone_number_np }}
                                    @else
                                        {{ $settings->phone_number_en }}
                                    @endif
                                </p>
                                @endisset
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/mail.png') }}" class="w-6 h-6 " alt="{{ __('footer.email_icon_alt') }}" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                            @isset($settings->email)
                                <p><b>{{ __('footer.contact.email') }}</b></p>
                                <p>
                                    @isset($settings->email)
                                        {{ $settings->email }}
                                    @endisset
                                    @isset($settings->agent_notify_email)
                                        {{ $settings->agent_notify_email }}
                                    @endisset
                                </p>
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <!-- links -->
                <div
                    class=" flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center md:text-left items-center gap-10 mx-auto lg:mx-3 ">
                    
                    <div class="text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class=" text-accent font-bold text-left">{{ __('footer.quick_links') }}</h4>
                        @forelse($footerQuickLinks['quickLinks'] as $quickLink)
                            @if($quickLink->external_link)
                                <a href="{{ $quickLink->external_link }}" target="_blank" class="hover:underline text-left">
                                    @if(app()->getLocale() == 'np')
                                        {{ $quickLink->name_np }}
                                    @else
                                        {{ $quickLink->name_en }}
                                    @endif
                                </a>
                            @endif
                        @empty
                            <a href="{{ route('homepage') }}" class="hover:underline text-left">{{ __('footer.default_links.home') }}</a>
                            <a href="{{ route('aboutHulasRemittance') }}" class="hover:underline text-left">{{ __('footer.default_links.about') }}</a>
                            <a href="{{ route('contactUs') }}" class="hover:underline text-left">{{ __('footer.default_links.contact') }}</a>
                        @endforelse
                    </div>
                    
                    @if(isset($footerQuickLinks['extraLinks']))
                    <div class="text-[#ffffffcc] flex flex-col space-y-2 text-center lg:text-left">
                        @foreach($footerQuickLinks['extraLinks'] as $link)
                            @if($link->external_link)
                                <a href="{{ $link->external_link }}" target="_blank" class="hover:underline text-left">
                                    @if(app()->getLocale() == 'np')
                                        {{ $link->name_np }}
                                    @else
                                        {{ $link->name_en }}
                                    @endif
                                </a>
                            @endif
                        @endforeach
                    </div>
                    @endif
                    
                    @if(isset($footerQuickLinks['moreLinks']))
                    <div class="text-[#ffffffcc] flex flex-col space-y-2 text-center lg:text-left">
                        @foreach($footerQuickLinks['moreLinks'] as $link)
                            @if($link->external_link)
                                <a href="{{ $link->external_link }}" target="_blank" class="hover:underline text-left">
                                    @if(app()->getLocale() == 'np')
                                        {{ $link->name_np }}
                                    @else
                                        {{ $link->name_en }}
                                    @endif
                                </a>
                            @endif
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- bottom footer -->
            <div class="flex flex-col md:flex-row md:justify-between items-center gap-6 lg:px-10 text-xs">
                <p>{{ __('footer.copyright') }}</p>
                <p>
                    {{ __('footer.designed_by') }}
                    <a href="https://dev.awt.cloud/" class="text-[#0000cc] font-bold">AWT</a>
                </p>
                <a href="https://www.westernunion.com/np/en/home.html">
                    <img src="{{ asset('assets/images/logo/WesternUnion_HorizontalLockup_YellowWhite.png') }}"
                        class="w-44 h-5" alt="{{ __('footer.western_union_logo_alt') }}" />
                </a>
            </div>
        </div>
    </div>
</footer>