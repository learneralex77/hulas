@extends('layouts.main')

@section('title')
    Create New Menu
@endsection

@section('styles')
<style>
    /* Remove bottom space in menu form */
    .block-content.no-bottom-space {
        padding: 0 !important;
    }
    
    .row.menu-form-container {
        margin-bottom: 0 !important;
    }
    
    .menu-form-footer {
        margin-bottom: 0 !important;
    }
    
    .block.menu-form-block {
        margin-bottom: 1rem !important;
    }
</style>
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded menu-form-block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Menu</h3>
                <div class="block-options">
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content no-bottom-space">
                <form action="{{ route('menus.store') }}" method="POST" id="menuForm">
                    @csrf
                    @include('menus.partials.form',['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
