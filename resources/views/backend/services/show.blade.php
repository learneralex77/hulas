@extends('backend.layouts.main')

@section('title')
    View Service: {{ $service->translations->first()?->names[0] ?? 'Untitled' }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Service Details: {{ $service->translations->first()?->names[0] ?? 'Untitled' }}</h3>
                <div class="block-options">
                    <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Basic Information</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">ID:</div>
                                    <div class="col-md-8">{{ $service->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $service->display_order }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Additional Details</h3>
                            </div>
                            <div class="block-content">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Status:</div>
                                    <div class="col-md-8">
                                        @if ($service->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $service->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $service->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Service Content</h3>
                    </div>
                    <div class="block-content">
                        @foreach ($service->translations as $translation)
                            <div class="mb-4">
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Language:</div>
                                    <div class="col-md-8">{{ strtoupper($translation->language_code) }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Names:</div>
                                    <div class="col-md-8">
                                        @foreach ($translation->names as $name)
                                            <div>{{ $name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 fw-semibold text-muted">Descriptions:</div>
                                    <div class="col-md-8">
                                        @foreach ($translation->descriptions as $description)
                                            <div class="mb-3">{!! nl2br(e($description)) !!}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if (!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if ($service->file)
                    <div class="block block-rounded mt-4">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Service File</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-4 fw-semibold text-muted">File:</div>
                                <div class="col-md-8">
                                    <a href="{{ asset('storage/' . $service->file) }}" target="_blank" class="btn btn-sm btn-success">
                                        <i class="fa fa-download"></i> View File
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
