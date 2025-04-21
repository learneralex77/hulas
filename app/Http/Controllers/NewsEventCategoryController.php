<?php

namespace App\Http\Controllers;

use App\Models\NewsEventCategory;
use App\Http\Requests\NewsEventCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsEventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = NewsEventCategory::orderBy('display_order')->get();
        return view('backend.news-event-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news-event-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsEventCategoryRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news-event-categories', 'public');
            $data['image'] = $imagePath;
        }

        // Ensure is_published is properly set
        $data['is_published'] = isset($data['is_published']) ? (bool)$data['is_published'] : false;

        NewsEventCategory::create($data);

        return redirect()->route('news-event-categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsEventCategory $newsEventCategory)
    {
        return view('backend.news-event-categories.show', compact('newsEventCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsEventCategory $newsEventCategory)
    {
        return view('backend.news-event-categories.edit', compact('newsEventCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsEventCategoryRequest $request, NewsEventCategory $newsEventCategory)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($newsEventCategory->image && Storage::disk('public')->exists($newsEventCategory->image)) {
                Storage::disk('public')->delete($newsEventCategory->image);
            }
            
            $imagePath = $request->file('image')->store('news-event-categories', 'public');
            $data['image'] = $imagePath;
        }

        // Handle image deletion if requested
        if ($request->has('delete_image') && $request->delete_image == 1) {
            if ($newsEventCategory->image && Storage::disk('public')->exists($newsEventCategory->image)) {
                Storage::disk('public')->delete($newsEventCategory->image);
            }
            $data['image'] = null;
        }

        // Ensure is_published is properly set
        $data['is_published'] = isset($data['is_published']) ? (bool)$data['is_published'] : false;

        $newsEventCategory->update($data);

        return redirect()->route('news-event-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsEventCategory $newsEventCategory)
    {
        try {
            // Delete image if exists
            if ($newsEventCategory->image && Storage::disk('public')->exists($newsEventCategory->image)) {
                Storage::disk('public')->delete($newsEventCategory->image);
            }
            
            $newsEventCategory->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category deleted successfully.'
                ]);
            }

            return redirect()->route('news-event-categories.index')
                ->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting category: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('news-event-categories.index')
                ->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

    /**
     * Generate slugs for all existing news event categories.
     */
    public function generateSlugs()
    {
        $categories = NewsEventCategory::whereNull('slug')->orWhere('slug', '')->get();
        $count = 0;

        foreach ($categories as $category) {
            $category->slug = NewsEventCategory::generateUniqueSlug($category->name_en);
            $category->save();
            $count++;
        }

        return redirect()->route('news-event-categories.index')
            ->with('success', "{$count} categories updated with slugs.");
    }
}
