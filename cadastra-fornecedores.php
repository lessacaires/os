<?php
session_start();
include_once('config/config.php');
	$nome 			= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$telefone 		= filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$email 			= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$tipo_servicos	= filter_input(INPUT_POST, 'tipo_servicos', FILTER_SANITIZE_STRING);
	$cnpj 			= filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
	$status 		= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

	$query = "INSERT INTO fornecedores(nome, telefone, email, tipo_servicos, cnpj, data_cad, status) VALUES ('".$nome."', '".$telefone."', '".$email."', '".$tipo_servicos."', '".$cnpj."', NOW(), '".$status."' )";
	$result = mysqli_query($mysqli, $query);

	if(mysqli_insert_id($mysqli)){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Fornecedor cadastrado com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/fornecedor");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao cadastrar fornecedor!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: ".HOME."/fornecedor");
	}
 ?>

  