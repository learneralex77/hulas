@extends('backend.layouts.main')

@section('title')
    Edit Agent Form
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Agent Form</h3>
                <div class="block-options">
                    <a href="{{ route('agent-forms.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('agent-forms.update', $agentForm) }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.agent-forms.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
