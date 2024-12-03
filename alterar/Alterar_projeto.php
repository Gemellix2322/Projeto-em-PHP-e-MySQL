<?php
include_once '../Conexão.php';

$plan_code = $_POST['plan_code'];
$descricao_projeto = $_POST['projeto_name'];

$sql = "UPDATE projeto SET plan_description = ? WHERE plan_code = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $descricao_projeto, $plan_code);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../consulta/projeto_consulta.php");
} else {
    echo "Erro atualizando projeto: " . mysqli_error($conn);
    header("Location: projeto_alterar.php?id=" . $plan_code);
}

mysqli_close($conn);
?>