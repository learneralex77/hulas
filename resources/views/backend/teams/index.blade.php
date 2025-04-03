@extends('backend.layouts.main')

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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 50px;">S.N.</th>
                                <th class="d-none d-sm-table-cell" style="width: 100px;">Image</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell">Type</th>
                                <th class="d-none d-lg-table-cell text-center">Display Order</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr id="team-row-{{ $team->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="d-none d-sm-table-cell text-center" style="width: 60px;">
                                        @if ($team->image)
                                            <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                                class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted" style="display: inline-block; width: 50px; height: 50px;">
                                                <i class="fa fa-image" style="font-size: 24px; line-height: 50px;"></i>
                                            </span>
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
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteTeam({{ $team->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Success message
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        @endif

        function deleteTeam(teamId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('teams.destroy', ':id') }}".replace(':id', teamId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the team row from the table
                            $('#team-row-' + teamId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Team member has been deleted.',
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false,
                                position: 'top-end',
                                toast: true
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error deleting the team member.',
                                icon: 'error',
                                timer: 3000,
                                showConfirmButton: false,
                                position: 'top-end',
                                toast: true
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
