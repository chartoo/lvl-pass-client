<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OAuthController extends Controller
{
    public function redirect()
    {
        $queries=\http_build_query([
            'client_id'=>'3',
            'redirect_uri'=>'http://localhost:2000/oauth/callback',
            'response_type'=>'code'
             
        ]);
        return redirect('http://localhost:7000/oauth/authorize?'. $queries); //Change server host name accourding to server address
    }
/*
* Firstly, get client_id,secret after registration to server
*/
    public function callback(Request $request)
    {
       $response=Http::post('http://localhost:7000/oauth/token',[ //Change server host name accourding to server address
        'grant_type'=>'authorization_code',
        'client_id'=>'3',
        'client_secret'=>'tageLGbS1yNagxFm5jd8vialqiHnKrKcsCbHlbW3',
        'redirect_uri'=>'http://localhost:2000/oauth/callback',
        'code'=>$request->code
       ]);
       dd($response->json());
    }
}
