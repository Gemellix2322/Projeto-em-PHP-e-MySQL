<?php
include_once "sessao.php";
?>
<!DOCTYPE html>
<head>
    <title>Alterar Benefícios</title>
</head>
<body>
  <div class="main">
      <center>
        <h1 style="color:black;">Alterar Benef&iacute;cio</h1>
          <?php
          include_once "../Conexão.php";
          
          $id_beneficio = $_GET['id'];
          
          // Busca os dados do benefício atual
          $sql = "SELECT emp_code, plan_code FROM beneficios WHERE id_beneficio = ?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "i", $id_beneficio);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $beneficio = mysqli_fetch_assoc($result);
          ?>

          <form action="Alterar_beneficio.php" method="post" autocomplete="off">
              <input type="hidden" name="id_beneficio" value="<?php echo $id_beneficio; ?>">
              
              Nome do Funcion&aacute;rio
              <select name="idfunc" class="spinner">
                  <?php 
                  $sql1 = "SELECT emp_code, emp_name FROM funcionario ORDER BY emp_name";
                  $resultado1 = mysqli_query($conn, $sql1);
                  while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM)) {
                      $selected = ($linha1[0] == $beneficio['emp_code']) ? 'selected' : '';
                  ?>
                      <option value="<?php echo $linha1[0]; ?>" <?php echo $selected; ?>><?php echo $linha1[1]; ?></option>
                  <?php
                  } ?>
              </select>
              <br>
              Nome do Projeto
              <select name="num_proj" class="spinner">
                  <?php 
                  $sql1 = "SELECT plan_code, plan_description FROM projeto ORDER BY plan_description";
                  $resultado1 = mysqli_query($conn, $sql1);
                  while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM)) {
                      $selected = ($linha1[0] == $beneficio['plan_code']) ? 'selected' : '';
                  ?>
                      <option value="<?php echo $linha1[0]; ?>" <?php echo $selected; ?>><?php echo $linha1[1]; ?></option>
                  <?php
                  } ?>
              </select>
              <p>
              <input type="submit" value="Alterar">
          </form>
          <?php
          mysqli_close($conn);
          ?>
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
      color: #fff;
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