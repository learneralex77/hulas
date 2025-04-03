@extends('backend.layouts.main')

@section('title')
    Department Management
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Department List</h3>
                <div class="block-options">
                    <a href="{{ route('departments.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Department
                    </a>
                </div>
            </div>
            <div class="block-content">
                

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 50px;">S.N.</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell text-left">Display Order</th>
                                <th class="text-left">Status</th>
                                <th class="text-left" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr id="department-row-{{ $department->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td class="d-none d-md-table-cell text-center">{{ $department->display_order }}</td>
                                    <td class="text-center">
                                        @if ($department->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('departments.show', $department) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('departments.edit', $department) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteDepartment({{ $department->id }})" title="Delete">
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

        function deleteDepartment(departmentId) {
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
                    let url = "{{ route('departments.destroy', ':id') }}".replace(':id', departmentId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the department row from the table
                            $('#department-row-' + departmentId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Department has been deleted.',
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
                                text: 'There was an error deleting the department.',
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
