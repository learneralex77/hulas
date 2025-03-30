@extends('layouts.main')

@section('title')
    Create New Download
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Download</h3>
                <div class="block-options">
                    <a href="{{ route('downloads.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('downloads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('downloads.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
