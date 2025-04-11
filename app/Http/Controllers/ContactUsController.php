<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::orderBy('display_order')->get();
        return view('backend.contact-us.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactUsRequest $request)
    {
        // Use validated data from the form request
        $data = $request->validated();

        ContactUs::create($data);

        return redirect()->route('contact-us.index')
            ->with('success', 'Contact inquiry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        return view('backend.contact-us.show', compact('contactUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        return view('backend.contact-us.edit', compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUsRequest $request, ContactUs $contactUs)
    {
        // Use validated data from the form request
        $data = $request->validated();

        $contactUs->update($data);

        return redirect()->route('contact-us.index')
            ->with('success', 'Contact inquiry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        try {
            $contactUs->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contact inquiry deleted successfully.'
                ]);
            }

            return redirect()->route('contact-us.index')
                ->with('success', 'Contact inquiry deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting contact inquiry: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('contact-us.index')
                ->with('error', 'Error deleting contact inquiry: ' . $e->getMessage());
        }
    }
}
