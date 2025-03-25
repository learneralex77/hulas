@extends('layouts.main')

@section('title')
    Create New Team Member
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Team Member</h3>
                <div class="block-options">
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
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

                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <!-- Row 1: Type and Name -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="type">Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="">-- Select Type --</option>
                                        @foreach ($teamTypes as $value => $label)
                                            <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Image field -->
                            <div class="mb-4">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                <small class="text-muted">Recommended size: 300x300px, Max: 2MB</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Row 3: Description field (full width) -->
                            <div class="mb-4">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Row 4: Display Order and Status -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="display_order">Display Order</label>
                                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', 0) }}">
                                    @error('display_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-block">Status</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Published</label>
                                    </div>
                                    <small class="text-muted">Toggle to set the visibility status</small>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Create Team Member
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 