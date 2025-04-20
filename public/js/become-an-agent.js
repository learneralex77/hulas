document.addEventListener('DOMContentLoaded', function() {
    // Check if script has already been initialized to prevent double initialization
    if (window.becomeAnAgentInitialized) return;
    window.becomeAnAgentInitialized = true;
    
    const addImageBtn = document.getElementById('add-image-btn');
    const imageContainer = document.getElementById('image-container');
    
    if (!addImageBtn || !imageContainer) return;

    // Add new image field
    addImageBtn.addEventListener('click', function() {
        // Get current number of images
        const imageEntries = imageContainer.querySelectorAll('.image-entry');
        const nextIndex = imageEntries.length;
        
        // Create new image entry
        const newImageEntry = document.createElement('div');
        newImageEntry.className = 'mb-2 image-entry';
        newImageEntry.innerHTML = `
            <div class="p-0 border-0">
                <div class="d-flex ps-0">
                    <h5 class="mb-0">Image #${nextIndex + 1}</h5>
                    <button type="button" class="btn btn-sm btn-alt-danger ms-2 remove-image" title="Remove this image">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="mb-2 ps-0">
                    <label class="form-label ps-0" for="images-${nextIndex}">Image <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="images-${nextIndex}" name="images[]" accept="image/*" required>
                    <div class="form-text">
                        Allowed types: JPG, PNG, GIF, WebP.   .
                    </div>
                </div>
                <div class="preview-container mb-1"></div>
            </div>
        `;
        
        // Add to container
        imageContainer.appendChild(newImageEntry);
        
        // Add event listener for remove button
        const removeBtn = newImageEntry.querySelector('.remove-image');
        removeBtn.addEventListener('click', function() {
            imageContainer.removeChild(newImageEntry);
        });
        
        // Add event listener for image preview
        const fileInput = newImageEntry.querySelector('input[type="file"]');
        fileInput.addEventListener('change', function() {
            handleImagePreview(this);
        });
    });
    
    // Handle existing remove buttons
    document.querySelectorAll('.remove-image').forEach(button => {
        button.addEventListener('click', function() {
            const imageEntry = this.closest('.image-entry');
            imageContainer.removeChild(imageEntry);
        });
    });
    
    // Handle image previews for existing and new file inputs
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            handleImagePreview(this);
        });
    });
    
    /**
     * Handle image preview
     * @param {HTMLInputElement} input - The file input element
     */
    function handleImagePreview(input) {
        const previewContainer = input.closest('.p-0').querySelector('.preview-container');
        previewContainer.innerHTML = '';
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewContainer.innerHTML = `
                    <div class="mt-2">
                        <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 150px;">
                        <p class="small mt-1 mb-0">Preview</p>
                    </div>
                `;
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
}); 