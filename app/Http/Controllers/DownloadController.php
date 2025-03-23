<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Download::orderBy('display_order')->paginate(10);
        return view('downloads.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,csv,zip|max:10240',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('downloads', 'public');
            $data['file'] = $filePath;
        }
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        Download::create($data);

        return redirect()->route('downloads.index')
            ->with('success', 'Download created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        return view('downloads.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        return view('downloads.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Download $download)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,csv,zip|max:10240',
            'display_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($download->file && Storage::disk('public')->exists($download->file)) {
                Storage::disk('public')->delete($download->file);
            }
            
            $filePath = $request->file('file')->store('downloads', 'public');
            $data['file'] = $filePath;
        } else {
            // Keep existing file
            unset($data['file']);
        }
        
        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        
        $download->update($data);

        return redirect()->route('downloads.index')
            ->with('success', 'Download updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        // Delete file from storage
        if ($download->file && Storage::disk('public')->exists($download->file)) {
            Storage::disk('public')->delete($download->file);
        }
        
        $download->delete();

        return redirect()->route('downloads.index')
            ->with('success', 'Download deleted successfully.');
    }
    
    /**
     * Download the file.
     */
    public function downloadFile(Download $download)
    {
        if (!$download->file || !Storage::disk('public')->exists($download->file)) {
            return redirect()->back()->with('error', 'File not found.');
        }
        
        $path = Storage::disk('public')->path($download->file);
        $fileName = basename($download->file);
        
        return response()->download($path, $fileName);
    }
}
