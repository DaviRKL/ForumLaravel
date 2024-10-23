<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function Index(){
        $topics = Topic::all(); 
        return $topics;
    }

    public function listAllTopics(){
        $topics = Topic::all(); 
        return view('topics.listAllTopics', ['topics' => $topics]);
    }
    public function createTopic(Request $request){
        if ($request->isMethod('GET')) {
            $categories = Category::all();
            return view('topics.createTopic', ['categories' => $categories]);
        } else {
             $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|int',
                'image' => 'required|string',
                'category' => 'required'
             ]);
    
            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);

            $post = new Post([
                'image' => $request->image
            ]);
    
            // Auth::login($topic);
    
            return redirect()->route('welcome');
        }
    }

    public function listTopicById(Request $request, $id) {
         $topic = Topic::where('id', $id)->first(); 
         return view('topics.view_topic', ['topic' => $topic]);
    }

    public function UpdateTopic(Request $request, $id) {
        $topic = Topic::where('id', $id)->first();
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->save();
        return redirect()->route('listTopicById', [$topic->id])->with('message-sucess', 'Alteração realizada com sucesso');
    }

    public function deleteTopic(Request $request, $id) {
        $topic = Topic::where('id', $id)->delete();
        return redirect()->route('topics.view_topic');
    }
}
