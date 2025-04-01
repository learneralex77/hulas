@extends('backend.layouts.main')

@section('title')
    View District: {{ $district->name }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">District Details: {{ $district->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('districts.edit', $district) }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('districts.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-8">{{ $district->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Name:</div>
                                    <div class="col-md-8">{{ $district->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Zone:</div>
                                    <div class="col-md-8">
                                        @if ($district->zone)
                                            <a href="{{ route('zones.show', $district->zone) }}">{{ $district->zone->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $district->display_order }}</div>
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
                                        @if ($district->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $district->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $district->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             
                    <div class="block-content">
                        @if ($district->branches && $district->branches->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($district->branches as $branch)
                                            <tr>
                                                <td>{{ $branch->name }}</td>
                                                <td>{{ $branch->phone_number }}</td>
                                                <td>
                                                    @if ($branch->is_published)
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-warning">Draft</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('branches.show', $branch) }}" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                       
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
