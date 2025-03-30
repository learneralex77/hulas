@extends('layouts.main')

@section('title')
    Quick Links Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Quick Links List</h3>
                <div class="block-options">
                    <a href="{{ route('quick-links.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New Quick Link
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th style="width: 50px;">S.N.</th>
                                <th>Name</th>
                                <th>External Link</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quickLinks as $quickLink)
                                <tr>
                                    <td class="text-center">{{ $quickLink->id }}</td>
                                    <td>{{ $quickLink->name }}</td>
                                    <td>{{ $quickLink->external_link }}</td>
                                    <td>{{ $quickLink->display_order }}</td>
                                    <td>
                                        @if ($quickLink->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-2">
                                            <a href="{{ route('quick-links.show', $quickLink) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('quick-links.edit', $quickLink) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('quick-links.destroy', $quickLink) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this quick link?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No quick links found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
