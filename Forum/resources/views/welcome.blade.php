@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
<script src="{{ asset('js/carrosel.js') }}" defer></script>
<div class="container">
    <div class="Titulo">
        <h1 class="TituloWelcome">Seja Bem vindo ao MasterForum</h1>
    </div>
    <div class="containerWelcome">
        <div class="text">
            <h2 class="TituloWelcome">O Mundo Pokémon está à sua espera!</h2>
            <p>
            Explore o universo dos Pokémon no MasterForum, onde treinadores se encontram para 
            compartilhar experiências, estratégias e notícias fresquinhas do mundo Pokémon. 
            Seja você um novato ansioso para começar sua jornada ou um mestre experiente em 
            busca de novos desafios, nosso fórum é o lugar ideal para trocar ideias, batalhar 
            virtualmente e descobrir tudo o que há para saber sobre os adoráveis e poderosos Pokémon.
            </p>
        </div>
        <div class="image">
            <img style="width: 100%; height: 210px;" src="{{ asset('images/masterIcon.png') }}">
        </div>
    </div>
    <div class="ContainerCarrosel">
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button material-symbols-rounded"></button>
            <div class="image-list">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-1" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-2" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-3" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-4" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-5" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-6" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-7" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-8" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-9" class="image-item">
                <img src="{{ asset('images/masterIcon.png') }}" alt="img-10" class="image-item">
            </div>
            <button id="next-slide" class="slide-button material-symbols-rounded"></button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection