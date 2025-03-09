@extends('layouts.backend')

@section('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    @vite(['resources/js/pages/datatables.js'])
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Heading -->
        <div class="block block-rounded block-transparent bg-image bg-image-bottom"
            style="background-image: url('{{ asset('assets/media/photos/photo13@2x.jpg') }}');">
            <div class="block-content bg-primary-dark-op">
                <div class="py-3 text-center">
                    <h1 class="h2 fw-bold text-white mb-2">Dashboard</h1>
                    <nav class="breadcrumb text-center text-white">
                        <a class="breadcrumb-item text-white" href="javascript:void(0)">Home >></a>
                        <a class="breadcrumb-item text-white" href="javascript:void(0)">Library >></a>
                        <a class="breadcrumb-item text-white" href="javascript:void(0)">Data >></a>
                        <span class="breadcrumb-item text-white active">Bootstrap</span>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Heading -->

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <button type="button" class="btn bg-primary btn-info me-1 mb-1" data-bs-toggle="tooltip" title="Add">
                    <i class="fa fa-plus opacity-50 me-1"></i> Add Users
                </button>
            </div>
            <div class="block-content block-content-full">

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 21; $i++)
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="fw-semibold">
                                    <a href="javascript:void(0)">John Doe</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    client{{ $i }}<span class="text-muted">@example.com</span>
                                </td>
                                <td class="text-muted">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                        title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                        title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                        title="View">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Dynamic Table <small>Export Buttons</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 21; $i++)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="fw-semibold">
                                    <a href="javascript:void(0)">John Smith</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    client{{ $i }}<span class="text-muted">@example.com</span>
                                </td>
                                <td class="text-muted">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                    title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                    title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    title="View">
                                    <i class="fa fa-eye"></i>
                                </button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
