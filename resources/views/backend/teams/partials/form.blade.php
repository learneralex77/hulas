{{-- Team form partial that can be used in both create and edit views --}}

<div class="row px-4">
    <div class="col-12">
        <!-- Row 1: Type -->
        <div class="row g-2 mb-3 mt-3">
            <div class="col-md-12">
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
        </div>

        <!-- Row 2: Name fields -->
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="name_en">Name(English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en', $team->name_en ?? '') }}">
                @error('name_en')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_np">Name(Nepali)</label>
                <input type="text" class="form-control form-control-sm @error('name_np') is-invalid @enderror" id="name_np" name="name_np" value="{{ old('name_np', $team->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row: Address fields -->
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="address_en">Address(English)</label>
                <input type="text" class="form-control form-control-sm @error('address_en') is-invalid @enderror" id="address_en" name="address_en" value="{{ old('address_en', $team->address_en ?? '') }}">
                @error('address_en')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="address_np">Address(Nepali)</label>
                <input type="text" class="form-control form-control-sm @error('address_np') is-invalid @enderror" id="address_np" name="address_np" value="{{ old('address_np', $team->address_np ?? '') }}">
                @error('address_np')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row: Phone Number fields -->
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="phone_number_en">Phone Number(English)</label>
                <input type="text" class="form-control form-control-sm @error('phone_number_en') is-invalid @enderror" id="phone_number_en" name="phone_number_en" value="{{ old('phone_number_en', $team->phone_number_en ?? '') }}">
                @error('phone_number_en')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="phone_number_np">Phone Number(Nepali)</label>
                <input type="text" class="form-control form-control-sm @error('phone_number_np') is-invalid @enderror" id="phone_number_np" name="phone_number_np" value="{{ old('phone_number_np', $team->phone_number_np ?? '') }}">
                @error('phone_number_np')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row: Email field -->
        <div class="row g-2 mb-3">
            <div class="col-md-12">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $team->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row 3: Image field -->
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            @if(isset($team) && $team->image)
                <div class="mb-1">
                    <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name_en ?? $team->name }}" class="img-fluid" style="max-height: 150px;">
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
            <small class="text-muted fs-xs">Recommended size: 300x300px,    </small>
            @error('image')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Row 4: Description fields -->
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="description_en">Description(English)</label>
                <textarea class="form-control form-control-sm @error('description_en') is-invalid @enderror" id="description_en" name="description_en" rows="3">{{ old('description_en', $team->description_en ?? '') }}</textarea>
                @error('description_en')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="description_np">Description(Nepali)</label>
                <textarea class="form-control form-control-sm @error('description_np') is-invalid @enderror" id="description_np" name="description_np" rows="3">{{ old('description_np', $team->description_np ?? '') }}</textarea>
                @error('description_np')
                    <div class="invalid-feedback small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row 5: Display Order and Status -->
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

<!-- Backward compatibility for existing fields -->
<input type="hidden" name="name" value="{{ $team->name_en ?? '' }}">
<input type="hidden" name="description" value="{{ $team->description_en ?? '' }}">
