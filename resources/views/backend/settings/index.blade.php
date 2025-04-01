@extends('layouts.main')

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
                    @if(!$settings->count())
                        <a href="{{ route('settings.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Settings
                        </a>
                    @else
                        <a href="{{ route('settings.edit', $settings->first()) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>

                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteSettings({{ $settings->first()->id }})">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    @endif
                </div>
            </div>
            <div class="block-content">
               

                @if(!$settings->count())
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
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width: 30%;">Title</th>
                                                <td>{{ $setting->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $setting->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{ $setting->phone ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $setting->address ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>PO Box</th>
                                                <td>{{ $setting->PO_Box ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Working Hours</th>
                                                <td>{{ $setting->working_hours ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Location Map</th>
                                                <td>
                                                    @if($setting->map_location)
                                                        <a href="{{ $setting->map_location }}" target="_blank" class="btn btn-sm btn-alt-info">
                                                            <i class="fa fa-map-marker-alt me-1"></i> View Map
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="block block-rounded mt-4">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Additional Information</h3>
                                </div>
                                <div class="block-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width: 30%;">Meta Title</th>
                                                <td>{{ $setting->meta_title ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Meta Description</th>
                                                <td>{{ $setting->meta_description ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Meta Keywords</th>
                                                <td>{{ $setting->meta_keywords ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Footer Text</th>
                                                <td>{{ $setting->footer_text ?? 'N/A' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Logo</h3>
                                </div>
                                <div class="block-content">
                                    @if($setting->logo)
                                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-fluid rounded">
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
                                @if($setting->facebook)
                                    <div class="col-md-4 mb-4">
                                        <div class="block block-rounded h-100">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">
                                                    <i class="fab fa-facebook-f me-1"></i>
                                                    Facebook
                                                </h3>
                                            </div>
                                            <div class="block-content">
                                                <a href="{{ $setting->facebook }}" target="_blank" class="btn btn-sm btn-alt-primary">
                                                    Visit Page
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($setting->twitter)
                                    <div class="col-md-4 mb-4">
                                        <div class="block block-rounded h-100">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">
                                                    <i class="fab fa-twitter me-1"></i>
                                                    Twitter
                                                </h3>
                                            </div>
                                            <div class="block-content">
                                                <a href="{{ $setting->twitter }}" target="_blank" class="btn btn-sm btn-alt-info">
                                                    Visit Page
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($setting->linkedin)
                                    <div class="col-md-4 mb-4">
                                        <div class="block block-rounded h-100">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">
                                                    <i class="fab fa-linkedin-in me-1"></i>
                                                    LinkedIn
                                                </h3>
                                            </div>
                                            <div class="block-content">
                                                <a href="{{ $setting->linkedin }}" target="_blank" class="btn btn-sm btn-alt-primary">
                                                    Visit Page
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(!$setting->facebook && !$setting->twitter && !$setting->linkedin)
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
