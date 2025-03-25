<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::orderBy('display_order')->paginate(10);
        return view('zones.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Log incoming request data for debugging
        \Log::info('Zone store method called', [
            'request_data' => $request->all(),
            'request_method' => $request->method(),
            'request_path' => $request->path(),
        ]);
        
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'display_order' => 'nullable|integer',
                'is_published' => 'nullable|boolean',
            ]);
            
            \Log::info('Zone validation passed');
            
            $data = $request->all();
            
            // Set boolean values
            $data['is_published'] = $request->has('is_published');
            
            \Log::info('Attempting to create zone', ['data' => $data]);
            
            $zone = Zone::create($data);
            
            \Log::info('Zone created successfully', ['zone_id' => $zone->id]);
            
            return redirect()->route('zones.index')
                ->with('success', 'Zone created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error creating zone', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        return view('zones.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zone $zone)
    {
        return view('zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        $zone->update($data);

        return redirect()->route('zones.index')
            ->with('success', 'Zone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        $zone->delete();

        return redirect()->route('zones.index')
            ->with('success', 'Zone deleted successfully.');
    }
}
