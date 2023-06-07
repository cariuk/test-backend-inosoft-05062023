<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CustomResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $input = $request->all();

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::user();
            $token = $user->createToken('token')->accessToken;
            return CustomResponse::json([
                'token' => $token,
                'user' => $user
            ]);
        }

        return CustomResponse::error('Unauthorised', 401);
    }
}
