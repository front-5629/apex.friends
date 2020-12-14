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
            $loggedIn = true;
            return ['loggedIn'=> '$loggedIn'];
        }
     
        throw ValidationException::withMessages([
            'email' => ['メールアドレスが間違っています'],
            'password' =>['パスワードが違います']
        ]);
    }

    public function logout()
    {
        Auth::logout();
        $loggedIn = false;
        return ['loggedIn' => '$loggedIn'];
    }
}