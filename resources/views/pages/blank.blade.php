@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <main>
        <!-- Page Content -->
        <div class="content content-full">
            <!-- Hero -->
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
            <!-- END Hero -->

            <!-- Dummy content -->
            <div class="row">
                <div class="col-12">
                    <div class="block block-rounded">
                        <div class="block-content">
                            {{-- <p class="text-center py-7">...</p> --}}
                            <!-- Dynamic Table Responsive -->
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title text-primary">

                                        <button type="button" class="btn bg-primary btn-info me-1 mb-1">
                                            <i class="fa fa-plus opacity-50 me-1"></i> Add Users
                                        </button>
                                    </h3>
                                </div>
                                <div class="block-content block-content-full overflow-x-auto">
                                    <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-hover table-vcenter js-dataTable-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center"></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th style="width: 15%;">Access</th>
                                                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Profile
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="fw-semibold">Wayne Garcia</td>
                                                <td>customer1@example.com</td>
                                                <td>
                                                    <span class="badge bg-primary">Personal</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="fw-semibold">Albert Ray</td>
                                                <td>customer2@example.com</td>
                                                <td>
                                                    <span class="badge bg-primary">Personal</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="fw-semibold">David Fuller</td>
                                                <td>customer3@example.com</td>
                                                <td>
                                                    <span class="badge bg-warning">Trial</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="fw-semibold">Lisa Jenkins</td>
                                                <td>customer4@example.com</td>
                                                <td>
                                                    <span class="badge bg-primary">Personal</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="fw-semibold">Carol Ray</td>
                                                <td>customer5@example.com</td>
                                                <td>
                                                    <span class="badge bg-success">VIP</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="tooltip" title="View Customer">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- Dynamic Table Responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Dummy content -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection

@section('css')
    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}" />

    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}" />

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
@endsection

@section('js')
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
    <!-- jQuery (required for DataTables plugin) -->
    <script type="text/javascript" src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endsection
