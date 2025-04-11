<div class="row mb-4">
    <div class="col-md-12">
        <h4 class="mb-3">Morning Rates</h4>
        <div class="table-responsive">
            <table class="table table-bordered" id="morning-rates-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Flag</th>
                        <th>Currency</th>
                        <th>Unit</th>
                        <th>Buying Rate</th>
                        <th>Display Order</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="morning-rates-container">
                    @foreach ($morningRates as $index => $rate)
                        <tr class="rate-row" data-time-slot="morning">
                            @include('backend.forex-rates.partials.rate-fields', [
                                'timeSlot' => 'morning',
                                'index' => $index,
                                'rate' => $rate,
                            ])
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-sm btn-alt-primary mb-4" onclick="addRateRow('morning')">
            <i class="fa fa-plus"></i> Add Morning Rate
        </button>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <h4 class="mb-3">Afternoon Rates</h4>
        <div class="table-responsive">
            <table class="table table-bordered" id="afternoon-rates-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Flag</th>
                        <th>Currency</th>
                        <th>Unit</th>
                        <th>Buying Rate</th>
                        <th>Display Order</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="afternoon-rates-container">
                    @foreach ($afternoonRates as $index => $rate)
                        <tr class="rate-row" data-time-slot="afternoon">
                            @include('backend.forex-rates.partials.rate-fields', [
                                'timeSlot' => 'afternoon',
                                'index' => $index,
                                'rate' => $rate,
                            ])
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-sm btn-alt-primary mb-4" onclick="addRateRow('afternoon')">
            <i class="fa fa-plus"></i> Add Afternoon Rate
        </button>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-end">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Save Rates
        </button>
    </div>
</div>

@push('scripts')
    <script>
        function addRateRow(timeSlot) {
            const container = document.getElementById(`${timeSlot}-rates-container`);
            const currentIndex = container.querySelectorAll('.rate-row').length;

            fetch("{{ route('forex-rate.add-row') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        time_slot: timeSlot,
                        index: currentIndex,
                        // Add existing data for validation repopulation
                        existing_data: window.currentFormData
                    })
                })
                .then(response => response.json())
                .then(data => {
                    const tr = document.createElement('tr');
                    tr.className = 'rate-row';
                    tr.setAttribute('data-time-slot', timeSlot);
                    tr.innerHTML = data.html;
                    container.appendChild(tr);

                    // Add error classes if existing
                    if (data.errors) {
                        Object.entries(data.errors).forEach(([field, message]) => {
                            const input = tr.querySelector(`[name="${field}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                const errorDiv = document.createElement('div');
                                errorDiv.className = 'invalid-feedback';
                                errorDiv.textContent = message;
                                input.parentNode.appendChild(errorDiv);
                            }
                        });
                    }

                    tr.querySelector('.remove-rate').addEventListener('click', function(e) {
                        e.preventDefault();
                        tr.remove();
                    });
                });
        }


        // Initialize existing remove buttons
        document.querySelectorAll('.remove-rate').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                this.closest('.rate-row').remove();
            });
        });
    </script>
@endpush
