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
            'name_en' => ['required', 'string', 'max:255'],
            'name_np' => ['nullable', 'string', 'max:255'],
            'number_en' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]*$/'],
            'number_np' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'district_id' => ['required', 'exists:districts,id'],
            'address_en' => ['required', 'string', 'max:255'],
            'address_np' => ['nullable', 'string', 'max:255'],
            'message_en' => ['nullable', 'string'],
            'message_np' => ['nullable', 'string'],
            'is_processed' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            
            // For backward compatibility
            'name' => ['nullable', 'string', 'max:255'],
            'number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
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
            'name_en' => 'English full name',
            'name_np' => 'Nepali full name',
            'number_en' => 'English phone number',
            'number_np' => 'Nepali phone number',
            'email' => 'email address',
            'district_id' => 'district',
            'address_en' => 'English address',
            'address_np' => 'Nepali address',
            'message_en' => 'English message',
            'message_np' => 'Nepali message',
            'is_processed' => 'status',
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
            'name_en.required' => 'The English full name is required.',
            'name_en.string' => 'The English full name must be a string.',
            'name_en.max' => 'The English full name may not be greater than 255 characters.',
            
            'name_np.string' => 'The Nepali full name must be a string.',
            'name_np.max' => 'The Nepali full name may not be greater than 255 characters.',
            
            'number_en.required' => 'The English phone number is required.',
            'number_en.string' => 'The English phone number must be a string.',
            'number_en.max' => 'The English phone number may not be greater than 20 characters.',
            'number_en.regex' => 'The English phone number format is invalid. Please use only numbers, spaces, and these characters: + - ( )',
            
            'number_np.string' => 'The Nepali phone number must be a string.',
            'number_np.max' => 'The Nepali phone number may not be greater than 20 characters.',
            
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district does not exist.',
            
            'address_en.required' => 'The English address is required.',
            'address_en.string' => 'The English address must be a string.',
            'address_en.max' => 'The English address may not be greater than 255 characters.',
            
            'address_np.string' => 'The Nepali address must be a string.',
            'address_np.max' => 'The Nepali address may not be greater than 255 characters.',
            
            'message_en.string' => 'The English message must be a string.',
            'message_np.string' => 'The Nepali message must be a string.',
            
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
            'is_processed' => $this->boolean('is_processed'),
        ]);
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
        
        // For backward compatibility - map 'name' to 'name_en' if name_en is not provided
        if ($this->has('name') && !$this->has('name_en')) {
            $this->merge([
                'name_en' => $this->name,
            ]);
        }
        
        // For backward compatibility - map 'number' to 'number_en'
        if ($this->has('number') && !$this->has('number_en')) {
            $this->merge([
                'number_en' => $this->number,
            ]);
        }
        
        // For backward compatibility - map 'address' to 'address_en'
        if ($this->has('address') && !$this->has('address_en')) {
            $this->merge([
                'address_en' => $this->address,
            ]);
        }
        
        // For backward compatibility - map 'message' to 'message_en'
        if ($this->has('message') && !$this->has('message_en')) {
            $this->merge([
                'message_en' => $this->message,
            ]);
        }
    }
}
