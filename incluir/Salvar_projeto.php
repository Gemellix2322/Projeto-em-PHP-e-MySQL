<?php

    include_once '../Conexão.php';

    $descricao_projeto = $_POST['projeto_name'];

    $sql = "INSERT INTO projeto (plan_description) VALUES ('$descricao_projeto')";

    if (mysqli_query($conn, $sql)){
        header("Location: ../consulta/projeto_consulta.php");
    } else{
        echo "Erro salvando arquivo: " . mysqli_error($conn);
        header("Location: projeto_incluir.php");
    }

    mysqli_close($conn);
?>