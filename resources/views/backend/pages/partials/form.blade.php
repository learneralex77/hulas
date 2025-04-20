{{-- Page form partial that can be used in both create and edit views --}}

<div class="row ">
    <div class="col-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="title_en">Title (English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                        name="title_en" value="{{ old('title_en', $page->title_en ?? '') }}" required>
                    @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="title_np">Title (Nepali)</label>
                    <input type="text" class="form-control @error('title_np') is-invalid @enderror" id="title_np"
                        name="title_np" value="{{ old('title_np', $page->title_np ?? '') }}">
                    @error('title_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="menu_id">Menu <span class="text-danger">*</span></label>
                    <select class="form-select @error('menu_id') is-invalid @enderror" id="menu_id" name="menu_id" required>
                        <option value="">Select Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}"
                                {{ old('menu_id', $page->menu_id ?? '') == $menu->id ? 'selected' : '' }}>
                                {{ $menu->name_en }}
                            </option>
                        @endforeach
                    </select>
                    @error('menu_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="display_order">Display Order</label>
                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order"
                        name="display_order" value="{{ old('display_order', $page->display_order ?? 0) }}">
                    @error('display_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_published" value="0">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1"
                            {{ old('is_published', $page->is_published ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="short_description_en">Short Description (English)</label>
                    <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en"
                        name="short_description_en" rows="3">{{ old('short_description_en', $page->short_description_en ?? '') }}</textarea>
                    @error('short_description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="short_description_np">Short Description (Nepali)</label>
                    <textarea class="form-control @error('short_description_np') is-invalid @enderror" id="short_description_np"
                        name="short_description_np" rows="3">{{ old('short_description_np', $page->short_description_np ?? '') }}</textarea>
                    @error('short_description_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="content_en">Content (English) <span class="text-danger">*</span></label>
                    <textarea class="form-control tinymce-editor @error('content_en') is-invalid @enderror" id="content_en" name="content_en" rows="10" required>{{ old('content_en', $page->content_en ?? '') }}</textarea>
                    @error('content_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="content_np">Content (Nepali)</label>
                    <textarea class="form-control tinymce-editor @error('content_np') is-invalid @enderror" id="content_np" name="content_np" rows="10">{{ old('content_np', $page->content_np ?? '') }}</textarea>
                    @error('content_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if (isset($page) && $page->image)
                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title_en }}"
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
                        <small class="text-muted">Recommended image size: 1200x800 pixels</small><br>
                        <small class="text-muted">Allowed formats: JPG, PNG, GIF, WebP  </small>
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
