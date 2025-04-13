@extends('backend.layouts.main')

@section('title')
    Services Management
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Services List</h3>
                <div class="block-options">
                    <a href="{{ route('services.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Service
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
                            @foreach ($services as $service)
                                <tr id="service-row-{{ $service->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        @if($service->name_en)
                                            {{ $service->name_en }}
                                        @elseif($service->translation_names)
                                            @php
                                                $names = $service->translation_names;
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
                                        @if ($service->file)
                                            <a href="{{ asset('storage/' . $service->file) }}" target="_blank"
                                                class="btn btn-sm btn-alt-info">
                                                <i class="fa fa-file"></i> View
                                            </a>
                                        @else
                                            <span class="text-muted">No file</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $service->display_order }}</td>

                                    <td class="text-center">
                                        @if ($service->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteService({{ $service->id }})" title="Delete">
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

        function deleteService(serviceId) {
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
                    let url = "{{ route('services.destroy', ':id') }}".replace(':id', serviceId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the service row from the table
                            $('#service-row-' + serviceId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Service has been deleted.',
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
                                text: 'There was an error deleting the service.',
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
