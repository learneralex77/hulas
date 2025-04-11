<div class="row">
    <div class="col-lg-12">
        <!-- Full Name, Email, and Phone Number -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="full_name">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name"
                    value="{{ old('full_name', $contactUs->full_name ?? '') }}" required>
                @error('full_name')
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
            <div class="col-md-4">
                <label class="form-label" for="phone_number">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"
                    value="{{ old('phone_number', $contactUs->phone_number ?? '') }}" required>
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Service Interested In, Contact Status, and Display Order -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="service_interested_in">Service Interested In</label>
                <input type="text" class="form-control @error('service_interested_in') is-invalid @enderror" id="service_interested_in" name="service_interested_in"
                    value="{{ old('service_interested_in', $contactUs->service_interested_in ?? '') }}">
                @error('service_interested_in')
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
            <div class="col-md-4">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $contactUs->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Message -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4">{{ old('message', $contactUs->message ?? '') }}</textarea>
                @error('message')
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
