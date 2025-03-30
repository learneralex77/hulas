@extends('layouts.main')

@section('title')
    View Settings
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Settings Details</h3>
                <div class="block-options">
                <a href="{{ route('settings.edit', $setting) }}" class="btn btn-sm btn-alt-success me-1">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('settings.index') }}" class="btn btn-sm btn-alt-primary me-1">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                   
                    <form action="{{ route('settings.destroy', $setting) }}" method="POST" ">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete these settings?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">General Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Website Title</h5>
                                <p>{{ $setting->title }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Email</h5>
                                <p>{{ $setting->email }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Feedback Notification Email</h5>
                                <p>{{ $setting->feedback_notify_email }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Agent Notification Email</h5>
                                <p>{{ $setting->agent_notify_email }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>PO Box</h5>
                                <p>{{ $setting->PO_Box }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Google Map Link</h5>
                                @if($setting->google_maplink)
                                    <p><a href="{{ $setting->google_maplink }}" target="_blank">{{ $setting->google_maplink }}</a></p>
                                @else
                                    <p>Not set</p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h4 class="mb-4">Logos</h4>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <h5>Main Logo</h5>
                                @if($setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-fluid rounded" style="max-height: 200px;">
                                @else
                                    <p>No logo uploaded</p>
                                @endif
                            </div>
                            <div class="col-md-4 mb-4">
                                <h5>Primary Logo</h5>
                                @if($setting->primary_logo)
                                    <img src="{{ asset('storage/' . $setting->primary_logo) }}" alt="Primary Logo" class="img-fluid rounded" style="max-height: 200px;">
                                @else
                                    <p>No primary logo uploaded</p>
                                @endif
                            </div>
                            <div class="col-md-4 mb-4">
                                <h5>Secondary Logo</h5>
                                @if($setting->secondary_logo)
                                    <img src="{{ asset('storage/' . $setting->secondary_logo) }}" alt="Secondary Logo" class="img-fluid rounded" style="max-height: 200px;">
                                @else
                                    <p>No secondary logo uploaded</p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h4 class="mb-4">Content</h4>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>Description</h5>
                                <p>{{ $setting->description }}</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h4 class="mb-4">SEO Settings</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Canonical URL</h5>
                                <p>{{ $setting->canonical_url }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Keywords</h5>
                                <p>{{ $setting->keyword }}</p>
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5>Schema Markup</h5>
                                @if($setting->schema_markup)
                                    <pre class="bg-light p-3 rounded"><code>{{ $setting->schema_markup }}</code></pre>
                                @else
                                    <p>No schema markup added</p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h4 class="mb-4">Social Media</h4>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <h5>Facebook</h5>
                                @if($setting->facebook)
                                    <p><a href="{{ $setting->facebook }}" target="_blank">{{ $setting->facebook }}</a></p>
                                @else
                                    <p>Not set</p>
                                @endif
                            </div>
                            <div class="col-md-4 mb-4">
                                <h5>Twitter</h5>
                                @if($setting->twitter)
                                    <p><a href="{{ $setting->twitter }}" target="_blank">{{ $setting->twitter }}</a></p>
                                @else
                                    <p>Not set</p>
                                @endif
                            </div>
                            <div class="col-md-4 mb-4">
                                <h5>LinkedIn</h5>
                                @if($setting->linkedin)
                                    <p><a href="{{ $setting->linkedin }}" target="_blank">{{ $setting->linkedin }}</a></p>
                                @else
                                    <p>Not set</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 