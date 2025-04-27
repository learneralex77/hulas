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
                    <a href="{{ route('about-us.edit', $aboutUs) }}" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-pencil-alt"></i> Edit
                    </a>
                    <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-alt-primary me-1">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">General Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Tagline</h5>
                                <p>{{ $aboutUs->tagline }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Years of Experience</h5>
                                <p>{{ $aboutUs->years_of_experience ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Video Link</h5>
                                @if ($aboutUs->video_link)
                                    <p><a href="{{ $aboutUs->video_link }}" target="_blank">{{ $aboutUs->video_link }}</a></p>
                                @else
                                    <p>N/A</p>
                                @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Status</h5>
                                <p>
                                    @if($aboutUs->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Display Order</h5>
                                <p>{{ $aboutUs->display_order }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Last Updated</h5>
                                <p>{{ $aboutUs->updated_at->format('M d, Y H:i A') }}</p>
                            </div>
                        </div>

                        @if ($aboutUs->short_description)
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>Short Description</h5>
                                <p>{{ $aboutUs->short_description }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Image</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                @if ($aboutUs->image)
                                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                                        class="img-fluid rounded" style="max-height: 300px;">
                                @else
                                    <p>No image uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Main Description</h4>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <p>{!! nl2br(e($aboutUs->description)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if (is_array($aboutUs->mission_vision) && count($aboutUs->mission_vision) > 0)
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Mission & Vision</h4>
                        <div class="row">
                            @php
                                $missionVisionImages = isset($aboutUs->mission_vision_images) ? $aboutUs->mission_vision_images : [];
                                if (is_string($missionVisionImages)) {
                                    $missionVisionImages = json_decode($missionVisionImages, true) ?? [];
                                }
                            @endphp
                            
                            @foreach ($aboutUs->mission_vision as $index => $item)
                                <div class="col-md-4 mb-4">
                                    <div class="block block-rounded h-100">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">
                                                @if (!empty($missionVisionImages) && isset($missionVisionImages[$index]) && $missionVisionImages[$index])
                                                    <img src="{{ asset('storage/' . $missionVisionImages[$index]) }}" 
                                                         alt="{{ $item['title'] ?? 'Icon' }}" 
                                                         class="img-fluid rounded me-1"
                                                         style="max-height: 24px; max-width: 24px; vertical-align: middle;">
                                                @elseif (!empty($item['icon']))
                                                    <i class="fa fa-{{ $item['icon'] }} me-1"></i>
                                                @else
                                                    <i class="fa fa-check me-1"></i>
                                                @endif
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
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
