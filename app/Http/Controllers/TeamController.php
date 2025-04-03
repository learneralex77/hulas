<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderBy('display_order')->get();
        return view('backend.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teamTypes = Team::getTypes();
        return view('backend.teams.create', compact('teamTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teams', 'public');
            $data['image'] = $imagePath;
        }

        Team::create($data);

        return redirect()->route('teams.index')
            ->with('success', 'Team member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('backend.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $teamTypes = Team::getTypes();
        return view('backend.teams.edit', compact('team', 'teamTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        $data = $request->validated();

        // Handle image deletion if checkbox is checked
        if ($request->has('delete_image') && $request->delete_image == 1) {
            // Delete old image if exists
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = null;
        }
        // Handle image upload
        elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            $imagePath = $request->file('image')->store('teams', 'public');
            $data['image'] = $imagePath;
        }

        $team->update($data);

        return redirect()->route('teams.index')
            ->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        try {
            // Delete image if exists
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            $team->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Team member deleted successfully.'
                ]);
            }

            return redirect()->route('teams.index')
                ->with('success', 'Team member deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting team member: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting team member: ' . $e->getMessage());
        }
    }
}
