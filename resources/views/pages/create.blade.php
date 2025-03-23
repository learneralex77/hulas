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
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
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
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
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
                            
                            <div class="mb-4">
                                <label class="form-label" for="short_description">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label" for="content">Content <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary" id="submit-btn">
                                    <i class="fa fa-save"></i> Create Page
                                </button>
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
            
            // Validate content
            if (!document.querySelector('#content').value.trim()) {
                e.preventDefault();
                alert('Content is required');
                document.querySelector('#content').focus();
                return false;
            }
            
            return true;
        });
    });
</script>
@endpush 