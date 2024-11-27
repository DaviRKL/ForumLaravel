@extends('layouts.header_footer')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <div class="profile-container">
        @if ($user != null)
            <!-- Seção de Perfil -->
            <div class="profile-form  mt-5">
                <h2 class="section-title">Perfil</h2>
                <img class="picture" src="/storage/{{$user->photo}}">
                <form action="{{ route('updateUser', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" id="name" name="name" class="form-input" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-input" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                     
                    <div class="form-group">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" id="password" name="password" class="form-input">
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-label">Senha:</label>
                        <input type="file" id="photo" name="photo" class="form-input">
                        @error('photo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="submit-button" value="Editar">
                    </div>
                    <div class="form-group">
                        <a class="btn btn-danger delete-profile" data-bs-toggle="modal" data-bs-target="#banModal">
                            <i class="fa-solid fa-ban"></i> Excluir perfil
                        </a>
                    </div>

                </form>
            </div>

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

            <!-- Seção de Tópicos -->
            <div class="user-topics  mt-5">
                <h3 class="section-title">Meus Tópicos</h3>
                @if ($topics->isEmpty())
                    <p>Este usuário ainda não criou nenhum tópico.</p>
                @else
                    <ul class="list-group">
                        @foreach ($topics as $topic)
                            <li class="list-group-item topic-item">
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

            <!-- Seção de Comentários -->
            <div class="user-comments mt-5">
                <h3 class="section-title">Meus comentários</h3>
                @if ($comments->isEmpty())
                    <p>Este usuário ainda não fez nenhum comentário.</p>
                @else
                    <ul class="list-group">
                        @foreach ($comments as $comment)
                            <li class="list-group-item comment-item">
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
