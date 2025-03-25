@extends('layouts.main')

@section('title')
    News & Event Category Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">News & Event Category Details: {{ $newsEventCategory->name }}</h3>
                <div class="block-options">
                <a href="{{ route('news-event-categories.edit', $newsEventCategory) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-alt-secondary me-2">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-4">
                            <label class="col-md-2 col-form-label fw-bold">Name</label>
                            <div class="col-md-6">
                                {{ $newsEventCategory->name }}
                            </div>
                            <label class="col-md-1 col-form-label fw-bold">Status</label>
                            <div class="col-md-3">
                                @if($newsEventCategory->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-danger">Unpublished</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-2 col-form-label fw-bold">Slug</label>
                            <div class="col-md-10">
                                {{ $newsEventCategory->slug }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-2 col-form-label fw-bold">Description</label>
                            <div class="col-md-10">
                                {!! nl2br(e($newsEventCategory->description)) !!}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-2 col-form-label fw-bold">Created At</label>
                            <div class="col-md-10">
                                {{ $newsEventCategory->created_at->format('F j, Y g:i A') }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-2 col-form-label fw-bold">Updated At</label>
                            <div class="col-md-10">
                                {{ $newsEventCategory->updated_at->format('F j, Y g:i A') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 