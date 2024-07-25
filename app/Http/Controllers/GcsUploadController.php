<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;

class GcsUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
        $filePath = $file->getRealPath();
        $fileName = 'uploads/' . $file->getClientOriginalName();


        $projectId = env('GOOGLE_CLOUD_PROJECT_ID');
        $keyFilePath = base_path(env('GOOGLE_CLOUD_KEY_FILE_PATH'));
        $bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');


        $storage = new StorageClient([
            'projectId' => $projectId,
            'keyFilePath' => $keyFilePath,
        ]);


        $bucket = $storage->bucket($bucketName);


        $object = $bucket->upload(
            fopen($filePath, 'r'),
            [
                'name' => $fileName
            ]
        );


        $object->update(['acl' => []], ['predefinedAcl' => 'PUBLICREAD']);


        $publicUrl = $object->info()['mediaLink'];

        return back()->with('success', 'File uploaded successfully!')->with('url', $publicUrl);
    }
}
