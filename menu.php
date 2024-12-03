<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/095e7acecf.js" crossorigin="anonymous"></script>
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
          <a href="#" class="item">
            <li class="link">
              <i class="fas fa-house"></i>
              <span class="nombres">Início</span>
            </li>
          </a>
          <a href=".\consulta\clientes_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-person"></i>
              <span class="nombres">Clientes</span>
            </li>
          </a>
          <a href=".\consulta\funcionarios_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-gear"></i>
              <span class="nombres">Funcionários</span>
            </li>
          </a>
          <a href=".\consulta\municipio_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-building"></i>
              <span class="nombres">Municípios</span>
            </li>
          </a>
          <a href=".\consulta\beneficio_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-plus"></i>
              <span class="nombres">Benefícios</span>
            </li>
          </a>
          <a href=".\consulta\projeto_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-pencil"></i>
              <span class="nombres">Projetos</span>
            </li>
          </a>
          <a href=".\consulta\trabalho_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-book"></i>
              <span class="nombres">Trabalhos</span>
            </li>
          </a>
          <a href=".\consulta\usuarios_consulta.php" class="item">
            <li class="link">
              <i class="fas fa-user"></i>
              <span class="nombres">Usuários</span>
            </li>
          </a>
          <center>
            <button class="Logoutbutton" style="margin-top: 150px;"><a href="logout.php">Logout</a></button>
          </center>
        </ul>
      </div>
      <div class="main" style="background-image: url('chill.jpg'); background-size: cover">
        <center>
          <h1 class="titulo">Bem Vindo <?php echo $_SESSION['usuario']?></h1>
        </center>
      </div>
</body>
</html>

<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
}

body {
  font-family: Arial, sans-serif;
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
    background: grey;
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

  .nombres {
    margin-left: 1rem;
    display: block;
  }

  
.main {
  margin-left: 15rem; /* Espaço para a barra lateral fixa */
  padding: 1rem;
  height: 703.2px !important;
}

.main .titulo{
  color: white;
}

button {
  background-color: #007BFF;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 14px;
  cursor: pointer;
  border-radius: 4px;
  text-decoration: none;
}



.Logoutbutton{
  border: 1px solid white;
  background: transparent;
  color: white;
  display: block;
  margin: 1rem auto;
  min-width: 1px;
  padding: .25rem;
  transition: 250ms  ease-in;
}

.Logoutbutton a{
  text-decoration: none;
  color: white;
}

.Logoutbutton:hover{
  background-color: white;
  color: black;
  transition: 250ms  ease-in;
}

.Logoutbutton a:hover{
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

  
</style>