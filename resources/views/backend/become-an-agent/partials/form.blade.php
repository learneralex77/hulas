<div class="row px-0">
    <div class="col-12">
        <!--Agent Request Information -->
        <div class="mb-4">
            <h4 class="mb-3">Agent Request Information</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $becomeAnAgent->name ?? '') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="contact_number">Contact Number</label>
                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number"
                        name="contact_number" value="{{ old('contact_number', $becomeAnAgent->contact_number ?? '') }}">
                    @error('contact_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $becomeAnAgent->email ?? '') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="district">District</label>
                    <input type="text" class="form-control @error('district') is-invalid @enderror" id="district"
                        name="district" value="{{ old('district', $becomeAnAgent->district ?? '') }}">
                    @error('district')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" 
                        name="message" rows="4">{{ old('message', $becomeAnAgent->message ?? '') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Status</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_contacted" value="0">
                        <input class="form-check-input" type="checkbox" id="is_contacted" name="is_contacted" value="1"
                            {{ old('is_contacted', $becomeAnAgent->is_contacted ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_contacted">Contacted</label>
                    </div>
                    @error('is_contacted')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-sm btn-success mb-0">
                <i class="fa fa-save"></i> {{ isset($becomeAnAgent) ? 'Update' : 'Create' }} Agent Request
            </button>
            <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div> 