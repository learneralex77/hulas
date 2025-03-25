<?php

namespace App\Http\Controllers;

use App\Models\NewsEventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsEventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = NewsEventCategory::orderBy('display_order')->paginate(10);
        return view('news-event-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news-event-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        // Generate slug if empty
        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        
        NewsEventCategory::create($data);

        return redirect()->route('news-event-categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsEventCategory $newsEventCategory)
    {
        return view('news-event-categories.show', compact('newsEventCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsEventCategory $newsEventCategory)
    {
        return view('news-event-categories.edit', compact('newsEventCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsEventCategory $newsEventCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        // Generate slug if empty
        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        
        $newsEventCategory->update($data);

        return redirect()->route('news-event-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsEventCategory $newsEventCategory)
    {
        $newsEventCategory->delete();

        return redirect()->route('news-event-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
