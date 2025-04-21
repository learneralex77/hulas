@extends('backend.layouts.main')

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

                <form class="form-horizontal needs-validation" action="{{ route('news-event-categories.store') }}"
                    method="POST" id="category-form" enctype="multipart/form-data" novalidate>
                    @csrf
                    @include('backend.news-event-categories.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
