<!--Content Section -->
<div class="mb-4">
   
    
    <h4 class="mb-3">Content</h4>
    <div class="row">
        <!-- Tagline -->
        <div class="col-md-6 mb-3">
            <label class="form-label" for="tagline_en">Tagline (English) <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tagline_en') is-invalid @enderror" id="tagline_en" name="tagline_en"
                value="{{ old('tagline_en', $aboutUs->tagline_en ?? $aboutUs->tagline ?? '') }}" required>
            @error('tagline_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label" for="tagline_np">Tagline (Nepali)</label>
            <input type="text" class="form-control @error('tagline_np') is-invalid @enderror" id="tagline_np" name="tagline_np"
                value="{{ old('tagline_np', $aboutUs->tagline_np ?? '') }}">
            @error('tagline_np')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Years of Experience -->
        <div class="col-md-6 mb-3">
            <label class="form-label" for="years_of_experience_en">Years of Experience (English)</label>
            <input type="text" class="form-control @error('years_of_experience_en') is-invalid @enderror"
                id="years_of_experience_en" name="years_of_experience_en"
                value="{{ old('years_of_experience_en', $aboutUs->years_of_experience_en ?? $aboutUs->years_of_experience ?? '') }}">
            @error('years_of_experience_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label" for="years_of_experience_np">Years of Experience (Nepali)</label>
            <input type="text" class="form-control @error('years_of_experience_np') is-invalid @enderror"
                id="years_of_experience_np" name="years_of_experience_np"
                value="{{ old('years_of_experience_np', $aboutUs->years_of_experience_np ?? '') }}">
            @error('years_of_experience_np')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Short Description -->
        <div class="col-md-6 mb-3">
            <label class="form-label" for="short_description_en">Short Description (English)</label>
            <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en"
                name="short_description_en" rows="3">{{ old('short_description_en', $aboutUs->short_description_en ?? $aboutUs->short_description ?? '') }}</textarea>
            @error('short_description_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label" for="short_description_np">Short Description (Nepali)</label>
            <textarea class="form-control @error('short_description_np') is-invalid @enderror" id="short_description_np"
                name="short_description_np" rows="3">{{ old('short_description_np', $aboutUs->short_description_np ?? '') }}</textarea>
            @error('short_description_np')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Main Description -->
        <div class="col-md-6 mb-3">
            <label class="form-label" for="description_en">Description (English) <span class="text-danger">*</span></label>
            <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en"
                rows="5" required>{{ old('description_en', $aboutUs->description_en ?? $aboutUs->description ?? '') }}</textarea>
            @error('description_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label" for="description_np">Description (Nepali)</label>
            <textarea class="form-control @error('description_np') is-invalid @enderror" id="description_np" name="description_np"
                rows="5">{{ old('description_np', $aboutUs->description_np ?? '') }}</textarea>
            @error('description_np')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Common Fields Section -->
<div class="mb-4">
    <div class="row">
        <!-- Display Order and Published Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label" for="display_order">Display Order</label>
            <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                id="display_order" name="display_order"
                value="{{ old('display_order', $aboutUs->display_order ?? 0) }}" min="0">
            <div class="form-text">Lower numbers will be displayed first.</div>
            @error('display_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="is_published" value="0">
                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" 
                    {{ old('is_published', $aboutUs->is_published ?? 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
            </div>
            @error('is_published')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Video Link and Image -->
        <div class="col-md-6 mb-3">
            <label class="form-label" for="video_link">Video Link</label>
            <input type="text" class="form-control @error('video_link') is-invalid @enderror" id="video_link"
                name="video_link" value="{{ old('video_link', $aboutUs->video_link ?? '') }}">
            @error('video_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                accept="image/*">
            <div class="form-text">
                Allowed types: JPG, PNG, GIF.   .
                @if (isset($aboutUs) && $aboutUs->image)
                    Leave empty to keep the current image.
                @endif
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="image-preview" class="mt-2">
                @if (isset($aboutUs) && $aboutUs->image)
                    <div class="mb-2">
                        <p class="mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Current Image" class="img-fluid rounded"
                            style="max-height: 200px;">
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image" value="1">
                        <label class="form-check-label" for="delete_image">
                            Delete current image
                        </label>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<hr>

<!-- Mission & Vision Section -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Mission & Vision</h4>
        <button type="button" class="btn btn-sm btn-alt-success" id="add-mission-vision">
            <i class="fa fa-plus"></i> Add Another Item
        </button>
    </div>

    <div id="mission-vision-container">
        @if (isset($aboutUs) && is_array($aboutUs->mission_vision) && count($aboutUs->mission_vision) > 0)
            @foreach ($aboutUs->mission_vision as $index => $item)
                <div class="mission-vision-item card p-3 bg-light mb-3">
                    @if ($index > 0)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0">Item #{{ $index + 1 }}</h5>
                            <button type="button" class="btn btn-sm btn-alt-danger remove-mission-vision"
                                title="Remove this item">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="mission_vision_titles_{{ $index }}">Title <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('mission_vision_titles.' . $index) is-invalid @enderror"
                                id="mission_vision_titles_{{ $index }}" name="mission_vision_titles[]"
                                value="{{ old('mission_vision_titles.' . $index, $item['title'] ?? '') }}" required>
                            @error('mission_vision_titles.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="mission_vision_icons_{{ $index }}">Icon (Optional)</label>
                            <input type="text"
                                class="form-control @error('mission_vision_icons.' . $index) is-invalid @enderror"
                                id="mission_vision_icons_{{ $index }}" name="mission_vision_icons[]"
                                value="{{ old('mission_vision_icons.' . $index, $item['icon'] ?? '') }}">
                            <div class="form-text">
                                Enter a Font Awesome icon name (e.g., "check", "flag") or leave empty to use uploaded image.
                            </div>
                            @error('mission_vision_icons.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label" for="mission_vision_image_files_{{ $index }}">Icon Image</label>
                            <input type="file"
                                class="form-control @error('mission_vision_image_files.' . $index) is-invalid @enderror"
                                id="mission_vision_image_files_{{ $index }}" name="mission_vision_image_files[]"
                                accept="image/*">
                            <div class="form-text">
                                Upload an image to use instead of a Font Awesome icon. Recommended size: 64x64px.
                            </div>
                            @error('mission_vision_image_files.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            @php
                                $missionVisionImages = isset($aboutUs->mission_vision_images) ? $aboutUs->mission_vision_images : [];
                                if (is_string($missionVisionImages)) {
                                    $missionVisionImages = json_decode($missionVisionImages, true) ?? [];
                                }
                            @endphp
                            
                            @if (isset($aboutUs) && !empty($missionVisionImages) && isset($missionVisionImages[$index]) && $missionVisionImages[$index])
                                <div class="mt-2">
                                    <p class="mb-1">Current Icon Image:</p>
                                    <img src="{{ asset('storage/' . $missionVisionImages[$index]) }}" 
                                         alt="Mission Vision Icon" 
                                         class="img-fluid rounded"
                                         style="max-height: 64px; max-width: 64px;">
                                    
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="mission_vision_delete_images[{{ $index }}]" 
                                               id="mission_vision_delete_images_{{ $index }}" 
                                               value="1">
                                        <label class="form-check-label" for="mission_vision_delete_images_{{ $index }}">
                                            Delete current icon image
                                        </label>
                                        <!-- Hidden field ensures we get a value even if unchecked -->
                                        <input type="hidden" name="mission_vision_delete_images_indices[]" value="{{ $index }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mission_vision_descriptions_{{ $index }}">Description
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('mission_vision_descriptions.' . $index) is-invalid @enderror"
                            id="mission_vision_descriptions_{{ $index }}" name="mission_vision_descriptions[]" rows="3"
                            required>{{ old('mission_vision_descriptions.' . $index, $item['description'] ?? '') }}</textarea>
                        @error('mission_vision_descriptions.' . $index)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        @else
            <div class="mission-vision-item card p-3 bg-light mb-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="mission_vision_titles_0">Title <span
                                class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('mission_vision_titles.0') is-invalid @enderror"
                            id="mission_vision_titles_0" name="mission_vision_titles[]"
                            value="{{ old('mission_vision_titles.0') }}" required>
                        @error('mission_vision_titles.0')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="mission_vision_icons_0">Icon (Optional)</label>
                        <input type="text"
                            class="form-control @error('mission_vision_icons.0') is-invalid @enderror"
                            id="mission_vision_icons_0" name="mission_vision_icons[]"
                            value="{{ old('mission_vision_icons.0') }}">
                        <div class="form-text">
                            Enter a Font Awesome icon name (e.g., "check", "flag") or leave empty to use uploaded image.
                        </div>
                        @error('mission_vision_icons.0')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="mission_vision_image_files_0">Icon Image</label>
                        <input type="file"
                            class="form-control @error('mission_vision_image_files.0') is-invalid @enderror"
                            id="mission_vision_image_files_0" name="mission_vision_image_files[]"
                            accept="image/*">
                        <div class="form-text">
                            Upload an image to use instead of a Font Awesome icon. Recommended size: 64x64px.
                        </div>
                        @error('mission_vision_image_files.0')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="mission_vision_descriptions_0">Description
                        <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('mission_vision_descriptions.0') is-invalid @enderror"
                        id="mission_vision_descriptions_0" name="mission_vision_descriptions[]" rows="3"
                        required>{{ old('mission_vision_descriptions.0') }}</textarea>
                    @error('mission_vision_descriptions.0')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Form Buttons -->
<div class="mb-3 mt-3">
    <button type="submit" class="btn btn-sm btn-success mb-0">
        <i class="fa fa-save"></i> {{ isset($aboutUs) ? 'Update' : 'Create' }} About Us
    </button>
    <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
        <i class="fa fa-times"></i> Cancel
    </a>
</div>

<!-- Hidden fields for backward compatibility -->
<input type="hidden" name="tagline" value="{{ $aboutUs->tagline_en ?? '' }}">
<input type="hidden" name="short_description" value="{{ $aboutUs->short_description_en ?? '' }}">
<input type="hidden" name="description" value="{{ $aboutUs->description_en ?? '' }}">
<input type="hidden" name="years_of_experience" value="{{ $aboutUs->years_of_experience_en ?? '' }}">
