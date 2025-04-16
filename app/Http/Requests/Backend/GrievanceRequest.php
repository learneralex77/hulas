<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GrievanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Only authenticated admin users can access this
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
            'is_resolved' => 'sometimes|boolean',
            'admin_remarks' => 'nullable|string|max:1000',
        ];
    }
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'mobile_number.required' => 'The mobile number field is required.',
            'city.required' => 'The city field is required.',
            'message.required' => 'The message field is required.',
        ];
    }
}
