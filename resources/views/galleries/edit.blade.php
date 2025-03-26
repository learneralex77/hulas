@extends('layouts.main')

@section('title')
    Edit Gallery
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Gallery: {{ $gallery->title }}</h3>
                <div class="block-options">
                    <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" id="gallery-form">
                    @csrf
                    @method('PUT')
                    @include('galleries.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 