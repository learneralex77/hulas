<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Http\Requests\DownloadRequest;
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
    public function store(DownloadRequest $request)
    {
        $data = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('downloads', 'public');
            $data['file'] = $filePath;
        }
        
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
    public function update(DownloadRequest $request, Download $download)
    {
        $data = $request->validated();
        
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
