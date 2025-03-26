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
        $branches = Branch::with('district')->orderBy('display_order')->paginate(10);
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::where('is_published', true)->orderBy('name')->get();
        return view('branches.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        // Log incoming request data for debugging
        \Log::info('Branch store method called', [
            'request_data' => $request->all(),
            'request_method' => $request->method(),
            'request_path' => $request->path(),
        ]);
        
        try {
            $data = $request->validated();
            
            \Log::info('Branch validation passed');
            
            \Log::info('Attempting to create branch', ['data' => $data]);
            
            $branch = Branch::create($data);
            
            \Log::info('Branch created successfully', ['branch_id' => $branch->id]);
            
            return redirect()->route('branches.index')
                ->with('success', 'Branch created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error creating branch', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $districts = District::where('is_published', true)->orderBy('name')->get();
        return view('branches.edit', compact('branch', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $data = $request->validated();
        
        $branch->update($data);

        return redirect()->route('branches.index')
            ->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
            ->with('success', 'Branch deleted successfully.');
    }
}
