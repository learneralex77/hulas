@extends('backend.layouts.main')

@section('title')
    Partner Management
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Partner List</h3>
                <div class="block-options">
                    <a href="{{ route('partners.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Partner
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table">
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 50px;">S.N.</th>
                                <th class="d-none d-sm-table-cell" style="width: 80px;">Image</th>
                                <th>Name</th>
                                <th class="d-none d-lg-table-cell text-left" style="width: 70px;">Order</th>
                                <th class="text-left">Status</th>
                                <th class="text-left" style="width: 13%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                                <tr id="partner-row-{{ $partner->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="d-none d-sm-table-cell text-center" style="width: 60px;">
                                        @if ($partner->image)
                                            <img src="{{ asset('storage/' . $partner->image) }}"
                                                alt="{{ $partner->name }}" class="img-thumbnail"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted" style="display: inline-block; width: 50px; height: 50px;">
                                                <i class="fa fa-image" style="font-size: 24px; line-height: 50px;"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $partner->name }}</td>
                                    <td class="d-none d-lg-table-cell text-center">{{ $partner->display_order }}</td>
                                    <td class="text-center">
                                        @if ($partner->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('partners.show', $partner->id) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('partners.edit', $partner->id) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deletePartner({{ $partner->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $partners->links() }}
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

        function deletePartner(partnerId) {
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
                    let url = "{{ route('partners.destroy', ':id') }}".replace(':id', partnerId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the partner row from the table
                            $('#partner-row-' + partnerId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Partner has been deleted.',
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
                                text: 'There was an error deleting the partner.',
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