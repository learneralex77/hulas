<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublicationRequest extends FormRequest
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
            'news_event_category_id' => ['required', 'exists:news_event_categories,id'],
            'publication_type' => ['required', 'in:News,Article,Event'],
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'published_by' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'external_link' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
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
            'news_event_category_id' => 'category',
            'publication_type' => 'publication type',
            'title' => 'title',
            'short_description' => 'short description',
            'content' => 'content',
            'published_by' => 'published by',
            'display_order' => 'display order',
            'external_link' => 'external link',
            'image' => 'image',
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
            'news_event_category_id.required' => 'Please select a category.',
            'news_event_category_id.exists' => 'The selected category does not exist.',
            
            'publication_type.required' => 'Please select a publication type.',
            'publication_type.in' => 'The selected publication type is invalid.',
            
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            
            'short_description.string' => 'The short description must be a string.',
            
            'content.string' => 'The content must be a string.',
            
            'published_by.string' => 'The published by field must be a string.',
            'published_by.max' => 'The published by field may not be greater than 255 characters.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'external_link.url' => 'The external link must be a valid URL.',
            'external_link.max' => 'The external link may not be greater than 255 characters.',
            
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
