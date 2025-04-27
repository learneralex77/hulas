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
            \Log::info('Starting service creation process', [
                'has_names' => $request->has('names'),
                'names' => $request->input('names'),
                'indices' => $request->input('service_detail_indices')
            ]);
            
            // Start with file upload preparation - do this outside the transaction
            $filePath = null;
            
            // Process main file upload first
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $filePath = $request->file('file')->store('services', 'public');
                \Log::info('Main file uploaded', ['path' => $filePath]);
            }
            
            // Get the form data
            $names = $request->input('names', []);
            $descriptions = $request->input('descriptions', []);
            $externalLinks = $request->input('external_links', []);
            
            // Use service_detail_indices if provided to ensure correct array order
            $detailIndices = $request->input('service_detail_indices');
            if (!empty($detailIndices) && is_string($detailIndices)) {
                try {
                    $indices = json_decode($detailIndices, true);
                    if (is_array($indices) && !empty($indices)) {
                        \Log::info('Using provided indices', ['indices' => $indices]);
                        
                        // Reindex names, descriptions, and externalLinks
                        $names = array_values($names);
                        $descriptions = array_values($descriptions);
                        $externalLinks = array_values($externalLinks);
                    }
                } catch (\Exception $e) {
                    \Log::error('Error parsing service detail indices', ['error' => $e->getMessage()]);
                }
            }
            
            // Make sure we have at least one name
            if (empty($names)) {
                throw new \Exception('At least one service name is required');
            }
            
            // Initialize iconPaths array for all indices
            $iconPaths = [];
            foreach (array_keys($names) as $index) {
                $iconPaths[$index] = null;
            }
            
            // Process icon file uploads for each index
            if ($request->hasFile('icons')) {
                foreach ($request->file('icons') as $index => $iconFile) {
                    if ($iconFile && $iconFile->isValid()) {
                        try {
                            $iconPaths[$index] = $iconFile->store('service_icons', 'public');
                            \Log::info('Icon uploaded', ['index' => $index, 'path' => $iconPaths[$index]]);
                        } catch (\Exception $e) {
                            \Log::error('Error uploading icon', [
                                'index' => $index, 
                                'error' => $e->getMessage()
                            ]);
                        }
                    }
                }
            }
            
            // Make sure all arrays have entries for all indices
            foreach (array_keys($names) as $index) {
                if (!isset($descriptions[$index])) {
                    $descriptions[$index] = null;
                }
                if (!isset($externalLinks[$index])) {
                    $externalLinks[$index] = null;
                }
            }
            
            \Log::info('Final arrays for creation', [
                'names' => $names,
                'names_count' => count($names),
                'icons' => $iconPaths,
                'descriptions_count' => count($descriptions),
                'links_count' => count($externalLinks)
            ]);
            
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
                'translation_names' => json_encode(array_values($names)),
                'translation_descriptions' => json_encode(array_values($descriptions)),
                'external_link' => json_encode(array_values($externalLinks)),
                'translation_icons' => json_encode(array_values($iconPaths)),
            ]);

            DB::commit();
            \Log::info('Service created successfully', [
                'service_id' => $service->id,
                'saved_names' => $names,
                'saved_icons' => $iconPaths
            ]);

            return redirect()
                ->route('services.index')
                ->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Service creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
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
            \Log::info('Starting service update process', [
                'service_id' => $service->id,
                'has_names' => $request->has('names'),
                'names' => $request->input('names'),
                'indices' => $request->input('service_detail_indices')
            ]);
            
            // Process file uploads first - outside the transaction
            $filePath = $service->file;
            
            // Fix the json_decode error - check if already an array
            $existingIconPaths = $service->translation_icons;
            if (is_string($existingIconPaths)) {
                $existingIconPaths = json_decode($existingIconPaths, true) ?? [];
            } elseif (!is_array($existingIconPaths)) {
                $existingIconPaths = [];
            }
            
            \Log::info('Existing icon paths', ['paths' => $existingIconPaths]);
            
            // Handle main file upload if needed
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                // Delete old file if exists
                if ($service->file) {
                    Storage::disk('public')->delete($service->file);
                }
                
                $filePath = $request->file('file')->store('services', 'public');
                \Log::info('Updated main file', ['path' => $filePath]);
            }
            
            // Get the names, descriptions, and external links from the request
            $names = $request->input('names', []);
            $descriptions = $request->input('descriptions', []);
            $externalLinks = $request->input('external_links', []);
            
            // Use service_detail_indices if provided to ensure correct array order
            $detailIndices = $request->input('service_detail_indices');
            if (!empty($detailIndices) && is_string($detailIndices)) {
                try {
                    $indices = json_decode($detailIndices, true);
                    if (is_array($indices) && !empty($indices)) {
                        \Log::info('Using provided indices for update', ['indices' => $indices]);
                        
                        // Reindex arrays to ensure they are in the correct order
                        $names = array_values($names);
                        $descriptions = array_values($descriptions);
                        $externalLinks = array_values($externalLinks);
                    }
                } catch (\Exception $e) {
                    \Log::error('Error parsing service detail indices', ['error' => $e->getMessage()]);
                }
            }
            
            // Make sure we have at least one name
            if (empty($names)) {
                throw new \Exception('At least one service name is required');
            }
            
            // Initialize finalIconPaths with null values for all indices in names array
            $finalIconPaths = [];
            foreach (array_keys($names) as $index) {
                $finalIconPaths[$index] = null;
            }
            
            // Preserve existing icons for indices that haven't changed
            // We need to adjust this based on the new indices
            if (count($existingIconPaths) > 0) {
                foreach (array_keys($names) as $newIndex) {
                    if ($newIndex < count($existingIconPaths) && isset($existingIconPaths[$newIndex])) {
                        $finalIconPaths[$newIndex] = $existingIconPaths[$newIndex];
                    }
                }
            }
            
            // Process icon uploads - only update the ones that have new files
            if ($request->hasFile('icons')) {
                foreach ($request->file('icons') as $index => $iconFile) {
                    if ($iconFile && $iconFile->isValid()) {
                        try {
                            // Delete old icon if exists
                            if (isset($finalIconPaths[$index]) && $finalIconPaths[$index]) {
                                Storage::disk('public')->delete($finalIconPaths[$index]);
                            }
                            
                            $finalIconPaths[$index] = $iconFile->store('service_icons', 'public');
                            \Log::info('Updated icon', ['index' => $index, 'path' => $finalIconPaths[$index]]);
                        } catch (\Exception $e) {
                            \Log::error('Error updating icon', [
                                'index' => $index, 
                                'error' => $e->getMessage()
                            ]);
                        }
                    }
                }
            }
            
            // Make sure all arrays have entries for all indices
            foreach (array_keys($names) as $index) {
                if (!isset($descriptions[$index])) {
                    $descriptions[$index] = null;
                }
                if (!isset($externalLinks[$index])) {
                    $externalLinks[$index] = null;
                }
            }
            
            \Log::info('Final arrays for update', [
                'names' => $names,
                'names_count' => count($names),
                'existing_icons' => $existingIconPaths,
                'final_icons' => $finalIconPaths,
                'descriptions_count' => count($descriptions),
                'links_count' => count($externalLinks)
            ]);
            
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
                'translation_names' => json_encode(array_values($names)),
                'translation_descriptions' => json_encode(array_values($descriptions)),
                'external_link' => json_encode(array_values($externalLinks)),
                'translation_icons' => json_encode(array_values($finalIconPaths)),
            ]);

            DB::commit();
            \Log::info('Service updated successfully', [
                'service_id' => $service->id,
                'saved_names' => $names,
                'saved_icons' => $finalIconPaths
            ]);

            return redirect()
                ->route('services.index')
                ->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Service update failed', [
                'service_id' => $service->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
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
