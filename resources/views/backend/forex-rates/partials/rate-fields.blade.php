{{-- resources/views/backend/forex-rates/partials/rate-fields.blade.php --}}

<tr>
    <td>
        <input type="date" name="{{ $timeSlot }}_date[]" class="form-control form-control-sm"
            value="{{ $rate->date ?? old("{$timeSlot}_date.{$index}") }}" required>
    </td>

    <td>
        <input type="text" name="{{ $timeSlot }}_flag[]" class="form-control form-control-sm"
            value="{{ $rate->flag ?? old("{$timeSlot}_flag.{$index}") }}" required>
    </td>
    <td>
        <input type="text" name="{{ $timeSlot }}_currency[]" class="form-control form-control-sm"
            value="{{ $rate->currency ?? old("{$timeSlot}_currency.{$index}") }}" required>
    </td>
    <td>
        <input type="number" name="{{ $timeSlot }}_unit[]" class="form-control form-control-sm"
            value="{{ $rate->unit ?? old("{$timeSlot}_unit.{$index}") }}" required>
    </td>
    <td>
        <input type="number" step="0.0001" name="{{ $timeSlot }}_buying_rate[]"
            class="form-control form-control-sm"
            value="{{ $rate->buying_rate ?? old("{$timeSlot}_buying_rate.{$index}") }}" required>
    </td>
    <td>
        <input type="number" name="{{ $timeSlot }}_display_order[]" class="form-control form-control-sm"
            value="{{ $rate->display_order ?? old("{$timeSlot}_display_order.{$index}") }}">
    </td>
    <td>
        <select name="{{ $timeSlot }}_is_published[]" class="form-select form-select-sm">
            <option value="1" {{ isset($rate) && $rate->is_published ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ isset($rate) && !$rate->is_published ? 'selected' : '' }}>No</option>
        </select>
    </td>
    <td>
        <button class="btn btn-sm btn-alt-danger remove-rate">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
