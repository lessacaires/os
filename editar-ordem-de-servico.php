<?php
session_start();
include_once('config/config.php');
	$id 			= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$solicitante 	= filter_input(INPUT_POST, 'solicitante', FILTER_SANITIZE_STRING);
	$tipo 			= filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
	$setor 			= filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
	$equipamento 	= filter_input(INPUT_POST, 'equipamento', FILTER_SANITIZE_STRING);
	$descricao 		= filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$observacoes 	= filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
	$status 		= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

	if(isset($status) && $status == '4'){
		$query = "UPDATE servicos SET login = ".$_SESSION['login'].",  solicitante = '".$solicitante."', tipo = '".$tipo."', data_mod = NOW(), status ='".$status."' , descricao = '".$descricao."', observacoes = '".$observacoes."' , setor = '".$setor."', equipamento = '".$equipamento."', mod_login = '".$_SESSION['login']."', data_encerramento = NOW() WHERE id = '".$id."'";
	}

	$query = "UPDATE servicos SET  login = ".$_SESSION['login'].",  solicitante = '".$solicitante."', tipo = '".$tipo."', data_mod = NOW(), status ='".$status."' , descricao = '".$descricao."', observacoes = '".$observacoes."' , setor = '".$setor."', equipamento = '".$equipamento."', mod_login = '".$_SESSION['login']."' WHERE id = '".$id."'";
	$result = mysqli_query($mysqli, $query);
	if($result){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Ordem de Serviço alterada com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/ordem-de-servico");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao editar Ordem de Serviço!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: ".HOME."/ordem-de-servico");
	}
 ?>

  