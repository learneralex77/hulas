@extends('layouts.main')

@section('title')
    Edit Menu
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Menu: {{ $menu->bname }}</h3>
                <div class="block-options">
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-alt-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('menus.update', $menu) }}" method="POST" id="menuForm">
                    @csrf
                    @method('PUT')
                    <!-- Hidden field to store the current form state in URL for refreshes -->
                    <input type="hidden" name="_form_state" value="1">
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    
                    @include('menus.partials.form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuId = {{ $menu->id }};
        const form = document.getElementById('menuForm');
        const formSessionKey = 'menu_edit_form_' + menuId;
        
        // Function to save current form data to session
        function saveFormDataToSession() {
            // Create a FormData object from the form
            const currentFormData = new FormData(form);
            
            // Convert FormData to JSON and store in localStorage
            const formDataObj = {};
            currentFormData.forEach((value, key) => {
                formDataObj[key] = value;
            });
            
            // Store in localStorage as a backup
            localStorage.setItem(formSessionKey, JSON.stringify(formDataObj));
        }
        
        // Save form data when fields change
        const formInputs = form.querySelectorAll('input, select, textarea');
        formInputs.forEach(input => {
            input.addEventListener('change', saveFormDataToSession);
            // For text inputs, also save on keyup with debounce
            if (input.type === 'text' || input.type === 'number' || input.type === 'textarea') {
                let timeout;
                input.addEventListener('keyup', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(saveFormDataToSession, 500);
                });
            }
        });
        
        // Load saved form data if it exists when the page loads (not if redirected with errors)
        if (!document.querySelector('.is-invalid')) {
            const savedFormData = localStorage.getItem(formSessionKey);
            if (savedFormData) {
                const parsedData = JSON.parse(savedFormData);
                
                // Fill form fields with saved data
                Object.keys(parsedData).forEach(key => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) {
                        if (input.type === 'checkbox') {
                            input.checked = parsedData[key] === '1' || parsedData[key] === true;
                        } else {
                            input.value = parsedData[key];
                        }
                    }
                });
            }
        }
        
        // Before page unload (refresh/navigate), save form data
        window.addEventListener('beforeunload', saveFormDataToSession);
        
        // When form is submitted successfully, clear saved data
        form.addEventListener('submit', function() {
            localStorage.removeItem(formSessionKey);
        });
    });
</script>
@endpush 