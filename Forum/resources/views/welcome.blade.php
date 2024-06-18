<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Sidebar</title>
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <div id="app">
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <span id="close-btn">&times;</span>
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
        <div id="menu">
            <i class="fa fa-bars"></i>
        </div>
        <div class="content">
            <h1>AEEEEEEEE</h1>
        </div>
    </div>
</body>
</html>
