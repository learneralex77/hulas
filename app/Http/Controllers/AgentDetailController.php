<?php

namespace App\Http\Controllers;

use App\Models\AgentDetail;
use App\Models\District;
use App\Http\Requests\AgentDetailRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AgentDetailsImport;
use App\Exports\AgentDetailsExport;
use Illuminate\Support\Facades\Storage;

class AgentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentDetails = AgentDetail::orderBy('display_order')->get();
        return view('backend.agent-details.index', compact('agentDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::orderBy('name_en')->get();
        return view('backend.agent-details.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentDetailRequest $request)
    {
        $data = $request->validated();
        AgentDetail::create($data);
        return redirect()->route('agent-details.index')
            ->with('success', 'Agent details created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentDetail $agentDetail)
    {
        return view('backend.agent-details.show', compact('agentDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentDetail $agentDetail)
    {
        $districts = District::orderBy('name_en')->get();
        return view('backend.agent-details.edit', compact('agentDetail', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentDetailRequest $request, AgentDetail $agentDetail)
    {
        $data = $request->validated();


        $agentDetail->update($data);

        return redirect()->route('agent-details.index')
            ->with('success', 'Agent details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentDetail $agentDetail)
    {
        try {
            $agentDetail->delete();


            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Agent detail deleted successfully.'
                ]);
            }

            return redirect()->route('agent-details.index')
                ->with('success', 'Agent detail deleted successfully.');
        } catch (\Exception $e) {

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting agent detail: ' . $e->getMessage()
                ], 500);
            }


            return redirect()->route('agent-details.index')
                ->with('error', 'Error deleting agent detail: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new AgentDetailsExport, 'agent_details.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv,xls']);

        // Store file
        $filePath = $request->file('file')->store('imports');

        try {
            // Import data using relative path
            Excel::import(new AgentDetailsImport, $filePath);

            // Delete file after import
            Storage::delete($filePath);

            return redirect()->route('agent-details.index')
                ->with('success', 'Agent details imported successfully.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('agent-details.index')
                ->with('error', 'Error during import: ' . $e->getMessage());
        }
    }
}
