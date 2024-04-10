<?php
namespace App\Repositories;

use App\Classes\HashClass;
use App\Classes\S3ClientClass;
use App\Models\File;

class FileRepository
{
    //Скачивание файлов в Object storage
    public function fileDowload(string $bucket, string $objectKey, string $filePath): string
    {
        $S3ClientClass = new S3ClientClass();
        $s3 = $S3ClientClass->GetS3ClientClient('s3', 'https://storage.yandexcloud.net/');
        $command =  $s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $objectKey,
        ]);
        $request =  $s3->createPresignedRequest($command, '+15 minutes');
        $downloadUrl = (string)$request->getUri();
        return $downloadUrl;
    }

    //Загрузка файлов в Object storage
    public function fileUpload(string $bucket, string $objectKey, string $fileContent): void
    {
        $S3ClientClass = new S3ClientClass();
        $s3 = $S3ClientClass->GetS3ClientClient('s3', 'https://storage.yandexcloud.net/');
        
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $objectKey,
            'Body' => $fileContent,
        ]);
    }
    public function getListOfFile(?int $userId)
    {
        return ($userId == null) ? File::get() : File::where('id_user', $userId)->get();
    }
    
    ///Создание записи о файле в бд
    public function createFileRecord(HashClass $hashsum, string $filemane): void
    {
        $md5 = $hashsum->getMD5();
        $sha1 = $hashsum->getSHA1();
        $sha512 =  $hashsum->getSHA512();
        File::insert(['md5' => $md5, 'sha1' => $sha1, 'sha512' => $sha512, 'file_name'=> $filemane , 'id_user'=> session()->get('userId')]);
    }
}
