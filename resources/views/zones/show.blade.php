@extends('layouts.main')

@section('title')
    View Zone
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Zone Details</h3>
                <div class="block-options">
                    <form action="{{ route('zones.destroy', $zone) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this zone?');" style="display: inline-block; margin: 0;">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('zones.index') }}" class="btn btn-sm btn-alt-secondary me-1">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('zones.edit', $zone) }}" class="btn btn-sm btn-alt-primary me-1">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </a>
                        <button type="submit" class="btn btn-sm btn-alt-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Name</th>
                                <td>{{ $zone->name }}</td>
                            </tr>
                            <tr>
                                <th>Additional Info</th>
                                <td>{{ $zone->additional_info ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Display Settings</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Display Order</th>
                                <td>{{ $zone->display_order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($zone->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if ($zone->districts && $zone->districts->count() > 0)
                    <h4 class="mt-4">Districts in this Zone</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zone->districts as $district)
                                    <tr>
                                        <td>{{ $district->id }}</td>
                                        <td>{{ $district->name }}</td>
                                        <td>
                                            @if ($district->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <h4 class="mt-4">Timestamps</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Created At</th>
                                <td>{{ $zone->created_at->format('F j, Y, g:i a') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated</th>
                                <td>{{ $zone->updated_at->format('F j, Y, g:i a') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('zones.index') }}" class="btn btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 