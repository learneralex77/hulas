@extends('layouts.main')

@section('title')
    Branch Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Branch Details</h3>
                <div class="block-options">
                    <a href="{{ route('branches.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>
                    <a href="{{ route('branches.edit', $branch) }}" class="btn btn-sm btn-alt-primary">
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
                                <td>{{ $branch->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $branch->name }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $branch->district->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td style="white-space: pre-line">{{ $branch->address }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $branch->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $branch->email }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $branch->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($branch->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $branch->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $branch->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 