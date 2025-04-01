@extends('backend.layouts.main')

@section('title')
    Create New Settings
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Settings</h3>
                <div class="block-options">
                    <a class="btn btn-sm btn-alt-primary" href="{{ route('settings.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            @include('backend.settings.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/settings.js') }}"></script>
@endsection
