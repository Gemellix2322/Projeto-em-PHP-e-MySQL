<?php
    $id_funcionario = $_POST['idfunc'];
    $num_projeto = $_POST['num_proj'];

    include_once '../Conexão.php';

    $sql = "insert into beneficio (emp_code,plan_code) values ('$id_funcionario','$num_projeto')";

    if (mysqli_query($conn, $sql)){
        header("Location: ../consulta/beneficio_consulta.php");
    } else{
        echo "Erro salvando arquivo: " . mysqli_error($conn);
        header("Location: beneficios_incluir.php");
    }

    mysqli_close($conn);
?>