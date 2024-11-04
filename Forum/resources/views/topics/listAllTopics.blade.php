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
                    <div class="card-header">
                        <h5>{{ $topic->title }}</h5>
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
                                <p><strong>{{  $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
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
            @endforeach
        @endif
    </div>
@endsection
