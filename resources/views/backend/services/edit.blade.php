@extends('layouts.main')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Service</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-alt-primary" href="{{ route('services.index') }}">
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
                    
                    @include('services.partials.form')
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let detailIndex = {{ count($service->translations) }};
        const container = document.getElementById('service-details-container');
        const addButton = document.getElementById('add-service-detail');
        
        // Add new service detail section
        addButton.addEventListener('click', function() {
            const newDetail = document.createElement('div');
            newDetail.className = 'service-detail-item border rounded p-3 mb-3';
            newDetail.innerHTML = `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">Additional Entry #${detailIndex}</h5>
                    <button type="button" class="btn btn-sm btn-alt-danger remove-detail" title="Remove this entry">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="names_${detailIndex}">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="names_${detailIndex}" name="names[]" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label" for="icons_${detailIndex}">Icon (FontAwesome Class)</label>
                        <input type="text" class="form-control" id="icons_${detailIndex}" name="icons[]" placeholder="fa fa-example">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="descriptions_${detailIndex}">Description</label>
                    <textarea class="form-control" id="descriptions_${detailIndex}" name="descriptions[]" rows="3"></textarea>
                </div>
            `;
            
            container.appendChild(newDetail);
            detailIndex++;
            
            // Add event listener to remove button
            newDetail.querySelector('.remove-detail').addEventListener('click', function() {
                container.removeChild(newDetail);
            });
        });
    });
</script>
@endpush 