<?php

namespace App\Http\Controllers;

use App\Models\NewsEventCategory;
use App\Http\Requests\NewsEventCategoryRequest;
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
    public function store(NewsEventCategoryRequest $request)
    {
        $data = $request->validated();
        
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
    public function update(NewsEventCategoryRequest $request, NewsEventCategory $newsEventCategory)
    {
        $data = $request->validated();
        
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
        try {
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
}
