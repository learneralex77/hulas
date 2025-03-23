@extends('layouts.main')

@section('title')
    Services
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Manage Services</h3>
                <div class="block-options">
                    <a href="{{ route('services.create') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus mr-1"></i> Add Service
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <p class="mb-0">{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th>Primary Name</th>
                                <th>Primary Icon</th>
                                <th>File</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 10%;">Display Order</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>
                                        @php
                                            $names = [];
                                            if ($service->translations->isNotEmpty()) {
                                                $names = json_decode($service->translations->first()->name ?: '[]') ?: [];
                                            }
                                        @endphp
                                        {{ $names[0] ?? '' }}
                                        @if(is_array($names) && count($names) > 1)
                                            <span class="badge bg-info">{{ count($names) }} entries</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $icons = [];
                                            if ($service->translations->isNotEmpty()) {
                                                $icons = json_decode($service->translations->first()->icon ?: '[]') ?: [];
                                            }
                                        @endphp
                                        @if(!empty($icons[0]))
                                            <i class="{{ $icons[0] }}"></i>
                                            {{ $icons[0] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($service->file)
                                            <a href="{{ Storage::url($service->file) }}" target="_blank">
                                                View File
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($service->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $service->display_order }}</td>
                                    <td>
                                        <a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-alt-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-alt-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('services.destroy', $service) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete this service?')" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No services found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 