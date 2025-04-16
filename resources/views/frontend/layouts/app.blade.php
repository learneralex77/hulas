<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="AWT" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <meta name="description" content="{{ $settings->meta_description }}" />
    <meta name="keywords" content="{{ $settings->keywords }}">
    <!-- {!! $settings->schema_markup !!} -->

    <link rel="canonical" href="{{ $settings->canonical_url }}"> --}}

    <title>Hulas Remmittance : : @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/images/icon/icon.jpg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    {{-- flag-icon-css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css" />


    @yield('styles')
    @stack('styles')
</head>

<body>
    <div id="preloader"
        class="flex-col gap-4 w-full h-screen flex items-center justify-center bg-white fixed inset-0 z-50">
        <div
            class="w-20 h-20 border-4 border-transparent text-blue-400 text-4xl animate-spin flex items-center justify-center border-t-blue-400 rounded-full">
            <div
                class="w-16 h-16 border-4 border-transparent text-red-400 text-2xl animate-spin flex items-center justify-center border-t-red-400 rounded-full">
            </div>
        </div>
    </div>

    <!-- Your main content -->
    <div id="content">
        <!-- Go to Top Button -->
        <button id="goToTopBtn"
            class="z-50 fixed bottom-4 right-4 bg-accent text-white p-2 rounded-full shadow-lg transform transition-transform duration-300 hover:scale-110 hover:bg-black-600 hidden">
            <img src="{{ asset('assets/images/up-chevron-svgrepo-com.png') }}" alt="go-to-top-button" class="w-10 h-10"> </button>

        @include('frontend..layouts.partials.header')

        @yield('content')

        @include('frontend..layouts.partials.footer')

        <script src="{{ asset('assets/js/main.js') }}"></script>
        {{-- jquery --}}
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>

        {{-- jquery ui --}}
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>

        {{-- sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- select2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        {{-- loading overlay --}}
        <script src="{{ asset('plugins/js-loading-overlay/js-loading-overlay.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

        {{-- flowbite --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>


        <script>
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
                    })
                }

                const hasErrorMessage = "{{ session()->has('error') ? true : false }}";
                if (hasErrorMessage) {
                    Toast.fire({
                        icon: 'error',
                        title: "{{ session('error') }}"
                    })
                }
            });

            $(function() {
                $('.overlayButton').click(displayOverlay);
            });

            function displayOverlay() {
                JsLoadingOverlay.show({
                    'overlayBackgroundColor': '#666666',
                    'overlayOpacity': 0.6,
                    'spinnerIcon': 'ball-pulse-sync',
                    'spinnerColor': '#000066',
                    'spinnerSize': '2x',
                    'overlayIDName': 'overlay',
                    'spinnerIDName': 'spinner',
                    'spinnerZIndex': 99999,
                    'overlayZIndex': 99998
                });
            }

            function hideOverlay() {
                JsLoadingOverlay.hide();
            }
        </script>

        @yield('scripts')
        @stack('scripts')
    </div>

    <script>
        window.onload = function() {
            const preloader = document.getElementById('preloader');
            const content = document.getElementById('content');

            preloader.style.display = 'none'; // Hide preloader
            content.classList.remove('hidden'); // Show content
        };

        // Get the button
        let goToTopBtn = document.getElementById("goToTopBtn");

        // When the user scrolls down 100px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                goToTopBtn.classList.remove("hidden");
            } else {
                goToTopBtn.classList.add("hidden");
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        goToTopBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };


    </script>
</body>

</html>
