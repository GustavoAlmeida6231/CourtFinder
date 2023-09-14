<?php
session_start();

// Conexão com o banco de dados
include_once('../configuracoes/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
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
        header("Location:../loginCadastro.html");
        exit;
    } else {
        echo "Erro ao atualizar as informações do usuário: " . $conexao->error;
    }

    $conexao->close();
}
?>
