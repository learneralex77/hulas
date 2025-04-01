@extends('backend.layouts.main')

@section('title')
    View Service
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Service Details</h3>
                <div class="block-options">
                    <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-alt-primary me-1">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-sm btn-alt-primary border me-1">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">ID</th>
                                <td>{{ $service->id }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Description</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($service->translations as $translation)
                                <tr>
                                    <th style="width: 30%;">Language</th>
                                    <td>{{ strtoupper($translation->language_code) }}</td>
                                </tr>
                                <tr>
                                    <th>Names</th>
                                    <td>
                                        @foreach ($translation->names as $name)
                                            <div>{{ $name }}</div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Descriptions</th>
                                    <td>
                                        @foreach ($translation->descriptions as $description)
                                            <div class="mb-3">{!! nl2br(e($description)) !!}</div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($service->file)
                    <h4 class="mt-4">Service File</h4>
                    <div class="mt-2 mb-4">
                        <a href="{{ asset('storage/' . $service->file) }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> Download File
                        </a>
                    </div>
                @endif

                <h4 class="mt-4">Display Settings</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Display Order</th>
                                <td>{{ $service->display_order }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Status</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Publication Status</th>
                                <td>
                                    @if ($service->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
