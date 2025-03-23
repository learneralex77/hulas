@extends('layouts.main')

@section('title')
    Page Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Page List</h3>
                <div class="block-options">
                    <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add New Page
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th style="width: 80px;">Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Menu</th>
                            <th>Created At</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <td class="text-center">{{ $page->id }}</td>
                                <td class="text-center">
                                    @if($page->image)
                                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="img-thumbnail" style="max-height: 50px;">
                                    @else
                                        <span class="text-muted"><i class="fa fa-image"></i></span>
                                    @endif
                                </td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->menu->bname ?? 'No Menu' }}</td>
                                <td>{{ $page->created_at->format('M d, Y') }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('pages.show', $page->id) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this page?')">
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
                                <td colspan="7" class="text-center">No pages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 