@extends('backend.layouts.main')

@section('title')
    Create Branch
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Branch</h3>
                <div class="block-options">
                    <a href="{{ route('branches.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">

                <form action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @include('backend.branches.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
