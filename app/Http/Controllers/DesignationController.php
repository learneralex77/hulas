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
        $designations = Designation::orderBy('display_order')->paginate(10);
        return view('designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designations.create');
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
        return view('designations.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
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
        $designation->delete();

        return redirect()->route('designations.index')
            ->with('success', 'Designation deleted successfully.');
    }
}
