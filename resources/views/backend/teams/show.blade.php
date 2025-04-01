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
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="text-center" style="width: 200px;">ID</th>
                                        <td>{{ $team->id }}</td>
                                        <th class="text-center" style="width: 200px;">Type</th>
                                        <td>{{ $team->type }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <td>{{ $team->name }}</td>
                                        <th class="text-center">Display Order</th>
                                        <td>{{ $team->display_order }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Status</th>
                                        <td class="text-center">
                                            @if ($team->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                        <th class="text-center">Image</th>
                                        <td class="text-center">
                                            @if ($team->image)
                                                <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                                    class="img-fluid rounded" style="max-height: 100px;">
                                            @else
                                                <span class="text-muted">No image available</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Created</th>
                                        <td>{{ $team->created_at->format('M d, Y H:i') }}</td>
                                        <th class="text-center">Last Updated</th>
                                        <td>{{ $team->updated_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                    @if ($team->description)
                                        <tr>
                                            <th class="text-center">Description</th>
                                            <td colspan="3">{{ $team->description }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
