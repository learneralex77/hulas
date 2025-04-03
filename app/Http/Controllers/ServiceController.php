<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('translations')->orderBy('display_order')->get();
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        // Check if names array is empty or first name is empty
        if (empty($request->input('names')) || 
            !isset($request->input('names')[0]) || 
            trim($request->input('names')[0]) === '') {
            return redirect()->back()
                ->withInput()
                ->withErrors(['names.0' => 'The service name is required.']);
        }

        $validated = $request->validated();

        // Create a slug from the first name
        $baseSlug = Str::slug($request->input('names.0'));
        $slug = $baseSlug;

        // Check if slug exists and append a number if it does
        $count = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('services', 'public');
        }

        // Create the service
        $service = Service::create([
            'slug' => $slug,
            'display_order' => $request->input('display_order'),
            'is_published' => $request->input('is_published') == 1,
            'file' => $filePath,
        ]);

        // Store as JSON in a single record
        ServiceTranslation::create([
            'service_id' => $service->id,
            'name' => json_encode($request->input('names', [])),
            'icon' => json_encode($request->input('icons', [])),
            'description' => json_encode($request->input('descriptions', [])),
            'language_code' => 'en', // Default to English
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load('translations');

        // Decode JSON data for the view
        foreach ($service->translations as $translation) {
            $translation->names = json_decode($translation->name ?: '[]') ?: [];
            $translation->icons = json_decode($translation->icon ?: '[]') ?: [];
            $translation->descriptions = json_decode($translation->description ?: '[]') ?: [];
        }

        return view('backend.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service->load('translations');

        // Decode JSON data for the view
        foreach ($service->translations as $translation) {
            $translation->names = json_decode($translation->name ?: '[]') ?: [];
            $translation->icons = json_decode($translation->icon ?: '[]') ?: [];
            $translation->descriptions = json_decode($translation->description ?: '[]') ?: [];
        }

        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        // Check if names array is empty or first name is empty
        if (empty($request->input('names')) || 
            !isset($request->input('names')[0]) || 
            trim($request->input('names')[0]) === '') {
            return redirect()->back()
                ->withInput()
                ->withErrors(['names.0' => 'The service name is required.']);
        }

        $validated = $request->validated();

        // Update slug from the first name
        $baseSlug = Str::slug($request->input('names.0'));
        $slug = $baseSlug;

        // Check if slug exists (excluding current service) and append a number if it does
        $count = 1;
        while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if it exists
            if ($service->file) {
                Storage::disk('public')->delete($service->file);
            }
            $filePath = $request->file('file')->store('services', 'public');
        } else {
            $filePath = $service->file;
        }

        // Update service
        $service->update([
            'slug' => $slug,
            'display_order' => $request->input('display_order'),
            'is_published' => $request->input('is_published') == 1,
            'file' => $filePath,
        ]);

        // Update or create translation
        $translation = ServiceTranslation::firstOrNew(['service_id' => $service->id]);
        $translation->name = json_encode($request->input('names', []));
        $translation->icon = json_encode($request->input('icons', []));
        $translation->description = json_encode($request->input('descriptions', []));
        $translation->language_code = 'en';
        $translation->save();

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            // Delete the file if it exists
            if ($service->file) {
                Storage::disk('public')->delete($service->file);
            }

            // Delete the service (translations will cascade due to foreign key constraint)
            $service->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Service deleted successfully.'
                ]);
            }

            return redirect()->route('services.index')
                ->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting service: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('services.index')
                ->with('error', 'Error deleting service: ' . $e->getMessage());
        }
    }
}
