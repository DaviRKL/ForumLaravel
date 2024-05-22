<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<body>

<h2>Criar Usuário</h2>

<form action="/usuarios" method="POST">
    @csrf <!-- Para proteção CSRF no Laravel -->
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha"><br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
