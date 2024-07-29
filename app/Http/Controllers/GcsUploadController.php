<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GcsUploadService;

class GcsUploadController extends Controller
{
    protected $gcsUploadService;

    public function __construct(GcsUploadService $gcsUploadService)
    {
        $this->gcsUploadService = $gcsUploadService;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $publicUrl = $this->gcsUploadService->upload($request);

        return back()->with('success', 'File uploaded successfully!')->with('url', $publicUrl);
    }
}
