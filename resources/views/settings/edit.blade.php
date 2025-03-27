@extends('layouts.main')

@section('title')
    Edit Settings
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Settings</h3>
                    <div class="block-options">
                        <a href="{{ route('settings.index') }}" class="btn btn-alt-secondary">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @include('settings.partials.form')
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-center">
                    <button type="submit" class="btn btn-primary mb-3">
                        <i class="fa fa-save me-1"></i> Update Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle logo preview
        const previewImage = (input, previewId) => {
            const preview = document.getElementById(previewId);
            const newPreviewDiv = document.createElement('div');
            newPreviewDiv.className = 'new-image-preview mt-2';
            
            // Remove previous new image preview if exists
            const existingNewPreview = preview.querySelector('.new-image-preview');
            if (existingNewPreview) {
                preview.removeChild(existingNewPreview);
            }
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (!file.type.match('image.*')) {
                    return;
                }

                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const previewTitle = document.createElement('p');
                    previewTitle.className = 'mb-1';
                    previewTitle.textContent = 'New Image:';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid rounded';
                    img.style.maxHeight = '150px';
                    
                    newPreviewDiv.appendChild(previewTitle);
                    newPreviewDiv.appendChild(img);
                    preview.appendChild(newPreviewDiv);
                };
                
                reader.readAsDataURL(file);
            }
        };
        
        // Main logo preview
        const logoInput = document.getElementById('logo');
        logoInput.addEventListener('change', function() {
            previewImage(this, 'logo-preview');
        });
        
        // Primary logo preview
        const primaryLogoInput = document.getElementById('primary_logo');
        primaryLogoInput.addEventListener('change', function() {
            previewImage(this, 'primary-logo-preview');
        });
        
        // Secondary logo preview
        const secondaryLogoInput = document.getElementById('secondary_logo');
        secondaryLogoInput.addEventListener('change', function() {
            previewImage(this, 'secondary-logo-preview');
        });
    });
</script>
@endpush 