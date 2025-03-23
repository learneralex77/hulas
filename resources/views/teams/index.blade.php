@extends('layouts.main')

@section('title')
    Team Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Team List</h3>
                <div class="block-options">
                    <a href="{{ route('teams.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Add New Member
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th style="width: 100px;">Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                                <td class="text-center">{{ $team->id }}</td>
                                <td>
                                    @if ($team->image)
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="img-fluid" style="max-height: 50px;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->type }}</td>
                                <td>{{ $team->display_order }}</td>
                                <td>
                                    @if ($team->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('teams.show', $team) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this team member?')">
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
                                <td colspan="7" class="text-center">No team members found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 