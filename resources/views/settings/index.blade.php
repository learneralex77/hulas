@extends('layouts.main')

@section('title')
    Settings
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Manage Settings</h3>
                <div class="block-options">
                    @if(count($settings) < 1)
                    <a href="{{ route('settings.create') }}" class="btn btn-alt-primary">
                        <i class="fa fa-plus mr-1"></i> Add Settings
                    </a>
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

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Title</th>
                                <th>Email</th>
                                <th>PO Box</th>
                                <th>Social Media</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings as $setting)
                                <tr>
                                    <td>
                                        @if($setting->logo)
                                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-fluid" style="max-height: 50px;">
                                        @else
                                            No Logo
                                        @endif
                                    </td>
                                    <td>{{ $setting->title }}</td>
                                    <td>{{ $setting->email }}</td>
                                    <td>{{ $setting->PO_Box }}</td>
                                    <td>
                                        @if($setting->facebook)
                                            <a href="{{ $setting->facebook }}" target="_blank" class="btn btn-sm btn-alt-primary me-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        @endif
                                        @if($setting->twitter)
                                            <a href="{{ $setting->twitter }}" target="_blank" class="btn btn-sm btn-alt-info me-1">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        @endif
                                        @if($setting->linkedin)
                                            <a href="{{ $setting->linkedin }}" target="_blank" class="btn btn-sm btn-alt-primary">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('settings.show', $setting) }}" class="btn btn-sm btn-alt-info me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('settings.edit', $setting) }}" class="btn btn-sm btn-alt-primary me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('settings.destroy', $setting) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete these settings?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No settings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 