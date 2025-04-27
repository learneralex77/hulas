@csrf
<div class="row">
    <div class="col-12">
        <!-- English Name and Nepali Name -->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="name_en">Slider Name(English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                        name="name_en" value="{{ old('name_en', $slider->name_en ?? '') }}">
                    @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="name_np">Slider Name(Nepali)</label>
                    <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                        name="name_np" value="{{ old('name_np', $slider->name_np ?? '') }}">
                    @error('name_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

      <!-- Link and Display Order on the same row -->
<div class="row">
    <!-- External Link -->
    <div class="col-md-6 col-sm-12">
        <div class="mb-4">
            <label class="form-label" for="link">External Link</label>
            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link"
                name="link" value="{{ old('link', $slider->link ?? '') }}">
            <small class="text-muted">Enter the full URL including http:// or https://</small>
            @error('link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Display Order -->
    <div class="col-md-6 col-sm-12">
        <div class="mb-4">
            <label class="form-label" for="display_order">Display Order</label>
            <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                id="display_order" name="display_order"
                value="{{ old('display_order', $slider->display_order ?? 0) }}">
            <small class="text-muted">Higher values appear first</small>
            @error('display_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


        <div class="row">
            <!-- Image -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="image">Slider Image</label>
                    @if (isset($slider) && $slider->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->name_en ?? $slider->name }}"
                                style="max-width: 200px;" class="img-thumbnail">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image" value="1">
                            <label class="form-check-label" for="delete_image">
                                Delete current image
                            </label>
                        </div>
                        <small class="text-muted">Leave empty to keep the current image</small>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    <small class="text-muted">Accepted formats: jpeg, png, jpg, gif, webp.   </small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Display Order and Status -->
            <div class="col-md-6 col-sm-12">
               
                
                <div class="mb-4">
                    <label class="form-label d-block">Status</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                            value="1" {{ old('is_published', $slider->is_published ?? 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                    <small class="text-muted">Toggle to set the visibility status</small>
                </div>
            </div>
        </div>

        <!-- Short Descriptions -->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="short_description_en">Short Description(English)</label>
                    <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en"
                        name="short_description_en" rows="5">{{ old('short_description_en', $slider->short_description_en ?? '') }}</textarea>
                    @error('short_description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="short_description_np">Short Description(Nepali)</label>
                    <textarea class="form-control @error('short_description_np') is-invalid @enderror" id="short_description_np"
                        name="short_description_np" rows="5">{{ old('short_description_np', $slider->short_description_np ?? '') }}</textarea>
                    @error('short_description_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-sm btn-success" id="submit-btn">
                    <i class="fa fa-save"></i> {{ isset($slider) ? 'Update' : 'Create' }} Slider
                </button>
                <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-danger ms-2">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Backward compatibility for existing fields -->
<input type="hidden" name="name" value="{{ $slider->name_en ?? '' }}">
<input type="hidden" name="short_description" value="{{ $slider->short_description_en ?? '' }}"> 