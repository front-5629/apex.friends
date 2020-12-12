<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            //ログイン成功時
            $loggedIn =true;
            $message = 'ログイン完了!!';
            return response()-> json(['loggedIn'=> '$loggedIn', 'message'=> '$message']);
        }
     
        throw ValidationException::withMessages([
            'email' => ['入力された情報が間違っています'],
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
