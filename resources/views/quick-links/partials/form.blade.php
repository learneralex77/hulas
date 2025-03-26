@csrf
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Row 1: Name and External Link -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $quickLink->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="external_link">External Link <span class="text-danger">*</span></label>
                <input type="url" class="form-control @error('external_link') is-invalid @enderror" id="external_link" name="external_link" value="{{ old('external_link', $quickLink->external_link ?? '') }}" required>
                @error('external_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Enter the full URL including http:// or https://</small>
            </div>
        </div>

        <!-- Row 2: Display Order and Status -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $quickLink->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $quickLink->is_published ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
                <small class="text-muted">Toggle to set the visibility status</small>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-4 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> {{ isset($quickLink) ? 'Update' : 'Create' }} Quick Link
            </button>
        </div>
    </div>
</div> 