@extends('layouts.main')

@section('title')
    Gallery Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Gallery Details: {{ $gallery->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $gallery->id }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $gallery->title }}</td>
                            </tr>
                            <tr>
                                <th>External Link</th>
                                <td>
                                    @if($gallery->links)
                                        <a href="{{ $gallery->links }}" target="_blank">{{ $gallery->links }}</a>
                                    @else
                                        <span class="text-muted">No link provided</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($gallery->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Featured</th>
                                <td>
                                    @if ($gallery->is_featured)
                                        <span class="badge bg-info">Featured</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $gallery->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>{{ $gallery->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated</th>
                                <td>{{ $gallery->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        @if($gallery->featured_image)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $gallery->featured_image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded mb-2">
                                <p class="text-muted font-size-sm">Featured Image</p>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle"></i> No featured image available
                            </div>
                        @endif
                    </div>
                </div>

                <h4 class="mt-4 mb-3">Gallery Images</h4>
                
                @if(!empty($gallery->images))
                    <div class="row">
                        @foreach($gallery->images as $image)
                            <div class="col-md-3 mb-4">
                                <a href="{{ asset('storage/' . $image) }}" target="_blank" class="img-link img-link-zoom-in">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="img-fluid img-thumbnail">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> No images in this gallery
                    </div>
                @endif

                <div class="mt-4">
                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this gallery? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete Gallery
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 