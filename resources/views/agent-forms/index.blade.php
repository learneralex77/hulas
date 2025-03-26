@extends('layouts.main')

@section('title')
    Agent Forms
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Agent Forms</h3>
                <div class="block-options">
                    <a href="{{ route('agent-forms.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus me-1"></i> Add Agent Form
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>District</th>
                                <th>Address</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agentForms as $agentForm)
                                <tr>
                                    <td>{{ $agentForm->id }}</td>
                                    <td>{{ $agentForm->name }}</td>
                                    <td>{{ $agentForm->number }}</td>
                                    <td>{{ $agentForm->district->name }}</td>
                                    <td>{{ Str::limit($agentForm->address, 30) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('agent-forms.show', $agentForm) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('agent-forms.edit', $agentForm) }}" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('agent-forms.destroy', $agentForm) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this agent form?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No agent forms found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $agentForms->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 