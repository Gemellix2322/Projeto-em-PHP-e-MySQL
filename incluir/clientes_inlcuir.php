<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<head>
    <title>Incluir Clientes</title>
</head>
<body>
    <center>
        <?php include_once "../Conexão.php"; ?>
        <form action="Salvar_cliente.php" method="POST">
            Nome<br>
            <input type="text" name="nome" placeholder="Informe o nome">

            <br>Logradouro<br>
            <input type="text" name="logradouro" placeholder="Informe o logradouro">

            <br>Complemento<br>
            <input type="text" name="complemento" placeholder="Informe o complemento">

            <br>Bairro<br>
            <input type="text" name="bairro" placeholder="Informe o bairro">

            <br>CEP<br>
            <input type="text" name="cep" placeholder="Informe o CEP">

            <br>Cidade<br>
            <select name="idcidade" class="spinner">
                <option value="" selected>Selecione...</option>
                <?php 
                $sql = "SELECT idcidade, cidade FROM municipios ORDER BY cidade";
                $resultado = mysqli_query($conn, $sql);
                while ($linha = mysqli_fetch_array($resultado, MYSQLI_NUM))
                { ?>
                    <option value="<?php echo $linha[0]; ?>"><?php echo $linha[1]; ?></option>
                <?php
                } ?>
            </select>

            <br>Email<br>
            <input type="text" name="email" placeholder="Informe o email">

            <br>Idade<br>
            <input type="text" name="idade" placeholder="Informe a idade">

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