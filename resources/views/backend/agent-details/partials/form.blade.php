<div class="row px-0">
    <div class="col-12">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label" for="district_id">District <span class="text-danger">*</span></label>
                <select class="form-select @error('district_id') is-invalid @enderror" id="district_id" name="district_id" required>
                    <option value="">Select District</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}" {{ old('district_id', $agentDetail->district_id ?? '') == $district->id ? 'selected' : '' }}>
                            {{ $district->name_en }}
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
        
        <!-- Agent Information - English -->
        <h5 class="mb-3">Information</h5>
        <div class="row mb-3">
            <!-- State Agent Name - English -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="state_agent_name_en">State Agent Name (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('state_agent_name_en') is-invalid @enderror" 
                    id="state_agent_name_en" name="state_agent_name_en" 
                    value="{{ old('state_agent_name_en', $agentDetail->state_agent_name_en ?? $agentDetail->state_agent_name ?? '') }}" required
                    placeholder="Enter state agent name in English">
                @error('state_agent_name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" for="state_agent_name_np">State Agent Name (Nepali)</label>
                <input type="text" class="form-control @error('state_agent_name_np') is-invalid @enderror" 
                    id="state_agent_name_np" name="state_agent_name_np" 
                    value="{{ old('state_agent_name_np', $agentDetail->state_agent_name_np ?? '') }}"
                    placeholder="Enter state agent name in Nepali">
                @error('state_agent_name_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Address - English -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="address_en">Address (English)</label>
                <input type="text" class="form-control @error('address_en') is-invalid @enderror" 
                    id="address_en" name="address_en" 
                    value="{{ old('address_en', $agentDetail->address_en ?? $agentDetail->address ?? '') }}"
                    placeholder="Enter address in English">
                @error('address_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" for="address_np">Address (Nepali)</label>
                <input type="text" class="form-control @error('address_np') is-invalid @enderror" 
                    id="address_np" name="address_np" 
                    value="{{ old('address_np', $agentDetail->address_np ?? '') }}"
                    placeholder="Enter address in Nepali">
                @error('address_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Contact Number - English -->
           
            
            <!-- Contact Person - English -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="contact_person_en">Contact Person (English)</label>
                <input type="text" class="form-control @error('contact_person_en') is-invalid @enderror" 
                    id="contact_person_en" name="contact_person_en" 
                    value="{{ old('contact_person_en', $agentDetail->contact_person_en ?? $agentDetail->contact_person ?? '') }}"
                    placeholder="Enter contact person name in English">
                @error('contact_person_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" for="contact_person_np">Contact Person (Nepali)</label>
                <input type="text" class="form-control @error('contact_person_np') is-invalid @enderror" 
                    id="contact_person_np" name="contact_person_np" 
                    value="{{ old('contact_person_np', $agentDetail->contact_person_np ?? '') }}"
                    placeholder="Enter contact person name in Nepali">
                @error('contact_person_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" for="contact_no_en">Contact Number (English)</label>
                <input type="text" class="form-control @error('contact_no_en') is-invalid @enderror" 
                    id="contact_no_en" name="contact_no_en" 
                    value="{{ old('contact_no_en', $agentDetail->contact_no_en ?? $agentDetail->contact_no ?? '') }}"
                    placeholder="Enter contact number in English">
                @error('contact_no_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" for="contact_no_np">Contact Number (Nepali)</label>
                <input type="text" class="form-control @error('contact_no_np') is-invalid @enderror" 
                    id="contact_no_np" name="contact_no_np" 
                    value="{{ old('contact_no_np', $agentDetail->contact_no_np ?? '') }}"
                    placeholder="Enter contact number in Nepali">
                @error('contact_no_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
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

<!-- Hidden fields for backward compatibility -->
<input type="hidden" name="state_agent_name" value="{{ $agentDetail->state_agent_name_en ?? '' }}">
<input type="hidden" name="address" value="{{ $agentDetail->address_en ?? '' }}">
<input type="hidden" name="contact_no" value="{{ $agentDetail->contact_no_en ?? '' }}">
<input type="hidden" name="contact_person" value="{{ $agentDetail->contact_person_en ?? '' }}">