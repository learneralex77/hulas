<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow all authenticated users to access page operations
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
            'title_en' => ['required', 'string', 'max:255'],
            'title_np' => ['nullable', 'string', 'max:255'],
            'content_en' => ['required', 'string'],
            'content_np' => ['nullable', 'string'],
            'menu_id' => ['required', 'exists:menus,id'],
            'short_description_en' => ['nullable', 'string', 'max:500'],
            'short_description_np' => ['nullable', 'string', 'max:500'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'delete_image' => ['nullable', 'boolean'],
        ];
        
        // Add image validation only if the file is being uploaded
        if ($this->hasFile('image')) {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
        }

        // For update operations, add unique slug check
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $pageId = $this->route('page')->id;
            
            // If the title has changed, check for slug uniqueness
            if ($this->has('title_en') && $this->title_en !== $this->route('page')->title_en) {
                $rules['title_en'][] = Rule::unique('pages', 'slug')
                    ->where(function ($query) {
                        return $query->where('slug', Str::slug($this->title_en));
                    })
                    ->ignore($pageId);
            }
        } else {
            // For new pages, check that the slug would be unique
            $rules['title_en'][] = Rule::unique('pages', 'slug')
                ->where(function ($query) {
                    return $query->where('slug', Str::slug($this->title_en));
                });
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
            'title_en' => 'page title (English)',
            'title_np' => 'page title (Nepali)',
            'content_en' => 'page content (English)',
            'content_np' => 'page content (Nepali)',
            'menu_id' => 'menu',
            'short_description_en' => 'short description (English)',
            'short_description_np' => 'short description (Nepali)',
            'image' => 'page image',
            'delete_image' => 'delete image option',
            'display_order' => 'display order',
            'is_published' => 'publication status',
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
            'title_en.required' => 'The page title (English) is required.',
            'title_en.string' => 'The page title (English) must be a string.',
            'title_en.max' => 'The page title (English) may not be greater than 255 characters.',
            'title_en.unique' => 'This page title (English) would create a duplicate slug. Please use a different title.',

            'title_np.string' => 'The page title (Nepali) must be a string.',
            'title_np.max' => 'The page title (Nepali) may not be greater than 255 characters.',

            'content_en.required' => 'The page content (English) is required.',
            'content_en.string' => 'The page content (English) must be a string.',

            'content_np.string' => 'The page content (Nepali) must be a string.',

            'menu_id.required' => 'Please select a menu for this page.',
            'menu_id.exists' => 'The selected menu does not exist.',

            'short_description_en.string' => 'The short description (English) must be a string.',
            'short_description_en.max' => 'The short description (English) may not be greater than 500 characters.',

            'short_description_np.string' => 'The short description (Nepali) must be a string.',
            'short_description_np.max' => 'The short description (Nepali) may not be greater than 500 characters.',

            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image may not be greater than 2MB.',
            
            'delete_image.boolean' => 'The delete image option must be a boolean value.',
            
            'display_order.integer' => 'The display order must be an integer value.',
            'display_order.min' => 'The display order must be a positive number.',
            'is_published.boolean' => 'The publication status must be a boolean value.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // No automatic data preparation needed for this request
    }

    /**
     * Handle the validation after it passes.
     */
    public function validated($key = null, $default = null)
    {
        // For Laravel 9+, handle $key parameter
        if ($key !== null) {
            return parent::validated($key, $default);
        }
        
        // Get all validated data
        $validated = parent::validated();
        
        // Keep the image in the validated data - it will be processed in the controller
        
        return $validated;
    }

    /**
     * Custom validation method that safely excludes file uploads - no longer needed
     * as we're handling file uploads properly in the controller
     */
    public function safeValidated()
    {
        return $this->validated();
    }
}
