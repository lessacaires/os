<?php
session_start();
include_once('config/config.php');
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

	$query = "INSERT INTO usuarios(nome, senha, data_cad, status) VALUES ('".$nome."', '".md5($senha)."', NOW(), '".$status."' )";
	$result = mysqli_query($mysqli, $query);

	if(mysqli_insert_id($mysqli)){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Usuário cadastrado com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: http://localhost/os/usuarios");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao cadastrar usuário!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: http://localhost/os/usuarios");
	}
 ?>

  