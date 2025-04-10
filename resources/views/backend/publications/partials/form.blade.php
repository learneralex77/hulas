<div class="row m-0">
    <div class="col-lg-12 p-3">
        <!-- Category and Publication Type in one row -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="news_event_category_id">Category <span class="text-danger">*</span></label>
                <select class="form-select @error('news_event_category_id') is-invalid @enderror" id="news_event_category_id" name="news_event_category_id" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('news_event_category_id', $publication->news_event_category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name_en ?? $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('news_event_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="publication_type">Publication Type <span
                        class="text-danger">*</span></label>
                <select class="form-select @error('publication_type') is-invalid @enderror" id="publication_type" name="publication_type" required>
                    <option value="News"
                        {{ old('publication_type', $publication->publication_type ?? '') == 'News' ? 'selected' : '' }}>
                        News</option>
                    <option value="Article"
                        {{ old('publication_type', $publication->publication_type ?? '') == 'Article' ? 'selected' : '' }}>
                        Article</option>
                    <option value="Event"
                        {{ old('publication_type', $publication->publication_type ?? '') == 'Event' ? 'selected' : '' }}>
                        Event</option>
                </select>
                @error('publication_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Title in English and Nepali -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="title_en">Title (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en"
                    value="{{ old('title_en', $publication->title_en ?? $publication->title ?? '') }}" required>
                @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="title_np">Title (Nepali)</label>
                <input type="text" class="form-control @error('title_np') is-invalid @enderror" id="title_np" name="title_np"
                    value="{{ old('title_np', $publication->title_np ?? '') }}">
                @error('title_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Short Description in English and Nepali -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="short_description_en">Short Description (English)</label>
                <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en" 
                    name="short_description_en" rows="3">{{ old('short_description_en', $publication->short_description_en ?? $publication->short_description ?? '') }}</textarea>
                @error('short_description_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="short_description_np">Short Description (Nepali)</label>
                <textarea class="form-control @error('short_description_np') is-invalid @enderror" id="short_description_np" 
                    name="short_description_np" rows="3">{{ old('short_description_np', $publication->short_description_np ?? '') }}</textarea>
                @error('short_description_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            @if (isset($publication) && $publication->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title_en ?? $publication->title }}"
                        class="img-fluid mb-1" style="max-height: 200px;">
                    <div class="small text-muted">Current image</div>
                </div>
            @endif
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            <small class="text-muted">
                @if (isset($publication) && $publication->image)
                    Leave empty to keep current image.
                @endif
                Recommended size: 800x600px. Max file size: 2MB.
            </small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Content in English and Nepali -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="content_en">Content (English)</label>
                <textarea class="form-control @error('content_en') is-invalid @enderror" id="content_en" 
                    name="content_en" rows="6">{{ old('content_en', $publication->content_en ?? $publication->content ?? '') }}</textarea>
                @error('content_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="content_np">Content (Nepali)</label>
                <textarea class="form-control @error('content_np') is-invalid @enderror" id="content_np" 
                    name="content_np" rows="6">{{ old('content_np', $publication->content_np ?? '') }}</textarea>
                @error('content_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Published By and Display Order in one row -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="published_by_en">Published By(English)</label>
                <input type="text" class="form-control @error('published_by_en') is-invalid @enderror" id="published_by_en" name="published_by_en"
                    value="{{ old('published_by_en', $publication->published_by_en ?? '') }}">
                @error('published_by')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="published_by_np">Published By(Nepali)</label>
                <input type="text" class="form-control @error('published_by_np') is-invalid @enderror" id="published_by_np" name="published_by_np"
                    value="{{ old('published_by_np', $publication->published_by_np ?? '') }}">
                @error('published_by')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
    <!-- Display Order -->
    <div class="col-md-4">
        <label class="form-label" for="display_order">Display Order</label>
        <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order"
            value="{{ old('display_order', $publication->display_order ?? 0) }}">
        <small class="text-muted">Higher values appear first</small>
        @error('display_order')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- External Link -->
    <div class="col-md-5">
        <label class="form-label" for="external_link">External Link</label>
        <input type="url" class="form-control @error('external_link') is-invalid @enderror" id="external_link" name="external_link"
            value="{{ old('external_link', $publication->external_link ?? '') }}">
        <small class="text-muted">Optional link to external content</small>
        @error('external_link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Publication Status -->
    <div class="col-md-3">
        <label class="form-label d-block">Publication Status</label>
        <div class="form-check form-switch mt-1">
            <input class="form-check-input @error('is_published') is-invalid @enderror" type="checkbox" id="is_published" name="is_published"
                value="1" {{ old('is_published', $publication->is_published ?? '1') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Published</label>
        </div>
        @error('is_published')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


        <div class="mb-0">
            <button type="submit" class="btn btn-sm btn-success mb-0">
                <i class="fa fa-save me-1"></i> {{ isset($publication) ? 'Update' : 'Create' }} Publication
            </button>
            <a href="{{ route('publications.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div>

