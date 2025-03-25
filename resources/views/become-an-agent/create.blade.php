@extends('layouts.main')

@section('title')
    Add Become an Agent Images
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('become-an-agent.store') }}" method="POST" enctype="multipart/form-data" id="agent-form">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Images</h3>
                    <div class="block-options">
                        <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-sm btn-alt-success">
                            <i class="fa fa-check"></i> Save
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div id="image-container">
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
                            </div>

                            <div class="mb-4 text-center">
                                <button type="button" class="btn btn-alt-success" id="add-image-btn">
                                    <i class="fa fa-plus"></i> Add Another Image
                                </button>
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
        let imageIndex = 0;
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

        // Setup the preview for the initial file input
        setupFilePreview(
            document.getElementById('images-0'),
            document.querySelector('.image-entry .preview-container')
        );

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
            title.textContent = `Image #${imageIndex + 1}`;
            
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
            label.htmlFor = `images-${imageIndex}`;
            label.innerHTML = 'Image <span class="text-danger">*</span>';
            
            const input = document.createElement('input');
            input.className = 'form-control';
            input.type = 'file';
            input.id = `images-${imageIndex}`;
            input.name = 'images[]';
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
    });
</script>
@endpush 