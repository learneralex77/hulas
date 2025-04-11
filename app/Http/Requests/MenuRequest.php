<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow all authenticated users to access menu operations
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
            'name_en' => ['required', 'string', 'max:255', Rule::unique('menus', 'name_en')->ignore($this->menu)],
            'name_np' => ['nullable', 'string', 'max:255', Rule::unique('menus', 'name_np')->ignore($this->menu)],
            'description_en' => 'nullable|string',
            'description_np' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'is_published' => 'required|boolean',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $menuId = $this->route('menu')->id;
            $rules['parent_id'] = [
                'nullable',
                Rule::exists('menus', 'id'),
                Rule::when($this->parent_id, Rule::notIn([$menuId])),
            ];
        } else {
            $rules['parent_id'] = ['nullable', Rule::exists('menus', 'id')];
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
            'name_en' => 'menu name (English)',
            'name_np' => 'menu name (Nepali)',
            'description_en' => 'description (English)',
            'description_np' => 'description (Nepali)',
            'display_order' => 'display order',
            'parent_id' => 'parent menu',
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
            'name_en.required' => 'The menu name in English is required.',
            'name_en.string' => 'The menu name in English must be a string.',
            'name_en.max' => 'The menu name in English may not be greater than 255 characters.',
            'name_en.unique' => 'This menu name in English is already in use.',

            'name_np.string' => 'The menu name in Nepali must be a string.',
            'name_np.max' => 'The menu name in Nepali may not be greater than 255 characters.',
            'name_np.unique' => 'This menu name in Nepali is already in use.',

            'description_en.string' => 'The description in English must be a string.',
            'description_np.string' => 'The description in Nepali must be a string.',

            'display_order.integer' => 'The display order must be a valid number.',
            'display_order.min' => 'The display order must be at least 0.',

            'parent_id.exists' => 'The selected parent menu does not exist.',
            'parent_id.not_in' => 'A menu cannot be its own parent.',

            'is_published.required' => 'The menu status is required.',
            'is_published.boolean' => 'The menu status must be either published or unpublished.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('is_published')) {
            $this->merge([
                'is_published' => filter_var($this->is_published, FILTER_VALIDATE_BOOLEAN),
            ]);
        } else {
            $this->merge(['is_published' => false]);
        }

        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
    }
}
