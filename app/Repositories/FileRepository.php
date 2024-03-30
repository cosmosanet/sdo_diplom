<?php
namespace App\Repositories;

use App\Classes\S3ClientClass;

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
    public function fileUpload(string $bucket = "istutestbucket", string $objectKey = "istutestdoc.docx" , string $filePath = "C:\Users\cosmosanet\Desktop\istutestdoc.docx"): void
    {
        $S3ClientClass = new S3ClientClass();
        $s3 = $S3ClientClass->GetS3ClientClient('s3', 'https://storage.yandexcloud.net/');
        
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $objectKey,
            'SourceFile' => $filePath,
        ]);
    }
}
