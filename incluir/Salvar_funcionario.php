<?php

    include_once '../Conexão.php';

    $Nome = $_POST['nome'];
    $Trabalho = $_POST['num_job'];

    $sql = "INSERT INTO funcionario (emp_name,job_code) VALUES ('$Nome','$Trabalho')";

    if (mysqli_query($conn, $sql)){
        header("Location: ../consulta/funcionarios_consulta.php");
    } else{
        echo "Erro salvando arquivo: " . mysqli_error($conn);
        header("Location: funcionario_incluir.php");
    }

    mysqli_close($conn);
?>