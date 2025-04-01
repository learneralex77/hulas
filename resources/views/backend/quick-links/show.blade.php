@extends('backend.layouts.main')

@section('title')
    View Quick Link
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Quick Link Details</h3>
                <div class="block-options">

                    <a href="{{ route('quick-links.edit', $quickLink) }}" class="btn btn-sm btn-alt-primary me-1">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-alt-primary border me-1">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>


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
                    <div class="col-md-12">
                        <h4>General Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 15%;">Name</th>
                                        <td style="width: 35%;">{{ $quickLink->name }}</td>
                                        <th style="width: 15%;">External Link</th>
                                        <td style="width: 35%;">
                                            <a href="{{ $quickLink->external_link }}"
                                                target="_blank">{{ $quickLink->external_link }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Display Order</th>
                                        <td>{{ $quickLink->display_order }}</td>
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
                                        <th>Last Updated</th>
                                        <td>{{ $quickLink->updated_at->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
