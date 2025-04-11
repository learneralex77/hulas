<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecomeAnAgentRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'title_en' => ['nullable', 'string', 'max:255'],
                'title_np' => ['nullable', 'string', 'max:255'],
                'description_en' => ['nullable', 'string'],
                'description_np' => ['nullable', 'string'],
                'images' => ['required', 'array'],
                'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                'display_order' => ['nullable', 'integer', 'min:0'],
                'is_published' => ['boolean'],
                // For backward compatibility
                'title' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
            ];
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return [
                'title_en' => ['nullable', 'string', 'max:255'],
                'title_np' => ['nullable', 'string', 'max:255'],
                'description_en' => ['nullable', 'string'],
                'description_np' => ['nullable', 'string'],
                'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                'delete_images' => ['nullable', 'array'],
                'delete_images.*' => ['numeric'],
                'display_order' => ['nullable', 'integer', 'min:0'],
                'is_published' => ['boolean'],
                // For backward compatibility
                'title' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
            ];
        }
        
        return [];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title_en' => 'title (English)',
            'title_np' => 'title (Nepali)',
            'description_en' => 'description (English)',
            'description_np' => 'description (Nepali)',
            'images' => 'images',
            'images.*' => 'image',
            'delete_images' => 'images to delete',
            'delete_images.*' => 'image to delete',
            'display_order' => 'display order',
            'is_published' => 'status',
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
            'title_en.string' => 'Title (English) must be a string.',
            'title_en.max' => 'Title (English) may not be greater than 255 characters.',
            
            'title_np.string' => 'Title (Nepali) must be a string.',
            'title_np.max' => 'Title (Nepali) may not be greater than 255 characters.',
            
            'description_en.string' => 'Description (English) must be a string.',
            
            'description_np.string' => 'Description (Nepali) must be a string.',
            
            'images.required' => 'At least one image is required.',
            'images.array' => 'Images must be uploaded as an array.',
            'images.*.required' => 'Each uploaded file must be a valid image.',
            'images.*.image' => 'File must be an image.',
            'images.*.mimes' => 'Image must be a jpeg, png, jpg, gif, or webp file.',
            'images.*.max' => 'Image may not be larger than 2MB.',
            
            'delete_images.array' => 'Delete images must be an array.',
            'delete_images.*.numeric' => 'Image index must be a number.',
            
            'display_order.integer' => 'The display order must be an integer.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'is_published.boolean' => 'The status must be a boolean value.',
        ];
    }
    
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // For backward compatibility - map legacy fields to new ones
        if ($this->has('title') && !$this->has('title_en')) {
            $this->merge([
                'title_en' => $this->title,
            ]);
        }
        
        if ($this->has('description') && !$this->has('description_en')) {
            $this->merge([
                'description_en' => $this->description,
            ]);
        }
    }
}
