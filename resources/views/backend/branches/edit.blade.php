@extends('layouts.main')

@section('title')
    Edit Branch
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Branch</h3>
                <div class="block-options">
                    <a href="{{ route('branches.index') }}" class="btn btn-sm btn-alt-primary">
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

                <form action="{{ route('branches.update', $branch) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('branches.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 