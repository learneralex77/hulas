@extends('layouts.main')

@section('title')
    Edit Agent Details
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('agent-details.update', $agentDetail) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Agent Details</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-alt-secondary" href="{{ route('agent-details.index') }}">
                            <i class="fa fa-arrow-left me-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-check me-1"></i> Update
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="mb-4">
                                <label class="form-label" for="district_id">District <span class="text-danger">*</span></label>
                                <select class="form-select @error('district_id') is-invalid @enderror" id="district_id" name="district_id" required>
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id', $agentDetail->district_id) == $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                
                            <hr>
                            
                            @php
                                $stateAgentNames = $agentDetail->state_agent_names ?? [];
                                $addresses = $agentDetail->addresses ?? [];
                                $contactNos = $agentDetail->contact_nos ?? [];
                                $contactPersons = $agentDetail->contact_persons ?? [];
                                
                                // Ensure we're working with arrays
                                $stateAgentNames = is_array($stateAgentNames) ? $stateAgentNames : [];
                                $addresses = is_array($addresses) ? $addresses : [];
                                $contactNos = is_array($contactNos) ? $contactNos : [];
                                $contactPersons = is_array($contactPersons) ? $contactPersons : [];
                            @endphp
                            
                            <!-- State Agent Names Section -->
                            <div class="mb-4">
                                <h4>State Agent Names <small class="text-muted">(You can add multiple entries)</small></h4>
                                
                                <div id="agent-names-container">
                                    @forelse($stateAgentNames as $index => $name)
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
                                    @empty
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
                                    @endforelse
                                </div>
                                
                                <div class="text-end mb-4">
                                    <button type="button" class="btn btn-sm btn-alt-success" id="add-agent-name">
                                        <i class="fa fa-plus me-1"></i> Add Another Agent Name
                                    </button>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Addresses Section -->
                            <div class="mb-4">
                                <h4>Addresses <small class="text-muted">(You can add multiple entries)</small></h4>
                                
                                <div id="addresses-container">
                                    @forelse($addresses as $index => $address)
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
                                    @empty
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
                                    @endforelse
                                </div>
                                
                                <div class="text-end mb-4">
                                    <button type="button" class="btn btn-sm btn-alt-success" id="add-address">
                                        <i class="fa fa-plus me-1"></i> Add Another Address
                                    </button>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Contact Numbers Section -->
                            <div class="mb-4">
                                <h4>Contact Numbers <small class="text-muted">(You can add multiple entries)</small></h4>
                                
                                <div id="contact-nos-container">
                                    @forelse($contactNos as $index => $contactNo)
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
                                    @empty
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
                                    @endforelse
                                </div>
                                
                                <div class="text-end mb-4">
                                    <button type="button" class="btn btn-sm btn-alt-success" id="add-contact-no">
                                        <i class="fa fa-plus me-1"></i> Add Another Contact Number
                                    </button>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Contact Persons Section -->
                            <div class="mb-4">
                                <h4>Contact Persons <small class="text-muted">(You can add multiple entries)</small></h4>
                                
                                <div id="contact-persons-container">
                                    @forelse($contactPersons as $index => $contactPerson)
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
                                    @empty
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
                                    @endforelse
                                </div>
                                
                                <div class="text-end mb-4">
                                    <button type="button" class="btn btn-sm btn-alt-success" id="add-contact-person">
                                        <i class="fa fa-plus me-1"></i> Add Another Contact Person
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // State Agent Names
        const agentNamesContainer = document.getElementById('agent-names-container');
        const addAgentNameBtn = document.getElementById('add-agent-name');
        let agentNameIndex = {{ count($stateAgentNames) > 0 ? count($stateAgentNames) : 1 }};
        
        addAgentNameBtn.addEventListener('click', function() {
            const newField = document.createElement('div');
            newField.className = 'mb-3';
            newField.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" 
                        id="state_agent_names_${agentNameIndex}" name="state_agent_names[]" 
                        placeholder="Enter state agent name">
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            agentNamesContainer.appendChild(newField);
            
            // Add event listener to remove button
            newField.querySelector('.remove-field').addEventListener('click', function() {
                agentNamesContainer.removeChild(newField);
            });
            
            agentNameIndex++;
        });
        
        // Addresses
        const addressesContainer = document.getElementById('addresses-container');
        const addAddressBtn = document.getElementById('add-address');
        let addressIndex = {{ count($addresses) > 0 ? count($addresses) : 1 }};
        
        addAddressBtn.addEventListener('click', function() {
            const newField = document.createElement('div');
            newField.className = 'mb-3';
            newField.innerHTML = `
                <div class="input-group">
                    <textarea class="form-control" 
                        id="addresses_${addressIndex}" name="addresses[]" rows="2"
                        placeholder="Enter address"></textarea>
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            addressesContainer.appendChild(newField);
            
            // Add event listener to remove button
            newField.querySelector('.remove-field').addEventListener('click', function() {
                addressesContainer.removeChild(newField);
            });
            
            addressIndex++;
        });
        
        // Contact Numbers
        const contactNosContainer = document.getElementById('contact-nos-container');
        const addContactNoBtn = document.getElementById('add-contact-no');
        let contactNoIndex = {{ count($contactNos) > 0 ? count($contactNos) : 1 }};
        
        addContactNoBtn.addEventListener('click', function() {
            const newField = document.createElement('div');
            newField.className = 'mb-3';
            newField.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" 
                        id="contact_nos_${contactNoIndex}" name="contact_nos[]" 
                        placeholder="Enter contact number">
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            contactNosContainer.appendChild(newField);
            
            // Add event listener to remove button
            newField.querySelector('.remove-field').addEventListener('click', function() {
                contactNosContainer.removeChild(newField);
            });
            
            contactNoIndex++;
        });
        
        // Contact Persons
        const contactPersonsContainer = document.getElementById('contact-persons-container');
        const addContactPersonBtn = document.getElementById('add-contact-person');
        let contactPersonIndex = {{ count($contactPersons) > 0 ? count($contactPersons) : 1 }};
        
        addContactPersonBtn.addEventListener('click', function() {
            const newField = document.createElement('div');
            newField.className = 'mb-3';
            newField.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" 
                        id="contact_persons_${contactPersonIndex}" name="contact_persons[]" 
                        placeholder="Enter contact person name">
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            contactPersonsContainer.appendChild(newField);
            
            // Add event listener to remove button
            newField.querySelector('.remove-field').addEventListener('click', function() {
                contactPersonsContainer.removeChild(newField);
            });
            
            contactPersonIndex++;
        });
        
        // Add event listeners to all existing remove buttons
        document.querySelectorAll('.remove-field').forEach(button => {
            button.addEventListener('click', function() {
                const field = this.closest('.mb-3');
                field.parentNode.removeChild(field);
            });
        });
    });
</script>
@endpush 