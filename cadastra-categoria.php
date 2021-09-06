<?php
session_start();
include_once('config/config.php');
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

	$query = "INSERT INTO categorias(nome) VALUES ('".$nome."')";
	$result = mysqli_query($mysqli, $query);

	if(mysqli_insert_id($mysqli)){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Registro cadastrado com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/categorias");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao cadastrar registro!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: ".HOME."/categorias");
	}
 ?>

  