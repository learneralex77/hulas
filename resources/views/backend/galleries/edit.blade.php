@extends('backend.layouts.main')

@section('title')
    Edit Gallery
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Gallery</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data"
                    id="gallery-form">
                    @csrf
                    @method('PUT')
                    @include('backend.galleries.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
