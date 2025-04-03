<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use App\Http\Requests\PopupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popups = Popup::orderBy('display_order')->get();
        return view('backend.popups.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.popups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PopupRequest $request)
    {
        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $request->file('image')->store('popups', 'public');
            }

            $popup = Popup::create($data);

            return redirect()->route('popups.index')
                ->with('success', 'Popup created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Popup $popup)
    {
        return view('backend.popups.show', compact('popup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Popup $popup)
    {
        return view('backend.popups.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PopupRequest $request, Popup $popup)
    {
        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete old image if exists
                if ($popup->image) {
                    Storage::disk('public')->delete($popup->image);
                }
                $data['image'] = $request->file('image')->store('popups', 'public');
            } elseif ($request->has('delete_image') && $request->delete_image) {
                // Delete image if delete_image is checked
                if ($popup->image) {
                    Storage::disk('public')->delete($popup->image);
                }
                $data['image'] = null;
            } else {
                // Keep existing image
                unset($data['image']);
            }

            $popup->update($data);

            return redirect()->route('popups.index')
                ->with('success', 'Popup updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Popup $popup)
    {
        try {
            // Delete image if exists
            if ($popup->image) {
                Storage::disk('public')->delete($popup->image);
            }

            $popup->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Popup deleted successfully.'
                ]);
            }

            return redirect()->route('popups.index')
                ->with('success', 'Popup deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting popup: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('popups.index')
                ->with('error', 'Error deleting popup: ' . $e->getMessage());
        }
    }
} 