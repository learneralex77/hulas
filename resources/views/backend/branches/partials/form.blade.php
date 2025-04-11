<div class="row">
    <div class="col-lg-12">
        <!-- Name and Phone fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="name_en">Branch Name (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                    name="name_en" value="{{ old('name_en', $branch->name_en ?? '') }}" required>
                @error('name_en')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_np">Branch Name (Nepali)</label>
                <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                    name="name_np" value="{{ old('name_np', $branch->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
           
        </div>

        <!-- Name and Phone fields in Nepali -->
        <div class="row mb-4">
        <div class="col-md-6">
                <label class="form-label" for="phone_number_en">Phone Number (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone_number_en') is-invalid @enderror" id="phone_number_en"
                    name="phone_number_en" value="{{ old('phone_number_en', $branch->phone_number_en ?? '') }}" required>
                @error('phone_number_en')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="col-md-6">
                <label class="form-label" for="phone_number_np">Phone Number (Nepali)</label>
                <input type="text" class="form-control @error('phone_number_np') is-invalid @enderror" id="phone_number_np"
                    name="phone_number_np" value="{{ old('phone_number_np', $branch->phone_number_np ?? '') }}">
                @error('phone_number_np')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email and District fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $branch->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="district_id">District <span class="text-danger">*</span></label>
                <select class="form-select @error('district_id') is-invalid @enderror" id="district_id"
                    name="district_id" required>
                    <option value="">Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}"
                            {{ old('district_id', $branch->district_id ?? '') == $district->id ? 'selected' : '' }}>
                            {{ $district->name_en }}
                        </option>
                    @endforeach
                </select>
                @error('district_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Address fields -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="address_en">Address (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('address_en') is-invalid @enderror" id="address_en"
                    name="address_en" value="{{ old('address_en', $branch->address_en ?? '') }}" required>
                @error('address_en')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="address_np">Address (Nepali)</label>
                <input type="text" class="form-control @error('address_np') is-invalid @enderror" id="address_np"
                    name="address_np" value="{{ old('address_np', $branch->address_np ?? '') }}">
                @error('address_np')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Map iframe field (full width) -->
        <div class="mb-4">
            <label class="form-label" for="map_iframe">Google Map Embed Code</label>
            <textarea class="form-control @error('map_iframe') is-invalid @enderror" id="map_iframe" name="map_iframe"
                rows="3">{{ old('map_iframe', $branch->map_iframe ?? '') }}</textarea>
            <small class="text-muted">Paste the iframe code for Google Maps</small>
            @error('map_iframe')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Display Order and Status fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                    id="display_order" name="display_order"
                    value="{{ old('display_order', $branch->display_order ?? 0) }}">
                <small class="text-muted">Higher values appear first</small>
                @error('display_order')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_published') is-invalid @enderror" type="checkbox" id="is_published" name="is_published"
                            value="1"
                            {{ old('is_published', $branch->is_published ?? '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                        @error('is_published')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($branch) ? 'Update' : 'Create' }} Branch
            </button>
            <a href="{{ route('branches.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>
