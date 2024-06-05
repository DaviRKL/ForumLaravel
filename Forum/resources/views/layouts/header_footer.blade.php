<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<title> Fórum - Laravel </title>
</head>

<body>
    <div class="topnav">
        <div class="navbar d-flex">
            <!-- Use Bootstrap's built-in utility classes to align the icon to the left -->
            <i class="fa-solid fa-bars fa-lg text-white me-3" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>
            <!-- Use Bootstrap's text-center class to center the title -->
            <div class="flex-grow-1 text-center">
                <h2 class="titulo-navbar">Fórum Laravel</h2>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="flex-column linha-sidebar">
                    <a class="active" href="{{ route('listAllUsers') }}">Início</a>
                </div>
                <div class="flex-column linha-sidebar">
                    <a href="{{ route('register') }}">Criar Usuário</a>
                </div>
                <div class="flex-column linha-sidebar">
                    
                    <a href="">Consultar usuário</a>
                </div>
                <div class="flex-column linha-sidebar">
                    <a href="{{ url('users/id/edit') }}">Editar Usuário</a>
                </div>
                <div class="flex-column linha-sidebar">
                    <a href="{{ url('users/id/delete') }}">Deletar Usuário</a>
                </div>
                <div class="flex-column linha-sidebar">
                    <a href="{{ route('login') }}">Logar</a>
                </div>
                <div class="flex-column linha-sidebar">
                    <a href="{{ route('logout') }}">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="text-white py-3 ">
        <div class="container text-center">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/in/davi-ryan-konuma-lima-62b00221b/" class="text-white"><i
                            class="fab fa-linkedin"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/DaviRKL" class="text-white"><i class="fab fa-github"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="mailto:davirkl07@gmail.com" class="text-white"><i class="fas fa-envelope"></i></a>
                </li>
            </ul>
            <p>&copy; 2024 Davi Ryan Konuma Lima</p>
        </div>
    </footer>

</body>

</html>
