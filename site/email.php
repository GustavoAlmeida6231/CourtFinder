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
            $mail->Subject = 'Seja Bem Vindo! - Recupere sua senha do Contfinder';
            $mail->Body = '
                <html>
                <head>
                    <title>Redefinicao de Senha</title>
                    <meta charset="UTF-8">
                </head>
                <body>
                    <h1>Redefinicao de Senha</h1>
                    <p>Clique no link abaixo para Redefinir a Senha:</p>
                    <a href="http://localhost/OFICIAL/redefinir.php">Redefinir Senha</a>
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
    <a href="./loginCadastro.html" class="logo-link">
        <span class="text-hover-green">COURTFINDER ®</span>
    </a>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 form-container">
            <img src="./img/logo.png" class="logo" alt="Logo">
            <form action="" method="POST" autocomplete="">
                <h2 class="text-center">Esqueceu a Senha?</h2>
                <p class="text-center">Escreva seu email abaixo!</p>
                <br>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group">
                    <input class="form-control button btn-redefinir mr-2" type="submit" name="check-email" value="Redefinir senha">
                    <input class="form-control button btn-voltar mr-2 mt-2" type="submit" name="voltar" value="Voltar">
                </div>
                <p class="text-center"><?php echo $msg ?></p>
            </form>
        </div>
    </div>
</body>

</html>