@extends('backend.layouts.main')

@section('title')
    Create Contact Inquiry
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Contact Inquiry</h3>
                <div class="block-options">
                    <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('contact-us.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @include('backend.contact-us.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
