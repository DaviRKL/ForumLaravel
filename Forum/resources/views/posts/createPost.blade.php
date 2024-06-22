@extends('layouts.header_footer')

@section('content')
<div class="create-post-container">
    
    <form action="{{route('register')}}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Crie seu Post!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Titulo do Post:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old("title") }}" required>
            @error("title") <span>{{$message}}</span> @enderror
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
            @error('category') <span>{{ $message }}</span> @enderror
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
            @error('tag') <span>{{ $message }}</span> @enderror
        </div>     
    
        <div class="form-group">
            <label for="text" class="form-label">Texto do Post:</label>
            <textarea id="text" name="text" class="form-input" required>{{ old('text') }}</textarea>
            @error('text') <span>{{ $message }}</span> @enderror
        </div>
    
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection
