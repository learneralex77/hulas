@extends('layouts.main')

@section('title')
    View District
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">District Details</h3>
                <div class="block-options">
                    <a href="{{ route('districts.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('districts.edit', $district) }}" class="btn btn-sm btn-alt-success">
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
                                <td>{{ $district->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $district->name }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $district->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($district->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $district->created_at->format('M d, Y H:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $district->updated_at->format('M d, Y H:i A') }}</td>
                            </tr>
                        </table>
                        
                        <div class="mt-4">
                            <form action="{{ route('districts.destroy', $district) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this district?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-1"></i> Delete District
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 