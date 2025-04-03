{{-- Team form partial that can be used in both create and edit views --}}

<div class="row px-4">
    <div class="col-12">
        <!-- Row 1: Type and Name -->
        <div class="row g-2 mb-3 mt-3">
            <div class="col-md-6">
                <label class="form-label" for="type">Type <span class="text-danger">*</span></label>
                <select class="form-select form-select-sm @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="">-- Select Type --</option>
                    @foreach ($teamTypes as $value => $label)
                        <option value="{{ $value }}" {{ old('type', $team->type ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $team->name ?? '') }}">
                @error('name')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row 2: Image field -->
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            @if(isset($team) && $team->image)
                <div class="mb-1">
                    <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="img-fluid" style="max-height: 150px;">
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image" value="1">
                    <label class="form-check-label" for="delete_image">
                        Delete current image
                    </label>
                </div>
                <small class="text-muted fs-xs d-block mb-2">Leave empty to keep the current image</small>
            @endif
            <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" name="image">
            <small class="text-muted fs-xs">Recommended size: 300x300px, Max: 2MB</small>
            @error('image')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Row 3: Description field (full width) -->
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $team->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Row 4: Display Order and Status -->
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control form-control-sm @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $team->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label d-block">Status</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $team->is_published ?? 1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
                <small class="text-muted fs-xs">Toggle to set the visibility status</small>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3 mt-n2">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save"></i> {{ isset($team) ? 'Update' : 'Create' }} Team Member
            </button>
            <a href="{{ route('teams.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>
