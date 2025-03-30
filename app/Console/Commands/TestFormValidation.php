<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class TestFormValidation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:form-validation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test form validation for become-an-agent form';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing become-an-agent form validation');

        // Simulate empty form submission
        $data = [];
        
        // Create validator similar to BecomeAnAgentRequest
        $validator = Validator::make($data, [
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'images.required' => 'At least one image is required.',
            'images.array' => 'Images must be uploaded as an array.',
            'images.*.required' => 'Each uploaded file must be a valid image.',
            'images.*.image' => 'File must be an image.',
            'images.*.mimes' => 'Image must be a jpeg, png, jpg, or gif file.',
            'images.*.max' => 'Image may not be larger than 2MB.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            $this->info('Validation fails as expected. Errors:');
            
            // Get error messages
            $errors = $validator->errors();
            
            // Print all errors
            foreach ($errors->all() as $error) {
                $this->error($error);
            }
            
            // Check if errors bag contains 'images' key
            if ($errors->has('images')) {
                $this->info('images field has errors: ' . implode(', ', $errors->get('images')));
            } else {
                $this->warn('No errors for images field');
            }
            
            // Check how View would handle these errors
            // We want to check if @error('images') would catch these errors
            $this->info('Testing how View handles these errors:');
            
            // Test error display for different variations of the image field
            $testCases = [
                'images' => 'Field: images',
                'images.0' => 'Field: images.0', 
                'images.*' => 'Field: images.*',
            ];
            
            foreach ($testCases as $field => $description) {
                $this->info($description);
                if ($errors->has($field)) {
                    $this->info("✓ @error('{$field}') will catch: " . implode(', ', $errors->get($field)));
                } else {
                    $this->warn("✗ @error('{$field}') won't catch any errors");
                }
            }
        } else {
            $this->warn('Validation passes unexpectedly. Check validation rules.');
        }
        
        return Command::SUCCESS;
    }
}
