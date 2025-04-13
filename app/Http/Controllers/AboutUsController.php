<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Http\Requests\AboutUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::orderBy('display_order')->get();
        return view('backend.about-us.index', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        try {
            // Get validated data
            $data = $request->validated();
            
            // Process mission_vision data - simplify it
            $missionVision = [];
            foreach ($request->mission_vision_titles as $index => $title) {
                if (!empty($title) && 
                    isset($request->mission_vision_icons[$index]) && 
                    isset($request->mission_vision_descriptions[$index])) {
                    $missionVision[] = [
                        'title' => $title,
                        'icon' => $request->mission_vision_icons[$index],
                        'description' => $request->mission_vision_descriptions[$index],
                    ];
                }
            }
            
            // Create new model
            $aboutUs = new AboutUs();
            $aboutUs->tagline_en = $data['tagline_en'];
            $aboutUs->tagline_np = $data['tagline_np'] ?? null;
            $aboutUs->description_en = $data['description_en'];
            $aboutUs->description_np = $data['description_np'] ?? null;
            $aboutUs->years_of_experience_en = $data['years_of_experience_en'] ?? null;
            $aboutUs->years_of_experience_np = $data['years_of_experience_np'] ?? null;
            $aboutUs->short_description_en = $data['short_description_en'] ?? null;
            $aboutUs->short_description_np = $data['short_description_np'] ?? null;
            $aboutUs->video_link = $data['video_link'] ?? null;
            $aboutUs->mission_vision = $missionVision;
            $aboutUs->is_published = $request->boolean('is_published');
            $aboutUs->display_order = $data['display_order'] ?? 0;

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $aboutUs->image = $request->file('image')->store('about-us', 'public');
            }

            // Save the model
            $aboutUs->save();
            
            // Clear cache
            $this->clearCache();

            // Redirect to index page with success message
            return redirect('/admin/about-us')->with('success', 'About Us information created successfully.');
            
        } catch (\Exception $e) {
            \Log::error('AboutUs create error: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()->withInput()->with('error', 'Error creating About Us: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        return view('backend.about-us.show', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
        return view('backend.about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request, AboutUs $aboutUs)
    {
        try {
            // Get validated data 
            $data = $request->validated();
            
            // Process mission_vision data - simplify it
            $missionVision = [];
            foreach ($request->mission_vision_titles as $index => $title) {
                if (!empty($title) && 
                    isset($request->mission_vision_icons[$index]) && 
                    isset($request->mission_vision_descriptions[$index])) {
                    $missionVision[] = [
                        'title' => $title,
                        'icon' => $request->mission_vision_icons[$index],
                        'description' => $request->mission_vision_descriptions[$index],
                    ];
                }
            }
            
            // Handle image deletion if checkbox is checked
            if ($request->has('delete_image') && $request->boolean('delete_image')) {
                // Delete the old image if it exists
                if ($aboutUs->image) {
                    Storage::disk('public')->delete($aboutUs->image);
                }
                $aboutUs->image = null;
            }
            // Handle image upload
            elseif ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete the old image if it exists
                if ($aboutUs->image) {
                    Storage::disk('public')->delete($aboutUs->image);
                }

                $aboutUs->image = $request->file('image')->store('about-us', 'public');
            }
            
            // Update basic fields
            $aboutUs->tagline_en = $data['tagline_en'];
            $aboutUs->tagline_np = $data['tagline_np'] ?? null;
            $aboutUs->description_en = $data['description_en'];
            $aboutUs->description_np = $data['description_np'] ?? null;
            $aboutUs->years_of_experience_en = $data['years_of_experience_en'] ?? null;
            $aboutUs->years_of_experience_np = $data['years_of_experience_np'] ?? null;
            $aboutUs->short_description_en = $data['short_description_en'] ?? null;
            $aboutUs->short_description_np = $data['short_description_np'] ?? null;
            $aboutUs->video_link = $data['video_link'] ?? null;
            $aboutUs->mission_vision = $missionVision;
            $aboutUs->is_published = $request->boolean('is_published');
            $aboutUs->display_order = $data['display_order'] ?? 0;
            
            // Save the model
            $aboutUs->save();
            
            // Clear cache
            $this->clearCache();

            // Redirect to index page with success message
            return redirect('/admin/about-us')->with('success', 'About Us information updated successfully.');
            
        } catch (\Exception $e) {
            \Log::error('AboutUs update error: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect('/admin/about-us')->with('error', 'Error updating About Us: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        try {
            // Delete the image if it exists
            if ($aboutUs->image) {
                Storage::disk('public')->delete($aboutUs->image);
            }

            $aboutUs->delete();

            // Clear cache to ensure changes are visible
            $this->clearCache();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'About Us information deleted successfully.'
                ]);
            }

            return redirect()->route('about-us.index')
                ->with('success', 'About Us information deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting About Us information: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('about-us.index')
                ->with('error', 'Error deleting About Us information: ' . $e->getMessage());
        }
    }

    /**
     * Clear Laravel caches to ensure updates are visible
     */
    private function clearCache()
    {
        try {
            // Use queued jobs to prevent blocking if possible
            \Log::info('Clearing cache in AboutUsController');
            
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            
            \Log::info('Cache cleared successfully');
        } catch (\Exception $e) {
            // Log exception but don't interrupt the flow
            \Log::error('Error clearing cache: ' . $e->getMessage(), [
                'exception' => $e
            ]);
        }
    }
}
