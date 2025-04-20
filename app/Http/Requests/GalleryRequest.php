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
        $rules = [
            'title_en' => ['required', 'string', 'max:255'],
            'title_np' => ['nullable','string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'slug' => ['nullable', 'string', 'max:255'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            'links' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'delete_featured_image' => ['nullable', 'boolean'],
            'delete_images' => ['nullable', 'array'],
            'delete_images.*' => ['nullable', 'string'],
        ];

        // Add unique rule for slug, with exception for current gallery when updating
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $galleryId = $this->route('gallery')->id;
            $rules['slug'][] = Rule::unique('galleries')->ignore($galleryId);
        } else {
            $rules['slug'][] = Rule::unique('galleries');
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
            'title_en' => 'gallery title(English)',
            'title_np' => 'gallery title(Nepali)',
            'short_description' => 'short description',
            'slug' => 'slug',
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
            'title_en.required' => 'The gallery title is required.',
            'title_en.string' => 'The gallery title must be a string.',
            'title_en.max' => 'The gallery title may not be greater than 255 characters.',

            'title_np.string' => 'The gallery title must be a string.',
            'title_np.max' => 'The gallery title may not be greater than 255 characters.',

            'short_description.string' => 'The short description must be a string.',

            'slug.string' => 'The slug must be a string.',
            'slug.max' => 'The slug may not be greater than 255 characters.',
            'slug.unique' => 'This slug is already in use.',

            'featured_image.image' => 'The featured image must be an image file.',
            'featured_image.mimes' => 'The featured image must be a file of type: jpeg, png, jpg, gif, webp.',

            'gallery_images.*.image' => 'All gallery images must be image files.',
            'gallery_images.*.mimes' => 'All gallery images must be files of type: jpeg, png, jpg, gif, webp.',

            'links.string' => 'The links must be a string.',

            'display_order.integer' => 'The display order must be a valid number.',
        ];
    }
}
