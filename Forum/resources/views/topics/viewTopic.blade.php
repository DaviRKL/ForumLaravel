@extends('layouts.header_footer')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $topic->title }}</h1>
    <p class="text-lg mb-6">{{ $topic->content }}</p>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold">Comentários</h2>
        @if($topic->comments->isEmpty())
            <p class="text-gray-500">Não há comentários ainda.</p>
        @else
            <ul class="space-y-4">
                @foreach($topic->comments as $comment)
                    <li class="p-4 border rounded shadow-sm">
                        <p><strong>{{  $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                        <p>{{ $comment->content }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    @if(auth()->check())
        <div class="mb-6">
            <h2 class="text-2xl font-semibold">Adicionar um Comentário</h2>
            <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST" class="mt-3">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2">Comentar</button>
            </form>
        </div>
    @endif

    @if(auth()->check() && auth()->user()->id === $topic->user_id)
        <div class="mb-6">
            <h2 class="text-2xl font-semibold">Ações</h2>
            <a href="{{ route('topics.edit', $topic->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar Tópico</a>
            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Deletar Tópico</button>
            </form>
        </div>
    @endif
</div>
@endsection
