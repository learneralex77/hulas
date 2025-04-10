<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DistrictRequest extends FormRequest
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
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            // For backward compatibility
            'name' => ['nullable', 'string', 'max:255'],
        ];

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name_en'][] = Rule::unique('districts', 'name_en')
                ->ignore($this->route('district'));
            $rules['name_np'][] = Rule::unique('districts', 'name_np')
                ->ignore($this->route('district'));
        } else {
            $rules['name_en'][] = Rule::unique('districts', 'name_en');
            $rules['name_np'][] = Rule::unique('districts', 'name_np')
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
            'name_en' => 'English district name',
            'name_np' => 'Nepali district name',
            'display_order' => 'display order',
            'is_published' => 'published status',
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
            'name_en.required' => 'The English district name is required.',
            'name_en.string' => 'The English district name must be a string.',
            'name_en.max' => 'The English district name may not be greater than 255 characters.',
            'name_en.unique' => 'A district with this English name already exists.',
            
            'name_np.string' => 'The Nepali district name must be a string.',
            'name_np.max' => 'The Nepali district name may not be greater than 255 characters.',
            'name_np.unique' => 'A district with this Nepali name already exists.',
            
            'display_order.integer' => 'The display order must be a number.',
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
            'is_published' => $this->boolean('is_published'),
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
    }
}
