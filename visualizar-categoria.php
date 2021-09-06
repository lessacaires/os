<?php
session_start();
$id = filter_input(INPUT_POST, 'cat_id', FILTER_SANITIZE_STRING);
	if(isset($id)){
		include_once('config/config.php');

		$resultado = '';

		$sql_cat = "SELECT * FROM categorias WHERE id = '".$id."'";
		$retorna = mysqli_query($mysqli, $sql_cat);
		$row_cat = mysqli_fetch_assoc($retorna);

		$resultado .= '<dl class="row">';
			$resultado .= '<dt class="col-sm-3">Nome:</dt>';
			$resultado .= '<dd class="col-sm-9">'.$row_cat['nome'].'</dd>';
		$resultado .= '</dl>';

		echo $resultado;
		
	}
 ?>