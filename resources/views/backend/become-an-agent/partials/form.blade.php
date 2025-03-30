<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div id="image-container">
            @if(isset($becomeAnAgent) && $becomeAnAgent->images)
                @foreach($becomeAnAgent->images as $index => $image)
                    <div class="mb-4 image-entry">
                        <div class="card p-3 bg-light">
                            @if($index > 0)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="mb-0">Image #{{ $index + 1 }}</h5>
                                    <button type="button" class="btn btn-sm btn-alt-danger remove-image" title="Remove this image">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label" for="images-{{ $index }}">Image <span class="text-danger">*</span></label>
                                <input class="form-control @error('images.'.$index) is-invalid @enderror" type="file" id="images-{{ $index }}" name="images[]" accept="image/*">
                                <div class="form-text">
                                    Allowed types: JPG, PNG, GIF. Max size: 2MB.
                                </div>
                                @error('images.'.$index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="preview-container mb-2">
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded" style="max-height: 150px;">
                                    <p class="small mt-1 mb-0">Current image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="mb-4 image-entry">
                    <div class="card p-3 bg-light">
                        <div class="mb-3">
                            <label class="form-label" for="images-0">Image <span class="text-danger">*</span></label>
                            <input class="form-control @error('images.0') is-invalid @enderror" type="file" id="images-0" name="images[]" accept="image/*" required>
                            <div class="form-text">
                                Allowed types: JPG, PNG, GIF. Max size: 2MB.
                            </div>
                            @error('images.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="preview-container mb-2"></div>
                    </div>
                </div>
            @endif
        </div>

        <div class="mb-3 text-center">
            <button type="button" class="btn btn-alt-success" id="add-image-btn">
                <i class="fa fa-plus"></i> Add Another Image
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let imageIndex = {{ isset($becomeAnAgent) && $becomeAnAgent->images ? count($becomeAnAgent->images) : 0 }};
        const container = document.getElementById('image-container');
        const addButton = document.getElementById('add-image-btn');

        // Function to handle file preview
        function setupFilePreview(inputElement, previewContainer) {
            inputElement.addEventListener('change', function() {
                previewContainer.innerHTML = '';
                
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    if (!file.type.match('image.*')) {
                        return;
                    }

                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'mt-2';
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-fluid rounded';
                        img.style.maxHeight = '150px';
                        
                        const fileName = document.createElement('p');
                        fileName.className = 'small mt-1 mb-0';
                        fileName.textContent = file.name;
                        
                        previewDiv.appendChild(img);
                        previewDiv.appendChild(fileName);
                        previewContainer.appendChild(previewDiv);
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
        }

        // Setup the preview for any existing file inputs
        document.querySelectorAll('.image-entry input[type="file"]').forEach(input => {
            setupFilePreview(input, input.closest('.image-entry').querySelector('.preview-container'));
        });

        // Add new image field
        addButton.addEventListener('click', function() {
            imageIndex++;
            
            const newImageEntry = document.createElement('div');
            newImageEntry.className = 'mb-4 image-entry';
            
            const card = document.createElement('div');
            card.className = 'card p-3 bg-light';
            
            const header = document.createElement('div');
            header.className = 'd-flex justify-content-between align-items-center mb-2';
            
            const title = document.createElement('h5');
            title.className = 'mb-0';
            title.textContent = `Image #${imageIndex}`;
            
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-alt-danger remove-image';
            removeBtn.innerHTML = '<i class="fa fa-times"></i>';
            removeBtn.title = 'Remove this image';
            
            header.appendChild(title);
            header.appendChild(removeBtn);
            
            const inputGroup = document.createElement('div');
            inputGroup.className = 'mb-3';
            
            const label = document.createElement('label');
            label.className = 'form-label';
            label.htmlFor = `new_images-${imageIndex}`;
            label.innerHTML = 'Image <span class="text-danger">*</span>';
            
            const input = document.createElement('input');
            input.className = 'form-control';
            input.type = 'file';
            input.id = `new_images-${imageIndex}`;
            input.name = 'new_images[]';
            input.accept = 'image/*';
            input.required = true;
            
            const helpText = document.createElement('div');
            helpText.className = 'form-text';
            helpText.textContent = 'Allowed types: JPG, PNG, GIF. Max size: 2MB.';
            
            inputGroup.appendChild(label);
            inputGroup.appendChild(input);
            inputGroup.appendChild(helpText);
            
            const previewContainer = document.createElement('div');
            previewContainer.className = 'preview-container mb-2';
            
            card.appendChild(header);
            card.appendChild(inputGroup);
            card.appendChild(previewContainer);
            
            newImageEntry.appendChild(card);
            container.appendChild(newImageEntry);
            
            // Setup preview for the new input
            setupFilePreview(input, previewContainer);
            
            // Setup remove button action
            removeBtn.addEventListener('click', function() {
                container.removeChild(newImageEntry);
            });
        });
        
        // Setup existing remove buttons
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.image-entry').remove();
            });
        });
    });
</script>
@endpush 