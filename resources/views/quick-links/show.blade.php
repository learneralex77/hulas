@extends('layouts.main')

@section('title')
    View Quick Link: {{ $quickLink->name }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Quick Link Details: {{ $quickLink->name }}</h3>
                <div class="block-options">
                    <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('quick-links.edit', $quickLink) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%;">Name</th>
                                <td>{{ $quickLink->name }}</td>
                            </tr>
                            <tr>
                                <th>External Link</th>
                                <td>
                                    <a href="{{ $quickLink->external_link }}" target="_blank">
                                        {{ $quickLink->external_link }}
                                        <i class="fa fa-external-link-alt ml-1"></i>
                                    </a>
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
                                <td>{{ $quickLink->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $quickLink->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    <form action="{{ route('quick-links.destroy', $quickLink) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quick link?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash me-1"></i> Delete Quick Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 