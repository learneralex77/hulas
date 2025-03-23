@extends('layouts.main')

@section('title')
    View Publication
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Publication Details</h3>
                <div class="block-options">
                    <a href="{{ route('publications.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('publications.edit', $publication) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="mb-3">{{ $publication->title }}</h2>
                        
                        @if($publication->image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $publication->image) }}" 
                                     alt="{{ $publication->title }}" 
                                     class="img-fluid rounded">
                            </div>
                        @endif
                        
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $publication->id }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $publication->category->name ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <th>Publication Type</th>
                                <td>{{ $publication->publication_type }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ $publication->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Content</th>
                                <td>{!! nl2br(e($publication->content)) !!}</td>
                            </tr>
                            <tr>
                                <th>Published By</th>
                                <td>{{ $publication->published_by ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $publication->display_order }}</td>
                            </tr>
                            <tr>
                                <th>External Link</th>
                                <td>
                                    @if($publication->external_link)
                                        <a href="{{ $publication->external_link }}" target="_blank">
                                            {{ $publication->external_link }}
                                            <i class="fa fa-external-link-alt ms-1"></i>
                                        </a>
                                    @else
                                        None
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($publication->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $publication->created_at->format('M d, Y H:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $publication->updated_at->format('M d, Y H:i A') }}</td>
                            </tr>
                        </table>
                        
                        <div class="mt-4">
                            <form action="{{ route('publications.destroy', $publication) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this publication?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-1"></i> Delete Publication
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 