<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]*$/'],
            'email' => ['required', 'email', 'max:255'],
            'district_id' => ['required', 'exists:districts,id'],
            'address' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'is_processed' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer', 'min:0'],
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
            'name' => 'full name',
            'number' => 'phone number',
            'email' => 'email address',
            'district_id' => 'district',
            'address' => 'address',
            'message' => 'message',
            'is_processed' => 'processed status',
            'display_order' => 'display order',
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
            'name.required' => 'The full name is required.',
            'name.string' => 'The full name must be a string.',
            'name.max' => 'The full name may not be greater than 255 characters.',
            
            'number.required' => 'The phone number is required.',
            'number.string' => 'The phone number must be a string.',
            'number.max' => 'The phone number may not be greater than 20 characters.',
            'number.regex' => 'The phone number format is invalid. Please use only numbers, spaces, and these characters: + - ( )',
            
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district does not exist.',
            
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',
            
            'message.string' => 'The message must be a string.',
            'display_order.integer' => 'The display order must be an integer.',
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
            'is_processed' => $this->has('is_processed'),
        ]);
    }
}
