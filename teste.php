<?php

ini_set('default_charset', 'utf-8');


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuário</title>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>

</head>

<body>

    <nav>
        <a class="logo" href="/">CourtFinder</a>
        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-list">
            <li><a href="#">Home</a></li>
            <li><a href="#">Modalidades</a></li>
            <li><a href="#">Quem somos</a></li>
            <li><a href="#">Cadastre sua quadra</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </nav>

    </div>

    <div id="mainlog">

        <div class="leftlogin">
            <h1>Faça login<br>E entre para o nosso time!</h1>
            <img id="jack" src="boneco.svg" alt="Jack">
        </div>

        <div class="rightlogin">

            <div id="container">
                <div class="buttonsForm">
                    <div class="btnColor"></div>
                    <button id="btnSignin" onclick="diminuirDiv()">Login</button>
                    <button id="btnSignup" onclick="aumentarDiv()">Cadastro</button>
                </div>

                <form id="signin" method="POST" action="configLogin.php">
                    <input type="hidden" name="login" value="login-requerimento">
                    <p id="emaillabel">E-mail</P>
                    <input type="text" id="login" name="login" placeholder="Email" required />
                    <p id="senhalabel">Senha</P>
                    <input type="password" id="senha" name="password" placeholder="Senha" required />
                    <div class="divCheck">
                        <p id="esqueceu">Esqueceu a senha? Clique aqui!</P>
                    </div>
                    <button class="btn btn-default" id="entrar" type="submit">Entrar</button>
                </form>

                <form method="POST" action="configRegistro.php" class="row cadastro_valid" id="signup" onsubmit="
                    try{
                        const valorlogin = this.login.value;
                        const valoremail = this.email.value;
                        const valorestado = this.regiao.value;
                        const valorcelular = this.celular.value;
                        const valordatanascimento = this.dtnasc.value;
                        const valorSenha = this.senha.value;
                        const valorSenhaConfirmada = this.confirmarSenha.value;
                if(valorlogin == ''){
                  alert('O login nao pode estar vazio!');
                  return false;
                }else if(valoremail == ''){
                  alert('O email nao pode estar vazio!');
                  return false;
                }else if(valorestado == ''){
                  alert('Marque um estado!');
                  return false;
                }else if(!validacelular(this.celular.value)){
                  alert('Preencha corretamente o Celular!');
                  return false;
                }else if(!ValidaData(this.dtnasc.value)){
                  alert('Preencha corretamente o Data!');
                  return false;
                }else if(!validaSenha(this.senha.value)){
                    alert('Preencha corretamente a senha!');
                  return false;
                }else if(!validaSenhaConfirmada(valorSenhaConfirmada, valorSenha)){
                    alert('As senhas não são as mesmas!');
                  return false; 
                }
                    }catch(e){
                    alert('Erro: '+e.message);
                    }
                    ">
                    <input type="hidden" name="cadastrado" value="cadastrar-usuario">
                    <label for="login" class="labelregistro">Login</label>
                    <input type="text" id="login" name="login" placeholder="Login" />
                    <label for="email" class="labelregistro">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Email" />
                    <label for="dtnasc" class="labelregistro">Data de nascimento</label>
                    <input type="text" id="dtnasc" name="dtnasc" placeholder="dd/mm/aaaa" oninput="mascararData(this)" maxlength="10" class="form-control">
                    <label for="senha" class="labelregistro">Senha</label>
                    <input type="password" id="senha" name="password" placeholder="Senha" />
                    <label for="confirmarsenha" class="labelregistro">Confirmar senha</label>
                    <input type="password" id="confirmarSenha" placeholder="Confirmar senha" />
                    <p id="lembrete">Sua senha deve conter:<br>- Pelo menos uma letra de A-Z<br>- Pelo menos um numero
                        de 1-9</p>
                    <label for="celular" class="labelregistro">Número de telefone</label>
                    <input type="text" id="celular" data-js="celular" name="celular" maxlength="15"
                        placeholder="(99) 99999-9999" />
                    <label for="regiao" class="labelregistro">Região</label>
                    <select class="campos" id="regiao" name="regiaoGeral" class="form-control" placeholder="Estado">
                        <option value=""></option>
                        <option value="MG">Minas Gerais</option>
                        <option value="SP">São Paulo</option>
                    </select>
                    <div class="divCheck">
                    </div>
                    <button id="botaocada" class="btn btn-default" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        //--------------------Funções--------------------------//
        function validacelular(celular) {
            var DDD = celular.slice(1, 3);


            for (var t = 0; t < 15; t++) {
                if (t == 10) {
                    if (celular[t] != "-") {
                        console.log("Formato inválido, faltando hyphen!");
                        return false;
                    }
                } else if (
                    celular[t] != "0" &&
                    celular[t] != "(" &&
                    celular[t] != ")" &&
                    celular[t] != " " &&
                    !parseInt(celular[t])
                ) {
                    console.log("Não é número válido na posição")
                    return false;
                }
            }
            if (celular.length != 15) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Tamanho inválido!",
                    footer: '<a href="">OK</a>'
                })
                return false;
            } else if (celular.slice(0, 1) != "(") {
                console.log("Formato de DDD errado!");
                return false;
            } else if (celular.slice(3, 4) != ")") {
                console.log("Formato de DDD2 errado!");
                return false;
            } else if (celular.slice(4, 5) != " ") {
                console.log(
                    'Formato de celular errado! "sem espaço entre DDD e o número"'
                );
                return false;
            } else if (celular.slice(10, 11) != "-") {
                console.log('Formato de celular errado! "faltando um -"');
                return false;
            }
            if (DDD != "31" && DDD != "32" && DDD != "33" && DDD != "11") {
                console.log("DDD invalido!" + DDD);
                return false;
            } else {
                console.log("O celular é valido!");
                return true;
            }
        }

        function validaSenha(senha) {
            const regexLetras = /[a-zA-Z]/;
            const regexEspecial = /[^a-zA-Z0-9]/;
            const regexNumeros = /[0-9]/;

            if (senha.length < 8) {
                alert("A senha deve ter pelo menos 8 caracteres.");
                return false;
            }
            if (!regexLetras.test(senha)) {
                alert("A senha deve conter pelo menos um letra.");
                return false;
            }

            if (!regexEspecial.test(senha)) {
                alert("A senha deve conter pelo menos um caracter especial.");
                return false;
            }

            if (!regexNumeros.test(senha)) {
                alert("A senha deve conter pelo menos um número.");
                return false;
            }

            return true;
        }

        function validaSenhaConfirmada(confirmarSenha, senha) {
            const SenhaConfirmada = confirmarSenha;
            const SenhaPadrao = senha;

            if (SenhaPadrao !== SenhaConfirmada) {
                alert("As senhas não correspondem.");
                return false;
            }

            return true;
        }

        function ValidaData(data) {
            let valorDia = data.slice(0, 2);
            let valorMes = data.slice(3, 5);
            let valorAno = data.slice(6, 10);

            for (var i = 0; i < 10; i++) {
                if (i == 2 || i == 5) {
                    if (data[i] != "/") {
                        console.log("Formato inválido, faltando barra!");
                        return false;
                    }
                } else if (data[i] != "0" && !parseInt(data[i])) {
                    console.log("Não é número válido na posição " + i);
                    return false;
                }
            }

            if (valorAno < 1900) {
                console.log("Apenas anos acima de 1900!");
                return false;
            } else if (valorAno > 2023) {
                console.log("Apenas anos abaixo de 2022!");
                return false;
            } else if (valorMes > 12) {
                console.log("Apenas mês de 01 a 12!");
                return false;
            } else if (valorDia > 31) {
                console.log("Apenas dias de 01 a 31!");
                return false;
            } else if (valorDia <= 0 || valorMes <= 0 || valorAno <= 0) {
                console.log('Dias,Meses e Ano não podem ter o valor = "00"');
                return false;
            } else if (valorMes === "04" || valorMes === "06" || valorMes === "09" || valorMes === "11") && valorDia > 30) {
                console.log("Mês declarado contem apenas 30 dias !");
                return false;
            } else if (valorMes === "02" && valorDia > 29) {
                console.log("O mês 02 contem apenas 29 dias!");
                return false;
            } else {
                console.log("A data é valida!");
                return true;
            }


            function PegarIdade() {
                var dataAtual = new Date();
                var diaAtual = String(dataAtual.getDate()).padStart(2, "0");
                var mesAtual = String(dataAtual.getMonth() + 1).padStart(2, "0");
                var anoAtual = dataAtual.getFullYear();
                var resultadoDataAtual = `${diaAtual}/${mesAtual}/${anoAtual}`;

                console.log("A data atual é: " + resultadoDataAtual);
                if (mesAtual < valorMes) {
                    console.log("Não Passou");
                    var idade = anoAtual - parseInt(valorAno) - 1;
                } else if (mesAtual > valorMes) {
                    console.log("Passou");
                    var idade = anoAtual - parseInt(valorAno);
                } else if ((mesAtual = valorMes)) {
                    console.log("Passou verificar dia");
                    if (diaAtual < valorDia) {
                        var idade = anoAtual - parseInt(valorAno) - 1;
                        console.log(idade);
                    } else if (diaAtual >= valorDia) {
                        var idade = anoAtual - parseInt(valorAno);
                    }
                } else {
                    console.log("Passou");
                    return "";
                }
                return idade;
            }
        }



        //---------------------Mascaras------------------------


        function mascararData(vData) {
            // Remove qualquer caractere que não seja número
            let valor = vData.value.replace(/\D/g, '');

            // Adiciona a máscara da data (dd/mm/aaaa)
            if (valor.length > 2) {
                valor = valor.replace(/(\d{2})(\d)/, '$1/$2');
            }
            if (valor.length > 5) {
                valor = valor.replace(/(\d{2})(\d)/, '$1/$2');
            }
            vData.value = valor;
        }

        const mask = {
            celular(value) {
                return (
                    value
                        //Digitar apenas números
                        .replace(/\D/g, "")
                        //colocar os () do DDD
                        .replace(/(\d{2})(\d)/, "($1) $2")
                        //colocar o - do número
                        .replace(/(\d{5})(\d)/, "$1-$2")
                );
            }
        };

        const inputName = document.querySelector("#textinput");

        console.log(inputName);

        // pega todos os imputs e retorna uma nodelist, e cada item dela vai ser um dos imputs.
        document.querySelectorAll("input[type=text],textarea").forEach(($input) => {
            //field é para pegar cada fução de mascara que vai usar,
            //(dataset = Serve para pegar informações de propriedades data-qualquer coisa, mas no caso é data-js)
            const field = $input.dataset.js;

            // Para cada imput irá atribuir um evento, (no caso o envento é do tipo input, que ira acionar a cada vez que for digitado)
            $input.addEventListener(
                "input",
                (e) => {
                    //callback irá retribuir um novo valor a cada vez que for digitado ao valor do imput
                    e.target.value = mask[field](e.target.value);
                },
                false
            );
        });

    </script>


    <script src="mobile-navbar.js"></script>

</body>

</html>