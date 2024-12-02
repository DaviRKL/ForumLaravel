@extends('layouts.header_footer')

@section('content')
<div class="container custom-container mt-5 mb-5">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Título centralizado -->
        <div class="flex-grow-1 text-center">
            <h1 class="title m-0">{{ $topic->title }}</h1>
        </div>
    </div>



    <!-- Ações para o autor do tópico -->
    @if(auth()->check() && auth()->user()->id === $topic->post->user_id)
        <div class="actions-section mt-4">

            <a href="{{ route('updateTopic', $topic->id) }}" class="btn btn-warning btn-sm">
                Editar
            </a>

            <!-- Botão de Exclusão com Modal -->
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $topic->id }}">
                Excluir
            </button>
        </div>
    @endif

    <!-- Linha separadora roxa -->
    <hr class="mt-4 mb-4" style="border-top: 2px solid purple;">

    <!-- Exibição da imagem do tópico -->
    @if($topic->post->image ?? false)
        <div class="topic-image-container mt-4">
            <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do Tópico" class="topic-image">
        </div>
    @endif

    <p class="description mt-4">{{ $topic->description }}</p>

    <!-- Linha separadora roxa -->
    <hr class="mt-4 mb-4" style="border-top: 2px solid purple;">

    <div class="comments-section mt-5">
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

    <!-- Linha separadora roxa -->
    <hr class="mt-4 mb-4" style="border-top: 2px solid purple;">

    <!-- Formulário para adicionar um comentário -->
    @if(auth()->check())
        <div class="add-comment-section mt-5">
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
</div>

<!-- Modal de Exclusão -->
@if(auth()->check() && auth()->user()->id === $topic->post->user_id)
<div class="modal fade" id="deleteModal-{{ $topic->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $topic->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $topic->id }}">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir o tópico "<strong>{{ $topic->title }}</strong>"? Esta ação não pode ser desfeita.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deleteTopic', $topic->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

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
