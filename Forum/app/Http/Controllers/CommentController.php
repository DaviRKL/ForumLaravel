<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Topic;


class CommentController extends Controller
{
    public function index($topicId)
    {
        $comments = Comment::where('topic_id', $topicId)->get();
        return view('comments.listAllComments', ['comments' => $comments, 'topicId' => $topicId]);
    }

    public function createComment(Request $request, $topicId)
    {
        if ($request->isMethod('GET')) {
            return view('comments.createComment', ['topicId' => $topicId]);
        } else {
            $request->validate([
                'content' => 'required|string|max:255',
            ]);

            $comment = Comment::create([
                'content' => $request->content,
                'topic_id' => $topicId,
            ]);

            $comment->post()->create([
                'user_id' => Auth::id(),
                'image' => $request->image
            ]);

            return redirect()->route('listAllTopics')->with('message-success', 'Comentário criado com sucesso!');
        }
    }

    public function listCommentById($topicId, $commentId)
    {
        $comment = Comment::where('id', $commentId)->where('topic_id', $topicId)->firstOrFail();
        return view('comments.viewComment', ['comment' => $comment]);
    }

    public function updateComment(Request $request, $topicId, $commentId)
    {
        $comment = Comment::where('id', $commentId)->where('topic_id', $topicId)->firstOrFail();

        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('listCommentById', [$topicId, $commentId])->with('message-success', 'Comentário atualizado com sucesso!');
    }

    public function deleteComment($topicId, $commentId)
    {
        Comment::where('id', $commentId)->where('topic_id', $topicId)->delete();
        return redirect()->route('listAllTopics')->with('message-success', 'Comentário deletado com sucesso!');
    }
}
