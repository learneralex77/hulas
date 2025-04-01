<?php

namespace App\Http\Controllers;

use App\Models\BecomeAnAgent;
use App\Http\Requests\BecomeAnAgentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BecomeAnAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = BecomeAnAgent::orderBy('display_order')->get();
        return view('backend.become-an-agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.become-an-agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BecomeAnAgentRequest $request)
    {
        $data = $request->validated();

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

        // Convert boolean value from checkbox
        $isPublished = $request->has('is_published') ? (bool)$request->input('is_published') : false;

        BecomeAnAgent::create([
            'images' => $imagesPaths,
            'display_order' => $data['display_order'] ?? 0,
            'is_published' => $isPublished,
        ]);

        return redirect()->route('become-an-agent.index')
            ->with('success', 'Agent information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BecomeAnAgent $becomeAnAgent)
    {
        return view('backend.become-an-agent.show', compact('becomeAnAgent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BecomeAnAgent $becomeAnAgent)
    {
        return view('backend.become-an-agent.edit', compact('becomeAnAgent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BecomeAnAgentRequest $request, BecomeAnAgent $becomeAnAgent)
    {
        $data = $request->validated();

        // Get the existing images
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

        // Handle uploaded images
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $key => $file) {
                // Skip invalid files
                if (!$file->isValid()) {
                    continue;
                }

                // Store the new image
                $path = $file->store('become-an-agent', 'public');

                // Check if we're replacing an existing image at this index
                if (isset($imagesPaths[$key])) {
                    // Delete the old image
                    Storage::disk('public')->delete($imagesPaths[$key]);
                    // Replace with new image
                    $imagesPaths[$key] = $path;
                } else {
                    // Add as a new image
                    $imagesPaths[] = $path;
                }
            }
        }

        // Ensure we have at least one image
        if (empty($imagesPaths)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['images' => 'At least one image is required. Please add a new image.']);
        }

        // Reindex the array to ensure sequential keys
        $imagesPaths = array_values($imagesPaths);

        // Convert boolean value from checkbox
        $isPublished = $request->has('is_published') ? (bool)$request->input('is_published') : false;

        // Update the record
        $becomeAnAgent->update([
            'images' => $imagesPaths,
            'display_order' => $data['display_order'] ?? 0,
            'is_published' => $isPublished,
        ]);

        return redirect()->route('become-an-agent.index')
            ->with('success', 'Agent information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BecomeAnAgent $becomeAnAgent)
    {
        try {
            // Delete all associated images from storage
            if (!empty($becomeAnAgent->images) && is_array($becomeAnAgent->images)) {
                foreach ($becomeAnAgent->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $becomeAnAgent->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Agent information deleted successfully.'
                ]);
            }

            return redirect()->route('become-an-agent.index')
                ->with('success', 'Agent information deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting agent information: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('become-an-agent.index')
                ->with('error', 'Error deleting agent information: ' . $e->getMessage());
        }
    }

    /**
     * Delete a specific image from the become an agent record.
     */
    public function deleteImage(BecomeAnAgent $becomeAnAgent, $index)
    {
        $images = $becomeAnAgent->images ?? [];

        if (isset($images[$index])) {
            // Delete the file from storage
            Storage::disk('public')->delete($images[$index]);

            // Remove from the array
            unset($images[$index]);

            // Reindex the array
            $images = array_values($images);

            // Update the record
            $becomeAnAgent->update(['images' => $images]);

            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }
}
