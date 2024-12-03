<?php

include_once '../Conexão.php';

$projeto = mysqli_real_escape_string($conn, $_GET['c']);

$sql = "DELETE FROM usuarios WHERE idusuarios='$projeto'";
if (mysqli_query($conn, $sql)) {
    header("Location: ../consulta/usuarios_consulta.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
