<div class="row px-0">
    <div class="col-12">
        <!-- English Content Section -->
        <div class="mb-4">
            <h4 class="mb-3">English Content</h4>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="title_en">Title (English)</label>
                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                        name="title_en" value="{{ old('title_en', $becomeAnAgent->title_en ?? $becomeAnAgent->title ?? '') }}">
                    @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="description_en">Description (English)</label>
                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" 
                        name="description_en" rows="4">{{ old('description_en', $becomeAnAgent->description_en ?? $becomeAnAgent->description ?? '') }}</textarea>
                    @error('description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Nepali Content Section -->
        <div class="mb-4">
            <h4 class="mb-3">Nepali Content</h4>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="title_np">Title (Nepali)</label>
                    <input type="text" class="form-control @error('title_np') is-invalid @enderror" id="title_np"
                        name="title_np" value="{{ old('title_np', $becomeAnAgent->title_np ?? '') }}">
                    @error('title_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="description_np">Description (Nepali)</label>
                    <textarea class="form-control @error('description_np') is-invalid @enderror" id="description_np" 
                        name="description_np" rows="4">{{ old('description_np', $becomeAnAgent->description_np ?? '') }}</textarea>
                    @error('description_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex mb-2 ps-0 mt-2">
            <h4 class="mb-0">Images</h4>
            <button type="button" class="btn btn-sm btn-alt-success ms-2" id="add-image-btn">
                <i class="fa fa-plus"></i> Add Another Image
            </button>
        </div>
        
        <div id="image-container">
            @if(isset($becomeAnAgent) && $becomeAnAgent->images)
                @foreach($becomeAnAgent->images as $index => $image)
                    <div class="mb-2 image-entry">
                        <div class="p-0 border-0">
                            <div class="d-flex ps-0">
                                <h5 class="mb-0">Image #{{ $index + 1 }}</h5>
                                <a href="{{ route('become-an-agent.delete-image', ['becomeAnAgent' => $becomeAnAgent->id, 'index' => $index]) }}" 
                                   class="btn btn-sm btn-alt-danger ms-2 delete-image-btn" 
                                   data-id="{{ $becomeAnAgent->id }}" 
                                   data-index="{{ $index }}" 
                                   title="Remove this image permanently">
                                    <i class="fa fa-trash"></i> Remove
                                </a>
                                @if($index > 0)
                                <button type="button" class="btn btn-sm btn-alt-danger ms-2 remove-image" title="Remove this image from form">
                                    <i class="fa fa-times"></i>
                                </button>
                                @endif
                            </div>
                            <div class="row mb-2 ps-0">
                                @if($index === 0)
                                    <div class="col-md-4">
                                        <label class="form-label ps-0" for="images-{{ $index }}">Image <span class="text-danger">*</span></label>
                                        <input class="form-control @error('images.'.$index) is-invalid @enderror" type="file" id="images-{{ $index }}" name="images[]" accept="image/*" required>
                                        <div class="form-text">
                                            Allowed types: JPG, PNG, GIF, WebP. Max size: 2MB.
                                        </div>
                                        @error('images.'.$index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="display_order">Display Order</label>
                                        <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $becomeAnAgent->display_order ?? 0) }}">
                                        @error('display_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Status</label>
                                        <div class="form-check form-switch">
                                            <input type="hidden" name="is_published" value="0">
                                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
                                                {{ old('is_published', $becomeAnAgent->is_published ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_published">Published</label>
                                        </div>
                                        @error('is_published')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <label class="form-label ps-0" for="images-{{ $index }}">Image <span class="text-danger">*</span></label>
                                        <input class="form-control @error('images.'.$index) is-invalid @enderror" type="file" id="images-{{ $index }}" name="images[]" accept="image/*" required>
                                        <div class="form-text">
                                            Allowed types: JPG, PNG, GIF, WebP. Max size: 2MB.
                                        </div>
                                        @error('images.'.$index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            <div class="preview-container mb-1">
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded" style="max-height: 150px;">
                                    <p class="small mt-1 mb-0">Current image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="mb-2 image-entry">
                    <div class="p-0 border-0">
                        <div class="row mb-2 ps-0">
                            <div class="col-md-4">
                                <label class="form-label ps-0" for="images-0">Image <span class="text-danger">*</span></label>
                                <input class="form-control @error('images') is-invalid @enderror @error('images.0') is-invalid @enderror" type="file" id="images-0" name="images[]" accept="image/*" required>
                                <div class="form-text">
                                    Allowed types: JPG, PNG, GIF, WebP. Max size: 2MB.
                                </div>
                                @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('images.0')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="display_order">Display Order</label>
                                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $becomeAnAgent->display_order ?? 0) }}">
                                @error('display_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_published" value="0">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
                                        {{ old('is_published', $becomeAnAgent->is_published ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">Published</label>
                                </div>
                                @error('is_published')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="preview-container mb-1"></div>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-sm btn-success mb-0">
                <i class="fa fa-save"></i> {{ isset($becomeAnAgent) ? 'Update' : 'Create' }} Become an Agent
            </button>
            <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

<!-- Hidden fields for backward compatibility -->
<input type="hidden" name="title" value="{{ $becomeAnAgent->title_en ?? '' }}">
<input type="hidden" name="description" value="{{ $becomeAnAgent->description_en ?? '' }}">

@push('scripts')
<script src="{{ asset('js/become-an-agent.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add confirmation for delete buttons
        document.querySelectorAll('.delete-image-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this image permanently?')) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });
    });
</script>
@endpush 