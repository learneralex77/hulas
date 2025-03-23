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
                    <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('contact-us.edit', $contactUs) }}" class="btn btn-sm btn-alt-success">
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
                            <tr>
                                <th>Phone Number</th>
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
                                <th>Contact Remarks</th>
                                <td>{{ $contactUs->contact_remarks ?? 'No remarks' }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $contactUs->created_at->format('M d, Y H:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $contactUs->updated_at->format('M d, Y H:i A') }}</td>
                            </tr>
                        </table>
                        
                        <div class="mt-4">
                            <form action="{{ route('contact-us.destroy', $contactUs) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-1"></i> Delete Inquiry
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 