@extends('backend.layouts.main')

@section('title')
    Edit Menu
@endsection



@section('content')
    <div class="content">
        <div class="block block-rounded menu-form-block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Menu</h3>
                <div class="block-options">
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content no-bottom-space">
                <form action="{{ route('menus.update', $menu) }}" method="POST" id="menuForm" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    @include('backend.menus.partials.form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
