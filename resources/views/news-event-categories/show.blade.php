@extends('layouts.main')

@section('title')
    View News & Event Category
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Category Details</h3>
                <div class="block-options">
                    <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('news-event-categories.edit', $newsEventCategory) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%;">ID</th>
                                <td>{{ $newsEventCategory->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $newsEventCategory->name }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $newsEventCategory->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($newsEventCategory->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $newsEventCategory->created_at->format('M d, Y H:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $newsEventCategory->updated_at->format('M d, Y H:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 