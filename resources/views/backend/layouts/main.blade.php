<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>AWT :: @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

    <!-- Modules -->
    @vite(['resources/sass/main.scss', 'resources/js/codebase/app.js'])

    @yield('styles')
    @stack('styles')

</head>

<body>
    <div id="page-container"
        class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content remember-theme">
        @include('backend.layouts.menu.sidebar')
        @include('backend.layouts.menu.navbar')

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>

        <!-- END Main Container -->
        @include('backend.layouts.footer')
        <!-- END Footer -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-dataTable-full').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthChange: true,
                pageLength: 10, // Set default to 10
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ], // Options for entries dropdown
                columnDefs: [{
                    orderable: true,
                    targets: [0, 4] // First column (S.N.) and Actions column
                }],
                order: [],
                language: {
                    searchPlaceholder: "Search ...",
                }
            });
        });
    </script>

    @yield('scripts')
    @stack('scripts')
    <!-- END Page Container -->'
</body>

</html>
