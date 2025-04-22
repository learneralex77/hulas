@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')


    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.10/css/jquery.dataTables.min.css" />
        <style>
            .dataTables_wrapper {
                overflow: auto;
            }

            table.dataTable {
                width: 100% !important;
            }
        </style>
    @endpush

    <div class="min-h-screen">
        <!-- banner-section -->
        <section class="relative">
            <div class="mb-10">
                <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
                    alt="Banner Image" class="h-60 w-full object-cover" />
            </div>
            <div class="absolute w-full top-20">
                <div class="flex flex-col space-y-8 ml-10">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">Find an agent</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('findAnAgent') }}" class="text-accent font-bold">Find an agent</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->
        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40">

            <div class="">
                <section class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                            <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                                Find a Nearby Agent
                            </h1>
                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                Secure service, trusted agents.
                            </p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                Locate your nearest Hulas Remittance agent with ease. Use the table below to find trusted
                                partners
                                ready
                                to help
                                you send or receive money—quickly and securely.
                            </p>
                        </div>
                    </div>
                </section>

                <div class="container mx-auto py-8">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>District</th>
                                <th>Agent Name (EN)</th>
                                <th>Address (EN)</th>
                                <th>Contact No (EN)</th>
                                <th>Contact Person (EN)</th>
                            </tr>
                            <tr>
                                <th><input type="text" class="p-1 m-1 w-36" placeholder="Search District" /></th>
                                <th><input type="text" class="p-1 m-1 w-36" placeholder="Search Agent Name" /></th>
                                <th><input type="text" class="p-1 m-1 w-36" placeholder="Search Address" /></th>
                                <th><input type="text" class="p-1 m-1 w-36" placeholder="Search Contact No" /></th>
                                <th><input type="text" class="p-1 m-1 w-36" placeholder="Search Person" /></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agentDetails as $agent)
                                <tr>
                                    <td>{{ $agent->district_id }}</td>
                                    <td>{{ $agent->state_agent_name_en }}</td>
                                    <td>{{ $agent->address_en }}</td>
                                    <td>{{ $agent->contact_no_en }}</td>
                                    <td>{{ $agent->contact_person_en }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </div>


@endsection


@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>

    <!-- Script to initialize DataTable with column-specific search -->
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $("#myTable tfoot th").each(function () {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" placeholder="Search ' + title + '" />'
                );
            });

            // DataTable
            var table = $("#myTable").DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            var that = this;

                            $("input", this.footer()).on("keyup change clear", function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
                scrollX: true,
            });
        });
    </script>
@endpush