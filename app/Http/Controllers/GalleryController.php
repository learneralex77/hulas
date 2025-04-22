<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('display_order')->get();
        return view('backend.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $gallery = new Gallery();
        return view('backend.galleries.create', compact('gallery'));
    }

    public function store(GalleryRequest $request)
    {
        // Create the gallery with validated data
        $gallery = new Gallery($request->safe()->except(['featured_image', 'gallery_images']));
        
        // Generate a unique slug
        $gallery->slug = Str::slug($request->title_en) ;
        
        // Set boolean values
        $gallery->is_featured = $request->has('is_featured') ? 1 : 0;
        $gallery->is_published = $request->has('is_published') ? 1 : 0;
        
        // Save the gallery first to get an ID
        $gallery->save();
        
        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $path = $featuredImage->store('galleries/featured', 'public');
            $gallery->featured_image = $path;
            $gallery->save();
        }
        
        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $images = [];
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('galleries/images', 'public');
                $images[] = $path;
            }
            $gallery->images = $images;
            $gallery->save();
        }

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery created successfully.');
    }

    public function show(Gallery $gallery)
    {
        return view('backend.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.galleries.edit', compact('gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        // Update the gallery with validated data excluding file fields
        $gallery->fill($request->safe()->except(['featured_image', 'gallery_images', 'delete_featured_image', 'delete_images']));
        
        // Set boolean values
        $gallery->is_featured = $request->has('is_featured') ? 1 : 0;
        $gallery->is_published = $request->has('is_published') ? 1 : 0;
        
        // Handle featured image deletion
        if ($request->has('delete_featured_image') && $gallery->featured_image) {
            Storage::disk('public')->delete($gallery->featured_image);
            $gallery->featured_image = null;
        }
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if it exists
            if ($gallery->featured_image) {
                Storage::disk('public')->delete($gallery->featured_image);
            }
            
            // Upload new image
            $featuredImage = $request->file('featured_image');
            $path = $featuredImage->store('galleries/featured', 'public');
            $gallery->featured_image = $path;
        }
        
        // Handle gallery images deletion
        if ($request->has('delete_images') && is_array($request->delete_images)) {
            $currentImages = $gallery->images ?? [];
            $updatedImages = [];
            
            foreach ($currentImages as $image) {
                if (!in_array($image, $request->delete_images)) {
                    $updatedImages[] = $image;
                } else {
                    Storage::disk('public')->delete($image);
                }
            }
            
            $gallery->images = $updatedImages;
        }
        
        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $currentImages = $gallery->images ?? [];
            
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('galleries/images', 'public');
                $currentImages[] = $path;
            }
            
            $gallery->images = $currentImages;
        }
        
        $gallery->save();

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete featured image
        if ($gallery->featured_image) {
            Storage::disk('public')->delete($gallery->featured_image);
        }
        
        // Delete all gallery images
        if (!empty($gallery->images) && is_array($gallery->images)) {
            foreach ($gallery->images as $image) {
                if ($image) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
        
        $gallery->delete();

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery deleted successfully.');
    }
}
