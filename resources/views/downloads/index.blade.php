@extends('layouts.main')

@section('title')
    Download Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Downloads List</h3>
                <div class="block-options">
                    <a href="{{ route('downloads.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add New Download
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

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th>Name</th>
                            <th>File</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($downloads as $download)
                            <tr>
                                <td class="text-center">{{ $download->id }}</td>
                                <td>{{ $download->name }}</td>
                                <td>
                                    @if ($download->file)
                                        <a href="{{ route('downloads.download-file', $download) }}" class="btn btn-sm btn-alt-primary">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                    @else
                                        <span class="text-muted">No file</span>
                                    @endif
                                </td>
                                <td>{{ $download->display_order }}</td>
                                <td>
                                    @if ($download->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('downloads.show', $download) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('downloads.edit', $download) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('downloads.destroy', $download) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this download? This will also delete the file.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No downloads found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $downloads->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 