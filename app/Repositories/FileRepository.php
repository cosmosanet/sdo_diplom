<?php
namespace App\Repositories;

use App\Classes\HashClass;
use App\Classes\S3ClientClass;
use App\Models\File;

class FileRepository
{
    //Загрузка файлов в Object storage
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

    //Скачивание файлов в Object storage
    public function fileUpload(string $bucket, string $objectKey, string $filePath): void
    {
        $S3ClientClass = new S3ClientClass();
        $s3 = $S3ClientClass->GetS3ClientClient('s3', 'https://storage.yandexcloud.net/');
        
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $objectKey,
            'SourceFile' => $filePath,
        ]);
    }
    ///id user временно.
    public function createFileRecord(HashClass $hashsum, string $filemane): void
    {
        $md5 = $hashsum->getMD5();
        $sha1 = $hashsum->getSHA1();
        $sha512 =  $hashsum->getSHA512();
        File::insert(['md5' => $md5, 'sha1' => $sha1, 'sha512' => $sha512, 'file_name'=> $filemane , 'id_user'=>1]);
    }
}
