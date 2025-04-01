<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('display_order')->get();
        return view('backend.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();

        Department::create($data);

        return redirect()->route('departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('backend.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('backend.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $data = $request->validated();

        $department->update($data);

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Department deleted successfully.'
                ]);
            }

            return redirect()->route('departments.index')
                ->with('success', 'Department deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting department: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting department: ' . $e->getMessage());
        }
    }
}
