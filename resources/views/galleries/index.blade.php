@extends('layouts.main')

@section('title')
    Gallery Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Gallery List</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add New Gallery
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th style="width: 80px;">Featured Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Order</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $gallery)
                            <tr>
                                <td class="text-center">{{ $gallery->id }}</td>
                                <td class="text-center">
                                    @if($gallery->featured_image)
                                        <img src="{{ asset('storage/' . $gallery->featured_image) }}" alt="{{ $gallery->title }}" class="img-thumbnail" style="max-height: 50px;">
                                    @else
                                        <span class="text-muted"><i class="fa fa-image"></i></span>
                                    @endif
                                </td>
                                <td>{{ $gallery->title }}</td>
                                <td>
                                    @if ($gallery->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($gallery->is_featured)
                                        <span class="badge bg-info">Featured</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                                <td>{{ $gallery->display_order }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this gallery?')">
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
                                <td colspan="7" class="text-center">No galleries found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 