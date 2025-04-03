@extends('backend.layouts.main')

@section('title')
    Team Member Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Team Member Details: {{ $team->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Basic Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">ID:</div>
                                    <div class="col-md-8">{{ $team->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Type:</div>
                                    <div class="col-md-8">{{ $team->type }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Name:</div>
                                    <div class="col-md-8">{{ $team->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $team->display_order }}</div>
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
                                        @if ($team->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $team->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $team->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($team->description)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Description</h3>
                                </div>
                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-12">
                                            {{ $team->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($team->image)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Team Member Image</h3>
                                </div>
                                <div class="block-content text-center">
                                    <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                        class="img-fluid rounded shadow" style="max-width: 500px;">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
