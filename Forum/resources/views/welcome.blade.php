@extends('layouts.header_footer')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
    <script src="{{ asset('js/carrosel.js') }}" defer></script>
    <div class="container">

        <div class="container containerWelcome">
            <div class="text">
                <h1 class="TituloWelcome">Seja Bem vindo ao MasterForum!</h1>
                <h2>O Mundo Pokémon está à sua espera!</h2>
                <p>Explore o universo dos Pokémon no MasterForum, onde treinadores se encontram para compartilhar
                    experiências, estratégias e notícias fresquinhas do mundo Pokémon.
                    Seja você um novato ansioso para começar sua jornada ou um mestre experiente em busca de novos desafios,
                    nosso fórum é o lugar ideal para trocar ideias,
                    batalhar virtualmente e descobrir tudo o que há para saber sobre os adoráveis e poderosos Pokémon.</p>
            </div>
            <div class="image">
                <img src="{{ asset('images/pokemon-anime-ash-amigos-alola.png') }}" alt="Pokémon">
            </div>
        </div>

        <div class="containerWelcome">

            <div class="image">
                <img src="{{ asset('images/pokemonAnos.jpg') }}" alt="Pokémon">
            </div>
            <div class="text">
                <h1 class="TituloWelcome">Debata sobre todas gerações!</h1>
                <p>Desde sua estreia em 1996, Pokémon cativou fãs ao redor do mundo com suas diversas gerações, cada uma
                    introduzindo novos Pokémon, regiões e aventuras.
                    No MasterForum, você pode explorar todas as gerações de Pokémon, desde Kanto até Galar, e compartilhar
                    suas experiências e estratégias com outros treinadores.
                    No MasterForum, você pode discutir tudo isso e muito mais! Quer compartilhar sua experiência na Liga
                    Pokémon, discutir as estratégias mais eficientes,
                    ou simplesmente relembrar suas aventuras favoritas? Este é o lugar certo para você. Junte-se a nós e
                    mergulhe fundo no incrível mundo das gerações de Pokémon!</p>
            </div>
        </div>

        <div class="ContainerCarrosel">
            <h2 class="TituloWelcome">Explore Nossas Categorias!</h2>
            <div class="slider-wrapper">
                <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                <div class="image-list">
                    @foreach ($categories as $category)
                        <div class="image-item">
                            <img src="{{ asset('images/masterIcon.png') }}" alt="Categoria">
                            <p class="image-text">{{ $category->title }}</p>
                        </div>
                    @endforeach
                </div>
                <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h1 class="mb-4">Tópicos Recentes</h1>
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
                        </div>
                        <div class="card-body">
                            <p>{{ $topic->description }}</p>
                            <p>Categoria: {{ $topic->category->title ?? 'Sem categoria' }}</p>
                            <a href="{{ route('listTopicById', $topic->id) }}" class="btn btn-primary">Ver Tópico</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection
