@extends('backend.layouts.main')

@section('title')
    Designation Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Designation Details: {{ $designation->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('designations.edit', $designation) }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('designations.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                        <td>{{ $designation->id }}</td>
                                        <th class="text-center" style="width: 200px;">Name</th>
                                        <td>{{ $designation->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Display Order</th>
                                        <td>{{ $designation->display_order }}</td>
                                        <th class="text-center">Status</th>
                                        <td class="text-center">
                                            @if ($designation->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Created</th>
                                        <td>{{ $designation->created_at->format('M d, Y H:i') }}</td>
                                        <th class="text-center">Last Updated</th>
                                        <td>{{ $designation->updated_at->format('M d, Y H:i') }}</td>
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
