@extends('layouts.main')

@section('title')
    Menu Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default mb-2">
                <h3 class="block-title">Menu List</h3>
                <div class="block-options">
                    <a href="{{ route('menus.create') }}" class="btn btn-sm btn-alt-primary border-0">
                        <i class="fa fa-plus"></i> Add New Menu
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
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">#</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell" style="width: 15%;">Description</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Slug</th>
                                <th class="text-center" style="width: 7%;">Order</th>
                                <th class="text-center" style="width: 10%;">Status</th>
                                <th class="d-none d-lg-table-cell" style="width: 15%;">Parent</th>
                                <th class="text-center" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menus as $menu)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }} </td>
                                    <td>{{ $menu->bname }}</td>
                                    <td class="d-none d-md-table-cell">{{ Str::limit($menu->description, 50) }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $menu->slug }}</td>
                                    <td class="text-center">{{ $menu->display_order }}</td>
                                    <td class="text-center">
                                        @if ($menu->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="d-none d-lg-table-cell">{{ $menu->parent ? $menu->parent->bname : '-' }}</td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('menus.show', $menu) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this menu?')">
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
                                    <td colspan="8" class="text-center">No menus found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 