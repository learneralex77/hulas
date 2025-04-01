@extends('backend.layouts.main')

@section('title')
    Create New Download
@endsection


@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Download</h3>
                <div class="block-options">
                    <a href="{{ route('downloads.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('downloads.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @include('backend.downloads.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
