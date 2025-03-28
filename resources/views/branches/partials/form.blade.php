<div class="row">
    <div class="col-lg-12">
        <!-- Name and Phone fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="name">Branch Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name', $branch->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="phone">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone', $branch->phone ?? '') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
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
                    <div class="invalid-feedback">{{ $message }}</div>
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
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
                @error('district_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Address field (full width) -->
        <div class="mb-4">
            <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                name="address" value="{{ old('address', $branch->address ?? '') }}" required>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Map iframe field (full width) -->
        <div class="mb-4">
            <label class="form-label" for="map_iframe">Google Map Embed Code</label>
            <textarea class="form-control @error('map_iframe') is-invalid @enderror" id="map_iframe" name="map_iframe"
                rows="3">{{ old('map_iframe', $branch->map_iframe ?? '') }}</textarea>
            <small class="text-muted">Paste the iframe code for Google Maps</small>
            @error('map_iframe')
                <div class="invalid-feedback">{{ $message }}</div>
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
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                            value="1"
                            {{ old('is_published', $branch->is_published ?? '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($branch) ? 'Update' : 'Create' }} Branch
            </button>
        </div>
    </div>
</div>
