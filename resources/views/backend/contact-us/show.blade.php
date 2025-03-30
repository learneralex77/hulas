@extends('layouts.main')

@section('title')
    View Contact Inquiry
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Contact Inquiry Details</h3>
                <div class="block-options">
                <a href="{{ route('contact-us.edit', $contactUs) }}" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                   
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic info in two columns -->
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 40%;">ID</th>
                                        <td>{{ $contactUs->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ $contactUs->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <a href="mailto:{{ $contactUs->email }}">{{ $contactUs->email }}</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 40%;">Phone Number</th>
                                        <td>{{ $contactUs->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($contactUs->is_contacted)
                                                <span class="badge bg-success">Contacted</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $contactUs->created_at->format('M d, Y H:i A') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Remarks and updated at in separate section -->
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <h4>Contact Remarks</h4>
                                <div class="p-3 bg-body-light rounded mb-4">
                                    {{ $contactUs->contact_remarks ?? 'No remarks provided.' }}
                                </div>
                                <div class="small text-muted">
                                    Last Updated: {{ $contactUs->updated_at->format('F j, Y g:i A') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 