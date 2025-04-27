document.addEventListener('DOMContentLoaded', function() {
    // Get the initial detail index based on existing entries
    let detailIndex = typeof serviceTranslationsCount !== 'undefined' ? serviceTranslationsCount : 1;
    const container = document.getElementById('service-details-container');
    const addButton = document.getElementById('add-service-detail');
    const form = document.querySelector('form');

    if (!container || !addButton) return;

    // Function to update indices on all detail items
    function updateIndices() {
        const detailItems = container.querySelectorAll('.service-detail-item');
        const indices = [];
        
        detailItems.forEach((item, index) => {
            // Store current index in indices array
            indices.push(index);
            
            // Skip the first item (index 0)
            const displayIndex = index > 0 ? index : '';
            const titleElement = item.querySelector('h5');
            
            if (titleElement) {
                titleElement.textContent = index > 0 ? `Additional Entry #${index}` : 'Primary Entry';
            }
            
            // Update data-index attribute
            item.dataset.index = index;
            
            // Update all input names and IDs
            updateInputAttributes(item, index);
        });
        
        // Update the hidden input field with current indices
        const indicesInput = document.getElementById('service-detail-indices');
        if (indicesInput) {
            indicesInput.value = JSON.stringify(indices);
        }
    }
    
    // Function to update input attributes within a detail item
    function updateInputAttributes(detailItem, index) {
        // Update name input
        const nameInput = detailItem.querySelector('input[id^="names_"]');
        if (nameInput) {
            nameInput.id = `names_${index}`;
            nameInput.name = `names[${index}]`;
            
            const nameLabel = detailItem.querySelector('label[for^="names_"]');
            if (nameLabel) {
                nameLabel.htmlFor = `names_${index}`;
            }
        }
        
        // Update icon input
        const iconInput = detailItem.querySelector('input[id^="icons_"]');
        if (iconInput) {
            iconInput.id = `icons_${index}`;
            iconInput.name = `icons[${index}]`;
            
            const iconLabel = detailItem.querySelector('label[for^="icons_"]');
            if (iconLabel) {
                iconLabel.htmlFor = `icons_${index}`;
            }
        }
        
        // Update description textarea
        const descInput = detailItem.querySelector('textarea[id^="descriptions_"]');
        if (descInput) {
            descInput.id = `descriptions_${index}`;
            descInput.name = `descriptions[${index}]`;
            
            const descLabel = detailItem.querySelector('label[for^="descriptions_"]');
            if (descLabel) {
                descLabel.htmlFor = `descriptions_${index}`;
            }
        }
        
        // Update external link input
        const linkInput = detailItem.querySelector('input[id^="external_links_"]');
        if (linkInput) {
            linkInput.id = `external_links_${index}`;
            linkInput.name = `external_links[${index}]`;
            
            const linkLabel = detailItem.querySelector('label[for^="external_links_"]');
            if (linkLabel) {
                linkLabel.htmlFor = `external_links_${index}`;
            }
        }
    }

    // Validate form before submission to prevent issues with multiple entries
    if (form) {
        form.addEventListener('submit', function(event) {
            // Update indices before submission to ensure sequential numbering
            updateIndices();
            
            // Make sure at least one name field is filled
            const nameInputs = document.querySelectorAll('input[name^="names["]');
            let hasName = false;
            
            nameInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasName = true;
                }
            });
            
            if (!hasName) {
                event.preventDefault();
                alert('Please enter at least one service name');
                return false;
            }
            
            // Process file uploads to ensure they're ready for submission
            const fileInputs = document.querySelectorAll('input[type="file"]');
            let validFiles = true;
            
            fileInputs.forEach(input => {
                if (input.files.length > 0 && !validateFile(input.files[0])) {
                    validFiles = false;
                    input.classList.add('is-invalid');
                }
            });
            
            if (!validFiles) {
                event.preventDefault();
                alert('Please check the file uploads. One or more files may be invalid.');
                return false;
            }
            
            // All good, allow form to submit
            return true;
        });
    }
    
    // Validate files
    function validateFile(file) {
        if (!file) return true;
        
        const acceptedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml', 'image/webp', 'application/pdf'];
        return acceptedTypes.includes(file.type);
    }

    // Add new service detail section
    addButton.addEventListener('click', function() {
        // Get the current highest index
        const currentItems = container.querySelectorAll('.service-detail-item');
        const newIndex = currentItems.length;
        
        const newDetail = document.createElement('div');
        newDetail.className = 'service-detail-item border rounded p-2 mb-2';
        
        // Set a data attribute for the index to keep track
        newDetail.dataset.index = newIndex;
        
        newDetail.innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0 ps-0">Additional Entry #${newIndex}</h5>
            <button type="button" class="btn btn-sm btn-alt-danger remove-detail" title="Remove this entry">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <label class="form-label ps-0" for="names_${newIndex}">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="names_${newIndex}" name="names[${newIndex}]" required>
            </div>

            <div class="col-md-6">
                <label class="form-label ps-0" for="icons_${newIndex}">Icon Image</label>
                <input type="file" class="form-control" id="icons_${newIndex}" name="icons[${newIndex}]" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                <small class="text-muted">Allowed file types: JPEG, PNG, JPG, GIF, SVG, WebP     </small>
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label ps-0" for="descriptions_${newIndex}">Description</label>
            <textarea class="form-control" id="descriptions_${newIndex}" name="descriptions[${newIndex}]" rows="3"></textarea>
        </div>

        <div class="mb-2">
            <label class="form-label ps-0" for="external_links_${newIndex}">External Link</label>
            <input type="url" class="form-control" id="external_links_${newIndex}" name="external_links[${newIndex}]" placeholder="https://example.com">
        </div>
    `;

        container.appendChild(newDetail);
        
        // Add event listener to remove button with proper index updating
        newDetail.querySelector('.remove-detail').addEventListener('click', function() {
            container.removeChild(newDetail);
            // Re-index remaining items
            updateIndices();
        });
        
        // Add validation to file input
        const fileInput = newDetail.querySelector('input[type="file"]');
        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0 && !validateFile(this.files[0])) {
                    this.classList.add('is-invalid');
                    this.value = ''; // Clear the invalid file
                    alert('Please select a valid file type');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }
        
        // Update all indices to ensure sequential numbering
        updateIndices();
    });

    // Add event listeners to existing remove buttons
    document.querySelectorAll('.remove-detail').forEach(button => {
        button.addEventListener('click', function() {
            const detailItem = this.closest('.service-detail-item');
            container.removeChild(detailItem);
            // Re-index remaining items
            updateIndices();
        });
    });
    
    // Add validation to existing file inputs
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            if (this.files.length > 0 && !validateFile(this.files[0])) {
                this.classList.add('is-invalid');
                this.value = ''; // Clear the invalid file
                alert('Please select a valid file type');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    });
    
    // Initially update indices to ensure proper ordering
    updateIndices();
}); 