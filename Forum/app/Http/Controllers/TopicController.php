<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{

    public function listAllTopics()
    {
        $topics = Topic::with('comments')->get(); // Carrega os tópicos e os comentários associados
        return view('topics.listAllTopics', ['topics' => $topics]);
    }
    public function createTopic(Request $request)
    {
        if ($request->isMethod('GET')) {
            $categories = Category::all();
            return view('topics.createTopic', ['categories' => $categories]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|int',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'required|exists:categories,id' // Verifica se a categoria existe
            ]);
            // if ($request->hasFile('photo')) {
            //     $imagePath = $request->file('photo')->store("images", "public");
            // }
            $imagePath = $request->hasFile('photo')
                ? $request->file('photo')->store("images", "public")
                : "images/TopicoSemFoto.png";

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category_id
            ]);


           $post = $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $imagePath ?? "/images/TopicoSemFoto.png"
            ]);

            if (!$post) {
                return redirect()->back()->withErrors('Erro ao criar o post associado ao tópico.');
            }
            return redirect()->route('listAllTopics')->with('message-sucess', 'Tópico criado com sucesso ');
        }
    }


    public function listTopicById(Request $request, $id)
    {
        $topic = Topic::where('id', $id)->first();
        return view('topics.viewTopic', ['topic' => $topic]);
    }

    public function UpdateTopic(Request $request, $id)
    {
        if ($request->isMethod('GET')) {
            // Buscar apenas o tópico com o ID fornecido
            $topic = Topic::findOrFail($id); // Retorna o tópico específico ou gera um erro 404 caso não exista

            // Obter categorias para seleção no formulário (se necessário)
            $categories = Category::all();

            // Retornar a view com os dados do tópico e as categorias
            return view('topics.editTopic', [
                'topic' => $topic,  // Passa apenas o tópico específico
                'categories' => $categories // Passa as categorias para o formulário de edição
            ]);
        } else {
            // Validação dos dados do formulário
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|int',
                'category_id' => 'required|exists:categories,id' // Verifica se a categoria existe
            ]);

            // Buscar o tópico pelo ID para atualização
            $topic = Topic::findOrFail($id);

            // Atualizar os campos do tópico
            $topic->title = $request->title;
            $topic->description = $request->description;
            $topic->status = $request->status;
            $topic->category_id = $request->category_id; // Atualiza a categoria
            $topic->save();

            // Atualiza a imagem se o usuário enviou uma nova
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store("images", "public");
                $topic->post()->update([
                    'image' => $imagePath
                ]);
            }

            // Redirecionar após a atualização
            return redirect()->route('listTopicById', $topic->id)
                ->with('message-success', 'Tópico atualizado com sucesso!');
        }
    }

    public function deleteTopic(Request $request, $id)
    {
        Comment::where('topic_id', $id)->delete();

        Topic::where('id', $id)->delete();
        return redirect()->route('listAllTopics')->with('message-sucess', 'Tópico excluído com sucesso ');
        ;
    }
}
