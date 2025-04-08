<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'links' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'delete_featured_image' => ['nullable', 'boolean'],
            'delete_images' => ['nullable', 'array'],
            'delete_images.*' => ['nullable', 'string'],
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
            'title' => 'gallery title',
            'featured_image' => 'featured image',
            'gallery_images.*' => 'gallery image',
            'links' => 'links',
            'is_featured' => 'featured status',
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
            'title.required' => 'The gallery title is required.',
            'title.string' => 'The gallery title must be a string.',
            'title.max' => 'The gallery title may not be greater than 255 characters.',

            'featured_image.image' => 'The featured image must be an image file.',
            'featured_image.mimes' => 'The featured image must be a file of type: jpeg, png, jpg, gif, webp.',
            'featured_image.max' => 'The featured image may not be greater than 2MB.',

            'gallery_images.*.image' => 'Each gallery image must be an image file.',
            'gallery_images.*.mimes' => 'Each gallery image must be a file of type: jpeg, png, jpg, gif, webp.',
            'gallery_images.*.max' => 'Each gallery image may not be greater than 2MB.',

            'links.string' => 'The links must be a string.',

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
            'is_featured' => $this->has('is_featured'),
            'is_published' => $this->has('is_published'),
        ]);
    }
}
