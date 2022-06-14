<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login ( Request $request ) {
     
        $request->validate([
            'email'=> 'required|string',
            'passport' => 'required|string'
      ]);
      
      if ( !Auth::attempt ($login )){

        return response(['message'=> 'invalid login credentials']);
      }

      $accessToken = Auth::user()-> createToken('authToken')->accessToken;

      return response(['users' => Auth::user(),'access_token' => $accessToken]);


    }


}
