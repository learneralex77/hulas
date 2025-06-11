@extends('frontend.layouts.app')
@section('title', __('find-agent.title'))
@section('meta', __('find-agent.meta_title'))
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
                <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="{{ __('find-agent.title') }}"
                    class="h-60 w-full object-cover" />
            </div>
            <div class="absolute w-full top-20">
                <div class="flex flex-col space-y-8 ml-10">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">{{ __('find-agent.intro.title') }}</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">{{ __('find-agent.breadcrumb.home') }}</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('findAnAgent') }}" class="text-accent font-bold">{{ __('find-agent.breadcrumb.find_agent') }}</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->
        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40">

            <div class="">
                <section class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center space-y-6">
                            <h1 class="font-bold text-accent uppercase text-lg tracking-wider" style="
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
                                -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                ">
                                {{ __('find-agent.intro.title') }}
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center">
                                {{ __('find-agent.intro.subtitle') }}
                            </p>

                            <p class="p-2 text-lg text-[#737879] text-center max-w-4xl">
                                {{ __('find-agent.intro.description') }}
                            </p>
                        </div>
                    </div>
                </section>

                <div class="my-8">
                    <div>
                        <div class="container mx-auto py-8">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>{{ __('find-agent.table.district.label') }}</th>
                                        <th>{{ __('find-agent.table.agent_name.label') }}</th>
                                        <th>{{ __('find-agent.table.address.label') }}</th>
                                        <th>{{ __('find-agent.table.contact_no.label') }}</th>
                                        <th>{{ __('find-agent.table.contact_person.label') }}</th>
                                    </tr>
                                    <tr>
                                        <th><input type="text" class="p-1 m-1 w-36" placeholder="{{ __('find-agent.table.district.search_placeholder') }}" /></th>
                                        <th><input type="text" class="p-1 m-1 w-36" placeholder="{{ __('find-agent.table.agent_name.search_placeholder') }}" /></th>
                                        <th><input type="text" class="p-1 m-1 w-36" placeholder="{{ __('find-agent.table.address.search_placeholder') }}" /></th>
                                        <th><input type="text" class="p-1 m-1 w-36" placeholder="{{ __('find-agent.table.contact_no.search_placeholder') }}" /></th>
                                        <th><input type="text" class="p-1 m-1 w-36" placeholder="{{ __('find-agent.table.contact_person.search_placeholder') }}" /></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agentDetails as $agent)
                                        <tr>
                                            <td>{{ $agent->district->name ?? $agent->district_id }}</td>
                                            <td>{!! app()->getLocale() == 'en' ? $agent->state_agent_name_en : (isset($agent->state_agent_name_np) ? $agent->state_agent_name_np : $agent->state_agent_name_en) !!}</td>
                                            <td>{!! app()->getLocale() == 'en' ? $agent->address_en : (isset($agent->address_np) ? $agent->address_np : $agent->address_en) !!}</td>
                                            <td>{!! app()->getLocale() == 'en' ? $agent->contact_no_en : (isset($agent->contact_no_np) ? $agent->contact_no_np : $agent->contact_no_en) !!}</td>
                                            <td>{!! app()->getLocale() == 'en' ? $agent->contact_person_en : (isset($agent->contact_person_np) ? $agent->contact_person_np : $agent->contact_person_en) !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
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