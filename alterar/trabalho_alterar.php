<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<head>
    <title>Alterar Trabalho</title>
</head>
<body>
    <div class="main">
        <h1 style="color: black;">Alteração de Trabalho</h1>
        <center>
            <?php
            include_once "../Conexão.php";
            
            $job_code = $_GET['id'];
            
            // Busca os dados do trabalho
            $sql = "SELECT job_description FROM trabalho WHERE job_code = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $job_code);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $trabalho = mysqli_fetch_assoc($result);
            ?>
            
            <form action="Alterar_trabalho.php" method="POST" >
                <input type="hidden" name="job_code" value="<?php echo $job_code; ?>">
                Nome do Trabalho<br>
                <input type="text" name="descricao_trabalho" value="<?php echo $trabalho['job_description']; ?>" placeholder="Informe o trabalho">
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