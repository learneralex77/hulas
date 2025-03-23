<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\NewsEventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::with('category')
            ->orderBy('display_order', 'desc')
            ->paginate(10);
        
        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = NewsEventCategory::where('is_published', true)
            ->orderBy('display_order', 'desc')
            ->get();
            
        return view('publications.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_event_category_id' => 'required|exists:news_event_categories,id',
            'publication_type' => 'required|in:News,Article,Event',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'published_by' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'external_link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = $request->all();
        
        // Handle boolean values
        $data['is_published'] = $request->has('is_published');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/publications', $imageName);
            $data['image'] = 'publications/' . $imageName;
        }
        
        Publication::create($data);
        
        return redirect()->route('publications.index')
            ->with('success', 'Publication created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        $publication->load('category');
        return view('publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $categories = NewsEventCategory::where('is_published', true)
            ->orderBy('display_order', 'desc')
            ->get();
            
        return view('publications.edit', compact('publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'news_event_category_id' => 'required|exists:news_event_categories,id',
            'publication_type' => 'required|in:News,Article,Event',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'published_by' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'external_link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = $request->all();
        
        // Handle boolean values
        $data['is_published'] = $request->has('is_published');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($publication->image && Storage::exists('public/' . $publication->image)) {
                Storage::delete('public/' . $publication->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/publications', $imageName);
            $data['image'] = 'publications/' . $imageName;
        }
        
        $publication->update($data);
        
        return redirect()->route('publications.index')
            ->with('success', 'Publication updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        // Delete image if exists
        if ($publication->image && Storage::exists('public/' . $publication->image)) {
            Storage::delete('public/' . $publication->image);
        }
        
        $publication->delete();
        
        return redirect()->route('publications.index')
            ->with('success', 'Publication deleted successfully.');
    }
}
