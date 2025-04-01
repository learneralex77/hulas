{{-- Designation form partial that can be used in both create and edit views --}}

<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $designation->name ?? '') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label" for="display_order">Display Order</label>
            <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
                name="display_order" value="{{ old('display_order', $designation->display_order ?? 0) }}">
            @error('display_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="mb-4">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1"
                    {{ old('is_published', $designation->is_published ?? 1) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
            </div>
            <small class="text-muted">Toggle to set the visibility status</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-3 mt-n2">
        <button type="submit" class="btn btn-sm btn-success">
            <i class="fa fa-save"></i> {{ isset($designation) ? 'Update' : 'Create' }} Designation
        </button>
        <a href="{{ route('designations.index') }}" class="btn btn-sm btn-danger ms-2">
            <i class="fa fa-times"></i> Cancel
        </a>
    </div>
</div>
