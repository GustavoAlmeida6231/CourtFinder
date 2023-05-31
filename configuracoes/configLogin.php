<?php

session_start();
ini_set('default_charset', 'utf-8');

if (isset($_POST['login'])) {

    // Conexão com o banco de dados
    include_once('./config.php');

    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = mysqli_real_escape_string($conexao, $login);
    $password = mysqli_real_escape_string($conexao, $password);

    $sql = "SELECT * FROM cadastro_usuario WHERE login='$login' AND password='$password'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario'] = $row['login'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['dtNasci'] = $row['dataNascimento'];
        header("Location:./site/index.php");
        exit();
    } else {
        header("Location:login.php");
    }

    $conexao->close();
}
?>