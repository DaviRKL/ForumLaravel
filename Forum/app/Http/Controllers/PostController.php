<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listAllPosts(){
        return view('posts.listAllPosts');
    }
    public function createPost(){
        return view('posts.createPost');
    }
}
