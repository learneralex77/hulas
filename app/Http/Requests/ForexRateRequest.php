<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForexRateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',

            // Ensure the keys exist and are arrays
            'slots.morning' => 'required|array',
            'slots.morning.*.flag' => 'required|string',
            'slots.morning.*.currency' => 'required|string',
            'slots.morning.*.unit' => 'required|numeric|min:1',
            'slots.morning.*.buying_rate' => 'required|numeric|between:0,999999.9999',
            'slots.morning.*.display_order' => 'nullable|integer|min:0',
            'slots.morning.*.is_published' => 'required|boolean',

            'slots.afternoon' => 'required|array',
            'slots.afternoon.*.flag' => 'required|string',
            'slots.afternoon.*.currency' => 'required|string',
            'slots.afternoon.*.unit' => 'required|numeric|min:1',
            'slots.afternoon.*.buying_rate' => 'required|numeric|between:0,999999.9999',
            'slots.afternoon.*.display_order' => 'nullable|integer|min:0',
            'slots.afternoon.*.is_published' => 'required|boolean',
        ];
    }


    public function messages(): array
    {
        return [
            'date.required' => 'Date is required.',

            // Morning
            'slots.morning.flag.required' => 'Flag is required for morning.',
            'slots.morning.currency.required' => 'Currency is required for morning.',
            'slots.morning.unit.required' => 'Unit is required for morning.',
            'slots.morning.buying_rate.required' => 'Buying rate is required for morning.',
            'slots.morning.is_published.required' => 'Publication status is required for morning.',

            // Afternoon
            'slots.afternoon.flag.required' => 'Flag is required for afternoon.',
            'slots.afternoon.currency.required' => 'Currency is required for afternoon.',
            'slots.afternoon.unit.required' => 'Unit is required for afternoon.',
            'slots.afternoon.buying_rate.required' => 'Buying rate is required for afternoon.',
            'slots.afternoon.is_published.required' => 'Publication status is required for afternoon.',
        ];
    }
}
