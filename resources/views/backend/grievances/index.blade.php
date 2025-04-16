@extends('backend.layouts.main')

@section('title')
    Grievances
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Grievances List</h3>
                <div class="block-options">
                    <a href="{{ route('grievances.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus me-1"></i> Add New Grievance
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th style="width: 50px;">S.N.</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>City</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grievances as $grievance)
                                <tr id="grievance-row-{{ $grievance->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $grievance->name }}</td>
                                    <td>{{ $grievance->mobile_number }}</td>
                                    <td>{{ $grievance->city }}</td>
                                    <td>{{ Str::limit($grievance->message, 30) }}</td>
                                    <td class="text-center">
                                        @if ($grievance->is_resolved)
                                            <span class="badge bg-success">Resolved</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('grievances.show', $grievance) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('grievances.edit', $grievance) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteGrievance({{ $grievance->id }})" title="Delete">
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

        function deleteGrievance(grievanceId) {
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
                    // Create a form element
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ url("admin/grievances") }}/' + grievanceId;
                    
                    // Add method spoofing for DELETE
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    form.appendChild(methodField);
                    
                    // Add CSRF token
                    const csrfField = document.createElement('input');
                    csrfField.type = 'hidden';
                    csrfField.name = '_token';
                    csrfField.value = '{{ csrf_token() }}';
                    form.appendChild(csrfField);
                    
                    // Append the form to the document body and submit it
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endsection 