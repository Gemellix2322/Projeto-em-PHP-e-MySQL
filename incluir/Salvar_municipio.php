<?php
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    include_once '../Conexão.php';

    $sql = "insert into municipios (cidade,uf) values ('$cidade','$uf')";

    if (mysqli_query($conn, $sql)){
        header("Location: ../consulta/municipio_consulta.php");
    } else{
        echo "Erro salvando arquivo: " . mysqli_error($conn);
        header("Location: municipio_inclui.php");
    }

    mysqli_close($conn);
?>