<?php
    include_once '../Conexão.php';

    $nome = $_POST['nome'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $idcidade = $_POST['idcidade'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO clientes (nome, logradouro, complemento, bairro, cep, idcidade, email, idade) 
            VALUES ('$nome', '$logradouro', '$complemento', '$bairro', '$cep', '$idcidade', '$email', '$idade')";

    if (mysqli_query($conn, $sql)){
        header("Location: ../consulta/clientes_consulta.php");
    } else{
        echo "Erro salvando arquivo: " . mysqli_error($conn);
        header("Location: clientes_incluir.php");
    }

    mysqli_close($conn);
?>