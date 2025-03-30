<?php

namespace App\Http\Controllers;

use App\Models\AgentForm;
use App\Models\District;
use App\Http\Requests\AgentFormRequest;
use Illuminate\Http\Request;

class AgentFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentForms = AgentForm::with('district')->latest()->paginate(10);
        return view('agent-forms.index', compact('agentForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::where('is_published', true)->orderBy('name')->get();
        return view('agent-forms.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentFormRequest $request)
    {
        $data = $request->validated();
        
        // Map 'phone' to 'number' for database
        if (isset($data['phone'])) {
            $data['number'] = $data['phone'];
            unset($data['phone']);
        }
        
        AgentForm::create($data);

        return redirect()->route('agent-forms.index')
            ->with('success', 'Agent form created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentForm $agentForm)
    {
        return view('agent-forms.show', compact('agentForm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentForm $agentForm)
    {
        $districts = District::where('is_published', true)->orderBy('name')->get();
        return view('agent-forms.edit', compact('agentForm', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentFormRequest $request, AgentForm $agentForm)
    {
        $data = $request->validated();
        
        // Map 'phone' to 'number' for database
        if (isset($data['phone'])) {
            $data['number'] = $data['phone'];
            unset($data['phone']);
        }
        
        $agentForm->update($data);

        return redirect()->route('agent-forms.index')
            ->with('success', 'Agent form updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentForm $agentForm)
    {
        try {
            $agentForm->delete();
            
            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Agent form deleted successfully.'
                ]);
            }
            
            return redirect()->route('agent-forms.index')
                ->with('success', 'Agent form deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting agent form: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('agent-forms.index')
                ->with('error', 'Error deleting agent form: ' . $e->getMessage());
        }
    }
}
