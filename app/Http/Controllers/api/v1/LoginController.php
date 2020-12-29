<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $login=$request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        if(!Auth::attempt( $login )){
            return response(["message"=>"Invalid login credentials!"]);
        }
        $user= Auth::user();
        $token =$user->createToken('accToken')->accessToken;

        return \response(['user'=>$user,'access_token'=>$token]);
    }
}
