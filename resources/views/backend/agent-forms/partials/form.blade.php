<div class="row">
    <div class="col-lg-12">
        <!-- Name in English and Nepali in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="name_en">Full Name (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                    name="name_en" value="{{ old('name_en', $agentForm->name_en ?? $agentForm->name ?? '') }}" required>
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_np">Full Name (Nepali)</label>
                <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                    name="name_np" value="{{ old('name_np', $agentForm->name_np ?? '') }}">
                @error('name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Phone numbers in English and Nepali in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="number_en">Phone Number (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('number_en') is-invalid @enderror" id="number_en"
                    name="number_en" value="{{ old('number_en', $agentForm->number_en ?? $agentForm->number ?? '') }}" required>
                @error('number_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="number_np">Phone Number (Nepali)</label>
                <input type="text" class="form-control @error('number_np') is-invalid @enderror" id="number_np"
                    name="number_np" value="{{ old('number_np', $agentForm->number_np ?? '') }}">
                @error('number_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email and District fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $agentForm->email ?? '') }}" required>
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
                            {{ old('district_id', $agentForm->district_id ?? '') == $district->id ? 'selected' : '' }}>
                            {{ $district->name_en }}
                        </option>
                    @endforeach
                </select>
                @error('district_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Address in English and Nepali in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="address_en">Address (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('address_en') is-invalid @enderror" id="address_en"
                    name="address_en" value="{{ old('address_en', $agentForm->address_en ?? $agentForm->address ?? '') }}" required>
                @error('address_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="address_np">Address (Nepali)</label>
                <input type="text" class="form-control @error('address_np') is-invalid @enderror" id="address_np"
                    name="address_np" value="{{ old('address_np', $agentForm->address_np ?? '') }}">
                @error('address_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Display Order and Status fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
                    name="display_order" value="{{ old('display_order', $agentForm->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_processed') is-invalid @enderror" type="checkbox" id="is_processed" name="is_processed"
                            {{ old('is_processed', $agentForm->is_processed ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_processed">Processed</label>
                        @error('is_processed')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Message in English and Nepali in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="message_en">Message (English)</label>
                <textarea class="form-control @error('message_en') is-invalid @enderror" id="message_en" name="message_en" rows="3">{{ old('message_en', $agentForm->message_en ?? $agentForm->message ?? '') }}</textarea>
                @error('message_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="message_np">Message (Nepali)</label>
                <textarea class="form-control @error('message_np') is-invalid @enderror" id="message_np" name="message_np" rows="3">{{ old('message_np', $agentForm->message_np ?? '') }}</textarea>
                @error('message_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($agentForm) ? 'Update' : 'Create' }} Agent Form
            </button>
            <a href="{{ route('agent-forms.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

<!-- Hidden fields for backward compatibility -->
<input type="hidden" name="name" value="{{ $agentForm->name_en ?? '' }}">
<input type="hidden" name="number" value="{{ $agentForm->number_en ?? '' }}">
<input type="hidden" name="address" value="{{ $agentForm->address_en ?? '' }}">
<input type="hidden" name="message" value="{{ $agentForm->message_en ?? '' }}">
