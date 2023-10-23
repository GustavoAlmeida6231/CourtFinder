<?php
session_start();
include_once('../configuracoes/config.php');
if (isset($_GET['id'])) {
  $espaco_id = $_GET['id'];
  $sql_detalhes = "SELECT * FROM courtfinder.quadra WHERE id_espaco = $espaco_id";
  $result_detalhes = $conexao->query($sql_detalhes);

  if ($result_detalhes->num_rows > 0) {
    $row_detalhes = $result_detalhes->fetch_assoc();
    $nome_espaco_detalhes = $row_detalhes['nome_espaco'];
    $descricao_espaco_detalhes = $row_detalhes['descricao_espaco'];
    $valor_espaco_detalhes = $row_detalhes['valor_espaco'];
    $avaliacao_espaco_detalhes = $row_detalhes['avaliacao_espaco'];
    $nome = $row_detalhes['img_nome'];
    $conteudo = $row_detalhes['img_conteudo'];
    $imagemData = base64_encode($conteudo);
  } else {
    echo 'Espaço não encontrado.';
  }
} else {
  echo 'ID do espaço não fornecido na URL.';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  ini_set('default_charset', 'utf-8');
  if (!isset($_SESSION['usuario_id'])) {
    header("Location:../loginCadastro.html");;
    exit();
  }
  ?>
  <title>Shop Court</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
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

  .card {
    background-color: rgb(2, 110, 2);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
    transition: all 0.2s ease-in-out;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px 0 rgba(138, 43, 226, 0.3);
  }

  .card-img {
    width: 50%;
    height: auto;
  }

  .fa-star.checked {
    color: #201B2C;
  }

  .btn-green {
    background-color: #49b307;
    color: #fff;
  }

  .btn-green:hover {
    background-color: #49b307;
    color: #201B2C;
    box-shadow: 0 4px 6px 0 rgba(138, 43, 226, 0.3);
  }

  .form-container {
    background-color: #49b307;
    border-radius: 10px;
    height: 4rem;
    margin-left: 5.5rem;
    width: 70rem;
    color: #fff;
    box-shadow: 0 4px 6px 0 rgba(138, 43, 226, 0.3);
  }

  .form-select {
    background-color: #201B2C;
    color: #fff;
    width: 15rem;
    box-shadow: 0 4px 6px 0 rgba(138, 43, 226, 0.3);
  }

  .top-form {
    font-size: 1.3rem;
  }

  .miniaturas {
    display: flex;
    list-style: none;
    padding: 0;
  }

  .miniaturas li img {
    max-width: 150px;
    height: auto;
  }

  .miniaturas li {
    margin-right: 10px;
  }

  h1 {
    margin-left: 1rem;
  }
</style>

<body style="background-color: #201b2c; height: 100vh; width: 100vw">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="#">COURTFINDER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-lg-2 mt-2 p-2">
          <li class="nav-item me-3 p-2">
            <a class="nav-link active text-light" aria-current="page" href="../index.html">HOME</a>
          </li>
          <li class="nav-item me-3 p-2">
            <a class="nav-link active text-light" href="./index.php">QUADRAS</a>
          </li>
          <li class="nav-item me-3 p-2">
            <a class="nav-link active text-light" aria-current="page" href="#">QUEM SOMOS</a>
          </li>
          <li class="nav-item me-3 p-2">
            <a class="nav-link active text-light" aria-current="page" href="./cadastrarQuadra.php">CADASTRE SUA QUADRA</a>
          </li>
          <li class="nav-item me-3 p-2">
            <a class="nav-link active text-light" aria-current="page" href="../suaquadra.php">TENHA SUA QUADRA</a>
          </li>
          <div class="dropdown p-2" data-bs-theme="success">
            <button class="btn dropdown-toggle text-light form-control border-success" type="button" id="dropdownMenuButtonSuccess" data-bs-toggle="dropdown">
              Mais Opções!
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSuccess">
              <li><a class="dropdown-item text-light" href="../site/perfil.php">Perfil</a></li>
              <li><a class="dropdown-item text-light" href="#">Configurações de Conta</a></li>
              <li><a class="dropdown-item text-light" href="#">Recentes</a></li>
              <li><a class="dropdown-item text-light" href="#">Cadastrar-se</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-light" href="../configuracoes/logout.php">logout</a></li>
            </ul>
          </div>
        </ul>
        <form class="d-flex p-1" role="search">
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
          <button class="btn form-control border-success text-light me-5" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </nav>


  <div class="container">
    <br>

    <div class="container my-5 text-light">
      <?php
      if (isset($nome_espaco_detalhes)) {
        echo '<h1>' . $nome_espaco_detalhes . '</h1>';
        echo '<div class="row">';
        echo '<div class="col-md-6">';
        echo '<div class="container card">';
        echo '<img src="data:image/jpeg;base64,' . $imagemData . '"  class="rounded">';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<h2 class="card-title">' . $nome_espaco_detalhes . '</h2>';
        echo '<p class="card-text">' . $descricao_espaco_detalhes . '</p>';
        echo '<h4>Horários Disponíveis:</h4>';
        echo '<form action="reservar.php" method="POST">';
        echo '<select name="horario" class="form-select">';

        for ($hora = 9; $hora < 18; $hora++) {
          $horario_inicio = $hora;
          $horario_fim = $hora + 1;
          $horario_formatado = sprintf("De %dh às %dh", $horario_inicio, $horario_fim);
          echo '<option value="' . $horario_formatado . '">' . $horario_formatado . '</option>';
        }

        echo '</select>';
        echo '<button type="submit" class="btn btn-green">Reservar</button>';

        echo '<div class="mt-3">';
        echo '<img width="36" height="36" src="https://img.icons8.com/color/36/pix.png" alt="pix"/>';
        echo '<img width="36" height="36" src="https://img.icons8.com/color/36/visa.png" alt="visa"/>';
        echo '<img width="36" height="36" src="https://img.icons8.com/color/36/mastercard.png" alt="mastercard"/>';
        echo '<img width="36" height="36" src="https://img.icons8.com/color/36/paypal.png" alt="paypal"/>';
        echo '<img width="36" height="36" src="https://img.icons8.com/color/36/boleto-bankario.png" alt="boleto-bankario"/>';
        echo '</div>';

        echo '</form>';
        echo '</div>';
        echo '</div>';
      } else {
        echo '<p>Detalhes da quadra não encontrados.</p>';
      }
      echo '<br>';
      ?>

      <form method="POST" action="adicionar_comentario.php">
        <input type="hidden" name="espaco_id" value="<?php echo $espaco_id; ?>">
        <div class="form-group">
          <input type="hidden" class="form-control" name="nome" value="<?php echo isset($_SESSION['usuario_id']) ? $_SESSION['usuario_nome'] : ''; ?>" required>
        </div>
        <div class="form-group">
          <label for="comentario">Comentário:</label>
          <textarea class="form-control" name="comentario" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Comentário</button>
      </form>

      <?php
      echo '<br>';
      echo '<br>';

      try {
        $sql_comentarios = "SELECT * FROM comentarios WHERE espaco_id = $espaco_id ORDER BY data_comentario DESC";
        $result_comentarios = $conexao->query($sql_comentarios);

        if ($result_comentarios === false) {
          throw new Exception("Erro na consulta ao banco de dados: " . $conexao->error);
        }

        if ($result_comentarios->num_rows > 0) {
          echo '<h3>Comentários:</h3>';
          while ($row_comentario = $result_comentarios->fetch_assoc()) {
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row_comentario['nome'] . '</h5>';
            echo '<p class="card-text">' . $row_comentario['comentario'] . '</p>';
            echo '<p class="card-text "><small class="text-dark">' . date('d/m/Y H:i:s', strtotime($row_comentario['data_comentario'])) . '</small></p>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<p>Nenhum comentário encontrado.</p>';
        }
      } catch (Exception $e) {
        echo '<p>Ocorreu um erro: ' . $e->getMessage() . '</p>';
      }
      ?>


    </div>





  </div>
  </div>
  <br>
  <br>
  <br>

</body>

</html>

<!--  -->