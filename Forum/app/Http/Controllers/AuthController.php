<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        if ($request->method() === 'GET'){
            return view('auth.login');
        } else {
            $credentials = $request->validate([
                'email' => 'required|string|email|',
                'password' => 'required|string'
               ]);
            if (Auth::attempt($credentials)){
                return redirect()->route('welcome')->with('message-sucess', 'Seja Bem Vindo ' . Auth::user()->name);
            }
            return back()->withErrors([
                'email' => 'Credenciais inválidas.',
                'password' => 'Credenciais inválidas'
            ])->withInput();
        }
            
    }

    

    public function logout() {
       Auth::logout();
       return redirect()->route('welcome')->with('message-sucess', 'Logout realizado com sucesso');
    }
}
