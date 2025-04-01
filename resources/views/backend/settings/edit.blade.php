@extends('backend.layouts.main')

@section('title')
    Edit Settings
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Settings</h3>
                <div class="block-options">
                    <a href="{{ route('settings.index') }}" class="btn btn-alt-secondary">
                        <i class="fa fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="{{ route('settings.update', $setting) }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
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
