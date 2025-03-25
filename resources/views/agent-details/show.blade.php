@extends('layouts.main')

@section('title')
    View Agent Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Details Information</h3>
                <div class="block-options">
                <a class="btn btn-sm btn-alt-success" href="{{ route('agent-details.edit', $agentDetail) }}">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a class="btn btn-sm btn-alt-primary" href="{{ route('agent-details.index') }}">
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
                                        <tbody>
                                            <tr>
                                                <th style="width: 40%;">ID</th>
                                                <td>{{ $agentDetail->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <td>{{ $agentDetail->district->name ?? 'N/A' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width: 40%;">Created At</th>
                                                <td>{{ $agentDetail->created_at->format('M d, Y H:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At</th>
                                                <td>{{ $agentDetail->updated_at->format('M d, Y H:i A') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="mt-4">Agent Information</h4>
                        
                        @php
                            $stateAgentNames = $agentDetail->state_agent_names;
                            $addresses = $agentDetail->addresses;
                            $contactNos = $agentDetail->contact_nos;
                            $contactPersons = $agentDetail->contact_persons;
                            $totalEntries = max(
                                is_array($stateAgentNames) ? count($stateAgentNames) : 0,
                                is_array($addresses) ? count($addresses) : 0,
                                is_array($contactNos) ? count($contactNos) : 0,
                                is_array($contactPersons) ? count($contactPersons) : 0
                            );
                        @endphp
                        
                        @if($totalEntries > 0)
                            @for($i = 0; $i < $totalEntries; $i++)
                                <div class="block block-rounded border border-1 mb-3">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">{{ $i == 0 ? 'Primary Entry' : 'Additional Entry #' . $i }}</h3>
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 40%;">State Agent Name</th>
                                                                <td>{{ $stateAgentNames[$i] ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <td>{{ $contactNos[$i] ?? 'N/A' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 40%;">Contact Person</th>
                                                                <td>{{ $contactPersons[$i] ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td>{{ $addresses[$i] ?? 'N/A' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @else
                            <div class="alert alert-info">
                                No detailed agent information available.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 