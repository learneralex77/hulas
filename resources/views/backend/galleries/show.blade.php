@extends('backend.layouts.main')

@section('title')
    Gallery Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Gallery Details: {{ $gallery->title_en }}</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-4 fw-semibold text-muted">Title (English):</div>
                                    <div class="col-md-8">{{ $gallery->title_en }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Title (Nepali):</div>
                                    <div class="col-md-8">{{ $gallery->title_np ?? 'Not provided' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">External Link:</div>
                                    <div class="col-md-8">
                                        @if ($gallery->links)
                                            <a href="{{ $gallery->links }}" target="_blank">{{ $gallery->links }}</a>
                                        @else
                                            <span class="text-muted">Not provided</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $gallery->display_order }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="block block-rounded mt-4">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Status Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Status:</div>
                                    <div class="col-md-8">
                                        @if ($gallery->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Featured:</div>
                                    <div class="col-md-8">
                                        @if ($gallery->is_featured)
                                            <span class="badge bg-info">Featured</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created:</div>
                                    <div class="col-md-8">{{ $gallery->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Last Updated:</div>
                                    <div class="col-md-8">{{ $gallery->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Featured Image</h3>
                            </div>
                            <div class="block-content">
                                @if ($gallery->featured_image)
                                    <img src="{{ asset('storage/' . $gallery->featured_image) }}"
                                        alt="{{ $gallery->title_en }}" class="img-fluid rounded">
                                @else
                                    <div class="alert alert-info">
                                        <i class="fa fa-info-circle me-1"></i> No featured image available
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Gallery Images</h3>
                    </div>
                    <div class="block-content">
                        @if (!empty($gallery->images))
                            <div class="row">
                                @foreach ($gallery->images as $image)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <a href="{{ asset('storage/' . $image) }}" target="_blank"
                                            class="img-link img-link-zoom-in">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image"
                                                class="img-fluid img-thumbnail">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle me-1"></i> No images in this gallery
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
