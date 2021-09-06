<?php
session_start();
include_once('config/config.php');
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

		$sql_servico = "DELETE FROM servicos WHERE id = '".$id."'";
		$retorna = mysqli_query($mysqli, $sql_servico);
		$row_servico = mysqli_fetch_assoc($retorna);		
	
	if(mysqli_affected_rows($mysqli) != '0'){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Ordem de Serviço excluida com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/ordem-de-servico");
	}else{
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao exluir Ordem de Serviço!
	  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    							<span aria-hidden="true">&times;</span>
	  								</button>
								</div>';
			header("Location: ".HOME."/ordem-de-servico");
	}
 ?>