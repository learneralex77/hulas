<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('display_order')->get();
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
        try {
            // Start with file upload preparation - do this outside the transaction
            $filePath = null;
            $iconPaths = [];
            
            // Process main file upload first
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $filePath = $request->file('file')->store('services', 'public');
            }
            
            // Process icon file uploads - collect them before DB transaction
            if ($request->hasFile('icons')) {
                foreach ($request->file('icons') as $index => $iconFile) {
                    if ($iconFile && $iconFile->isValid()) {
                        $iconPaths[$index] = $iconFile->store('service_icons', 'public');
                    }
                }
            }
            
            // Make sure all entries in names array have corresponding icon paths entries
            if ($request->has('names')) {
                foreach (array_keys($request->input('names', [])) as $index) {
                    if (!isset($iconPaths[$index])) {
                        $iconPaths[$index] = null;
                    }
                }
            }
            
            // Now start the database transaction - with file uploads already done
            DB::beginTransaction();

            // Create slug from name_en
            $slug = Str::slug($request->input('name_en'));
            
            // Check if slug already exists
            $count = Service::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            // Create the service with all data at once
            $service = Service::create([
                'name_en' => $request->input('name_en'),
                'name_np' => $request->input('name_np'),
                'icon' => $request->input('icon'),
                'description_en' => $request->input('description_en'),
                'description_np' => $request->input('description_np'),
                'slug' => $slug,
                'display_order' => $request->input('display_order'),
                'is_published' => $request->boolean('is_published'),
                'file' => $filePath,
                'translation_names' => json_encode($request->input('names', [])),
                'translation_descriptions' => json_encode($request->input('descriptions', [])),
                'external_link' => json_encode($request->input('external_links', [])),
                'translation_icons' => json_encode($iconPaths),
            ]);

            DB::commit();

            return redirect()
                ->route('services.index')
                ->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating service: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('backend.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        try {
            // Process file uploads first - outside the transaction
            $filePath = $service->file;
            
            // Fix the json_decode error - check if already an array
            $iconPaths = $service->translation_icons;
            if (is_string($iconPaths)) {
                $iconPaths = json_decode($iconPaths, true) ?? [];
            } elseif (!is_array($iconPaths)) {
                $iconPaths = [];
            }
            
            // Handle main file upload if needed
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                // Delete old file if exists
                if ($service->file) {
                    Storage::disk('public')->delete($service->file);
                }
                
                $filePath = $request->file('file')->store('services', 'public');
            }
            
            // Process icon uploads
            if ($request->hasFile('icons')) {
                foreach ($request->file('icons') as $index => $iconFile) {
                    if ($iconFile && $iconFile->isValid()) {
                        // Delete old icon if exists
                        if (isset($iconPaths[$index])) {
                            Storage::disk('public')->delete($iconPaths[$index]);
                        }
                        
                        $iconPaths[$index] = $iconFile->store('service_icons', 'public');
                    }
                }
            }
            
            // Process icon paths to match names array structure
            if ($request->has('names')) {
                $names = $request->input('names', []);
                $processedIconPaths = [];
                
                foreach ($names as $index => $name) {
                    $processedIconPaths[$index] = $iconPaths[$index] ?? null;
                }
                
                $iconPaths = $processedIconPaths;
            }
            
            // Start database transaction after file handling
            DB::beginTransaction();

            // Update slug if name changed
            $slug = $service->slug;
            if ($request->input('name_en') !== $service->name_en) {
                $slug = Str::slug($request->input('name_en'));
                
                // Check if slug already exists
                $count = Service::where('slug', $slug)
                    ->where('id', '!=', $service->id)
                    ->count();
                
                if ($count > 0) {
                    $slug = $slug . '-' . ($count + 1);
                }
            }

            // Update in a single operation
            $service->update([
                'name_en' => $request->input('name_en'),
                'name_np' => $request->input('name_np'),
                'icon' => $request->input('icon'),
                'description_en' => $request->input('description_en'),
                'description_np' => $request->input('description_np'),
                'slug' => $slug,
                'display_order' => $request->input('display_order'),
                'is_published' => $request->boolean('is_published'),
                'file' => $filePath,
                'translation_names' => json_encode($request->input('names', [])),
                'translation_descriptions' => json_encode($request->input('descriptions', [])),
                'external_link' => json_encode($request->input('external_links', [])),
                'translation_icons' => json_encode($iconPaths),
            ]);

            DB::commit();

            return redirect()
                ->route('services.index')
                ->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating service: ' . $e->getMessage());
        }
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
