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
        $pages = Page::with('menu')->paginate(10);
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where('is_published', true)->get();
        return view('pages.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        // Log the incoming request for debugging
        \Log::info('Page store method called', [
            'request_data' => $request->all(),
            'request_method' => $request->method(),
            'request_ajax' => $request->ajax(),
            'request_path' => $request->path(),
        ]);
        
        try {
            $data = $request->validated();
            \Log::info('Validation passed', ['validated_data' => $data]);
            
            // Generate slug from title
            $data['slug'] = Str::slug($request->title);
            \Log::info('Generated slug', ['slug' => $data['slug']]);
            
            // Handle image upload
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('pages', 'public');
                \Log::info('Image uploaded', ['image_path' => $data['image']]);
            }

            // Create the page
            $page = Page::create($data);
            \Log::info('Page created successfully', ['page_id' => $page->id, 'page_data' => $page->toArray()]);

            // Redirect with success message
            return redirect()->route('pages.index')
                ->with('success', 'Page created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error creating page', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $menus = Menu::where('is_published', true)->get();
        return view('pages.edit', compact('page', 'menus'));
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
        // Delete associated image if exists
        if ($page->image && Storage::disk('public')->exists($page->image)) {
            Storage::disk('public')->delete($page->image);
        }
        
        $page->delete();

        return redirect()->route('pages.index')
            ->with('success', 'Page deleted successfully.');
    }
} 