<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
            'names' => ['required', 'array', 'min:1'],
            'names.0' => ['required', 'string', 'max:255', 'filled'],
            'names.*' => ['required', 'string', 'max:255'],
            'icons.*' => ['nullable', 'string', 'max:255'],
            'descriptions.*' => ['nullable', 'string'],
            'display_order' => ['required', 'integer', 'min:0'],
            'is_published' => ['boolean'],
            'file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
        ];

        // Check that the slug generated from the first name would be unique
        if ($this->has('names.0') && !empty(trim($this->input('names.0')))) {
            $slug = Str::slug($this->input('names.0'));
            
            if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
                $serviceId = $this->route('service')->id;
                
                $rules['names.0'][] = Rule::unique('services', 'slug')
                    ->where(function ($query) use ($slug) {
                        return $query->where('slug', $slug);
                    })
                    ->ignore($serviceId);
            } else {
                $rules['names.0'][] = Rule::unique('services', 'slug')
                    ->where(function ($query) use ($slug) {
                        return $query->where('slug', $slug);
                    });
            }
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
            'names.*' => 'service name',
            'icons.*' => 'icon',
            'descriptions.*' => 'description',
            'display_order' => 'display order',
            'is_published' => 'published status',
            'file' => 'file',
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
            'names.required' => 'At least one service name is required.',
            'names.min' => 'At least one service name is required.',
            'names.0.required' => 'The first service name is required.',
            'names.0.filled' => 'The first service name cannot be empty.',
            'names.*.required' => 'The service name is required.',
            'names.*.string' => 'The service name must be a string.',
            'names.*.max' => 'The service name may not be greater than 255 characters.',
            'names.0.unique' => 'A service with this name already exists.',
            
            'icons.*.string' => 'The icon must be a string.',
            'icons.*.max' => 'The icon may not be greater than 255 characters.',
            
            'descriptions.*.string' => 'The description must be a string.',
            
            'display_order.required' => 'The display order is required.',
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be one of the following types: JPEG, PNG, JPG, GIF, SVG, PDF.',
            'file.max' => 'The file may not be greater than 2MB.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Boolean values need to be explicitly set since checkboxes don't send values when unchecked
        $this->merge([
            'is_published' => $this->input('is_published') == 1,
        ]);
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Check if the first name is empty or just whitespace
            if (empty($this->input('names')) || 
                !isset($this->input('names')[0]) || 
                trim($this->input('names')[0]) === '') {
                $validator->errors()->add('names.0', 'The first service name is required and cannot be empty.');
            }
        });
    }
}
