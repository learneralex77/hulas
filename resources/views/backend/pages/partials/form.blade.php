{{-- Page form partial that can be used in both create and edit views --}}

<div class="row ">
    <div class="col-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $page->title ?? '') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="menu_id">Menu <span class="text-danger">*</span></label>
                    <select class="form-select @error('menu_id') is-invalid @enderror" id="menu_id" name="menu_id">
                        <option value="">Select Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}"
                                {{ old('menu_id', $page->menu_id ?? '') == $menu->id ? 'selected' : '' }}>
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

        <div class="row mb-4">
        <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label" for="display_order">Display Order</label>
                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
                        name="display_order" value="{{ old('display_order', $page->display_order ?? 0) }}">
                    @error('display_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published" 
                            {{ old('is_published', $page->is_published ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="mb-4">
            <label class="form-label" for="short_description">Short Description</label>
            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description"
                name="short_description" rows="3">{{ old('short_description', $page->short_description ?? '') }}</textarea>
            @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="content">Content <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content', $page->content ?? '') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if (isset($page) && $page->image)
                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}"
                                        class="img-thumbnail" style="max-width: 100px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delete_image"
                                            id="delete_image" value="1">
                                        <label class="form-check-label" for="delete_image">
                                            Delete current image
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-2">
                        <small class="text-muted">Recommended image size: 1200x800 pixels</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success mb-0" id="submit-btn">
                <i class="fa fa-save"></i> {{ isset($page) ? 'Update' : 'Create' }} Page
            </button>
            <a href="{{ route('pages.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>
