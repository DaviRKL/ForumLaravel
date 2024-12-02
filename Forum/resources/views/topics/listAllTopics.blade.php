@extends('layouts.header_footer')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Tópicos</h1>
        @if ($topics->isEmpty())
            <div class="custom-alert-div">
                <div class="alert custom-alert">
                    <i class="fa-solid fa-exclamation-circle"></i>
                    Não há tópicos disponíveis no momento.
                </div>
            </div>
        @else
            @foreach ($topics as $topic)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ $topic->title }}</h5>

                     @if(auth()->check() && auth()->user()->id == $topic->post->user_id)
                            <div class="topic-actions">

                                <!-- Botão de Edição -->
                                <a href="{{ route('updateTopic', $topic->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <!-- Botão de Exclusão com Modal -->
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $topic->id }}">
                                    Excluir
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <p>{{ $topic->description }}</p>
                        <p>Status: {{ $topic->status }}</p>
                        <p>Categoria: {{ $topic->category->title ?? 'Sem categoria' }}</p>
                        <a href="{{ route('listTopicById', $topic->id) }}" class="btn btn-primary">Ver Tópico</a>
                    </div>
                    <div class="card-footer">
                        <h6>Comentários:</h6>
                        @foreach ($topic->comments as $comment)
                            <div class="comment">
                                <p><strong>{{ $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                                <p>{{ $comment->content }}</p>
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach

                        <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Comentar</button>
                        </form>
                    </div>
                </div>

                <!-- Modal de Exclusão -->
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
            @endforeach
        @endif
    </div>
@endsection
