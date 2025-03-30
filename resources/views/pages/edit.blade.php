@extends('layouts.main')

@section('title')
    Edit Page
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Page</h3>
                <div class="block-options">
                    <a href="{{ route('pages.index') }}" class="btn btn-sm btn-alt-primary border">
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

                <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data"
                    id="page-form">
                    @csrf
                    @method('PUT')
                    @include('pages.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
