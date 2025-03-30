@extends('layouts.main')

@section('title')
    View District
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">District Details</h3>
                <div class="block-options">
                   
                        <a href="{{ route('districts.edit', $district) }}" class="btn btn-sm btn-alt-primary me-1">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>
                        <a href="{{ route('districts.index') }}" class="btn btn-sm btn-alt-primary border me-1">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                       
                       
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Name</th>
                                <td>{{ $district->name }}</td>
                            </tr>
                            <tr>
                                <th>Zone</th>
                                <td>
                                    @if ($district->zone)
                                        <a href="{{ route('zones.show', $district->zone) }}">{{ $district->zone->name }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Additional Information</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Display Order</th>
                                <td>{{ $district->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($district->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Branches in this District</h4>
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
                @else
                    <div class="alert alert-info">
                        No branches found in this district.
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('districts.index') }}" class="btn btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
