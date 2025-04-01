@extends('backend.layouts.main')

@section('title')
    View Branch: {{ $branch->name }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Branch Details: {{ $branch->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('branches.edit', $branch) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('branches.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-4 fw-semibold text-muted">Name:</div>
                                    <div class="col-md-8">{{ $branch->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">District:</div>
                                    <div class="col-md-8">
                                        @if ($branch->district)
                                            <a href="{{ route('districts.show', $branch->district) }}">{{ $branch->district->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $branch->display_order }}</div>
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
                                        @if ($branch->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $branch->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $branch->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Contact Information</h3>
                    </div>
                    <div class="block-content">
                        <div class="row mb-2">
                            <div class="col-md-4 fw-semibold text-muted">Phone Number:</div>
                            <div class="col-md-8">{{ $branch->phone_number }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 fw-semibold text-muted">Email:</div>
                            <div class="col-md-8">
                                @if ($branch->email)
                                    <a href="mailto:{{ $branch->email }}">{{ $branch->email }}</a>
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 fw-semibold text-muted">Address:</div>
                            <div class="col-md-8">{{ $branch->address }}</div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Google Map</h3>
                    </div>
                    <div class="block-content">
                        @if ($branch->map_iframe)
                            {!! $branch->map_iframe !!}
                        @else
                            <div class="alert alert-info">
                                No map available for this branch.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
