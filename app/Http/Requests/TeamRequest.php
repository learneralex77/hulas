<?php

namespace App\Http\Requests;

use App\Models\Team;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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
            'type' => ['required', Rule::in(array_keys(Team::getTypes()))],
            'name_en' => ['required', 'string', 'max:255'],
            'name_np' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'description_en' => ['nullable', 'string'],
            'description_np' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'delete_image' => ['nullable', 'boolean'],
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
            'type' => 'team type',
            'name_en' => 'English name',
            'name_np' => 'Nepali name',
            'image' => 'team member image',
            'description_en' => 'English description',
            'description_np' => 'Nepali description',
            'display_order' => 'display order',
            'is_published' => 'published status',
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
        $teamTypes = implode(', ', array_values(Team::getTypes()));
        
        return [
            'type.required' => 'The team type is required.',
            'type.in' => 'The selected team type is invalid. Valid types are: ' . $teamTypes,
            
            'name_en.required' => 'The English name is required.',
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be greater than 255 characters.',
            
            'name_np.string' => 'The Nepali name must be a string.',
            'name_np.max' => 'The Nepali name may not be greater than 255 characters.',
            
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            
            'description_en.string' => 'The English description must be a string.',
            'description_np.string' => 'The Nepali description must be a string.',
            
            'display_order.integer' => 'The display order must be a number.',
            'display_order.min' => 'The display order must be at least 0.',
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
