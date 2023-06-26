<?php

session_start();

if (isset($_POST['cadastrado'])) {
    include_once('./config.php');

    $login = $_POST['login'];
    $email = $_POST['email'];
    $regiao = $_POST['regiaoGeral'];
    $celular = $_POST['celular'];
    $dataNasc = $_POST['dtnasc'];
    $password = $_POST['password'];

    $sql = $conexao->prepare("SELECT * FROM cadastro_usuario WHERE login = ? OR email = ?");
    $sql->bind_param("ss", $login, $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        echo '<script>
            var resposta = alert("Usuário já existe!");
            if (resposta) {
                window.location.href = "../login.html";
            } else {
                window.location.href = "../login.html";
            }
        </script>';
    } else {
        // Defina o nível inicial do cliente
        $nivel = 1;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = $conexao->prepare("INSERT INTO cadastro_usuario (login, email, regiao, celular, dataNascimento, password, nivel) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssssi", $login, $email, $regiao, $celular, $dataNasc, $hashedPassword, $nivel);
        
        if ($sql->execute() === TRUE) {
            echo '<script>
                var resposta = alert("Usuário cadastrado com sucesso!");
                if (resposta) {
                    window.location.href = "../login.html";
                } else {
                    window.location.href = "../login.html";
                }
            </script>';
        } else {
            echo "Erro ao cadastrar: " . $conexao->error;
        }
    }

    $sql->close();
    $conexao->close();
}
?>
