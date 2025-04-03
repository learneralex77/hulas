@extends('backend.layouts.main')

@section('title')
    Edit Popup
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Popup</h3>
                <div class="block-options">
                    <a href="{{ route('popups.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('popups.update', $popup->id) }}" method="POST" enctype="multipart/form-data"
                    id="popup-form">
                    @csrf
                    @method('PUT')
                    @include('backend.popups.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 