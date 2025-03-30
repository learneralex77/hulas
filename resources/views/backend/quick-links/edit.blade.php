@extends('layouts.main')

@section('title')
    Edit Quick Link
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-header block-header-default bg-transparent border-0">
                <h3 class="block-title">Edit Quick Link</h3>
                <div class="block-options">
                    <a href="{{ route('quick-links.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content p-0">
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

                <form action="{{ route('quick-links.update', $quickLink) }}" method="POST" id="quick-link-form">
                    @method('PUT')
                    @include('quick-links.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
