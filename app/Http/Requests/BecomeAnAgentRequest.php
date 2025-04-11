<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecomeAnAgentRequest extends FormRequest
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
            'contact_number' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'district' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string'],
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
            'name' => 'name',
            'contact_number' => 'contact number',
            'email' => 'email address',
            'district' => 'district',
            'message' => 'message',
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
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name must be text.',
            'name.max' => 'Name may not be greater than 255 characters.',
            
            'contact_number.required' => 'Please enter your contact number.',
            'contact_number.string' => 'Contact number must be text.',
            'contact_number.max' => 'Contact number may not be greater than 20 characters.',
            
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email may not be greater than 255 characters.',
            
            'district.required' => 'Please enter your district.',
            'district.string' => 'District must be text.',
            'district.max' => 'District may not be greater than 100 characters.',
            
            'message.required' => 'Please enter your message.',
            'message.string' => 'Message must be text.',
        ];
    }
}
