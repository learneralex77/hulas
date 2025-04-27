<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsEventCategoryRequest extends FormRequest
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
        // Check if update request
        $isUpdateRequest = in_array($this->method(), ['PUT', 'PATCH']);
        $key = $isUpdateRequest ? $this->route('news_event_category')->id : null;

        $rules = [
            'name_en' => [
                'required',
                'string',
                'max:255',
                Rule::unique('news_event_categories', 'name_en')->ignore($key),
            ],
            'name_np' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('news_event_categories', 'name_np')->ignore($key),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('news_event_categories', 'slug')->ignore($key),
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
            ],
            'description_en' => ['nullable', 'string'],
            'description_np' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ];

        // For backward compatibility
        if ($this->has('name') && !$this->has('name_en')) {
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('news_event_categories')->ignore($key),
            ];
        }

        if ($this->has('description') && !$this->has('description_en')) {
            $rules['description'] = ['nullable', 'string'];
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
            'name_en' => 'English Name',
            'name_np' => 'Nepali Name',
            'slug' => 'Slug',
            'image' => 'Image',
            'description_en' => 'English Description',
            'description_np' => 'Nepali Description',
            'display_order' => 'Display Order',
            'is_published' => 'Published Status',
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
            'name_en.required' => 'The English name field is required.',
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be greater than 255 characters.',
            'name_en.unique' => 'A category with this English name already exists.',
            
            'name_np.string' => 'The Nepali name must be a string.',
            'name_np.max' => 'The Nepali name may not be greater than 255 characters.',
            'name_np.unique' => 'A category with this Nepali name already exists.',
            
            'slug.string' => 'The slug must be a string.',
            'slug.max' => 'The slug may not be greater than 255 characters.',
            'slug.unique' => 'This slug is already in use.',
            
            'image.image' => 'The file must be a valid image.',
            'image.mimes' => 'The image must be a valid format (jpeg, png, jpg, gif, webp).',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert boolean string to actual boolean
        if ($this->has('is_published')) {
            $this->merge([
                'is_published' => $this->is_published == '1' || $this->is_published === true || $this->is_published === 'true',
            ]);
        }

        // Set display order to 0 if it's empty
        if ($this->has('display_order') && $this->display_order === '') {
            $this->merge([
                'display_order' => 0,
            ]);
        }

        // For backward compatibility - map 'name' to 'name_en' if name_en is not provided
        if ($this->has('name') && !$this->has('name_en')) {
            $this->merge([
                'name_en' => $this->name,
            ]);
        }

        // For backward compatibility - map 'description' to 'description_en' if description_en is not provided
        if ($this->has('description') && !$this->has('description_en')) {
            $this->merge([
                'description_en' => $this->description,
            ]);
        }
    }
}
