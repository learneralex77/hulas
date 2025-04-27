<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DownloadRequest extends FormRequest
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
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ];
        
        // For create operation, file is required. For update, it's optional
        if ($this->isMethod('POST')) {
            $rules['file'] = [
                'required',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,csv,zip,jpg,jpeg,png,gif,webp'
            ];
        } else {
            $rules['file'] = [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,csv,zip,jpg,jpeg,png,gif,webp'
            ];
        }

        // Add unique check with proper ignoring for updates
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name_en'][] = Rule::unique('downloads', 'name_en')
                ->ignore($this->route('download'));
            $rules['name_np'][] = Rule::unique('downloads', 'name_np')
                ->ignore($this->route('download'));
        } else {
            $rules['name_en'][] = Rule::unique('downloads', 'name_en');
            $rules['name_np'][] = Rule::unique('downloads', 'name_np');
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
            'name_en' => 'English download name',
            'name_np' => 'Nepali download name',
            'file' => 'file',
            'display_order' => 'display order',
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
            'name_en.required' => 'The English download name is required.',
            'name_en.string' => 'The English download name must be a string.',
            'name_en.max' => 'The English download name may not be greater than 255 characters.',
            'name_en.unique' => 'A download with this English name already exists.',
            
            'name_np.string' => 'The Nepali download name must be a string.',
            'name_np.max' => 'The Nepali download name may not be greater than 255 characters.',
            'name_np.unique' => 'A download with this Nepali name already exists.',
            
            'file.required' => 'Please select a file to upload.',
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'Only PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, CSV, ZIP, JPG, JPEG, PNG, GIF, WEBP files are allowed.',
            'file.max' => 'The file may not be greater than 10MB.',
            
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
