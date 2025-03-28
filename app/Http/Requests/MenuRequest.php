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
            'bname' => [
                'required', 
                'string', 
                'max:255',
                $this->isMethod('PUT') || $this->isMethod('PATCH')
                    ? Rule::unique('menus')->ignore($this->route('menu')->id)
                    : Rule::unique('menus')
            ],
            'description' => 'nullable|string',
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
            'bname' => 'menu name',
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
            'bname.required' => 'The menu name is required.',
            'bname.string' => 'The menu name must be a string.',
            'bname.max' => 'The menu name may not be greater than 255 characters.',
            'bname.unique' => 'This menu name is already in use.',

            'description.string' => 'The description must be a string.',

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
