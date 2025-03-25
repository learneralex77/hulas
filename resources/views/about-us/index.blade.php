@extends('layouts.main')

@section('title')
    About Us
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">About Us Information</h3>
                <div class="block-options">
                    @if(!$aboutUs)
                        <a href="{{ route('about-us.create') }}" class="btn btn-alt-primary">
                            <i class="fa fa-plus mr-1"></i> Add About Us
                        </a>
                    @else
                        <a href="{{ route('about-us.edit', $aboutUs) }}" class="btn btn-alt-primary">
                            <i class="fa fa-pencil-alt mr-1"></i> Edit
                        </a>
                    @endif
                </div>
            </div>
            <div class="block-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(!$aboutUs)
                    <div class="alert alert-info">
                        No About Us information has been added yet. Please click the "Add About Us" button to create one.
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">General Information</h3>
                                </div>
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 30%;">Tagline</th>
                                                    <td>{{ $aboutUs->tagline }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Years of Experience</th>
                                                    <td>{{ $aboutUs->years_of_experience ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Video Link</th>
                                                    <td>
                                                        @if($aboutUs->video_link)
                                                            <a href="{{ $aboutUs->video_link }}" target="_blank">{{ $aboutUs->video_link }}</a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Short Description</th>
                                                    <td>{{ $aboutUs->short_description ?? 'N/A' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Image</h3>
                                </div>
                                <div class="block-content">
                                    @if($aboutUs->image)
                                        <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image" class="img-fluid rounded">
                                    @else
                                        <div class="alert alert-info">
                                            No image uploaded.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Description</h3>
                        </div>
                        <div class="block-content">
                            {!! nl2br(e($aboutUs->description)) !!}
                        </div>
                    </div>

                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Mission & Vision</h3>
                        </div>
                        <div class="block-content">
                            @if(is_array($aboutUs->mission_vision) && count($aboutUs->mission_vision) > 0)
                                <div class="row">
                                    @foreach($aboutUs->mission_vision as $item)
                                        <div class="col-md-4 mb-4">
                                            <div class="block block-rounded h-100">
                                                <div class="block-header block-header-default">
                                                    <h3 class="block-title">
                                                        <i class="fa fa-{{ $item['icon'] ?? 'check' }} me-1"></i>
                                                        {{ $item['title'] ?? 'Untitled' }}
                                                    </h3>
                                                </div>
                                                <div class="block-content">
                                                    <p>{!! nl2br(e($item['description'] ?? '')) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">
                                    No mission & vision information has been added.
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <form action="{{ route('about-us.destroy', $aboutUs) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this About Us information?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-alt-danger">
                                <i class="fa fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 