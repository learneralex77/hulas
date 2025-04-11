<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuickLinkRequest extends FormRequest
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
            'name_en' => ['required', 'string', 'max:255', Rule::unique('quick_links', 'name_en')->ignore($this->route('quick_link'))],
            'name_np' => ['nullable', 'string', 'max:255', Rule::unique('quick_links', 'name_np')->ignore($this->route('quick_link'))],
            'external_link' => ['required', 'url', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
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
            'name_en' => 'English name',
            'name_np' => 'Nepali name',
            'external_link' => 'external link',
            'display_order' => 'display order',
            'is_published' => 'published status',
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
            'name_en.required' => 'The English name is required.',
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be greater than 255 characters.',
            'name_en.unique' => 'This English name is already in use.',

            'name_np.string' => 'The Nepali name must be a string.',
            'name_np.max' => 'The Nepali name may not be greater than 255 characters.',
            'name_np.unique' => 'This Nepali name is already in use.',

            'external_link.required' => 'The external link is required.',
            'external_link.url' => 'Please provide a valid URL.',
            'external_link.max' => 'The URL may not be greater than 255 characters.',

            'display_order.integer' => 'The display order must be a valid number.',
            'display_order.min' => 'The display order must be at least 0.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert checkbox value to boolean
        if ($this->has('is_published')) {
            $this->merge([
                'is_published' => filter_var($this->is_published, FILTER_VALIDATE_BOOLEAN),
            ]);
        } else {
            $this->merge(['is_published' => false]);
        }
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
    }
}
