<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>AWT :: @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Modules -->
    @vite(['resources/sass/main.scss', 'resources/js/codebase/app.js'])

    @yield('styles')
    @stack('styles')
</head>

<body>
    <div id="page-container"
        class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content remember-theme">
        @include('layouts.menu.sidebar')
        @include('layouts.menu.navbar')

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>

        <!-- END Main Container -->
        @include('layouts.footer')
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
</body>

</html>
