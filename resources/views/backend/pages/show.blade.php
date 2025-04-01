@extends('backend.layouts.main')

@section('title')
    View Page: {{ $page->title }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Page Details: {{ $page->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('pages.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-4 fw-semibold text-muted">Title:</div>
                                    <div class="col-md-8">{{ $page->title }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Slug:</div>
                                    <div class="col-md-8">{{ $page->slug }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Menu:</div>
                                    <div class="col-md-8">
                                        @if ($page->menu)
                                            <a href="{{ route('menus.show', $page->menu) }}">{{ $page->menu->bname }}</a>
                                        @else
                                            <span class="text-muted">No Menu</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Short Description:</div>
                                    <div class="col-md-8">{{ $page->short_description ?? 'Not provided' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="block block-rounded mt-4">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Additional Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $page->created_at->format('F d, Y h:i A') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $page->updated_at->format('F d, Y h:i A') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Image</h3>
                            </div>
                            <div class="block-content">
                                @if ($page->image)
                                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}"
                                        class="img-fluid rounded">
                                @else
                                    <div class="alert alert-info">
                                        <i class="fa fa-image me-1"></i> No image available
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Content</h3>
                    </div>
                    <div class="block-content">
                        <div class="content-preview p-3 bg-body-light rounded">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
