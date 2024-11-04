@extends('layouts.header_footer')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <div class="profile-container">
        @if ($user != null)
            <form action="{{ route('updateUser', [$user->id]) }}" method="POST" class="profile-form">
                <h2 class="text-center">Perfil</h2>
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}"
                        placeholder="{{ $user->name }}" required>
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}"
                        placeholder="{{ $user->email }}" required>
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" id="password" name="password"
                       class="form-control">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <input type="submit" class="btn btn-edit" value="Editar">
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal">
                        <i class="fa-solid fa-ban"></i> Excluir perfil
                    </a>
                </div>
            </form>

            <!-- Modal de confirmação -->
            <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="banModalLabel">Excluir perfil</h5>
                            <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                        </div>
                        <div class="modal-body">
                            Você tem certeza que deseja excluir seu perfil?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                                <i class="fa-solid fa-rotate-left"></i> Voltar
                            </button>
                            <form action="{{ route('deleteUser', [$user->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i> Confirmar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Listagem de Tópicos do Usuário -->
            <div class="user-topics mt-5">
                <h3>Tópicos Criados por {{ $user->name }}</h3>
                @if ($topics->isEmpty())
                    <p>Este usuário ainda não criou nenhum tópico.</p>
                @else
                    <ul class="list-group">
                        @foreach ($topics as $topic)
                            <li class="list-group-item">
                                <a href="">
                                    {{ $topic->title }}
                                </a>
                                <span class="text-muted">
                                    (Criado {{ $topic->created_at->diffForHumans() }})
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Listagem de Comentários do Usuário -->
            <div class="user-comments mt-5">
                <h3>Comentários de {{ $user->name }}</h3>
                @if ($comments->isEmpty())
                    <p>Este usuário ainda não fez nenhum comentário.</p>
                @else
                    <ul class="list-group">
                        @foreach ($comments as $comment)
                            <li class="list-group-item">
                                <p>{{ $comment->content }}</p>
                                <small class="text-muted">
                                    Comentado em: {{ $comment->created_at->diffForHumans() }}
                                </small>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
    </div>
@endsection
