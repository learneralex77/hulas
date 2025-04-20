<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileUploadSerialization
{
    /**
     * Handle an incoming request to prevent serialization issues with file uploads.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if request has any file uploads
        if (!empty($request->files->all())) {
            // Clone the request without any files to avoid serialization issues
            $safeRequest = clone $request;
            $fileFields = [];
            
            // Get all file fields
            foreach ($request->files->all() as $key => $file) {
                $fileFields[] = $key;
                $safeRequest->files->remove($key);
            }
            
            // Special handling for gallery pages
            if (str_contains($request->url(), 'galleries') && !$request->filled('title_en')) {
                $errors = ['title_en' => ['The gallery title is required.']];
                
                if ($request->wantsJson()) {
                    return response()->json(['errors' => $errors], 422);
                }
                
                // Store the old input without file data
                session()->flashInput($safeRequest->all());
                
                // Store errors in session
                session()->flash('errors', (object)['messages' => $errors]);
                
                return redirect()->back();
            }
            
            // Special handling for news_events pages
            if (str_contains($request->url(), 'news-events') && !$request->filled('title')) {
                $errors = ['title' => ['The news/event title is required.']];
                
                if ($request->wantsJson()) {
                    return response()->json(['errors' => $errors], 422);
                }
                
                // Store the old input without file data
                session()->flashInput($safeRequest->all());
                
                // Store errors in session
                session()->flash('errors', (object)['messages' => $errors]);
                
                return redirect()->back();
            }
            
            // Process the request with files separately to prevent serialization
            try {
                // The response will now go through without any serialization of file objects
                return $next($safeRequest);
            } catch (\Exception $e) {
                // If we hit a different exception, return it properly
                throw $e;
            }
        }

        try {
            // Process request normally if no files
            return $next($request);
        } catch (\Error $e) {
            // Catch serialization errors
            if (strpos($e->getMessage(), 'Serialization of') !== false &&
                strpos($e->getMessage(), 'UploadedFile') !== false) {
                
                // Get all inputs except file fields
                $safeInput = [];
                foreach ($request->all() as $key => $value) {
                    if (!is_object($value) && !$this->containsFileObjects($value)) {
                        $safeInput[$key] = $value;
                    }
                }
                
                // Flash only the safe input to session
                session()->flashInput($safeInput);
                
                // Create generic validation error for the form
                $errors = ['error' => ['Please fill in all required fields before uploading files.']];
                
                // Add specific field errors based on the page
                if (str_contains($request->url(), 'galleries')) {
                    $errors['title_en'] = ['The gallery title field is required.'];
                } else if (str_contains($request->url(), 'news-events')) {
                    $errors['title'] = ['The news/event title field is required.'];
                }
                
                // Redirect back with errors
                return redirect()->back()->withErrors($errors);
            }
            
            // Re-throw if it's not the error we're looking for
            throw $e;
        }
    }
    
    /**
     * Check if the value contains file objects (recursively)
     */
    private function containsFileObjects($value): bool
    {
        if (is_object($value)) {
            return $value instanceof \Illuminate\Http\UploadedFile || 
                   $value instanceof \Symfony\Component\HttpFoundation\File\UploadedFile;
        }
        
        if (is_array($value)) {
            foreach ($value as $item) {
                if ($this->containsFileObjects($item)) {
                    return true;
                }
            }
        }
        
        return false;
    }
} 