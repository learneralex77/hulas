<div class="row m-0">
    <div class="col-lg-12 p-3">
        <!-- Category and Publication Type in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="news_event_category_id">Category <span class="text-danger">*</span></label>
                <select class="form-select" id="news_event_category_id" name="news_event_category_id" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('news_event_category_id', $publication->news_event_category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="publication_type">Publication Type <span
                        class="text-danger">*</span></label>
                <select class="form-select" id="publication_type" name="publication_type" required>
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
            </div>
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $publication->title ?? '') }}" required>
        </div>

        <!-- Short Description -->
        <div class="mb-4">
            <label class="form-label" for="short_description">Short Description</label>
            <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ old('short_description', $publication->short_description ?? '') }}</textarea>
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label class="form-label" for="image">Image</label>
            @if (isset($publication) && $publication->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}"
                        class="img-fluid mb-2" style="max-height: 200px;">
                    <div class="small text-muted">Current image</div>
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image">
            <small class="text-muted">
                @if (isset($publication) && $publication->image)
                    Leave empty to keep current image.
                @endif
                Recommended size: 800x600px. Max file size: 2MB.
            </small>
        </div>

        <!-- Content -->
        <div class="mb-4">
            <label class="form-label" for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6">{{ old('content', $publication->content ?? '') }}</textarea>
        </div>

        <!-- Published By and Display Order in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="published_by">Published By</label>
                <input type="text" class="form-control" id="published_by" name="published_by"
                    value="{{ old('published_by', $publication->published_by ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" class="form-control" id="display_order" name="display_order"
                    value="{{ old('display_order', $publication->display_order ?? 0) }}">
                <small class="text-muted">Higher values appear first</small>
            </div>
        </div>

        <!-- External Link and Published Status in one row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label" for="external_link">External Link</label>
                <input type="url" class="form-control" id="external_link" name="external_link"
                    value="{{ old('external_link', $publication->external_link ?? '') }}">
                <small class="text-muted">Optional link to external content</small>
            </div>
            <div class="col-md-6">
                <label class="form-label">Publication Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                            value="1"
                            {{ old('is_published', $publication->is_published ?? '1') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-0 pb-0">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($publication) ? 'Update' : 'Create' }} Publication
            </button>
        </div>
    </div>
</div>
