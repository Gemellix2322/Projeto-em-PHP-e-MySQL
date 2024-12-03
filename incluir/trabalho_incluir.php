<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<head>
    <title>Incluir Trabalho</title>
</head>
<body>
    <div class="main">
        <h1 style="color: black;">Inclusão de Trabalho</h1>
        <center>
            <form action="Salvar_trabalho.php" method="POST" >
                Nome do Trabalho<br>
                <input type="text" name="descricao_trabalho" value="" placeholder="Informe o trabalho">
                <br>
                <input type="submit" value="Salvar">
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