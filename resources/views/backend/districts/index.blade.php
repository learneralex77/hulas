@extends('layouts.main')

@section('title')
    Districts Management
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Districts List</h3>
                <div class="block-options">
                    <a href="{{ route('districts.create') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-plus"></i> Add New District
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Zone</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($districts as $district)
                            <tr>
                                <td>{{ $district->id }}</td>
                                <td>{{ $district->name }}</td>
                                <td>{{ $district->zone->name ?? 'N/A' }}</td>
                                <td>{{ $district->display_order }}</td>
                                <td>
                                    @if ($district->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('districts.show', $district) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('districts.edit', $district) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('districts.destroy', $district) }}" method="POST"
                                            style="display:inline"
                                            onsubmit="return confirm('Are you sure you want to delete this district?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No districts found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-4">
                    {{ $districts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
