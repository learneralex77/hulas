@extends('layouts.main')

@section('title')
    Department Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Department List</h3>
                <div class="block-options">
                    <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add New Department
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.N.</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell text-center">Display Order</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                                <tr>
                                    <td class="text-center">{{ $department->id }}</td>
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
                                        <div class="btn-group">
                                            <a href="{{ route('departments.show', $department) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this department?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No departments found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 