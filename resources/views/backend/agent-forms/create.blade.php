@extends('backend.layouts.main')

@section('title')
    Create Agent Form
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Agent Form</h3>
                <div class="block-options">
                    <a href="{{ route('agent-forms.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('agent-forms.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @include('backend.agent-forms.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
