<?php

namespace App\Http\Controllers;
require '..\vendor\autoload.php';
use Aws\S3\S3Client;
use App\Classes\HashControllClass;
use App\Classes\S3ClientClass;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // $s3 = new S3Client([
        //     'credentials' => [
        //         'key'      => 'YCAJEtGL0_0UrZ8frQh43hmsw',
        //         'secret'   => 'YCNP8JbDpSpo-QzOLwB9wk6dyNH4FvamkBdgDRv1',
        //     ],
        //     'version' => 'latest',
        //     'endpoint' => 'https://storage.yandexcloud.net/',
        //     'region' => 'default-ru-central1-a',
        // ]);
        
        // $buckets = $s3->listBuckets();
        // foreach ($buckets['Buckets'] as $bucket) {
        //     echo $bucket['Name'] . "\n";
        // }

        // $hashControllClass = new HashControllClass();
        // $S3ClientClass = new S3ClientClass();
        // $s3 = $S3ClientClass->GetS3ClientClient('s3', 'https://storage.yandexcloud.net/');
      
        // $result =  $s3->getObject([
        //     'Bucket' => 'storagecs1',
        //     'Key'    => 'asd.docx',
        // ]);
        // file_put_contents('C:\Users\cosmosanet\Desktop\123\asd.docx', (string) $result['Body']);

        // // $hash = $hashControllClass->Get3HashSum('https://storage.yandexcloud.net/storagecs1/asd.docx');

        // // $hashsss = $hashControllClass->Get3HashSum('C:\Users\cosmosanet\Desktop\Диплом\123.docx');

        // // dd($hash, $hashsss);
        
        // $s3 = $S3ClientClass->GetS3ClientClient('s3', 'https://storage.yandexcloud.net/');
      
        // $result =  $s3->getObject([
        //     'Bucket' => "storagecs1",
        //     'Key'    => "asd.docx",
        // ]);
        // file_put_contents('C:\Users\cosmosanet\Desktop\123\123.docx', (string) $result['Body']);

        // $oauthToken = "y0_AgAAAABV_sOyAATuwQAAAADvFlfJYgZNLaeNSxKTCBT9Od26dpIHm1Y";
        // $url = "https://iam.api.cloud.yandex.net/iam/v1/tokens";

        // $data = array(
        //     "yandexPassportOauthToken" => $oauthToken
        // );

        // $options = array(
        //     'http' => array(
        //         'header'  => "Content-Type: application/json",
        //         'method'  => 'POST',
        //         'content' => json_encode($data)
        //     )
        // );

        // $context  = stream_context_create($options);
        // $response = file_get_contents($url, false, $context);
        // $iamToken = json_decode($response, true)["iamToken"];
        // echo $iamToken;

        return view('welcome');

    }
}
