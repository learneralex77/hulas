<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('display_order')->get();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentMenus = Menu::orderBy('bname')->get();
        return view('menus.create', compact('parentMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        // Generate slug from bname
        $validated['slug'] = Str::slug($validated['bname']);
        
        // Set is_published to false if not in request
        $validated['is_published'] = $request->has('is_published');

        Menu::create($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $parentMenus = Menu::where('id', '!=', $menu->id)
            ->orderBy('bname')
            ->get();
        
        return view('menus.edit', compact('menu', 'parentMenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'bname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        // Generate slug from bname
        $validated['slug'] = Str::slug($validated['bname']);
        
        // Set is_published to false if not in request
        $validated['is_published'] = $request->has('is_published');

        $menu->update($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Update any child menus to have null parent_id
        Menu::where('parent_id', $menu->id)
            ->update(['parent_id' => null]);
            
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu deleted successfully.');
    }
}
