<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\user;

class RegisterController extends Controller
{
    public function register(Request $data){
        User::create([
            'name' => $data['registerName'],
            'email' => $data['registerEmail'],
            'password' => Hash::make($data['registerPassword']),
        ]);
    }

}
