@extends('layouts.main')

@section('title')
    Gallery Management
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Gallery List</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Gallery
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.N.</th>
                                <th class="d-none d-sm-table-cell" style="width: 80px;">Image</th>
                                <th>Title</th>
                                <th class="d-none d-lg-table-cell text-center" style="width: 70px;">Order</th>
                                <th class="text-center">Status</th>
                                <th class="d-none d-md-table-cell text-center">Featured</th>
                                <th class="text-center" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                                <tr id="gallery-row-{{ $gallery->id }}">
                                    <td class="text-center">{{ $gallery->id }}</td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        @if ($gallery->featured_image)
                                            <img src="{{ asset('storage/' . $gallery->featured_image) }}"
                                                alt="{{ $gallery->title }}" class="img-thumbnail" style="max-height: 50px;">
                                        @else
                                            <span class="text-muted"><i class="fa fa-image"></i></span>
                                        @endif
                                    </td>
                                    <td>{{ $gallery->title }}</td>
                                    <td class="d-none d-lg-table-cell text-center">{{ $gallery->display_order }}</td>

                                    <td class="text-center">
                                        @if ($gallery->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="d-none d-md-table-cell text-center">
                                        @if ($gallery->is_featured)
                                            <span class="badge bg-success">Featured</span>
                                        @else
                                            <span class="badge bg-warning">No</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('galleries.show', $gallery->id) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('galleries.edit', $gallery->id) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteGallery({{ $gallery->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No galleries found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-dataTable-full').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthChange: true,
                pageLength: 5,
                columnDefs: [{
                    orderable: false,
                    targets: [0, 6] // First column (S.N.) and Actions column
                }],
                order: [],
                language: {
                    searchPlaceholder: "Search galleries...",
                }
            });
        });

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

        function deleteGallery(galleryId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('galleries.destroy', ':id') }}".replace(':id', galleryId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the gallery row from the table
                            $('#gallery-row-' + galleryId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Gallery has been deleted.',
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
                                text: 'There was an error deleting the gallery.',
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
