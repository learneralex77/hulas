@extends('layouts.main')

@section('title')
    View Page: {{ $page->title }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Page Details: {{ $page->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('pages.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h4>Title</h4>
                            <p>{{ $page->title }}</p>
                        </div>

                        <div class="mb-4">
                            <h4>Slug</h4>
                            <p>{{ $page->slug }}</p>
                        </div>

                        <div class="mb-4">
                            <h4>Menu</h4>
                            <p>{{ $page->menu->bname ?? 'No Menu' }}</p>
                        </div>

                        <div class="mb-4">
                            <h4>Short Description</h4>
                            <p>{{ $page->short_description ?? 'No description' }}</p>
                        </div>

                        <div class="mb-4">
                            <h4>Content</h4>
                            <div class="content-preview p-3 border rounded bg-light">
                                {!! $page->content !!}
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4>Created At</h4>
                            <p>{{ $page->created_at->format('F d, Y h:i A') }}</p>
                        </div>

                        <div class="mb-4">
                            <h4>Updated At</h4>
                            <p>{{ $page->updated_at->format('F d, Y h:i A') }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <h4>Image</h4>
                            @if($page->image)
                                <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="img-fluid rounded">
                            @else
                                <p class="text-muted"><i class="fa fa-image fa-2x"></i> No image available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 