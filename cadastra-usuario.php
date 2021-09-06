<?php
session_start();
include_once('config/config.php');
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
	$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);

	$query = "INSERT INTO usuarios(nome, login, senha, data_cad, data_mod, status, nivel) VALUES ('".$nome."', '".$login."', '".md5($senha)."', NOW(), null, '".$status."', '".$nivel."' )";
	$result = mysqli_query($mysqli, $query);
	if(mysqli_insert_id($mysqli)){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Usuário cadastrado com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/usuarios");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao cadastrar usuário!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: ".HOME."/usuarios");
	}
 ?>

  