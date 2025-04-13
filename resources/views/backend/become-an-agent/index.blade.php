@extends('backend.layouts.main')

@section('title')
    Agent Requests Management
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Requests List</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Agent Request
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>District</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr id="agent-row-{{ $agent->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->contact_number }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->district }}</td>
                                    <td>{{ $agent->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if ($agent->is_contacted)
                                            <span class="badge bg-success">Contacted</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
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
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get the CSRF token from the meta tag
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    // Create a form element
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = "{{ url('admin/become-an-agent') }}/" + agentId;
                    form.style.display = 'none';
                    
                    // Add CSRF token
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = token;
                    form.appendChild(csrfInput);
                    
                    // Add method spoofing for DELETE
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);
                    
                    // Append form to document and submit
                    document.body.appendChild(form);
                    
                    form.addEventListener('submit', function() {
                        console.log('Form submitted');
                    });
                    
                    form.submit();
                }
            });
        }
    </script>
@endsection
