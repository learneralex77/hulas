@extends('backend.layouts.main')

@section('title')
    Create New Department
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Department</h3>
                <div class="block-options">
                    <a href="{{ route('departments.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    @include('backend.departments.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
