@extends('layouts.main')

@section('title')
    View Become an Agent Images
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">View Images</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.edit', $becomeAnAgent) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt me-1"></i> Edit
                    </a>
                    <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>

                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">ID</th>
                                        <td>{{ $becomeAnAgent->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Image Count</th>
                                        <td>{{ is_array($becomeAnAgent->images) ? count($becomeAnAgent->images) : 0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $becomeAnAgent->created_at->format('M d, Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $becomeAnAgent->updated_at->format('M d, Y H:i:s') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4>Images Gallery</h4>
                        <div class="row">
                            @if (is_array($becomeAnAgent->images) && count($becomeAnAgent->images) > 0)
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
                            @else
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        No images available for this record.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
