@extends('layouts.main')

@section('title')
    Create About Us
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('about-us.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Create About Us</h3>
                    <div class="block-options">
                        <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="block-content">
                    @include('about-us.partials.form')
                </div>
            </div>
        </form>
    </div>
@endsection 