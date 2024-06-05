<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listAllUsers() {
        return view('users.ListAllUsers');
    }

    public function listUserById(Request $request,$id) {
        return view('users.find');
    }

    public function register(Request $request) {
        if ($request->method() === 'GET'){
            return view('users.create');
        } else {
           $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
           ]);

           $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
           ]);

           Auth::login($user);

           return redirect()->route('ListAllUsers');
        }
        
    }

    public function editUser() {
        return view('users.edit');
    }

    public function deleteUser() {
        return "Hello World";
    }
    
}
