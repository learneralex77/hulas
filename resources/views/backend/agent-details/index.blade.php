@extends('backend.layouts.main')

@section('title')
    Agent Details Management
@endsection





@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Details List</h3>
                <div class="block-options">
                    <a href="{{ route('agent-details.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Agent Detail
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>District</th>
                                <th>Agent Names</th>
                                <th>Contact Numbers</th>
                                <th>Display Order</th>
                                <th>Contact Persons</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agentDetails as $agentDetail)
                                <tr id="agent-detail-row-{{ $agentDetail->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $agentDetail->district->name ?? 'N/A' }}</td>
                                    <td>
                                        @php
                                            $stateAgentNames = json_decode($agentDetail->state_agent_name);
                                        @endphp

                                        @if (count($stateAgentNames) > 1)
                                            {{ $stateAgentNames[0] }}
                                            <span class="badge bg-info">+{{ count($stateAgentNames) - 1 }}</span>
                                        @else
                                            {{ $stateAgentNames[0] ?? '' }}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $contactNumbers = json_decode($agentDetail->contact_no);
                                        @endphp

                                        @if (count($contactNumbers) > 1)
                                            {{ $contactNumbers[0] }}
                                            <span class="badge bg-info">+{{ count($contactNumbers) - 1 }}</span>
                                        @else
                                            {{ $contactNumbers[0] ?? '' }}
                                        @endif
                                    </td>
                                    <td>{{ $agentDetail->display_order }}</td>
                                    <td>
                                        @php
                                            $contactPersons = json_decode($agentDetail->contact_person);
                                        @endphp

                                        @if (count($contactPersons) > 1)
                                            {{ $contactPersons[0] }}
                                            <span class="badge bg-info">+{{ count($contactPersons) - 1 }}</span>
                                        @else
                                            {{ $contactPersons[0] ?? '' }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('agent-details.show', $agentDetail) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('agent-details.edit', $agentDetail) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteAgentDetail({{ $agentDetail->id }})" title="Delete">
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

        function deleteAgentDetail(agentDetailId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('agent-details.destroy', ':id') }}".replace(':id', agentDetailId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the agent detail row from the table
                            $('#agent-detail-row-' + agentDetailId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Agent detail has been deleted.',
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
                                text: 'There was an error deleting the agent detail.',
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
