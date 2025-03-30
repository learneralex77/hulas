document.addEventListener('DOMContentLoaded', function() {
    // Check if script has already been initialized to prevent double initialization
    if (window.agentDetailsInitialized) return;
    window.agentDetailsInitialized = true;
    
    // Setup agent names section
    setupAgentNameFields();
    
    // Setup addresses section
    setupAddressFields();
    
    // Setup contact numbers section
    setupContactNumberFields();
    
    // Setup contact persons section
    setupContactPersonFields();
    
    /**
     * Setup agent name fields
     */
    function setupAgentNameFields() {
        const container = document.getElementById('agent-names-container');
        const addButton = document.getElementById('add-agent-name');
        
        if (!container || !addButton) return;
        
        addButton.addEventListener('click', function() {
            const fieldCount = container.querySelectorAll('.input-group').length;
            
            const fieldItem = document.createElement('div');
            fieldItem.className = 'mb-3';
            fieldItem.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" 
                        id="state_agent_names_${fieldCount}" 
                        name="state_agent_names[]" 
                        placeholder="Enter state agent name">
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            container.appendChild(fieldItem);
            
            fieldItem.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(fieldItem);
            });
        });
    
    // Add event listeners to existing remove buttons
        container.querySelectorAll('.remove-field').forEach(button => {
        button.addEventListener('click', function() {
                const fieldItem = this.closest('.mb-3');
                if (fieldItem && fieldItem.parentNode) {
                    fieldItem.parentNode.removeChild(fieldItem);
                }
            });
        });
    }
    
    /**
     * Setup address fields
     */
    function setupAddressFields() {
        const container = document.getElementById('addresses-container');
        const addButton = document.getElementById('add-address');
        
        if (!container || !addButton) return;
        
        addButton.addEventListener('click', function() {
            const fieldCount = container.querySelectorAll('.input-group').length;
            
            const fieldItem = document.createElement('div');
            fieldItem.className = 'mb-3';
            fieldItem.innerHTML = `
                <div class="input-group">
                    <textarea class="form-control" 
                        id="addresses_${fieldCount}" 
                        name="addresses[]" 
                        rows="2"
                        placeholder="Enter address"></textarea>
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            container.appendChild(fieldItem);
            
            fieldItem.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(fieldItem);
            });
        });
        
        // Add event listeners to existing remove buttons
        container.querySelectorAll('.remove-field').forEach(button => {
            button.addEventListener('click', function() {
                const fieldItem = this.closest('.mb-3');
                if (fieldItem && fieldItem.parentNode) {
                    fieldItem.parentNode.removeChild(fieldItem);
                }
            });
        });
    }
    
    /**
     * Setup contact number fields
     */
    function setupContactNumberFields() {
        const container = document.getElementById('contact-nos-container');
        const addButton = document.getElementById('add-contact-no');
        
        if (!container || !addButton) return;
        
        addButton.addEventListener('click', function() {
            const fieldCount = container.querySelectorAll('.input-group').length;
            
            const fieldItem = document.createElement('div');
            fieldItem.className = 'mb-3';
            fieldItem.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" 
                        id="contact_nos_${fieldCount}" 
                        name="contact_nos[]" 
                        placeholder="Enter contact number">
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            container.appendChild(fieldItem);
            
            fieldItem.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(fieldItem);
            });
        });
        
        // Add event listeners to existing remove buttons
        container.querySelectorAll('.remove-field').forEach(button => {
            button.addEventListener('click', function() {
                const fieldItem = this.closest('.mb-3');
                if (fieldItem && fieldItem.parentNode) {
                    fieldItem.parentNode.removeChild(fieldItem);
                }
            });
        });
    }
    
    /**
     * Setup contact person fields
     */
    function setupContactPersonFields() {
        const container = document.getElementById('contact-persons-container');
        const addButton = document.getElementById('add-contact-person');
        
        if (!container || !addButton) return;
        
        addButton.addEventListener('click', function() {
            const fieldCount = container.querySelectorAll('.input-group').length;
            
            const fieldItem = document.createElement('div');
            fieldItem.className = 'mb-3';
            fieldItem.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" 
                        id="contact_persons_${fieldCount}" 
                        name="contact_persons[]" 
                        placeholder="Enter contact person name">
                    <button type="button" class="btn btn-outline-danger remove-field">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            
            container.appendChild(fieldItem);
            
            fieldItem.querySelector('.remove-field').addEventListener('click', function() {
                container.removeChild(fieldItem);
            });
        });
        
        // Add event listeners to existing remove buttons
        container.querySelectorAll('.remove-field').forEach(button => {
            button.addEventListener('click', function() {
                const fieldItem = this.closest('.mb-3');
                if (fieldItem && fieldItem.parentNode) {
                    fieldItem.parentNode.removeChild(fieldItem);
                }
            });
        });
    }
}); 