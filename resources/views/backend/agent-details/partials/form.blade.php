<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div class="row mb-4">
            <div class="col-md-6">
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
        </div>
            
        <hr>
        
        <!-- State Agent Names Section -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4>State Agent Names <small class="text-muted">(You can add multiple entries)</small></h4>
                <button type="button" class="btn btn-sm btn-alt-success" id="add-agent-name">
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
        
        <hr>
        
        <!-- Addresses Section -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4>Addresses <small class="text-muted">(You can add multiple entries)</small></h4>
                <button type="button" class="btn btn-sm btn-alt-success" id="add-address">
                    <i class="fa fa-plus"></i> Add Address
                </button>
            </div>
            
            <div id="addresses-container">
                @if(isset($agentDetail) && is_array($agentDetail->addresses) && count($agentDetail->addresses) > 0)
                    @foreach($agentDetail->addresses as $index => $address)
                        <div class="mb-3">
                            <div class="input-group">
                                <textarea class="form-control @error('addresses.'.$index) is-invalid @enderror" 
                                    id="addresses_{{ $index }}" name="addresses[]" rows="2"
                                    placeholder="Enter address">{{ old('addresses.'.$index, $address) }}</textarea>
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
                            <textarea class="form-control @error('addresses.0') is-invalid @enderror" 
                                id="addresses_0" name="addresses[]" rows="2"
                                placeholder="Enter address">{{ old('addresses.0') }}</textarea>
                        </div>
                        @error('addresses.0')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
            </div>
        </div>
        
        <hr>
        
        <!-- Contact Numbers Section -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4>Contact Numbers <small class="text-muted">(You can add multiple entries)</small></h4>
                <button type="button" class="btn btn-sm btn-alt-success" id="add-contact-no">
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
        
        <hr>
        
        <!-- Contact Persons Section -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4>Contact Persons <small class="text-muted">(You can add multiple entries)</small></h4>
                <button type="button" class="btn btn-sm btn-alt-success" id="add-contact-person">
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
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initializing variables for State Agent Names
    const agentNamesContainer = document.getElementById('agent-names-container');
    const addAgentNameBtn = document.getElementById('add-agent-name');
    let agentNameIndex = {{ isset($agentDetail) && $agentDetail->state_agent_names && is_array($agentDetail->state_agent_names) ? count($agentDetail->state_agent_names) : 1 }};
    
    // Handle "Add Name" button click
    addAgentNameBtn.addEventListener('click', function() {
        // Check if there is already a new field in the container. If yes, return.
        const existingFields = agentNamesContainer.querySelectorAll('input[type="text"]');
        if (existingFields.length > 0 && existingFields[existingFields.length - 1].value.trim() === '') {
            return; // Don't add another field until the current one is filled
        }

        // Create a new input field for the agent name
        const newField = document.createElement('div');
        newField.className = 'mb-3';
        newField.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" 
                    id="state_agent_names_${agentNameIndex}" name="state_agent_names[]" 
                    placeholder="Enter state agent name" required>
                <button type="button" class="btn btn-outline-danger remove-field">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        `;
        
        // Append the new field to the container
        agentNamesContainer.appendChild(newField);

        // Add the remove button functionality
        const removeButton = newField.querySelector('.remove-field');
        removeButton.addEventListener('click', function() {
            agentNamesContainer.removeChild(newField);
        });

        // Increment the index
        agentNameIndex++;
    });

    // Initializing variables for Addresses
    const addressesContainer = document.getElementById('addresses-container');
    const addAddressBtn = document.getElementById('add-address');
    let addressIndex = {{ isset($agentDetail) && $agentDetail->addresses && is_array($agentDetail->addresses) ? count($agentDetail->addresses) : 1 }};
    
    // Handle "Add Address" button click
    addAddressBtn.addEventListener('click', function() {
        // Check if there is already a new field in the container. If yes, return.
        const existingFields = addressesContainer.querySelectorAll('textarea');
        if (existingFields.length > 0 && existingFields[existingFields.length - 1].value.trim() === '') {
            return; // Don't add another field until the current one is filled
        }

        // Create a new input field for the address
        const newField = document.createElement('div');
        newField.className = 'mb-3';
        newField.innerHTML = `
            <div class="input-group">
                <textarea class="form-control" 
                    id="addresses_${addressIndex}" name="addresses[]" rows="2" 
                    placeholder="Enter address" required></textarea>
                <button type="button" class="btn btn-outline-danger remove-field">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        `;
        
        // Append the new field to the container
        addressesContainer.appendChild(newField);

        // Add the remove button functionality
        const removeButton = newField.querySelector('.remove-field');
        removeButton.addEventListener('click', function() {
            addressesContainer.removeChild(newField);
        });

        // Increment the index
        addressIndex++;
    });

    // Initializing variables for Contact Numbers
    const contactNosContainer = document.getElementById('contact-nos-container');
    const addContactNoBtn = document.getElementById('add-contact-no');
    let contactNoIndex = {{ isset($agentDetail) && $agentDetail->contact_nos && is_array($agentDetail->contact_nos) ? count($agentDetail->contact_nos) : 1 }};
    
    // Handle "Add Number" button click
    addContactNoBtn.addEventListener('click', function() {
        // Check if there is already a new field in the container. If yes, return.
        const existingFields = contactNosContainer.querySelectorAll('input[type="text"]');
        if (existingFields.length > 0 && existingFields[existingFields.length - 1].value.trim() === '') {
            return; // Don't add another field until the current one is filled
        }

        // Create a new input field for the contact number
        const newField = document.createElement('div');
        newField.className = 'mb-3';
        newField.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" 
                    id="contact_nos_${contactNoIndex}" name="contact_nos[]" 
                    placeholder="Enter contact number" required>
                <button type="button" class="btn btn-outline-danger remove-field">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        `;
        
        // Append the new field to the container
        contactNosContainer.appendChild(newField);

        // Add the remove button functionality
        const removeButton = newField.querySelector('.remove-field');
        removeButton.addEventListener('click', function() {
            contactNosContainer.removeChild(newField);
        });

        // Increment the index
        contactNoIndex++;
    });

    // Initializing variables for Contact Persons
    const contactPersonsContainer = document.getElementById('contact-persons-container');
    const addContactPersonBtn = document.getElementById('add-contact-person');
    let contactPersonIndex = {{ isset($agentDetail) && $agentDetail->contact_persons && is_array($agentDetail->contact_persons) ? count($agentDetail->contact_persons) : 1 }};
    
    // Handle "Add Person" button click
    addContactPersonBtn.addEventListener('click', function() {
        // Check if there is already a new field in the container. If yes, return.
        const existingFields = contactPersonsContainer.querySelectorAll('input[type="text"]');
        if (existingFields.length > 0 && existingFields[existingFields.length - 1].value.trim() === '') {
            return; // Don't add another field until the current one is filled
        }

        // Create a new input field for the contact person
        const newField = document.createElement('div');
        newField.className = 'mb-3';
        newField.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" 
                    id="contact_persons_${contactPersonIndex}" name="contact_persons[]" 
                    placeholder="Enter contact person name" required>
                <button type="button" class="btn btn-outline-danger remove-field">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        `;
        
        // Append the new field to the container
        contactPersonsContainer.appendChild(newField);

        // Add the remove button functionality
        const removeButton = newField.querySelector('.remove-field');
        removeButton.addEventListener('click', function() {
            contactPersonsContainer.removeChild(newField);
        });

        // Increment the index
        contactPersonIndex++;
    });

    // Add event listeners to existing remove buttons
    document.querySelectorAll('.remove-field').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.mb-3').remove();
        });
    });
});
</script>
@endpush