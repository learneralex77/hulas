{{-- Service form partial that can be used in both create and edit views --}}

<div class="row px-2">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-md-6">
                <label class="form-label ps-0" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
                    name="display_order" value="{{ old('display_order', $service->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label ps-0" for="file">File (Image or PDF)</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                    name="file">
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
        </div>

        <div class="mb-2 ps-0">
            <label class="form-label ps-0" for="is_published">Status</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
                    {{ old('is_published', $service->is_published ?? 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
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
            @if (isset($service) && $service->translations->isNotEmpty())
                @foreach ($service->translations as $translation)
                    <div class="service-detail-item border rounded p-2 mb-2">
                        @if ($loop->index > 0)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 ps-0">Additional Entry #{{ $loop->index }}</h5>
                                <button type="button" class="btn btn-sm btn-alt-danger remove-detail"
                                    title="Remove this entry">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label ps-0" for="names_{{ $loop->index }}">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('names.' . $loop->index) is-invalid @enderror"
                                    id="names_{{ $loop->index }}" name="names[]"
                                    value="{{ old('names.' . $loop->index, $translation->names[$loop->index] ?? '') }}"
                                    required>
                                @error('names.' . $loop->index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label ps-0" for="icons_{{ $loop->index }}">Icon (FontAwesome
                                    Class)</label>
                                <input type="text"
                                    class="form-control @error('icons.' . $loop->index) is-invalid @enderror"
                                    id="icons_{{ $loop->index }}" name="icons[]"
                                    value="{{ old('icons.' . $loop->index, $translation->icons[$loop->index] ?? '') }}"
                                    placeholder="fa fa-example">
                                @error('icons.' . $loop->index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label ps-0" for="descriptions_{{ $loop->index }}">Description</label>
                            <textarea class="form-control @error('descriptions.' . $loop->index) is-invalid @enderror"
                                id="descriptions_{{ $loop->index }}" name="descriptions[]" rows="3">{{ old('descriptions.' . $loop->index, $translation->descriptions[$loop->index] ?? '') }}</textarea>
                            @error('descriptions.' . $loop->index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
            @else
                <div class="service-detail-item border rounded p-2 mb-2">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label ps-0" for="names_0">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('names.0') is-invalid @enderror"
                                id="names_0" name="names[]" value="{{ old('names.0') }}" required>
                            @error('names.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label ps-0" for="icons_0">Icon (FontAwesome Class)</label>
                            <input type="text" class="form-control @error('icons.0') is-invalid @enderror"
                                id="icons_0" name="icons[]" value="{{ old('icons.0') }}"
                                placeholder="fa fa-example">
                            @error('icons.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label ps-0" for="descriptions_0">Description</label>
                        <textarea class="form-control @error('descriptions.0') is-invalid @enderror" id="descriptions_0" name="descriptions[]"
                            rows="3">{{ old('descriptions.0') }}</textarea>
                        @error('descriptions.0')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success mb-0">
                <i class="fa fa-save me-1"></i> {{ isset($service) ? 'Update' : 'Create' }} Service
            </button>
            <a href="{{ route('services.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const serviceTranslationsCount = {{ isset($service) && $service->translations->isNotEmpty() ? count($service->translations) : 1 }};
    </script>
    <script src="{{ asset('js/services.js') }}"></script>
@endpush
