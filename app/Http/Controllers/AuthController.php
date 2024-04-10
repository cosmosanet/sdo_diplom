<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'OAthKey' => 'required',
        ]);

        $email = $request->input('email');
        $oathKey = $request->input('OAthKey');
       
        if($this->checkUser($email)) {
            $iamKey = $this->getIAmKey($oathKey);
            $userInfo = $this->getUsernfo($email);
            $secretId = $userInfo->role['yandex_secret_id'];
            $userId= $userInfo->id;
            $userName= $userInfo->name;
            $apiKeys = $this->getApiKeys($secretId, $iamKey);
            session(['email' => $email , 'name' => $userName, 'apiKey' => $apiKeys->key, 'secretApiKey' => $apiKeys->textValue, 'userId' => $userId]);
            return redirect('/')->with(['success' => 'Авторизация проша успешно']);
        } else {

           return redirect('/login')->withErrors(['msg' => 'У вас нет доступа к этому ресурсу']);
        }
       
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect('/')->with('success', 'выход прошел успешно');
    }
    
    public function loginpage()
    {
        return view('login');
    }

    private function getIAmKey(string $oauthKey)
    {
        $url = 'https://iam.api.cloud.yandex.net/iam/v1/tokens';
        $data = [
            'yandexPassportOauthToken' => $oauthKey
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            die('Error');
        }

        $response = json_decode($result, true);
        $iamKey = $response['iamToken'];

        return $iamKey;
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
        $response = json_decode(curl_exec($curl));
 
        if(isset($response->code)){
            $massage = $response ;
            return $massage;
        }

        return $response->entries[0];
    }

    private function checkUser(string $email)
    {
        $result = User::where('email', $email)->first();
        return $result ? true : false;
    }

    private function getUsernfo(string $email)
    {
        $result = User::where('email', $email)->first();
        return  $result;
    }

}
