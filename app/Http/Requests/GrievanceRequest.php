<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrievanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Anyone can submit a grievance
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
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'full name',
            'mobile_number' => 'mobile number',
            'city' => 'city',
            'message' => 'message',
            'is_resolved' => 'resolution status',
            'admin_remarks' => 'admin remarks',
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
            'name.required' => 'Please provide your full name.',
            'mobile_number.required' => 'Please provide your mobile number.',
            'city.required' => 'Please provide your city.',
            'message.required' => 'Please write your message or complaint.',
            'message.max' => 'Your message cannot exceed 1000 characters.',
        ];
    }
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // Handle boolean conversion for is_resolved
        if ($this->has('is_resolved')) {
            $this->merge([
                'is_resolved' => $this->input('is_resolved') === '1' || $this->input('is_resolved') === true,
            ]);
        }
    }
} 