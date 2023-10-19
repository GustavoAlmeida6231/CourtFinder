<?php
// Configurações do banco de dados
include_once('../configuracoes/config.php');

$maxFileSize = 1024 * 1024;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome_espaco = $_POST["nome_espaco"];
  $descricao_espaco = $_POST["descricao_espaco"];
  $valor_espaco = $_POST["valor_espaco"];
  $avaliacao_espaco = $_POST["avaliacao_espaco"];
  $estado = $_POST["estado"]; // Adicione a variável para o estado

  if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    $stmt = $conexao->prepare("INSERT INTO courtfinder.quadra (nome_espaco, descricao_espaco, valor_espaco, avaliacao_espaco, estado, img_nome, img_conteudo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nome_espaco, $descricao_espaco, $valor_espaco, $avaliacao_espaco, $estado, $_FILES['imagem']['name'], $imagem);

    if ($stmt->execute()) {
    } else {
    }
    $stmt->close();
  } else {
  }
}

$conexao->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Navbar W bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
  .navbar {
    background-color: #49b307 !important;
  }

  .navbar-brand {
    color: #fff;
    text-shadow: 3px 0px 7px #290465,
      -3px 0px 4px #290465,
      0px 4px 4px #290465;
    transition: 0.7s;
  }

  .navbar-brand:hover {
    color: #290465;
  }

  .navbar-brand,
  .nav-link {
    border-radius: 5px;
  }

  .nav-link:hover {
    background-color: #1B3C02;
  }

  .btn:focus,
  .btn:active {
    background-color: #1B3C02 !important;
  }


  .dropdown-menu {
    background-color: green;
  }

  .dropdown-item:hover {
    background-color: #1B3C02 !important;
  }

  .container {
    margin-top: 50px;
  }
</style>

<body style="background-color: #201b2c; height: 100vh; width: 100vw">
<nav class="navbar navbar-expand-lg shadow bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand ms-5 text-light" href="index.html">COURTFINDER</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/1024px-Hamburger_icon.svg.png);"></span>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-lg-2 mt-2 p-2">
              <li class="nav-item me-3 p-2">
                <a class="nav-link active text-light" aria-current="page" href="./index.html">HOME</a>
              </li>
              <li class="nav-item me-3 p-2">
                <a class="nav-link active text-light" href="./index.php">MODALIDADES</a>
              </li>
              <li class="nav-item me-3 p-2">
                <a class="nav-link active text-light" aria-current="page" href="#">QUEM SOMOS</a>
              </li>
              <li class="nav-item me-3 p-2">
                <a class="nav-link active text-light" aria-current="page" href="./suaquadra.php">TENHA SUA QUADRA</a>
              </li>
              <li class="nav-item me-3 p-2">
                <a class="nav-link active text-light" aria-current="page" href="./loginCadastro.html">LOGIN</a>
              </li>
              <div class="dropdown p-2" data-bs-theme="success">
                  <button class="btn dropdown-toggle text-light form-control border-success" type="button" id="dropdownMenuButtonSuccess" data-bs-toggle="dropdown">
                    Mais Opções!
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSuccess">
                    <li><a class="dropdown-item text-light" href="#">Perfil</a></li>
                    <li><a class="dropdown-item text-light" href="#">Configurações de Conta</a></li>
                    <li><a class="dropdown-item text-light" href="#">Recentes</a></li>
                    <li><a class="dropdown-item text-light" href="#">Cadastrar-se</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-light" href="#">Ajuda</a></li>
                  </ul>
                </div>
            </ul>
            <form class="d-flex p-1" role="search">
              <input class="form-control me-2" list="datalistOptions" type="search" placeholder="Pesquisar" aria-label="Search">
              <datalist id="datalistOptions">
                <option value="Ajuda">
                <option value="Sobre Nós">
                <option value="Quadras">
                <option value="Futebol">
                <option value="Basquete">
              </datalist>
              <button class="btn form-control border-success text-light me-5" type="submit">Pesquisar</button>
            </form>
          </div>
        </div>
      </nav>
  <div class="container" style="color: white;">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center">Formulário de Quadra</h2>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome_espaco">Nome do Espaço:</label>
            <input type="text" class="form-control" id="nome_espaco" name="nome_espaco" required>
          </div>

          <div class="form-group">
            <label for="descricao_espaco">Descrição do Espaço:</label>
            <input type="text" class="form-control" id="descricao_espaco" name="descricao_espaco" required>
          </div>

          <div class="form-group">
            <label for="valor_espaco">Valor do Espaço:</label>
            <input type="text" class="form-control" id="valor_espaco" name="valor_espaco" required>
          </div>

          <div class="form-group">
            <label for="avaliacao_espaco">Avaliação do Espaço:</label>
            <input type="number" class="form-control" id="avaliacao_espaco" name="avaliacao_espaco" min="1" max="5" required>
          </div>

          <div class="form-group">
            <label for="img_conteudo">Imagem do Espaço:</label>
            <input type="file" class="form-control-file" id="img_conteudo" name="imagem" required>
          </div>

          <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-select" id="estado" name="estado">
              <option selected>Selecione o Estado</option>
              <option value="SP">São Paulo</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="MG">Minas Gerais</option>
            </select>
          </div>


          <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>