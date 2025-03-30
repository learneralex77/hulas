@extends('layouts.main')

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
                                <th class="d-none d-xl-table-cell" style="width: 150px;">Created At</th>
                                <th class="text-center" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $page)
                                <tr id="page-row-{{ $page->id }}">
                                    <td class="text-center">{{ $page->id }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        @if ($page->image)
                                            <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}"
                                                style="max-height: 40px;" class="img-fluid">
                                        @else
                                            <span class="text-muted"><i class="fa fa-image"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $page->title }}
                                        @if ($page->short_description)
                                            <div class="text-muted fs-sm">{{ Str::limit($page->short_description, 30) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $page->slug }}</td>
                                    <td class="d-none d-lg-table-cell">
                                        @if ($page->menu)
                                            <a href="{{ route('menus.show', $page->menu) }}">{{ $page->menu->bname }}</a>
                                        @else
                                            <span class="text-muted">No Menu</span>
                                        @endif
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        {{ $page->created_at->format('M d, Y') }}
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
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No pages found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        let table = new DataTable('#table1');

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

