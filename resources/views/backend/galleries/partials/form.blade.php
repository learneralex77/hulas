{{-- Gallery form partial that can be used in both create and edit views --}}

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="title_en">Title (English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                        name="title_en" value="{{ old('title_en', $gallery->title_en ?? '') }}" required>
                    @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="title_np">Title (Nepali)</label>
                    <input type="text" class="form-control @error('title_np') is-invalid @enderror" id="title_np"
                        name="title_np" value="{{ old('title_np', $gallery->title_np ?? '') }}">
                    @error('title_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="links">External Link</label>
                    <input type="text" class="form-control @error('links') is-invalid @enderror" id="links"
                        name="links" value="{{ old('links', $gallery->links ?? '') }}">
                    <small class="text-muted">Add external link if any</small>
                    @error('links')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-4">
                    <label class="form-label" for="short_description">Short Description</label>
                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" 
                        name="short_description" rows="3">{{ old('short_description', $gallery->short_description ?? '') }}</textarea>
                    <small class="text-muted">A brief description of this gallery</small>
                    @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="display_order">Display Order</label>
                    <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                        id="display_order" name="display_order"
                        value="{{ old('display_order', $gallery->display_order ?? 0) }}">
                    @error('display_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="mb-4">
                    <label class="form-label d-block">Featured</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured"
                            value="1" {{ old('is_featured', $gallery->is_featured ?? '') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>
                    <small class="text-muted">Toggle to feature this gallery</small>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="mb-4">
                    <label class="form-label d-block">Status</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                            value="1" {{ old('is_published', $gallery->is_published ?? 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                    <small class="text-muted">Toggle to set the visibility status</small>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="featured_image">Featured Image</label>
                    @if (isset($gallery) && $gallery->featured_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $gallery->featured_image) }}" alt="{{ $gallery->title_en }}"
                                style="max-width: 200px;" class="img-thumbnail">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="delete_featured_image"
                                id="delete_featured_image" value="1">
                            <label class="form-check-label" for="delete_featured_image">
                                Delete featured image
                            </label>
                        </div>
                        <small class="text-muted">Leave empty to keep the current featured image</small>
                    @else
                        <small class="text-muted">This image will be used as the cover image</small>
                    @endif
                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                        id="featured_image" name="featured_image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                    <small class="text-muted d-block mt-1">Allowed formats: JPG, PNG, GIF, WebP </small>
                    @error('featured_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="gallery_images">
                        {{ isset($gallery) ? 'Add Gallery Images' : 'Gallery Images' }}
                    </label>
                    <input type="file" class="form-control @error('gallery_images') is-invalid @enderror"
                        id="gallery_images" name="gallery_images[]" multiple accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                    <small class="text-muted d-block">You can select multiple images
                        {{ isset($gallery) ? 'to add to the gallery' : 'for the gallery' }}</small>
                    <small class="text-muted d-block mt-1">Allowed formats: JPG, PNG, GIF, WebP  </small>
                    @error('gallery_images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @if (isset($gallery) && !empty($gallery->images))
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <label class="form-label">Current Gallery Images</label>
                        <div class="row">
                            @foreach ($gallery->images as $index => $image)
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="image-container position-relative">
                                        <img src="{{ asset('storage/' . $image) }}"
                                            alt="Gallery Image {{ $index + 1 }}" class="img-fluid img-thumbnail">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" name="delete_images[]"
                                                value="{{ $image }}" id="delete_image_{{ $index }}">
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
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-sm btn-success" id="submit-btn">
                    <i class="fa fa-save"></i> {{ isset($gallery) && $gallery->exists ? 'Update' : 'Create' }} Gallery
                </button>
                <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-danger ms-2">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>
