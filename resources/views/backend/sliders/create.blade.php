@extends('backend.layouts.main')

@section('title')
    Create New Slider
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Slider</h3>
                <div class="block-options">
                    <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" id="slider-form">
                    @csrf
                    @include('backend.sliders.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 