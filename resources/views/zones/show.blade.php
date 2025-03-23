@extends('layouts.main')

@section('title')
    Zone Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Zone Details</h3>
                <div class="block-options">
                    <a href="{{ route('zones.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>
                    <a href="{{ route('zones.edit', $zone) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt me-1"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row push">
                    <div class="col-lg-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%;">ID</th>
                                <td>{{ $zone->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $zone->name }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $zone->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($zone->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $zone->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $zone->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 