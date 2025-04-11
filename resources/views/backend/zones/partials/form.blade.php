<div class="row">
    <div class="col-lg-12">
        <!-- Name in English and Nepali, Display Order and Status -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="name_en">Name (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                    name="name_en" value="{{ old('name_en', $zone->name_en ?? $zone->name ?? '') }}" required>
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="name_np">Name (Nepali)</label>
                <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                    name="name_np" value="{{ old('name_np', $zone->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                    id="display_order" name="display_order"
                    value="{{ old('display_order', $zone->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_published') is-invalid @enderror" type="checkbox" id="is_published" name="is_published"
                            {{ old('is_published', $zone->is_published ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                        @error('is_published')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($zone) ? 'Update' : 'Create' }} Zone
            </button>
            <a href="{{ route('zones.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

<!-- Hidden fields for backward compatibility -->
<input type="hidden" name="name" value="{{ $zone->name_en ?? '' }}">
