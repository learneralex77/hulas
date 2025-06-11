<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="AWT" />
    <meta name="description" content="{{ $settings->meta_description }}" />
    <meta name="keywords" content="{{ $settings->keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- {!! $settings->schema_markup !!} -->

    <link rel="canonical" href="{{ $settings->canonical_url }}">

    <title>Hulas Remittance :: @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/small-logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    {{-- jquery --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>

    {{-- jquery ui --}}
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>

    {{-- jquery validation --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- flag icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

    {{-- sajan date picker --}}
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />

    {{-- flowbite --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        #preloader {
            position: fixed;
            inset: 0;
            background-color: #fff;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* From Uiverse.io by satyamchaudharydev */
        .loading {
            --speed-of-animation: 0.9s;
            --gap: 6px;
            --first-color: #f6bb02;
            --second-color: #f6bb02;
            --third-color: #f6bb02;
            --fourth-color: #f6bb02;
            --fifth-color: #f6bb02;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            gap: 6px;
            height: 100px;
        }

        .loading span {
            width: 8px;
            height: 100px;
            background: var(--first-color);
            animation: scale var(--speed-of-animation) ease-in-out infinite;
        }

        .loading span:nth-child(2) {
            background: var(--second-color);
            animation-delay: -0.8s;
        }

        .loading span:nth-child(3) {
            background: var(--third-color);
            animation-delay: -0.7s;
        }

        .loading span:nth-child(4) {
            background: var(--fourth-color);
            animation-delay: -0.6s;
        }

        .loading span:nth-child(5) {
            background: var(--fifth-color);
            animation-delay: -0.5s;
        }

        @keyframes scale {

            0%,
            40%,
            100% {
                transform: scaleY(0.05);
            }

            20% {
                transform: scaleY(1);
            }
        }

        /* Make Select2 container responsive */
        .select2-container {
            width: 100% !important;
            max-width: 100%;
            margin: 10px 0;
        }

        /* Style the selection box */
        .select2-container--classic .select2-selection--single {
            padding: 10px 14px;
            height: auto !important;
            min-height: 48px;
            border: 2px solid #6C757D;
            border-radius: 6px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        /* Style dropdown options */
        .select2-container--classic .select2-results__option {
            padding: 10px 12px;
            font-size: 1rem;
        }

        /* Style the dropdown box */
        .select2-container--classic .select2-dropdown {
            border: 2px solid #6C757D;
            border-top: none;
            font-size: 1rem;
        }

        /* Style the dropdown arrow */
        .select2-selection__arrow {
            height: 100% !important;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px;
        }

        /* Responsive font & padding on smaller screens */
        @media (max-width: 576px) {
            .select2-container--classic .select2-selection--single {
                padding: 8px 12px;
                font-size: 0.875rem;
            }

            .select2-container--classic .select2-results__option {
                padding: 8px 10px;
                font-size: 0.875rem;
            }

            .select2-container--classic .select2-dropdown {
                font-size: 0.875rem;
            }
        }
    </style>


    @yield('styles')
    @stack('styles')

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loading">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- Content -->
    <div id="content" class="wrapper">
           <button class="back-to-top">^</button>




        @include('frontend..layouts.partials.header')

        <main>
            @yield('content')
        </main>

        @include('frontend..layouts.partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('plugins/js-loading-overlay/js-loading-overlay.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
        let preloaderStartTime;

        function showPreloader() {
            preloaderStartTime = new Date().getTime();
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.display = 'flex';
            }
        }

        function hidePreloader() {
            const now = new Date().getTime();
            const elapsed = now - preloaderStartTime;

            const delay = Math.max(0, 1000 - elapsed);

            setTimeout(() => {
                const preloader = document.getElementById('preloader');
                if (preloader) {
                    preloader.style.display = 'none';
                }
            }, delay);
        }


        window.onload = function() {
            showPreloader();
            setTimeout(function() {
                hidePreloader();
            }, 100);
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        function inpNum(e) {
            e = e || window.event;
            var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
            var charStr = String.fromCharCode(charCode);
            if (!charStr.match(/^[0-9]+$/))
                e.preventDefault();
        }

        $(document).ready(function() {
            $('.select').select2({
                theme: "w-full border-2 rounded-md form-control",
            });

            const hasSuccessMessage = "{{ session()->has('success') ? true : false }}";
            if (hasSuccessMessage) {
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            }

            const hasErrorMessage = "{{ session()->has('error') ? true : false }}";
            if (hasErrorMessage) {
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            }

            $('.overlayButton').click(displayOverlay);
        });

        function displayOverlay() {
            JsLoadingOverlay.show({
                overlayBackgroundColor: '#666666',
                overlayOpacity: 0.6,
                spinnerIcon: 'ball-pulse-sync',
                spinnerColor: '#000066',
                spinnerSize: '2x',
                overlayIDName: 'overlay',
                spinnerIDName: 'spinner',
                spinnerZIndex: 99999,
                overlayZIndex: 99998
            });
        }

        function hideOverlay() {
            JsLoadingOverlay.hide();
        }


        let goToTopBtn = document.getElementById("goToTopBtn");

        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                goToTopBtn.classList.remove("hidden");
            } else {
                goToTopBtn.classList.add("hidden");
            }
        };

        goToTopBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>

    @yield('scripts')
    @stack('scripts')
</body>

</html>

