@extends('backend.layouts.main')

@section('title')
    Menu Management
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default mb-2">
                <h3 class="block-title">Menu List</h3>
                <div class="block-options">
                    <a href="{{ route('menus.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Menu
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">S.N.</th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Slug</th>
                                <th class="text-center" style="width: 7%;">Order</th>
                                <th class="d-none d-lg-table-cell" style="width: 15%;">Parent</th>
                                <th class="" style="width: 10%;">Status</th>
                                <th class="" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr id="menu-row-{{ $menu->id }}">
                                    <td class="text-center">{{ $loop->iteration }} </td>
                                    <td style="min-height: 60px;">
                                        @if($menu->name_np)
                                            <div>{{ $menu->name_en }}</div>
                                            <div>{{ $menu->name_np }}</div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-start" style="min-height: 42px;">{{ $menu->name_en }}</div>
                                        @endif
                                    </td>
                                    <td class="d-none d-sm-table-cell">{{ $menu->slug }}</td>
                                    <td class="text-center">{{ $menu->display_order }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $menu->parent ? $menu->parent->name_en : '-' }}</td>
                                    <td class="text-center">
                                        @if ($menu->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('menus.show', $menu) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-success"
                                                title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteMenu({{ $menu->id }})" title="Delete">
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

        function deleteMenu(menuId) {
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
                    let url = "{{ route('menus.destroy', ':id') }}".replace(':id', menuId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the menu row from the table dynamically
                                $('#menu-row-' + menuId).remove();

                                // Also remove any rows where the menu is a parent
                                $('tr[data-parent-id="' + menuId + '"]').each(function() {
                                    $(this).remove();
                                });

                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Menu has been deleted.',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    toast: true
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message || 'Something went wrong',
                                    icon: 'error',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    toast: true
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error deleting the menu.',
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
