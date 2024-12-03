<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<head>
    <title>Alterar município</title>
</head>
<body>
    <center>
        <?php
        include_once "../Conexão.php";
        
        $id_municipio = $_GET['id'];
        
        // Busca os dados do município
        $sql = "SELECT cidade, uf FROM municipios WHERE id_municipio = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_municipio);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $municipio = mysqli_fetch_assoc($result);
        ?>
        
        <form action="Alterar_municipio.php" method="POST" >
            <input type="hidden" name="id_municipio" value="<?php echo $id_municipio; ?>">
            Nome do Munic&iacute;pio<br>
            <input type="text" name="cidade" value="<?php echo $municipio['cidade']; ?>" placeholder="Informe o nome da cidade">
            <br>UF<br>
            <input type="text" name="uf" value="<?php echo $municipio['uf']; ?>" required>  
            <p>
            <input type="submit" value="Alterar">
        </form>
    </center>
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