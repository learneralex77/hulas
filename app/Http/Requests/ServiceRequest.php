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
            // Direct service fields
            'name_en' => ['required', 'string', 'max:255'],
            'name_np' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_np' => ['nullable', 'string'],
            'display_order' => ['required', 'integer', 'min:0'],
            'is_published' => ['boolean'],
            'file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf,webp'],
            
            // Translation arrays
            'names' => ['required', 'array', 'min:1'],
            'names.*' => ['required', 'string', 'max:255'],
            'icons.*' => ['nullable'],
            'descriptions.*' => ['nullable', 'string'],
            'external_links.*' => ['nullable', 'url', 'max:255'],
        ];

        // Check that the slug generated from the first name would be unique
        if ($this->has('name_en') && !empty(trim($this->input('name_en')))) {
            $slug = Str::slug($this->input('name_en'));
            
            if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
                $serviceId = $this->route('service')->id;
                
                $rules['name_en'][] = Rule::unique('services', 'slug')
                    ->where(function ($query) use ($slug) {
                        return $query->where('slug', $slug);
                    })
                    ->ignore($serviceId);
            } else {
                $rules['name_en'][] = Rule::unique('services', 'slug')
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
            'name_en' => 'English name',
            'name_np' => 'Nepali name',
            'icon' => 'service icon',
            'description_en' => 'English description',
            'description_np' => 'Nepali description',
            'names.*' => 'service detail name',
            'icons.*' => 'service detail icon',
            'descriptions.*' => 'service detail description',
            'external_links.*' => 'external link',
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
            'name_en.required' => 'The English name is required.',
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be greater than 255 characters.',
            'name_en.unique' => 'A service with this name already exists.',
            
            'name_np.string' => 'The Nepali name must be a string.',
            'name_np.max' => 'The Nepali name may not be greater than 255 characters.',
            
            'icon.string' => 'The icon must be a string.',
            'icon.max' => 'The icon may not be greater than 255 characters.',
            
            'description_en.string' => 'The English description must be a string.',
            'description_np.string' => 'The Nepali description must be a string.',
            
            'names.required' => 'At least one service detail name is required.',
            'names.min' => 'At least one service detail name is required.',
            'names.*.required' => 'The service detail name is required.',
            'names.*.string' => 'The service detail name must be a string.',
            'names.*.max' => 'The service detail name may not be greater than 255 characters.',
            
            'icons.*.string' => 'The icon must be a string.',
            'icons.*.max' => 'The icon may not be greater than 255 characters.',
            
            'icons.*.file' => 'The icon file must be a valid file.',
            'icons.*.mimes' => 'The icon file must be one of the following types: JPEG, PNG, JPG, GIF, SVG, WebP.',
            
            'descriptions.*.string' => 'The description must be a string.',
            
            'external_links.*.url' => 'The external link must be a valid URL (e.g., https://example.com).',
            'external_links.*.max' => 'The external link may not be greater than 255 characters.',
            
            'display_order.required' => 'The display order is required.',
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be one of the following types: JPEG, PNG, JPG, GIF, SVG, PDF, WebP.',
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

        // Note: Don't store the file here, as it should be stored after validation
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
