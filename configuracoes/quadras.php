<?php
        include_once('./config.php');

        // Consulta para obter os dados
        $sql = "SELECT * FROM courtfinder.quadra";
        $result = $conexao->query($sql);

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
            echo '<img src="data:image/jpeg;base64,' . $imagemData . '" alt="' . $nome . '" class="img-fluid" alt="Product Image">';
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
            echo '<button type="submit" class="btn btn-green">Reservar Espaço</button>';
            echo '<input type="hidden" name="espaco_id" value="' . $id_espaco . '">';
            echo '<button type="submit" class="btn ms-4 btn-green">Avaliar Espaço</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "Nenhum resultado encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
?>