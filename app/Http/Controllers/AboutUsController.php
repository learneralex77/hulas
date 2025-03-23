<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('about-us.index', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if any record already exists
        $exists = AboutUs::exists();
        if ($exists) {
            return redirect()->route('about-us.index')
                ->with('error', 'About Us information already exists. You can only edit the existing record.');
        }
        
        return view('about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if any record already exists
        $exists = AboutUs::exists();
        if ($exists) {
            return redirect()->route('about-us.index')
                ->with('error', 'About Us information already exists. You can only edit the existing record.');
        }

        $request->validate([
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
            'years_of_experience' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string',
            'video_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission_vision_titles.*' => 'required|string|max:255',
            'mission_vision_icons.*' => 'required|string|max:255',
            'mission_vision_descriptions.*' => 'required|string',
        ]);

        $data = $request->except(['_token', 'image', 'mission_vision_titles', 'mission_vision_icons', 'mission_vision_descriptions']);

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store('about-us', 'public');
        }

        // Process mission and vision data
        $missionVision = [];
        if ($request->has('mission_vision_titles') && is_array($request->mission_vision_titles)) {
            foreach ($request->mission_vision_titles as $index => $title) {
                if (!empty($title) && isset($request->mission_vision_icons[$index]) && isset($request->mission_vision_descriptions[$index])) {
                    $missionVision[] = [
                        'title' => $title,
                        'icon' => $request->mission_vision_icons[$index],
                        'description' => $request->mission_vision_descriptions[$index],
                    ];
                }
            }
        }
        $data['mission_vision'] = $missionVision;

        AboutUs::create($data);

        return redirect()->route('about-us.index')
            ->with('success', 'About Us information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        return view('about-us.show', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
        return view('about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        $request->validate([
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
            'years_of_experience' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string',
            'video_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission_vision_titles.*' => 'required|string|max:255',
            'mission_vision_icons.*' => 'required|string|max:255',
            'mission_vision_descriptions.*' => 'required|string',
        ]);

        $data = $request->except(['_token', '_method', 'image', 'mission_vision_titles', 'mission_vision_icons', 'mission_vision_descriptions']);

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete the old image if it exists
            if ($aboutUs->image) {
                Storage::disk('public')->delete($aboutUs->image);
            }
            
            $data['image'] = $request->file('image')->store('about-us', 'public');
        }

        // Process mission and vision data
        $missionVision = [];
        if ($request->has('mission_vision_titles') && is_array($request->mission_vision_titles)) {
            foreach ($request->mission_vision_titles as $index => $title) {
                if (!empty($title) && isset($request->mission_vision_icons[$index]) && isset($request->mission_vision_descriptions[$index])) {
                    $missionVision[] = [
                        'title' => $title,
                        'icon' => $request->mission_vision_icons[$index],
                        'description' => $request->mission_vision_descriptions[$index],
                    ];
                }
            }
        }
        $data['mission_vision'] = $missionVision;

        $aboutUs->update($data);

        return redirect()->route('about-us.index')
            ->with('success', 'About Us information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        // Delete the image if it exists
        if ($aboutUs->image) {
            Storage::disk('public')->delete($aboutUs->image);
        }
        
        $aboutUs->delete();

        return redirect()->route('about-us.index')
            ->with('success', 'About Us information deleted successfully.');
    }
}
