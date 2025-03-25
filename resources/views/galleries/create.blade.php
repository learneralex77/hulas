@extends('layouts.main')

@section('title')
    Create New Gallery
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Gallery</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data" id="gallery-form">
                    @csrf
                    <div class="row push">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="links">External Link</label>
                                        <input type="text" class="form-control @error('links') is-invalid @enderror" id="links" name="links" value="{{ old('links') }}">
                                        <small class="text-muted">Add external link if any</small>
                                        @error('links')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="featured_image">Featured Image</label>
                                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">
                                        <small class="text-muted">This image will be used as the cover image</small>
                                        @error('featured_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="gallery_images">Gallery Images</label>
                                        <input type="file" class="form-control @error('gallery_images') is-invalid @enderror" id="gallery_images" name="gallery_images[]" multiple>
                                        <small class="text-muted">You can select multiple images for the gallery</small>
                                        @error('gallery_images')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="display_order">Display Order</label>
                                        <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', 0) }}">
                                        @error('display_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="mb-4">
                                        <label class="form-label d-block">Featured</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">Featured</label>
                                        </div>
                                        <small class="text-muted">Toggle to feature this gallery</small>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="mb-4">
                                        <label class="form-label d-block">Status</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_published">Published</label>
                                        </div>
                                        <small class="text-muted">Toggle to set the visibility status</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary" id="submit-btn">
                                            <i class="fa fa-save"></i> Create Gallery
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 