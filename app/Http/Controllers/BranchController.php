<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\District;
use App\Http\Requests\BranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::with('district')->orderBy('display_order')->get();
        return view('backend.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::where('is_published', true)->orderBy('name_en')->get();
        return view('backend.branches.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        try {
            $data = $request->validated();

            // Ensure phone_number is set if phone is provided
            if (isset($data['phone']) && !isset($data['phone_number'])) {
                $data['phone_number'] = $data['phone'];
            }

            $branch = Branch::create($data);

            return redirect()->route('branches.index')
                ->with('success', 'Branch created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('backend.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $districts = District::where('is_published', true)->orderBy('name_en')->get();
        return view('backend.branches.edit', compact('branch', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        try {
            $data = $request->validated();

            // Ensure phone_number is set if phone is provided
            if (isset($data['phone']) && !isset($data['phone_number'])) {
                $data['phone_number'] = $data['phone'];
            }

            $branch->update($data);

            return redirect()->route('branches.index')
                ->with('success', 'Branch updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        try {
            $branch->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Branch deleted successfully.'
                ]);
            }

            return redirect()->route('branches.index')
                ->with('success', 'Branch deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting branch: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('branches.index')
                ->with('error', 'Error deleting branch: ' . $e->getMessage());
        }
    }
}
