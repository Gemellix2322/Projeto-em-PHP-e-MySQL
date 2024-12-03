<?php
include_once "sessao.php";
include_once "../Conexão.php";

// Pega o ID do projeto da URL
$id_cliente = $_GET['id'];

// Busca os dados do projeto
$sql = "SELECT idclientes, nome, logradouro, complemento, bairro, cep, idcidade, email, idade FROM clientes WHERE idclientes = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_cliente);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$projeto = mysqli_fetch_assoc($result);

if (!$projeto) {
    header("Location: ../consulta/clientes_consulta.php");
    exit();
}
?>
?>
<!DOCTYPE html>
<head>
    <title>Incluir Clientes</title>
</head>
<body>
    <center>
        <?php
          include_once "../Conexão.php";
        ?>
        <form action="Alterar_clientes.php" method="POST">
            Nome<br>
            <input type="text" name="nome" placeholder="Informe o nome">

            <br>Logradouro<br>
            <input type="text" name="logradouro" placeholder="Informe o logradouro">

            <br>Complemento<br>
            <input type="text" name="complemento" placeholder="Informe o complemento">

            <br>Bairro<br>
            <input type="text" name="bairro" placeholder="Informe o bairro">

            <br>CEP<br>
            <input type="number" name="cep" placeholder="Informe o CEP">

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
            <input type="number" name="idade" placeholder="Informe a idade">

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

    .spinner {
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
      width: 300px;
    }

    input[type="text"], 
    input[type="number"],
    input[type="email"],
    input[type="submit"] {
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 4px;
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