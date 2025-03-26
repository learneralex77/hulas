<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('display_order')->paginate(10);
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $parentMenus = Menu::orderBy('bname')->get();
        return view('menus.create', compact('parentMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        // Get validated data
        $validated = $request->validated();
        
        // Generate slug from menu name
        $validated['slug'] = Str::slug($validated['bname']);

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
    public function edit(Menu $menu, Request $request)
    {
        $parentMenus = Menu::where('id', '!=', $menu->id)
            ->orderBy('bname')
            ->get();
        
        return view('menus.edit', compact('menu', 'parentMenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        // Get validated data
        $validated = $request->validated();
        
        // Generate slug from menu name
        $validated['slug'] = Str::slug($validated['bname']);

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
