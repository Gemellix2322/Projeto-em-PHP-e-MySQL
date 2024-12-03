<?php
include_once "sessao.php";
include_once "../Conexão.php";

// Pega o ID do projeto da URL
$id_projeto = $_GET['id'];

// Busca os dados do projeto
$sql = "SELECT plan_code, plan_description FROM projeto WHERE plan_code = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_projeto);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$projeto = mysqli_fetch_assoc($result);

if (!$projeto) {
    header("Location: ../consulta/projeto_consulta.php");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <title>Alterar Projeto</title>
</head>
<body>
    <div class="main">
        <h1 style="color: black;">Alteração de Projeto</h1>
        <center>
            <form action="Alterar_projeto.php" method="POST">
                <input type="hidden" name="plan_code" value="<?php echo $projeto['plan_code']; ?>">
                Nome do Projeto<br>
                <input type="text" name="projeto_name" value="<?php echo $projeto['plan_description']; ?>" placeholder="Informe o projeto">
                <br>
                <input type="submit" value="Alterar">
            </form>
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
      background-image: url('../chill.jpg'); 
      background-size: cover;
      color: #ffff;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      background-color: #181818;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    input[type="text"], input[type="submit"] {
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 4px;
    }

    input[type="text"] {
      width: 100%;
    }

    input[type="submit"] {
      background-color: #007BFF;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
</style>