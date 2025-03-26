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
            'state_agent_names.*' => ['required', 'string', 'max:255'],
            'addresses.*' => ['nullable', 'string'],
            'contact_nos.*' => ['nullable', 'string', 'max:20'],
            'contact_persons.*' => ['nullable', 'string', 'max:255'],
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
            'state_agent_names.*' => 'state agent name',
            'addresses.*' => 'address',
            'contact_nos.*' => 'contact number',
            'contact_persons.*' => 'contact person',
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
            
            'state_agent_names.*.required' => 'Each state agent name is required.',
            'state_agent_names.*.string' => 'State agent names must be a string.',
            'state_agent_names.*.max' => 'State agent names may not be greater than 255 characters.',
            
            'addresses.*.string' => 'Addresses must be text.',
            
            'contact_nos.*.string' => 'Contact numbers must be text.',
            'contact_nos.*.max' => 'Contact numbers may not be greater than 20 characters.',
            
            'contact_persons.*.string' => 'Contact persons must be text.',
            'contact_persons.*.max' => 'Contact persons may not be greater than 255 characters.',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // Ensure we have arrays for all fields, even if they're empty
        $this->merge([
            'state_agent_names' => $this->input('state_agent_names', []),
            'addresses' => $this->input('addresses', []),
            'contact_nos' => $this->input('contact_nos', []),
            'contact_persons' => $this->input('contact_persons', []),
        ]);
    }
}
