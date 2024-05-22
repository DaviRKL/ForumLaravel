<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listAllUsers() {
        return view('users.ListAllUsers');
    }

    public function listUserById() {
        return view('users.find');
    }

    public function createUser() {
        return view('users.create');
    }

    public function editUser() {
        return view('users.edit');
    }

    public function deleteUser() {
        return "Hello World";
    }
}
