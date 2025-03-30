@extends('layouts.main')

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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('agent-forms.update', $agentForm) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('agent-forms.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 