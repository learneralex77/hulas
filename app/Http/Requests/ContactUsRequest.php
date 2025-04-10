<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'full_name_en' => ['required', 'string', 'max:255'],
            'full_name_np' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number_en' => ['required', 'string', 'max:20'],
            'phone_number_np' => ['nullable', 'string', 'max:20'],
            'contact_remarks_en' => ['nullable', 'string'],
            'contact_remarks_np' => ['nullable', 'string'],
            'is_contacted' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            
            // For backward compatibility
            'full_name' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'contact_remarks' => ['nullable', 'string'],
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
            'full_name_en' => 'English full name',
            'full_name_np' => 'Nepali full name',
            'email' => 'email address',
            'phone_number_en' => 'English phone number',
            'phone_number_np' => 'Nepali phone number',
            'contact_remarks_en' => 'English contact remarks',
            'contact_remarks_np' => 'Nepali contact remarks',
            'is_contacted' => 'contacted status',
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
            'full_name_en.required' => 'The English full name is required.',
            'full_name_en.string' => 'The English full name must be a string.',
            'full_name_en.max' => 'The English full name may not be greater than 255 characters.',
            
            'full_name_np.string' => 'The Nepali full name must be a string.',
            'full_name_np.max' => 'The Nepali full name may not be greater than 255 characters.',
            
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            
            'phone_number_en.required' => 'The English phone number is required.',
            'phone_number_en.string' => 'The English phone number must be a string.',
            'phone_number_en.max' => 'The English phone number may not be greater than 20 characters.',
            
            'phone_number_np.string' => 'The Nepali phone number must be a string.',
            'phone_number_np.max' => 'The Nepali phone number may not be greater than 20 characters.',
            
            'contact_remarks_en.string' => 'The English contact remarks must be a string.',
            'contact_remarks_np.string' => 'The Nepali contact remarks must be a string.',
            
            'display_order.integer' => 'The display order must be an integer.',
            'display_order.min' => 'The display order must be at least 0.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Set boolean values correctly based on input value
        $this->merge([
            'is_contacted' => $this->input('is_contacted') == 1,
        ]);
        
        // For backward compatibility - map 'full_name' to 'full_name_en' if full_name_en is not provided
        if ($this->has('full_name') && !$this->has('full_name_en')) {
            $this->merge([
                'full_name_en' => $this->full_name,
            ]);
        }
        
        // For backward compatibility - map 'phone_number' to 'phone_number_en'
        if ($this->has('phone_number') && !$this->has('phone_number_en')) {
            $this->merge([
                'phone_number_en' => $this->phone_number,
            ]);
        }
        
        // For backward compatibility - map 'contact_remarks' to 'contact_remarks_en'
        if ($this->has('contact_remarks') && !$this->has('contact_remarks_en')) {
            $this->merge([
                'contact_remarks_en' => $this->contact_remarks,
            ]);
        }
    }
}
