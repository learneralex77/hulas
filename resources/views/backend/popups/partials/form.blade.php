{{-- Popup form partial that can be used in both create and edit views --}}

<div class="row">
    <div class="col-12">
        <!-- English Name and Nepali Name -->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="name_en">Popup Name(English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                        name="name_en" value="{{ old('name_en', $popup->name_en ?? '') }}">
                    @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="name_np">Popup Name(Nepali)</label>
                    <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                        name="name_np" value="{{ old('name_np', $popup->name_np ?? '') }}">
                    @error('name_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

     <!-- Link and Display Order in one row -->
<div class="row">
    <!-- External Link -->
    <div class="col-md-6 col-sm-12">
        <div class="mb-4">
            <label class="form-label" for="link">External Link</label>
            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link"
                name="link" value="{{ old('link', $popup->link ?? '') }}">
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
                value="{{ old('display_order', $popup->display_order ?? 0) }}">
            <small class="text-muted">Higher values appear first</small>
            @error('display_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="image">Popup Image</label>
                    @if (isset($popup) && $popup->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $popup->image) }}" alt="{{ $popup->name_en ?? $popup->name }}"
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
                    <div id="image-preview-container" class="mt-2" style="display: none; max-width: 100%;">
                        <img id="image-preview" src="#" alt="Image Preview" class="img-thumbnail" style="max-width: 100%; max-height: 150px; object-fit: contain;">
                    </div>
                    <small class="text-muted">Accepted formats: jpeg, png, jpg, gif, webp.   </small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                                    value="1" {{ old('is_published', $popup->is_published ?? 1) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">Published</label>
                            </div>
                            <small class="text-muted">Toggle to set the visibility status</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-sm btn-success" id="submit-btn">
                    <i class="fa fa-save"></i> {{ isset($popup) ? 'Update' : 'Create' }} Popup
                </button>
                <a href="{{ route('popups.index') }}" class="btn btn-sm btn-danger ms-2">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Backward compatibility for existing fields -->
<input type="hidden" name="name" value="{{ $popup->name_en ?? '' }}">

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const previewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');
        
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                
                // Check if the file is an image
                if (!file.type.match('image.*')) {
                    previewContainer.style.display = 'none';
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        });
        
        // Handle delete image checkbox
        const deleteImageCheckbox = document.getElementById('delete_image');
        if (deleteImageCheckbox) {
            deleteImageCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    // If delete is checked, hide the current image preview
                    const currentImage = this.closest('.mb-4').querySelector('.img-thumbnail');
                    if (currentImage) {
                        currentImage.style.display = 'none';
                    }
                } else {
                    // If unchecked, show the image again
                    const currentImage = this.closest('.mb-4').querySelector('.img-thumbnail');
                    if (currentImage) {
                        currentImage.style.display = 'block';
                    }
                }
            });
        }
    });
</script>
@endpush 