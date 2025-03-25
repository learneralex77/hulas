@extends('layouts.main')

@section('title')
    Create New Menu
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Menu</h3>
                <div class="block-options">
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('menus.store') }}" method="POST">
                    @csrf
                    <div class="row push">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="bname">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('bname') is-invalid @enderror" id="bname" name="bname" value="{{ old('bname') }}" required>
                                        @error('bname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="display_order">Display Order</label>
                                        <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', 0) }}">
                                        @error('display_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="parent_id">Parent Menu</label>
                                        <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                            <option value="">None</option>
                                            @foreach($parentMenus as $parentMenu)
                                                <option value="{{ $parentMenu->id }}" {{ old('parent_id') == $parentMenu->id ? 'selected' : '' }}>
                                                    {{ $parentMenu->bname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="mb-4">
                                        <label class="form-label d-block">Status</label>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_published">Published</label>
                                        </div>
                                        <small class="text-muted">Toggle to set the visibility status</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> Create Menu
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