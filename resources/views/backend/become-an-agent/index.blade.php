@extends('layouts.main')

@section('title')
    Become an Agent Management
@endsection

  

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Become an Agent List</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Agent
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Preview</th>
                                <th>Image Count</th>
                                <th>Display Order</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr id="agent-row-{{ $agent->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if (is_array($agent->images) && count($agent->images) > 0)
                                            <img src="{{ asset('storage/' . $agent->images[0]) }}" alt="Preview"
                                                class="img-fluid" style="max-height: 100px;">
                                            @if (count($agent->images) > 1)
                                                <span class="badge bg-info">+{{ count($agent->images) - 1 }} more</span>
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
                                    <td>{{ $agent->display_order }}</td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('become-an-agent.show', $agent) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('become-an-agent.edit', $agent) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="deleteAgent({{ $agent->id }})" title="Delete">
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

        // Error message
        @if (session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        @endif

        function deleteAgent(agentId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete all associated images. You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('become-an-agent.destroy', ':id') }}".replace(':id', agentId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the agent row from the table
                            $('#agent-row-' + agentId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Agent information has been deleted.',
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
                                text: 'There was an error deleting the agent information.',
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
