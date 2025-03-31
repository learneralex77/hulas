<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::orderBy('display_order')->get();
        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('districts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        District::create($data);

        return redirect()->route('districts.index')
            ->with('success', 'District created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        return view('districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DistrictRequest $request, District $district)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        $district->update($data);

        return redirect()->route('districts.index')
            ->with('success', 'District updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        try {
            $district->delete();
            
            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'District deleted successfully.'
                ]);
            }
            
            return redirect()->route('districts.index')
                ->with('success', 'District deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting district: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('districts.index')
                ->with('error', 'Error deleting district: ' . $e->getMessage());
        }
    }
}
