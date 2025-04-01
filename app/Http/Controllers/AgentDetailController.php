<?php

namespace App\Http\Controllers;

use App\Models\AgentDetail;
use App\Models\District;
use App\Http\Requests\AgentDetailRequest;
use Illuminate\Http\Request;

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
        $districts = District::orderBy('name')->get();
        return view('backend.agent-details.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentDetailRequest $request)
    {
        $data = $request->validated();

        // Create the agent detail with JSON encoded arrays
        AgentDetail::create([
            'district_id' => $data['district_id'],
            'state_agent_name' => json_encode($data['state_agent_names'] ?? []),
            'address' => json_encode($data['addresses'] ?? []),
            'contact_no' => json_encode($data['contact_nos'] ?? []),
            'contact_person' => json_encode($data['contact_persons'] ?? []),
            'display_order' => $data['display_order'] ?? 0,
            'is_published' => (bool) $request->input('is_published', true),
        ]);

        return redirect()->route('agent-details.index')
            ->with('success', 'Agent details created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentDetail $agentDetail)
    {
        // Decode JSON data for the view and ensure they're arrays
        $agentDetail->state_agent_names = json_decode($agentDetail->state_agent_name ?? '[]', true) ?: [];
        $agentDetail->addresses = json_decode($agentDetail->address ?? '[]', true) ?: [];
        $agentDetail->contact_nos = json_decode($agentDetail->contact_no ?? '[]', true) ?: [];
        $agentDetail->contact_persons = json_decode($agentDetail->contact_person ?? '[]', true) ?: [];

        return view('backend.agent-details.show', compact('agentDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentDetail $agentDetail)
    {
        $districts = District::orderBy('name')->get();

        // Decode JSON data for the view and ensure they're arrays
        $agentDetail->state_agent_names = json_decode($agentDetail->state_agent_name ?? '[]', true) ?: [];
        $agentDetail->addresses = json_decode($agentDetail->address ?? '[]', true) ?: [];
        $agentDetail->contact_nos = json_decode($agentDetail->contact_no ?? '[]', true) ?: [];
        $agentDetail->contact_persons = json_decode($agentDetail->contact_person ?? '[]', true) ?: [];

        return view('backend.agent-details.edit', compact('agentDetail', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentDetailRequest $request, AgentDetail $agentDetail)
    {
        $data = $request->validated();

        // Update the agent detail with JSON encoded arrays
        $agentDetail->update([
            'district_id' => $data['district_id'],
            'state_agent_name' => json_encode($data['state_agent_names'] ?? []),
            'address' => json_encode($data['addresses'] ?? []),
            'contact_no' => json_encode($data['contact_nos'] ?? []),
            'contact_person' => json_encode($data['contact_persons'] ?? []),
            'display_order' => $data['display_order'] ?? 0,
            'is_published' => (bool) $request->input('is_published', true),
        ]);

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

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Agent detail deleted successfully.'
                ]);
            }

            return redirect()->route('agent-details.index')
                ->with('success', 'Agent detail deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting agent detail: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('agent-details.index')
                ->with('error', 'Error deleting agent detail: ' . $e->getMessage());
        }
    }
}
