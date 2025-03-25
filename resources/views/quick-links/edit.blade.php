@extends('layouts.main')

@section('title')
    Edit Quick Link
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Quick Link: {{ $quickLink->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-alt-secondary">
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

                <form action="{{ route('quick-links.update', $quickLink) }}" method="POST" id="quick-link-form">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <!-- Row 1: Title and URL -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $quickLink->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="url">URL <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $quickLink->url) }}" required>
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Enter the full URL including http:// or https://</small>
                                </div>
                            </div>

                            <!-- Row 2: Display Order and Status -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="display_order">Display Order</label>
                                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $quickLink->display_order) }}">
                                    @error('display_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $quickLink->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Published</label>
                                    </div>
                                    <small class="text-muted">Toggle to set the visibility status</small>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Quick Link
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 