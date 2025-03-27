@extends('layouts.main')

@section('title')
    Add Agent Details
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('agent-details.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Agent Details</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-alt-primary" href="{{ route('agent-details.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        
                    </div>
                </div>
                <div class="block-content">
                    @include('agent-details.partials.form')
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary mb-3">
                        <i class="fa fa-save me-1"></i> {{ isset($agentDetail) ? 'Update' : 'Create' }} Agent Detail
                    </button>
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
        let agentNameIndex = 1;
        
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
        let addressIndex = 1;
        
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
        let contactNoIndex = 1;
        
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
        let contactPersonIndex = 1;
        
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
    });
</script>
@endpush 