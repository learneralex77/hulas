<h4 class="mb-4">General Information</h4>
<div class="row">
    <div class="col-md-6 mb-4">
        <label class="form-label" for="title">Website Title <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $setting->title ?? '') }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $setting->email ?? '') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <label class="form-label" for="feedback_notify_email">Feedback Notification Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control @error('feedback_notify_email') is-invalid @enderror" id="feedback_notify_email" name="feedback_notify_email" value="{{ old('feedback_notify_email', $setting->feedback_notify_email ?? '') }}" required>
        @error('feedback_notify_email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <label class="form-label" for="agent_notify_email">Agent Notification Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control @error('agent_notify_email') is-invalid @enderror" id="agent_notify_email" name="agent_notify_email" value="{{ old('agent_notify_email', $setting->agent_notify_email ?? '') }}" required>
        @error('agent_notify_email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <label class="form-label" for="PO_Box">PO Box <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('PO_Box') is-invalid @enderror" id="PO_Box" name="PO_Box" value="{{ old('PO_Box', $setting->PO_Box ?? '') }}" required>
        @error('PO_Box')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <label class="form-label" for="google_maplink">Google Map Link</label>
        <input type="text" class="form-control @error('google_maplink') is-invalid @enderror" id="google_maplink" name="google_maplink" value="{{ old('google_maplink', $setting->google_maplink ?? '') }}">
        @error('google_maplink')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr>

<h4 class="mb-4">Logos</h4>
<div class="row">
    <div class="col-md-4 mb-4">
        <label class="form-label" for="logo">Main Logo</label>
        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
        <div class="form-text">
            Allowed types: JPG, PNG, GIF. Max size: 2MB.
            @if(isset($setting) && $setting->logo)
                Leave empty to keep the current logo.
            @endif
        </div>
        @error('logo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div id="logo-preview" class="mt-2">
            @if(isset($setting) && $setting->logo)
                <div class="mb-2">
                    <p class="mb-1">Current Logo:</p>
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Current Logo" class="img-fluid rounded" style="max-height: 150px;">
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <label class="form-label" for="primary_logo">Primary Logo</label>
        <input type="file" class="form-control @error('primary_logo') is-invalid @enderror" id="primary_logo" name="primary_logo" accept="image/*">
        <div class="form-text">
            Allowed types: JPG, PNG, GIF. Max size: 2MB.
            @if(isset($setting) && $setting->primary_logo)
                Leave empty to keep the current logo.
            @endif
        </div>
        @error('primary_logo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div id="primary-logo-preview" class="mt-2">
            @if(isset($setting) && $setting->primary_logo)
                <div class="mb-2">
                    <p class="mb-1">Current Logo:</p>
                    <img src="{{ asset('storage/' . $setting->primary_logo) }}" alt="Current Primary Logo" class="img-fluid rounded" style="max-height: 150px;">
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <label class="form-label" for="secondary_logo">Secondary Logo</label>
        <input type="file" class="form-control @error('secondary_logo') is-invalid @enderror" id="secondary_logo" name="secondary_logo" accept="image/*">
        <div class="form-text">
            Allowed types: JPG, PNG, GIF. Max size: 2MB.
            @if(isset($setting) && $setting->secondary_logo)
                Leave empty to keep the current logo.
            @endif
        </div>
        @error('secondary_logo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div id="secondary-logo-preview" class="mt-2">
            @if(isset($setting) && $setting->secondary_logo)
                <div class="mb-2">
                    <p class="mb-1">Current Logo:</p>
                    <img src="{{ asset('storage/' . $setting->secondary_logo) }}" alt="Current Secondary Logo" class="img-fluid rounded" style="max-height: 150px;">
                </div>
            @endif
        </div>
    </div>
</div>

<hr>

<h4 class="mb-4">Content</h4>
<div class="row">
    <div class="col-md-12 mb-4">
        <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $setting->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr>

<h4 class="mb-4">SEO Settings</h4>
<div class="row">
    <div class="col-md-6 mb-4">
        <label class="form-label" for="canonical_url">Canonical URL <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('canonical_url') is-invalid @enderror" id="canonical_url" name="canonical_url" value="{{ old('canonical_url', $setting->canonical_url ?? '') }}" required>
        @error('canonical_url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <label class="form-label" for="keyword">Keywords <span class="text-danger">*</span></label>
        <textarea class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" rows="2" required>{{ old('keyword', $setting->keyword ?? '') }}</textarea>
        <div class="form-text">
            Separate keywords with commas
        </div>
        @error('keyword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 mb-4">
        <label class="form-label" for="schema_markup">Schema Markup</label>
        <textarea class="form-control @error('schema_markup') is-invalid @enderror" id="schema_markup" name="schema_markup" rows="4">{{ old('schema_markup', $setting->schema_markup ?? '') }}</textarea>
        <div class="form-text">
            Enter JSON-LD schema markup for the website
        </div>
        @error('schema_markup')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr>

<h4 class="mb-4">Social Media</h4>
<div class="row">
    <div class="col-md-4 mb-4">
        <label class="form-label" for="facebook">Facebook URL</label>
        <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook', $setting->facebook ?? '') }}">
        @error('facebook')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-4">
        <label class="form-label" for="twitter">Twitter URL</label>
        <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ old('twitter', $setting->twitter ?? '') }}">
        @error('twitter')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-4">
        <label class="form-label" for="linkedin">LinkedIn URL</label>
        <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ old('linkedin', $setting->linkedin ?? '') }}">
        @error('linkedin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Save Button -->
<div class="row mb-4 mt-1">
    <div class="col-md-12 text-start mb-3">
        <button type="submit" class="btn btn-sm btn-success">
            <i class="fa fa-save me-1"></i> {{ isset($setting) ? 'Update Settings' : 'Create Setting' }}
        </button>   
        <a href="{{ route('settings.index') }}" class="btn btn-sm btn-danger ms-2">
            <i class="fa fa-times"></i> Cancel
        </a>
    </div>
</div> 