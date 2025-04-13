@extends('backend.layouts.main')

@section('title')
    Edit Agent Request
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Agent Request</h3>
                <div class="block-options">
                    <a href="{{ route('become-an-agent.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('become-an-agent.update', $becomeAnAgent) }}" method="POST"
                    enctype="multipart/form-data" id="agent-form" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.become-an-agent.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
