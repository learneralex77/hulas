<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ForexRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currencyRule = Rule::unique('forex_rates', 'currency');
        $flagRule = Rule::unique('forex_rates', 'flag');

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $currencyRule->ignore($this->route('forex_rates'));
            $flagRule->ignore($this->route('forex_rates'));
        }


        $rules = [
            'time_slot.*' => 'required|string|max:255',
            'flag.*' => ['required', 'string', 'max:255', $flagRule],
            'currency.*' => ['required', 'string', 'max:255', $currencyRule],
            'unit.*' => 'required|integer',
            'buying_rate.*' => 'required|numeric',
            'display_order.*' => 'nullable|integer',
            'is_published.*' => 'nullable|boolean',
        ];


        if ($this->input('time_slot') === 'morning') {
            $rules['buying_rate.*'] = 'required|numeric|min:10';
            $rules['flag.*'] = ['required', 'string', 'max:255', $flagRule];
            $rules['currency.*'] = ['required', 'string', 'max:255', $currencyRule];
            $rules['unit.*'] = 'required|integer';
            
        } elseif ($this->input('time_slot') === 'afternoon') {
            $rules['buying_rate.*'] = 'required|numeric|min:15';
            $rules['flag.*'] = ['required', 'string', 'max:255', $flagRule];
            $rules['currency.*'] = ['required', 'string', 'max:255', $currencyRule];
            $rules['unit.*'] = 'required|integer';
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'time_slot' => 'Time Slot',
            'flag' => 'Flag',
            'currency' => 'Currency',
            'unit' => 'Unit',
            'buying_rate' => 'Buying Rate',
            'display_order' => 'Display Order',
            'is_published' => 'Is Published',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'time_slot.*.required' => 'The time slot is required.',
            'time_slot.*.string' => 'The time slot must be a string.',
            'time_slot.*.max' => 'The time slot may not be greater than 255 characters.',

            'flag.*.required' => 'The flag is required.',
            'flag.*.string' => 'The flag must be a string.',
            'flag.*.max' => 'The flag may not be greater than 255 characters.',
            'flag.*.unique' => 'The flag must be unique.',

            'currency.*.required' => 'The currency is required.',
            'currency.*.string' => 'The currency must be a string.',
            'currency.*.max' => 'The currency may not be greater than 255 characters.',
            'currency.*.unique' => 'The currency must be unique.',

            'unit.*.required' => 'The unit is required.',
            'unit.*.integer' => 'The unit must be an integer.',

            'buying_rate.*.required' => 'The buying rate is required.',
            'buying_rate.*.numeric' => 'The buying rate must be a number.',
            'buying_rate.*.min' => 'The buying rate must be at least :min.',

            'display_order.*.integer' => 'The display order must be a valid number.',
            'is_published.*.boolean' => 'The is published field must be true or false.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_published' => $this->has('is_published'),
            'display_order' => $this->display_order ?? 0,
        ]);
    }
}
