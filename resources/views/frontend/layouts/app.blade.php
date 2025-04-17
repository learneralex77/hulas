<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="AWT" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hulas Remmittance : : @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/images/icon/icon.jpg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css" />

    @yield('styles')
    @stack('styles')

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
 --first-color: #4c86f9;
 --second-color: #49a84c;
 --third-color: #f6bb02;
 --fourth-color: #f6bb02;
 --fifth-color: #2196f3;
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
 0%, 40%, 100% {
  transform: scaleY(0.05);
 }

 20% {
  transform: scaleY(1);
 }
}
    </style>
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
</div>    </div>

    <!-- Content -->
    <div id="content" class="wrapper">
        <!-- Go to Top Button -->
        <button id="goToTopBtn"
            class="z-50 fixed bottom-4 right-4 bg-accent text-white p-2 rounded-full shadow-lg transform transition-transform duration-300 hover:scale-110 hover:bg-black-600 hidden">
            <img src="{{ asset('assets/images/up-chevron-svgrepo-com.png') }}" alt="go-to-top-button" class="w-10 h-10">
        </button>

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


        window.onload = function () {
            showPreloader();
            setTimeout(function () {
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

        $(document).ready(function () {
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

        window.onscroll = function () {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                goToTopBtn.classList.remove("hidden");
            } else {
                goToTopBtn.classList.add("hidden");
            }
        };

        goToTopBtn.onclick = function () {
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
