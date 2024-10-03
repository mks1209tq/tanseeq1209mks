<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
    public function create(Request $request): View
    {
        return view('document.create');
    }
    
    public function show(Request $request): View
    {
        return view('document.show');
    } 


    public function store(Request $request): View
    {
        
        $request->validate([
            'document' => 'required|file|max:10240', // 10MB Max
        ]);
    
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = $file->getClientOriginalName();
            
            try {
                // Attempt to store the file
                $success = Storage::disk('idrive')->put($fileName, file_get_contents($file->getRealPath()));
                
                // Prepare the response
                $response = [
                    'success' => $success,
                    'file_name' => $fileName,
                    'file_size' => $file->getSize(),
                    'file_mime' => $file->getMimeType(),
                    'storage_path' => $success ? $fileName : null,  // Changed this line
                ];
    
                // If the storage failed, try to get more information
                if (!$success) {
                    $response['error'] = 'File upload failed. Check your iDrive configuration.';
                }
    
                // Dump and die with the response
                dd($response);
    
            } catch (\Exception $e) {
                dd([
                    'success' => false,
                    'error' => $e->getMessage(),
                    'file_name' => $fileName,
                ]);
            }
        }
    
        dd('No file was uploaded');
        //return view('document.create');
    }
    
    public function index(Request $request): View
    {
        

        return view('document.index');
    }  
}
