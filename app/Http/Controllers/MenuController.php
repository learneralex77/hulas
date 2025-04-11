<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\MenuRequest;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('display_order')->get();

        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentMenus = Menu::orderBy('name_en')->get();
        return view('backend.menus.create', compact('parentMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request['name_en']);

        Menu::create($data);

        return redirect()->route('menus.index')
            ->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('backend.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $parentMenus = Menu::where('id', '!=', $menu->id)
            ->orderBy('name_en')
            ->get();

        return view('backend.menus.edit', compact('menu', 'parentMenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        // Get validated data
        $validated = $request->validated();

        // Generate slug from menu name
        $validated['slug'] = Str::slug($validated['name_en']);

        $menu->update($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu deleted successfully.'
                ]);
            }

            return redirect()->route('menus.index')
                ->with('success', 'Menu deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting menu: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting menu: ' . $e->getMessage());
        }
    }
}
