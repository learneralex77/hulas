@extends('backend.layouts.main')

@section('title')
    View Contact Inquiry
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Contact Inquiry Details: {{ $contactUs->full_name }}</h3>
                <div class="block-options">
                    <a href="{{ route('contact-us.edit', $contactUs) }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Basic Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">ID:</div>
                                    <div class="col-md-8">{{ $contactUs->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Full Name:</div>
                                    <div class="col-md-8">{{ $contactUs->full_name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Email:</div>
                                    <div class="col-md-8">
                                        {{ $contactUs->email }}
                                    
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Phone Number:</div>
                                    <div class="col-md-8">{{ $contactUs->phone_number }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Service Interested In:</div>
                                    <div class="col-md-8">{{ $contactUs->service_interested_in ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Additional Details</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Status:</div>
                                    <div class="col-md-8">
                                        @if ($contactUs->is_contacted)
                                            <span class="badge bg-success">Contacted</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-12">
                                        <form action="{{ route('contact-us.toggle-status', $contactUs) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $contactUs->is_contacted ? 'btn-alt-warning' : 'btn-alt-success' }}">
                                                @if ($contactUs->is_contacted)
                                                    <i class="fa fa-times me-1"></i> Mark as Not Contacted
                                                @else
                                                    <i class="fa fa-check me-1"></i> Mark as Contacted
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $contactUs->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $contactUs->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Message</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-3 bg-body-light rounded">
                                    {{ $contactUs->message ?? 'No message provided.' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
