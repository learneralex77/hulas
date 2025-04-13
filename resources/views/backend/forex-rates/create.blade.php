@extends('backend.layouts.main')

@section('title', 'Create New Forex Rate')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Forex Rate</h3>
                <div class="block-options">
                    <a href="{{ route('forex-rate.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="block-content p-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Please fix the following errors:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('forex-rate.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    {{-- Include the form partial --}}
                    @include('backend.forex-rates.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
