<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use App\Http\Requests\QuickLinkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuickLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quickLinks = QuickLink::orderBy('display_order')->get();
        return view('backend.quick-links.index', compact('quickLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.quick-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuickLinkRequest $request)
    {
        $data = $request->validated();
        QuickLink::create($data);
        
        // Clear the quick_links cache
        Cache::forget('quick_links');

        return redirect()->route('quick-links.index')
            ->with('success', 'Quick Link created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuickLink $quickLink)
    {
        return view('backend.quick-links.show', compact('quickLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuickLink $quickLink)
    {
        return view('backend.quick-links.edit', compact('quickLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuickLinkRequest $request, QuickLink $quickLink)
    {
        $data = $request->validated();
        $quickLink->update($data);
        
        // Clear the quick_links cache
        Cache::forget('quick_links');

        return redirect()->route('quick-links.index')
            ->with('success', 'Quick Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuickLink $quickLink)
    {
        try {
            $quickLink->delete();
            
            // Clear the quick_links cache
            Cache::forget('quick_links');

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Quick Link deleted successfully.'
                ]);
            }

            return redirect()->route('quick-links.index')
                ->with('success', 'Quick Link deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting quick link: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('quick-links.index')
                ->with('error', 'Error deleting quick link: ' . $e->getMessage());
        }
    }
}
