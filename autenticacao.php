<?php
	// conex�o
	session_start();

	include_once "Conexão.php";

	$conn = mysqli_connect($localhost, $user, $password, $banco);

	if (!$conn) {
		echo  "<script>alert('Nao foi possivel conectar ao Banco de Dados. Usuario ou Senha invalidos!');</script>";
		header('Location: login.html');
	}

	$user = $_POST['usuario'];
	$password = $_POST['senha'];
	
	$sql = "SELECT idusuarios FROM usuarios ".
			"WHERE (nome='$user') AND (senha='$password')";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($result);
	
	if ($row > 0) {
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
			$idusuario = $row[0];
		}

		// cria sess�o
		$_SESSION['usuario'] = $user;
		$_SESSION['senha'] = $password;

		header('Location: menu.php');
	}
	else {
		echo  "<script>alert('Usuario ou Senha invalidos!');</script>";
		
		// volta para a tela de login
		header('Location: login.html');
	}
?>