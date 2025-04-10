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
            'title_en' => ['required', 'string', 'max:255'],
            'title_np' => ['nullable', 'string', 'max:255'],
            'short_description_en' => ['nullable', 'string'],
            'short_description_np' => ['nullable', 'string'],
            'content_en' => ['nullable', 'string'],
            'content_np' => ['nullable', 'string'],
            'published_by_en' => ['nullable', 'string', 'max:255'],
            'published_by_np' => ['nullable', 'string', 'max:255'],

            'display_order' => ['nullable', 'integer', 'min:0'],
            'external_link' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
            
            // For backward compatibility
            'title' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
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
            'title_en' => 'English title',
            'title_np' => 'Nepali title',
            'short_description_en' => 'English short description',
            'short_description_np' => 'Nepali short description',
            'content_en' => 'English content',
            'content_np' => 'Nepali content',
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
            
            'title_en.required' => 'The English title is required.',
            'title_en.string' => 'The English title must be a string.',
            'title_en.max' => 'The English title may not be greater than 255 characters.',
            
            'title_np.string' => 'The Nepali title must be a string.',
            'title_np.max' => 'The Nepali title may not be greater than 255 characters.',
            
            'short_description_en.string' => 'The English short description must be a string.',
            'short_description_np.string' => 'The Nepali short description must be a string.',
            
            'content_en.string' => 'The English content must be a string.',
            'content_np.string' => 'The Nepali content must be a string.',
            
            'published_by.string' => 'The published by field must be a string.',
            'published_by.max' => 'The published by field may not be greater than 255 characters.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'external_link.url' => 'The external link must be a valid URL.',
            'external_link.max' => 'The external link may not be greater than 255 characters.',
            
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
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
        
        // For backward compatibility - map 'title' to 'title_en' if title_en is not provided
        if ($this->has('title') && !$this->has('title_en')) {
            $this->merge([
                'title_en' => $this->title,
            ]);
        }
        
        // For backward compatibility - map 'short_description' to 'short_description_en'
        if ($this->has('short_description') && !$this->has('short_description_en')) {
            $this->merge([
                'short_description_en' => $this->short_description,
            ]);
        }
        
        // For backward compatibility - map 'content' to 'content_en'
        if ($this->has('content') && !$this->has('content_en')) {
            $this->merge([
                'content_en' => $this->content,
            ]);
        }
    }
}
