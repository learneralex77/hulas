document.addEventListener('DOMContentLoaded', function() {
    // Handle image preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function() {
            // Remove new image preview if exists
            const newPreview = imagePreview.querySelector('.new-image-preview');
            if (newPreview) {
                imagePreview.removeChild(newPreview);
            }

            if (this.files && this.files[0]) {
                const file = this.files[0];
                if (!file.type.match('image.*')) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewContainer = document.createElement('div');
                    previewContainer.className = 'new-image-preview mb-2';

                    const previewTitle = document.createElement('p');
                    previewTitle.className = 'mb-1';
                    previewTitle.textContent = 'New Image:';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid rounded';
                    img.style.maxHeight = '200px';

                    previewContainer.appendChild(previewTitle);
                    previewContainer.appendChild(img);
                    imagePreview.appendChild(previewContainer);
                };

                reader.readAsDataURL(file);
            }
        });
    }

    // Setup image preview for mission/vision icon uploads
    function setupMissionVisionImagePreview(imageInput) {
        imageInput.addEventListener('change', function() {
            const parentContainer = this.closest('.col-md-12');
            
            // Remove existing preview if it exists
            const existingPreview = parentContainer.querySelector('.new-image-preview');
            if (existingPreview) {
                parentContainer.removeChild(existingPreview);
            }
            
            if (this.files && this.files[0]) {
                const file = this.files[0];
                if (!file.type.match('image.*')) {
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const previewContainer = document.createElement('div');
                    previewContainer.className = 'new-image-preview mt-2';
                    
                    const previewTitle = document.createElement('p');
                    previewTitle.className = 'mb-1';
                    previewTitle.textContent = 'New Icon Image:';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid rounded';
                    img.style.maxHeight = '64px';
                    img.style.maxWidth = '64px';
                    
                    previewContainer.appendChild(previewTitle);
                    previewContainer.appendChild(img);
                    parentContainer.appendChild(previewContainer);
                };
                
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Setup all existing mission/vision image inputs
    document.querySelectorAll('input[name="mission_vision_image_files[]"]').forEach(input => {
        setupMissionVisionImagePreview(input);
    });

    // Handle mission and vision dynamic fields
    const container = document.getElementById('mission-vision-container');
    const addButton = document.getElementById('add-mission-vision');
    
    // Count existing mission vision items
    const missionVisionItems = document.querySelectorAll('.mission-vision-item');
    let missionVisionCount = missionVisionItems.length;

    // Function to add a new mission/vision item
    function addMissionVisionItem() {
        const newItem = document.createElement('div');
        newItem.className = 'mission-vision-item card p-3 bg-light mb-3';

        // Create header with title and remove button
        const header = document.createElement('div');
        header.className = 'd-flex justify-content-between align-items-center mb-2';

        const headerTitle = document.createElement('h5');
        headerTitle.className = 'mb-0';
        headerTitle.textContent = `Item #${missionVisionCount + 1}`;

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-sm btn-alt-danger remove-mission-vision';
        removeButton.title = 'Remove this item';
        removeButton.innerHTML = '<i class="fa fa-times"></i>';

        header.appendChild(headerTitle);
        header.appendChild(removeButton);
        newItem.appendChild(header);

        // Create first row with title and icon inputs
        const row = document.createElement('div');
        row.className = 'row mb-3';

        // Title column
        const titleCol = document.createElement('div');
        titleCol.className = 'col-md-6';

        const titleLabel = document.createElement('label');
        titleLabel.className = 'form-label';
        titleLabel.htmlFor = `mission_vision_titles_${missionVisionCount}`;
        titleLabel.innerHTML = 'Title <span class="text-danger">*</span>';

        const titleInput = document.createElement('input');
        titleInput.type = 'text';
        titleInput.className = 'form-control';
        titleInput.id = `mission_vision_titles_${missionVisionCount}`;
        titleInput.name = 'mission_vision_titles[]';
        titleInput.required = true;

        const titleFeedback = document.createElement('div');
        titleFeedback.className = 'invalid-feedback';
        titleFeedback.textContent = 'Please enter a title.';

        titleCol.appendChild(titleLabel);
        titleCol.appendChild(titleInput);
        titleCol.appendChild(titleFeedback);

        // Icon column
        const iconCol = document.createElement('div');
        iconCol.className = 'col-md-6';

        const iconLabel = document.createElement('label');
        iconLabel.className = 'form-label';
        iconLabel.htmlFor = `mission_vision_icons_${missionVisionCount}`;
        iconLabel.textContent = 'Icon (Optional)';

        const iconInput = document.createElement('input');
        iconInput.type = 'text';
        iconInput.className = 'form-control';
        iconInput.id = `mission_vision_icons_${missionVisionCount}`;
        iconInput.name = 'mission_vision_icons[]';

        const iconHelp = document.createElement('div');
        iconHelp.className = 'form-text';
        iconHelp.textContent = 'Enter a Font Awesome icon name (e.g., "check", "flag") or leave empty to use uploaded image.';

        const iconFeedback = document.createElement('div');
        iconFeedback.className = 'invalid-feedback';
        iconFeedback.textContent = 'Please enter an icon name.';

        iconCol.appendChild(iconLabel);
        iconCol.appendChild(iconInput);
        iconCol.appendChild(iconHelp);
        iconCol.appendChild(iconFeedback);

        row.appendChild(titleCol);
        row.appendChild(iconCol);
        newItem.appendChild(row);
        
        // Create the image upload row
        const imageRow = document.createElement('div');
        imageRow.className = 'row mb-3';
        
        // Image column
        const imageCol = document.createElement('div');
        imageCol.className = 'col-md-12';
        
        const imageLabel = document.createElement('label');
        imageLabel.className = 'form-label';
        imageLabel.htmlFor = `mission_vision_image_files_${missionVisionCount}`;
        imageLabel.textContent = 'Icon Image';
        
        const imageInput = document.createElement('input');
        imageInput.type = 'file';
        imageInput.className = 'form-control';
        imageInput.id = `mission_vision_image_files_${missionVisionCount}`;
        imageInput.name = 'mission_vision_image_files[]';
        imageInput.accept = 'image/*';
        
        const imageHelp = document.createElement('div');
        imageHelp.className = 'form-text';
        imageHelp.textContent = 'Upload an image to use instead of a Font Awesome icon. Recommended size: 64x64px.';
        
        const imageFeedback = document.createElement('div');
        imageFeedback.className = 'invalid-feedback';
        imageFeedback.textContent = 'Please upload a valid image.';
        
        imageCol.appendChild(imageLabel);
        imageCol.appendChild(imageInput);
        imageCol.appendChild(imageHelp);
        imageCol.appendChild(imageFeedback);
        
        imageRow.appendChild(imageCol);
        newItem.appendChild(imageRow);
        
        // Setup image preview for this new input
        setupMissionVisionImagePreview(imageInput);

        // Description textarea
        const descriptionGroup = document.createElement('div');
        descriptionGroup.className = 'mb-3';

        const descLabel = document.createElement('label');
        descLabel.className = 'form-label';
        descLabel.htmlFor = `mission_vision_descriptions_${missionVisionCount}`;
        descLabel.innerHTML = 'Description <span class="text-danger">*</span>';

        const descTextarea = document.createElement('textarea');
        descTextarea.className = 'form-control';
        descTextarea.id = `mission_vision_descriptions_${missionVisionCount}`;
        descTextarea.name = 'mission_vision_descriptions[]';
        descTextarea.rows = 3;
        descTextarea.required = true;

        const descFeedback = document.createElement('div');
        descFeedback.className = 'invalid-feedback';
        descFeedback.textContent = 'Please enter a description.';

        descriptionGroup.appendChild(descLabel);
        descriptionGroup.appendChild(descTextarea);
        descriptionGroup.appendChild(descFeedback);
        newItem.appendChild(descriptionGroup);

        // Append the new item to the container
        container.appendChild(newItem);

        // Add remove button functionality
        removeButton.addEventListener('click', function() {
            container.removeChild(newItem);
        });

        missionVisionCount++;
    }

    // Add event listener to the "Add Another Item" button
    if (addButton && container) {
        addButton.addEventListener('click', addMissionVisionItem);
    }

    // Setup existing remove buttons for mission vision items
    document.querySelectorAll('.remove-mission-vision').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.mission-vision-item').remove();
        });
    });
}); 