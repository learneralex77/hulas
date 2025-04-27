<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $partners = Partner::orderBy('display_order')->paginate(10);
        return view('backend.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        // Ensure is_published is properly set as boolean
        $data['is_published'] = isset($data['is_published']) ? (bool)$data['is_published'] : false;

        Partner::create($data);

        return redirect()->route('partners.index')
            ->with('success', 'Partner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner): View
    {
        return view('backend.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner): View
    {
        return view('backend.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner): RedirectResponse
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $data['image'] = $request->file('image')->store('partners', 'public');
        } elseif ($request->has('delete_image') && $request->delete_image) {
            // Delete image if delete_image is checked
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $data['image'] = null;
        } else {
            // Keep existing image
            unset($data['image']);
        }

        // Ensure is_published is properly set as boolean
        $data['is_published'] = isset($data['is_published']) ? (bool)$data['is_published'] : false;

        $partner->update($data);

        return redirect()->route('partners.index')
            ->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner): mixed
    {
        try {
            // Delete image if exists
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }

            $partner->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Partner deleted successfully.'
                ]);
            }

            return redirect()->route('partners.index')
                ->with('success', 'Partner deleted successfully');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting partner: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('partners.index')
                ->with('error', 'Error deleting partner: ' . $e->getMessage());
        }
    }
} 