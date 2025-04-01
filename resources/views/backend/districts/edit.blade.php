@extends('backend.layouts.main')

@section('title')
    Edit District
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit District</h3>
                <div class="block-options">
                    <a href="{{ route('districts.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('districts.update', $district) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.districts.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
