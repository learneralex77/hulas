@extends('layouts.main')

@section('title')
    Settings
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Settings Information</h3>
                <div class="block-options">
                    @if(!$settings->count())
                        <a href="{{ route('settings.create') }}" class="btn btn-alt-primary">
                            <i class="fa fa-plus mr-1"></i> Add Settings
                        </a>
                    @else
                        <a href="{{ route('settings.edit', $settings->first()) }}" class="btn btn-alt-primary">
                            <i class="fa fa-pencil-alt mr-1"></i> Edit
                        </a>

                        <form action="{{ route('settings.destroy', $settings->first()) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete these settings?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-alt-danger">
                                <i class="fa fa-trash mr-1"></i> Delete
                            </button>
                        </form>

                        
                    @endif
                </div>
            </div>
            <div class="block-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <h3 class="alert-heading fs-5 fw-bold mb-1">Success</h3>
                        <p class="mb-0">{{ session('success') }}</p>
                    </div>
                @endif

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