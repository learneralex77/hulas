<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Http\Requests\ZoneRequest;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::orderBy('display_order')->get();
        return view('backend.zones.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.zones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ZoneRequest $request)
    {
        try {
            $data = $request->validated();
            $zone = Zone::create($data);

            return redirect()->route('zones.index')
                ->with('success', 'Zone created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        return view('backend.zones.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zone $zone)
    {
        return view('backend.zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ZoneRequest $request, Zone $zone)
    {
        $data = $request->validated();
        $zone->update($data);

        return redirect()->route('zones.index')
            ->with('success', 'Zone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        try {
            $zone->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Zone deleted successfully.'
                ]);
            }

            return redirect()->route('zones.index')
                ->with('success', 'Zone deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting zone: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('zones.index')
                ->with('error', 'Error deleting zone: ' . $e->getMessage());
        }
    }
}
