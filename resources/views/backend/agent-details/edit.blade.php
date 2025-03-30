@extends('layouts.main')

@section('title')
    Edit Agent Details
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('agent-details.update', $agentDetail) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Agent Details</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-alt-primary" href="{{ route('agent-details.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        
                    </div>
                </div>
                <div class="block-content">
                    @include('agent-details.partials.form')
                </div>
                <div class="block-content block-content-full block-content-sm text-center">
                    <button type="submit" class="btn btn-primary mb-3">
                        <i class="fa fa-save me-1"></i> Update Agent Detail
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection 