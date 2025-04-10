<div class="row">
    <div class="col-lg-12">
        <!-- Full Names (English and Nepali) and Email -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="full_name_en">Full Name (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('full_name_en') is-invalid @enderror" id="full_name_en" name="full_name_en"
                    value="{{ old('full_name_en', $contactUs->full_name_en ?? $contactUs->full_name ?? '') }}" required>
                @error('full_name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="full_name_np">Full Name (Nepali)</label>
                <input type="text" class="form-control @error('full_name_np') is-invalid @enderror" id="full_name_np" name="full_name_np"
                    value="{{ old('full_name_np', $contactUs->full_name_np ?? '') }}">
                @error('full_name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email', $contactUs->email ?? '') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Phone Numbers (English and Nepali) and Contact Status -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="phone_number_en">Phone Number (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone_number_en') is-invalid @enderror" id="phone_number_en" name="phone_number_en"
                    value="{{ old('phone_number_en', $contactUs->phone_number_en ?? $contactUs->phone_number ?? '') }}" required>
                @error('phone_number_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="phone_number_np">Phone Number (Nepali)</label>
                <input type="text" class="form-control @error('phone_number_np') is-invalid @enderror" id="phone_number_np" name="phone_number_np"
                    value="{{ old('phone_number_np', $contactUs->phone_number_np ?? '') }}">
                @error('phone_number_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Contact Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_contacted" value="0">
                        <input class="form-check-input @error('is_contacted') is-invalid @enderror" type="checkbox" id="is_contacted" name="is_contacted"
                            value="1" {{ old('is_contacted', $contactUs->is_contacted ?? '') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_contacted">Contacted</label>
                        @error('is_contacted')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Remarks (English and Nepali) and Display Order -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="contact_remarks_en">Contact Remarks (English)</label>
                <textarea class="form-control @error('contact_remarks_en') is-invalid @enderror" id="contact_remarks_en" name="contact_remarks_en" rows="4">{{ old('contact_remarks_en', $contactUs->contact_remarks_en ?? $contactUs->contact_remarks ?? '') }}</textarea>
                @error('contact_remarks_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="contact_remarks_np">Contact Remarks (Nepali)</label>
                <textarea class="form-control @error('contact_remarks_np') is-invalid @enderror" id="contact_remarks_np" name="contact_remarks_np" rows="4">{{ old('contact_remarks_np', $contactUs->contact_remarks_np ?? '') }}</textarea>
                @error('contact_remarks_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $contactUs->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($contactUs) ? 'Update' : 'Create' }} Inquiry
            </button>
            <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

<!-- Hidden fields for backward compatibility -->
<input type="hidden" name="full_name" value="{{ $contactUs->full_name_en ?? '' }}">
<input type="hidden" name="phone_number" value="{{ $contactUs->phone_number_en ?? '' }}">
<input type="hidden" name="contact_remarks" value="{{ $contactUs->contact_remarks_en ?? '' }}">
