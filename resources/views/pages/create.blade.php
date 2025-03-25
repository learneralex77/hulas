@extends('layouts.main')

@section('title')
    Create Page
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Page</h3>
                <div class="block-options">
                    <a href="{{ route('pages.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" id="page-form">
                    @csrf
                    <div class="row push">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="menu_id">Menu <span class="text-danger">*</span></label>
                                        <select class="form-select @error('menu_id') is-invalid @enderror" id="menu_id" name="menu_id" required>
                                            <option value="">Select Menu</option>
                                            @foreach($menus as $menu)
                                                <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                                    {{ $menu->bname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('menu_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="short_description">Short Description</label>
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-8 col-md-7 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="content">Content <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2">
                                            <small class="text-muted">Recommended image size: 1200x800 pixels</small>
                                        </div>
                                        <div class="mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="show_image" id="show_image" value="1" {{ old('show_image') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_image">
                                                    Display image on page
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary" id="submit-btn">
                                            <i class="fa fa-save"></i> Create Page
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
            
        // Form submission validation
        const form = document.getElementById('page-form');
        form.addEventListener('submit', function(e) {
            // Validate title
            if (!document.getElementById('title').value.trim()) {
                e.preventDefault();
                alert('Title is required');
                document.getElementById('title').focus();
                return false;
            }
            
            // Validate menu
            if (!document.getElementById('menu_id').value.trim()) {
                e.preventDefault();
                alert('Menu is required');
                document.getElementById('menu_id').focus();
                return false;
            }
            
            return true;
        });
    });
</script>
@endpush 