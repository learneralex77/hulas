@extends('layouts.main')

@section('title')
    Create New Menu
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create New Menu</h3>
                <div class="block-options">
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('menus.store') }}" method="POST" id="menuForm">
                    @csrf
                   
                    
                    @include('menus.partials.form',['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
