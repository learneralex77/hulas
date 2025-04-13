<?php

namespace App\Http\Controllers;

use App\Models\BecomeAnAgent;
use App\Http\Requests\BecomeAnAgentRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BecomeAnAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = BecomeAnAgent::latest()->get();
        return view('backend.become-an-agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.become-an-agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BecomeAnAgentRequest $request): RedirectResponse
    {
        try {
            // Validate and get data
            $data = $request->validated();
            
            // Set default value for is_contacted
            $data['is_contacted'] = false;
            
            // Create the record
            BecomeAnAgent::create($data);

            $redirect = url()->previous() ?: route('become-an-agent.index');
            
            return redirect($redirect)
                ->with('success', 'Agent request submitted successfully.');
        } catch (\Exception $e) {
            // Log error
            \Log::error('Agent request form submission error: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'There was a problem submitting your request. Please try again later.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BecomeAnAgent $becomeAnAgent)
    {
        return view('backend.become-an-agent.show', compact('becomeAnAgent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BecomeAnAgent $becomeAnAgent)
    {
        return view('backend.become-an-agent.edit', compact('becomeAnAgent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BecomeAnAgent $becomeAnAgent): RedirectResponse
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'contact_number' => ['required', 'string', 'max:20'],
                'email' => ['required', 'email', 'max:255'],
                'district' => ['required', 'string', 'max:100'],
                'message' => ['required', 'string'],
                'is_contacted' => ['boolean'],
            ]);
            
            // Handle is_contacted checkbox
            $data['is_contacted'] = $request->has('is_contacted');
            
            $becomeAnAgent->update($data);

            return redirect()->route('become-an-agent.index')
                ->with('success', 'Agent information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BecomeAnAgent $becomeAnAgent): RedirectResponse
    {
        try {
            $becomeAnAgent->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Agent information deleted successfully.'
                ]);
            }

            return redirect()->route('become-an-agent.index')
                ->with('success', 'Agent information deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting agent information: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('become-an-agent.index')
                ->with('error', 'Error deleting agent information: ' . $e->getMessage());
        }
    }
    
    /**
     * Mark an agent request as contacted or not contacted.
     */
    public function toggleContactStatus(BecomeAnAgent $becomeAnAgent): RedirectResponse
    {
        try {
            $becomeAnAgent->update([
                'is_contacted' => !$becomeAnAgent->is_contacted
            ]);
            
            return redirect()->back()
                ->with('success', 'Agent contact status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
