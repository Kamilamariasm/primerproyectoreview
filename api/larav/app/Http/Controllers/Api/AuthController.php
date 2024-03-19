<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginData = $request ->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        if (!auth()->attempt($loginData))
        {
            return response ([
                'response' => 'Invalid Credentials',
                'message' => 'error'
            ]);
        }
        $user = auth()->user();

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response([
            'profile' => auth()->user(),
            'access_token' => $accessToken,
            
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'image' => $user->image,
            'message' => 'success'
        ]);
    }
    
}
