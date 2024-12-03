<?php

    include_once '../Conexão.php';

    $descricao_trabalho = $_POST['descricao_trabalho'];

    $sql = "INSERT INTO trabalho (job_description) VALUES ('$descricao_trabalho')";

    if (mysqli_query($conn, $sql)){
        header("Location: ../consulta/trabalho_consulta.php");
    } else{
        echo "Erro salvando arquivo: " . mysqli_error($conn);
        header("Location: trabalho_incluir.php");
    }

    mysqli_close($conn);
?>