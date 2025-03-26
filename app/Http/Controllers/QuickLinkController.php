<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use App\Http\Requests\QuickLinkRequest;
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
    public function store(QuickLinkRequest $request)
    {
        $data = $request->validated();
        QuickLink::create($data);

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
    public function update(QuickLinkRequest $request, QuickLink $quickLink)
    {
        $data = $request->validated();
        $quickLink->update($data);

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
