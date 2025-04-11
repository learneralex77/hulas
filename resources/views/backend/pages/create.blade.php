@extends('backend.layouts.main')

@section('title')
    Create Page
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Page</h3>
                <div class="block-options">
                    <a href="{{ route('pages.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" id="page-form" class="needs-validation" novalidate>
                    @csrf
                    @include('backend.pages.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
