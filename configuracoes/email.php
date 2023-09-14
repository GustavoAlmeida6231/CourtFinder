<?php

session_start();

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

include_once('./config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $smtpHost = 'sandbox.smtp.mailtrap.io';
    $smtpPort = 2525;
    $smtpUsername = '6bca6ea5680e1a';
    $smtpPassword = 'ff926ae8fbd4ad';

    $emailToCheck = $_POST['email'];


    $stmt = $conexao->prepare("SELECT * FROM cadastro_usuario WHERE email = ?");
    $stmt->bind_param("s", $emailToCheck);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Port = $smtpPort;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;

            $mail->setFrom('gustavoalmeida6231@gmail.com', 'gustavoalmeida6231@gmail.com');
            $mail->addAddress($emailToCheck);

            $mail->isHTML(true);
            $mail->Subject = 'Seja Bem Vindo! - Recupere sua senha do Contfinder';
            $mail->Body = '
                <html>
                <head>
                    <title>Validacao de Email</title>
                    <meta charset="UTF-8">
                </head>
                <body>
                    <h1>Validacao de Email</h1>
                    <p>Clique no link abaixo para Validacao de Email:</p>
                    <a href="http://localhost/OFICIAL/login.html">Redefinir Senha</a>
                </body>
                </html>
            ';

            $mail->send();
            echo 'Email enviado com sucesso';
        } catch (Exception $e) {
            echo 'Erro ao enviar o email: ', $e->getMessage();
        }
    } else {
        echo 'O email não está cadastrado';
    }

    $stmt->close(); // Fecha a declaração preparada
    $conexao->close(); // Fecha a conexão com o banco de dados
}
?>