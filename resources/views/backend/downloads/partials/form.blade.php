{{-- Download form partial that can be used in both create and edit views --}}

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label" for="name_en">Name(English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                        name="name_en" value="{{ old('name_en', $download->name_en ?? '') }}" required>
                    @error('name_en')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label" for="name_np">Name(Nepali)</label>
                    <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                        name="name_np" value="{{ old('name_np', $download->name_np ?? '') }}">
                    @error('name_np')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label" for="display_order">Display Order</label>
                    <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                        id="display_order" name="display_order"
                        value="{{ old('display_order', $download->display_order ?? 0) }}">
                    @error('display_order')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label d-block">Status</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                            value="1" {{ old('is_published', $download->is_published ?? 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                    <small class="text-muted">Toggle to set the visibility status</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    <label class="form-label" for="file">File @if (!isset($download))
                            <span class="text-danger">*</span>
                        @endif
                    </label>
                    @if (isset($download) && $download->file)
                        <div class="mb-2">
                            <a href="{{ route('downloads.download-file', $download) }}"
                                class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-download"></i> Current File
                            </a>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                        name="file" {{ !isset($download) ? 'required' : '' }}>
                    <small class="text-muted">
                        @if (isset($download))
                            Leave empty to keep the current file. <br>
                        @endif
                        Allowed file types: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, CSV, ZIP (max 10MB)
                    </small>
                    @error('file')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fa fa-save"></i> {{ isset($download) ? 'Update' : 'Create' }} Download
                </button>
                <a href="{{ route('downloads.index') }}" class="btn btn-sm btn-danger ms-2">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>
