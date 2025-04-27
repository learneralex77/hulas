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
            'tagline_en' => ['required', 'string', 'max:255'],
            'tagline_np' => ['nullable', 'string', 'max:255'],
            'description_en' => ['required', 'string'],
            'description_np' => ['nullable', 'string'],
            'years_of_experience_en' => ['nullable', 'string', 'max:255'],
            'years_of_experience_np' => ['nullable', 'string', 'max:255'],
            'short_description_en' => ['nullable', 'string'],
            'short_description_np' => ['nullable', 'string'],
            'video_link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'delete_image' => ['nullable', 'boolean'],
            'mission_vision_titles.*' => ['required', 'string', 'max:255'],
            'mission_vision_icons.*' => ['nullable', 'string', 'max:255'],
            'mission_vision_image_files.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'],
            'mission_vision_delete_images.*' => ['nullable', 'boolean'],
            'mission_vision_descriptions.*' => ['required', 'string'],
            'is_published' => ['boolean'],
            'display_order' => ['integer', 'min:0'],
            
            // For backward compatibility
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'years_of_experience' => ['nullable', 'integer', 'min:0'],
            'short_description' => ['nullable', 'string'],
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
            'tagline_en' => 'tagline (English)',
            'tagline_np' => 'tagline (Nepali)',
            'description_en' => 'description (English)',
            'description_np' => 'description (Nepali)',
            'years_of_experience_en' => 'years of experience (English)',
            'years_of_experience_np' => 'years of experience (Nepali)',
            'short_description_en' => 'short description (English)',
            'short_description_np' => 'short description (Nepali)',
            'video_link' => 'video link',
            'image' => 'image',
            'delete_image' => 'delete image option',
            'mission_vision_titles.*' => 'mission/vision title',
            'mission_vision_icons.*' => 'mission/vision icon',
            'mission_vision_image_files.*' => 'mission/vision icon image',
            'mission_vision_delete_images.*' => 'delete mission/vision image option',
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
        $messages = [
            'tagline_en.required' => 'The English tagline is required.',
            'tagline_en.string' => 'The English tagline must be a string.',
            'tagline_en.max' => 'The English tagline may not be greater than 255 characters.',
            
            'tagline_np.string' => 'The Nepali tagline must be a string.',
            'tagline_np.max' => 'The Nepali tagline may not be greater than 255 characters.',
            
            'description_en.required' => 'The English description is required.',
            'description_en.string' => 'The English description must be a string.',
            
            'description_np.string' => 'The Nepali description must be a string.',
            
            'years_of_experience_en.string' => 'The English years of experience must be a string.',
            'years_of_experience_en.max' => 'The English years of experience may not be greater than 255 characters.',
            
            'years_of_experience_np.string' => 'The Nepali years of experience must be a string.',
            'years_of_experience_np.max' => 'The Nepali years of experience may not be greater than 255 characters.',
            
            'short_description_en.string' => 'The English short description must be a string.',
            
            'short_description_np.string' => 'The Nepali short description must be a string.',
            
            'video_link.string' => 'The video link must be a string.',
            'video_link.max' => 'The video link may not be greater than 255 characters.',
            
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image may not be greater than 2MB.',
            
            'mission_vision_titles.*.required' => 'Each mission/vision title is required.',
            'mission_vision_titles.*.string' => 'Each mission/vision title must be a string.',
            'mission_vision_titles.*.max' => 'Each mission/vision title may not be greater than 255 characters.',
            
            'mission_vision_icons.*.string' => 'Each mission/vision icon must be a string.',
            
            'mission_vision_image_files.*.image' => 'The mission/vision icon must be an image.',
            'mission_vision_image_files.*.mimes' => 'The mission/vision icon must be a file of type: jpeg, png, jpg, gif, svg, webp.',
            'mission_vision_image_files.*.max' => 'The mission/vision icon may not be greater than 2MB.',
            
            'mission_vision_delete_images.*.boolean' => 'Each delete mission/vision image option must be a boolean.',
            
            'mission_vision_descriptions.*.required' => 'Each mission/vision description is required.',
            'mission_vision_descriptions.*.string' => 'Each mission/vision description must be a string.',
        ];
        
        // Merge with existing messages
        return array_merge(parent::messages(), $messages);
    }
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // Convert boolean values explicitly
        $this->merge([
            'is_published' => $this->input('is_published') == 1,
            'display_order' => $this->input('display_order') ?? 0,
        ]);

        // For backward compatibility - map legacy fields to new ones
        if ($this->has('tagline') && !$this->has('tagline_en')) {
            $this->merge([
                'tagline_en' => $this->tagline,
            ]);
        }
        
        if ($this->has('description') && !$this->has('description_en')) {
            $this->merge([
                'description_en' => $this->description,
            ]);
        }
        
        if ($this->has('years_of_experience') && !$this->has('years_of_experience_en')) {
            $this->merge([
                'years_of_experience_en' => $this->years_of_experience,
            ]);
        }
        
        if ($this->has('short_description') && !$this->has('short_description_en')) {
            $this->merge([
                'short_description_en' => $this->short_description,
            ]);
        }
        
        // Mission Vision arrays must be present
        if (!$this->has('mission_vision_titles')) {
            $this->merge(['mission_vision_titles' => []]);
        }
        if (!$this->has('mission_vision_icons')) {
            $this->merge(['mission_vision_icons' => []]);
        }
        if (!$this->has('mission_vision_descriptions')) {
            $this->merge(['mission_vision_descriptions' => []]);
        }
    }
}
