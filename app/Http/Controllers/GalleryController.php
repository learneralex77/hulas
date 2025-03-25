<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('display_order')->paginate(10);
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'links' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
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
        
        // Set boolean values
        $data['is_featured'] = $request->has('is_featured');
        $data['is_published'] = $request->has('is_published');
        
        Gallery::create($data);

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'links' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $gallery = Gallery::findOrFail($id);
        $data = $request->all();
        
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
        
        // Set boolean values
        $data['is_featured'] = $request->has('is_featured');
        $data['is_published'] = $request->has('is_published');
        
        $gallery->update($data);

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Delete featured image
        if ($gallery->featured_image && Storage::disk('public')->exists($gallery->featured_image)) {
            Storage::disk('public')->delete($gallery->featured_image);
        }
        
        // Delete all gallery images
        if (!empty($gallery->images)) {
            foreach ($gallery->images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
        
        $gallery->delete();

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery deleted successfully.');
    }
}
