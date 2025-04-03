@extends('backend.layouts.main')

@section('title')
    Edit Service
@endsection



@section('content')
    <div class="content">
        <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Service</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-alt-primary" href="{{ route('services.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="block-content p-3">
                    @include('backend.services.partials.form')
                </div>
            </div>
        </form>
    </div>
@endsection
