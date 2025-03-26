@extends('layouts.main')

@section('title')
    Edit Team Member
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Team Member</h3>
                <div class="block-options">
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('teams.update', $team) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('teams.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection 