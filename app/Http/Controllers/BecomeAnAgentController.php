<?php

namespace App\Http\Controllers;

use App\Models\BecomeAnAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BecomeAnAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = BecomeAnAgent::latest()->paginate(10);
        return view('become-an-agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('become-an-agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagesPaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('become-an-agent', 'public');
                    $imagesPaths[] = $path;
                }
            }
        }

        if (empty($imagesPaths)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['images' => 'At least one valid image is required.']);
        }

        BecomeAnAgent::create([
            'images' => $imagesPaths,
        ]);

        return redirect()->route('become-an-agent.index')
            ->with('success', 'Agent information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BecomeAnAgent $becomeAnAgent)
    {
        return view('become-an-agent.show', compact('becomeAnAgent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BecomeAnAgent $becomeAnAgent)
    {
        return view('become-an-agent.edit', compact('becomeAnAgent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BecomeAnAgent $becomeAnAgent)
    {
        $request->validate([
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'numeric',
        ]);

        $imagesPaths = $becomeAnAgent->images ?? [];

        // Handle image deletions
        if ($request->has('delete_images') && is_array($request->delete_images)) {
            foreach ($request->delete_images as $index) {
                if (isset($imagesPaths[$index])) {
                    // Delete the image from storage
                    Storage::disk('public')->delete($imagesPaths[$index]);
                    // Remove from the array
                    unset($imagesPaths[$index]);
                }
            }
            // Reindex the array
            $imagesPaths = array_values($imagesPaths);
        }

        // Handle new image uploads
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('become-an-agent', 'public');
                    $imagesPaths[] = $path;
                }
            }
        }

        // Validate that at least one image remains or has been added
        if (empty($imagesPaths)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['new_images' => 'At least one image is required. Please add a new image.']);
        }

        $becomeAnAgent->update([
            'images' => $imagesPaths,
        ]);

        return redirect()->route('become-an-agent.index')
            ->with('success', 'Agent information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BecomeAnAgent $becomeAnAgent)
    {
        // Delete all associated images from storage
        if (!empty($becomeAnAgent->images)) {
            foreach ($becomeAnAgent->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $becomeAnAgent->delete();

        return redirect()->route('become-an-agent.index')
            ->with('success', 'Agent information deleted successfully.');
    }

    /**
     * Remove a specific image from an agent.
     */
    public function deleteImage(Request $request, BecomeAnAgent $becomeAnAgent, $index)
    {
        $imagesPaths = $becomeAnAgent->images;
        
        if (isset($imagesPaths[$index])) {
            // Delete the image from storage
            Storage::disk('public')->delete($imagesPaths[$index]);
            
            // Remove from the array
            unset($imagesPaths[$index]);
            
            // Reindex the array
            $imagesPaths = array_values($imagesPaths);
            
            // Update the database
            $becomeAnAgent->update([
                'images' => $imagesPaths,
            ]);
            
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false], 404);
    }
}
