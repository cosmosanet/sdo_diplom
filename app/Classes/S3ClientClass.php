<?php
namespace App\Classes;

use Aws\S3\S3Client;
use App\Interfaces\S3ClientInterface;


class S3ClientClass implements S3ClientInterface
{
    public function GetS3ClientClient(string $serviceName, string $endpointUrl): S3Client
    {

        $s3 = new S3Client([
            'credentials' => [
                'key'      => config('app.yandex_api_key'),
                'secret'   => config('app.yandex_api_secret_key'),
            ],
            'version' => 'latest',
            'endpoint' => $endpointUrl,
            'region' => 'default-ru-central1-a',
            'service_name' => $serviceName,
            
        ]);
        return $s3;
    }

}
