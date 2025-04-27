@extends('backend.layouts.main')

@section('title')
    Gallery Management
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
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table">
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 50px;">S.N.</th>
                                <th class="d-none d-sm-table-cell" style="width: 80px;">Image</th>
                                <th>Title</th>
                                <th class="d-none d-lg-table-cell text-left" style="width: 70px;">Order</th>
                                <th class="text-left">Status</th>
                                <th class="d-none d-md-table-cell text-left">Featured</th>
                                <th class="text-left" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr id="gallery-row-{{ $gallery->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="d-none d-sm-table-cell text-center" style="width: 60px;">
                                        @if ($gallery->featured_image)
                                            <img src="{{ asset('storage/' . $gallery->featured_image) }}"
                                                alt="{{ $gallery->title_en }}" class="img-thumbnail"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted" style="display: inline-block; width: 50px; height: 50px;">
                                                <i class="fa fa-image" style="font-size: 24px; line-height: 50px;"></i>
                                            </span>
                                        @endif
                                    </td>

                                    <td>{{ $gallery->title_en }}</td>
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
                                            <!-- Alternative delete form -->
                                            <form id="delete-form-{{ $gallery->id }}" action="{{ route('galleries.destroy', $gallery->id) }}" 
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
                    let token = $('meta[name="csrf-token"]').attr('content');
                    
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            "_token": token,
                            "_method": "DELETE"
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
                            console.error('Delete error:', xhr.responseText);
                            let errorMessage = 'There was an error deleting the gallery.';
                            
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                            
                            Swal.fire({
                                title: 'Error!',
                                text: errorMessage,
                                icon: 'error',
                                showConfirmButton: true
                            });
                            
                            // Fallback to form submission if AJAX fails
                            if (xhr.status === 419) { // CSRF token mismatch
                                document.getElementById('delete-form-' + galleryId).submit();
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
