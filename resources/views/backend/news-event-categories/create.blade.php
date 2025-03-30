@extends('layouts.main')

@section('title')
    Create News & Event Category
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New News & Event Category</h3>
                <div class="block-options">
                    <a href="{{ route('news-event-categories.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="form-horizontal" action="{{ route('news-event-categories.store') }}" method="POST"
                    id="category-form">
                    @csrf
                    @include('news-event-categories.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
