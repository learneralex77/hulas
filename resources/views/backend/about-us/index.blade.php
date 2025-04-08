@extends('backend.layouts.main')

@section('title')
    About Us
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">About Us Information</h3>
                <div class="block-options">
                    <a href="{{ route('about-us.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add About Us
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($aboutUs->isEmpty())
                    <div class="alert alert-info">
                        No About Us information has been added yet. Please click the "Add About Us" button to create one.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">S.N.</th>
                                    <th class="d-none d-sm-table-cell">Image</th>
                                    <th>Tagline</th>
                                    <th class="d-none d-sm-table-cell text-left">Years of Experience</th>
                                    <th class="d-none d-sm-table-cell text-left">Display Order</th>
                                    <th class="d-none d-sm-table-cell text-left">Status</th>
                                    <th style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aboutUs as $index => $item)
                                    <tr id="about-us-row-{{ $item->id }}">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="d-none d-sm-table-cell text-center" style="width: 60px;">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                alt="Image" class="img-thumbnail"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted" style="display: inline-block; width: 50px; height: 50px;">
                                                <i class="fa fa-image" style="font-size: 24px; line-height: 50px;"></i>
                                            </span>
                                        @endif
                                    </td>
                                        <td>{{ Str::limit($item->tagline, 50) }}</td>
                                        <td class="d-none d-sm-table-cell text-center">{{ $item->years_of_experience ?? 'N/A' }}</td>
                                        <td class="d-none d-sm-table-cell text-center">{{ $item->display_order }}</td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            @if($item->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="gap-2">
                                                <a href="{{ route('about-us.show', $item) }}" class="btn btn-sm btn-info"
                                                    data-bs-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('about-us.edit', $item) }}" class="btn btn-sm btn-success"
                                                    data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="deleteAboutUs({{ $item->id }})" data-bs-toggle="tooltip"
                                                    title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
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

        function deleteAboutUs(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! All About Us information including images will be permanently deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('about-us.destroy', ':id') }}".replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the row from the table
                            $('#about-us-row-' + id).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'About Us entry has been deleted.',
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
                                text: 'There was an error deleting the About Us entry.',
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
