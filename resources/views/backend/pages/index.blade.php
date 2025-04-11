@extends('backend.layouts.main')

@section('title')
    Pages
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Page List</h3>
                <div class="block-options">
                    <a href="{{ route('pages.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Page
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.N.</th>
                                <th class="d-none d-sm-table-cell" style="width: 100px;">Image</th>
                                <th>Title</th>
                                <th class="d-none d-md-table-cell">Slug</th>
                                <th class="d-none d-lg-table-cell">Menu</th>
                                <th class="d-none d-md-table-cell text-left" style="width: 150px;">Display Order</th>
                                <th class="d-none d-md-table-cell text-left" style="width: 150px;">Status</th>
                                <th style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr id="page-row-{{ $page->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="d-none d-sm-table-cell" style="width: 60px; text-align: center;">
                                        @if ($page->image)
                                            <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;" class="img-fluid">
                                        @else
                                            <span class="text-muted" style="display: inline-block; width: 50px; height: 50px;">
                                                <i class="fa fa-image" style="font-size: 24px; line-height: 50px;"></i>
                                            </span>
                                        @endif
                                    

                                    </td>
                                    <td>
                                        {{ $page->title_en }}<br>
                                        {{ $page->title_np }}
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $page->slug }}</td>
                                    <td class="d-none d-md-table-cell">
                                        @if ($page->menu)
                                            <a href="{{ route('menus.show', $page->menu) }}">{{ $page->menu->name_en }}</a>
                                        @else
                                            <span class="text-muted">No Menu</span>
                                        @endif
                                    </td>
                                    <td class="d-none d-xl-table-cell text-center">
                                        {{ $page->display_order }}
                                    </td>
                                    <td class="d-none d-md-table-cell text-center">
                                        @if ($page->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                            @endif                                  
                                          </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('pages.show', $page) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('pages.edit', $page) }}" class="btn btn-sm btn-success"
                                                title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deletePage({{ $page->id }})" title="Delete">
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

        function deletePage(pageId) {
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
                    let url = "{{ route('pages.destroy', ':id') }}".replace(':id', pageId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the page row from the table
                            $('#page-row-' + pageId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Page has been deleted.',
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
                                text: 'There was an error deleting the page.',
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
