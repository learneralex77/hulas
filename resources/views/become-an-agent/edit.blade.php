@extends('layouts.main')

@section('title')
    Edit Become an Agent Images
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('become-an-agent.update', $becomeAnAgent) }}" method="POST" enctype="multipart/form-data" id="agent-form">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Images</h3>
                    <div class="block-options">
                        <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="block-content">
                    @include('become-an-agent.partials.form')
                </div>
                <div class="block-content block-content-full block-content-sm text-center">
                    <button type="submit" class="btn btn-primary mb-3">
                        <i class="fa fa-save me-1"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection 