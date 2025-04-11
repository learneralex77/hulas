@extends('backend.layouts.main')

@section('title')
    Forex-rates Management
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Forex-rates List</h3>
                <div class="block-options">
                    <a href="{{ route('forex-rates.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Forex-rate
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-left">S.N.</th>
                                <th>Name</th>
                                <th>File</th>
                                <th class="text-left">Display Order</th>
                                <th>Status</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forex-rates as $forex-rate)
                                <tr id="forex-rate-row-{{ $forex-rate->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        @if($forex-rate->name)
                                            {{ $forex-rate->name }}
                                        @elseif($forex-rate->translations->isNotEmpty())
                                            @php
                                                $translation = $forex-rate->translations->first();
                                                $names = json_decode($translation->name, true);
                                            @endphp

                                            @if (!empty($names) && isset($names[0]))
                                                {{ $names[0] }}
                                            @else
                                                <span class="text-muted">Name not found</span>
                                            @endif
                                        @else
                                            <span class="text-muted">No name defined</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($forex-rate->file)
                                            <a href="{{ asset('storage/' . $forex-rate->file) }}" target="_blank"
                                                class="btn btn-sm btn-alt-info">
                                                <i class="fa fa-file"></i> View
                                            </a>
                                        @else
                                            <span class="text-muted">No file</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $forex-rate->display_order }}</td>

                                    <td class="text-center">
                                        @if ($forex-rate->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('forex-rates.show', $forex-rate) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('forex-rates.edit', $forex-rate) }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteForex-rate({{ $forex-rate->id }})" title="Delete">
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
    <script>
        // Success message
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        @endif

        // Error message
        @if (session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        @endif

        function deleteForex-rate(forex-rateId) {
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
                    let url = "{{ route('forex-rates.destroy', ':id') }}".replace(':id', forex-rateId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the forex-rate row from the table
                            $('#forex-rate-row-' + forex-rateId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Forex-rate has been deleted.',
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
                                text: 'There was an error deleting the forex-rate.',
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
    </script>
@endsection
