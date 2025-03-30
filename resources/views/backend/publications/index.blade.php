@extends('layouts.main')

@section('title')
    Publications
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Publications</h3>
                <div class="block-options">
                    <a href="{{ route('publications.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Publication
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
                            <th style="width: 70px;">S.N.</th>
                            <th style="width: 100px;">Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($publications as $publication)
                            <tr>
                                <td class="text-center">{{ $publication->id }}</td>
                                <td>
                                    @if ($publication->image)
                                        <img src="{{ asset('storage/' . $publication->image) }}"
                                            alt="{{ $publication->title }}" class="img-fluid" style="max-height: 50px;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $publication->title }}</strong>
                                    <div class="text-muted small">{{ Str::limit($publication->short_description, 50) }}
                                    </div>
                                </td>
                                <td>{{ $publication->category->name ?? 'None' }}</td>
                                <td>{{ $publication->publication_type }}</td>
                                <td>
                                    @if ($publication->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('publications.show', $publication) }}" class="btn btn-sm btn-info"
                                            title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('publications.edit', $publication) }}"
                                            class="btn btn-sm btn-success" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('publications.destroy', $publication) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this publication?')">
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
                                <td colspan="7" class="text-center">No publications found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-4">
                    {{ $publications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
