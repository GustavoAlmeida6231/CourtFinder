<?php

session_start();

$msg = "";

require 'vendor/autoload.php';
ini_set('default_charset', 'utf-8');

use PHPMailer\PHPMailer\PHPMailer;

include_once('./configuracoes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailToCheck = $_POST['email'];
    $_SESSION['usuario_email'] = $emailToCheck;


    $stmt = $conexao->prepare("SELECT * FROM cadastro_usuario WHERE email = ?");
    $stmt->bind_param("s", $emailToCheck);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'CourtFinder66';
            $mail->Password   = 'weyxupkyecnpzaky';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->addAddress("$emailToCheck");
            $mail->isHTML(true);
            $mail->Subject = 'Seja Bem Vindo! - Preencha o Formulario do Contfinder';
            $mail->Body = '
                <html>
                <head>
                    <title>Sua Quadra Joga com a Gente!</title>
                    <meta charset="UTF-8">
                </head>
                <body>
                    <h1>Preencha o Formulario</h1>
                    <p>Apos Preencher o formulario aguarde a resposta!</p>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSfZNoa5NYh8WumWK_lokdw-pAnFawqyNv0BXIyhNKMe2US9gw/viewform">Formulario Para Validacao!</a>
                </body>
                </html>
            ';

            $mail->send();
            $msg = 'Email enviado com sucesso';
        } catch (Exception $e) {
            $msg = 'Erro ao enviar o email: ' . $e->getMessage();
        }
    } else {
        $msg = 'O email não está cadastrado';
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styleforgetpass.css">
</head>

<body>
    <a href="./index.html" class="logo-link">
        <span class="text-hover-green">COURTFINDER ®</span>
    </a>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 form-container">
            <img src="./img/logo.png" class="logo" alt="Logo">
            <form action="" method="POST" autocomplete="">
                <h2 class="text-center">Quer cadastrar sua quadra?</h2>
                <p class="text-center">Escreva seu email abaixo!</p>
                <br>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group">
                    <input class="form-control button btn-redefinir mr-2" type="submit" name="check-email" value="Enviar">
                    <input id="botaoVoltar" class="form-control button btn-voltar mr-2 mt-2" type="button" name="voltar" value="Voltar">
                </div>
                <p class="text-center"><?php echo $msg ?></p>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('botaoVoltar').addEventListener('click', function() {
                window.history.back();
            });
        });
    </script>
</body>

</html>