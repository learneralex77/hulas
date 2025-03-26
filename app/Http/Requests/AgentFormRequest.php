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
            'number' => ['required', 'string', 'max:20'],
            'district_id' => ['required', 'exists:districts,id'],
            'message' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
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
            'district_id' => 'district',
            'message' => 'message',
            'address' => 'address',
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
            
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district does not exist.',
            
            'message.string' => 'The message must be a string.',
            
            'address.string' => 'The address must be a string.',
        ];
    }
}
