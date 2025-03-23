@extends('layouts.main')

@section('title')
    Edit Gallery
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Gallery: {{ $gallery->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row push">
                        <div class="col-lg-8">
                            <div class="mb-4">
                                <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label" for="links">Links</label>
                                <input type="text" class="form-control @error('links') is-invalid @enderror" id="links" name="links" value="{{ old('links', $gallery->links) }}">
                                <small class="text-muted">Add external link associated with this gallery if any</small>
                                @error('links')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label" for="featured_image">Featured Image</label>
                                @if($gallery->featured_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $gallery->featured_image) }}" alt="{{ $gallery->title }}" style="max-width: 200px;" class="img-thumbnail">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">
                                <small class="text-muted">Leave empty to keep the current featured image</small>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label" for="gallery_images">Add Gallery Images</label>
                                <input type="file" class="form-control @error('gallery_images') is-invalid @enderror" id="gallery_images" name="gallery_images[]" multiple>
                                <small class="text-muted">You can select multiple images to add to the gallery</small>
                                @error('gallery_images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            @if(!empty($gallery->images))
                                <div class="mb-4">
                                    <label class="form-label">Current Gallery Images</label>
                                    <div class="row">
                                        @foreach($gallery->images as $index => $image)
                                            <div class="col-md-3 mb-3">
                                                <div class="image-container position-relative">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image {{ $index+1 }}" class="img-fluid img-thumbnail">
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" name="delete_images[]" value="{{ $image }}" id="delete_image_{{ $index }}">
                                                        <label class="form-check-label" for="delete_image_{{ $index }}">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <small class="text-muted">Check the images you want to remove</small>
                                </div>
                            @endif
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="display_order">Display Order</label>
                                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $gallery->display_order) }}">
                                    @error('display_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label d-block">Featured</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">Featured</label>
                                    </div>
                                    <small class="text-muted">Toggle to feature this gallery</small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label d-block">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $gallery->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Published</label>
                                    </div>
                                    <small class="text-muted">Toggle to set the visibility status</small>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Gallery
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 