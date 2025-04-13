@extends('backend.layouts.main')

@section('title', 'Forex Rate List')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Forex Rates</h3>
                <div class="block-options">
                    <a href="{{ route('forex-rate.create') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus"></i> Add New Rate
                    </a>
                </div>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Morning Rates</th>
                                <th>Afternoon Rates</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forexRates as $forexRate)
                                <tr id="forex-rate-row-{{ $forexRate->id }}">
                                    <td>{{ $forexRate->date }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($forexRate->slots['morning'] ?? [] as $morning)
                                                <li>{{ $morning['currency'] }} - {{ $morning['buying_rate'] }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($forexRate->slots['afternoon'] ?? [] as $afternoon)
                                                <li>{{ $afternoon['currency'] }} - {{ $afternoon['buying_rate'] }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('forex-rate.edit', $forexRate->id) }}" class="btn btn-sm btn-alt-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('forex-rate.destroy', $forexRate->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-alt-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
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

        function deleteForexRate(rateId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the entire record for both slots.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('forex-rate.destroy', ':id') }}".replace(':id', rateId);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Remove the forex rate row from the table
                            $('#forex-rate-row-' + rateId).remove();

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Forex rate has been deleted.',
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
                                text: 'There was an error deleting the forex rate.',
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
