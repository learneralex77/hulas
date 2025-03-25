@extends('layouts.main')

@section('title')
    Add About Us
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('about-us.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add About Us Information</h3>
                    <div class="block-options">
                        <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <!-- Row 1: Tagline and Years of Experience -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="tagline">Tagline <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tagline') is-invalid @enderror" id="tagline" name="tagline" value="{{ old('tagline') }}" required>
                                    @error('tagline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="years_of_experience">Years of Experience</label>
                                    <input type="number" class="form-control @error('years_of_experience') is-invalid @enderror" id="years_of_experience" name="years_of_experience" value="{{ old('years_of_experience') }}" min="0">
                                    @error('years_of_experience')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Video Link and Image -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="video_link">Video Link</label>
                                    <input type="text" class="form-control @error('video_link') is-invalid @enderror" id="video_link" name="video_link" value="{{ old('video_link') }}">
                                    @error('video_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    <div class="form-text">
                                        Allowed types: JPG, PNG, GIF. Max size: 2MB.
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="image-preview" class="mt-2"></div>
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="mb-4">
                                <label class="form-label" for="short_description">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Main Description -->
                            <div class="mb-4">
                                <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Mission & Vision <small class="text-muted">(You can add multiple items)</small></h4>
                                    <button type="button" class="btn btn-sm btn-alt-success" id="add-mission-vision">
                                        <i class="fa fa-plus"></i> Add Another Item
                                    </button>
                                </div>
                                
                                <div id="mission-vision-container">
                                    <div class="mission-vision-item card p-3 bg-light mb-3">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="mission_vision_titles_0">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('mission_vision_titles.0') is-invalid @enderror" id="mission_vision_titles_0" name="mission_vision_titles[]" value="{{ old('mission_vision_titles.0') }}" required>
                                                @error('mission_vision_titles.0')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="mission_vision_icons_0">Icon <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('mission_vision_icons.0') is-invalid @enderror" id="mission_vision_icons_0" name="mission_vision_icons[]" value="{{ old('mission_vision_icons.0') }}" required>
                                                <div class="form-text">
                                                    Enter a Font Awesome icon name (e.g., "check", "flag").
                                                </div>
                                                @error('mission_vision_icons.0')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="mission_vision_descriptions_0">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('mission_vision_descriptions.0') is-invalid @enderror" id="mission_vision_descriptions_0" name="mission_vision_descriptions[]" rows="3" required>{{ old('mission_vision_descriptions.0') }}</textarea>
                                            @error('mission_vision_descriptions.0')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Save Button at Bottom -->
                            <div class="row mb-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-alt-success">
                                        <i class="fa fa-check"></i> Save About Us
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
        // Handle image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        
        imageInput.addEventListener('change', function() {
            imagePreview.innerHTML = '';
            
            if (this.files && this.files[0]) {
                const file = this.files[0];
                if (!file.type.match('image.*')) {
                    return;
                }

                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const previewContainer = document.createElement('div');
                    previewContainer.className = 'mt-2';
                    
                    const previewTitle = document.createElement('p');
                    previewTitle.className = 'mb-1';
                    previewTitle.textContent = 'Preview:';
                    
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

        // Handle mission and vision dynamic fields
        let missionVisionCount = 1;
        const container = document.getElementById('mission-vision-container');
        const addButton = document.getElementById('add-mission-vision');
        
        addButton.addEventListener('click', function() {
            const newItem = document.createElement('div');
            newItem.className = 'mission-vision-item card p-3 bg-light mb-3';
            
            const headerDiv = document.createElement('div');
            headerDiv.className = 'd-flex justify-content-between align-items-center mb-2';
            
            const title = document.createElement('h5');
            title.className = 'mb-0';
            title.textContent = `Item #${missionVisionCount + 1}`;
            
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-alt-danger remove-mission-vision';
            removeBtn.innerHTML = '<i class="fa fa-times"></i>';
            removeBtn.title = 'Remove this item';
            
            headerDiv.appendChild(title);
            headerDiv.appendChild(removeBtn);
            
            // Create a row for title and icon fields
            const fieldsRow = document.createElement('div');
            fieldsRow.className = 'row mb-3';
            
            const titleCol = document.createElement('div');
            titleCol.className = 'col-md-6';
            titleCol.innerHTML = `
                <label class="form-label" for="mission_vision_titles_${missionVisionCount}">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mission_vision_titles_${missionVisionCount}" name="mission_vision_titles[]" required>
            `;
            
            const iconCol = document.createElement('div');
            iconCol.className = 'col-md-6';
            iconCol.innerHTML = `
                <label class="form-label" for="mission_vision_icons_${missionVisionCount}">Icon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mission_vision_icons_${missionVisionCount}" name="mission_vision_icons[]" required>
                <div class="form-text">
                    Enter a Font Awesome icon name (e.g., "check", "flag").
                </div>
            `;
            
            fieldsRow.appendChild(titleCol);
            fieldsRow.appendChild(iconCol);
            
            const descDiv = document.createElement('div');
            descDiv.className = 'mb-3';
            descDiv.innerHTML = `
                <label class="form-label" for="mission_vision_descriptions_${missionVisionCount}">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="mission_vision_descriptions_${missionVisionCount}" name="mission_vision_descriptions[]" rows="3" required></textarea>
            `;
            
            newItem.appendChild(headerDiv);
            newItem.appendChild(fieldsRow);
            newItem.appendChild(descDiv);
            
            container.appendChild(newItem);
            
            // Add event listener to remove button
            removeBtn.addEventListener('click', function() {
                container.removeChild(newItem);
            });
            
            missionVisionCount++;
        });
    });
</script>
@endpush 