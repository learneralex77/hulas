@extends('layouts.main')

@section('title')
    Agent Form Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Form Details</h3>
                <div class="block-options">
                    <a href="{{ route('agent-forms.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>
                    <a href="{{ route('agent-forms.edit', $agentForm) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt me-1"></i> Edit
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row push">
                    <div class="col-lg-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%;">ID</th>
                                <td>{{ $agentForm->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $agentForm->name }}</td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td>{{ $agentForm->number }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $agentForm->district->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $agentForm->address }}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td style="white-space: pre-line">{{ $agentForm->message }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $agentForm->created_at->format('F d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $agentForm->updated_at->format('F d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 