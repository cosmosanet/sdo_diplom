<?php
namespace App\Services;

use App\Repositories\FileRepository;

class FileService
{
    protected $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

    public function fileDowload(string $bucket, string $objectKey, string $filePath): string
    {
        $fileUrl = $this->fileRepository->fileDowload($bucket, $objectKey, $filePath);
        return $fileUrl;
    }

    public function fileUpload(string $bucket, string $objectKey, string $filePath): void
    {
        $this->fileRepository->fileUpload($bucket, $objectKey, $filePath);
    }
}