@extends('layouts.main')

@section('title')
    View Agent Form
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Form Details</h3>
                <div class="block-options">
                <a href="{{ route('agent-forms.edit', $agentForm) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('agent-forms.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                  
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 40%;">ID</th>
                                            <td>{{ $agentForm->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Full Name</th>
                                            <td>{{ $agentForm->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <a href="mailto:{{ $agentForm->email }}">{{ $agentForm->email }}</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 40%;">Phone Number</th>
                                            <td>{{ $agentForm->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>District</th>
                                            <td>{{ $agentForm->district->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if ($agentForm->is_processed)
                                                    <span class="badge bg-success">Processed</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4>Address</h4>
                                <div class="p-3 bg-body-light rounded mb-4">
                                    {{ $agentForm->address }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4>Message</h4>
                                <div class="p-3 bg-body-light rounded mb-4">
                                    {!! nl2br(e($agentForm->message)) ?: 'No message provided.' !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 40%;">Created At</th>
                                            <td>{{ $agentForm->created_at->format('M d, Y H:i A') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 40%;">Updated At</th>
                                            <td>{{ $agentForm->updated_at->format('M d, Y H:i A') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 