<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<head>
    <title>Incluir Funcionários</title>
</head>
<body>
    <center>
        <?php
          include_once "../Conexão.php";
          ?>
        <form action="Salvar_funcionario.php" method="POST" >
            Nome do Funcion&aacute;rio<br>
            <input type="text" name="nome" value="" placeholder="Informe o nome da cidade">
            <br>Trabalho<br>
            <select name="num_job" class="spinner">
                <option value="" selected>Selecione...</option>
                <?php 
                // conexão
                $sql1 = "SELECT job_code, job_description FROM trabalho ORDER BY job_description";
                $resultado1 = mysqli_query($conn, $sql1);
                while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM))
                { ?>
                    <option value="<?php echo $linha1[0]; ?>"><?php echo $linha1[1]; ?></option>
                <?php
                } ?>
              </select>  
            <p>
            <input type="submit" value="Salvar">
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

    .spinner{
      color: black;
      padding: 5px;
      margin: 10px 0;
      border: none;
      border-radius: 3px;
    }

    select.spinner {
    color: black;
    padding: 5px;
    margin: 10px 0;
    border: none;
    border-radius: 3px;
    background-color: #fff;
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