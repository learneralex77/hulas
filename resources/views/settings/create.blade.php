@extends('layouts.main')

@section('title')
    Add Settings
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Settings</h3>
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
                <div class="block-content block-content-full block-content-sm bg-body-light text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Save Settings
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
            preview.innerHTML = '';
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (!file.type.match('image.*')) {
                    return;
                }

                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid rounded';
                    img.style.maxHeight = '150px';
                    preview.appendChild(img);
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