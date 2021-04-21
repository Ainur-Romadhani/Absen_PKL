<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (Request $request){
     $login =  $request->validate([
            'nis' => 'required'
        ]);

        if(!Auth::attempt($login)){
            return response(['message'=>'Invalid Login']);
        }

        $accessToken = Auth::siswa()->createToken('authToken')->accessToken;
        return response(['user' => Auth::siswa(),'access_token' => $accessToken]);
        
    }
}
