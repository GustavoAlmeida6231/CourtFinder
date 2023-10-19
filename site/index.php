<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  ini_set('default_charset', 'utf-8');
  session_start();
  ?>

  <title>Shop Court</title>
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

  .img-fluid {
    width: 100%;
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
    font-size: 1rem;
  }

  @media (max-width: 767px) {
    .top-form {
      font-size: 15px !important;
      text-align: start !important;
      margin-top: 8% !important;
      margin-left: 20px !important;
    }

    .form-select {
      width: 125% !important;
      margin-left: 10px !important;
    }

    .form-container {
      margin-left: 8px !important;
      width: 95% !important;
      height: 95% !important;
    }

    .btn {
    margin-left: 55px !important;
    margin-top: 20px !important;
  }
   .dropdown-toggle {
     margin-left: 0% !important;
   }
  }
</style>

<body style="background-color: #201b2c; height: 100vh; width: 100vw">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="../">COURTFINDER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-lg-2 mt-2 p-2">
          <li class="nav-item me-3 p-2">
            <a class="nav-link active text-light" aria-current="page" href="../">HOME</a>
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
              <li><a class="dropdown-item text-light" href="../loginCadastro.html">Perfil</a></li>
              <li><a class="dropdown-item text-light" href="#">Configurações de Conta</a></li>
              <li><a class="dropdown-item text-light" href="#">Recentes</a></li>
              <li><a class="dropdown-item text-light" href="#">Cadastrar-se</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-light" href="#">Ajuda</a></li>
            </ul>
          </div>
        </ul>
        <form class="d-flex p-1" role="search">
          <input class="form-control me-2" type="search" name="q" placeholder="Pesquisar" aria-label="Search">
          <button class="btn form-control border-success text-light me-5" type="submit">Pesquisar</button>
        </form>

      </div>
    </div>
  </nav>


  <div class="container">
    <br>
    <div class="form-container col-md-12">
      <form action="" method="GET">
        <div class="d-flex col-10 mb-3">
          <strong>
            <p class="top-form mt-1 ms-5 mt-2 m-0">ENCONTRE QUADRAS ESPORTIVAS PERTO DE VOCÊ!</p>
          </strong>
          <div class="row justify-content-end">
            <div class="col-md-6">
              <select class="form-select mt-3" aria-label="Estado" name="estado">
                <option selected>Selecione o Estado</option>
                <option value="SP">São Paulo</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="MG">Minas Gerais</option>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select mt-3" aria-label="Cidade" name="cidade">
                <option selected>Selecione a Cidade</option>
                <option value="SaoPaulo">São Paulo</option>
                <option value="RioDeJaneiro">Rio de Janeiro</option>
                <option value="BeloHorizonte">Belo Horizonte</option>
              </select>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn form-control border-success text-light mt-3" style="margin-left: 100px">Filtrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <?php
      include_once('../configuracoes/config.php');

      // Consulta para obter os dados
      $sql = "SELECT * FROM courtfinder.quadra";
      $result = $conexao->query($sql);



      if (isset($_GET['estado'])) {
        $estado = $_GET['estado'];
        $cidade = $_GET['cidade'];

        $sql = "SELECT * FROM courtfinder.quadra WHERE estado = '$estado' AND cidade = '$cidade'";

        $result = $conexao->query($sql);
      } else {
        // Se o formulário não foi enviado, exibir todas as quadradas
        $sql = "SELECT * FROM courtfinder.quadra";
        $result = $conexao->query($sql);
      }

      // Verifica se há resultados
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $nome_espaco = $row['nome_espaco'];
          $descricao_espaco = $row['descricao_espaco'];
          $valor_espaco = $row['valor_espaco'];
          $avaliacao_espaco = $row['avaliacao_espaco'];
          $id_espaco = $row['id_espaco'];
          $nome = $row['img_nome'];
          $conteudo = $row['img_conteudo'];
          $imagemData = base64_encode($conteudo);

          // Criação do card HTML
          echo '<div class="col-md-4 mt-5">';
          echo '<div class="card rounded">';
          echo '<a href="descricao.php?id=' . $id_espaco . '">';
          echo '<img src="data:image/jpeg;base64,' . $imagemData . '" alt="' . $nome . '" class="img-fluid" alt="Product Image">';
          echo '</a>';
          echo '<div class="card-body text-light">';
          echo '<h5 class="card-title">' . $nome_espaco . '</h5>';
          echo '<p class="card-text">' . $descricao_espaco . '</p>';
          echo '<p class="card-text">';
          echo '<strong>Valor/Hora:</strong> R$ ' . $valor_espaco;
          echo '</p>';
          echo '<p class="card-text">';
          echo '<strong>Aprovação:</strong> ';

          for ($i = 1; $i <= $avaliacao_espaco; $i++) {
            echo '<span class="fa fa-star checked"></span>';
          }

          echo '</p>';
          echo '<form method="post" >';
          echo '<input type="hidden" name="espaco_id" value="' . $id_espaco . '">';
          echo '<button type="submit" class="btn btn-green"><a href="descricao.php?id=' . $id_espaco . '">Reservar Espaço</a></button>';
          echo '<input type="hidden" name="espaco_id" value="' . $id_espaco . '">';
          echo '<button type="submit" class="btn ms-4 btn-green">Avaliar Espaço</button>';
          echo '</form>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
      }

      // Fecha a conexão com o banco de dados
      $conexao->close();
      ?>
    </div>
  </div>
  </div>
  <br>
  <br>
  <br>
</body>

</html>