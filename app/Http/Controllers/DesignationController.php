<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Requests\DesignationRequest;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::orderBy('display_order')->get();
        return view('backend.designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DesignationRequest $request)
    {
        $data = $request->validated();

        Designation::create($data);

        return redirect()->route('designations.index')
            ->with('success', 'Designation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        return view('backend.designations.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('backend.designations.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DesignationRequest $request, Designation $designation)
    {
        $data = $request->validated();

        $designation->update($data);

        return redirect()->route('designations.index')
            ->with('success', 'Designation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        try {
            $designation->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Designation deleted successfully.'
                ]);
            }

            return redirect()->route('designations.index')
                ->with('success', 'Designation deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting designation: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting designation: ' . $e->getMessage());
        }
    }
}
