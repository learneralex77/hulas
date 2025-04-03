@extends('backend.layouts.main')

@section('title')
    View Publication
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Publication Details: {{ $publication->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('publications.edit', $publication) }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('publications.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
              

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Basic Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">ID:</div>
                                    <div class="col-md-8">{{ $publication->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Title:</div>
                                    <div class="col-md-8">{{ $publication->title }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Category:</div>
                                    <div class="col-md-8">{{ $publication->category->name ?? 'None' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Publication Type:</div>
                                    <div class="col-md-8">{{ $publication->publication_type }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $publication->display_order }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Additional Details</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Status:</div>
                                    <div class="col-md-8">
                                        @if ($publication->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Published By:</div>
                                    <div class="col-md-8">{{ $publication->published_by ?? 'N/A' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">External Link:</div>
                                    <div class="col-md-8">
                                        @if ($publication->external_link)
                                            <a href="{{ $publication->external_link }}" target="_blank" class="btn btn-alt-primary">
                                                <i class="fa fa-external-link-alt"></i> Visit Link
                                            </a>
                                        @else
                                            <span class="text-muted">None</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $publication->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $publication->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Short Description</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-12">
                                {{ $publication->short_description ?: 'No short description provided.' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Content</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-12">
                                {!! nl2br(e($publication->content)) ?: 'No content provided.' !!}
                            </div>
                            
                        </div>
                    </div>
                    @if ($publication->image)
                    <div class="block block-rounded mb-4">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Featured Image</h3>
                        </div>
                        <div class="block-content">
                            <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}"
                                class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
