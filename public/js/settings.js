document.addEventListener('DOMContentLoaded', function() {
    // Handle logo preview
    const previewImage = (input, previewId) => {
        const preview = document.getElementById(previewId);
        if (!preview) return;
        
        // Remove new preview if exists
        const newPreview = preview.querySelector('.new-preview');
        if (newPreview) {
            preview.removeChild(newPreview);
        }
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (!file.type.match('image.*')) {
                return;
            }

            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewContainer = document.createElement('div');
                previewContainer.className = 'new-preview mb-2';
                
                const previewTitle = document.createElement('p');
                previewTitle.className = 'mb-1';
                previewTitle.textContent = 'New Image:';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid rounded';
                img.style.maxHeight = '150px';
                
                previewContainer.appendChild(previewTitle);
                previewContainer.appendChild(img);
                preview.appendChild(previewContainer);
            };
            
            reader.readAsDataURL(file);
        }
    };
    
    // Main logo preview
    const logoInput = document.getElementById('logo');
    if (logoInput) {
        logoInput.addEventListener('change', function() {
            previewImage(this, 'logo-preview');
        });
    }
    
    // Primary logo preview
    const primaryLogoInput = document.getElementById('primary_logo');
    if (primaryLogoInput) {
        primaryLogoInput.addEventListener('change', function() {
            previewImage(this, 'primary-logo-preview');
        });
    }
    
    // Secondary logo preview
    const secondaryLogoInput = document.getElementById('secondary_logo');
    if (secondaryLogoInput) {
        secondaryLogoInput.addEventListener('change', function() {
            previewImage(this, 'secondary-logo-preview');
        });
    }
}); 