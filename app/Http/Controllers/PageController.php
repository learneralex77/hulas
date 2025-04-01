<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::with('menu')->get();
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where('is_published', true)->get();
        return view('backend.pages.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        try {
            $data = $request->validated();

            // Generate slug from title
            $data['slug'] = Str::slug($request->title);

            // Handle image upload
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('pages', 'public');
            }

            // Create the page
            $page = Page::create($data);

            // Redirect with success message
            return redirect()->route('pages.index')
                ->with('success', 'Page created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('backend.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $menus = Menu::where('is_published', true)->get();
        return view('backend.pages.edit', compact('page', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $data = $request->validated();

        // Generate slug from title if title is changed
        if ($request->title != $page->title) {
            $data['slug'] = Str::slug($request->title);
        }

        // Handle image deletion if checkbox is checked
        if ($request->has('delete_image') && $request->delete_image == 1) {
            if ($page->image && Storage::disk('public')->exists($page->image)) {
                Storage::disk('public')->delete($page->image);
            }
            $data['image'] = null;
        }
        // Handle image upload
        elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($page->image && Storage::disk('public')->exists($page->image)) {
                Storage::disk('public')->delete($page->image);
            }

            $data['image'] = $request->file('image')->store('pages', 'public');
        }

        $page->update($data);

        return redirect()->route('pages.index')
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        try {
            // Delete associated image if exists
            if ($page->image && Storage::disk('public')->exists($page->image)) {
                Storage::disk('public')->delete($page->image);
            }

            $page->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Page deleted successfully.'
                ]);
            }

            return redirect()->route('pages.index')
                ->with('success', 'Page deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting page: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting page: ' . $e->getMessage());
        }
    }
}
