<?php
include_once('../configuracoes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $espaco_id = $_POST['espaco_id'];
    $nome = $_POST['nome'];
    $comentario = $_POST['comentario'];
    $data_comentario = date('Y-m-d H:i:s');

    $sql = "INSERT INTO comentarios (espaco_id, nome, comentario, data_comentario) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('isss', $espaco_id, $nome, $comentario, $data_comentario);

    if ($stmt->execute()) {
        header('Location: descricao.php?id=' . $espaco_id);
    } else {
        echo 'Erro ao adicionar comentário.';
    }

    $stmt->close();
}

?>
