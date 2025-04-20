{{-- Service form partial that can be used in both create and edit views --}}

<div class="row px-2">
    <div class="col-12">
        <div class="row mb-2">
        <div class="col-md-6">
                <label class="form-label" for="name_en">Name(English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                    name="name_en" value="{{ old('name_en', $service->name_en ?? '') }}" required>
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_np">Name(Nepali)</label>
                <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                    name="name_np" value="{{ old('name_np', $service->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-6">
                <label class="form-label ps-0" for="icon">Icon (FontAwesome Class)</label>
                <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                    name="icon" value="{{ old('icon', $service->icon ?? '') }}" placeholder="fa fa-example">
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        

        <div class="row mb-2">
            <div class="col-md-6">
                <label class="form-label ps-0" for="file">File (Image or PDF)</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                    name="file" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,application/pdf,image/webp">
                <small class="text-muted">Allowed file types: JPEG, PNG, JPG, GIF, SVG, PDF, WebP     </small>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if (isset($service) && $service->file)
                    <div class="mt-1">
                        <a href="{{ asset('storage/' . $service->file) }}" target="_blank"
                            class="btn btn-sm btn-alt-info">
                            <i class="fa fa-eye"></i> View Current File
                        </a>
                    </div>
                @endif
            </div>
            
            <div class="col-md-3">
                <label class="form-label ps-0" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
                    name="display_order" value="{{ old('display_order', $service->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-3">
                <label class="form-label ps-0" for="is_published">Status</label>
                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="is_published" value="0">
                    <input class="form-check-input @error('is_published') is-invalid @enderror" type="checkbox" id="is_published" name="is_published" value="1"
                        {{ old('is_published', $service->is_published ?? 0) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                    @error('is_published')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="description_en">Description(English)</label>
                <textarea class="form-control form-control-sm @error('description_en') is-invalid @enderror" id="description_en" name="description_en" rows="3">{{ old('description_en', $service->description_en ?? '') }}</textarea>
                @error('description_en')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="description_np">Description(Nepali)</label>
                <textarea class="form-control form-control-sm @error('description_np') is-invalid @enderror" id="description_np" name="description_np" rows="3">{{ old('description_np', $service->description_np ?? '') }}</textarea>
                @error('description_np')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="my-2">

        <!-- Dynamic section for names, icons, and descriptions -->
        <div class="mb-2 ps-0">
            <div class="d-flex align-items-center">
                <h4 class="mb-0">Service Details <small class="text-muted">(You can add multiple entries)</small></h4>
                <button type="button" class="btn btn-sm btn-alt-success ms-3" id="add-service-detail">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <div id="service-details-container">
            @if (isset($service) && !empty($service->translation_names))
                @php
                    $names = $service->translation_names;
                    $icons = $service->translation_icons ?? [];
                    $descriptions = $service->translation_descriptions ?? [];
                    $externalLinks = $service->external_link ?? [];
                @endphp
                
                @foreach ($names as $index => $name)
                    <div class="service-detail-item border rounded p-2 mb-2" data-index="{{ $index }}">
                        @if ($index > 0)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 ps-0">Additional Entry #{{ $index }}</h5>
                                <button type="button" class="btn btn-sm btn-alt-danger remove-detail"
                                    title="Remove this entry">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        @else
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 ps-0">Primary Entry</h5>
                            </div>
                        @endif
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label ps-0" for="names_{{ $index }}">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('names.' . $index) is-invalid @enderror"
                                    id="names_{{ $index }}" name="names[{{ $index }}]"
                                    value="{{ old('names.' . $index, $name) }}"
                                    required>
                                @error('names.' . $index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label ps-0" for="icons_{{ $index }}">Icon Image</label>
                                <input type="file"
                                    class="form-control @error('icons.' . $index) is-invalid @enderror"
                                    id="icons_{{ $index }}" name="icons[{{ $index }}]"
                                    accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                                <small class="text-muted">Allowed file types: JPEG, PNG, JPG, GIF, SVG, WebP     </small>
                                @error('icons.' . $index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if (isset($icons[$index]) && !empty($icons[$index]))
                                    <div class="mt-1">
                                        <a href="{{ asset('storage/' . $icons[$index]) }}" target="_blank" class="btn btn-sm btn-alt-info">
                                            <i class="fa fa-eye"></i> View Current Icon
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label ps-0" for="descriptions_{{ $index }}">Description</label>
                            <textarea class="form-control @error('descriptions.' . $index) is-invalid @enderror"
                                id="descriptions_{{ $index }}" name="descriptions[{{ $index }}]" rows="3">{{ old('descriptions.' . $index, $descriptions[$index] ?? '') }}</textarea>
                            @error('descriptions.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label ps-0" for="external_links_{{ $index }}">External Link</label>
                            <input type="url"
                                class="form-control @error('external_links.' . $index) is-invalid @enderror"
                                id="external_links_{{ $index }}" name="external_links[{{ $index }}]"
                                value="{{ old('external_links.' . $index, $externalLinks[$index] ?? '') }}"
                                placeholder="https://example.com">
                            @error('external_links.' . $index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
            @else
                <div class="service-detail-item border rounded p-2 mb-2" data-index="0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="mb-0 ps-0">Primary Entry</h5>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label ps-0" for="names_0">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('names.0') is-invalid @enderror"
                                id="names_0" name="names[0]" value="{{ old('names.0') }}" required aria-required="true">
                            @error('names.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label ps-0" for="icons_0">Icon Image</label>
                            <input type="file" class="form-control @error('icons.0') is-invalid @enderror"
                                id="icons_0" name="icons[0]" 
                                accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                            <small class="text-muted">Allowed file types: JPEG, PNG, JPG, GIF, SVG, WebP     </small>
                            @error('icons.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label ps-0" for="descriptions_0">Description</label>
                        <textarea class="form-control @error('descriptions.0') is-invalid @enderror" id="descriptions_0" name="descriptions[0]"
                            rows="3">{{ old('descriptions.0') }}</textarea>
                        @error('descriptions.0')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label ps-0" for="external_links_0">External Link</label>
                        <input type="url" class="form-control @error('external_links.0') is-invalid @enderror"
                            id="external_links_0" name="external_links[0]" value="{{ old('external_links.0') }}"
                            placeholder="https://example.com">
                        @error('external_links.0')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="mb-0">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($service) ? 'Update' : 'Create' }} Service
            </button>
            <a href="{{ route('services.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
            <!-- Hidden input to keep track of indices -->
            <input type="hidden" id="service-detail-indices" name="service_detail_indices" value="[]">
        </div>
    </div>
</div>

@push('scripts')
    <script>
        @if(isset($service) && !empty($service->translation_names))
            const serviceTranslationsCount = {{ count($service->translation_names) }};
        @else
            const serviceTranslationsCount = 1;
        @endif
        
        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                // Check if the service name is empty
                const nameField = document.querySelector('input[name="name_en"]');
                if (!nameField || !nameField.value || nameField.value.trim() === '') {
                    e.preventDefault();
                    e.stopPropagation();
                    nameField.classList.add('is-invalid');
                    nameField.value = ''; // Clear any whitespace
                    
                    // Create error message if it doesn't exist
                    let errorDiv = nameField.nextElementSibling;
                    if (!errorDiv || !errorDiv.classList.contains('invalid-feedback')) {
                        errorDiv = document.createElement('div');
                        errorDiv.classList.add('invalid-feedback');
                        nameField.parentNode.appendChild(errorDiv);
                    }
                    
                    errorDiv.textContent = 'The English name is required.';
                    // Make sure it's visible
                    errorDiv.style.display = 'block';
                    nameField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return false;
                }
            });
        });
    </script>
    <script src="{{ asset('js/services.js') }}"></script>
@endpush
