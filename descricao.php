<!DOCTYPE html>
<html lang="en">

<head>
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
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
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
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
          <button class="btn form-control border-success text-light me-5" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </nav>


  <div class="container">
    <br>
    <div class="form-container col-md-12">
      <form>
        <div class="d-flex col-10 mb-3">
          <strong>
            <p class="top-form mt-1 ms-5 m-0">ENCONTRE QUADRAS ESPORTIVAS <br> PERTO DE VOCÊ!</p>
          </strong>
          <div class="row justify-content-end">
            <div class="col-md-6">
              <select class="form-select mt-3 " aria-label="Estado">
                <option selected>Selecione o Estado</option>
                <!-- Adicione aqui as opções de estado -->
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select mt-3 " aria-label="Cidade">
                <option selected>Selecione a Cidade</option>
                <!-- Adicione aqui as opções de cidade -->
              </select>
            </div>
          </div>
        </div>
      </form>
    </div>

  <div class="container my-5 text-light">

    <h1>Detalhes da Quadra</h1>

    <div class="row">

    <div class="col-md-6">
  <div class="container card">
          <img src="img/project-1.jpg" style="width: 37rem; height: 40rem;" class="rounded">
  </div>
</div>
      <div class="col-md-6">
        <h2 class="card-title">Nome da Quadra</h2>
        
        <p class="card-text">
          Descrição do produto...
        </p>

        <h4>Especificações:</h4>
        <ul>
          <li>Especificação 1</li>
          <li>Especificação 2</li>
          <li>Especificação 3</li>
        </ul>

        <h4>Informações adicionais:</h4>
        <p>Mais informações...</p>
        
        <button class="btn btn-green" onclick="window.open('#','_blank');">Reservar</button>

      </div>

    </div>

  </div>

  </div>
  </div>
  <br>
  <br>
  <br>
</body>
</html>

<!--  -->