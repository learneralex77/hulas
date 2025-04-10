@csrf
<div class="row push px-3">
    <div class="col-12 mt-4">
        <!-- Row 1: Name (English and Nepali) -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="name_en">Name(English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                    name="name_en" value="{{ old('name_en', $quickLink->name_en ?? '') }}" required>
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_np">Name(Nepali)</label>
                <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                    name="name_np" value="{{ old('name_np', $quickLink->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row: External Link, Display Order, Status in one line -->
<div class="row mb-3">
    <!-- External Link -->
    <div class="col-md-6 col-sm-12">
        <label class="form-label" for="external_link">External Link <span class="text-danger">*</span></label>
        <input type="url" class="form-control @error('external_link') is-invalid @enderror"
            id="external_link" name="external_link"
            value="{{ old('external_link', $quickLink->external_link ?? '') }}" required>
        @error('external_link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted">Enter the full URL including http:// or https://</small>
    </div>

    <!-- Display Order -->
    <div class="col-md-3 col-sm-6">
        <label class="form-label" for="display_order">Display Order</label>
        <input type="number" class="form-control @error('display_order') is-invalid @enderror"
            id="display_order" name="display_order"
            value="{{ old('display_order', $quickLink->display_order ?? 0) }}">
        @error('display_order')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Status -->
    <div class="col-md-3 col-sm-6">
        <label class="form-label">Status</label>
        <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1"
                {{ old('is_published', $quickLink->is_published ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Published</label>
        </div>
        <small class="text-muted">Toggle to set the visibility status</small>
    </div>
</div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save"></i> {{ isset($quickLink) ? 'Update' : 'Create' }} Quick Link
            </button>
            <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

<!-- Backward compatibility for existing fields -->
<input type="hidden" name="name" value="{{ old('name_en', $quickLink->name_en ?? '') }}">
 
