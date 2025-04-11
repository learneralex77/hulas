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
        $agentForms = AgentForm::orderBy('display_order')->get();
        return view('backend.agent-forms.index', compact('agentForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::where('is_published', true)->orderBy('name_en')->get();
        return view('backend.agent-forms.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentFormRequest $request)
    {
        try {
            $data = $request->validated();
            AgentForm::create($data);

            return redirect()->route('agent-forms.index')
                ->with('success', 'Agent form created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentForm $agentForm)
    {
        return view('backend.agent-forms.show', compact('agentForm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentForm $agentForm)
    {
        $districts = District::where('is_published', true)->orderBy('name_en')->get();
        return view('backend.agent-forms.edit', compact('agentForm', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentFormRequest $request, AgentForm $agentForm)
    {
        try {
            $data = $request->validated();
            $agentForm->update($data);

            return redirect()->route('agent-forms.index')
                ->with('success', 'Agent form updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
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
