<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrievanceRequest;
use App\Models\Grievance;
use Illuminate\Http\Request;

class GrievanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grievances = Grievance::latest()->paginate(10);
        return view('backend.grievances.index', compact('grievances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.grievances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrievanceRequest $request)
    {
        try {
            // Create the grievance
            Grievance::create($request->validated());
            
            // Determine if this is a frontend or backend submission based on the referer
            $isAdmin = str_contains(url()->previous(), '/admin/');
            
            if ($isAdmin) {
                return redirect()->route('grievances.index')
                    ->with('success', 'Grievance created successfully.');
            } else {
                // This is a frontend submission
                return redirect()->back()
                    ->with('success', 'Your grievance has been submitted successfully. We will review it shortly.');
            }
        } catch (\Exception $e) {
            // Log error
            \Log::error('Grievance submission error: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'There was a problem submitting your grievance. Please try again later.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grievance $grievance)
    {
        return view('backend.grievances.show', compact('grievance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grievance $grievance)
    {
        return view('backend.grievances.edit', compact('grievance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrievanceRequest $request, Grievance $grievance)
    {
        $grievance->update($request->validated());
        
        return redirect()->route('grievances.index')
            ->with('success', 'Grievance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grievance $grievance)
    {
        $grievance->delete();
        
        return redirect()->route('grievances.index')
            ->with('success', 'Grievance deleted successfully.');
    }
} 