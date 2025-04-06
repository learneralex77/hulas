<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'tagline' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'years_of_experience' => ['nullable', 'integer', 'min:0'],
            'short_description' => ['nullable', 'string'],
            'video_link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'delete_image' => ['nullable', 'boolean'],
            'mission_vision_titles.*' => ['required', 'string', 'max:255'],
            'mission_vision_icons.*' => ['required', 'string', 'max:255'],
            'mission_vision_descriptions.*' => ['required', 'string'],
            'is_published' => ['boolean'],
            'display_order' => ['integer', 'min:0'],
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
            'tagline' => 'tagline',
            'description' => 'description',
            'years_of_experience' => 'years of experience',
            'short_description' => 'short description',
            'video_link' => 'video link',
            'image' => 'image',
            'delete_image' => 'delete image option',
            'mission_vision_titles.*' => 'mission/vision title',
            'mission_vision_icons.*' => 'mission/vision icon',
            'mission_vision_descriptions.*' => 'mission/vision description',
            'is_published' => 'publish status',
            'display_order' => 'display order',
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
            'tagline.required' => 'The tagline is required.',
            'tagline.string' => 'The tagline must be a string.',
            'tagline.max' => 'The tagline may not be greater than 255 characters.',
            
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            
            'years_of_experience.integer' => 'The years of experience must be a number.',
            'years_of_experience.min' => 'The years of experience must be at least 0.',
            
            'short_description.string' => 'The short description must be a string.',
            
            'video_link.string' => 'The video link must be a string.',
            'video_link.max' => 'The video link may not be greater than 255 characters.',
            
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            
            'mission_vision_titles.*.required' => 'Each mission/vision title is required.',
            'mission_vision_titles.*.string' => 'Each mission/vision title must be a string.',
            'mission_vision_titles.*.max' => 'Each mission/vision title may not be greater than 255 characters.',
            
            'mission_vision_icons.*.required' => 'Each mission/vision icon is required.',
            'mission_vision_icons.*.string' => 'Each mission/vision icon must be a string.',
            'mission_vision_icons.*.max' => 'Each mission/vision icon may not be greater than 255 characters.',
            
            'mission_vision_descriptions.*.required' => 'Each mission/vision description is required.',
            'mission_vision_descriptions.*.string' => 'Each mission/vision description must be a string.',
        ];
    }
}
