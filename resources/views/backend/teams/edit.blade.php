@extends('backend.layouts.main')

@section('title')
    Edit Team Member
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Team Member</h3>
                <div class="block-options">
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-alt-primary border">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content p-0">


                <form action="{{ route('teams.update', $team) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.teams.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
