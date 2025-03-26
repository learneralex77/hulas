@extends('layouts.main')

@section('title')
    Edit Zone
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Zone</h3>
                <div class="block-options">
                    <a href="{{ route('zones.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('zones.update', $zone) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('zones.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 