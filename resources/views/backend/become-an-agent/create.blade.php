@extends('layouts.main')

@section('title')
    Add Become an Agent Images
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('become-an-agent.store') }}" method="POST" enctype="multipart/form-data" id="agent-form">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Images</h3>
                    <div class="block-options">
                        <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        
                    </div>
                </div>
                <div class="block-content">
                    @include('become-an-agent.partials.form')
                </div>
                    <div class="text-center mt-4 mb-3">
                    <button type="submit" class="btn btn-primary mb-3">
                        <i class="fa fa-save me-1"></i> {{ isset($becomeAnAgent) ? 'Update' : 'Create' }} Become an Agent
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection 