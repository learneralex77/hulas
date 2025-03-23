@extends('layouts.main')

@section('title')
    View Designation
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Designation Details</h3>
                <div class="block-options">
                    <a href="{{ route('designations.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('designations.edit', $designation) }}" class="btn btn-sm btn-alt-primary">
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
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label">ID</label>
                            <div class="form-control-plaintext">{{ $designation->id }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Name</label>
                            <div class="form-control-plaintext">{{ $designation->name }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Display Order</label>
                            <div class="form-control-plaintext">{{ $designation->display_order }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Status</label>
                            <div class="form-control-plaintext">
                                @if ($designation->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-warning">Draft</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Created At</label>
                            <div class="form-control-plaintext">{{ $designation->created_at->format('F d, Y H:i:s') }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Updated At</label>
                            <div class="form-control-plaintext">{{ $designation->updated_at->format('F d, Y H:i:s') }}</div>
                        </div>

                        <form action="{{ route('designations.destroy', $designation) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this designation?')">
                            @csrf
                            @method('DELETE')
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete Designation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 