@csrf
<div class="row">
    <div class="col-12 px-2">
        <!-- English and Nepali Name -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="name_en">English Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                    name="name_en" value="{{ old('name_en', $newsEventCategory->name_en ?? '') }}" required>
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_np">Nepali Name</label>
                <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                    name="name_np" value="{{ old('name_np', $newsEventCategory->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Image Upload -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label" for="image">Image</label>
                
                @if (isset($newsEventCategory) && $newsEventCategory->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $newsEventCategory->image) }}" alt="{{ $newsEventCategory->name_en }}"
                            style="max-width: 200px;" class="img-thumbnail">
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="delete_image"
                            id="delete_image" value="1">
                        <label class="form-check-label" for="delete_image">
                            Delete current image
                        </label>
                    </div>
                    <small class="text-muted">Leave empty to keep the current image</small>
                @endif
                
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                <small class="text-muted d-block mt-1">Allowed formats: JPG, PNG, GIF, WebP  </small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- English and Nepali Descriptions -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="description_en">English Description</label>
                <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" 
                    name="description_en" rows="3">{{ old('description_en', $newsEventCategory->description_en ?? '') }}</textarea>
                @error('description_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="description_np">Nepali Description</label>
                <textarea class="form-control @error('description_np') is-invalid @enderror" id="description_np" 
                    name="description_np" rows="3">{{ old('description_np', $newsEventCategory->description_np ?? '') }}</textarea>
                @error('description_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
    <!-- Display Order -->
    <div class="col-md-6 col-sm-6">
        <label class="form-label" for="display_order">Display Order</label>
        <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
            name="display_order" value="{{ old('display_order', $newsEventCategory->display_order ?? 0) }}">
        @error('display_order')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted">Order in which this category appears</small>
    </div>

    <!-- Status -->
    <div class="col-md-6 col-sm-6">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1"
                {{ old('is_published', $newsEventCategory->is_published ?? 1) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Published</label>
        </div>
        <small class="text-muted">Toggle visibility</small>
    </div>
</div>


        <div class="row mb-0">
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fa fa-save"></i> {{ isset($newsEventCategory) ? 'Update' : 'Create' }} Category
                </button>
                <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-danger ms-2">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Backward compatibility for existing fields -->
<input type="hidden" name="name" value="{{ $newsEventCategory->name_en ?? '' }}">
<input type="hidden" name="description" value="{{ $newsEventCategory->description_en ?? '' }}">
 
