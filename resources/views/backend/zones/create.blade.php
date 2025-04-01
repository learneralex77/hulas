@extends('backend.layouts.main')

@section('title')
    Create Zone
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Zone</h3>
                <div class="block-options">
                    <a href="{{ route('zones.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('zones.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @include('backend.zones.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
