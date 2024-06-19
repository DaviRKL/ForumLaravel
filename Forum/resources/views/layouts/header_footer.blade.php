<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/masterIcon.ico') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}" defer></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="{{ mix('css/app.css') }}" rel="stylesheet">

<title> Fórum - Laravel </title>
</head>

<body>
    
    <div id="app">
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <span class="menu-text">Menu</span>
                <i class="fas fa-times" id="close-btn"></i>
            </div>
            <div class="sidebar-content">
                <a href="users"><i class="fa fa-home"></i> Início</a>
                <a href="register"><i class="fa fa-user-plus"></i> Cadastre-se</a>
                <a href="users"><i class="fa fa-user"></i> Perfil</a>
                <a href="login"><i class="fa fa-sign-in"></i> Logar</a>
                <a href="logout"><i class="fa fa-sign-out"></i> Sair</a>
                <a href="settings"><i class="fa fa-cog"></i> Configurações</a>
            </div>
        </div>
        <div class="navbar">
            <i class="fa fa-bars" id="btn-navbar"></i>
            <div class="titleWrapper">
                <h1 class="Title"><i class="far fa-dot-circle"></i> MasterForum</h1>
            </div>
            <a href='users/1'>
                <i class="fas fa-user-circle"></i>
            </a>
            <a href='logout'>
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
    
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/in/davi-ryan-konuma-lima-62b00221b/" target="_blank" rel="noopener noreferrer">
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

