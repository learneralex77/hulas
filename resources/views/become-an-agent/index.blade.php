@extends('layouts.main')

@section('title')
    Become an Agent
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Become an Agent Images</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.create') }}" class="btn btn-alt-primary">
                        <i class="fa fa-plus mr-1"></i> Add New Images
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Preview</th>
                                <th>Image Count</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents as $agent)
                                <tr>
                                    <td>{{ $agent->id }}</td>
                                    <td>
                                        @if (is_array($agent->images) && count($agent->images) > 0)
                                            <img src="{{ asset('storage/' . $agent->images[0]) }}" alt="Preview" class="img-fluid" style="max-height: 100px;">
                                            @if (count($agent->images) > 1)
                                                <span class="badge bg-primary">+{{ count($agent->images) - 1 }} more</span>
                                            @endif
                                        @else
                                            <span class="text-muted">No images</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (is_array($agent->images))
                                            {{ count($agent->images) }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{ $agent->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('become-an-agent.show', $agent) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('become-an-agent.edit', $agent) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('become-an-agent.destroy', $agent) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $agents->links() }}
            </div>
        </div>
    </div>
@endsection 