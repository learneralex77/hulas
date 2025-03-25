@extends('layouts.main')

@section('title')
    Edit Contact Inquiry
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Contact Inquiry</h3>
                <div class="block-options">
                    <a href="{{ route('contact-us.index') }}" class="btn btn-sm btn-alt-primary">
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

                <form action="{{ route('contact-us.update', $contactUs) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Name and Email fields side by side -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="full_name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $contactUs->full_name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contactUs->email) }}" required>
                                </div>
                            </div>

                            <!-- Phone Number and Contacted status side by side -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="phone_number">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $contactUs->phone_number) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Contact Status</label>
                                    <div class="mt-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_contacted" name="is_contacted" value="1" {{ old('is_contacted', $contactUs->is_contacted) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_contacted">Contacted</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Remarks field (full width) -->
                            <div class="mb-4">
                                <label class="form-label" for="contact_remarks">Contact Remarks</label>
                                <textarea class="form-control" id="contact_remarks" name="contact_remarks" rows="4">{{ old('contact_remarks', $contactUs->contact_remarks) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Update Inquiry
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 