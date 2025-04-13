@php
    $flag = $rate->flag ?? '';
    $currency = $rate->currency ?? '';
    $unit = $rate->unit ?? '';
    $buying_rate = $rate->buying_rate ?? '';
    $display_order = $rate->display_order ?? 0;
    $is_published = $rate->is_published ?? false;
@endphp

<div class="border p-3 mb-2 rounded bg-light rate-row" id="{{ $timeSlot }}-rate-row-{{ $index }}">
    <div class="row align-items-end">
        <div class="col-md-2">
            <input type="text" name="slots[{{ $timeSlot }}][{{ $index }}][flag]" class="form-control" placeholder="Flag" value="{{ old("slots.$timeSlot.$index.flag", $flag) }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="slots[{{ $timeSlot }}][{{ $index }}][currency]" class="form-control" placeholder="Currency" value="{{ old("slots.$timeSlot.$index.currency", $currency) }}">
        </div>
        <div class="col-md-1">
            <input type="number" name="slots[{{ $timeSlot }}][{{ $index }}][unit]" class="form-control" placeholder="Unit" value="{{ old("slots.$timeSlot.$index.unit", $unit) }}">
        </div>
        <div class="col-md-2">
            <input type="number" step="0.01" name="slots[{{ $timeSlot }}][{{ $index }}][buying_rate]" class="form-control" placeholder="Buying Rate" value="{{ old("slots.$timeSlot.$index.buying_rate", $buying_rate) }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="slots[{{ $timeSlot }}][{{ $index }}][display_order]" class="form-control" placeholder="Order" value="{{ old("slots.$timeSlot.$index.display_order", $display_order) }}">
        </div>
        <div class="col-md-2">
            <div class="form-check mb-1">
    <input type="hidden" name="slots[{{ $timeSlot }}][{{ $index }}][is_published]" value="0">
    <input class="form-check-input" type="checkbox" name="slots[{{ $timeSlot }}][{{ $index }}][is_published]" value="1"
        {{ old("slots.$timeSlot.$index.is_published", $is_published) ? 'checked' : '' }}>
    <label class="form-check-label">Published</label>
</div>

        </div>
        <div class="col-md-1 text-end">
            <button type="button" class="btn btn-sm btn-danger" onclick="removeRateRow('{{ $timeSlot }}', {{ $index }})">&times;</button>
        </div>
    </div>
</div>
<script>
    function removeRateRow(timeSlot, index) {
        const rowId = `${timeSlot}-rate-row-${index}`;
        const row = document.getElementById(rowId);
        if (row) {
            row.remove();
        }
    }
</script>
