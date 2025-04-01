@extends('backend.layouts.main')

@section('title')
    Edit Agent Details
@endsection



@section('content')
    <div class="content">
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
                <form action="{{ route('agent-details.update', $agentDetail) }}" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.agent-details.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
