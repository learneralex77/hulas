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
        $downloads = Download::orderBy('display_order')->get();
        return view('backend.downloads.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DownloadRequest $request)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                if ($file->isValid()) {
                    $data['file'] = $file->store('downloads', 'public');
                } else {
                    throw new \Exception('Invalid file upload.');
                }
            }

            Download::create($data);

            return redirect()->route('downloads.index')
                ->with('success', 'Download created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        return view('backend.downloads.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        return view('backend.downloads.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DownloadRequest $request, Download $download)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('file')) {
                // Delete old file if exists
                if ($download->file && Storage::disk('public')->exists($download->file)) {
                    Storage::disk('public')->delete($download->file);
                }

                $file = $request->file('file');
                if ($file->isValid()) {
                    $data['file'] = $file->store('downloads', 'public');
                } else {
                    throw new \Exception('Invalid file upload.');
                }
            } else {
                // Keep existing file
                unset($data['file']);
            }

            $download->update($data);

            return redirect()->route('downloads.index')
                ->with('success', 'Download updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        try {
            // Delete file from storage
            if ($download->file && Storage::disk('public')->exists($download->file)) {
                Storage::disk('public')->delete($download->file);
            }

            $download->delete();

            // Check if request is AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Download deleted successfully.'
                ]);
            }

            return redirect()->route('downloads.index')
                ->with('success', 'Download deleted successfully.');
        } catch (\Exception $e) {
            // For AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting download: ' . $e->getMessage()
                ], 500);
            }

            // For form submit
            return redirect()->route('downloads.index')
                ->with('error', 'Error deleting download: ' . $e->getMessage());
        }
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
