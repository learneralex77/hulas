@extends('layouts.main')

@section('title')
    Edit News & Event Category
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit News & Event Category: {{ $newsEventCategory->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="form-horizontal" action="{{ route('news-event-categories.update', $newsEventCategory) }}" method="POST" id="category-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $newsEventCategory->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label class="col-md-1 col-form-label">Status</label>
                                <div class="col-md-3">
                                    <div class="form-check form-switch pt-2">
                                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $newsEventCategory->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Published</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label" for="slug">Slug</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $newsEventCategory->slug) }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Leave empty to auto-generate from name</small>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label" for="description">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $newsEventCategory->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update Category
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 