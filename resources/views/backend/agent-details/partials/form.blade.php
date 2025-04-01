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
        
        <!-- State Agent Names and Addresses Section in One Horizontal Line -->
        <div class="row mb-3">
            <!-- State Agent Names Section -->
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="mb-0">State Agent Names <span class="text-danger">*</span></h4>
                    <button type="button" class="btn btn-sm btn-alt-success ms-3" id="add-agent-name">
                        <i class="fa fa-plus"></i> Add Name
                    </button>
                </div>
                
                <div id="agent-names-container">
                    @if(isset($agentDetail) && is_array($agentDetail->state_agent_names) && count($agentDetail->state_agent_names) > 0)
                        @foreach($agentDetail->state_agent_names as $index => $name)
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('state_agent_names.'.$index) is-invalid @enderror" 
                                        id="state_agent_names_{{ $index }}" name="state_agent_names[]" 
                                        value="{{ old('state_agent_names.'.$index, $name) }}" required
                                        placeholder="Enter state agent name">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-outline-danger remove-field">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                                @error('state_agent_names.'.$index)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control @error('state_agent_names.0') is-invalid @enderror" 
                                    id="state_agent_names_0" name="state_agent_names[]" 
                                    value="{{ old('state_agent_names.0') }}" required
                                    placeholder="Enter state agent name">
                            </div>
                            @error('state_agent_names.0')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Addresses Section -->
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="mb-0">Addresses</h4>
                    <button type="button" class="btn btn-sm btn-alt-success ms-3" id="add-address">
                        <i class="fa fa-plus"></i> Add Address
                    </button>
                </div>
                
                <div id="addresses-container">
                    @if(isset($agentDetail) && is_array($agentDetail->addresses) && count($agentDetail->addresses) > 0)
                        @foreach($agentDetail->addresses as $index => $address)
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('addresses.'.$index) is-invalid @enderror" 
                                        id="addresses_{{ $index }}" name="addresses[]" 
                                        value="{{ old('addresses.'.$index, $address) }}"
                                        placeholder="Enter address">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-outline-danger remove-field">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                                @error('addresses.'.$index)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control @error('addresses.0') is-invalid @enderror" 
                                    id="addresses_0" name="addresses[]" 
                                    value="{{ old('addresses.0') }}"
                                    placeholder="Enter address">
                            </div>
                            @error('addresses.0')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <hr>
        
        <!-- Contact Numbers and Contact Persons Section in One Horizontal Line -->
        <div class="row mb-3">
            <!-- Contact Numbers Section -->
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="mb-0">Contact Numbers</h4>
                    <button type="button" class="btn btn-sm btn-alt-success ms-3" id="add-contact-no">
                        <i class="fa fa-plus"></i> Add Number
                    </button>
                </div>
                
                <div id="contact-nos-container">
                    @if(isset($agentDetail) && is_array($agentDetail->contact_nos) && count($agentDetail->contact_nos) > 0)
                        @foreach($agentDetail->contact_nos as $index => $contactNo)
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('contact_nos.'.$index) is-invalid @enderror" 
                                        id="contact_nos_{{ $index }}" name="contact_nos[]" 
                                        value="{{ old('contact_nos.'.$index, $contactNo) }}"
                                        placeholder="Enter contact number">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-outline-danger remove-field">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                                @error('contact_nos.'.$index)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control @error('contact_nos.0') is-invalid @enderror" 
                                    id="contact_nos_0" name="contact_nos[]" 
                                    value="{{ old('contact_nos.0') }}"
                                    placeholder="Enter contact number">
                            </div>
                            @error('contact_nos.0')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Contact Persons Section -->
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="mb-0">Contact Persons</h4>
                    <button type="button" class="btn btn-sm btn-alt-success ms-3" id="add-contact-person">
                        <i class="fa fa-plus"></i> Add Person
                    </button>
                </div>
                
                <div id="contact-persons-container">
                    @if(isset($agentDetail) && is_array($agentDetail->contact_persons) && count($agentDetail->contact_persons) > 0)
                        @foreach($agentDetail->contact_persons as $index => $contactPerson)
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('contact_persons.'.$index) is-invalid @enderror" 
                                        id="contact_persons_{{ $index }}" name="contact_persons[]" 
                                        value="{{ old('contact_persons.'.$index, $contactPerson) }}"
                                        placeholder="Enter contact person name">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-outline-danger remove-field">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                                @error('contact_persons.'.$index)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control @error('contact_persons.0') is-invalid @enderror" 
                                    id="contact_persons_0" name="contact_persons[]" 
                                    value="{{ old('contact_persons.0') }}"
                                    placeholder="Enter contact person name">
                            </div>
                            @error('contact_persons.0')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>
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

@push('scripts')
<script src="{{ asset('js/agent-details.js') }}"></script>
@endpush