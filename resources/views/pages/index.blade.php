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
                    <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add New Page
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
                                <th class="d-none d-sm-table-cell" style="width: 100px;">Image</th>
                                <th>Title</th>
                                <th class="d-none d-md-table-cell">Slug</th>
                                <th class="d-none d-lg-table-cell">Menu</th>
                                <th class="d-none d-xl-table-cell" style="width: 150px;">Created At</th>
                                <th class="text-center" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $page)
                                <tr>
                                    <td class="text-center">{{ $page->id }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        @if ($page->image)
                                            <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" style="max-height: 40px;" class="img-fluid">
                                        @else
                                            <span class="text-muted"><i class="fa fa-image"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $page->title }}
                                        @if($page->short_description)
                                            <div class="text-muted fs-sm">{{ Str::limit($page->short_description, 30) }}</div>
                                        @endif
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $page->slug }}</td>
                                    <td class="d-none d-lg-table-cell">
                                        @if($page->menu)
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
                                            <a href="{{ route('pages.show', $page) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('pages.edit', $page) }}" class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('pages.destroy', $page) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this page?')">
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
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 