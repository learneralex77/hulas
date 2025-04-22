@extends('backend.layouts.main')

@section('title', 'Forex Rate List')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Forex Rates</h3>
                <div class="block-options">
                    <a href="{{ route('forex-rate.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Rate
                    </a>
                </div>
            </div>

            <!-- Country Flag Code Information -->
            <div class="block-content">
                <div class="alert alert-info">
                    <h5 class="alert-heading"><i class="fa fa-info-circle me-1"></i> Country Flag Codes</h5>
                    <p class="mb-0">When adding a new forex rate, use the country code for the country flag field (e.g., <code>us</code> for United States, <code>gb</code> for United Kingdom,<code>cn</code> for China, <code>jp</code> for Japan, <code>in</code> for India).</p>
                    <p class="mb-0 mt-2">For a complete list of country codes, visit <a href="https://flagicons.lipis.dev/" target="_blank" class="alert-link">https://flagicons.lipis.dev/</a>.</p>
                </div>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 5%;">S.N.</th>
                                <th class="text-left" style="width: 15%;">Date</th>
                                <th class="text-left" style="width: 30%;">Morning Rates</th>
                                <th class="text-left" style="width: 30%;">Afternoon Rates</th>
                                <th class="text-center" style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forexRates as $forexRate)
                                <tr id="forex-rate-row-{{ $forexRate->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $forexRate->date }}</td>
                                    <td>
                                        @if(!empty($forexRate->slots['morning']))
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($forexRate->slots['morning'] ?? [] as $morning)
                                                    @if(isset($morning['is_published']) && $morning['is_published'])
                                                        <li class="mb-1">
                                                            <div class="d-flex align-items-center">
                                                                @if(isset($morning['flag']))
                                                                    <span class="flag-icon flag-icon-{{ $morning['flag'] }} me-2" style="width: 24px; height: 18px;"></span>
                                                                @endif
                                                                <span>{{ $morning['currency'] ?? '' }} - {{ $morning['buying_rate'] ?? '' }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">No morning rates</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($forexRate->slots['afternoon']))
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($forexRate->slots['afternoon'] ?? [] as $afternoon)
                                                    @if(isset($afternoon['is_published']) && $afternoon['is_published'])
                                                        <li class="mb-1">
                                                            <div class="d-flex align-items-center">
                                                                @if(isset($afternoon['flag']))
                                                                    <span class="flag-icon flag-icon-{{ $afternoon['flag'] }} me-2" style="width: 24px; height: 18px;"></span>
                                                                @endif
                                                                <span>{{ $afternoon['currency'] ?? '' }} - {{ $afternoon['buying_rate'] ?? '' }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">No afternoon rates</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('forex-rate.edit', $forexRate->id) }}" class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger delete-forex-rate" 
                                                data-id="{{ $forexRate->id }}" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $forexRate->id }}" action="{{ route('forex-rate.destroy', $forexRate->id) }}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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

        // Delete confirmation with SweetAlert2
        $(document).on('click', '.delete-forex-rate', function() {
            const rateId = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the entire forex rate record. You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the delete form
                    document.getElementById('delete-form-' + rateId).submit();
                }
            });
        });
    </script>
@endsection
