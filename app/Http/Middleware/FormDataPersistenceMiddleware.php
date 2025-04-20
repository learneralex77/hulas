<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormDataPersistenceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $formIdentifier = $this->getFormIdentifier($request);
        
        // For POST requests and PUT requests (form submissions)
        if ($request->isMethod('post') || $request->isMethod('put')) {
            // Remove file objects from form data to prevent serialization issues
            $formData = $request->except(['_token', '_method']);
            
            // Filter out file objects recursively
            $safeFormData = $this->filterFileObjects($formData);
            
            // Store form data with a unique identifier based on the route
            session([$formIdentifier => $safeFormData]);
            
            // Store the referer for tracking the form's origin
            session([$formIdentifier . '_referer' => $request->path()]);
        }
        
        // For GET requests (form loads and refreshes)
        if ($request->isMethod('get')) {
            // Check if this is a form page
            if ($this->isFormPage($request)) {
                // Detect refresh and preserve input when:
                // 1. We have stored form data for this route
                // 2. The referer matches the current route (page refresh case)
                if (session()->has($formIdentifier)) {
                    // Flash input data to the next request
                    session()->flashInput(session($formIdentifier));
                }
            }
        }
        
        $response = $next($request);
        
        // Clear form data after successful redirect with success message
        if ($response instanceof \Illuminate\Http\RedirectResponse && $response->getSession() && $response->getSession()->has('success')) {
            session()->forget($formIdentifier);
            session()->forget($formIdentifier . '_referer');
        }
        
        // Check if we're redirecting back with input and errors
        if ($response->isRedirect() && session()->has('errors')) {
            // Strip file data from old input to prevent serialization issues
            $oldInput = session()->get('_old_input', []);
            
            if (is_array($oldInput)) {
                // Remove any file upload fields and objects
                $safeInput = $this->filterFileObjects($oldInput);
                
                // Update the session
                session()->flash('_old_input', $safeInput);
            }
        }
        
        return $response;
    }
    
    /**
     * Generate a unique identifier for the form based on the request route name
     */
    private function getFormIdentifier(Request $request): string
    {
        $path = $request->path();
        
        // For edit routes, extract the ID to make unique form identifiers for each edit page
        if (preg_match('/menus\/(\d+)\/edit/', $path, $matches) || 
            preg_match('/menus\/(\d+)/', $path, $matches)) {
            return 'form_data_menus_' . $matches[1];
        }
        
        // Default case for regular forms like create
        return 'form_data_' . str_replace('/', '_', $path);
    }
    
    /**
     * Determine if the current request is for a form page
     */
    private function isFormPage(Request $request): bool
    {
        $path = $request->path();
        
        // Check if the path contains specific form route patterns
        if (preg_match('/menus\/create/', $path) || 
            preg_match('/menus\/(\d+)\/edit/', $path)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Filter out any file objects from the data
     */
    private function filterFileObjects($data)
    {
        if (!is_array($data)) {
            return $data;
        }
        
        $result = [];
        foreach ($data as $key => $value) {
            // Skip if the value is an object or an array that contains objects
            if (is_object($value) || $this->isUploadedFile($key)) {
                continue;
            }
            
            // Recursively filter arrays
            if (is_array($value)) {
                $filteredValue = $this->filterFileObjects($value);
                if (!empty($filteredValue)) {
                    $result[$key] = $filteredValue;
                }
            } else {
                $result[$key] = $value;
            }
        }
        
        return $result;
    }
    
    /**
     * Check if the field key is a common file upload field
     */
    private function isUploadedFile($key): bool
    {
        $fileFields = [
            'featured_image', 'gallery_images', 'image', 'images', 
            'thumbnail', 'photo', 'photos', 'file', 'files', 
            'attachment', 'attachments', 'document', 'documents',
            'cover', 'banner', 'logo'
        ];
        
        foreach ($fileFields as $fileField) {
            if ($key === $fileField || strpos($key, $fileField . '_') === 0 || strpos($key, $fileField . '.') === 0) {
                return true;
            }
        }
        
        return false;
    }
}
