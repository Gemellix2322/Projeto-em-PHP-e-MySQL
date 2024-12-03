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
            <a href="#" class="item">
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
            <a href="usuarios_consulta.php" class="item">
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
            <h1>
            <B><U>Tabela de Clientes</U></B>
            </h1>
            <p>
            <?php
              include_once "../Conexão.php";

              $pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
              $qnt_result_pg = 8; // 8 clientes por página

              // Se a página não for especificada, assume a primeira página
              $pagina = $pagina ? $pagina : 1;

              //calcular o inicio da visualização
              $inicio = ($pagina - 1) * $qnt_result_pg;

              $sql = "SELECT c.idclientes, c.nome, c.email FROM clientes c LIMIT $inicio, $qnt_result_pg";
              $result = mysqli_query($conn, $sql);

              // Contar o total de clientes
              $sql_total = "SELECT COUNT(*) AS total FROM clientes";
              $result_total = mysqli_query($conn, $sql_total);
              $row_total = mysqli_fetch_assoc($result_total);
              $total_clientes = $row_total['total'];

              // Calcular o número de páginas
              $quantidade_pg = ceil($total_clientes / $qnt_result_pg);

              ?>
              <button><a style="color:white; text-decoration: none;" href="..\incluir\clientes_inlcuir.php">Incluir</a></button>
              <button><a style="color:white; text-decoration: none;" id="pdfDownload">Relatório</a></button>
              <table border="0">
                  <thead>
                      <tr>
                          <th align="right">Nº</th>
                          <th align="left">Nome</th>
                          <th align="left">Email</th>
                          <th align="left">Ações</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador = 1;
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) { ?>
                        <tr data-id="<?php echo $row[0]; ?>">
                            <td><?php echo $contador; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><a href="../excluir/del_clientes.php?c=<?php echo $row[0]; ?>"><button input="button">Excluir</button></a>
                            <a href="visul_cli.php?c=<?php echo $row[0]; ?>"><button type="button">Visualizar</button></a></td>
                            
                        </tr>
                    <?php
                    $contador++;
                    } ?>
                </tbody>
              </table>
              <br>
              <br>
              <?php
                // Exibir a paginação
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
      <script>
    const rows = document.querySelectorAll('tbody tr');

rows.forEach(row => {
    row.addEventListener('dblclick', () => {
        const id = row.getAttribute('data-id'); // Pega o valor do atributo data-id
        if (id) {
            window.location.href = '../alterar/clientes_alterar.php?id=' + id;
        }
    });
    row.style.cursor = 'pointer';
});

</script>
<script>
document.getElementById("pdfDownload").addEventListener("click", function(event) {
    event.preventDefault(); 

    
    fetch('../pdf/generate_pdf_clientes.php', {
        method: 'POST',
    })
    .then(response => response.blob()) 
    .then(blob => {
        
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'Clientes.pdf'; 
        document.body.appendChild(a);
        a.click(); //
        window.URL.revokeObjectURL(url); 
    })
    .catch(err => console.error('Erro ao baixar o PDF:', err));
});
</script>
</body>
</html>
