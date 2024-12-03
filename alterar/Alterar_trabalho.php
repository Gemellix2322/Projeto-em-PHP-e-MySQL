<?php
include_once '../Conexão.php';

$plan_code = $_POST['job_code'];
$descricao_projeto = $_POST['descricao_trabalho'];

$sql = "UPDATE trabalho SET job_description = ? WHERE job_code = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $descricao_projeto, $plan_code);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../consulta/trabalho_consulta.php");
} else {
    echo "Erro atualizando projeto: " . mysqli_error($conn);
    header("Location: trabalho_alterar.php?id=" . $plan_code);
}

mysqli_close($conn);
?>