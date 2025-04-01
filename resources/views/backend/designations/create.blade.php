@extends('backend.layouts.main')

@section('title')
    Create New Designation
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Designation</h3>
                <div class="block-options">
                    <a href="{{ route('designations.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('designations.store') }}" method="POST">
                    @csrf
                    @include('backend.designations.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
