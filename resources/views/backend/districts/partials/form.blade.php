<div class="row">
    <div class="col-lg-12">
        <!-- Name and Display Order in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name', $district->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="display_order">Display Order <small class="text-muted">(Higher orders
                        appear first)</small></label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                    id="display_order" name="display_order"
                    value="{{ old('display_order', $district->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_published') is-invalid @enderror" type="checkbox" id="is_published" name="is_published"
                            {{ old('is_published', $district->is_published ?? true) ? 'checked' : '' }}>
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
                <i class="fa fa-save me-1"></i> {{ isset($district) ? 'Update' : 'Create' }} District
            </button>
            <a href="{{ route('districts.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>
