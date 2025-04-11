<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
        $rules = [
            'name_en' => ['required', 'string', 'max:255'],
            'name_np' => ['nullable', 'string', 'max:255'],
            'address_en' => ['required', 'string'],
            'address_np' => ['nullable', 'string'],
            'phone_number_en' => ['required', 'string', 'max:20'],
            'phone_number_np' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'district_id' => ['required', 'exists:districts,id'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'map_iframe' => ['nullable', 'string'],
            
            // For backward compatibility
            'name' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'phone_number' => ['nullable', 'string', 'max:20'],
        ];

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name_en'][] = Rule::unique('branches', 'name_en')
                ->ignore($this->route('branch'));
            $rules['name_np'][] = Rule::unique('branches', 'name_np')
                ->ignore($this->route('branch'));
        } else {
            $rules['name_en'][] = Rule::unique('branches', 'name_en');
            $rules['name_np'][] = Rule::unique('branches', 'name_np')
                ->whereNotNull('name_np');
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name_en' => 'English branch name',
            'name_np' => 'Nepali branch name',
            'address_en' => 'English address',
            'address_np' => 'Nepali address',
            'phone_number_en' => 'English phone number',
            'phone_number_np' => 'Nepali phone number',
            'email' => 'email address',
            'district_id' => 'district',
            'display_order' => 'display order',
            'is_published' => 'published status',
            'map_iframe' => 'Google map iframe',
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
            'name_en.required' => 'The English branch name is required.',
            'name_en.string' => 'The English branch name must be a string.',
            'name_en.max' => 'The English branch name may not be greater than 255 characters.',
            'name_en.unique' => 'A branch with this English name already exists.',
            
            'name_np.string' => 'The Nepali branch name must be a string.',
            'name_np.max' => 'The Nepali branch name may not be greater than 255 characters.',
            'name_np.unique' => 'A branch with this Nepali name already exists.',
            
            'address_en.required' => 'The English address is required.',
            'address_en.string' => 'The English address must be a string.',
            
            'address_np.string' => 'The Nepali address must be a string.',
            
            'phone_number_en.required' => 'The English phone number is required.',
            'phone_number_en.string' => 'The English phone number must be a string.',
            'phone_number_en.max' => 'The English phone number may not be greater than 20 characters.',
            
            'phone_number_np.string' => 'The Nepali phone number must be a string.',
            'phone_number_np.max' => 'The Nepali phone number may not be greater than 20 characters.',
            
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district does not exist.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'map_iframe.string' => 'The Google map iframe must be a string.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Set boolean values correctly
        $this->merge([
            'is_published' => $this->has('is_published'),
        ]);
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
        
        // For backward compatibility - map 'name' to 'name_en'
        if ($this->has('name') && !$this->has('name_en')) {
            $this->merge([
                'name_en' => $this->name,
            ]);
        }
        
        // For backward compatibility - map 'address' to 'address_en'
        if ($this->has('address') && !$this->has('address_en')) {
            $this->merge([
                'address_en' => $this->address,
            ]);
        }
        
        // Handle phone for backward compatibility
        if ($this->has('phone') && !$this->has('phone_number_en')) {
            $this->merge([
                'phone_number_en' => $this->phone,
            ]);
        }
        
        // For backward compatibility - map 'phone_number' to 'phone_number_en'
        if ($this->has('phone_number') && !$this->has('phone_number_en')) {
            $this->merge([
                'phone_number_en' => $this->phone_number,
            ]);
        }
    }

    /**
     * Get data to be validated from the request.
     */
    public function validationData()
    {
        $data = parent::validationData();
        
        // Ensure phone_number is included in validated data
        if (isset($data['phone'])) {
            $data['phone_number'] = $data['phone'];
        }
        
        return $data;
    }
}
