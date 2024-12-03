<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/095e7acecf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Estilo do overlay */
        #modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        /* Estilo do modal */
        #visulUsuarioModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 1001;
            width: 300px;
            max-width: 80%;
            color: black;
            text-align: center;
        }

        /* Botão de fechar */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 18px;
            text-decoration: none;
            color: #333;
        }

        .view_data a{
          color: white;
        }

        /* Mostrar o modal e o overlay quando o link é clicado */
        #visulUsuarioModal:target, #modalOverlay:target {
            display: block;
        }
    </style>
    <title>Menu</title>
</head>
<body>
    <div class="sidebar">
        <ul class="sidebar_items">
          <a href="#" class="item" style="border: none;">
              <li class="link">
                <i class="fas fa-bars"></i>
              </li>
            </a>
            <a href="..\menu.php" class="item">
              <li class="link">
                <i class="fas fa-house"></i>
                <span class="nombres">Início</span>
              </li>
            </a>
            <a href="clientes_consulta.php" class="item">
              <li class="link">
                <i class="fas fa-person"></i>
                <span class="nombres">Clientes</span>
              </li>
            </a>
            <a href="funcionarios_consulta.php" class="item">
              <li class="link">
                <i class="fas fa-gear"></i>
                <span class="nombres">Funcionários</span>
              </li>
            </a>
            <a href="municipio_consulta.php" class="item">
              <li class="link">
                <i class="fas fa-building"></i>
                <span class="nombres">Municípios</span>
              </li>
            </a>
            <a href="beneficio_consulta.php" class="item">
              <li class="link">
                <i class="fas fa-plus"></i>
                <span class="nombres">Benefícios</span>
              </li>
            </a>
            <a href="projeto_consulta.php" class="item">
              <li class="link">
                <i class="fas fa-pencil"></i>
                <span class="nombres">Projetos</span>
              </li>
            </a>
            <a href="trabalho_consulta.php" class="item">
              <li class="link">
                <i class="fas fa-book"></i>
                <span class="nombres">Trabalhos</span>
              </li>
            </a>
            <a href="#" class="item">
              <li class="link">
                <i class="fas fa-user"></i>
                <span class="nombres">Usuários</span>
              </li>
            </a>
          <center>
            <button class="Logoutbutton" style="margin-top: 150px;"><a href="../logout.php">Logout</a></button>
          </center>
        </ul>
      </div>
      <div class="main" style="background-image: url('../chill.jpg'); background-size: cover">
        <center>
            <h1><b><u>Tabela de Usuários</u></b></h1>
            <p>
            <?php
              include_once "../Conexão.php";

              $pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
              $qnt_result_pg = 8;
              $pagina = $pagina ? $pagina : 1;
              $inicio = ($pagina - 1) * $qnt_result_pg;

              $sql = "SELECT * FROM usuarios c LIMIT $inicio, $qnt_result_pg";
              $result = mysqli_query($conn, $sql);
              $sql_total = "SELECT COUNT(*) AS total FROM usuarios";
              $result_total = mysqli_query($conn, $sql_total);
              $row_total = mysqli_fetch_assoc($result_total);
              $total_clientes = $row_total['total'];
              $quantidade_pg = ceil($total_clientes / $qnt_result_pg);
            ?>
            <table border="0">
                <thead>
                    <tr>
                        <th align="right">C&oacute;digo</th>
                        <th align="left">Nome</th>
                        <th align="left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) { ?>
                    <tr ondblclick="document.location = 'usuarios_altera.php?codigo=<?php echo $row[0]; ?>';">
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td>
                            <a href="../excluir/del_usuario.php?c=<?php echo $row[0]; ?>">
                                <button type="button">Excluir</button>
                            </a>
                            <button type="button" class="view_data" id="<?php echo $row[0]; ?>"><a href="#visulUsuarioModal" class="view_data">Visualizar</a></button>
                        </td>
                    </tr>
                    <?php $contador++; } ?>
                </tbody>
            </table>
            <br>
            <br>
            <?php
              echo '<nav aria-label="Navegação de página">';
              echo '<ul class="pagination">';
              for ($pag = 1; $pag <= $quantidade_pg; $pag++) {
                  echo "<li class='page-item'>";
                  echo '<div class="box-pagination">';
                  if ($pag == $pagina) {
                      echo "<a class='page-link active' href='?pagina=$pag'><strong>$pag</strong></a>";
                  } else {
                      echo "<a class='page-link' href='?pagina=$pag'>$pag</a>";
                  }
                  echo '</div>';
                  echo '</li>';
              }
              echo '</ul>';
              echo '</nav>';
              mysqli_close($conn);
            ?>
        </center>
    </div>
    <div id="visulUsuarioModal">
        <center>
          <a href="#" class="close-btn">&times;</a> <!-- Botão para fechar o modal -->
          <p>Usuário: <?php echo $row[1]?></p>
          <p>Senha: <?php echo $row[2]?></p>
        </center>
    </div>
</body>
</html>