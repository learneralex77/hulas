@csrf
<div class="row push">
    <div class="col-12 px-2">
        <div class="row mb-3">
            <div class="col-md-8">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name', $newsEventCategory->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label d-block">Status</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1"
                        {{ old('is_published', $newsEventCategory->is_published ?? 1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label" for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    name="slug" value="{{ old('slug', $newsEventCategory->slug ?? '') }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Leave empty to auto-generate from name</small>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ old('description', $newsEventCategory->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fa fa-save"></i> {{ isset($newsEventCategory) ? 'Update' : 'Create' }} Category
                </button>
                <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-danger ms-2">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>
 
