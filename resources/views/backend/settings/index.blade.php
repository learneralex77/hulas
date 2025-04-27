@extends('backend.layouts.main')
@php
    use Illuminate\Support\Str;
@endphp

@section('title')
    Settings
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Settings Information</h3>
                <div class="block-options">
                    @if (!$settings->count())
                        <a href="{{ route('settings.create') }}" class="btn btn-sm btn-alt-primary border">
                            <i class="fa fa-plus"></i> Add New Settings
                        </a>
                    @else
                        <a href="{{ route('settings.edit', $settings->first()) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>

                    @endif
                </div>
            </div>
            <div class="block-content">


                @if (!$settings->count())
                    <div class="alert alert-info">
                        No Settings information has been added yet. Please click the "Add Settings" button to create one.
                    </div>
                @else
                    @php $setting = $settings->first(); @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">General Information</h3>
                                </div>
                                <div class="block-content">
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Title</h5>
                                        <p>{{ $setting->title }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Email</h5>
                                        <p>{{ $setting->email }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Phone</h5>
                                        <p>{{ $setting->phone ?? 'N/A' }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Address</h5>
                                        <p>{{ $setting->address ?? 'N/A' }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">PO Box</h5>
                                        <p>{{ $setting->PO_Box ?? 'N/A' }}</p>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="block block-rounded mt-4">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Additional Information</h3>
                                </div>
                                <div class="block-content">
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Title</h5>
                                        <p>{{ $setting->title_en ?? 'N/A' }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Description</h5>
                                        <p>{{ isset($setting->description_en) ? Str::limit($setting->description_en, 100, '...') : 'N/A' }}</p>
                                    </div>
                                    
                                 
                                    
                                    <div class="mb-2">
                                        <h5 class="fw-semibold mb-2">Location Map</h5>
                                        <p>{{ isset($setting->google_maplink) ? Str::limit($setting->google_maplink, 50, '...') : 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Logo</h3>
                                </div>
                                <div class="block-content">
                                    @if ($setting->logo)
                                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo"
                                            class="img-fluid rounded">
                                    @else
                                        <div class="alert alert-info">
                                            No logo uploaded.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Social Media Links</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                @if ($setting->facebook)
                                    <div class="col-md-4 mb-4">
                                        <div class="block block-rounded h-100">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">
                                                    <i class="fab fa-facebook-f me-1"></i>
                                                    Facebook
                                                </h3>
                                            </div>
                                            <div class="block-content">
                                                <a href="{{ $setting->facebook }}" target="_blank"
                                                    class="btn btn-sm btn-alt-primary">
                                                    Visit Page
                                                </a>
                                                <p class="mt-2 small text-muted">{{ Str::limit($setting->facebook, 30, '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting->twitter)
                                    <div class="col-md-4 mb-4">
                                        <div class="block block-rounded h-100">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">
                                                    <i class="fab fa-twitter me-1"></i>
                                                    Twitter
                                                </h3>
                                            </div>
                                            <div class="block-content">
                                                <a href="{{ $setting->twitter }}" target="_blank"
                                                    class="btn btn-sm btn-alt-info">
                                                    Visit Page
                                                </a>
                                                <p class="mt-2 small text-muted">{{ Str::limit($setting->twitter, 30, '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting->linkedin)
                                    <div class="col-md-4 mb-4">
                                        <div class="block block-rounded h-100">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">
                                                    <i class="fab fa-linkedin-in me-1"></i>
                                                    LinkedIn
                                                </h3>
                                            </div>
                                            <div class="block-content">
                                                <a href="{{ $setting->linkedin }}" target="_blank"
                                                    class="btn btn-sm btn-alt-primary">
                                                    Visit Page
                                                </a>
                                                <p class="mt-2 small text-muted">{{ Str::limit($setting->linkedin, 30, '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!$setting->facebook && !$setting->twitter && !$setting->linkedin)
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            No social media links have been added.
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

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

        function deleteSettings(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! All settings information including logos will be permanently deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a form and submit it
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = "{{ route('settings.destroy', ':id') }}".replace(':id', id);
                    form.style.display = 'none';

                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';

                    form.appendChild(csrfToken);
                    form.appendChild(method);
                    document.body.appendChild(form);

                    form.submit();
                }
            });
        }
    </script>
@endsection
