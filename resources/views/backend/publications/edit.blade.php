@extends('backend.layouts.main')

@section('title')
    Edit Publication
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Publication</h3>
                <div class="block-options">
                    <a href="{{ route('publications.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content p-0">


                <form action="{{ route('publications.update', $publication) }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.publications.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
