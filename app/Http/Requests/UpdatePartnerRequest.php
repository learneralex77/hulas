<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePartnerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => [
                'required', 
                'string', 
                'max:255',
                Rule::unique('partners', 'name_en')->ignore($this->route('partner'))
            ],
            'name_np' => [
                'nullable', 
                'string', 
                'max:255',
                Rule::unique('partners', 'name_np')->ignore($this->route('partner'))
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'delete_image' => 'nullable|boolean',
            'is_published' => 'boolean',
            'display_order' => 'integer',
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
            'name_en' => 'English partner name',
            'name_np' => 'Nepali partner name',
            'image' => 'partner image',
            'delete_image' => 'delete image option',
            'is_published' => 'published status',
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
            'name_en.required' => 'The English partner name is required.',
            'name_en.string' => 'The English partner name must be a string.',
            'name_en.max' => 'The English partner name may not be greater than 255 characters.',
            'name_en.unique' => 'A partner with this English name already exists.',
            
            'name_np.string' => 'The Nepali partner name must be a string.',
            'name_np.max' => 'The Nepali partner name may not be greater than 255 characters.',
            'name_np.unique' => 'A partner with this Nepali name already exists.',
            
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