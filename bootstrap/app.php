<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\FormDataPersistenceMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\FileUploadSerialization;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register the FormDataPersistenceMiddleware for web routes
        // $middleware->web(FormDataPersistenceMiddleware::class);
        
        // Register FileUploadSerialization middleware globally (before other middleware)
        // $middleware->prepend(FileUploadSerialization::class);
        
        // Register authentication middleware
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Define helper function at the top level
        $containsFileObjects = function($value) use (&$containsFileObjects): bool {
            if (is_object($value)) {
                return $value instanceof \Illuminate\Http\UploadedFile || 
                       $value instanceof \Symfony\Component\HttpFoundation\File\UploadedFile;
            }
            
            if (is_array($value)) {
                foreach ($value as $item) {
                    if ($containsFileObjects($item)) {
                        return true;
                    }
                }
            }
            
            return false;
        };
        
        // Handle serialization errors
        $exceptions->renderable(function (\Error $e) use ($containsFileObjects) {
            if (strpos($e->getMessage(), 'Serialization of') !== false &&
                strpos($e->getMessage(), 'UploadedFile') !== false) {
                
                $request = request();
                
                // Get all inputs except file fields
                $safeInput = [];
                foreach ($request->all() as $key => $value) {
                    if (!is_object($value) && !(is_array($value) && $containsFileObjects($value))) {
                        $safeInput[$key] = $value;
                    }
                }
                
                // Flash only the safe input to session
                session()->flashInput($safeInput);
                
                // Create generic validation error for the form
                $errors = ['error' => ['Please fill in all required fields before uploading files.']];
                
                // Add specific field errors based on the page type
                if (str_contains($request->url(), 'galleries')) {
                    $errors['title_en'] = ['The gallery title field is required.'];
                } else if (str_contains($request->url(), 'news-events')) {
                    $errors['title'] = ['The news/event title field is required.'];
                }
                
                // Redirect back with errors
                return redirect()->back()->withErrors($errors);
            }
            
            return null;
        });
    })->create();
