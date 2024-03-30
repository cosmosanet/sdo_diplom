<?php
namespace App\Services;

use App\Classes\HashControllClass;
use App\Models\File;
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

    public function registerFile(string $bucket, string $filePath): string
    {
        $hashControllClass = new HashControllClass();

        $hash = $hashControllClass->Get3HashSum($filePath);
        $checkResult = $this->checkFile($filePath);
        $objectKey = basename($filePath);

        if( $checkResult ){
            $this->fileRepository->fileUpload($bucket, $objectKey, $filePath);
            $this->fileRepository->createFileRecord($hash ,$objectKey);
            return 'Фаил успешно загружен';
        } else {
            return 'Такой фаил уже существует';
        } 

    }
    
    private function checkFile(string $filePath)
    {
        $hashControllClass = new HashControllClass();

        $hash = $hashControllClass->Get3HashSum($filePath);
        $md5 = $hash->getMD5();
        $sha1 = $hash->getSHA1();
        $sha512 =  $hash->getSHA512();

        $reqest = File::where('md5', '=' , $md5, 'or', 'sha1' , '=', $sha1, 'sha512', '=', $sha512)->count();
        return ($reqest >= 1)? false : true;
    }
}