{{-- Date Field --}}
    <div class="mb-4">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ old('date', isset($forexRate) ? $forexRate->date : '') }}" required>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- MORNING SLOT --}}
    <h5>Morning Rates</h5>
    <div id="morning-slots">
        @php
            $morningData = old('slots.morning', $morningRates ?? []);
        @endphp

        @foreach ($morningData as $index => $rate)
            @include('backend.forex-rates.partials.rate-fields', ['timeSlot' => 'morning', 'index' => $index, 'rate' => (object) $rate])
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addRateRow('morning')">+ Add Morning Rate</button>

    <hr>

    {{-- AFTERNOON SLOT --}}
    <h5>Afternoon Rates</h5>
    <div id="afternoon-slots">
        @php
            $afternoonData = old('slots.afternoon', $afternoonRates ?? []);
        @endphp

        @foreach ($afternoonData as $index => $rate)
            @include('backend.forex-rates.partials.rate-fields', ['timeSlot' => 'afternoon', 'index' => $index, 'rate' => (object) $rate])
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addRateRow('afternoon')">+ Add Afternoon Rate</button>

    <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Rates</button>
    </div>
</form>

{{-- Dynamic row script --}}
<script>
    let rowIndex = {
        morning: {{ count($morningData) }},
        afternoon: {{ count($afternoonData) }}
    };

    function addRateRow(slot) {
        fetch("{{ route('forex-rate.add-row') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                time_slot: slot,
                index: rowIndex[slot]
            })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById(`${slot}-slots`).insertAdjacentHTML('beforeend', data.html);
            rowIndex[slot]++;
        });
    }
</script>
