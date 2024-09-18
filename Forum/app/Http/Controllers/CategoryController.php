<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listAllCategories(){
        $categories = Category::all(); 
        return view('categories.listAllCategories', ['categories' => $categories]);
    }
    public function createCategory(Request $request){
        if ($request->isMethod('GET')) {
            return view('categories.createCategories');
        } else {
             $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|',
             ]);
    
            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    
            // Auth::login($topic);
    
            return redirect()->route('welcome');
        }
    }

    public function listCategoryById(Request $request, $id) {
         $category = Category::where('id', $id)->first(); 
         return view('categories.view_topic', ['topic' => $categry]);
    }

    public function UpdateCategory(Request $request, $id) {
        $category = Category::where('id', $id)->first();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('listCategoryById', [$category->id])->with('message-sucess', 'Alteração realizada com sucesso');
    }

    public function deleteCategory(Request $request, $id) {
        $category = Category::where('id', $id)->delete();
        return redirect()->route('categories.view_category');
    }
}
