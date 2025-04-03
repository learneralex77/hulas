<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('display_order')->get();
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $request->file('image')->store('sliders', 'public');
            }

            $slider = Slider::create($data);

            return redirect()->route('sliders.index')
                ->with('success', 'Slider created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('backend.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete old image if exists
                if ($slider->image) {
                    Storage::disk('public')->delete($slider->image);
                }
                $data['image'] = $request->file('image')->store('sliders', 'public');
            } elseif ($request->has('delete_image') && $request->delete_image) {
                // Delete image if delete_image is checked
                if ($slider->image) {
                    Storage::disk('public')->delete($slider->image);
                }
                $data['image'] = null;
            } else {
                // Keep existing image
                unset($data['image']);
            }

            $slider->update($data);

            return redirect()->route('sliders.index')
                ->with('success', 'Slider updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {
            // Delete image if exists
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }

            $slider->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Slider deleted successfully.'
                ]);
            }

            return redirect()->route('sliders.index')
                ->with('success', 'Slider deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting slider: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('sliders.index')
                ->with('error', 'Error deleting slider: ' . $e->getMessage());
        }
    }
} 