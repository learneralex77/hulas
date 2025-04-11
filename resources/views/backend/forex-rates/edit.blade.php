@extends('backend.layouts.main')

@section('title')
    Edit Forex-rate
@endsection



@section('content')
    <div class="content">
        <form action="{{ route('forex-rates.update', $forex-rate) }}" method="POST" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Forex-rate</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-alt-primary" href="{{ route('forex-rates.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="block-content p-3">
                    @include('backend.forex-rates.partials.form')
                </div>
            </div>
        </form>
    </div>
@endsection
