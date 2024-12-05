<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Topic;
use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome() {
        $topics = Topic::latest()->take(10)->get();
        $categories = Category::latest()->take(10)->get();
        return view('welcome' , ['topics' => $topics, 'categories' => $categories]);
     }
}
