@extends('backend.layouts.main')

@section('title')
    Create New Grievance
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Grievance</h3>
                <div class="block-options">
                    <a href="{{ route('grievances.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('grievances.store') }}" method="POST" class="js-validation">
                    @csrf
                    @include('backend.grievances.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 