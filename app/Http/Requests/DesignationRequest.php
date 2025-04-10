<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DesignationRequest extends FormRequest
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
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ];

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name_en'][] = Rule::unique('designations', 'name_en')
                ->ignore($this->route('designation'));
            $rules['name_np'][] = Rule::unique('designations', 'name_np')
                ->ignore($this->route('designation'));
        } else {
            $rules['name_en'][] = Rule::unique('designations', 'name_en');
            $rules['name_np'][] = Rule::unique('designations', 'name_np');
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
            'name_en' => 'English designation name',
            'name_np' => 'Nepali designation name',
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
            'name_en.required' => 'The English designation name is required.',
            'name_en.string' => 'The English designation name must be a string.',
            'name_en.max' => 'The English designation name may not be greater than 255 characters.',
            'name_en.unique' => 'A designation with this English name already exists.',

            'name_np.string' => 'The Nepali designation name must be a string.',
            'name_np.max' => 'The Nepali designation name may not be greater than 255 characters.',
            'name_np.unique' => 'A designation with this Nepali name already exists.',

            'display_order.integer' => 'The display order must be a valid number.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Boolean values need to be explicitly set since checkboxes don't send values when unchecked
        $this->merge([
            'is_published' => $this->has('is_published'),
        ]);
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
    }
}
