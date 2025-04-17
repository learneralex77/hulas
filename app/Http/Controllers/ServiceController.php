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
            DB::beginTransaction();

            // Create slug from name_en
            $slug = Str::slug($request->input('name_en'));
            
            // Check if slug already exists
            $count = Service::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            // Handle file upload
            $filePath = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                // Log file details
                \Log::info('File upload details:', [
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension(),
                ]);
                
                // Store file and get path
                $filePath = $file->store('services', 'public');
                
                // Log successful upload
                \Log::info('File stored at: ' . $filePath);
            }

            // Prepare data for service creation
            $data = [
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
                'translation_icons' => json_encode($request->input('icons', [])),
                'translation_descriptions' => json_encode($request->input('descriptions', [])),
                'external_link' => json_encode($request->input('external_links', [])),
            ];
            
            // Create the service
            $service = Service::create($data);

            DB::commit();

            return redirect()
                ->route('services.index')
                ->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log the error for debugging
            \Log::error('Service creation error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
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
            DB::beginTransaction();

            // Update slug if name_en changed
            if ($request->input('name_en') !== $service->name_en) {
                $slug = Str::slug($request->input('name_en'));
                
                // Check if slug already exists
                $count = Service::where('slug', $slug)
                    ->where('id', '!=', $service->id)
                    ->count();
                
                if ($count > 0) {
                    $slug = $slug . '-' . ($count + 1);
                }
                
                $service->slug = $slug;
            }

            // Prepare update data
            $data = [
                'name_en' => $request->input('name_en'),
                'name_np' => $request->input('name_np'),
                'icon' => $request->input('icon'),
                'description_en' => $request->input('description_en'),
                'description_np' => $request->input('description_np'),
                'display_order' => $request->input('display_order'),
                'is_published' => $request->boolean('is_published'),
                'translation_names' => json_encode($request->input('names', [])),
                'translation_icons' => json_encode($request->input('icons', [])),
                'translation_descriptions' => json_encode($request->input('descriptions', [])),
                'external_link' => json_encode($request->input('external_links', [])),
            ];

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                // Log file details
                \Log::info('File upload details (update):', [
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension(),
                ]);
                
                // Delete old file if exists
                if ($service->file) {
                    Storage::disk('public')->delete($service->file);
                }
                
                // Store file and get path
                $filePath = $file->store('services', 'public');
                
                // Log successful upload
                \Log::info('File stored at: ' . $filePath);
                
                // Add file path to update data
                $data['file'] = $filePath;
            }

            // Update service
            $service->update($data);

            DB::commit();

            return redirect()
                ->route('services.index')
                ->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log the error for debugging
            \Log::error('Service update error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
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
