<?php
include_once '../Conexão.php';

$emp_code = $_POST['emp_code'];
$nome = $_POST['nome'];
$job_code = $_POST['num_job'];

$sql = "UPDATE funcionario SET emp_name = ?, job_code = ? WHERE emp_code = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sii", $nome, $job_code, $emp_code);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../consulta/funcionarios_consulta.php");
} else {
    echo "Erro atualizando funcionário: " . mysqli_error($conn);
    header("Location: funcionario_alterar.php?id=" . $emp_code);
}

mysqli_close($conn);
?>