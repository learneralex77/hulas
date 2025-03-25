@extends('layouts.main')

@section('title')
    View Menu: {{ $menu->bname }}
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Menu Details: {{ $menu->bname }}</h3>
                <div class="block-options">
                    
                    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-secondary">
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
                                    <div class="col-md-4 fw-semibold text-muted">Name:</div>
                                    <div class="col-md-8">{{ $menu->bname }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Description:</div>
                                    <div class="col-md-8">{{ $menu->description ?: 'Not provided' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Slug:</div>
                                    <div class="col-md-8">{{ $menu->slug }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Display Order:</div>
                                    <div class="col-md-8">{{ $menu->display_order }}</div>
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
                                    <div class="col-md-4 fw-semibold text-muted">Status:</div>
                                    <div class="col-md-8">
                                        @if ($menu->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Parent Menu:</div>
                                    <div class="col-md-8">
                                        @if ($menu->parent)
                                            <a href="{{ route('menus.show', $menu->parent) }}">{{ $menu->parent->bname }}</a>
                                        @else
                                            None
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Created At:</div>
                                    <div class="col-md-8">{{ $menu->created_at->format('M d, Y H:i') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-semibold text-muted">Updated At:</div>
                                    <div class="col-md-8">{{ $menu->updated_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($menu->children->count() > 0)
                    <div class="block block-rounded mt-4">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Child Menus</h3>
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th class="text-center">Order</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menu->children as $child)
                                            <tr>
                                                <td>{{ $child->bname }}</td>
                                                <td>{{ $child->slug }}</td>
                                                <td class="text-center">{{ $child->display_order }}</td>
                                                <td class="text-center">
                                                    @if ($child->is_published)
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-warning">Draft</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('menus.show', $child) }}" class="btn btn-sm btn-info" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('menus.edit', $child) }}" class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 