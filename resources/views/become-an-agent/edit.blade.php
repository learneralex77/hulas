@extends('layouts.main')

@section('title')
    Edit Become an Agent Images
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('become-an-agent.update', $becomeAnAgent) }}" method="POST" enctype="multipart/form-data" id="agent-form">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Images</h3>
                    <div class="block-options">
                        <a href="{{ route('become-an-agent.index') }}" class="btn btn-alt-secondary">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check mr-1"></i> Update
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="mb-4">
                                <h4>Current Images</h4>
                                <div class="row" id="existing-images">
                                    @if (is_array($becomeAnAgent->images) && count($becomeAnAgent->images) > 0)
                                        @foreach ($becomeAnAgent->images as $index => $image)
                                            <div class="col-md-4 mb-3" id="image-container-{{ $index }}">
                                                <div class="card h-100">
                                                    <img src="{{ asset('storage/' . $image) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Image">
                                                    <div class="card-body p-2">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input delete-checkbox" type="checkbox" id="delete-{{ $index }}" name="delete_images[]" value="{{ $index }}">
                                                                <label class="form-check-label" for="delete-{{ $index }}">Delete</label>
                                                            </div>
                                                            <button type="button" class="btn btn-sm btn-alt-danger delete-image-btn" data-index="{{ $index }}">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <div class="alert alert-info">
                                                No images available. Upload new ones below.
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4>Add New Images</h4>
                                <div id="new-image-container">
                                    <!-- New images will be added here -->
                                </div>
                                
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-alt-success" id="add-image-btn">
                                        <i class="fa fa-plus me-1"></i> Add New Image
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
        // Variables for new image management
        let imageIndex = 0;
        const newImageContainer = document.getElementById('new-image-container');
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

        // Add new image field
        addButton.addEventListener('click', function() {
            const newImageEntry = document.createElement('div');
            newImageEntry.className = 'mb-4 image-entry';
            
            const card = document.createElement('div');
            card.className = 'card p-3 bg-light';
            
            const header = document.createElement('div');
            header.className = 'd-flex justify-content-between align-items-center mb-2';
            
            const title = document.createElement('h5');
            title.className = 'mb-0';
            title.textContent = `New Image #${imageIndex + 1}`;
            
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
            newImageContainer.appendChild(newImageEntry);
            
            // Setup preview for the new input
            setupFilePreview(input, previewContainer);
            
            // Setup remove button action
            removeBtn.addEventListener('click', function() {
                newImageContainer.removeChild(newImageEntry);
            });
            
            imageIndex++;
        });

        // Existing Image deletion via AJAX
        document.querySelectorAll('.delete-image-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this image?')) {
                    const index = this.getAttribute('data-index');
                    const container = document.getElementById(`image-container-${index}`);

                    fetch(`{{ url('become-an-agent') }}/${{{ $becomeAnAgent->id }}}/images/${index}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            container.remove();
                            // Check if there are no more images
                            if (document.querySelectorAll('#existing-images .col-md-4').length === 0) {
                                document.getElementById('existing-images').innerHTML = `
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            No images available. Upload new ones below.
                                        </div>
                                    </div>
                                `;
                            }
                        } else {
                            alert('Failed to delete the image.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the image.');
                    });
                }
            });
        });
        
        // Trigger the add button once to show the first new image field if needed
        if (document.querySelectorAll('#existing-images .col-md-4').length === 0) {
            addButton.click();
        }
    });
</script>
@endpush 