@extends('layouts.main')

@section('title')
    Download Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Download Details: {{ $download->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('downloads.edit', $download) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('downloads.index') }}" class="btn btn-sm btn-alt-secondary">
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

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
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
                                        <td>{{ $download->id }}</td>
                                        <th class="text-center" style="width: 200px;">Name</th>
                                        <td>{{ $download->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">File</th>
                                        <td class="text-center">
                                            @if ($download->file)
                                                <a href="{{ route('downloads.download-file', $download) }}"
                                                    class="btn btn-alt-primary">
                                                    <i class="fa fa-download"></i> Download File
                                                </a>
                                            @else
                                                <span class="text-muted">No file available</span>
                                            @endif
                                        </td>
                                        <th class="text-center">Display Order</th>
                                        <td>{{ $download->display_order }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Status</th>
                                        <td class="text-center">
                                            @if ($download->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                        <th class="text-center">Created</th>
                                        <td>{{ $download->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Last Updated</th>
                                        <td colspan="3">{{ $download->updated_at->format('M d, Y H:i') }}</td>
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
