<?php
namespace App\Classes;

use Aws\S3\S3Client;
use App\Interfaces\S3ClientInterface;

class S3ClientClass implements S3ClientInterface
{
    public function GetS3ClientClient(string $serviceName, string $endpointUrl)
    {
        // админ
        // $asd = 't1.9euelZqYiZWdi5HMypWRmseXycrKyu3rnpWax5OexsmelM-QyZWRj46Mj8fl8_daYlpP-e9zJhEM_d3z9xoRWE_573MmEQz9zef1656VmpyLkMfMk5eUxpPKnpibmZCc7_zF656VmpyLkMfMk5eUxpPKnpibmZCc.WLx4qCFdIDf38CrONVRHEUTerTRLVOZrCNIImHNAN9rCqGWtUJHPX1fv-czlF7J0wnXw-6U2k2FjzC28BNZ_Ag';
        $asd = 't1.9euelZqKzsuUiZ2RlJSMm8aRi5qci-3rnpWampHMk4zLkcqLyM-Szsubycbl9Pc-YlpP-e86aV6c3fT3fhBYT_nvOmlenM3n9euelZqeio-RjJuRy8uYi8mSnZbNl-_8xeuelZqeio-RjJuRy8uYi8mSnZbNlw.mY2zmuoTT9c_PGXNal6R8I4dSWuopjAbmp4m1niNYp0nxsigTk4uMvPOex2RKZkZYD9rdw4cMPil9KCxs-yqCA';
        $apiKeys = $this->getApiKeys('e6qbb4jpl4i8ip9sj285', $asd);
        $s3 = new S3Client([
            'credentials' => [
                'key'      => $apiKeys->key,
                'secret'   => $apiKeys->textValue,
            ],
            'version' => 'latest',
            'endpoint' => $endpointUrl,
            'region' => 'default-ru-central1-a',
            'service_name' => $serviceName,
        ]);

        return $s3;
        
    }

    private function getApiKeys(string $secretId, string $iAmKey)
    {
        $curl = curl_init();

        $url = "https://payload.lockbox.api.cloud.yandex.net/lockbox/v1/secrets/" . $secretId . "/payload";
        $headers = array(
            'Authorization: Bearer ' . $iAmKey,
      
        );

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = json_decode(curl_exec($curl));
 
        if(isset($response->code)){
            $massage = $response ;
            return $massage;
        }

        return $response->entries[0];
    }

}
