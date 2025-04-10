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
            'state_agent_name_en' => ['required', 'string', 'max:255'],
            'state_agent_name_np' => ['nullable', 'string', 'max:255'],
            'address_en' => ['nullable', 'string', 'max:255'],
            'address_np' => ['nullable', 'string', 'max:255'],
            'contact_no_en' => ['nullable', 'string', 'max:20'],
            'contact_no_np' => ['nullable', 'string', 'max:20'],
            'contact_person_en' => ['nullable', 'string', 'max:255'],
            'contact_person_np' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            
            // For backward compatibility
            'state_agent_name' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'contact_no' => ['nullable', 'string', 'max:20'],
            'contact_person' => ['nullable', 'string', 'max:255'],
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
            'state_agent_name_en' => 'state agent name (English)',
            'state_agent_name_np' => 'state agent name (Nepali)',
            'address_en' => 'address (English)',
            'address_np' => 'address (Nepali)',
            'contact_no_en' => 'contact number (English)',
            'contact_no_np' => 'contact number (Nepali)',
            'contact_person_en' => 'contact person (English)',
            'contact_person_np' => 'contact person (Nepali)',
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
            
            'state_agent_name_en.required' => 'State agent name (English) is required.',
            'state_agent_name_en.string' => 'State agent name (English) must be a string.',
            'state_agent_name_en.max' => 'State agent name (English) may not be greater than 255 characters.',
            
            'state_agent_name_np.string' => 'State agent name (Nepali) must be a string.',
            'state_agent_name_np.max' => 'State agent name (Nepali) may not be greater than 255 characters.',
            
            'address_en.string' => 'Address (English) must be text.',
            'address_en.max' => 'Address (English) may not be greater than 255 characters.',
            
            'address_np.string' => 'Address (Nepali) must be text.',
            'address_np.max' => 'Address (Nepali) may not be greater than 255 characters.',
            
            'contact_no_en.string' => 'Contact number (English) must be text.',
            'contact_no_en.max' => 'Contact number (English) may not be greater than 20 characters.',
            
            'contact_no_np.string' => 'Contact number (Nepali) must be text.',
            'contact_no_np.max' => 'Contact number (Nepali) may not be greater than 20 characters.',
            
            'contact_person_en.string' => 'Contact person (English) must be text.',
            'contact_person_en.max' => 'Contact person (English) may not be greater than 255 characters.',
            
            'contact_person_np.string' => 'Contact person (Nepali) must be text.',
            'contact_person_np.max' => 'Contact person (Nepali) may not be greater than 255 characters.',
            
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
        
        // For backward compatibility - map legacy fields to new ones
        if ($this->has('state_agent_name') && !$this->has('state_agent_name_en')) {
            $this->merge([
                'state_agent_name_en' => $this->state_agent_name,
            ]);
        }
        
        if ($this->has('address') && !$this->has('address_en')) {
            $this->merge([
                'address_en' => $this->address,
            ]);
        }
        
        if ($this->has('contact_no') && !$this->has('contact_no_en')) {
            $this->merge([
                'contact_no_en' => $this->contact_no,
            ]);
        }
        
        if ($this->has('contact_person') && !$this->has('contact_person_en')) {
            $this->merge([
                'contact_person_en' => $this->contact_person,
            ]);
        }
    }
}
