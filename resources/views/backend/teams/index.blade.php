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
                    <a href="{{ route('teams.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Member
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.N.</th>
                                <th class="d-none d-sm-table-cell" style="width: 100px;">Image</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell">Type</th>
                                <th class="d-none d-lg-table-cell text-center">Display Order</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teams as $team)
                                <tr>
                                    <td class="text-center">{{ $team->id }}</td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        @if ($team->image)
                                            <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                                class="img-thumbnail" style="max-height: 50px;">
                                        @else
                                            <span class="text-muted"><i class="fa fa-image"></i></span>
                                        @endif
                                    </td>
                                    <td>{{ $team->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $team->type }}</td>
                                    <td class="d-none d-lg-table-cell text-center">{{ $team->display_order }}</td>
                                    <td class="text-center">
                                        @if ($team->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('teams.show', $team) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-success"
                                                title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('teams.destroy', $team) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this team member?')">
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
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
