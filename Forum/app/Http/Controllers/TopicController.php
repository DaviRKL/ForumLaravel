<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Post;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function Index(){
        $topics = Topic::all();
        return $topics;
    }

    public function listAllTopics(){
        $topics = Topic::with('comments')->get(); // Carrega os tópicos e os comentários associados
        return view('topics.listAllTopics', ['topics' => $topics]);
    }
    public function createTopic(Request $request) {
        if ($request->isMethod('GET')) {
            $categories = Category::all();
            return view('topics.createTopic', ['categories' => $categories]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|int',
                'image' => 'required|string',
                'category_id' => 'required|exists:categories,id' // Verifica se a categoria existe
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category_id
            ]);


            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $request->image
            ]);
            return redirect()->route('listAllTopics')->with('message-sucess', 'Tópico criado com sucesso ');
        }
    }


    public function listTopicById(Request $request, $id) {
         $topic = Topic::where('id', $id)->first();
         return view('topics.viewTopic', ['topic' => $topic]);
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
        return redirect()->route('topics.viewTopic');
    }
}
