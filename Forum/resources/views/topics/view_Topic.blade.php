@extends('layouts.header_footer')

@section('content')
    <div class="create-post-container">

        <form action="{{ route('register') }}" method="POST" class="create-post-form">
            <h2 class="create-post-title">Post #1</h2>
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Titulo do Post:</label>
                <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Categoria do Post:</label>
                <select id="category" name="category" class="form-input" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="batalhas">Batalhas Pokémon</option>
                    <option value="treinadores">Treinadores Pokémon</option>
                    <option value="estrategias">Estratégias de Batalha</option>
                    <option value="regioes">Regiões Pokémon</option>
                    <option value="noticias">Notícias Pokémon</option>
                    <option value="jogos">Jogos Pokémon</option>
                    <option value="animes">Animes Pokémon</option>
                    <option value="eventos">Eventos Pokémon</option>
                </select>
                @error('category')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tag" class="form-label">Tags do Post:</label>
                <select id="tag" name="tag" class="form-input" required>
                    <option value="">Selecione tags</option>
                    <option value="batalhas">#BatalhasPokémon</option>
                    <option value="treinadores">#TreinadoresPokémon</option>
                    <option value="estrategias">#Estratégias de Batalha</option>
                    <option value="regioes">#RegiõesPokémon</option>
                    <option value="noticias">#NotíciasPokémon</option>
                    <option value="jogos">#JogosPokémon</option>
                    <option value="animes">#AnimesPokémon</option>
                    <option value="eventos">#EventosPokémon</option>
                </select>
                @error('tag')
                    <span>{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="text" class="form-label">Texto do Post:</label>
                <textarea id="text" name="text" class="form-input" required>{{ old('text') }}</textarea>
                @error('text')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <input type="submit" class="btn btn-edit" value="Editar">
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i>
                    Excluir Post</a>
            </div>
        </form>
    </div>
    <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Excluir Post</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir esse Post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"><i
                            class="fa-solid fa-rotate-left"></i> Voltar</button>
                    <form  {{-- action="{{ route('deleteUser', [$user->id]) }}" --}} method="POST" class="w-50">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value=" Confirmar">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
