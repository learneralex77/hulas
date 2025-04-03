@extends('backend.layouts.main')

@section('title')
    Create New Partner
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Partner</h3>
                <div class="block-options">
                    <a href="{{ route('partners.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data"
                    id="partner-form">
                    @csrf
                    @include('backend.partners.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 