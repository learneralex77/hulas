@extends('layouts.main')

@section('title')
    View Download
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Download Details</h3>
                <div class="block-options">
                    <a href="{{ route('downloads.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('downloads.edit', $download) }}" class="btn btn-sm btn-alt-primary">
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

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row push">
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label">ID</label>
                            <div class="form-control-plaintext">{{ $download->id }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Name</label>
                            <div class="form-control-plaintext">{{ $download->name }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">File</label>
                            <div class="form-control-plaintext">
                                @if ($download->file)
                                    <a href="{{ route('downloads.download-file', $download) }}" class="btn btn-alt-primary">
                                        <i class="fa fa-download"></i> Download File
                                    </a>
                                @else
                                    <span class="text-muted">No file available</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Display Order</label>
                            <div class="form-control-plaintext">{{ $download->display_order }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Status</label>
                            <div class="form-control-plaintext">
                                @if ($download->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-warning">Draft</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Created At</label>
                            <div class="form-control-plaintext">{{ $download->created_at->format('F d, Y H:i:s') }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Updated At</label>
                            <div class="form-control-plaintext">{{ $download->updated_at->format('F d, Y H:i:s') }}</div>
                        </div>

                        <form action="{{ route('downloads.destroy', $download) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this download? This will also delete the file.')">
                            @csrf
                            @method('DELETE')
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete Download
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 