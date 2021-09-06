<?php
session_start();
include_once('config/config.php');
	$solicitante 	= filter_input(INPUT_POST, 'solicitante', FILTER_SANITIZE_STRING);
	$tipo 			= filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
	$setor 			= filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
	$equipamento 	= filter_input(INPUT_POST, 'equipamento', FILTER_SANITIZE_STRING);
	$descricao 		= filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$observacoes 	= filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
	$status 		= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);


	$query = "INSERT INTO servico(tipo, solicitante, data_cad, status, descricao, observacoes, setor, equipamento) VALUES ('".$tipo."', '".$solicitante."', NOW(), '".$status."', '".$descricao."', '".$observacoes."', '".$setor."', '".$equipamento."')";
	$result = mysqli_query($mysqli, $query);
	if(mysqli_insert_id($mysqli)){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Ordem de Serviço cadastrada com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: http://localhost/os/ordem-de-servico");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao cadastrar Ordem de Serviço!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: http://localhost/os/ordem-de-servico");
	}
 ?>

  