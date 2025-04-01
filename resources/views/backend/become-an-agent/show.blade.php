@extends('backend.layouts.main')

@section('title')
    View Become an Agent: #{{ $becomeAnAgent->id }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Become an Agent: #{{ $becomeAnAgent->id }}</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.edit', $becomeAnAgent) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary border">
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
                                    <div class="col-md-8">{{ $becomeAnAgent->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->display_order }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Image Count:</div>
                                    <div class="col-md-8">{{ is_array($becomeAnAgent->images) ? count($becomeAnAgent->images) : 0 }}</div>
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
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $becomeAnAgent->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Images Gallery</h3>
                    </div>
                    <div class="block-content">
                        @if (is_array($becomeAnAgent->images) && count($becomeAnAgent->images) > 0)
                            <div class="row">
                                @foreach ($becomeAnAgent->images as $image)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100">
                                            <a href="{{ asset('storage/' . $image) }}" data-lightbox="gallery"
                                                data-title="Become an Agent Image">
                                                <img src="{{ asset('storage/' . $image) }}" class="card-img-top"
                                                    style="height: 200px; object-fit: cover;" alt="Image">
                                            </a>
                                            <div class="card-body p-2">
                                                <a href="{{ asset('storage/' . $image) }}"
                                                    class="btn btn-sm btn-alt-primary border w-100" target="_blank">
                                                    <i class="fa fa-external-link-alt me-1"></i> View Full Size
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                No images available for this record.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
