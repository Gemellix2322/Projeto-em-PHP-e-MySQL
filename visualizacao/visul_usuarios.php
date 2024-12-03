<?php
if(isset($_POST["c"])){
	include_once "conexao.php";
	
	$resultado = '';
	
	$query_user = "SELECT * FROM usuarios WHERE idusuarios = '" . $_POST["c"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conn, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-sm-3">ID</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['idusuario'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Nome</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['nome'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">E-mail</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['senha'].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;
}