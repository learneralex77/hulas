@extends('backend.layouts.main')

@section('title')
    About Us
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">About Us Information</h3>
                <div class="block-options">
                    @if (!$aboutUs)
                        <a href="{{ route('about-us.create') }}" class="btn btn-sm btn-alt-primary border">
                            <i class="fa fa-plus"></i> Add About Us
                        </a>
                    @else
                        <a href="{{ route('about-us.edit', $aboutUs) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>

                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteAboutUs({{ $aboutUs->id }})">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    @endif
                </div>
            </div>
            <div class="block-content">
                @if (!$aboutUs)
                    <div class="alert alert-info">
                        No About Us information has been added yet. Please click the "Add About Us" button to create one.
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">General Information</h3>
                                </div>
                                <div class="block-content">
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Tagline</h5>
                                        <p>{{ $aboutUs->tagline }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Years of Experience</h5>
                                        <p>{{ $aboutUs->years_of_experience ?? 'N/A' }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-2">Video Link</h5>
                                        <p>
                                            @if ($aboutUs->video_link)
                                                <a href="{{ $aboutUs->video_link }}" target="_blank">{{ $aboutUs->video_link }}</a>
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                    
                                    <div class="mb-2">
                                        <h5 class="fw-semibold mb-2">Short Description</h5>
                                        <p>{{ $aboutUs->short_description ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Image</h3>
                                </div>
                                <div class="block-content">
                                    @if ($aboutUs->image)
                                        <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                                            class="img-fluid rounded">
                                    @else
                                        <div class="alert alert-info">
                                            No image uploaded.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Description</h3>
                        </div>
                        <div class="block-content">
                            {!! nl2br(e($aboutUs->description)) !!}
                        </div>
                    </div>

                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Mission & Vision</h3>
                        </div>
                        <div class="block-content">
                            @if (is_array($aboutUs->mission_vision) && count($aboutUs->mission_vision) > 0)
                                <div class="row">
                                    @foreach ($aboutUs->mission_vision as $item)
                                        <div class="col-md-4 mb-4">
                                            <div class="block block-rounded h-100">
                                                <div class="block-header block-header-default">
                                                    <h3 class="block-title">
                                                        <i class="fa fa-{{ $item['icon'] ?? 'check' }} me-1"></i>
                                                        {{ $item['title'] ?? 'Untitled' }}
                                                    </h3>
                                                </div>
                                                <div class="block-content">
                                                    <p>{!! nl2br(e($item['description'] ?? '')) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">
                                    No mission & vision information has been added.
                                </div>
                            @endif
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

        function deleteAboutUs(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! All About Us information including images will be permanently deleted.",
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
                    form.action = "{{ route('about-us.destroy', ':id') }}".replace(':id', id);
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
