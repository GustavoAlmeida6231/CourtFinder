<?php
session_start();

// Conexão com o banco de dados
include_once('../configuracoes/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location:../login.php");
    exit;
}

// Consulta os dados do usuário
$sql = "SELECT login, email, dataNascimento, password , nivel FROM cadastro_usuario WHERE id = {$_SESSION['usuario_id']}";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $login = $row['login'];
    $email = $row['email'];
    $dataNascimento = $row['dataNascimento'];
    $password = $row['password'];
    $nivelCliente = $row['nivel'];
} else {
    echo "Nenhum resultado encontrado.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $dtNasci = $_POST['dtNasci'];

    $sql = "UPDATE cadastro_usuario SET login='$login', email='$email', dataNascimento='$dtNasci', password='$password' WHERE id={$_SESSION['usuario_id']}";

    if ($conexao->query($sql) === TRUE) {
        echo "SUCESSO ";
        header("Location:../login.php");
        exit;
    } else {
        echo "Erro ao atualizar as informações do usuário: " . $conexao->error;
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourtFinder • Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<body>
    <h1>Seja bem-vindo • ID: <?php echo $_SESSION['usuario_id']; ?></h1>
    <h2>Nível do cliente: <?php echo $nivelCliente; ?></h2>

    <h2>Alterar Informações do Usuário</h2>

    <form method="POST" action="">
        <label for="login">Login:<br></label>
        <input type="text" name="login" value="<?php echo $login; ?>"><br><br>

        <label for="email">Email:<br></label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

        <label for="password">Senha:<br></label>
        <input type="password" id="senha" name="password"> <img id="olho"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII=" /><br><br>

        <label for="dtNasci">Data de Nascimento:<br></label>
        <input type="text" name="dtNasci" value="<?php echo $dataNascimento; ?>"><br><br>
        <input type="submit" value="Atualizar">
    </form>

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
    </script>
</body>

</html>