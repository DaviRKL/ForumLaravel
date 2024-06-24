@extends('layouts.header_footer')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
    <script src="{{ asset('js/carrosel.js') }}" defer></script>
    <div class="container">
        
        <div class="container containerWelcome">
            <div class="text">
                {{-- <h1 class="TituloWelcome">Seja Bem vindo ao MasterForum @if (Auth::check()){{ Auth::user()->name }} @endif!</h1> --}}
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
            <h2 class="TituloWelcome">Conheça nossos Tópicos!</h2>
            <div class="slider-wrapper">
                <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                <div class="image-list">
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-1">
                        <p class="image-text">Tópico 1</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-2">
                        <p class="image-text">Tópico 2</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-3">
                        <p class="image-text">Tópico 3</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-4">
                        <p class="image-text">Tópico 4</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-5">
                        <p class="image-text">Tópico 5</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-6">
                        <p class="image-text">Tópico 6</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-7">
                        <p class="image-text">Tópico 7</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-8">
                        <p class="image-text">Tópico 8</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-9">
                        <p class="image-text">Tópico 9</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/masterIcon.png') }}" alt="img-10">
                        <p class="image-text">Tópico 10</p>
                    </div>
                </div>
                <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
        <div class="ContainerPost">
            <div class="textPost">
                <h1 class="TituloWelcome">Posts</h1>
                <h2>Pokémon Legends Z-A!</h2>
                <h4>Por: Josias Johnson</h4>
                <p>A Pokémon Company anunciou Pokémon Legends Z-A, uma sequência do popular Pokémon Legends Arceus lançado
                    em 2022, mas desta vez ambientado na região de Kalos, a mesma de Pokémon X e Y, mas exclusivamente
                    centrado na cidade de Lumiose</p>
                <p> O jogo chega em 2025 para Nintendo Switch (e, possivelmente, Switch 2) e foi revelado durante a stream
                    Pokémon Presents de terça-feira, que também apresentou um novo jogo Pokémon TCG para celulares.</p>
                <p>
                    Embora não tenha sido mostrado muito durante a transmissão, capturamos alguns detalhes. Entre outras
                    coisas, o jogo será ambientado exclusivamente na cidade de Lumiose, e não em toda a região de Kalos.</p>
                <p> Lançados em outubro de 2013 para Nintendo 3DS, Pokémon X e Y foram os primeiros jogos Pokémon totalmente
                    3D e conquistaram uma base de fãs devotados desde então.</p>
                <p> O trailer também indica que Pokémon Legends Z-A marcará o retorno das Mega Evoluções.
                </p>
            </div>

        </div>

    </div>
@endsection
