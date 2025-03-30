<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:20'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'district_id' => ['required', 'exists:districts,id'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'map_iframe' => ['nullable', 'string'],
        ];

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name'][] = Rule::unique('branches', 'name')
                ->ignore($this->route('branch'));
        } else {
            $rules['name'][] = Rule::unique('branches', 'name');
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
            'name' => 'branch name',
            'address' => 'address',
            'phone' => 'phone number',
            'phone_number' => 'phone number',
            'email' => 'email address',
            'district_id' => 'district',
            'display_order' => 'display order',
            'is_published' => 'published status',
            'map_iframe' => 'Google map iframe',
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
            'name.required' => 'The branch name is required.',
            'name.string' => 'The branch name must be a string.',
            'name.max' => 'The branch name may not be greater than 255 characters.',
            'name.unique' => 'A branch with this name already exists.',
            
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a string.',
            
            'phone.required' => 'The phone number is required.',
            'phone.string' => 'The phone number must be a string.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',
            
            'phone_number.string' => 'The phone number must be a string.',
            'phone_number.max' => 'The phone number may not be greater than 20 characters.',
            
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district does not exist.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'map_iframe.string' => 'The Google map iframe must be a string.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Set boolean values correctly
        $this->merge([
            'is_published' => $this->has('is_published'),
        ]);
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
        
        // Map phone to phone_number for database compatibility
        if ($this->has('phone')) {
            $this->merge([
                'phone_number' => $this->phone
            ]);
        }
    }

    /**
     * Get data to be validated from the request.
     */
    public function validationData()
    {
        $data = parent::validationData();
        
        // Ensure phone_number is included in validated data
        if (isset($data['phone'])) {
            $data['phone_number'] = $data['phone'];
        }
        
        return $data;
    }
}
