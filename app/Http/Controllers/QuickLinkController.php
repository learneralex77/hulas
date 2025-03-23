<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quickLinks = QuickLink::orderBy('display_order')->get();
        return view('quick-links.index', compact('quickLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quick-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'external_link' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        // Set is_published to false if not in request
        $validated['is_published'] = $request->has('is_published');

        QuickLink::create($validated);

        return redirect()->route('quick-links.index')
            ->with('success', 'Quick Link created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuickLink $quickLink)
    {
        return view('quick-links.show', compact('quickLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuickLink $quickLink)
    {
        return view('quick-links.edit', compact('quickLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuickLink $quickLink)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'external_link' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        // Set is_published to false if not in request
        $validated['is_published'] = $request->has('is_published');

        $quickLink->update($validated);

        return redirect()->route('quick-links.index')
            ->with('success', 'Quick Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuickLink $quickLink)
    {
        $quickLink->delete();

        return redirect()->route('quick-links.index')
            ->with('success', 'Quick Link deleted successfully.');
    }
}
