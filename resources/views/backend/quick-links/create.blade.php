@extends('backend.layouts.main')

@section('title')
    Create Quick Link
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Quick Link</h3>
                <div class="block-options">
                    <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content p-0">

                <form action="{{ route('quick-links.store') }}" method="POST" id="quick-link-form" class="needs-validation"
                    novalidate>
                    @include('backend.quick-links.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
