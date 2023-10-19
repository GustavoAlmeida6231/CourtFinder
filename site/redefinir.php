<?php
ini_set('default_charset', 'utf-8');
session_start();

include_once('../configuracoes/config.php');

$email = $_SESSION['usuario_email'];
$sql = "SELECT * FROM cadastro_usuario WHERE email = '$email'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $login = $row['login'];
    $email = $row['email'];
    $dataNascimento = $row['dataNascimento'];
    $password = $row['password'];
    $nivelCliente = $row['nivel'];
} else {
    echo "Nenhum resultado encontrado.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $password_confir = $_POST['password_confir'];

    if ($password == $password_confir) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE cadastro_usuario SET password='$hashed_password' WHERE email='$email'";
        $conexao->query($sql);

        echo 'Senha redefinida com sucesso!';
    } else {
        echo 'As senhas não coincidem';
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylenewpass.css">
</head>
<body>
    <a href="outra-pagina.html" class="logo-link">
        <span class="text-hover-green">COURTFINDER ®</span>
    </a>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 form-container">
            <img src="../img/logo.png" class="logo" alt="Logo">
            <form action="" method="POST" autocomplete="" onsubmit="">
                <h2 class="text-center">Crie uma senha nova.</h2>
                <p class="text-center">Sua senha deve conter:<br>- A senha deve ter pelo menos 8 caracteres<br>- Pelo menos uma letra de A-Z<br>- Pelo menos um número de 1-9
                </p>
                <br>
                <div class="form-group">
                    <input class="form-control" type="password" id="senha" name="password" placeholder="Digite sua nova senha">
                    <input class="form-control mt-4" type="password" id="confirmarSenha" name="password_confir" placeholder="Confirme sua senha">
                </div>
                <div class="form-group">
                    <input class="form-control button btn-redefinir mr-2" type="submit" name="confirm-newpass" value="Confirmar nova senha">
                    <input class="form-control button btn-voltar mr-2 mt-2" type="submit" name="voltar" value="Voltar">
                </div>
            </form>
        </div>
    </div>
</body>

    <script>
        var senha = $('#senha');
        var olho = $("#olho");

        olho.mousedown(function () {
            senha.attr("type", "text");
        });

        olho.mouseup(function () {
            senha.attr("type", "password");
        });

        olho.mouseout(function () {
            senha.attr("type", "password");
        });

        var senha_confir = $('#senha_confir');
        var olho_confir = $("#olho_confir");

        olho_confir.mousedown(function () {
            senha_confir.attr("type", "text");
        });

        olho_confir.mouseup(function () {
            senha_confir.attr("type", "password");
        });

        olho_confir.mouseout(function () {
            senha_confir.attr("type", "password");
        });
    </script>
</body>

</html>