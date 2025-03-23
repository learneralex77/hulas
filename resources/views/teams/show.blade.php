@extends('layouts.main')

@section('title')
    View Team Member
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Team Member Details</h3>
                <div class="block-options">
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row push">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                @if ($team->image)
                                    <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="img-fluid rounded">
                                @else
                                    <div class="text-muted">No image available</div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label class="form-label">ID</label>
                                    <div class="form-control-plaintext">{{ $team->id }}</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Type</label>
                                    <div class="form-control-plaintext">{{ $team->type }}</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <div class="form-control-plaintext">{{ $team->name }}</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Display Order</label>
                                    <div class="form-control-plaintext">{{ $team->display_order }}</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <div class="form-control-plaintext">
                                        @if ($team->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Created At</label>
                                    <div class="form-control-plaintext">{{ $team->created_at->format('F d, Y H:i:s') }}</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Updated At</label>
                                    <div class="form-control-plaintext">{{ $team->updated_at->format('F d, Y H:i:s') }}</div>
                                </div>
                            </div>
                        </div>

                        @if ($team->description)
                            <div class="mb-4">
                                <label class="form-label">Description</label>
                                <div class="form-control-plaintext">{{ $team->description }}</div>
                            </div>
                        @endif

                        <form action="{{ route('teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team member?')">
                            @csrf
                            @method('DELETE')
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete Team Member
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 