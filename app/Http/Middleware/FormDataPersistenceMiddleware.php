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
            // Store form data with a unique identifier based on the route
            $formData = $request->except(['_token', '_method']);
            session([$formIdentifier => $formData]);
            
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
}
