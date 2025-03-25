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
                        <button type="submit" class="btn btn-sm btn-alt-success">
                            <i class="fa fa-check"></i> Update
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="display_order">Display Order</label>
                                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $service->display_order) }}">
                                    @error('display_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="file">File (Image or PDF)</label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($service->file)
                                        <div class="mt-2">
                                            <a href="{{ Storage::url($service->file) }}" target="_blank" class="btn btn-sm btn-alt-info">
                                                <i class="fa fa-eye"></i> View Current File
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ $service->is_published ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">Publish</label>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Dynamic section for names, icons, and descriptions -->
                            <div class="mb-4">
                                <h4>Service Details <small class="text-muted">(You can add multiple entries)</small></h4>
                                
                                <div id="service-details-container">
                                    @php
                                        $translation = $service->translations->first();
                                        $names = json_decode($translation->name ?? '[]') ?: [];
                                        $icons = json_decode($translation->icon ?? '[]') ?: [];
                                        $descriptions = json_decode($translation->description ?? '[]') ?: [];
                                        $totalEntries = max(is_array($names) ? count($names) : 0, 
                                                         is_array($icons) ? count($icons) : 0, 
                                                         is_array($descriptions) ? count($descriptions) : 0);
                                    @endphp
                                    
                                    @for($i = 0; $i < $totalEntries; $i++)
                                        <div class="service-detail-item border rounded p-3 mb-3">
                                            @if($i > 0)
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h5 class="mb-0">Additional Entry #{{ $i }}</h5>
                                                    <button type="button" class="btn btn-sm btn-alt-danger remove-detail" title="Remove this entry">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="names_{{ $i }}">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('names.'.$i) is-invalid @enderror" id="names_{{ $i }}" name="names[]" value="{{ old('names.'.$i, $names[$i] ?? '') }}" required>
                                                    @error('names.'.$i)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="form-label" for="icons_{{ $i }}">Icon (FontAwesome Class)</label>
                                                    <input type="text" class="form-control @error('icons.'.$i) is-invalid @enderror" id="icons_{{ $i }}" name="icons[]" value="{{ old('icons.'.$i, $icons[$i] ?? '') }}" placeholder="fa fa-example">
                                                    @error('icons.'.$i)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label" for="descriptions_{{ $i }}">Description</label>
                                                <textarea class="form-control @error('descriptions.'.$i) is-invalid @enderror" id="descriptions_{{ $i }}" name="descriptions[]" rows="3">{{ old('descriptions.'.$i, $descriptions[$i] ?? '') }}</textarea>
                                                @error('descriptions.'.$i)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                
                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-alt-success" id="add-service-detail">
                                        <i class="fa fa-plus"></i> Add Another Entry
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let detailIndex = {{ $totalEntries ?? 0 }};
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
        
        // Event listener for existing remove buttons
        document.querySelectorAll('.remove-detail').forEach(button => {
            button.addEventListener('click', function() {
                const item = this.closest('.service-detail-item');
                container.removeChild(item);
            });
        });
    });
</script>
@endpush 