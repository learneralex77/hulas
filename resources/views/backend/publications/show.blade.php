@extends('layouts.main')

@section('title')
    View Publication
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Publication Details</h3>
                <div class="block-options">
                <a href="{{ route('publications.edit', $publication) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('publications.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                   
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="mb-3">{{ $publication->title }}</h2>
                        
                        @if($publication->image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $publication->image) }}" 
                                     alt="{{ $publication->title }}" 
                                     class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                        @endif
                        
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 40%;">ID</th>
                                        <td>{{ $publication->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $publication->category->name ?? 'None' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Publication Type</th>
                                        <td>{{ $publication->publication_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($publication->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Display Order</th>
                                        <td>{{ $publication->display_order }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 40%;">Published By</th>
                                        <td>{{ $publication->published_by ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>External Link</th>
                                        <td>
                                            @if($publication->external_link)
                                                <a href="{{ $publication->external_link }}" target="_blank">
                                                    {{ $publication->external_link }}
                                                    <i class="fa fa-external-link-alt ms-1"></i>
                                                </a>
                                            @else
                                                None
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $publication->created_at->format('M d, Y H:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $publication->updated_at->format('M d, Y H:i A') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4>Short Description</h4>
                                <div class="p-3 bg-body-light rounded mb-4">
                                    {{ $publication->short_description ?: 'No short description provided.' }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Content</h4>
                                <div class="p-3 bg-body-light rounded mb-4">
                                    {!! nl2br(e($publication->content)) ?: 'No content provided.' !!}
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 