<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/masterIcon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title> Fórum - Laravel </title>
</head>

<body>
    <style>
     .toast-success {
  background: #e20d82;
}

    </style>

    <div id="app">
        @if (Session::has('message-sucess'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("{{ session('message-sucess') }}");
                    timeOut: 5000

                });
            </script>
        @elseif (Session::has('message-error'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.error("{{ session('message-error') }}");
                    timeOut: 5000
                });
            </script>
        @endif
        <div class="navbar">
            <i class="fa fa-bars" id="btn-navbar"></i>
            <div class="titleWrapper">
                    <h1 class="Title">
                        <a href="{{ route('welcome') }}">
                            <img class="NavbarIcon" src="{{ asset('images/masterIcon.ico') }}">
                        </a>
                        MasterForum
                    </h1>
            </div>
            @if (Auth::check())
                <div class="nav-icon">
                    <a href="{{ route('listUserById', [Auth::user()->id]) }}" class="nav-icon">
                        <i class="fas fa-user-circle"></i>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="{{ route('logout')}}" class="nav-icon">
                        <i class="fas fa-sign-out-alt"></i>
                        <!-- <p>Sair</p> -->
                    </a>
                </div>
            @else
                <a class="navbar-link" href="{{route('register')}}">Cadastre-se</a>
                <a class="navbar-link" href="{{route('login')}}">Entrar</a>
            @endif
        </div>
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <span class="menu-text">Menu</span>
                <i class="fas fa-times" id="close-btn"></i>
            </div>
            <div class="sidebar-content">
                <a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Início</a>
                <a href="{{ route('listAllUsers') }}"><i class="fa-solid fa-users"></i> Lista de usuários</a>

                <a href="#collapsePost" data-bs-toggle="collapse"><i class="fa-solid fa-comments"></i> Posts</a>
                <a class="collapse" id="collapsePost" href="{{ route('listAllPosts') }}"><i
                        class="fa-solid fa-comments"></i> Ver Post</a>
                <a class="collapse" id="collapsePost" href="{{ route('createPost') }}"><i class="fa-solid fa-plus"></i>
                    Criar Posts</a>

                <a data-bs-toggle="collapse" href="#collapseTopicos"><i class="fa-solid fa-arrow-trend-up"></i>
                    Categorias</a>
                <a class="collapse" id="collapseTopicos" href="{{ route('listAllCategories') }}"><i
                        class="fa-solid fa-arrow-trend-up"></i> Ver Categorias</a>
                <a class="collapse" id="collapseTopicos" href="{{ route('createCategory') }}"><i
                        class="fa-solid fa-plus"></i> Criar Categorias</a>

                <a href="#collapseTag" data-bs-toggle="collapse"><i class="fa-solid fa-hashtag"></i> Tags</a>
                <a class="collapse" id="collapseTag" href="{{ route('listAllTags') }}"><i class="fa-solid fa-hashtag"></i> Ver Tags</a>
                <a class="collapse" id="collapseTag" href="{{ route('createTag') }}"><i class="fa-solid fa-plus"></i> Criar Tags</a>

                @if (Auth::check())
                    <a href="{{ route('listUserById', [Auth::user()->id]) }}" class="sidebar-user"><i
                            class="fa-solid fa-id-card"></i>
                        Meu Perfil
                    </a>
                    <a href="{{ route('logout') }}" class="sidebar-user">
                        <i class="fa-solid fa-right-from-bracket"></i> Sair
                    </a>
                @else
                    <a class="sidebar-user" href="register">Cadastre-se</a>
                    <a class="sidebar-user"href="login">Entrar</a>
                @endif

                <a href="settings"><i class="fa fa-cog"></i> Configurações</a>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/in/davi-ryan-konuma-lima-62b00221b/" target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/DaviRKL" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="mailto:davirkl07@gmail.com">
                        <i class="fas fa-envelope"></i>
                    </a>
                </li>
            </ul>
            <p>&copy; 2024 Davi Ryan Konuma Lima</p>
        </div>
    </footer>

</body>

</html>
