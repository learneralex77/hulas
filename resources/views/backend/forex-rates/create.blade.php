@extends('backend.layouts.main')

@section('title')
    Create New Forex-rate
@endsection

@section('content')
    <div class="content">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Forex Rate</h3>
                <div class="block-options">
                    <a class="btn btn-sm btn-alt-primary" href="{{ route('forex-rate.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content p-3">
                <form action="{{ route('forex-rate.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('backend.forex-rates.partials.form')
                </form>
            </div>
        </div>

    </div>
@endsection
