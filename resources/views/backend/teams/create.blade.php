@extends('layouts.main')

@section('title')
    Create New Team Member
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-header block-header-default bg-transparent border-0">
                <h3 class="block-title">Create New Team Member</h3>
                <div class="block-options">
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content p-0">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('teams.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
