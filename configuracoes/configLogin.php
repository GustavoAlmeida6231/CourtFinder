<?php

session_start();
ini_set('default_charset', 'utf-8');

if (isset($_POST['login'])) {
    include_once('./config.php');

    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = mysqli_real_escape_string($conexao, $login);

    $sql = "SELECT * FROM cadastro_usuario WHERE login='$login'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nome'] = $row['login'];
            header("Location:../site/index.php");
            exit();
        } else {
            header("Location:../loginCadastro.html");
        }
    } else {
        header("Location:../loginCadastro.html");
    }

    $conexao->close();
}

?>
