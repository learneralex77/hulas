@extends('backend.layouts.main')

@section('title')
    View Agent Details: {{ $agentDetail->district->name ?? 'Untitled' }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Details: {{ $agentDetail->district->name ?? 'Untitled' }}</h3>
                <div class="block-options">
                    <a href="{{ route('agent-details.edit', $agentDetail) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('agent-details.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-8">{{ $agentDetail->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">District:</div>
                                    <div class="col-md-8">
                                        @if ($agentDetail->district)
                                            <a href="{{ route('districts.show', $agentDetail->district) }}">{{ $agentDetail->district->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </div>
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
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $agentDetail->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $agentDetail->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Agent Information</h3>
                    </div>
                    <div class="block-content">
                        <div class="block block-rounded border border-1 mb-3">
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-md-4 fw-semibold text-muted">State Agent Name:</div>
                                            <div class="col-md-8">{{ $agentDetail->state_agent_name ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4 fw-semibold text-muted">Contact Number:</div>
                                            <div class="col-md-8">{{ $agentDetail->contact_no ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-md-4 fw-semibold text-muted">Contact Person:</div>
                                            <div class="col-md-8">{{ $agentDetail->contact_person ?? 'N/A' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 fw-semibold text-muted">Address:</div>
                                            <div class="col-md-8">{{ $agentDetail->address ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
