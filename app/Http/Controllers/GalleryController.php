<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('display_order')->get();
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->validated();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('galleries/featured', 'public');
            $data['featured_image'] = $imagePath;
        }
        
        // Handle multiple gallery images upload
        $images = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('galleries/images', 'public');
                $images[] = $path;
            }
            $data['images'] = $images;
        }
        
        Gallery::create($data);

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $data = $request->validated();
        
        // Handle featured image deletion
        if ($request->has('delete_featured_image') && $request->delete_featured_image == 1 && !$request->hasFile('featured_image')) {
            if ($gallery->featured_image && Storage::disk('public')->exists($gallery->featured_image)) {
                Storage::disk('public')->delete($gallery->featured_image);
            }
            $data['featured_image'] = null;
        }
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($gallery->featured_image && Storage::disk('public')->exists($gallery->featured_image)) {
                Storage::disk('public')->delete($gallery->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('galleries/featured', 'public');
            $data['featured_image'] = $imagePath;
        }
        
        // Handle multiple gallery images upload
        if ($request->hasFile('gallery_images')) {
            $existingImages = $gallery->images ?? [];
            
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('galleries/images', 'public');
                $existingImages[] = $path;
            }
            
            $data['images'] = $existingImages;
        }
        
        // Handle image deletions if any
        if ($request->has('delete_images')) {
            $imagesToKeep = [];
            $currentImages = $gallery->images ?? [];
            
            foreach ($currentImages as $image) {
                if (!in_array($image, $request->delete_images)) {
                    $imagesToKeep[] = $image;
                } else {
                    // Delete the image file
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
            
            $data['images'] = $imagesToKeep;
        }
        
        $gallery->update($data);

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            // Delete the featured image if it exists
            if ($gallery->featured_image && Storage::disk('public')->exists($gallery->featured_image)) {
                Storage::disk('public')->delete($gallery->featured_image);
            }
            
            // Delete all gallery images if they exist
            if (!empty($gallery->images)) {
                foreach ($gallery->images as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
            
            $gallery->delete();
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Gallery deleted successfully.'
                ]);
            }

            return redirect()->route('galleries.index')
                ->with('success', 'Gallery deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting gallery: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting gallery: ' . $e->getMessage());
        }
    }
}
