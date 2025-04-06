<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentDetailRequest extends FormRequest
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
        return [
            'district_id' => ['required', 'exists:districts,id'],
            'state_agent_name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'contact_no' => ['nullable', 'string', 'max:20'],
            'contact_person' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'district_id' => 'district',
            'state_agent_name' => 'state agent name',
            'address' => 'address',
            'contact_no' => 'contact number',
            'contact_person' => 'contact person',
            'display_order' => 'display order',
            'is_published' => 'status',
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
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district does not exist.',
            
            'state_agent_name.required' => 'State agent name is required.',
            'state_agent_name.string' => 'State agent name must be a string.',
            'state_agent_name.max' => 'State agent name may not be greater than 255 characters.',
            
            'address.string' => 'Address must be text.',
            'address.max' => 'Address may not be greater than 255 characters.',
            
            'contact_no.string' => 'Contact number must be text.',
            'contact_no.max' => 'Contact number may not be greater than 20 characters.',
            
            'contact_person.string' => 'Contact person must be text.',
            'contact_person.max' => 'Contact person may not be greater than 255 characters.',
            
            'display_order.integer' => 'The display order must be an integer.',
            'display_order.min' => 'The display order must be at least 0.',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // Set default values
        $this->merge([
            'display_order' => $this->input('display_order', 0),
            'is_published' => $this->has('is_published'),
        ]);
    }
}
