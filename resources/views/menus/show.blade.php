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
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-alt-primary">
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
                                <td>{{ $menu->bname }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $menu->description ?: 'Not provided' }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $menu->slug }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $menu->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($menu->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Parent Menu</th>
                                <td>
                                    @if ($menu->parent)
                                        <a href="{{ route('menus.show', $menu->parent) }}">{{ $menu->parent->bname }}</a>
                                    @else
                                        None
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $menu->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $menu->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if ($menu->children->count() > 0)
                    <div class="block block-rounded mt-4">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Child Menus</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu->children as $child)
                                        <tr>
                                            <td>{{ $child->bname }}</td>
                                            <td>{{ $child->slug }}</td>
                                            <td>{{ $child->display_order }}</td>
                                            <td>
                                                @if ($child->is_published)
                                                    <span class="badge bg-success">Published</span>
                                                @else
                                                    <span class="badge bg-warning">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('menus.show', $child) }}" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('menus.edit', $child) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 