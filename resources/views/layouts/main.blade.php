<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>AWT :: @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Modules -->
    @vite(['resources/sass/main.scss', 'resources/js/codebase/app.js'])

    <!-- Custom CSS -->
    <style>
        /* Remove border radius from action buttons */
        .table .btn-group,
        .table .btn-group .btn {
            border-radius: 0 !important;
        }
        
        /* Fix spacing issues in forms */
        .block-content {
            padding-bottom: 1px !important;
        }
        
        .block-content form .row:last-child {
            margin-bottom: 0 !important;
        }
        
        .block-content form button[type="submit"] {
            margin-bottom: 0 !important;
        }
    </style>

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
    @yield('scripts')
    @stack('scripts')
    <!-- END Page Container -->
</body>

</html>
