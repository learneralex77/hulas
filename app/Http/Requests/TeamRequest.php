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
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            'description_en' => ['nullable', 'string'],
            'description_np' => ['nullable', 'string'],
            'address_en' => ['nullable', 'string', 'max:255'],
            'address_np' => ['nullable', 'string', 'max:255'],
            'phone_number_en' => ['nullable', 'string', 'max:20'],
            'phone_number_np' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
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
            'address_en' => 'English address',
            'address_np' => 'Nepali address',
            'phone_number_en' => 'English phone number',
            'phone_number_np' => 'Nepali phone number',
            'email' => 'email address',
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
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            
            'description_en.string' => 'The English description must be a string.',
            'description_np.string' => 'The Nepali description must be a string.',
            
            'address_en.string' => 'The English address must be a string.',
            'address_en.max' => 'The English address may not be greater than 255 characters.',
            
            'address_np.string' => 'The Nepali address must be a string.',
            'address_np.max' => 'The Nepali address may not be greater than 255 characters.',
            
            'phone_number_en.string' => 'The English phone number must be a string.',
            'phone_number_en.max' => 'The English phone number may not be greater than 20 characters.',
            
            'phone_number_np.string' => 'The Nepali phone number must be a string.',
            'phone_number_np.max' => 'The Nepali phone number may not be greater than 20 characters.',
            
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            
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
