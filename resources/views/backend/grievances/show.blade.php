@extends('backend.layouts.main')

@section('title')
    View Grievance
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Grievance Details</h3>
                <div class="block-options">
                    <a href="{{ route('grievances.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a href="{{ route('grievances.edit', $grievance) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4 class="mb-3">Personal Information</h4>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name:</label>
                            <p>{{ $grievance->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mobile Number:</label>
                            <p>{{ $grievance->mobile_number }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">City:</label>
                            <p>{{ $grievance->city }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3">Status Information</h4>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status:</label>
                            <p>
                                @if($grievance->is_resolved)
                                    <span class="badge bg-success">Resolved</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Created:</label>
                            <p>{{ $grievance->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Last Updated:</label>
                            <p>{{ $grievance->updated_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                </div>
                
                <h4 class="mb-3">Message</h4>
                <div class="mb-4 p-3 bg-light rounded">
                    <p class="mb-0">{{ $grievance->message }}</p>
                </div>
                
                @if($grievance->admin_remarks)
                    <h4 class="mb-3">Admin Remarks</h4>
                    <div class="mb-4 p-3 bg-body-secondary rounded">
                        <p class="mb-0">{{ $grievance->admin_remarks }}</p>
                    </div>
                @endif
                
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('grievances.edit', $grievance) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt me-1"></i> Edit
                    </a>
                    <form action="{{ route('grievances.toggleResolution', $grievance) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-alt-{{ $grievance->is_resolved ? 'warning' : 'info' }}">
                            <i class="fa fa-{{ $grievance->is_resolved ? 'times' : 'check' }} me-1"></i> 
                            {{ $grievance->is_resolved ? 'Mark as Pending' : 'Mark as Resolved' }}
                        </button>
                    </form>
                    <form action="{{ route('grievances.destroy', $grievance) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this grievance?');" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-alt-danger">
                            <i class="fa fa-trash-alt me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 