<div class="row ">
    <div class="col-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="name_en">Name (in English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en"
                        name="name_en" value="{{ old('name_en', $menu->name_en ?? '') }}" required>

                    @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="name_np">Name (in Nepali)</label>
                    <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                        name="name_np" value="{{ old('name_np', $menu->name_np ?? '') }}">

                    @error('name_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
           
          

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="description_en">Description (in English)</label>
                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en"
                        rows="4">{{ old('description_en', $menu->description_en ?? '') }}</textarea>
                    @error('description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-4">
                    <label class="form-label" for="description_np">Description (in Nepali)</label>
                    <textarea class="form-control @error('description_np') is-invalid @enderror" id="description_np" name="description_np"
                        rows="4">{{ old('description_np', $menu->description_np ?? '') }}</textarea>
                    @error('description_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-md-3 col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="parent_id">Parent Menu</label>
                    <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id"
                        name="parent_id">
                        <option value="">None</option>
                        @foreach ($parentMenus as $parentMenu)
                            <option value="{{ $parentMenu->id }}"
                                {{ old('parent_id', $menu->parent_id ?? '') == $parentMenu->id ? 'selected' : '' }}>
                                {{ $parentMenu->name_en }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="display_order">Display Order</label>
                    <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                        id="display_order" name="display_order"
                        value="{{ old('display_order', $menu->display_order ?? 0) }}">
                    @error('display_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                 <div class="col-md-3 col-sm-6">

                    <label class="form-label d-block">Status</label>
                    <div class="form-check form-switch col-md-3 col-sm-6">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $menu->is_published ?? 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                    <small class="text-muted">Toggle to set the visibility status</small>
                </div>
        </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-success mb-0">
                        <i class="fa fa-save"></i> {{ $button }} Menu
                    </button>
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-danger ms-2 mb-0">
                        <i class="fa fa-times"></i> Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
