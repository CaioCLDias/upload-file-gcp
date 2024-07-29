<?php

namespace App\Services;

use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;

class GcsUploadService
{
    private $storage;
    private $bucketName;

    public function __construct()
    {
        $projectId = env('GOOGLE_CLOUD_PROJECT_ID');
        $keyFilePath = base_path(env('GOOGLE_CLOUD_KEY_FILE_PATH'));
        $this->bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');

        $this->storage = new StorageClient([
            'projectId' => $projectId,
            'keyFilePath' => $keyFilePath,
        ]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $filePath = $file->getRealPath();
        $fileName = 'uploads/' . $file->getClientOriginalName();

        $bucket = $this->storage->bucket($this->bucketName);
        $object = $bucket->upload(fopen($filePath, 'r'), ['name' => $fileName]);

        // Formata a URL pública corretamente
        $publicUrl = sprintf('https://storage.googleapis.com/%s/%s', $this->bucketName, $fileName);

        return $publicUrl;
    }
}
