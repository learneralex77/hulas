<?php

namespace App\Http\Controllers;

use App\Models\AgentDetail;
use App\Models\District;
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
    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'state_agent_names.*' => 'required|string|max:255',
            'addresses.*' => 'nullable|string',
            'contact_nos.*' => 'nullable|string|max:20',
            'contact_persons.*' => 'nullable|string|max:255',
        ]);

        // Create the agent detail with JSON encoded arrays
        AgentDetail::create([
            'district_id' => $request->input('district_id'),
            'state_agent_name' => json_encode($request->input('state_agent_names', [])),
            'address' => json_encode($request->input('addresses', [])),
            'contact_no' => json_encode($request->input('contact_nos', [])),
            'contact_person' => json_encode($request->input('contact_persons', [])),
        ]);

        return redirect()->route('agent-details.index')
            ->with('success', 'Agent details created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentDetail $agentDetail)
    {
        // Decode JSON data for the view
        $agentDetail->state_agent_names = json_decode($agentDetail->state_agent_name ?: '[]') ?: [];
        $agentDetail->addresses = json_decode($agentDetail->address ?: '[]') ?: [];
        $agentDetail->contact_nos = json_decode($agentDetail->contact_no ?: '[]') ?: [];
        $agentDetail->contact_persons = json_decode($agentDetail->contact_person ?: '[]') ?: [];
        
        return view('agent-details.show', compact('agentDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentDetail $agentDetail)
    {
        $districts = District::orderBy('name')->get();
        
        // Decode JSON data for the view
        $agentDetail->state_agent_names = json_decode($agentDetail->state_agent_name ?: '[]') ?: [];
        $agentDetail->addresses = json_decode($agentDetail->address ?: '[]') ?: [];
        $agentDetail->contact_nos = json_decode($agentDetail->contact_no ?: '[]') ?: [];
        $agentDetail->contact_persons = json_decode($agentDetail->contact_person ?: '[]') ?: [];
        
        return view('agent-details.edit', compact('agentDetail', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgentDetail $agentDetail)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'state_agent_names.*' => 'required|string|max:255',
            'addresses.*' => 'nullable|string',
            'contact_nos.*' => 'nullable|string|max:20',
            'contact_persons.*' => 'nullable|string|max:255',
        ]);

        // Update the agent detail with JSON encoded arrays
        $agentDetail->update([
            'district_id' => $request->input('district_id'),
            'state_agent_name' => json_encode($request->input('state_agent_names', [])),
            'address' => json_encode($request->input('addresses', [])),
            'contact_no' => json_encode($request->input('contact_nos', [])),
            'contact_person' => json_encode($request->input('contact_persons', [])),
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
