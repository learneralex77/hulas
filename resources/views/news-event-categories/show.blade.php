@extends('layouts.main')

@section('title')
    News & Event Category Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">News & Event Category Details: {{ $newsEventCategory->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('news-event-categories.edit', $newsEventCategory) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-alt-secondary me-2">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>

                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Category Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 15%;">Name</th>
                                        <td style="width: 35%;">{{ $newsEventCategory->name }}</td>
                                        <th style="width: 15%;">Status</th>
                                        <td style="width: 35%;">
                                            @if ($newsEventCategory->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-danger">Unpublished</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Slug</th>
                                        <td>{{ $newsEventCategory->slug }}</td>
                                        <th>Display Order</th>
                                        <td>{{ $newsEventCategory->display_order }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $newsEventCategory->created_at->format('F j, Y g:i A') }}</td>
                                        <th>Updated At</th>
                                        <td>{{ $newsEventCategory->updated_at->format('F j, Y g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td colspan="3">{!! nl2br(e($newsEventCategory->description)) !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
