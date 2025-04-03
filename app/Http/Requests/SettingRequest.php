<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:190'],
            'feedback_notify_email' => ['required', 'email', 'max:190'],
            'agent_notify_email' => ['required', 'email', 'max:190'],
            'description' => ['required', 'string'],
            'email' => ['required', 'email', 'max:190'],
            'PO_Box' => ['required', 'string', 'max:100'],
            'canonical_url' => ['required', 'string', 'max:190'],
            'keyword' => ['required', 'string'],
            'google_maplink' => ['nullable', 'string', 'max:190'],
            'schema_markup' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string', 'max:190'],
            'twitter' => ['nullable', 'string', 'max:190'],
            'linkedin' => ['nullable', 'string', 'max:190'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'primary_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'secondary_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'delete_logo' => ['nullable', 'boolean'],
            'delete_primary_logo' => ['nullable', 'boolean'],
            'delete_secondary_logo' => ['nullable', 'boolean'],
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
            'title' => 'title',
            'feedback_notify_email' => 'feedback notification email',
            'agent_notify_email' => 'agent notification email',
            'description' => 'description',
            'email' => 'email',
            'PO_Box' => 'P.O. Box',
            'canonical_url' => 'canonical URL',
            'keyword' => 'keywords',
            'google_maplink' => 'Google Map link',
            'schema_markup' => 'schema markup',
            'facebook' => 'Facebook URL',
            'twitter' => 'Twitter URL',
            'linkedin' => 'LinkedIn URL',
            'logo' => 'logo',
            'primary_logo' => 'primary logo',
            'secondary_logo' => 'secondary logo',
            'delete_logo' => 'delete logo option',
            'delete_primary_logo' => 'delete primary logo option',
            'delete_secondary_logo' => 'delete secondary logo option',
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
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 190 characters.',
            
            'feedback_notify_email.required' => 'The feedback notification email is required.',
            'feedback_notify_email.email' => 'The feedback notification email must be a valid email address.',
            'feedback_notify_email.max' => 'The feedback notification email may not be greater than 190 characters.',
            
            'agent_notify_email.required' => 'The agent notification email is required.',
            'agent_notify_email.email' => 'The agent notification email must be a valid email address.',
            'agent_notify_email.max' => 'The agent notification email may not be greater than 190 characters.',
            
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 190 characters.',
            
            'PO_Box.required' => 'The P.O. Box is required.',
            'PO_Box.string' => 'The P.O. Box must be a string.',
            'PO_Box.max' => 'The P.O. Box may not be greater than 100 characters.',
            
            'canonical_url.required' => 'The canonical URL is required.',
            'canonical_url.string' => 'The canonical URL must be a string.',
            'canonical_url.max' => 'The canonical URL may not be greater than 190 characters.',
            
            'keyword.required' => 'The keywords are required.',
            'keyword.string' => 'The keywords must be a string.',
            
            'google_maplink.string' => 'The Google Map link must be a string.',
            'google_maplink.max' => 'The Google Map link may not be greater than 190 characters.',
            
            'schema_markup.string' => 'The schema markup must be a string.',
            
            'facebook.string' => 'The Facebook URL must be a string.',
            'facebook.max' => 'The Facebook URL may not be greater than 190 characters.',
            
            'twitter.string' => 'The Twitter URL must be a string.',
            'twitter.max' => 'The Twitter URL may not be greater than 190 characters.',
            
            'linkedin.string' => 'The LinkedIn URL must be a string.',
            'linkedin.max' => 'The LinkedIn URL may not be greater than 190 characters.',
            
            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.max' => 'The logo may not be greater than 2MB.',
            
            'primary_logo.image' => 'The primary logo must be an image.',
            'primary_logo.mimes' => 'The primary logo must be a file of type: jpeg, png, jpg, gif.',
            'primary_logo.max' => 'The primary logo may not be greater than 2MB.',
            
            'secondary_logo.image' => 'The secondary logo must be an image.',
            'secondary_logo.mimes' => 'The secondary logo must be a file of type: jpeg, png, jpg, gif.',
            'secondary_logo.max' => 'The secondary logo may not be greater than 2MB.',
        ];
    }
}
