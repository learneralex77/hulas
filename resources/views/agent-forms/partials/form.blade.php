<div class="row">
    <div class="col-lg-12">
        <!-- Name and Phone fields in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name', $agentForm->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="phone">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone', $agentForm->number ?? '') }}" required>
                @error('phone')
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
                name="address" value="{{ old('address', $agentForm->address ?? '') }}" required>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Message and Status fields in one row -->
        <div class="row mb-4">
            <div class="col-md-8">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3">{{ old('message', $agentForm->message ?? '') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_processed') is-invalid @enderror" type="checkbox" id="is_processed" name="is_processed"
                            value="1"
                            {{ old('is_processed', $agentForm->is_processed ?? '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_processed">Processed</label>
                        @error('is_processed')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
