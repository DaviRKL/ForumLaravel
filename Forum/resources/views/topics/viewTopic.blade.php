@extends('layouts.header_footer')

@section('content')
<div class="container custom-container mt-5 mb-5">
    <h1 class="title">{{ $topic->title }}</h1>
    <p class="description">{{ $topic->description }}</p>

    <div class="comments-section">
        <h2 class="subtitle">Comentários</h2>
        @if($topic->comments->isEmpty())
            <p class="no-comments">Não há comentários ainda.</p>
        @else
            <ul class="comments-list">
                @foreach($topic->comments as $comment)
                    <li class="comment-item" id="comment-{{ $comment->id }}">
                        <p><strong>{{ $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                        <p>{{ $comment->content }}</p>
                        <p class="comment-time">{{ $comment->created_at->diffForHumans() }}</p>

                        <!-- Botão de resposta -->
                        <button class="btn btn-link reply-btn" data-comment-id="{{ $comment->id }}">
                            Responder
                        </button>

                        <!-- Formulário de resposta (inicialmente escondido) -->
                        <div class="reply-form" id="reply-form-{{ $comment->id }}" style="display: none; margin-top: 10px;">
                            <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="2" placeholder="Adicionar uma resposta" required></textarea>
                                </div>
                                <button type="submit" class="submit-btn">Responder</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    @if(auth()->check())
        <div class="add-comment-section">
            <h2 class="subtitle">Adicionar um Comentário</h2>
            <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST" class="comment-form">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Comentar</button>
            </form>
        </div>
    @endif


    @if(auth()->check() && auth()->user()->id === $topic->user_id)
        <div class="actions-section">
            <h2 class="subtitle">Ações</h2>
            <a href="{{ route('topics.edit', $topic->id) }}" class="edit-btn">Editar Tópico</a>
            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Deletar Tópico</button>
            </form>
        </div>
    @endif
</div>

<script>
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const replyForm = document.getElementById(`reply-form-${commentId}`);

            // Toggle visibilidade do formulário de resposta
            if (replyForm.style.display === 'none') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        });
    });
</script>

@endsection
