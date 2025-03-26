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
                'images' => ['required', 'array'],
                'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return [
                'new_images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'delete_images' => ['nullable', 'array'],
                'delete_images.*' => ['numeric'],
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
            'images' => 'images',
            'images.*' => 'image',
            'new_images.*' => 'new image',
            'delete_images' => 'images to delete',
            'delete_images.*' => 'image to delete',
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
            'images.required' => 'At least one image is required.',
            'images.array' => 'Images must be uploaded as an array.',
            'images.*.required' => 'Each uploaded file must be a valid image.',
            'images.*.image' => 'File must be an image.',
            'images.*.mimes' => 'Image must be a jpeg, png, jpg, or gif file.',
            'images.*.max' => 'Image may not be larger than 2MB.',
            
            'new_images.*.image' => 'File must be an image.',
            'new_images.*.mimes' => 'Image must be a jpeg, png, jpg, or gif file.',
            'new_images.*.max' => 'Image may not be larger than 2MB.',
            
            'delete_images.array' => 'Delete images must be an array.',
            'delete_images.*.numeric' => 'Image index must be a number.',
        ];
    }
}
