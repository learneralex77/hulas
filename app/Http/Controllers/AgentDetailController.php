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
        $agentDetails = AgentDetail::with('district')->paginate(10);
        return view('agent-details.index', compact('agentDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::orderBy('name')->get();
        return view('agent-details.create', compact('districts'));
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
        
        return view('agent-details.show', compact('agentDetail'));
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
        
        return view('agent-details.edit', compact('agentDetail', 'districts'));
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
        ]);

        return redirect()->route('agent-details.index')
            ->with('success', 'Agent details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentDetail $agentDetail)
    {
        $agentDetail->delete();

        return redirect()->route('agent-details.index')
            ->with('success', 'Agent details deleted successfully.');
    }
}
