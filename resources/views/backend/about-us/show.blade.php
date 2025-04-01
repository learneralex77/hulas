@extends('backend.layouts.main')

@section('title')
    View About Us
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">About Us Information</h3>
                <div class="block-options">
                    <a href="{{ route('about-us.edit', $aboutUs) }}" class="btn btn-sm btn-alt-success me-1">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-alt-primary me-1">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>

                    <!-- <form action="{{ route('about-us.destroy', $aboutUs) }}" method="POST" style="display: inline-block; margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form> -->
                    <!-- <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                                    title="Delete" onclick="deleteDepartment({{ $department->id }})"> <i
                                                        class="fa fa-times">Delete</i>
                                     </button> -->
                </div>
            </div>
            <div class="block-content">
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
                                                    @if ($aboutUs->video_link)
                                                        <a href="{{ $aboutUs->video_link }}"
                                                            target="_blank">{{ $aboutUs->video_link }}</a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Short Description</th>
                                                <td>{{ $aboutUs->short_description ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Created At</th>
                                                <td>{{ $aboutUs->created_at->format('M d, Y H:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At</th>
                                                <td>{{ $aboutUs->updated_at->format('M d, Y H:i A') }}</td>
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
                                @if ($aboutUs->image)
                                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                                        class="img-fluid rounded">
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
                        @if (is_array($aboutUs->mission_vision) && count($aboutUs->mission_vision) > 0)
                            <div class="row">
                                @foreach ($aboutUs->mission_vision as $item)
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
            </div>
        </div>
    </div>
@endsection
