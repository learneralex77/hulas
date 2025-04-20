<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PopupRequest extends FormRequest
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
            'name_en' => ['required', 'string', 'max:255'],
            'name_np' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            'delete_image' => ['nullable', 'boolean'],
        ];

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name_en'][] = Rule::unique('popups', 'name_en')
                ->ignore($this->route('popup'));
            $rules['name_np'][] = Rule::unique('popups', 'name_np')
                ->ignore($this->route('popup'));
        } else {
            $rules['name_en'][] = Rule::unique('popups', 'name_en');
            $rules['name_np'][] = Rule::unique('popups', 'name_np');
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
            'name_en' => 'English popup name',
            'name_np' => 'Nepali popup name',
            'link' => 'link',
            'display_order' => 'display order',
            'is_published' => 'published status',
            'image' => 'popup image',
            'delete_image' => 'delete image option',
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
            'name_en.required' => 'The English popup name is required.',
            'name_en.string' => 'The English popup name must be a string.',
            'name_en.max' => 'The English popup name may not be greater than 255 characters.',
            'name_en.unique' => 'A popup with this English name already exists.',
            
            'name_np.string' => 'The Nepali popup name must be a string.',
            'name_np.max' => 'The Nepali popup name may not be greater than 255 characters.',
            'name_np.unique' => 'A popup with this Nepali name already exists.',
            
            'link.string' => 'The link must be a string.',
            'link.max' => 'The link may not be greater than 255 characters.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
            
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Set boolean values correctly
        $this->merge([
            'is_published' => $this->has('is_published'),
            'delete_image' => $this->has('delete_image'),
        ]);
        
        // Set default display order if not provided
        if (!$this->has('display_order') || $this->display_order === null) {
            $this->merge(['display_order' => 0]);
        }
    }
} 