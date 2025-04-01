<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DistrictRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ];

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name'][] = Rule::unique('districts', 'name')
                ->ignore($this->route('district'));
        } else {
            $rules['name'][] = Rule::unique('districts', 'name');
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
            'name' => 'district name',
            'display_order' => 'display order',
            'is_published' => 'published status',
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
            'name.required' => 'The district name is required.',
            'name.string' => 'The district name must be a string.',
            'name.max' => 'The district name may not be greater than 255 characters.',
            'name.unique' => 'A district with this name already exists.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Set boolean values correctly
        $this->merge([
            'is_published' => $this->boolean('is_published'),
        ]);
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
    }
}
