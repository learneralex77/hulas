@extends('backend.layouts.main')

@section('title')
    Edit About Us
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit About Us</h3>
                <div class="block-options">
                    <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <!-- Debug info (remove in production) -->
                @if(app()->environment() !== 'production')
                <div class="alert alert-info mb-3">
                    <p class="mb-0">Current about-us ID: {{ $aboutUs->id }}</p>
                    <p class="mb-0">Form submission URL: {{ route('about-us.update', $aboutUs->id) }}</p>
                </div>
                @endif
                
                <form id="aboutusForm" action="{{ route('about-us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.about-us.partials.form')
                    
                    <!-- Submit directly from here for testing -->
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-success mb-0">
                            <i class="fa fa-save"></i> Update About Us
                        </button>
                        <a href="{{ route('about-us.index') }}" class="btn btn-danger ms-2 mb-0">
                            <i class="fa fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- <script src="{{ asset('js/about-us.js') }}"></script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Edit page loaded');
            
            // Direct form submission without JS interference
            const form = document.getElementById('aboutusForm');
            if (form) {
                console.log('Form found:', form);
                
                form.addEventListener('submit', function(e) {
                    console.log('Form submitted');
                    // Don't prevent default - let the form submit normally
                });
            } else {
                console.error('Form not found!');
            }
        });
    </script>
@endsection
