<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ForexRateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Morning Rates Validation
            'morning_flag.*'           => 'required|string',
            'morning_currency.*'       => 'required|string',
            'morning_unit.*'           => 'required|numeric|min:1',
            'morning_buying_rate.*'    => 'required|numeric|between:0,999999.9999',
            'morning_display_order.*'  => 'nullable|integer|min:0',
            'morning_is_published.*'   => 'required|boolean',

            // Afternoon Rates Validation
            'afternoon_flag.*'         => 'required|string',
            'afternoon_currency.*'     => 'required|string',
            'afternoon_unit.*'         => 'required|numeric|min:1',
            'afternoon_buying_rate.*'  => 'required|numeric|between:0,999999.9999',
            'afternoon_display_order.*'=> 'nullable|integer|min:0',
            'afternoon_is_published.*' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            // Morning Messages
            'morning_flag.*.required'          => 'Flag is required for morning rate',
            'morning_currency.*.required'      => 'Currency is required for morning rate',
            'morning_unit.*.required'          => 'Unit is required for morning rate',
            'morning_buying_rate.*.required'   => 'Buying rate is required for morning rate',
            'morning_is_published.*.required'  => 'Published status is required for morning rate',

            // Afternoon Messages
            'afternoon_flag.*.required'        => 'Flag is required for afternoon rate',
            'afternoon_currency.*.required'    => 'Currency is required for afternoon rate',
            'afternoon_unit.*.required'        => 'Unit is required for afternoon rate',
            'afternoon_buying_rate.*.required' => 'Buying rate is required for afternoon rate',
            'afternoon_is_published.*.required'=> 'Published status is required for afternoon rate',

            // Shared Messages
            '*.required'    => 'This field is required',
            '*.numeric'     => 'Must be a valid number',
            '*.integer'     => 'Must be a whole number',
            '*.min'         => 'Value must be at least :min',
            '*.max'         => 'Value must not exceed :max',
            '*.between'     => 'Value must be between :min and :max',
        ];
    }

    protected function prepareForValidation()
    {
        // Ensure all arrays have the same length
        $timeSlots = ['morning', 'afternoon'];

        foreach ($timeSlots as $slot) {
            $this->merge([
                "{$slot}_flag"            => $this->normalizeArray($this->input("{$slot}_flag", [])),
                "{$slot}_currency"        => $this->normalizeArray($this->input("{$slot}_currency", [])),
                "{$slot}_unit"            => $this->normalizeArray($this->input("{$slot}_unit", [])),
                "{$slot}_buying_rate"     => $this->normalizeArray($this->input("{$slot}_buying_rate", [])),
                "{$slot}_display_order"   => $this->normalizeArray($this->input("{$slot}_display_order", [])),
                "{$slot}_is_published"    => $this->normalizeArray($this->input("{$slot}_is_published", [])),
            ]);
        }
    }

    protected function normalizeArray(array $data): array
    {
        return array_values(array_filter($data, function($item) {
            return !is_null($item);
        }));
    }
}
