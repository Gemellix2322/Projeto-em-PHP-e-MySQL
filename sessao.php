<?php
	// conex�o
	include_once "Conexão.php";

	$conn = mysqli_connect($localhost, $user, $password, $banco);

	if (!$conn) {
		echo  "<script>alert('Nao foi possivel conectar ao banco de dados!');</script>";
		header('Location: logout.php');
	}			

	// abre sess�o
	session_start();
	if ((!isset($_SESSION["usuario"])) || (!isset($_SESSION["senha"]))) {
		header("Location: index.html");
	}
?>