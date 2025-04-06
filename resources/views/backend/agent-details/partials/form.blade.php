<div class="row px-0">
    <div class="col-12">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label" for="district_id">District <span class="text-danger">*</span></label>
                <select class="form-select @error('district_id') is-invalid @enderror" id="district_id" name="district_id" required>
                    <option value="">Select District</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}" {{ old('district_id', $agentDetail->district_id ?? '') == $district->id ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
                @error('district_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $agentDetail->display_order ?? 0) }}">
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Status</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" 
                        {{ old('is_published', $agentDetail->is_published ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Published</label>
                </div>
            </div>
        </div>
            
        <hr>
        
        <!-- Agent Information -->
        <div class="row mb-3">
            <!-- State Agent Name -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="state_agent_name">State Agent Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('state_agent_name') is-invalid @enderror" 
                    id="state_agent_name" name="state_agent_name" 
                    value="{{ old('state_agent_name', $agentDetail->state_agent_name ?? '') }}" required
                    placeholder="Enter state agent name">
                @error('state_agent_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Address -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="address">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" 
                    id="address" name="address" 
                    value="{{ old('address', $agentDetail->address ?? '') }}"
                    placeholder="Enter address">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Contact Number -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="contact_no">Contact Number</label>
                <input type="text" class="form-control @error('contact_no') is-invalid @enderror" 
                    id="contact_no" name="contact_no" 
                    value="{{ old('contact_no', $agentDetail->contact_no ?? '') }}"
                    placeholder="Enter contact number">
                @error('contact_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Contact Person -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="contact_person">Contact Person</label>
                <input type="text" class="form-control @error('contact_person') is-invalid @enderror" 
                    id="contact_person" name="contact_person" 
                    value="{{ old('contact_person', $agentDetail->contact_person ?? '') }}"
                    placeholder="Enter contact person name">
                @error('contact_person')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <hr>
        
        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save"></i> {{ isset($agentDetail) ? 'Update' : 'Create' }} Agent Details
            </button>
            <a href="{{ route('agent-details.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>