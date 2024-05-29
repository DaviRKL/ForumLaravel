<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        if ($request->method() === 'GET'){
            return view('auth.login');
        } else {
            $credentials = $request->only('email', 'password');
            print_r($credentials);
        }
            
    }

    public function logout() {
        return "Hello World";
    }
}
