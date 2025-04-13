@extends('backend.layouts.main')

@section('title')
    View Forex-rates: {{ $forex-rates->name ?? $forex-rates->translations->first()?->names[0] ?? 'Untitled' }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Forex-rates Details: {{ $forex-rates->name ?? $forex-rates->translations->first()?->names[0] ?? 'Untitled' }}</h3>
                <div class="block-options">
                    <a href="{{ route('forex-ratess.edit', $forex-rates) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('forex-ratess.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-8">{{ $forex-rates->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Name:</div>
                                    <div class="col-md-8">{{ $forex-rates->name ?? 'N/A' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Icon:</div>
                                    <div class="col-md-8">
                                        @if($forex-rates->icon)
                                            <i class="{{ $forex-rates->icon }}"></i> {{ $forex-rates->icon }}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $forex-rates->display_order }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Description:</div>
                                    <div class="col-md-8">{!! nl2br(e($forex-rates->description ?? 'N/A')) !!}</div>
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
                                        @if ($forex-rates->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $forex-rates->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $forex-rates->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Forex-rates Details</h3>
                    </div>
                    <div class="block-content">
                        @foreach ($forex-rates->translations as $translation)
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

                @if ($forex-rates->file)
                    <div class="block block-rounded mt-4">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Forex-rates File</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-4 fw-semibold text-muted">File:</div>
                                <div class="col-md-8">
                                    <a href="{{ asset('storage/' . $forex-rates->file) }}" target="_blank" class="btn btn-sm btn-success">
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
