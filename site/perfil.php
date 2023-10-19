<?php
session_start();

// Conexão com o banco de dados
include_once('../configuracoes/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    exit;
}

// Consulta os dados do usuário
$sql = "SELECT login, email, regiao, celular, dataNascimento, password , nivel FROM cadastro_usuario WHERE id = {$_SESSION['usuario_id']}";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $login = $row['login'];
    $email = $row['email'];
    $regiao = $row['regiao'];
    $celular = $row['celular'];
    $dataNascimento = $row['dataNascimento'];
    $password = $row['password'];
    $nivelCliente = $row['nivel'];
} else {
    echo "Nenhum resultado encontrado.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $celular = $_POST['celular'];
    $regiao = $_POST['regiao'];
    $dtNasci = $_POST['dtNasci'];

    $sql = "UPDATE cadastro_usuario SET dataNascimento='$dtNasci', celular='$celular', regiao='$regiao' WHERE id={$_SESSION['usuario_id']}";

    if ($conexao->query($sql) === TRUE) {
        echo "SUCESSO ";
        header("Location:../login.php");
        exit;
    } else {
        echo "Erro ao atualizar as informações do usuário: " . $conexao->error;
    }

    $conexao->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/perfil.css" />
    <script src="index.js"></script>
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

    #main-form {
        background-color: green;
        padding: 20px;
    }
</style>

<body>

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


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm  text-white p-3">
                <h1 class="navbar-brand fs-1 position-absolute top--1 start-1" href="#">Configuraçoes da conta </h1>
            </div>
            <div class="col-sm  text-white p-3"></div>
            <div class="col-sm  text-white p-3"></div>

            <div class="col-sm  text-white p-3">

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4 text-white p-3 form2">
            <div class="col-sm">

                <form class="container p-3 my-5 rounded-4 perfil">
                    <img class="img-fluid imagem" src="imagem.png" />
                    <h3>Nome*</h3>
                    <input type="text" class="form-control mt-3" name="login" value="<?php echo $login; ?>" disabled>
                    <h3>E-mail*</h3>
                    <input type="text" class="form-control mt-3" name="email" value="<?php echo $email; ?>" disabled>
                </form>
            </div>
        </div>

        <div class="col-sm-1"></div>

        <form method="POST" action="" class="col-sm-5  text-white p-3 form">
            <div class="container mt ">
                <label for="login">Celular<br></label>
                <input type="text" class="form-control mt-3" name="celular" value="<?php echo $celular; ?>"><br><br>

                <label for="email">Estado<br></label>
                <input type="text" class="form-control mt-3" name="regiao" value="<?php echo $regiao; ?>"><br><br>

                <label for="dtNasci">Data de Nascimento:<br></label>
                <input type="text" class="form-control mt-3" name="dtNasci" value="<?php echo $dataNascimento; ?>"><br><br>
                <input type="submit" class="btn button" value="Atualizar">
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <main style="height: 100%" class="d-flex gap-5 p-5 mt-5">
        <div id="cont2" class="d-flex flex-column align-items-center" style="height: 25vw; width: 35vw; margin-top: 1rem">
            <div id="nivel" style="
            background-color: #14943a;
            color: #fff;
            font-weight: 800;
            height: 5%;
            position: absolute;
            z-index: 5;
            margin-top: -3rem;
            width: 7%;
          " class="rounded-5 border border-light border-3 d-flex justify-content-center align-items-center">
                <?php echo $nivelCliente; ?>
            </div>
            <div id="conquistas" style="
            background-color: #14943a;
            color: #fff;
            font-weight: 800;
            height: 10%;
            position: absolute;
            z-index: 4;
            width: 20%;
            margin-top: -2rem;
          " class="rounded-5 border border-light border-3 d-flex justify-content-center align-items-center" style="color: #fff !important">
                Nivel Atual
            </div>
            <div style="
            background-color: #14943a;
            position: relative;
            z-index: -5;
            display: flex;
            justify-content: start;
            align-items: start;
            flex-direction: column;
            padding: 1rem;
          " class="rounded-5 h-100 w-100 border border-light border-3">
                <div style="
              background-color: #201b2c;
              color: #fff;
              position: relative;
              z-index: 15;
              display: flex;
              justify-content: start;
              align-items: start;
              flex-direction: column;
              padding: 1rem;
              margin-top: 4rem;
            " class="conquista-um rounded-3 w-100 border border-light border-2">
                    Nenhuma Quadra Alugada!
                </div>
            </div>
        </div>
        <div id="cont3" class="d-flex flex-column  h-100" style="width: 20vw">
            <div id="xp-1" style="background-color: #dbd9dc; height: 3rem; position: absolute; font-weight: 800; display: flex; justify-content: end; align-items: center; color: #1B3C02;" class="rounded-5 w-25 border border-light border-3"><span style="margin-right: 10px;"><?php echo $nivelCliente + 1 ?></span></div>
            <div id="xp" style="background-color: #14943a; width: 9%; height: 3rem; position: relative; font-weight: 800; display: flex; align-items: center; justify-content: start; color: #1B3C02;" class="rounded-5 border border-light border-3"><span style="margin-left: 10px;"><?php echo $nivelCliente; ?></span></div>
            <p style="font-weight: 500; color: #fff; margin-top: 7px; margin-left: 7px;">
                Faltam apenas <span style="color: #63de53;">100 de xp</span> para você
                alcançar o nível <?php echo $nivelCliente + 1; ?>!
            </p>
        </div>
    </main>
</body>

</html>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
  crossorigin="anonymous"
></script>
<style>
  @media (max-width: 768px) {
    main {
      display: flex;
      flex-direction: column;
    }
    #cont1 {
      width: 100% !important;
      gap: 1px !important;
    }
    #cont2 {
      width: 100% !important;
      height: 100% !important;
    }
    #cont3 {
      width: 100% !important;
    }

    .conquista-um {
      margin-top: 10% !important;
    }

    #xp {
      height: 25% !important;
      width: 75% !important;
    }

    #xp-1 {
      height: 5.1% !important;
      width: 76% !important;
    }
    #conquistas {
      width: 30% !important;
      height: 5% !important;
      margin-top: -18px !important;
    }
    #nivel {
      margin-top: -40px !important;
      height: 30px !important;
    }
  }
  input::placeholder {
    padding-left: 10px !important;
  }
</style>

</body>

</html>