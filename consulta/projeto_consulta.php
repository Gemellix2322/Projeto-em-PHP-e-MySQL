<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/095e7acecf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
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
            <a href="#" class="item">
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
            <B><U>Tabela de Projetos</U></B>
            </h1>
            <p>
            <?php
            include_once "../Conexão.php";

            $sql = "select * from projeto";
            $result = mysqli_query($conn, $sql);
            ?>

            <table border="0">
                <thead>
                    <tr>
                        <th align="right">C&oacute;digo</th>
                        <th align="left">Descrição</th>
                        <th align="left">Ações</th>
                        <button><a style="color:white; text-decoration: none;" href="..\incluir\projeto_incluir.php">Incluir</a></button>
                        <button><a style="color:white; text-decoration: none;" id="pdfDownload">Relatório</a></button>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) { ?>
                        <tr data-id="<?php echo $row[0]; ?>">
                            <td><?php echo $contador; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><a href="../excluir/del_projeto.php?c=<?php echo $row[0]; ?>"><button input="button">Excluir</button></a></td>
                        </tr>
                    <?php
                    $contador++;
                    } ?>
                </tbody>
              </table>

            <?php
            mysqli_close($conn);
            ?>
            <br>
        </center>
      </div>
      <script>
  const rows = document.querySelectorAll('tbody tr');

rows.forEach(row => {
    row.addEventListener('dblclick', () => {
        const id = row.getAttribute('data-id'); // Pega o valor do atributo data-id
        if (id) {
            window.location.href = '../alterar/projeto_alterar.php?id=' + id;
        }
    });
    row.style.cursor = 'pointer';
});

</script>
<script>
document.getElementById("pdfDownload").addEventListener("click", function(event) {
    event.preventDefault(); 

    
    fetch('../pdf/generate_pdf_projeto.php', {
        method: 'POST',
    })
    .then(response => response.blob()) 
    .then(blob => {
        
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'projetos.pdf'; 
        document.body.appendChild(a);
        a.click(); //
        window.URL.revokeObjectURL(url); 
    })
    .catch(err => console.error('Erro ao baixar o PDF:', err));
});
</script>
</body>
</html>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
  text-decoration: none;
}

body {
  font-family: Arial, sans-serif;
  background-color: #161616;
  color: #ffff;
  margin: 0;
  padding: 0;
  height: 100vh;
}

.sidebar {
  position: fixed;
  height: 100vh;
  width: 15rem;
  background-color: black;
  display: flex;
  flex-direction: column;
}

.sidebar_items {
  list-style: none;
  padding: 1rem 0;
}

.sidebar_items .item {
  padding: 1rem;
  display: flex;
  align-items: center;
  text-decoration: none;
  border: solid 1px #1f2937;
  border-left: none; 
  border-right: none;
}

.sidebar_items .item:hover {
  background: #6b7280;
  transition: background-color .5s;
}

.item .link {
  width: 100%;
  text-decoration: none;
  color: white;
  display: flex;
  align-items: center;
  padding: 0 1rem;
}

.item a{
    z-index: 10;
}

.nombres {
  margin-left: 1rem;
  display: block;
}

.main {
  margin-left: 15rem;
  padding: 1rem;
  height: 100%;
}

.main h1{
    color: white;
}

table {
  width: auto;
  min-width: 75%;
  border-collapse: collapse;
  color: #ffff;
  box-shadow: 2rem 2rem 2rem rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  overflow: hidden;
}

th, td {
  padding: 7px 10px;
  text-align: left;
  border-bottom: 1px solid #666;
  border: solid 2px #4b5563;
}

th {
  background-color: #1f2937;
}

tr:nth-child(even) {
  background-color: #1f2937;
  transition: background-color .5s;
}

tr:nth-child(odd) {
  background-color: #111827;
  transition: background-color .5s;
}

table tbody tr:hover {
  background-color: #6b7280;
}

button, a button {
  background-color: #007BFF;
  color: white;
  border: none;
  padding: 7px 12px;
  font-size: 14px;
  cursor: pointer;
  border-radius: 4px;
  text-decoration: none;
  text-align: center;
  display: inline-block;
  margin: 4px 2px;
}

button:hover, a button:hover {
  background-color: #0056b3;
  transition: background-color .5s;
}

.Logoutbutton {
  border: 1px solid white;
  background: transparent;
  color: white;
  display: block;
  margin: 1rem auto;
  padding: .25rem;
  transition: 250ms ease-in;
}

.Logoutbutton a {
  text-decoration: none;
  color: white;
}

.Logoutbutton:hover {
  background-color: white;
  color: black;
}

.Logoutbutton a:hover {
  color: black;
}

@media only screen and (max-width: 600px) {
  .sidebar {
    width: 100%;
    height: 50px;
    bottom: 0;
    flex-direction: row;
  }

  .sidebar_items {
    flex-direction: row;
  }

  .sidebar_items .item {
    flex: 1;
    justify-content: center;
  }

  .main {
    margin-left: 0;
    margin-top: 50px;
  }
}

h1 {
  font-size: 2em;
  color: #f0f0f0;
  margin-bottom: 20px;
}

a {
  color: #007BFF;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

.container {
  width: 100%;
  max-width: 1200px;
  margin: auto;
  padding: 20px;
  background-color: #2c2c2c;
}
</style>
