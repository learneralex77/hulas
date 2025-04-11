@extends('backend.layouts.main')

@section('title')
    View Agent Request: #{{ $becomeAnAgent->id }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Request: #{{ $becomeAnAgent->id }}</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.edit', $becomeAnAgent) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Contact Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Name:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Contact Number:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->contact_number }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Email:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->email }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">District:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->district }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Request Details</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Request Date:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Last Updated:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Status:</div>
                                    <div class="col-md-8">
                                        @if ($becomeAnAgent->is_contacted)
                                            <span class="badge bg-success">Contacted</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-12">
                                        <form action="{{ route('become-an-agent.toggle-status', $becomeAnAgent) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $becomeAnAgent->is_contacted ? 'btn-alt-warning' : 'btn-alt-success' }}">
                                                @if ($becomeAnAgent->is_contacted)
                                                    <i class="fa fa-times me-1"></i> Mark as Not Contacted
                                                @else
                                                    <i class="fa fa-check me-1"></i> Mark as Contacted
                                                @endif
                                            </button>
                                        </form>
                                    </div>
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
                                    {{ $becomeAnAgent->message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
