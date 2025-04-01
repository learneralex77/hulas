@extends('layouts.main')

@section('title')
    Department Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Department Details: {{ $department->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('departments.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="text-center" style="width: 200px;">ID</th>
                                        <td>{{ $department->id }}</td>
                                        <th class="text-center" style="width: 200px;">Name</th>
                                        <td>{{ $department->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Display Order</th>
                                        <td>{{ $department->display_order }}</td>
                                        <th class="text-center">Status</th>
                                        <td class="text-center">
                                            @if ($department->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Created</th>
                                        <td>{{ $department->created_at->format('M d, Y H:i') }}</td>
                                        <th class="text-center">Last Updated</th>
                                        <td>{{ $department->updated_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
