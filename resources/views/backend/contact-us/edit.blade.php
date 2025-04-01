@extends('backend.layouts.main')

@section('title')
    Edit Contact Inquiry
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Contact Inquiry</h3>
                <div class="block-options">
                    <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">


                <form action="{{ route('contact-us.update', $contactUs) }}" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.contact-us.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
