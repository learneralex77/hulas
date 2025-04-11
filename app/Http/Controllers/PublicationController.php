<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\NewsEventCategory;
use App\Http\Requests\PublicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::with('category')
            ->orderBy('display_order', 'desc')
            ->get();

        return view('backend.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = NewsEventCategory::where('is_published', true)
            ->orderBy('display_order', 'desc')
            ->get();

        return view('backend.publications.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title_en) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/publications', $imageName);
            $data['image'] = 'publications/' . $imageName;
        }

        Publication::create($data);

        return redirect()->route('publications.index')
            ->with('success', 'Publication created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        $publication->load('category');
        return view('backend.publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $categories = NewsEventCategory::where('is_published', true)
            ->orderBy('display_order', 'desc')
            ->get();

        return view('backend.publications.edit', compact('publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($publication->image && Storage::exists('public/' . $publication->image)) {
                Storage::delete('public/' . $publication->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title_en) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/publications', $imageName);
            $data['image'] = 'publications/' . $imageName;
        }

        $publication->update($data);

        return redirect()->route('publications.index')
            ->with('success', 'Publication updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        try {
            // Delete image if exists
            if ($publication->image && Storage::exists('public/' . $publication->image)) {
                Storage::delete('public/' . $publication->image);
            }

            $publication->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Publication deleted successfully.'
                ]);
            }

            return redirect()->route('publications.index')
                ->with('success', 'Publication deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting publication: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('publications.index')
                ->with('error', 'Error deleting publication: ' . $e->getMessage());
        }
    }
}
