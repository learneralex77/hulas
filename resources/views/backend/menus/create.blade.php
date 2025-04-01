@extends('backend.layouts.main')

@section('title')
    Create New Menu
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded menu-form-block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Menu</h3>
                <div class="block-options">
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content no-bottom-space">
                <form action="{{ route('menus.store') }}" method="POST" id="menuForm" class="needs-validation" novalidate>
                    @csrf
                    @include('backend.menus.partials.form', ['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
