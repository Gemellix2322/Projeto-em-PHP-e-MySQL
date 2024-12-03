<?php
include_once '../Conexão.php';

$id_beneficio = $_POST['id_beneficio'];
$emp_code = $_POST['idfunc'];
$plan_code = $_POST['num_proj'];

$sql = "UPDATE beneficios SET emp_code = ?, plan_code = ? WHERE id_beneficio = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iii", $emp_code, $plan_code, $id_beneficio);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../consulta/beneficio_consulta.php");
} else {
    echo "Erro atualizando benefício: " . mysqli_error($conn);
    header("Location: beneficio_alterar.php?id=" . $id_beneficio);
}

mysqli_close($conn);
?>