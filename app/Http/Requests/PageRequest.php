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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'menu_id' => ['required', 'exists:menus,id'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        // For update operations, add unique slug check
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $pageId = $this->route('page')->id;
            
            // If the title has changed, check for slug uniqueness
            if ($this->has('title') && $this->title !== $this->route('page')->title) {
                $rules['title'][] = Rule::unique('pages', 'slug')
                    ->where(function ($query) {
                        return $query->where('slug', Str::slug($this->title));
                    })
                    ->ignore($pageId);
            }
        } else {
            // For new pages, check that the slug would be unique
            $rules['title'][] = Rule::unique('pages', 'slug')
                ->where(function ($query) {
                    return $query->where('slug', Str::slug($this->title));
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
            'title' => 'page title',
            'content' => 'page content',
            'menu_id' => 'menu',
            'short_description' => 'short description',
            'image' => 'page image',
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
            'title.required' => 'The page title is required.',
            'title.string' => 'The page title must be a string.',
            'title.max' => 'The page title may not be greater than 255 characters.',
            'title.unique' => 'This page title would create a duplicate slug. Please use a different title.',

            'content.required' => 'The page content is required.',
            'content.string' => 'The page content must be a string.',

            'menu_id.required' => 'Please select a menu for this page.',
            'menu_id.exists' => 'The selected menu does not exist.',

            'short_description.string' => 'The short description must be a string.',
            'short_description.max' => 'The short description may not be greater than 500 characters.',

            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // No automatic data preparation needed for this request
    }
}
