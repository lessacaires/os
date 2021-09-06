<?php
session_start();
$id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
	if(isset($id)){
		include_once('config/config.php');

		$resultado = '';

		$sql_user = "SELECT * FROM usuarios WHERE id = '".$id."'";
		$retorna = mysqli_query($mysqli, $sql_user);
		$row_user = mysqli_fetch_assoc($retorna);

		$resultado .= '<dl class="row">';
			$resultado .= '<dt class="col-sm-3">Nome:</dt>';
			$resultado .= '<dd class="col-sm-9">'.$row_user['nome'].'</dd>';
		$resultado .= '</dl>';
		$resultado .= '<dl class="row">';
			$resultado .= '<dt class="col-sm-3">Login:</dt>';
			$resultado .= '<dd class="col-sm-9">'.$row_user['login'].'</dd>';
		$resultado .= '</dl>';
		$resultado .= '<dl class="row">';
			$resultado .= '<dt class="col-sm-3">Situação:</dt>';
			$resultado .= '<dd class="col-sm-9">'.$row_user['status'] == '0'? 'inativo' : 'ativo'.'</dd>';
		$resultado .= '</dl>';

		echo $resultado;
		
	}
 ?>