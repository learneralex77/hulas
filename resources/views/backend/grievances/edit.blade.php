@extends('backend.layouts.main')

@section('title')
    Edit Grievance
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Grievance</h3>
                <div class="block-options">
                    <a href="{{ route('grievances.index') }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('grievances.update', $grievance) }}" method="POST" class="js-validation">
                    @csrf
                    @method('PUT')
                    @include('backend.grievances.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 