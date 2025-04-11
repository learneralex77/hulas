@extends('backend.layouts.main')

@section('title')
    Forex Rates Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Forex Rates List</h3>
                <div class="block-options">
                    <a href="{{ route('forex-rate.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit Forex Rates
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-left">S.N.</th>
                                <th>Date</th>
                                {{-- <th>Time Slot</th> --}}
                                <th>Flag</th>
                                <th>Currency</th>
                                {{-- <th>Unit</th> --}}
                                <th>Buying Rate</th>
                                <th>Display Order</th>
                                <th>Status</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $combinedRates = $morningRates->concat($afternoonRates)->sortBy('time_slot');
                            @endphp

                            @foreach ($combinedRates as $rate)
                                <tr id="forex-rate-row-{{ $rate->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $rate->date }}</td>
                                    {{-- <td>{{ ucfirst($rate->time_slot) }}</td> --}}
                                    <td>{{ $rate->flag }}</td>
                                    <td>{{ $rate->currency }}</td>
                                    {{-- <td>{{ $rate->unit }}</td> --}}
                                    <td>{{ $rate->buying_rate }}</td>
                                    <td class="text-center">{{ $rate->display_order }}</td>
                                    <td class="text-center">
                                        @if ($rate->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteForexRate({{ $rate->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script>
        function deleteForexRate(rateId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('forex-rate.destroy', ':id') }}".replace(':id', rateId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#forex-rate-row-' + rateId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Forex rate has been deleted.',
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false,
                                position: 'top-end',
                                toast: true
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error deleting the forex rate.',
                                icon: 'error',
                                timer: 3000,
                                showConfirmButton: false,
                                position: 'top-end',
                                toast: true
                            });
                        }
                    });
                }
            });
        }
    </script> --}}
@endsection
