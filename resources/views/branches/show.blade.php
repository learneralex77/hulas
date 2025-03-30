@extends('layouts.main')

@section('title')
    View Branch
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Branch Details</h3>
                <div class="block-options">
                     <a href="{{ route('branches.edit', $branch) }}" class="btn btn-sm btn-alt-primary me-1">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>
                    
                        <a href="{{ route('branches.index') }}" class="btn btn-sm btn-alt-primary border me-1">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                       
                       
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Branch Name</th>
                                <td>{{ $branch->name }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $branch->district->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Contact Information</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Phone Number</th>
                                <td>{{ $branch->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    @if ($branch->email)
                                        <a href="mailto:{{ $branch->email }}">{{ $branch->email }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $branch->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Google Map</h4>
                <div class="mb-4">
                    @if ($branch->map_iframe)
                        {!! $branch->map_iframe !!}
                    @else
                        <div class="alert alert-info">
                            No map available for this branch.
                        </div>
                    @endif
                </div>

                <h4 class="mt-4">Display Settings</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Display Order</th>
                                <td>{{ $branch->display_order }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Status</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Publication Status</th>
                                <td>
                                    @if ($branch->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Timestamps</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Created At</th>
                                <td>{{ $branch->created_at->format('F j, Y, g:i a') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated</th>
                                <td>{{ $branch->updated_at->format('F j, Y, g:i a') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
            </div>
        </div>
    </div>
@endsection
