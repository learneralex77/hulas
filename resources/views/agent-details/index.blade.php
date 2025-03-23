@extends('layouts.main')

@section('title')
    Agent Details
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Manage Agent Details</h3>
                <div class="block-options">
                    <a href="{{ route('agent-details.create') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus me-1"></i> Add Agent Details
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <p class="mb-0">{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th>District</th>
                                <th>State Agent Name</th>
                                <th>Contact Numbers</th>
                                <th>Contact Persons</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agentDetails as $agentDetail)
                                <tr>
                                    <td>{{ $agentDetail->id }}</td>
                                    <td>{{ $agentDetail->district->name }}</td>
                                    <td>
                                        @php
                                            $names = json_decode($agentDetail->state_agent_name ?: '[]') ?: [];
                                        @endphp
                                        {{ $names[0] ?? '' }}
                                        @if(is_array($names) && count($names) > 1)
                                            <span class="badge bg-info">{{ count($names) }} entries</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $contacts = json_decode($agentDetail->contact_no ?: '[]') ?: [];
                                        @endphp
                                        {{ $contacts[0] ?? '' }}
                                        @if(is_array($contacts) && count($contacts) > 1)
                                            <span class="badge bg-info">{{ count($contacts) }} entries</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $persons = json_decode($agentDetail->contact_person ?: '[]') ?: [];
                                        @endphp
                                        {{ $persons[0] ?? '' }}
                                        @if(is_array($persons) && count($persons) > 1)
                                            <span class="badge bg-info">{{ count($persons) }} entries</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('agent-details.show', $agentDetail) }}" class="btn btn-sm btn-alt-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('agent-details.edit', $agentDetail) }}" class="btn btn-sm btn-alt-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('agent-details.destroy', $agentDetail) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete this agent detail?')" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No agent details found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 