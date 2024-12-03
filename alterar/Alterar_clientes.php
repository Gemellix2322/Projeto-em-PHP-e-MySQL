<?php
include_once '../Conexão.php';

// Captura os dados enviados pelo formulário
$idclientes = $_POST['idclientes'];
$nome = $_POST['nome'];
$logradouro = $_POST['logradouro'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$idcidade = $_POST['idcidade'];
$email = $_POST['email'];
$idade = $_POST['idade'];

// Exibe os dados recebidos para depuração
var_dump($_POST);

// Prepara a consulta para atualização
$sql = "UPDATE clientes 
        SET nome = ?, 
            logradouro = ?, 
            complemento = ?, 
            bairro = ?, 
            cep = ?, 
            idcidade = ?, 
            email = ?, 
            idade = ? 
        WHERE idclientes = ?";

// Prepara o statement
$stmt = mysqli_prepare($conn, $sql);

// Verifica se a preparação foi bem-sucedida
if ($stmt === false) {
    echo "Erro ao preparar a consulta: " . mysqli_error($conn);
    exit;
}

// Vincula os parâmetros
mysqli_stmt_bind_param($stmt, "sssssisii", 
    $nome, 
    $logradouro, 
    $complemento, 
    $bairro, 
    $cep, 
    $idcidade, 
    $email, 
    $idade, 
    $idclientes
);

// Executa o statement
if (mysqli_stmt_execute($stmt)) {
    header("Location: ../consulta/clientes_consulta.php");
} else {
    echo "Erro ao executar a consulta SQL: " . mysqli_error($conn);
}

// Fecha o statement
mysqli_stmt_close($stmt);

// Fecha a conexão
mysqli_close($conn);

?>
