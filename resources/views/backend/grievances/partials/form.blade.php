<div class="row">
    <div class="col-lg-12">
        <!-- Name, Mobile Number, and City -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
                    value="{{ old('name', $grievance->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-4">
                <label class="form-label" for="mobile_number">Mobile Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number" 
                    value="{{ old('mobile_number', $grievance->mobile_number ?? '') }}" required>
                @error('mobile_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-4">
                <label class="form-label" for="city">City <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" 
                    value="{{ old('city', $grievance->city ?? '') }}" required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <!-- Status and Admin Remarks -->
        <div class="row mb-4">
            @if(isset($grievance))
            <div class="col-md-4">
                <label class="form-label">Status</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_resolved" value="0">
                        <input class="form-check-input @error('is_resolved') is-invalid @enderror" type="checkbox" id="is_resolved" name="is_resolved" value="1" 
                            {{ old('is_resolved', $grievance->is_resolved ?? 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_resolved">Resolved</label>
                        @error('is_resolved')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        <!-- Message -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label class="form-label" for="message">Message <span class="text-danger">*</span></label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" 
                    rows="4" required>{{ old('message', $grievance->message ?? '') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        @if(isset($grievance))
        <!-- Admin Remarks -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label class="form-label" for="admin_remarks">Admin Remarks</label>
                <textarea class="form-control @error('admin_remarks') is-invalid @enderror" id="admin_remarks" name="admin_remarks" 
                    rows="4">{{ old('admin_remarks', $grievance->admin_remarks ?? '') }}</textarea>
                @error('admin_remarks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @endif

        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save me-1"></i> {{ isset($grievance) ? 'Update' : 'Create' }} Grievance
            </button>
            <a href="{{ route('grievances.index') }}" class="btn btn-sm btn-danger ms-2">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </div>
</div> 