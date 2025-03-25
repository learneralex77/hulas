@extends('layouts.main')

@section('title')
    View Quick Link
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Quick Link Details</h3>
                <div class="block-options">
                    <form action="{{ route('quick-links.destroy', $quickLink) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quick link?');" style="display: inline-block; margin: 0;">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-alt-secondary me-1">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('quick-links.edit', $quickLink) }}" class="btn btn-sm btn-alt-primary me-1">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>
                        <button type="submit" class="btn btn-sm btn-alt-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <h4>General Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Title</th>
                                        <td>{{ $quickLink->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>URL</th>
                                        <td>
                                            <a href="{{ $quickLink->url }}" target="_blank">{{ $quickLink->url }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Display Order</th>
                                        <td>{{ $quickLink->display_order }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($quickLink->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $quickLink->created_at->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td>{{ $quickLink->updated_at->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('quick-links.index') }}" class="btn btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 