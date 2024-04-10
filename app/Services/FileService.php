<?php
namespace App\Services;

use App\Classes\HashClass;
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

    public function registerFile(string $file_name, string $fileContent): array
    {
        $hashControllClass = new HashControllClass();
        $hash = $hashControllClass->Get3HashSum($fileContent);
        $md5 = $hash->getMD5();
        $sha1 = $hash->getSHA1();
        $sha512 =  $hash->getSHA512();
        $checkResult = $this->checkFile($hash);
        $objectKey = hash('sha512', 'HASHSUM' . 'MD5' . $md5 . 'SHA1' . $sha1 . 'SHA512' .  $sha512 .  'FILE_NAME' . $file_name);

        if( $checkResult ){
            $this->fileRepository->fileUpload('istutestbucket', $objectKey, $fileContent);
            $this->fileRepository->createFileRecord($hash ,$file_name);
            return ['success' => 'Фаил успешно загружен'];
        } else {
            return ['errors' => 'Такой фаил уже существует'];
        } 
    }
    
    public function getListOfFile(?int $userId)
    {
        $list = $this->fileRepository->getListOfFile($userId);
        return $list;
    }

    private function checkFile(HashClass $hash)
    {
        $md5 = $hash->getMD5();
        $sha1 = $hash->getSHA1();
        $sha512 =  $hash->getSHA512();

        $reqest = File::where('md5', '=' , $md5, 'or', 'sha1' , '=', $sha1, 'or' , 'sha512', '=', $sha512)->count();
        return ($reqest >= 1)? false : true;
    }
}