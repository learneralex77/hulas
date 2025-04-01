<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('backend.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        $data = $request->validated();

        // Handle logo uploads
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('primary_logo')) {
            $data['primary_logo'] = $request->file('primary_logo')->store('settings', 'public');
        }

        if ($request->hasFile('secondary_logo')) {
            $data['secondary_logo'] = $request->file('secondary_logo')->store('settings', 'public');
        }

        Setting::create($data);

        return redirect()->route('settings.index')
            ->with('success', 'Settings created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('backend.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('backend.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $data = $request->validated();

        // Handle logo uploads
        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('primary_logo')) {
            if ($setting->primary_logo) {
                Storage::disk('public')->delete($setting->primary_logo);
            }
            $data['primary_logo'] = $request->file('primary_logo')->store('settings', 'public');
        }

        if ($request->hasFile('secondary_logo')) {
            if ($setting->secondary_logo) {
                Storage::disk('public')->delete($setting->secondary_logo);
            }
            $data['secondary_logo'] = $request->file('secondary_logo')->store('settings', 'public');
        }

        $setting->update($data);

        return redirect()->route('settings.index')
            ->with('success', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        // Delete the logo files
        if ($setting->logo) {
            Storage::disk('public')->delete($setting->logo);
        }
        if ($setting->primary_logo) {
            Storage::disk('public')->delete($setting->primary_logo);
        }
        if ($setting->secondary_logo) {
            Storage::disk('public')->delete($setting->secondary_logo);
        }

        $setting->delete();

        return redirect()->route('settings.index')
            ->with('success', 'Settings deleted successfully.');
    }
}
