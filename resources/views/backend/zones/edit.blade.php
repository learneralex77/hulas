@extends('backend.layouts.main')

@section('title')
    Edit Zone
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Zone</h3>
                <div class="block-options">
                    <a href="{{ route('zones.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('zones.update', $zone) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.zones.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
