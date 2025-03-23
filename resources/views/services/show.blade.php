@extends('layouts.main')

@section('title')
    Service Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Service Details</h3>
                <div class="block-options">
                    <a href="{{ route('services.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>
                    <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt me-1"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row push">
                    <div class="col-lg-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%;">ID</th>
                                <td>{{ $service->id }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $service->slug }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $service->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($service->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td>
                                    @if($service->file)
                                        <a href="{{ Storage::url($service->file) }}" target="_blank" class="btn btn-sm btn-alt-info">
                                            <i class="fa fa-file me-1"></i> View File
                                        </a>
                                    @else
                                        <span class="text-muted">No file uploaded</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $service->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $service->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <h4 class="mt-4">Service Details</h4>
                
                @php
                    $translation = $service->translations->first();
                    $names = json_decode($translation->name ?? '[]') ?: [];
                    $icons = json_decode($translation->icon ?? '[]') ?: [];
                    $descriptions = json_decode($translation->description ?? '[]') ?: [];
                    $totalEntries = max(is_array($names) ? count($names) : 0, 
                                      is_array($icons) ? count($icons) : 0, 
                                      is_array($descriptions) ? count($descriptions) : 0);
                @endphp
                
                @for($i = 0; $i < $totalEntries; $i++)
                    <div class="block block-rounded mb-3">
                        <div class="block-header block-header-default">
                            <h5 class="block-title">
                                @if($i === 0)
                                    Primary Entry
                                @else
                                    Additional Entry #{{ $i }}
                                @endif
                            </h5>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Name</h5>
                                    <p>{{ $names[$i] ?? '' }}</p>
                                    
                                    @if(!empty($icons[$i]))
                                        <h5>Icon</h5>
                                        <p>
                                            <i class="{{ $icons[$i] }} fa-2x me-2"></i>
                                            <code>{{ $icons[$i] }}</code>
                                        </p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if(!empty($descriptions[$i]))
                                        <h5>Description</h5>
                                        <div style="white-space: pre-line;">{{ $descriptions[$i] }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection 